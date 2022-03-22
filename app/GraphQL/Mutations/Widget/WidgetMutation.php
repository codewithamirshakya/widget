<?php

namespace App\GraphQL\Mutations\Widget;

use App\GraphQL\Requests\Widget\UpdateWidgetRequest;
use App\Http\Resources\GenericResource;
use App\Services\Widget\WidgetSettingService;
use function request;

class WidgetMutation
{
    private $channelId;

    public function __construct()
    {
        $this->channelId = 12;
    }

    /**
     * Update widget setting mutation
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateWidgetSetting($_, array $args): GenericResource
    {
        $validate = new UpdateWidgetRequest(request(), $args);

        $widgetSettingService = new WidgetSettingService();
        $status = $widgetSettingService->updateSetting($this->channelId, $args);

        return $status ? new GenericResource(['status' => true, 'message' => 'success'])
            : new GenericResource(['status' => false, 'message' => 'fail']);
    }
}
