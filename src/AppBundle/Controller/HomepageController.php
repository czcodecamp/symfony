<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use AppBundle\Facade\CategoryFacade;
use AppBundle\Facade\ProductFacade;
use AppBundle\Facade\UserFacade;
use AppBundle\Service\Paginator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 * @Route(service="app.controller.homepage_controller")
 */
class HomepageController
{

	private $productFacade;
	private $categoryFacade;
	private $userFacade;

	public function __construct(
		ProductFacade $productFacade,
		CategoryFacade $categoryFacade,
		UserFacade $userFacade
	) {

		$this->productFacade = $productFacade;
		$this->categoryFacade = $categoryFacade;
		$this->userFacade = $userFacade;
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
			"categories" => $this->categoryFacade->getTopLevelCategories(Category::TYPE_PRODUCT),
			"currentPage" => $page,
			"totalPages" => $paginator->getTotalPageCount(),
			"pageRange" => $paginator->getPageRange(5),
			"user" => $this->userFacade->getUser(),
		];
	}

}
