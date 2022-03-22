<?php

namespace App\Models;

use App\Traits\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use function config;

class SoundGallery extends Model
{
    use SoftDeletes, Utility;
    protected $fillable = [
        'original_name',
        'file',
        'size',
        'duration',
        'category',
        'channel_id',
    ];

    /**
     * getFileAttribute
     *
     * @return string
     */
    public function getFileAttribute(): string
    {
        if(!empty($this->attributes['channel_id']) && !empty($this->attributes['file'])) {
            return $this->getImageFullPath($this->attributes['channel_id'], config('setting.minio.asounds'), $this->attributes['file']);
        }

        return config('setting.minio.stocks'). DIRECTORY_SEPARATOR . config('setting.minio.asounds'). DIRECTORY_SEPARATOR. $this->attributes['file'];
    }

    public function validateSoundGallery($input): \Illuminate\Contracts\Validation\Validator
    {
        $rules = [
            'file' => ['required', 'max:1024', 'mimes:mp3,ogg']
        ];

        return Validator::make($input, $rules);
    }

    public function createSoundGallery($input)
    {
        return self::create($input);
    }

    public function deleteSoundGallery($ids): int
    {
        return self::destroy($ids);
    }

    public function findSoundGallery($id)
    {
        return self::find($id);
    }

    public function getSoundStocks($limit, float $offset)
    {
        return self::whereNull('channel_id')->limit($limit)->offset($offset)->get();
    }

    public function getSoundUploads($channelId, $limit, $offset)
    {
        return self::where('channel_id', $channelId)->limit($limit)->offset($offset)->get();
    }

    /**
     * findDefaultSound
     *
     * @return void
     */
    public function findDefaultSound()
    {
        return self::whereNotNull('fallback') -> first();
    }
}
