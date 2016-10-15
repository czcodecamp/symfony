<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\VO\BreadcrumbVO;
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
	 * @param string $slug
	 * @return array
	 */
	public function productDetailAction($slug)
	{
		$product = $this->getDoctrine()->getRepository(Product::class)->findOneBySlug($slug);
		if (!$product) {
			throw new NotFoundHttpException("Produkt neexistuje");
		}

		$category = $this->getDoctrine()->getRepository(Category::class)->findOneByProduct($product);

		$breadcrumb = $this->getDoctrine()->getRepository(Category::class)->findBreadCrumbPath($category);

		return [
			"product" => $product,
			"category" => $category,
			"categories" => $this->getDoctrine()->getRepository(Category::class)->findByParentCategory($category),
			"breadcrumbVO" => BreadcrumbVO::create($breadcrumb, $product),
		];

	}

}
