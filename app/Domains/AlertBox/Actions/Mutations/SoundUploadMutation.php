<?php

namespace App\Domains\AlertBox\Actions\Mutations;


use AmirShakya\Minio\Support\Minio;
use App\Domains\AlertBox\Requests\UploadSoundGallery;
use App\Domains\AlertBox\Services\UploadSoundGalleryService;
use App\Http\Resources\GenericResource;
use Illuminate\Validation\ValidationException;

class SoundUploadMutation
{
    /**
     * @var int
     */
    private $channelId;

    public function __construct()
    {
        $this->channelId = 12;
    }

    /**
     * @param null $_
     * @param array<string, mixed> $args
     * @throws ValidationException
     */
    public function upload($_, array $args): GenericResource
    {
        $uploadSoundGalleryService = new UploadSoundGalleryService();
        $validate = new UploadSoundGallery(request(), $args);

        $status = $uploadSoundGalleryService->uploadSound($args['file'], $this->channelId);
        return $status ? GenericResource::make(['status' => true, 'message' => 'success']) : GenericResource::make(['status' => false, 'message' => 'failed']);
    }
}
