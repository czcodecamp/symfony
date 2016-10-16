<?php

namespace AppBundle\Service;

class Paginator {

	private $currentPage;
	private $totalPageCount;
	private $perPageCount;

	public function __construct($totalCount, $perPageCount) {
		$this->totalPageCount = ceil($totalCount / $perPageCount);
		$this->totalCount = $totalCount;
		$this->perPageCount = $perPageCount;
		$this->currentPage = 1;
	}

	public function setCurrentPage($currentPage) {
		$this->currentPage = $currentPage;
	}

	public function getLimit() {
		return $this->perPageCount;
	}

	public function getOffset() {
		return ($this->currentPage - 1) * $this->perPageCount;
	}

	public function getPageRange($showPagesCount) {
		$rangeCeil = ceil($showPagesCount / 2);
		$rangeFloor = floor($showPagesCount / 2);
		if ($this->currentPage < $rangeCeil) {
			return range(1, min($this->totalPageCount, $showPagesCount));
		}

		if ($this->currentPage > $this->totalPageCount - $rangeFloor) {
			return range(max($this->totalPageCount - $showPagesCount -1, 1), $this->totalPageCount);
		}
		$min = max($this->currentPage - $rangeFloor, 1);
		$max = min($this->currentPage + $rangeFloor, $this->totalPageCount);

		return range($min, $max);
	}

	public function getTotalPageCount() {
		return $this->totalPageCount;
	}
}