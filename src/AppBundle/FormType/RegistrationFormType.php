<?php
namespace AppBundle\FormType;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 */
class RegistrationFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add("username", TextType::class, [
				"label" => "Uživatelské jméno",
				"attr" => [
					"class" => "form-control",
				],
				"required" => true,
			])
			->add("plainPassword", RepeatedType::class, [
				"type" => PasswordType::class,
				"first_options" => [
					"label" => "Heslo",
					"attr" => [
						"class" => "form-control",
					],
					"required" => true,
				],
				"second_options" => [
					"label" => "Heslo znova",
					"attr" => [
						"class" => "form-control",
					],
					"required" => true,
				],
			])
			->add("name", TextType::class, [
				"label" => "Jméno a příjmení",
				"attr" => [
					"class" => "form-control",
				],
				'required' => false,
			])
			->add("email", EmailType::class, [
				"label" => "Email",
				"attr" => [
					"class" => "form-control",
				],
				'required' => false,
			])
			->add("phone", TextType::class, [
				"label" => "Telefoní číslo",
				"attr" => [
					"class" => "form-control",
				],
				'required' => false,
			])
			->add("submit", SubmitType::class, [
				"label" => "Registrovat!",
				"attr" => [
					"class" => "btn btn-lg btn-primary btn-block",
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
