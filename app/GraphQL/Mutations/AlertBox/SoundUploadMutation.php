<?php

namespace App\GraphQL\Mutations\AlertBox;


use App\GraphQL\Requests\AlertBox\UploadImageGalleryRequest;
use App\Http\Resources\GenericResource;
use App\Services\AlterBox\UploadImageGalleryService;
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
        $uploadSoundGalleryService = new UploadImageGalleryService();
        $validate = new UploadImageGalleryRequest(request(), $args);

        $status = $uploadSoundGalleryService->upload($args['file'], $this->channelId);
        return $status ? GenericResource::make(['status' => true, 'message' => 'success']) : GenericResource::make(['status' => false, 'message' => 'failed']);
    }
}
