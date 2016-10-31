<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Faq;
use AppBundle\Facade\FaqFacade;
use AppBundle\Service\Paginator;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\FormType\FaqFormType;
use Symfony\Component\Routing\RouterInterface;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 * @Route(service="app.controller.faq_controller")
 */
class FaqController
{
	private $faqFacade;
	private $entityManager;
	private $formFactory;
	private $router;

	public function __construct(
		FaqFacade $faqFacade,
		FormFactory $formFactory,
		RouterInterface $router,
		EntityManager $entityManager
	) {
		$this->faqFacade = $faqFacade;
		$this->entityManager = $entityManager;
		$this->formFactory = $formFactory;
		$this->router = $router;
	}
	/**
	 * @Route("/faq", name="faq_list")
	 * @Template("faq/list.html.twig")
	 *
	 * @param Request $request
	 * @return RedirectResponse|array
	 */
	public function listAction(Request $request)
	{
		if(!$page = $request->query->get("page")){
			$page = 1;
		}


		$faq = new Faq();
		$form = $this->formFactory->create(FaqFormType::class, $faq);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {

			$this->entityManager->persist($faq);
			$this->entityManager->flush([$faq]);

			return RedirectResponse::create($this->router->generate("faq_list"));
		}

		$countByFaq = $this->faqFacade->countAll();
		$paginator = new Paginator($countByFaq, 10);
		$paginator->setCurrentPage($page);

		return [
			"faqs" => $this->faqFacade->getAll($paginator->getLimit(), $paginator->getOffset()),
			"form" => $form->createView(),
			"currentPage" => $page,
			"totalPages" => $paginator->getTotalPageCount(),
			"pageRange" => $paginator->getPageRange(5),
		];
	}

}
