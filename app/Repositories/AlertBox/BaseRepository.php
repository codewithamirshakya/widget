<?php

namespace App\Repositories\AlertBox;

abstract class BaseRepository
{
    abstract public function model();

    abstract public function find($id);

    abstract public function update($id, $params);

    abstract public function findByChannelId($channelId);

    abstract public function updateByChannelId($channelId, $params);

    abstract public function create($params);
}
