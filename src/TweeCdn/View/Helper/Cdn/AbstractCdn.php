<?php
namespace TweeCdn\View\Helper\Cdn;
use Zend\Stdlib\AbstractOptions,
	Zend\View\Helper\HelperInterface,
	Zend\View\Renderer\RendererInterface,
	InvalidArgumentException;

abstract class AbstractCdn extends AbstractOptions implements HelperInterface
{
	private $hostnames = [];

	private $mappings  = [];

	private $publicDir = '';

	private $view = null;

	public function setView(RendererInterface $view)
	{
		$this->view = $view;
	}

	public function getView() : RendererInterface
	{
		return $this->view;
	}

	public function setHostnames(array $hostnames)
	{
		$this->hostnames = array_values($hostnames);
	}

	public function getHostnames() : array
	{
		return $this->hostnames;
	}

	public function setMappings(array $mappings)
	{
		$this->mappings = $mappings;
	}

	public function getMappings() : array
	{
		return $this->mappings;
	}

	public function setPublicDir(string $dir)
	{
		$this->publicDir = $dir;
	}

	public function getPublicDir() : string
	{
		return $this->publicDir;
	}

	public function __invoke($filename) : string
	{
		// mappings global cdn like google-cdn for jquery
		$mappings = $this->getMappings();
		if (array_key_exists($filename, $mappings)) {
			return $mappings[$filename];
		}

		// decorate specific filename by rules
		$filename = $this->decorate($filename);

		// prepent hostnames
		$hostnames = $this->getHostnames();
		if (empty($hostnames)) return $filename;
		return $hostnames[crc32($filename) % count($hostnames)] . $filename;
	}

	abstract public function decorate($filename);

}