<?php

namespace App\Services\AlterBox;

use App\Repositories\AlertBox\AlertBoxSettingRepository;

class AlertBoxSubscriptionSettingService
{

    /**
     * @var AlertBoxSettingRepository
     */
    private $alertBoxSettingRepository;

    public function __construct()
    {
        $this->alertBoxSettingRepository = new AlertBoxSettingRepository();
    }

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function update($id, $input)
    {
        return $this->alertBoxSettingRepository->updateByChannelId($id, $input);;
    }
}
