<?php

namespace App\Domains\AlertBox\Actions\Mutations;

use App\Domains\AlertBox\Requests\UpdateAlertBoxSubscriptionSetting;
use App\Domains\AlertBox\Requests\UpdateAlertBoxTippingSetting;
use App\Domains\AlertBox\Services\AlertBoxFollowSettingService;
use App\Domains\AlertBox\Services\AlertBoxSubscriptionSettingService;
use App\Domains\AlertBox\Services\AlertBoxTippingSettingService;
use App\Http\Resources\GenericResource;
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
     * @return GenericResource
     * @throws ValidationException
     */
    public function updateAlertBoxFollowSetting($_, array $args): GenericResource
    {
        // validation
        request()->request->add($args);
        $validation = new UpdateAlertBoxTippingSetting(request());

        $alertBoxFollowSettingService = new AlertBoxFollowSettingService();
        $status = $alertBoxFollowSettingService->update($this->channelId, $args);

        return $status ? new GenericResource(['status' => true, 'message' => 'success']) : new GenericResource(['status' => false, 'message' => 'failed']);
    }

    /**
     * updateAlertBoxSubscriptionSetting
     *
     * @param mixed $_
     * @param mixed $args
     * @return GenericResource
     * @throws ValidationException
     */
    public function updateAlertBoxSubscriptionSetting($_, array $args): GenericResource
    {
        // validation
        request()->request->add($args);
        $validation = new UpdateAlertBoxSubscriptionSetting(request());

        $alertBoxSubscriptionSettingService = new AlertBoxSubscriptionSettingService();
        $status = $alertBoxSubscriptionSettingService->update($this->channelId, $args);

        return $status ? new GenericResource(['status' => true, 'message' => 'success']) : new GenericResource(['status' => false, 'message' => 'failed']);

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

        $alertBoxTippingSettingService = new AlertBoxTippingSettingService();
        return $alertBoxTippingSettingService->update($this->channelId, $args);
    }
}
