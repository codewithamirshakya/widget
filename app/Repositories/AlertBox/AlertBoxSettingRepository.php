<?php

namespace App\Repositories\AlertBox;

use App\Models\AlertBoxSetting;

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
        return $this->find($id)->update($params);
    }

    /**
     * @param $channelId
     * @param $params
     * @return mixed
     */
    public function updateByChannelId($channelId, $params)
    {
        return $this->findByChannelId($channelId)->update($params);
    }

    public function create($params)
    {
        // TODO: Implement create() method.
    }
}
