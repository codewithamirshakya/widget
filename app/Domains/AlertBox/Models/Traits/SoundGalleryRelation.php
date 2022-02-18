<?php

namespace App\Domains\AlertBox\Models\Traits;

use App\Domains\AlertBox\Models\ImageGallery;
use App\Domains\AlertBox\Models\SoundGallery;

trait SoundGalleryRelation
{
    public function followSound(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(SoundGallery::class, 'id', 'follow_sound_id');
    }

    public function subscriptionSound(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(SoundGallery::class, 'id', 'subscription_sound_id');
    }

    public function tippingSound(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(SoundGallery::class, 'id', 'tipping_sound_id');
    }
}
