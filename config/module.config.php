<?php
return array(
    'di' => array(
        'definition' => array(
            'class' => array(
                'TweeCdn\View\Helper\Cdn\AbstractCdn' => array(
                    'instantiator' => array(
                        'TweeCdn\View\Helper\CdnFactory',
                        'factory',
                    ),
                ),
                'TweeCdn\View\Helper\CdnFactory' => array(
                    'factory' => array(
                        'type' => array('type'=>'string', 'required' => true),
                        'options' => array('type'=>'array', 'required' => true),
                    ),
                ),
            ),
        ),
        'instance' => array(
            'TweeCdn\\View\\Helper\\Cdn' => array(
                'parameters' => array(
                    // simple configuration
                    'type'    => 'simple',
                    'options' => array('public_dir' => __DIR__ . '/../../../../public'),

                    // release configuration
                    //'type'    => 'release',
                    //'options' => array(
                    //    'public_dir' => __DIR__ . '/../../../../public',
                    //    'release' => trim(file_get_contents(__DIR__ . '/../../../../REVISION')),
                    //),

                    // hash configuration
                    //'type'    => 'hash',
                    //'options' => array(
                    //  'public_dir' => __DIR__ . '/../../../../public',
                    //  'hashes' => (file_exists(__DIR__ . '/../tmp/hashes.php')) ? include __DIR__ . '/../tmp/hashes.php' : array(),
                    //),
                ),
            ),
            'alias' => array(
                'cdn' => 'TweeCdn\View\Helper\Cdn\AbstractCdn',
            ),
        ),
    )
);
