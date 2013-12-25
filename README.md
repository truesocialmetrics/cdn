TweeCdn
=======
Version 1.0.1 Created by Rostislav Mykhajliw [![Build Status](https://secure.travis-ci.org/necromant2005/cdn.png?branch=master)](https://travis-ci.org/necromant2005/cdn)

Introduction
------------

TweeCdn is a list of view helpers for support css/js/images links transformation due to rules.

Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)

Features / Goals
----------------

* Simple by adding ?timestamp marker to the end of file e.q. /css/test.css?1234567
* Release idenitify new static files version by given REVISION number e.q. /css/1234/test.css
* Hash build unique marker based on file md5 hash e.q. /css/af34c42/test.css.
  It allows users to load only changed files.
* Multiple hostnames supports e.q. host1.com, host2.com
* Hash generator

Installation
------------

### Main Setup

#### With composer

1. Add this project and [Cdn](https://github.com/necromant2005/cdn) in your composer.json:

    ```json
    "require": {
        "necromant2005/cdn": "@dev",
    }
    ```

2. Now tell composer to download TweeCdn by running the command:

    ```bash
    $ php composer.phar update
    ```

#### Post installation

Enabling it in your "application.config.php" file.

    ```php
    <?php
    return array(
        'modules' => array(
            // ...
            'TweeCdn',
        ),
        // ...
    );
    ```

#### Advanced configuration
* type - cdn type
* public_dir - path to public dir
* hostnames - list available hostnames
* hashes - hash list (file_path => hash)
* mapping - map specific to filepath to global CDNs: Google/NetDNA/MaxCDN

Options hostnames - support ALL cdn helpers.

1. Simple (default mode)
    Simple adds ?timestamp marker to the end of file
    Original
    ```bash
        /css/simple.css
    ```
    tranfromed to
    ```bash
        /css/simple.css?1353231966
    ```
    Configuration with mapping jquery to google CDN (https://developers.google.com/speed/libraries/devguide)
    ```php
    <?php
    return array(
        'di' => array(
            'instance' => array(
                'TweeCdn\\View\\Helper\\AbstractCdn' => array(
                    'parameters' => array(
                        // simple configuration
                        'type'    => 'simple',
                        'options' => array(
                            'public_dir' => __DIR__ . '/../../../../public',
                            'mappings' => array(
                                '/js/jquery.js' => '//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );
    ```

2. Release
    Release based helper puts release number stored in file "/RELEASE" right after first folder name. As result you have unique path every release. (RELEASE file by default created by [Remote multi-server automation tool - Capistrano](http://capistranorb.com/))
    Original
    ```bash
        /css/simple.css
    ```
    tranfromed to
    ```bash
        /css/1353231966/simple.css
    ```
    Configuration
    ```php
    <?php
    return array(
        'di' => array(
            'instance' => array(
                'TweeCdn\\View\\Helper\\AbstractCdn' => array(
                    'parameters' => array(
                        // simple configuration
                        'release'    => 'release',
                        'options' => array(
                            'public_dir' => __DIR__ . '/../../../../public',
                            'release' => trim(file_get_contents(__DIR__ . '/../../../../REVISION')),
                        ),
                    ),
                ),
            ),
        ),
    );
    ```

3. Hash
    Hash provides almost the same to "release" but uses unique file content hash. It can works in 2 mode:
    * dynamic - when hashed generates in fly
    * pre-compiled - by using existed hash map
    For "pre-compiled" mode you can generate hash map files by using script. it creates tmp/hashes.php files list. Eventully it makes application faster because you make less IO disk by skiping files md5 calculation every request.
    ```bash
    vendor/bin/hash_collector.php

    ```
    Original
    ```bash
        /css/simple.css
    ```
    tranfromed to
    ```bash
        /css/72e7d8fb348a326251c37821d1b6bfe16ea69d6e/simple.css
    ```
    Configuration sample with fail-back protection of missed tmp/hashes.php file and hostnames.
    The files will be spreaded by cdn-0 and cdn-1 by random depends on filename.
    ```php
    <?php
    return array(
        'di' => array(
            'instance' => array(
                'TweeCdn\\View\\Helper\\AbstractCdn' => array(
                    'parameters' => array(
                        // simple configuration
                        'release'    => 'hash',
                        'options' => array(
                            'public_dir' => __DIR__ . '/../../../../public',
                            'hostnames' => array('http://cdn-0.coockieless.domain.com', 'http://cdn-1.coockieless.domain.com'),
                            'hashes' => (file_exists(__DIR__ . '/../tmp/hashes.php')) ? include __DIR__ . '/../tmp/hashes.php' : array(),
                        ),
                    ),
                ),
            ),
        ),
    );
    ```
