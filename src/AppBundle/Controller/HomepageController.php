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
     * @Route("/{page}", name="homepage")         
     * @Template("homepage/homepage.html.twig")
     */
    public function homepageAction($page = 1)
    {
        $productCount = $this->getProductCount();

        //$paginator = $this->get('app.paginator');
        $paginator = new \AppBundle\Model\Paginator($productCount, $this->container->getParameter('items_per_page'), $page);
        return [
            "products" => $this->getDoctrine()->getRepository(Product::class)->findBy(
                    [], [
                "rank" => "desc"
                    ], $paginator->getItemsPerPage(), $paginator->getOffset()
            ),
            "categories" => $this->getDoctrine()->getRepository(Category::class)->findBy(
                    [
                "level" => 0,
                    ], [
                "rank" => "desc",
                    ]
            ),
            "paginator" => $paginator->getDataForTemplate()
        ];
    }

    private function getProductCount()
    {

        $res = $this->getDoctrine()->getRepository(Product::class)->count();
        return $res[0][1];
    }

}
