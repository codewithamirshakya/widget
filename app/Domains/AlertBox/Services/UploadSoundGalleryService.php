<?php

namespace App\Domains\AlertBox\Services;

use AmirShakya\Minio\Support\Minio;
use App\Domains\AlertBox\Repositories\SoundGalleryRepository;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class UploadSoundGalleryService
{
    /**
     * @var SoundGalleryRepository
     */
    private $soundGalleryRepository;

    public function __construct()
    {
        $this->soundGalleryRepository = new SoundGalleryRepository();
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
        $path = substr($id, 0, 1) . DIRECTORY_SEPARATOR . substr($id, 0, 2) . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR . config('minio.buckets.asounds');
        return (new Minio())->setBaseUrl(config('minio.url'))
            ->setFile($file)
            ->setAttribute('image')
            ->setBucket(config('minio.buckets.default'))
            ->setParams([
                'path' => $path
            ])
            ->upload();
    }

    public function uploadSound($args, $id): bool
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

            return $this->soundGalleryRepository->create($params);

        } catch (BadRequestException $badRequestException) {
            return false;
        } catch (\Exception $exception) {

        }
        return false;
    }
}
