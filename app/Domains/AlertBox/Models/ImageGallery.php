<?php

namespace App\Domains\AlertBox\Models;

use App\Traits\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class ImageGallery extends Model
{
    use SoftDeletes, Utility;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'channel_id',
        'original_name',
        'file',
        'size',
    ];

    /**
     * getFileAttribute
     *
     * @return string
     */
    public function getFileAttribute(): string
    {
        if(!empty($this->attributes['channel_id']) && !empty($this->attributes['file'])) {
            return $this->getImageFullPath($this->attributes['channel_id'], config('setting.minio.aimages'), $this->attributes['file']);
        }

        return config('setting.minio.stocks') . DIRECTORY_SEPARATOR . config('setting.minio.aimages') . DIRECTORY_SEPARATOR. $this->attributes['file'];
    }

    public function validateImageGallery($input): \Illuminate\Contracts\Validation\Validator
    {
        $rules = [
            'file' => ['required', 'max:1024', 'mimes:gif,png,jpeg,jpg']
        ];

        return Validator::make($input, $rules);
    }

    public function findImageGallery($id)
    {
        return self::find($id);
    }

    public function createImageGallery($input)
    {
        return self::create($input);
    }

    public function deleteImageGallery($ids): int
    {
        return self::destroy($ids);
    }

    public function getImageStocks($limit, $offset)
    {
        return self::whereNull('channel_id')->limit($limit)->offset($offset)->get();
    }

    public function getImageUploads($channelId, $limit, $offset)
    {
        return self::where('channel_id', $channelId)->limit($limit)->offset($offset)->get();
    }

    /**
     * findDefaultImage
     *
     * @return void
     */
    public function findDefaultImage()
    {
        return self::whereNotNull('fallback') -> first();
    }
}
