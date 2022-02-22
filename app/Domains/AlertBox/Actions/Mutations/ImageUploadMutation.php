<?php

namespace App\Domains\AlertBox\Actions\Mutations;


use AmirShakya\Minio\Support\Minio;
use App\Domains\AlertBox\Requests\UploadImageGalleryRequest;
use App\Domains\AlertBox\Services\UploadImageGalleryService;
use App\Http\Resources\GenericResource;
use Illuminate\Validation\ValidationException;

class ImageUploadMutation
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
        $uploadImageGalleryService = new UploadImageGalleryService();
        $validate = new UploadImageGalleryRequest(request(), $args);

        $status = $uploadImageGalleryService->upload($args['file'], $this->channelId);
        return $status ? GenericResource::make(['status' => true, 'message' => 'success']) : GenericResource::make(['status' => false, 'message' => 'failed']);
    }
}
