<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
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
	    $slug = $request->attributes->get("slug");

	    /** @var Product $product */
		$product = $this->getDoctrine()->getRepository(Product::class)->findBySlug($slug);
		if (!$product) {
			throw new NotFoundHttpException("Produkt neexistuje");
		}

		return $this->render("product/detail.html.twig", [
			"product" => $product,
            "ancestor" => $product->getCategory(),
			"categories" => $this->getDoctrine()->getRepository(Category::class)->childrenHierarchy(),
		]);

	}

}