<?php
namespace TweeCdn\View\Helper\Cdn;
use Zend\Stdlib\AbstractOptions,
	Zend\View\Helper\HelperInterface,
	Zend\View\Renderer\RendererInterface;

abstract class AbstractCdn extends AbstractOptions implements HelperInterface
{
	private $hostnames = array();

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
		$this->hostnames = $hostnames;
	}

	public function getHostnames()
	{
		return $this->hostnames;
	}

	public function setPublicDir($dir)
	{
		$this->publicDir = $dir;
	}

	public function getPublicDir()
	{
		return $this->publicDir;
	}

	public function decorate($filename)
	{
		$hostnames = $this->getHostnames();
		if (empty($hostnames)) return $filename;

		return $hostnames[crc32($filename) % count($hostnames)] . $filename;
	}

	abstract public function __invoke($filename);
}