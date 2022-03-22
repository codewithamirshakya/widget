<?php

namespace App\Models\Traits;

use App\Models\SoundGallery;

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
