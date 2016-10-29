<?php

namespace AppBundle\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add("email", EmailType::class, [
			"label" => "E-mail",
			"attr" => [
				"class" => "form-control",
			],
			"constraints" => [
				new NotBlank(["message" => "Prosím vyplňte Váš e-mail"]),
			],
		])->add("text", TextareaType::class, [
			"label" => "Zpráva",
			"attr" => [
				"class" => "form-control",
			],
			"constraints" => [
				new NotBlank(["message" => "Prosím napište text zprávy"]),
			],
		]);
	}
}