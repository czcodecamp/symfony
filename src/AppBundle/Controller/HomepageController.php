<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use AppBundle\Entity\CategoryClosure;
use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Jan Klat <jenik@klatys.cz>
 */
class HomepageController extends Controller
{

	/**
	 * @Route("/", name="homepage")
	 * @param Request $request
	 * @return Response
	 */
	public function homepageAction(Request $request)
	{
		return $this->render("homepage/homepage.html.twig", [
			"products" => $this->getDoctrine()->getRepository(Product::class)->findOrderedByRank(),
			"categories" => $this->getDoctrine()->getRepository(Category::class)->childrenHierarchy(),
		]);
	}


	/**
	 * @Route("/hello", name="hello")
	 * @param Request $request
	 * @return Response
	 */
	public function helloAction(Request $request)
	{
		return $this->render("homepage/hello.html.twig", [
			"who" => "world",
		]);
	}

}