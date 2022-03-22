<?php

namespace App\GraphQL\Requests\AlertBox;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UpdateAlertBoxFollowSettingRequest extends Controller
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
            'follow_sound_volume'      => ['numeric'],
            'follow_alert_duration'    => ['numeric']
        ];
    }
}
