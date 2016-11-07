<?php
namespace AppBundle\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class SupportTicketFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add("name", TextType::class, [
			"label" => "Vaše jméno",
			"attr" => [
				"class" => "form-control",
			],
			"constraints" => [
				new NotBlank(["message" => "Prosím vyplňte Vaše jméno"]),
			],
		])->add("email", EmailType::class, [
			"label" => "Váš email",
			"attr" => [
				"class" => "form-control",
			],
			"constraints" => [
				new NotBlank(["message" => "Prosím vyplňte Váš e-mail abychom vás mohli kontaktovat s odpovědí"]),
			],
		])->add("text", TextareaType::class, [
			"label" => "Váš dotaz",
			"attr" => [
				"class" => "form-control",
			],
			"constraints" => [
				new NotBlank(["message" => "Vyplňte prosím s čím vám můžeme pomoci."]),
			],
		]);
	}

}
