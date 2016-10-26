<?php
namespace AppBundle\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

/**
 * @author Jozef Liška <jfox@jfox.sk>
 */
class MessageFormType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add("name", TextType::class, [
			"label" => "Meno",
			"attr" => [
				"class" => "form-control",
			],
			"constraints" => [
				new NotBlank(["message" => "Prosím vyplňte Vaše meno"]),
			],
		])->add("email", TextType::class, [
			"label" => "E-mail",
			"attr" => [
				"class" => "form-control",
			],
			"constraints" => [
				new NotBlank(["message" => "Prosím vyplňte Váš email"]),
				new Email(["message" => "Email nie je v správnom formáte"]),
			],
		])->add("message", TextareaType::class, [
			"label" => "Správa",
			"attr" => [
				"class" => "form-control",
			],
			"constraints" => [
				new NotBlank(["message" => "Prosím vyplňte správu"]),
			],
		])
        ->add("submit", SubmitType::class, [
            "label" => "Odoslať",
            "attr" => [
                "class" => "form-control",
            ],
        ]);
	}

}