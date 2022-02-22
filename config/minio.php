<?php
return [
    'url'          => env('MINIO_URL','https://api.minio.diagonal.solutions/api/v1/upload/'), // Minio base url
    /*
     * Minio bucket configuration
     */
    'buckets'      => [
        'default'   => 'ptvimages'
    ]
];
