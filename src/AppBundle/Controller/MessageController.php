<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Message;
use AppBundle\Facade\MessageFacade;
use AppBundle\FormType\MessageFormType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;


/**
 * @author Milan Staněk <mistacms@gmail.com>
 * @Route(service="app.controller.message_controller")
 */
class MessageController
{
    private $messageFacade;
    private $formFactory;
    private $entityManager;
    private $router;
    
    public function __construct(
        MessageFacade $messageFacade,
        EntityManager $entityManager,
        FormFactory $formFactory,
        RouterInterface $router
    ) {
        $this->messageFacade = $messageFacade;
        $this->formFactory = $formFactory;
        $this->entityManager = $entityManager;
        $this->router = $router;
    }
    
    /**
     * @Route("/contact", name="message")
     * @Template("message/message_form.html.twig")
     * @param Request $request
     * @return RedirectResponse|array
     */
    public function formAction(Request $request)
    {
        $message = new Message();
        $form = $this->formFactory->create(MessageFormType::class, $message);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $this->entityManager->persist($message);
            $this->entityManager->flush([$message]);
            
            return RedirectResponse::create($this->router->generate("message"));
        }
        
        return [
            "form" => $form->createView(),
        ];
    }
    
    
}