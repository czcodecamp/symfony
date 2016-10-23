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
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 */
class PasswordFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add("password", PasswordType::class, [
				"label" => "Aktuální heslo",
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
			->add("submit", SubmitType::class, [
				"label" => "Změnit heslo!",
				"attr" => [
					"class" => "btn btn-lg btn-primary btn-block",
				],
			]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			"data_class" => User::class,
			"validation_groups" => ["passwordReset"],
		));
	}
}
