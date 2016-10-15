<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Jan Klat <jenik@klatys.cz>
 */
class HomepageController extends Controller
{
	/**
	 * @Route("/{page}", name="homepage")
	 * @Template("homepage/homepage.html.twig")
     *
     * @param Request $request
     * @return array
	 */
	public function homepageAction(Request $request)
	{
        $perPage = 6;
        $currentPage = $request->attributes->get("page");
        $totalProducts = $this->getDoctrine()->getRepository(Product::class)->findBy([]);
        $totalPages = ceil(count($totalProducts)/$perPage);


		return [
			"products" => $this->getDoctrine()->getRepository(Product::class)->findBy(
				[],
				[
					"rank" => "desc"
				],
                $perPage, // limit of products per page
                $perPage * ($currentPage - 1) // offset of products
			),
			"categories" => $this->getDoctrine()->getRepository(Category::class)->findBy(
				[
					"level" => 0,
				],
				[
					"rank" => "desc",
				]
			),
            "totalPages" => $totalPages,
            "currentPage" => $currentPage,
		];
	}

}