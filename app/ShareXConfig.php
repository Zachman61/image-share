<?php

namespace App;


class ShareXConfig
{
    static function getShareXConfig()
    {
        return [
            'DestinationType' => 'ImageUploader',
            'RequestURL' => url('api/images/upload'),
            'FileFormName' => 'image',
            'Headers' => [
                'Authorization' => 'Bearer YOURTOKENHERE',
            ],
            'RegexList' => ["\\\"filename\\\":\\\"(.+?)\\\""],
            'URL' => url(''). '$regex:1,1$',
            'DeletionURL' => url('/d/'). '$regex:1,1$'
        ];
    }
}