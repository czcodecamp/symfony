<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * @author Jan Klat <jenik@klatys.cz>
 * @Route(service="app.controller.product_controller")
 */
class ProductController
{
	/**
	 * @var EntityManager
	 */
	private $entityManager;

	public function __construct(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}
	/**
	 * @Route("/product/{slug}", name="product_detail")
	 * @Template("product/detail.html.twig")
	 */
	public function productDetailAction(Request $request)
	{
		$product = $this->entityManager->getRepository(Product::class)->findOneBy([
			"slug" => $request->attributes->get("slug"),
		]);
		if (!$product) {
			throw new NotFoundHttpException("Produkt neexistuje");
		}

		return [
			"product" => $product,
		];
	}

}
