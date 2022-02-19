<?php

namespace App\Domains\AlertBox\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UpdateAlertBoxSubscriptionSetting extends Controller
{
    /**
     * @throws ValidationException
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
            'subscription_sound_volume'      => ['numeric'],
            'subscription_alert_duration'    => ['numeric']
        ];;
    }
}
