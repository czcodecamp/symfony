<?php
namespace AppBundle\FormType;

use AppBundle\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class AddressFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("name", TextType::class, [
            "label" => "Jméno",
            "attr" => [
                "class" => "form-control",
            ],
            "constraints" => [
                new NotBlank(["message" => "Prosím vyplňte Vaše jméno"]),
            ],
        ])->add("subject", TextType::class, [
            "label" => "Předmět",
            "attr" => [
                "class" => "form-control",
            ],
            "constraints" => [
                new NotBlank(["message" => "Prosím vyplňte předmět zprávy"]),
            ],
        ])->add("message", TextType::class, [
            "label" => "Zpráva",
            "attr" => [
                "class" => "form-control",
            ],
            "constraints" => [
                new NotBlank(["message" => "Prosím vyplňte obsah zprávy"]),
            ],
        ]);
    }

}