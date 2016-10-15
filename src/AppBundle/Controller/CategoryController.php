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

		if(!$thisPage = $request->get("page")) $thisPage = 1;

	    $posts = $this->getDoctrine()->getRepository(Product::class)->findByCategory($category, $thisPage);
	    $totalPostsReturned = $posts->getIterator()->count();
	    $totalPosts = $posts->count();
	    $iterator = $posts->getIterator();

	    $limit = 5;
	    $maxPages = ceil($totalPosts / $limit);

		return [
			"thisPage" => $thisPage,
			"products" => $iterator,
			"maxPages" => $maxPages,
			
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
