<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * @author Jan Klat <jenik@klatys.cz>
 */
class ProductController extends Controller
{

	/**
	 * @Route("/product/{slug}", name="product_detail")
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function productDetailAction(Request $request)
	{
		$product = $this->getDoctrine()->getRepository(Product::class)->findOneBy([
			"slug" => $request->attributes->get("slug"),
		]);
		if (!$product) {
			throw new NotFoundHttpException("Produkt neexistuje");
		}

		return $this->render("product/detail.html.twig", [
			"product" => $product,
			"categories" => $this->getDoctrine()->getRepository(Category::class)->findBy(
				[],
				[
					"rank" => "desc",
				]
			),
		]);

	}

}