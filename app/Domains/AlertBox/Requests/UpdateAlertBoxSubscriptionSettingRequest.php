<?php

namespace App\Domains\AlertBox\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UpdateAlertBoxSubscriptionSettingRequest extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __construct(Request $request)
    {
        $this->validateRequest($request);
        parent::__construct($request);
    }

    /**
     * Validate request
     *
     * @throws ValidationException
     */
    public function validateRequest($request)
    {
        $this->validate(
            $request, $this->rules()
        );
    }

    /**
     * Define rules
     *
     * @return \string[][]
     */
    public function rules(): array
    {
        return [
            'subscription_sound_volume'      => ['numeric'],
            'subscription_alert_duration'    => ['numeric']
        ];
    }
}
