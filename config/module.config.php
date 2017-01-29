<?php
return [
    'di' => [
        'instance' => [
            'TweeCdn\View\Helper\Cdn' => [
                'parameters' => [
                    'type'    => 'simple',

                    // 'type'    => 'release',
                    // 'options' => [
                    //     'release'  => '2017-01-01-11-11-11',
                    // ],

                    // 'type'    => 'hash',
                    // 'options' => [
                    //     'hostnames'  => ['host' => 'http://cdn.domain'],
                    //     'public_dir' => __DIR__ . '/../../public',
                    //     'hashes'     => ['/css/main.css' => '123'],
                    //     'mappings'   => ['/css/static.css' => '/css/static-compiled-compressed.css'],
                    // ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            'cdn' => 'TweeCdn\View\Helper\Factory\CdnFactory',
        ],
    ],
    'view_helpers' => [
        'factories' => [
            'cdn' => 'TweeCdn\View\Helper\Factory\CdnFactory',
        ],
    ],
];