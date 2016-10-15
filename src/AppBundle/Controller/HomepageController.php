<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @author Jan Klat <jenik@klatys.cz>
 * @Route(service="app.controller.homepage_controller")
 */
class HomepageController
{

	private $entityManager;

	public function __construct(EntityManager $entityManager) {

		$this->entityManager = $entityManager;
	}

	/**
	 * @Route("/", name="homepage")
	 * @Template("homepage/homepage.html.twig")
	 */
	public function homepageAction()
	{
		return [
			"products" => $this->entityManager->getRepository(Product::class)->findBy(
				[],
				[
					"rank" => "desc"
				],
				21
			),
			"categories" => $this->entityManager->getRepository(Category::class)->findBy(
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
