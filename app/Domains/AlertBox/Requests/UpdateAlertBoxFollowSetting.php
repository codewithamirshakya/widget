<?php

namespace App\Domains\AlertBox\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateAlertBoxFollowSetting extends Controller
{
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __construct(Request $request)
    {
        $this->validate(
            $request, $this->rules()
        );

        parent::__construct($request);
    }

    public function rules(): array
    {
        return [
            'follow_sound_volume'      => ['numeric'],
            'follow_alert_duration'    => ['numeric']
        ];
    }
}
