<?php

return array(
    'max_file_size' => 15000,
    'sharex_config' => [
        'DestinationType' => 'ImageUploader',
        'RequestURL' => url('api/images/upload'),
        'FileFormName' => 'image',
        'Headers' => [
            'Authorization' => 'Bearer YOURTOKENHERE',
        ],
        'RegexList' => ["\\\"filename\\\":\\\"(.+?)\\\""],
        'URL' => url(''). '$regex:1,1$',
        'DeletionURL' => url('/d/'). '$regex:1,1$'
    ],
);