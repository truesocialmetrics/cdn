<?php
namespace TweeCdn\View\Helper\Cdn;
use Laminas\Stdlib\AbstractOptions,
	Laminas\View\Helper\HelperInterface,
	Laminas\View\Renderer\RendererInterface,
	InvalidArgumentException;

abstract class AbstractCdn extends AbstractOptions implements HelperInterface
{
	private array $hostnames = [];

	private array $mappings  = [];

	private string $publicDir = '';

	private $view = null;

	public function setView(RendererInterface $view) : void
	{
		$this->view = $view;
	}

	public function getView() : RendererInterface
	{
		return $this->view;
	}

	public function setHostnames(array $hostnames) : void
	{
		$this->hostnames = array_values($hostnames);
	}

	public function getHostnames() : array
	{
		return $this->hostnames;
	}

	public function setMappings(array $mappings) : void
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

	public function __invoke(string $filename) : string
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

	abstract public function decorate(string $filename) : string;

}
