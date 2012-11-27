<?php
namespace TweeCdnTest\View\Helper\AbstractCdnTest;
use TweeCdn\View\Helper\Cdn\AbstractCdn as CdnAbstractCdn;

class AbstractCdnImplementation extends CdnAbstractCdn
{
	public function decorate($filename)
	{
		return $filename;
	}
}