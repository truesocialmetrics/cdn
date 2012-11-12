<?php
namespace TweeTest\View\Helper\AbstractCdnTest;
use Twee\View\Helper\Cdn\AbstractCdn as CdnAbstractCdn;

class AbstractCdnImplementation extends CdnAbstractCdn
{
	public function __invoke($filename)
	{
		return $this->decorate($filename);
	}
}