<?php

namespace AppBundle\FormType;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Milan Staněk <mistacms@gmail.com>
 */
class AddressFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
            ->add("zipcode", TextType::class, [
                "label" => "PSČ",
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
            "data_class" => User::class,
        ));
    }
}