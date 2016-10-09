<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\VO\Breadcrumb;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Jan Klat <jenik@klatys.cz>
 */
class ProductController extends Controller
{

	/**
	 * @Route("/product/{slug}", name="product_detail")
	 * @param Request $request
	 * @return Response
	 */
	public function productDetailAction(Request $request)
	{
		/** @var Product $product */
		$product = $this->getDoctrine()->getRepository(Product::class)->findOneBy([
			"slug" => $request->attributes->get("slug"),
		]);
		if (!$product) {
			throw new NotFoundHttpException("Produkt neexistuje");
		}

		$breadcrumbs = [];
		$category = $product->getCategory();
		do {
			array_unshift($breadcrumbs, new Breadcrumb($category->getTitle(), $category->getSlug()));
		} while ($category = $category->getParent());

		return $this->render("product/detail.html.twig", [
			"product" => $product,
			"breadcrumbs" => $breadcrumbs,
			"categories" => $this->getDoctrine()->getRepository(Category::class)->findBy(
				[
					"parentId" => null
				],
				[
					"rank" => "desc",
				]
			),
		]);

	}

}
