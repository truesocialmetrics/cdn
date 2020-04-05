<?php
namespace TweeCdn\View\Helper\Cdn;

use TweeCdn\View\Helper\Cdn;
use InvalidArgumentException;

class Factory
{
    public static function factory(string $name, array $options) : Cdn\AbstractCdn
    {
     if ($name == 'simple') {
         return new Simple($options);
     }
     if ($name == 'release') {
         return new Release($options);
     }
     if ($name == 'hash') {
         return new Hash($options);
     }

     throw new InvalidArgumentException('Unknow extension ' . $name);
    }
}
