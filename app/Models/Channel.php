<?php

namespace App\Models;

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
