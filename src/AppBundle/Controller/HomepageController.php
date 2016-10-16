<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utils\PaginatorHelper;
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
                $page = $request->query->get('page');

		$paginator = new PaginatorHelper;
                $products = $this->getDoctrine()->getRepository(Product::class)->countAll();
		$paginator->setItemCount($products);
		$itemsPerPage = 2;
		$paginator->setItemsPerPage($itemsPerPage);
		$paginator->setPage($page);   

		return [
			"products" => $this->getDoctrine()->getRepository(Product::class)->findBy(
				[],
				[
					"rank" => "desc"
				],
				$paginator->getLength(),
                                $paginator->getOffset()
			),
			"categories" => $this->getDoctrine()->getRepository(Category::class)->findBy(
				[
					"level" => 0,
				],
				[
					"rank" => "desc",
				]
			),
			"paginator" => $paginator,
			"showPage" => $paginator->getPageOffer()                    
		];            
	}

}
