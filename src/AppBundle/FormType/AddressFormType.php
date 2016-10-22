<?php
namespace AppBundle\FormType;

use AppBundle\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add("postcode", TextType::class, [
                "label" => "PSČ",
                "attr" => [
                    "class" => "form-control",
                ],
            ])
            ->add("country", TextType::class, [
            "label" => "Země",
            "attr" => [
                "class" => "form-control",
            ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            "data_class" => Address::class,
        ));
    }
}