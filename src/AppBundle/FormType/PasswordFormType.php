<?php

namespace AppBundle\FormType;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Milan Staněk <mistacms@gmail.com>
 */
class PasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("plainPassword", RepeatedType::class, [
                "type" => PasswordType::class,
                "first_options" => [
                    "label" => "Nové heslo",
                    "attr" => [
                        "class" => "form-control",
                    ],
                ],
                "second_options" => [
                    "label" => "Zopakuj heslo",
                    "attr" => [
                        "class" => "form-control",
                    ],
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Uložit změny',
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            "data_class" => User::class,
        ));
    }
}