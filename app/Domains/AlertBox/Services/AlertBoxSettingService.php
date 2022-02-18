<?php

namespace App\Domains\AlertBox\Services;

class AlertBoxSettingService
{

    /**
     * @param $id
     * @param $params
     * @param AlertBoxSettingServiceInterface $alertBoxSettingService
     * @return mixed
     */
    public function updateAlertBox($id, $params, AlertBoxSettingServiceInterface $alertBoxSettingService)
    {
        $status =  $alertBoxSettingService->updateAlertBox($id, $params);

        return $status ? [
            'status' => true,
            'message' => 'success'
        ]: [
            'status' => false,
            'message' => 'fail'
        ];
    }
}
