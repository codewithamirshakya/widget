<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use function config;

class WidgetSetting extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'channel_id',
        'message_format',
        'max_donation',
        'text_scroll_speed',
        'text_color',
        'name_color',
        'amount_color',
    ];

    /**
     * __construct
     *
     * @param  mixed $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = config('setting.widget_settings');
        parent::__construct($attributes);
    }

    /**
     * validateWidgetSettings
     *
     * @param  mixed $input
     */
    public function validateWidgetSettings($input): \Illuminate\Contracts\Validation\Validator
    {
        $rules = [
            'max_donation' => ['numeric'],
            'text_scroll_speed' => ['numeric']
        ];

        return Validator::make($input, $rules);
    }

    /**
     * updateWidgetSetting
     *
     * @param  mixed $input
     * @return void
     */
    public function updateWidgetSetting($input)
    {
        return self::updateOrCreate(['channel_id' => $input['channel_id']], $input);
    }
}
