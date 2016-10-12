<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Jan Klat <jenik@klatys.cz>
 */
class HomepageController extends Controller
{
	/**
	 * @Route("/", name="homepage")
	 * @Template("homepage/homepage.html.twig")
	 */
	public function homepageAction()
	{
		return [
			"products" => $this->getDoctrine()->getRepository(Product::class)->findBy(
				[],
				[
					"rank" => "desc"
				],
				21
			),
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
