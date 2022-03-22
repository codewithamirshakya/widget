<?php

namespace App\Models;

use App\Models\Traits\ImageGalleryRelation;
use App\Models\Traits\SoundGalleryRelation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use function config;

class AlertBoxSetting extends Model
{
    use ImageGalleryRelation, SoundGalleryRelation;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'channel_id',

        'follow_enable',
        'follow_message_format',
        'follow_text_animation',
        'follow_sound_volume',
        'follow_alert_duration',

        'subscription_enable',
        'subscription_message_format',
        'subscription_text_animation',
        'subscription_sound_volume',
        'subscription_alert_duration',

        'tipping_enable',
        'tipping_message_format',
        'tipping_text_animation',
        'tipping_sound_volume',
        'tipping_alert_duration',
        'tipping_min_amount_alert',

        'tipping_tts_enable',
        'tipping_tts_voice',
        'tipping_tts_lang',
        'tipping_tts_volume',

        'tipping_image_id',
        'tipping_sound_id',

        'follow_image_id',
        'follow_sound_id',

        'subscription_image_id',
        'subscription_sound_id',

        'follow_font',
        'follow_font_size',
        'follow_font_weight',
        'follow_text_color',
        'follow_text_highlight_color',

        'subscription_font',
        'subscription_font_size',
        'subscription_font_weight',
        'subscription_text_color',
        'subscription_text_highlight_color',

        'tipping_font',
        'tipping_font_size',
        'tipping_font_weight',
        'tipping_text_color',
        'tipping_text_highlight_color',
    ];

    /**
     * __construct
     *
     * @param  mixed $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = config('setting.alert_box_settings');
        parent::__construct($attributes);
    }

    /**
     * @return BelongsTo
     */
    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }
}
