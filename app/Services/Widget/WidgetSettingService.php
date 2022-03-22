<?php

namespace App\Services\Widget;

use App\Domains\Widget\Repositories\WidgetSettingRepository;

class WidgetSettingService
{
    /**
     * @var WidgetSettingRepository
     */
    private $widgetSettingRepository;

    public function __construct()
    {
        $this->widgetSettingRepository = new WidgetSettingRepository();
    }

    /**
     * Update widget setting
     *
     * @param $id
     * @param $input
     */
    public function updateSetting($id, $input)
    {
        return $this->widgetSettingRepository->updateByChannelId($id, $input);
    }
}
