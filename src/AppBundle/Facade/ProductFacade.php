<?php

namespace AppBundle\Facade;

use AppBundle\Entity\Category;
use AppBundle\Repository\ProductRepository;

class ProductFacade {

	private $productRepository;

	public function __construct(ProductRepository $productRepository) {
		$this->productRepository = $productRepository;
	}

	public function findByCategory(Category $category) {
		return $this->productRepository->findByCategory($category);
	}

	public function getBySlug($slug) {
		return $this->productRepository->findOneBy([
			"slug" => $slug,
		]);
	}

	public function getAll() {
		return $this->productRepository->findBy(
			[],
			[
				"rank" => "desc"
			],
			21
		);
	}


}