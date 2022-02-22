<?php

namespace App\Domains\AlertBox\Services;

use AmirShakya\Minio\Support\Minio;
use App\Domains\AlertBox\Repositories\ImageGalleryRepository;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class UploadImageGalleryService
{
    /**
     * @var ImageGalleryRepository
     */
    private $imageGalleryRepository;

    public function __construct()
    {
        $this->imageGalleryRepository = new ImageGalleryRepository();
    }

    /**
     * Upload file service
     *
     * @param $file
     * @param $id
     * @return array
     */
    private function uploadFile($file, $id): array
    {
        $path = substr($id, 0, 1) . DIRECTORY_SEPARATOR . substr($id, 0, 2) . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR . config('minio.buckets.aimages');
        return (new Minio())->setBaseUrl(config('minio.url'))
            ->setFile($file)
            ->setAttribute('image')
            ->setBucket(config('minio.buckets.default'))
            ->setParams([
                'path' => $path
            ])
            ->upload();
    }

    public function upload($args, $id): bool
    {
        try {
            $file       = $args['file'];
            $fileName   = $this->uploadFile($file, $id);

            $params = [
                'channel_id'        => $id,
                'file'              => $fileName,
                'duration'          => 0,
                'size'              => $file->getSize(),
                'original_name'     => $file->getClientOriginalName(),
            ];

            return $this->imageGalleryRepository->create($params);

        } catch (BadRequestException $badRequestException) {
            return false;
        } catch (\Exception $exception) {

        }
        return false;
    }
}
