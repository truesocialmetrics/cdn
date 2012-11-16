TweeCdn
=======
Version 1.0.0 Created by Rostislav Mykhajliw [![Build Status](https://secure.travis-ci.org/necromant2005/cdn.png?branch=master)](https://travis-ci.org/necromant2005/cdn)

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

Enabling it in your `application.config.php`file.

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
1. Simple (by default mode)

2. Release

3. Hash
