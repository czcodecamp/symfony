<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Category;
use AppBundle\Repository\CategoryRepository;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 */
class CategoryFacade {

	private $categoryRepository;

	public function __construct(CategoryRepository $categoryRepository) {
		$this->categoryRepository = $categoryRepository;
	}

	/** @return Category */
	public function getBySlug($type, $slug) {
		return $this->categoryRepository->findOneBy([
			"type" => $type,
			"slug" => $slug,
		]);

	}

	/** @return Category[] */
	public function getParentCategories(Category $category) {
		return $this->categoryRepository->findBy(
			[
				"parentCategory" => $category,
			],
			[
				"rank" => "desc",
			]
		);
	}

	/** @return Category[] */
	public function getTopLevelCategories($type) {
		return $this->categoryRepository->findBy(
			[
				"type" => $type,
				"level" => 0,
			],
			[
				"rank" => "desc",
			]
		);
	}

}
