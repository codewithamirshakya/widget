<?php

namespace App\Domains\AlertBox\Models;

use App\Domains\Widget\Models\WidgetSetting;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function widgetSetting(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(WidgetSetting::class)->withDefault();
    }

    public function alterBoxSetting(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AlertBoxSetting::class)->withDefault();
    }
}
