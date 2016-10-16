<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Category;
use AppBundle\Repository\CategoryRepository;

class CategoryFacade {

	private $categoryRepository;

	public function __construct(CategoryRepository $categoryRepository) {
		$this->categoryRepository = $categoryRepository;
	}

	/** @return Category */
	public function getBySlug($slug) {
		return $this->categoryRepository->findOneBy([
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
	public function getTopLevelCategories() {
		return $this->categoryRepository->findBy(
			[
				"level" => 0,
			],
			[
				"rank" => "desc",
			]
		);
	}

}