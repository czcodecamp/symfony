<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\Entity\ProductCategory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Jan Klat <jenik@klatys.cz>
 */
class CategoryController extends Controller
{

    /**
     * @Route("/vyber/{slug}/{page}", name="category_detail")
     * @Template("category/detail.html.twig")
     *
     * @param Request $request
     * @return array
     */
    public function categoryDetail(Request $request, $page = 1)
    {

        $category = $this->getDoctrine()->getRepository(Category::class)->findOneBy([
            "slug" => $request->attributes->get("slug"),
        ]);

        if (!$category)
        {
            throw new NotFoundHttpException("Kategorie neexistuje");
        }

        $productCount = $this->getProductCount($category);
        $paginator = new \AppBundle\Model\Paginator($productCount, $this->container->getParameter('items_per_page'), $page);

        return [
            "products" => $this->getDoctrine()->getRepository(Product::class)->findByCategory($category, $paginator->getItemsPerPage(), $paginator->getOffset()),
            "categories" => $this->getDoctrine()->getRepository(Category::class)->findBy(
                    [
                "parentCategory" => $category,
                    ], [
                "rank" => "desc",
                    ]
            ),
            "category" => $category,
            "paginator" => $paginator->getDataForTemplate()
        ];
    }

    private function getProductCount($category)
    {
        $res = $this->getDoctrine()->getRepository(Product::class)->countByCategory($category);
        return $res[0][1];
    }

}
