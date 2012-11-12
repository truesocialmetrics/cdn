<?php
return array(
	'di' => array(
		'definition' => array(
			'Twee\View\Helper\Cdn' => array(
				'instantiator' => array(
					'Twee\View\Helper\CdnFactory',
					'factory',
				),
			),
		),
        'instance' => array(
            'Twee\\View\\Helper\\Cdn' => array(
                'parameters' => array(
                	// simple configuration
                	'type'    => 'simple',
                    'options' => array('public_dir' => __DIR__ . '/../../../public'),

                    // release configuration
                	//'type'    => 'release',
                    //'options' => array(
                    //    'public_dir' => __DIR__ . '/../../../public',
                    //    // capistratno deploy revision
                    //	  'release' => trim(file_get_contents(__DIR__ . '/../../../REVISION')),
                    //),

                    // hash configuration
                	//'type'    => 'hash',
                    //'options' => array(
                    //	'public_dir' => __DIR__ . '/../../../public',
                    //	'hashes' => include __DIR__ . '/../tmp/hashes.php',
                    //),
                ),
            ),
            'alias' => array(
                'Cdn' => 'Twee\\View\\Helper\\Cdn',
            ),
        ),
    )
);