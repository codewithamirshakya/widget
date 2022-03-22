<?php

namespace App\GraphQL\Entities;

use Illuminate\Support\Facades\Log;

class Channel
{
    public function __invoke(array $representation)
    {
        return \App\Domains\AlertBox\Models\Channel::find($representation['id']);
    }
}
