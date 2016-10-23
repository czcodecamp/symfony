<?php

namespace AppBundle\FormType;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Aleš Kůdela
 */
class UserEditFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add("username", EmailType::class, [
                    "label" => "E-mail",
                    "attr" => [
                        "class" => "form-control",
                    ],
                ])
                ->add("phone", TextType::class, [
                    "label" => "Telefon",
                    "attr" => [
                        "class" => "form-control",
                    ],
                ])
                ->add("title", TextType::class, [
                    "label" => "Pojmenování adresy",
                    "attr" => [
                        "class" => "form-control",
                    ],
                ])
                ->add("name", TextType::class, [
                    "label" => "Jméno adresáta",
                    "attr" => [
                        "class" => "form-control",
                    ],
                ])
                ->add("street", TextType::class, [
                    "label" => "Ulice",
                    "attr" => [
                        "class" => "form-control",
                    ],
                ])
                ->add("city", TextType::class, [
                    "label" => "Město",
                    "attr" => [
                        "class" => "form-control",
                    ],
                ])
                ->add("zip", TextType::class, [
                    "label" => "PSČ",
                    "attr" => [
                        "class" => "form-control",
                    ],
                ])
                ->add("country", TextType::class, [
                    "label" => "Stát",
                    "attr" => [
                        "class" => "form-control",
                    ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            "data_class" => User::class,
        ));
    }

}
