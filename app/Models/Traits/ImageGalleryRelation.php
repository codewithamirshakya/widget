<?php

namespace App\Models\Traits;

use App\Models\ImageGallery;

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
