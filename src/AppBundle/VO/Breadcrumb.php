<?php
namespace AppBundle\VO;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 */
class Breadcrumb
{

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $slug;

	/**
	 * Breadcrumb constructor.
	 * @param string $title
	 * @param string $slug
	 */
	public function __construct($title, $slug)
	{
		$this->title = $title;
		$this->slug = $slug;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

}
