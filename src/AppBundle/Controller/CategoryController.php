<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Utils\PaginatorHelper;
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
                $page = $request->query->get('page');
		$category = $this->getDoctrine()->getRepository(Category::class)->findOneBy([
			"slug" => $request->attributes->get("slug"),
		]);
        
		if (!$category) {
			throw new NotFoundHttpException("Kategorie neexistuje");
		}               

		$paginator = new PaginatorHelper;
                $products = $this->getDoctrine()->getRepository(Product::class)->countByCategory($category);
		$paginator->setItemCount($products);
		$itemsPerPage = 2;
		$paginator->setItemsPerPage($itemsPerPage);
		$paginator->setPage($page);                
dump($products);
		return [
			"products" => $this->getDoctrine()->getRepository(Product::class)->findByCategoryAndLimit($category, $paginator->getLength(), $paginator->getOffset()),
			"categories" => $this->getDoctrine()->getRepository(Category::class)->findBy(
				[
					"parentCategory" => $category,
				],
				[
					"rank" => "desc",
				]
			),
			"category" => $category,
			"paginator" => $paginator,
			"showPage" => $paginator->getPageOffer()                    
		];
	}       
        
/*	public function renderShow($id, $page, $more = null, $order = null) {


		return [
            
		];                	
	}  */      

}
