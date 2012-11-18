<?php
namespace TweeCdn\View\Helper;
use InvalidArgumentException;

class CdnFactory
{
	public static function factory($name, array $options)
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