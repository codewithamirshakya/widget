<?php

namespace App\Domains\AlertBox\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UpdateAlertBoxTippingSetting extends Controller
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
            'tipping_min_amount_alert'      => ['numeric'],
            'tipping_sound_volume'          => ['numeric'],
            'tipping_alert_duration'        => ['numeric']
        ];
    }
}
