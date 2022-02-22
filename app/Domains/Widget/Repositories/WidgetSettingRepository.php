<?php

namespace App\Domains\Widget\Repositories;

use App\Domains\Widget\Models\WidgetSetting;
use App\Repositories\BaseRepository;

class WidgetSettingRepository extends BaseRepository
{
    public function model(): object
    {
        return new WidgetSetting();
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

    /**
     * Widget setting by channel id
     *
     * @param $channelId
     * @return mixed
     */
    public function findByChannelId($channelId)
    {
        return $this->model()->where('channel_id',$channelId)->firstOrFail();
    }

    public function updateByChannelId($channelId, $params)
    {
        return $this->findByChannelId($channelId)->update($params);
    }
}
