<?php
namespace AppBundle\FormType;

use AppBundle\Entity\Message;
use AppBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Milan Staněk <mistacms@gmail.com>
 * @ORM\Entity
 * @ORM\Table(name="message_form_type")
 */
class MessageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("email", EmailType::class, [
                "label" => "E-mail",
                "attr" => [
                    "class" => "form-control",
                ],
            ])
            ->add("subject", TextType::class, [
                "label" => "Predmet",
                "attr" => [
                    "class" => "form-control",
                ],
            ])
            ->add("message", TextareaType::class, [
                "label" => "Obsah",
                "attr" => [
                    "class" => "form-control",
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Uložit změny',
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            "data_class" => Message::class,
        ));
    }
}