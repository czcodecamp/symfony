<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Jan Klat <jenik@klatys.cz>
 */
class HomepageController extends Controller
{
    
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homepageAction(Request $request)
    {
    
        $paginator  = $this->get('knp_paginator');
        $em = $this->getDoctrine()->getManager();
        $all = $em->getRepository(Product::class)->findAll();
        $products = $paginator->paginate(
            $all,
            $request->query->getInt('page', 1),
            9
        );
    
        return $this->render(
            "homepage/homepage.html.twig",
            [
                "products" => $products
                ,
                "categories" => $em->getRepository(Category::class)->findBy(
                    [],
                    [
                        "rank" => "desc",
                    ]
                ),
            ]
        );
    }
    
    
    /**
     * @Route("/hello", name="hello")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function helloAction(Request $request)
    {
        return $this->render(
            "homepage/hello.html.twig",
            [
                "who" => "world",
            ]
        );
    }
    
}