<?php
return [
    'url'          => env('MINIO_URL','https://api.minio.diagonal.solutions/api/v1/upload/'),
    'buckets'      => [
        'default'   => 'ptvimages'
    ]
];
