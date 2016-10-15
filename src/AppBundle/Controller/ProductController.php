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
class ProductController extends Controller
{

	/**
	 * @Route("/product/{slug}", name="product_detail")
	 * @Template("product/detail.html.twig")
	 *
	 * @param Request $request
	 * @return array
	 */
	public function productDetailAction(Request $request)
	{
		$product = $this->getDoctrine()->getRepository(Product::class)->findOneBy([
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
