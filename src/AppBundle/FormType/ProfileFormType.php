<?php
namespace AppBundle\FormType;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("username", EmailType::class, [
                "label" => "E-mail",
                "attr" => [
                    "class" => "form-control",
                ],
            ])
            ->add("name", TextType::class, [
                "label" => "Jméno a příjmení",
                "attr" => [
                    "class" => "form-control",
                ],
            ])
            ->add("phone", TextType::class, [
                "label" => "Telefon",
                "attr" => [
                    "class" => "form-control",
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            "data_class" => User::class,
        ));
    }
}