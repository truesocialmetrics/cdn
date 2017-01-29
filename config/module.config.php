<?php
return [
    'di' => [
        'instance' => [
            'TweeCdn\View\Helper\Cdn' => [
                'parameters' => [
                    'type'    => 'simple',
                    'options' => [
                        'public_dir' => __DIR__ . '/../../../../public',
                        'mappings'   => ['/css/static.css' => '/css/static-compiled-compressed.css'],
                    ],

                    // 'type'    => 'release',
                    // 'options' => [
                    //     'release'  => '2017-01-01-11-11-11',
                    //     'mappings'   => ['/css/static.css' => '/css/static-compiled-compressed.css'],
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
            'cdn' => 'TweeCdn\ServiceManager\View\Helper\Factory\CdnFactory',
        ],
    ],
    'view_helpers' => [
        'factories' => [
            'cdn' => 'TweeCdn\ServiceManager\View\Helper\Factory\CdnFactory',
        ],
    ],
];