<?php

namespace App\GraphQL\Entities;

class Channel
{
    public function __invoke(array $representation)
    {
        return \App\Models\Channel::find($representation['id']);
    }
}
