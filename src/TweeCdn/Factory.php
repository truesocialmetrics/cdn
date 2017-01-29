<?php
namespace TweeCdn;

use TweeCdn\View\Helper\Cdn;
use InvalidArgumentException;

class Factory
{
    public static function factory(string $name, array $options) : Cdn\AbstractCdn
    {
     if ($name == 'simple') {
         return new Cdn\Simple($options);
     }
     if ($name == 'release') {
         return new Cdn\Release($options);
     }
     if ($name == 'hash') {
         return new Cdn\Hash($options);
     }

     throw new InvalidArgumentException('Unknow exctention ' . $name);
    }
}