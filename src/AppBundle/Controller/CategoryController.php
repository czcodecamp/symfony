<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends Controller
{
    /**
     * @Route("/category/{id}", name="category_detail")
     * @param Request $request
     * @return Response
     */

    public function categoryDetailAction(Request $request)
    {
        $categoryId = $request->attributes->get("id");

        $category = $this->getDoctrine()->getRepository(Category::class)->find($categoryId);

        if (!$category) {
            throw new NotFoundHttpException("Category neexistuje");
        }

        return $this->render("category/detail.html.twig", [
            "category" => $category,
            "products" => $this->getDoctrine()->getRepository(Product::class)->findByCategoryIdOrderedByRank($categoryId),
            "ancestor" => $category,
            "categories" => $this->getDoctrine()->getRepository(Category::class)->childrenHierarchy(),
        ]);
    }
}