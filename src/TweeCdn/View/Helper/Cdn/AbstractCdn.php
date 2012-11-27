<?php
namespace TweeCdn\View\Helper\Cdn;
use Zend\Stdlib\AbstractOptions,
	Zend\View\Helper\HelperInterface,
	Zend\View\Renderer\RendererInterface,
	InvalidArgumentException;

abstract class AbstractCdn extends AbstractOptions implements HelperInterface
{
	private $hostnames = array();

	private $mappings  = array();

	private $publicDir = '';

	private $view = null;

	public function setView(RendererInterface $view)
	{
		$this->view = $view;
	}

	public function getView()
	{
		return $this->view;
	}

	public function setHostnames(array $hostnames)
	{
		$this->hostnames = array_values($hostnames);
	}

	public function getHostnames()
	{
		return $this->hostnames;
	}

	public function setMappings(array $mappings)
	{
		$this->mappings = $mappings;
	}

	public function getMappings()
	{
		return $this->mappings;
	}

	public function setPublicDir($dir)
	{
		$this->publicDir = $dir;
	}

	public function getPublicDir()
	{
		return $this->publicDir;
	}

	public function __invoke($filename)
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