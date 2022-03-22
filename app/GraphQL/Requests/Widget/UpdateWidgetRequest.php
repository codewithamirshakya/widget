<?php

namespace App\GraphQL\Requests\Widget;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UpdateWidgetRequest extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __construct(Request $request, $args)
    {
        $this->validateRequest($request, $args);
        parent::__construct($request);
    }

    /**
     * Validate request
     *
     * @throws ValidationException
     */
    public function validateRequest($request, $args)
    {
        $request->request->add($args);
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
            'max_donation' => ['numeric'],
            'text_scroll_speed' => ['numeric']
        ];
    }
}
