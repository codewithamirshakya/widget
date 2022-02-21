<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GenericResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
        ]; // TODO: Change the autogenerated stub
    }
}