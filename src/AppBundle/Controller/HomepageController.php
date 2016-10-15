<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
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
	 * @Route("/", name="homepage")
	 * @Template("homepage/homepage.html.twig")
	 * @param Request $request

	 */
	public function homepageAction(Request $request)
	{
		/* viz https://anil.io/blog/symfony/doctrine/symfony-and-doctrine-pagination-with-twig/ */

		if(!$thisPage = $request->get("page")) $thisPage = 1;

	    $posts = $this->getDoctrine()->getRepository(Product::class)->getAllProducts($thisPage);
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
					"level" => 0,
				],
				[
					"rank" => "desc",
				]
			),
		];
	}

}
