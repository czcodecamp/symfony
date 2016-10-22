<?php
namespace AppBundle\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PasswordFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add("oldPassword", PasswordType::class, [
				"label" => "Aktuální heslo *",
				"attr" => [
					"class" => "form-control",
				],
				"required" => true
			])
			->add("plainPassword", RepeatedType::class, [
				"type" => PasswordType::class,
				"first_options" => [
					"label" => "Nové heslo *",
					"attr" => [
						"class" => "form-control",
					],
				],
				"second_options" => [
					"label" => "Nové heslo znovu *",
					"attr" => [
						"class" => "form-control",
					],
				],
				"required" => true
			]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'validation_groups' => ['onlyPassword']
		));
	}
}