<?php
namespace AppBundle\FormType;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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
			->add("username", EmailType::class, [
				"label" => "E-mail",
				"attr" => [
					"class" => "form-control",
				],
			])
			->add("firstName", TextType::class, [
				"label" => "Jméno",
				"attr" => [
					"class" => "form-control",
				],
			])
			->add("lastName", TextType::class, [
				"label" => "Příjmení",
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
			->add("plainPassword", RepeatedType::class, [
				"type" => PasswordType::class,
				"first_options" => [
					"label" => "Heslo",
					"attr" => [
						"class" => "form-control",
					],
				],
				"second_options" => [
					"label" => "Heslo znova",
					"attr" => [
						"class" => "form-control",
					],
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