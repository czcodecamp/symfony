<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Jan Klat <jenik@klatys.cz>
 */
class CategoryController extends Controller
{
	/**
	 * @Route("/vyber/{slug}", name="category_detail")
	 * @Template("category/detail.html.twig")
	 *
	 * @param Request $request
	 * @return array
	 */
	public function categoryDetail(Request $request)
	{
		$category = $this->getDoctrine()->getRepository(Category::class)->findOneBy([
			"slug" => $request->attributes->get("slug"),
		]);

		if (!$category) {
			throw new NotFoundHttpException("Kategorie neexistuje");
		}

		// paginator
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = 'SELECT p
			FROM AppBundle\Entity\Product p
			JOIN AppBundle\Entity\ProductCategory pc WITH p = pc.product
			JOIN AppBundle\Entity\Category c WITH pc.category = c
			WHERE c.left >= :lft and c.right <= :rgt
			GROUP BY p';
        $query = $em->createQuery($dql)
            ->setParameter("lft", $category->getLeft())
            ->setParameter("rgt", $category->getRight());
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1) /*page number*/,
            6 /*limit per page*/
        );

		return [
		    "pagination" => $pagination,
			"categories" => $this->getDoctrine()->getRepository(Category::class)->findBy(
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
