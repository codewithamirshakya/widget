<?php

namespace App\Repositories\AlertBox;

use App\Models\SoundGallery;

class SoundGalleryRepository extends BaseRepository
{
    public function model(): object
    {
        return new SoundGallery();
    }

    /**
     * @param $params
     * @return mixed
     */
    public function create($params)
    {
        return $this->model()->create($params);
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function update($id, $params)
    {
        // TODO: Implement update() method.
    }

    public function findByChannelId($channelId)
    {
        // TODO: Implement findByChannelId() method.
    }

    public function updateByChannelId($channelId, $params)
    {
        // TODO: Implement updateByChannelId() method.
    }
}
