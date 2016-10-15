<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\Facade\CategoryFacade;
use AppBundle\Facade\ProductFacade;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
	public function homepageAction()
	{
		return [
			"products" => $this->productFacade->getAll(),
			"categories" => $this->categoryFacade->getTopLevelCategories(),
		];
	}

}
