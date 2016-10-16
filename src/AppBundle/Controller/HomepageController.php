<?php
namespace AppBundle\Controller;
use AppBundle\Facade\CategoryFacade;
use AppBundle\Facade\ProductFacade;
use AppBundle\Service\Paginator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Jan Klat <jenik@klatys.cz>
 * @Route(service="app.controller.homepage_controller")
 */
class HomepageController
{

	private $productFacade;
	private $categoryFacade;

	public function __construct(
		ProductFacade $productFacade,
		CategoryFacade $categoryFacade
	) {

		$this->productFacade = $productFacade;
		$this->categoryFacade = $categoryFacade;
	}

	/**
	 * @Route("/", name="homepage")
	 * @Template("homepage/homepage.html.twig")
	 */
	public function homepageAction(Request $request)
	{
		$page = intval($request->get('page', 1));
		$count = $this->productFacade->countAllProducts();
		$paginator = new Paginator($count, 6);
		$paginator->setCurrentPage($page);

		return [
			"products" => $this->productFacade->getAll($paginator->getLimit(), $paginator->getOffset()),
			"categories" => $this->categoryFacade->getTopLevelCategories(),
			"currentPage" => $page,
			"totalPages" => $paginator->getTotalPageCount(),
			"pageRange" => $paginator->getPageRange(5),
		];
	}

}
