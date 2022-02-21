<?php

namespace AmirShakya\Minio\Support;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class Minio
{
    private $bucket;
    private $file;
    private $uploadUrl;
    private $params;
    private $attribute;
    private $baseUrl;

    /**
     * @return array
     */
    public function upload(): array
    {
        try {
            $response =  Http::attach($this->attribute, file_get_contents($this->file->getRealPath()), $this->file->getClientOriginalName())
                ->post($this->getUploadUrl(), $this->params);

            return $response->json('data');
        } catch (\Exception $exception) {
            throw new BadRequestException($exception->getMessage());
        }
    }

    /**
     * Set upload url
     *
     * @param $url
     * @return $this
     */
    public function setBaseUrl($url): Minio
    {
        $this->baseUrl = $url;
        return $this;
    }

    /**
     * Set params
     *
     * @param $params
     * @return $this
     */
    public function setParams($params): Minio
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @param $file
     * @return $this
     */
    public function setFile($file): Minio
    {
        $this->file = $file;
        return $this;
    }

    /**
     * Set bucket
     *
     * @param $bucket
     * @return $this
     */
    public function setBucket($bucket): Minio
    {
        $this->bucket = $bucket;
        return $this;
    }

    /**
     * Set attribute
     *
     * @param $attribute
     * @return $this
     */
    public function setAttribute($attribute): Minio
    {
        $this->attribute = $attribute;
        return $this;
    }

    public function getUploadUrl(): string
    {
        return URL::secure($this->baseUrl.$this->bucket);
    }
}
