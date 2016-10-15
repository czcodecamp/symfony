<?php
namespace AppBundle\VO;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 */
class PaginatorVO
{

	/**
	 * @var string
	 */
	protected $routeName;

	/**
	 * @var int
	 */
	protected $page;

	/**
	 * @var int
	 */
	protected $maxPages;

	/**
	 * @var int
	 */
	protected $from;

	/**
	 * @var int
	 */
	protected $to;

	/**
	 * @var $int
	 */
	protected $count;

	/**
	 * @var int
	 */
	protected $totalCount;


	/**
	 * PaginatorVO constructor.
	 * @param string $routeName
	 * @param int $page
	 * @param int $limit
	 * @param int $count
	 * @param int $totalCount
	 */
	private function __construct($routeName, $page, $limit, $count, $totalCount)
	{
		$this->page = $page;
		$this->maxPages = ceil($totalCount / $limit);
		if ($this->page > $this->maxPages) {
			throw new NotFoundHttpException("Stránka neexistuje");
		}
		$this->routeName = $routeName;
		$this->count = $count;
		$this->totalCount = $totalCount;
		$this->to = min((($this->page) * $limit), $this->totalCount);
		$this->from = $this->to - $count + 1;
	}

	/**
	 * @param Paginator $paginator
	 * @param int $page
	 * @param int $limit
	 * @param string $routeName
	 * @return PaginatorVO
	 */
	public static function create(Paginator $paginator, $page, $limit, $routeName)
	{
		return new self(
			$routeName,
			$page,
			$limit,
			$paginator->getIterator()->count(),
			$paginator->count()
		);
	}

	/**
	 * @return string
	 */
	public function getRouteName()
	{
		return $this->routeName;
	}

	/**
	 * @return int
	 */
	public function getPage()
	{
		return $this->page;
	}

	/**
	 * @return int
	 */
	public function getMaxPages()
	{
		return $this->maxPages;
	}

	/**
	 * @return int
	 */
	public function getFrom()
	{
		return $this->from;
	}

	/**
	 * @return int
	 */
	public function getTo()
	{
		return $this->to;
	}

	/**
	 * @return mixed
	 */
	public function getCount()
	{
		return $this->count;
	}

	/**
	 * @return int
	 */
	public function getTotalCount()
	{
		return $this->totalCount;
	}

}
