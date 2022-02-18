<?php

namespace App\Domains\AlertBox\Actions\Mutations;

use App\Domains\AlertBox\Requests\UpdateAlertBoxFollowSetting;
use App\Domains\AlertBox\Services\AlertBoxFollowSettingService;
use App\Domains\AlertBox\Services\AlertBoxSettingService;
use App\Domains\AlertBox\Services\AlertBoxSubscriptionSettingService;
use App\Domains\AlertBox\Services\AlertBoxTippingSettingService;

class AlertBoxMutation
{

    /**
     * @var int
     */
    private $id;

    public function __construct()
    {
        $this->id = 13;
    }

    /**
     * updateAlertBoxFollowSetting
     *
     * @param mixed $_
     * @param mixed $args
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateAlertBoxFollowSetting($_, array $args): array
    {
        // validation
        request()->request->add($args);
        $validation = new UpdateAlertBoxFollowSetting(request());
        $alertBoxSettingService = new AlertBoxSettingService();
        return $alertBoxSettingService->updateAlertBox($this->id, $args, new AlertBoxFollowSettingService());
    }

    /**
     * updateAlertBoxSubscriptionSetting
     *
     * @param mixed $_
     * @param mixed $args
     * @return array
     */
    public function updateAlertBoxSubscriptionSetting($_, array $args): array
    {
        $alertBoxSettingService = new AlertBoxSettingService();
        return $alertBoxSettingService->updateAlertBox($this->id, $args, new AlertBoxSubscriptionSettingService());
    }

    /**
     * updateAlertBoxTippingSetting
     *
     * @param mixed $_
     * @param mixed $args
     * @return array
     */
    public function updateAlertBoxTippingSetting($_, array $args): array
    {
        $alertBoxSettingService = new AlertBoxSettingService();
        return $alertBoxSettingService->updateAlertBox($this->id, $args, new AlertBoxTippingSettingService());
    }
}
