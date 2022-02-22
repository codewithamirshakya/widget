<?php

namespace App\Domains\AlertBox\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UploadImageGalleryRequest extends Controller
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
            'file' => ['required', 'max:1024']
        ];
    }
}
