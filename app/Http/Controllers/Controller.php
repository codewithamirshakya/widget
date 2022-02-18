<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Requests\FormRequest;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController implements FormRequest
{
    protected $service;
    protected $params;
    public $request;

    public function __construct(Request $request)
    {
        $this->params = $request->all();
        $this->request = $request;
    }

    /**
     * @return Request
     */
    public function getParams(): Request
    {
        return $this->request->replace($this->params);
    }
}
