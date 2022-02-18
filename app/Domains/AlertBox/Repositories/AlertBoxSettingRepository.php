<?php

namespace App\Domains\AlertBox\Repositories;

use App\Domains\AlertBox\Models\AlertBoxSetting;

class AlertBoxSettingRepository extends BaseRepository
{

    public function model() : object
    {
        return new AlertBoxSetting();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model()->findOrFail($id);
    }

    /**
     * @param $channelId
     * @return mixed
     */
    public function findByChannelId($channelId)
    {
        return $this->model()->where('channel_id',$channelId)->firstOrFail();
    }

    /**
     * @param $id
     * @param $params
     * @return mixed
     */
    public function update($id, $params)
    {
        $model = $this->find($id);
        return $model->update($params);
    }

    /**
     * @param $channelId
     * @param $params
     * @return mixed
     */
    public function updateByChannelId($channelId, $params)
    {
        $model = $this->findByChannelId($channelId);
        return $model->update($params);
    }

}
