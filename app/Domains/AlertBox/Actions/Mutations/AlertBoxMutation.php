<?php

namespace App\Domains\AlertBox\Actions\Mutations;

use App\Domains\AlertBox\Requests\UpdateAlertBoxSubscriptionSetting;
use App\Domains\AlertBox\Requests\UpdateAlertBoxTippingSetting;
use App\Domains\AlertBox\Services\AlertBoxFollowSettingService;
use App\Domains\AlertBox\Services\AlertBoxSettingService;
use App\Domains\AlertBox\Services\AlertBoxSubscriptionSettingService;
use App\Domains\AlertBox\Services\AlertBoxTippingSettingService;
use Illuminate\Validation\ValidationException;

class AlertBoxMutation
{

    /**
     * @var int
     */
    private $channelId;

    public function __construct()
    {
        //@todo : get channel id from auth token
        $this->channelId = 13;
    }

    /**
     * updateAlertBoxFollowSetting
     *
     * @param mixed $_
     * @param mixed $args
     * @return array
     * @throws ValidationException
     */
    public function updateAlertBoxFollowSetting($_, array $args): array
    {
        // validation
        request()->request->add($args);
        $validation = new UpdateAlertBoxTippingSetting(request());

        $alertBoxSettingService = new AlertBoxSettingService();
        return $alertBoxSettingService->updateAlertBox($this->channelId, $args, new AlertBoxFollowSettingService());
    }

    /**
     * updateAlertBoxSubscriptionSetting
     *
     * @param mixed $_
     * @param mixed $args
     * @return array
     * @throws ValidationException
     */
    public function updateAlertBoxSubscriptionSetting($_, array $args): array
    {
        // validation
        request()->request->add($args);
        $validation = new UpdateAlertBoxSubscriptionSetting(request());

        $alertBoxSettingService = new AlertBoxSettingService();
        return $alertBoxSettingService->updateAlertBox($this->channelId, $args, new AlertBoxSubscriptionSettingService());
    }

    /**
     * updateAlertBoxTippingSetting
     *
     * @param mixed $_
     * @param mixed $args
     * @return array
     * @throws ValidationException
     */
    public function updateAlertBoxTippingSetting($_, array $args): array
    {
        // validation
        request()->request->add($args);
        $validation = new UpdateAlertBoxTippingSetting(request());

        $alertBoxSettingService = new AlertBoxSettingService();
        return $alertBoxSettingService->updateAlertBox($this->channelId, $args, new AlertBoxTippingSettingService());
    }
}
