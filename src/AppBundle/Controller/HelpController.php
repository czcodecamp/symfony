<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Question;
use AppBundle\Facade\CategoryFacade;
use AppBundle\Facade\HelpFacade;
use AppBundle\Facade\UserFacade;
use AppBundle\FormType\QuestionFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\RouterInterface;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 * @Route(service="app.controller.help_controller")
 */
class HelpController
{

	/**
	 * @var RouterInterface
	 */
	private $router;

	/**
	 * @var CategoryFacade
	 */
	private $categoryFacade;

	/**
	 * @var HelpFacade
	 */
	private $helpFacade;

	/**
	 * @var UserFacade
	 */
	private $userFacade;

	/**
	 * @var FormFactory
	 */
	private $formFactory;

	public function __construct(
		FormFactory $formFactory,
		RouterInterface $router,
		CategoryFacade $categoryFacade,
		HelpFacade $helpFacade,
		UserFacade $userFacade
	) {
		$this->formFactory = $formFactory;
		$this->router = $router;
		$this->categoryFacade = $categoryFacade;
		$this->helpFacade = $helpFacade;
		$this->userFacade = $userFacade;
	}

	/**
	 * @Route("/faq/{slug}", name="faq_detail")
	 * @Route("/faq", name="faq")
	 * @Template("help/faq.html.twig")
	 */
	public function faqAction($slug = null)
	{
		$return = [];
		if ($slug) {
			$category = $this->categoryFacade->getBySlug(Category::TYPE_FAQ, $slug);

			if (!$category) {
				throw new NotFoundHttpException("Kategorie FAQ neexistuje");
			}
			$return["category"] = $category;
			$return["categories"] = $this->categoryFacade->getParentCategories($category);
			$return["faqs"] = $this->helpFacade->findFaqByCategory($category, 100, 0);
		} else {
			$return["categories"] = $this->categoryFacade->getTopLevelCategories(Category::TYPE_FAQ);
			$return["faqs"] = $this->helpFacade->findTopFaq(10);
		}
		return $return;
	}

	/**
	 * @Route("/kontakt", name="question")
	 * @Template("help/question.html.twig")
	 *
	 * @param Request $request
	 * @return array|RedirectResponse
	 */
	public function questionAction(Request $request)
	{
		$user = $this->userFacade->getUser();

		$question = new Question();
		if ($user) {
			$question->setFirstName($user->getFirstName());
			$question->setLastName($user->getLastName());
			$question->setEmail($user->getUsername());
		}

		$form = $this->formFactory->create(QuestionFormType::class, $question);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$this->helpFacade->saveQuestion($question);

			return RedirectResponse::create($this->router->generate("homepage"));
		}

		return [
			"form" => $form->createView(),
		];
	}

}
