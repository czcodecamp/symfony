<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @author Jan Klat <jenik@klatys.cz>
 */
class HomepageController extends Controller
{

	/**
	 * @Route("/", name="homepage")
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function homepageAction(Request $request)
	{
		$page = 1;
		if ($request->query->has('page')) {
			$page = $request->query->get('page');
		}

		$productRepository = $this->container->get('doctrine.orm.entity_manager')->getRepository
		('AppBundle\Entity\Product');

		$limit = 9;
		$paginatedProducts = $this->paginate($productRepository->getAllProducts(), $page, $limit);
		$maxPages = ceil($paginatedProducts->count() / $limit);

		$categoryRepository = $this->container->get('doctrine.orm.entity_manager')->getRepository
		('AppBundle\Entity\Category');

		$breadcrumbs = [
			"homepage" => ["title" => "Úvodní stránka"]
		];

		return $this->render("homepage/homepage.html.twig", [
			"page" => $page,
			"maxPages" => $maxPages,
			"products" => $paginatedProducts,
			"categories" => $categoryRepository->getAllCategories(),
			"breadcrumbs" => $breadcrumbs
		]);
	}

	/**
	 * Paginator Helper
	 * Source: https://anil.io/blog/symfony/doctrine/symfony-and-doctrine-pagination-with-twig/
	 *
	 * Pass through a query object, current page & limit
	 * the offset is calculated from the page and limit
	 * returns an `Paginator` instance, which you can call the following on:
	 *
	 *     $paginator->getIterator()->count() # Total fetched (ie: `5` posts)
	 *     $paginator->count() # Count of ALL posts (ie: `20` posts)
	 *     $paginator->getIterator() # ArrayIterator
	 *
	 * @param Doctrine\ORM\Query $dql   DQL Query Object
	 * @param integer            $page  Current page (defaults to 1)
	 * @param integer            $limit The total number per page (defaults to 5)
	 *
	 * @return \Doctrine\ORM\Tools\Pagination\Paginator
	 */
	private function paginate($dql, $page = 1, $limit = 9)
	{
		$paginator = new Paginator($dql);

		$paginator->getQuery()
			->setFirstResult($limit * ($page - 1)) // Offset
			->setMaxResults($limit); // Limit

		return $paginator;
	}
}