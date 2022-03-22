<?php
return [
    /*
    |--------------------------------------------------------------------------
    | URL Configuration
    |--------------------------------------------------------------------------
    |
    */
    'api_base_url'      => env('API_BASE_URL'),
    'frontend_url'      => env("FRONTEND_URL"),
    'webhook_url'       => env('WEBHOOK_URL','https://webhooks.picarto.tv'),
    'minio_image_url'   => env('MINIO_IMAGE_URL','https://storage-01.picarto.diagonal.solutions'),

    /*
    |--------------------------------------------------------------------------
    | Channel Configuration
    |--------------------------------------------------------------------------
    |
    */
    'channel' => [
        'max_change_times'  => 5,
        'max_no_languages'  => 3,
        'recording_limit'   => 12,
        'max_no_tools'      => 10,
        'max_no_softwares'  => 10,
        'max_no_tags'       => 20,
    ],
    'default_channel_color' => "#35A775",

    /*
    |--------------------------------------------------------------------------
    | Description Configuration
    |--------------------------------------------------------------------------
    |
    */
    'description_count' => 50,

    /*
    |--------------------------------------------------------------------------
    | Video Configuration
    |--------------------------------------------------------------------------
    |
    */
    'video' => [
        'total_slots'   => 12,
        'expired_days'  => env('DELETE_VIDEO_DAYS', '60')
    ],
    'video_download_key' => env('VIDEO_DOWNLOAD_KEY', 'jdasf234dDDrd2'),

    /*
    |--------------------------------------------------------------------------
    | Account Configuration
    |--------------------------------------------------------------------------
    |
    */
    'visitor_delete_limit'          => env('VISITOR_DELETE_LIMIT', 100),
    'delete_deactivated_account'    => env('DELETE_DEACTIVATED_ACCOUNT', '60'),
    'invitation_count'              => 3,

    /*
    |--------------------------------------------------------------------------
    | Captcha plus IpQualityScore Configuration
    |--------------------------------------------------------------------------
    |
    */
    'google_captcha_key'            => env("GOOGLE_CAPTCHA_KEY", '6Le0MboZAAAAANt9bcPSy2wPz24X4IOIhcJYCafk'),
    'ipqualityscore'                => [
        'key'       => 'qGk99hp8STxkEhxzKOWSPeenwPvHE4lA'
    ],

    /*
    |--------------------------------------------------------------------------
    | Misc Configuration
    |--------------------------------------------------------------------------
    |
    */
    'conversion_file_unit'      => 'MB',
    'conversion_duration_unit'  => 'min',
    'date_format'               => 'Y-m-d',
    'datetime_format'           => 'Y-m-d H:i:s',
    'stream_key_format'         => 'ptv_channelid_randomstring',

    /*
    |--------------------------------------------------------------------------
    | Socket Configuration
    |--------------------------------------------------------------------------
    |
    */
    'jwt_key'           => env('JWT_KEY', ''),
    'notification_key'  => env('NOTIFICATION_KEY', 'notify_'),

    /*
    |--------------------------------------------------------------------------
    | Mail Configuration
    |--------------------------------------------------------------------------
    |
    */
    'mail' => [
        'info'                          => env('INFO_EMAIL','info@picarto.tv'),
        'support'                       => env('SUPPORT_EMAIL','support@picarto.tv'),
        'threshold'                     => 120, // 2 minutes
        'lastNotified'                  => 900, // 15 minutes
        'register'                      => env("REGISTER_URL"),
        'from_name'                     => env("MAIL_FROM_NAME"),
        'forget_password_reset_url'     => env("FORGET_PASSWORD_RESET_URL"),
    ],

    /*
    |--------------------------------------------------------------------------
    | Thumbnail URL Configuration
    |--------------------------------------------------------------------------
    |
    */
    'thumbnail_ips' => [
        '185.93.1.49'       => 'thumb-us-east1.picarto.tv',
        '89.187.187.40'     => 'thumb-us-west1.picarto.tv',
        '37.228.130.23'     => 'thumb-eu-west1.picarto.tv',
        '212.102.40.213'    => 'thumb-us-dallas.picarto.tv',
        '143.244.35.187'    => 'thumb-us-miami.picarto.tv',
        '89.187.179.239'    => 'thumb-us-newyork.picarto.tv',
        '138.199.9.166'     => 'thumb-us-losangeles.picarto.tv'
    ],
    'thumbnail_default' => 'thumb.picarto.tv',

    /*
    |--------------------------------------------------------------------------
    | Enable Mail / OneSignal / Webhook
    |--------------------------------------------------------------------------
    |
    */
    'enable_onesignal'              => env('ENABLE_ONESIGNAL', true),
    'enable_webhook'                => env('ENABLE_WEBHOOK', true),
    'enable_streamer_online_email'  => env('ENABLE_STREAMER_ONLINE_EMAIL',true),

    /*
    |--------------------------------------------------------------------------
    | One Signal Configuration
    |--------------------------------------------------------------------------
    |
    */
    'onesignal' => [
        'app_id'        => env('ONESIGNAL_APP_ID'),
        'rest_api_key'  => env('ONESIGNAL_REST_API_KEY'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Configuration
    |--------------------------------------------------------------------------
    |
    */
    'redis'     => [
        'keys'  => [
            'banned'            => 'banned_',
            'sbanned'           => 'shadowbanned_',
            'profile'           => 'profile_',
            'feed'              => 'feed_',
            'widget'            => 'widget_',
            'alert_widgets'     => 'alert_widgets_',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Gallery Configuration
    |--------------------------------------------------------------------------
    |
    */
    'gallery' => [
        'fav_color' => 8,
        'image'     => [
            'variations' => 4
        ],
        'delete_album'              => 3,
        'explore_item_limit'        => 50,
        'gallery_item_limit'        => 30,
        'premium_upload_limit'      => 50,
        'gallery_upload_limit'      => 30,
        'free_upload_limit'         => 2,
        'artwork_upload_per_day'    => 100,
        'comment_per_post_per_day'  => 1000,
        'comment_per_user_per_post' => 100,
        'comment_per_duration'      => 10,
        'comment_duration'          => 5, // in mins
        'report_captcha'            => env('GALLERY_REPORT_CAPTCHA', false),
        'expired_views'             => 2, // in hours
        'view_update_time'          => 15, // in minutes
        'trending_days'             => env('GALLERY_TRENDING_DAYS', 1), // in hours
    ],

    /*
    |--------------------------------------------------------------------------
    | Chest Configuration
    |--------------------------------------------------------------------------
    |
    */
    'chest' => [
        'max_number_uploads_premium'            => env('CHEST_MAX_NUMBER_UPLOADS_PREMIUM', 10),
        'max_number_uploads_basic'              => env('CHEST_MAX_NUMBER_UPLOADS_BASIC', 1),
        'max_number_uploads_free'               => env('CHEST_MAX_NUMBER_UPLOADS_FREE', 1),
        'min_time_limit'                        => env('CHEST_MIN_TIME_LIMIT', 10),
        'max_number_contents_uploads_premium'   => env('CHEST_MAX_NUMBER_CONTENTS_UPLOADS_PREMIUM', 10),
        'max_number_contents_uploads_free'      => env('CHEST_MAX_NUMBER_CONTENTS_UPLOADS_FREE', 10),
        'max_number_contents_uploads_basic'     => env('CHEST_MAX_NUMBER_CONTENTS_UPLOADS_BASIC', 10),
        'size_contents_uploads_premium'         => env('CHEST_SIZE_CONTENTS_UPLOADS_PREMIUM', 250),
        'size_contents_uploads_free'            => env('CHEST_SIZE_CONTENTS_UPLOADS_FREE', 25),
        'size_contents_uploads_basic'           => env('CHEST_SIZE_CONTENTS_UPLOADS_BASIC', 25),
    ],

    /*
    |--------------------------------------------------------------------------
    | Minio Configuration
    |--------------------------------------------------------------------------
    |
    */
    'minio'     => [
        'bucket'    => 'ptvimages',
        'album'     => 'albums',
        'avatar'    => 'avatars',
        'emojis'    => 'emoticons',
        'contest'   => 'contests',
        'chest'     => 'chest',
        'stocks'    => 'stocks',
        'aimages'   => 'aimages',
        'asounds'   => 'asounds',
    ],

    /*
    |--------------------------------------------------------------------------
    | User Registration Configuration
    |--------------------------------------------------------------------------
    |
    */
    'user_registration_per_month'       => 2,
    'user_registration_per_month_gap'   => 1,

    /*
    |--------------------------------------------------------------------------
    | LoadBalancer Configuration
    |--------------------------------------------------------------------------
    |
    */
    'loadbalancer'  => [
        'url'       => 'edge1-us-losangeles.picarto.tv',
        'server'    => 'edge4-us-east'
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Widget Configuration
    |--------------------------------------------------------------------------
    |
    */
    'widget_settings' => [
        'message_format'    => '{name} : {amount}',
        'max_donation'      => 10,
        'text_scroll_speed' => 5,
        'text_color'        => '#e77b00',
        'name_color'        => '#ad1be5',
        'amount_color'      => '#1be594'
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Alert Configuration
    |--------------------------------------------------------------------------
    |
    */
    'alert_box_settings' => [
        'follow_enable'             => true,
        'follow_message_format'     => '{name} is now following!',
        'follow_text_animation'     => "tada",
        'follow_sound_volume'       => 50,
        'follow_alert_duration'     => 10,
        'follow_image_id'           => 1,
        'follow_sound_id'           => 1,
        'follow_font'               => 'Open Sans',
        'follow_font_size'          => 64,
        'follow_font_weight'        => 800,
        'follow_text_color'         => '#ffffff',
        'follow_text_highlight_color' => '#35A775',

        'subscription_enable'               => true,
        'subscription_message_format'       => '{name} subscribed to your channel!',
        'subscription_text_animation'       => "wave",
        'subscription_sound_volume'         => 50,
        'subscription_alert_duration'       => 10,
        'subscription_image_id'             => 1,
        'subscription_sound_id'             => 1,
        'subscription_font'                 => 'Open Sans',
        'subscription_font_size'            => 64,
        'subscription_font_weight'          => 800,
        'subscription_text_color'           => '#ffffff',
        'subscription_text_highlight_color' => '#35A775',

        'tipping_enable'               => true,
        'tipping_message_format'       => '{name} tipped you {amount} kudos!',
        'tipping_text_animation'       => "wobble",
        'tipping_sound_volume'         => 50,
        'tipping_alert_duration'       => 10,
        'tipping_min_amount_alert'     => 10,
        'tipping_tts_enable'           => 1,
        'tipping_tts_volume'           => 100,
        'tipping_image_id'             => 1,
        'tipping_sound_id'             => 1,
        'tipping_tts_voice'            => 2,
        'tipping_tts_lang'             => 'en',
        'tipping_font'                 => 'Open Sans',
        'tipping_font_size'            => 64,
        'tipping_font_weight'          => 800,
        'tipping_text_color'           => '#ffffff',
        'tipping_text_highlight_color' => '#35A775',
    ],

    /*
    |--------------------------------------------------------------------------
    | Text to Speech Configurations
    |--------------------------------------------------------------------------
    |
    */
    'tts_per_day_max_count' => 100,

    /*
    |--------------------------------------------------------------------------
    | Text to Speech Languages
    |--------------------------------------------------------------------------
    |
    */
    'tts_languages' => [
        'en' => 'English',
        'fr' => 'French',
        'de' => 'German',
        'pt' => 'Portuguese',
        'ru' => 'Russian',
        'es' => 'Spanish',
        'tr' => 'Turkish',
        'ja' => 'Japanese',
        'hi' => 'Hindi',
        'nl' => 'Dutch',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default direct message Configuration
    |--------------------------------------------------------------------------
    |
    */
    'dm_settings' => [
        'allow_message_every_one'   => false,
        'allow_message_subscriber'  => false,
        'show_read_receipts'        => true,
        'show_online_status'        => true,
        'show_last_online'          => true,
        'online'                    => false,
        'last_online'               => null,
    ],
];
