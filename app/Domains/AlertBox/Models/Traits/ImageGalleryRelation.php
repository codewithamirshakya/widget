<?php

namespace App\Domains\AlertBox\Models\Traits;

use App\Domains\AlertBox\Models\ImageGallery;
use App\Domains\AlertBox\Models\SoundGallery;

trait ImageGalleryRelation
{
    public function followImage(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ImageGallery::class,'id','follow_image_id');
    }

    public function subscriptionImage(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ImageGallery::class,'id','subscription_image_id');
    }

    public function tippingImage(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ImageGallery::class,'id','tipping_image_id');
    }
}
