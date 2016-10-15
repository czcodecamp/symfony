<?php

namespace AppBundle\Controller;

use AppBundle\Facade\CategoryFacade;
use AppBundle\Facade\ProductFacade;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Jan Klat <jenik@klatys.cz>
 * @Route(service="app.controller.category_controller")
 */
class CategoryController
{
	private $categoryFacade;
	private $productFacade;

	public function __construct(
		CategoryFacade $categoryFacade,
		ProductFacade $productFacade
	) {

		$this->categoryFacade = $categoryFacade;
		$this->productFacade = $productFacade;
	}
	/**
	 * @Route("/vyber/{slug}", name="category_detail")
	 * @Template("category/detail.html.twig")
	 */
	public function categoryDetail($slug)
	{
		$category = $this->categoryFacade->getBySlug($slug);

		if (!$category) {
			throw new NotFoundHttpException("Kategorie neexistuje");
		}

		return [
			"products" => $this->productFacade->findByCategory($category),
			"categories" => $this->categoryFacade->getParentCategories($category),
			"category" => $category,
		];
	}

}
