<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Jan Klat <jenik@klatys.cz>
 * @Route(service="app.controller.category_controller")
 */
class CategoryController
{
	/**
	 * @var EntityManager
	 */
	private $entityManager;

	public function __construct(EntityManager $entityManager) {

		$this->entityManager = $entityManager;
	}
	/**
	 * @Route("/vyber/{slug}", name="category_detail")
	 * @Template("category/detail.html.twig")
	 */
	public function categoryDetail(Request $request)
	{
		$category = $this->entityManager->getRepository(Category::class)->findOneBy([
			"slug" => $request->attributes->get("slug"),
		]);

		if (!$category) {
			throw new NotFoundHttpException("Kategorie neexistuje");
		}

		return [
			"products" => $this->entityManager->getRepository(Product::class)->findByCategory($category),
			"categories" => $this->entityManager->getRepository(Category::class)->findBy(
				[
					"parentCategory" => $category,
				],
				[
					"rank" => "desc",
				]
			),
			"category" => $category,
		];
	}

}
