<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\Repository\ProductRepository;
use AppBundle\VO\PaginatorVO;
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
	 * @Route("/vyber/{slug}/{page}", name="category_detail", requirements={"page": "\d+"})
	 * @Template("category/detail.html.twig")
	 *
	 * @param Request $request
	 * @param string $slug
	 * @param int $page
	 * @return array
	 */
	public function categoryDetail(Request $request, $slug, $page = 1)
	{
		$category = $this->getDoctrine()->getRepository(Category::class)->findOneBySlug($slug);

		if (!$category) {
			throw new NotFoundHttpException("Kategorie neexistuje");
		}

		$limit = ProductRepository::PRODUCTS_PER_PAGE;

		$paginator = $this->getDoctrine()->getRepository(Product::class)->findByCategory(
			$category,
			$page,
			$limit
		);

		$paginatorVO = PaginatorVO::create($paginator, $page, $limit, $request->get('_route'));

		return [
			"category" => $category,
			"categories" => $this->getDoctrine()->getRepository(Category::class)->findByParentCategory($category),
			"products" => $paginator->getIterator(),
			"paginatorVO" => $paginatorVO,
		];
	}

}
