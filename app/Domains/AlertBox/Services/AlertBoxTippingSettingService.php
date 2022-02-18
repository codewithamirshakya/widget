<?php

namespace App\Domains\AlertBox\Services;

use App\Domains\AlertBox\Repositories\AlertBoxSettingRepository;

class AlertBoxTippingSettingService implements AlertBoxSettingServiceInterface
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
    public function updateAlertBox($id, $input)
    {
        return $this->alertBoxSettingRepository->updateByChannelId($id, $input);;
    }
}
