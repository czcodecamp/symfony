<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\Repository\ProductRepository;
use AppBundle\VO\PaginatorVO;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Jan Klat <jenik@klatys.cz>
 */
class HomepageController extends Controller
{
	/**
	 * @Route("/{page}", name="homepage", requirements={"page": "\d+"})
	 * @Template("homepage/homepage.html.twig")
	 *
	 * @param Request $request
	 * @param int $page
	 * @return array
	 */
	public function homepageAction(Request $request, $page = 1)
	{
		$limit = ProductRepository::PRODUCTS_PER_PAGE;

		$paginator = $this->getDoctrine()->getRepository(Product::class)->findAllProducts($page, $limit);

		$paginatorVO = PaginatorVO::create($paginator, $page, $limit, $request->get('_route'));

		return [
			"categories" => $this->getDoctrine()->getRepository(Category::class)->findTopCategories(),
			"products" => $paginator->getIterator(),
			"paginatorVO" => $paginatorVO,
		];
	}

}
