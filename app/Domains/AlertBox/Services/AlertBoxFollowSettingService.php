<?php

namespace App\Domains\AlertBox\Services;

use App\Domains\AlertBox\Repositories\AlertBoxSettingRepository;

class AlertBoxFollowSettingService
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
        return $this->alertBoxSettingRepository->updateByChannelId($id, $input);
    }
}
