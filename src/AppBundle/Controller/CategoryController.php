<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\Repository\ProductRepository;
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
    const DIRECTION_NEXT = 'next';
    const DIRECTION_PREV = 'prev';

    /**
     * @Route("/vyber/{slug}/{last}/{direction}", name="category_detail", requirements={"last": "\d+"})
     * @Template("category/detail.html.twig")
     *
     * @param string $slug
     * @param int $last
     * @param string $direction
     * @return array
     * @internal param Request $request
     */
	public function categoryDetail($slug, $last = 0, $direction = self::DIRECTION_NEXT)
	{
		$category = $this->getDoctrine()->getRepository(Category::class)->findOneBy([
			"slug" => $slug,
		]);

		if (!$category) {
			throw new NotFoundHttpException("Kategorie neexistuje");
		}

		if ($direction === self::DIRECTION_NEXT) {
            $products = $this->getDoctrine()->getRepository(Product::class)->findNextByCategory($category, $last);
        } else {
            $products = $this->getDoctrine()->getRepository(Product::class)->findPrevByCategory($category, $last);
        }

        if (current($products)->getId() !== 1) {
            $prev = current($products)->getId();
        } else {
            $prev = null;
        }

        if (isset($products[ProductRepository::PAGE_SIZE])) {
            unset($products[ProductRepository::PAGE_SIZE]);
            $next = end($products)->getId();
        } else {
            $next = null;
        }

		return [
			"products" => $products,
			"prev" => $prev,
			"next" => $next,
			"categories" => $this->getDoctrine()->getRepository(Category::class)->findBy(
				[
					"parentCategory" => $category,
				],
				[
					"rank" => "desc",
				]
			),
			"category" => $category,
		];
	}
}
