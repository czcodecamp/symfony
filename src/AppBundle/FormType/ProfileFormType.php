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
class ProfileFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add("name", TextType::class, [
				"label" => "Jméno a příjmení",
				"attr" => [
					"class" => "form-control",
				],
				"required" => false,
			])
			->add("email", EmailType::class, [
				"label" => "Email",
				"attr" => [
					"class" => "form-control",
				],
				"required" => false,
			])
			->add("phone", TextType::class, [
				"label" => "Telefoní číslo",
				"attr" => [
					"class" => "form-control",
				],
				"required" => false,
			])
			->add("submit", SubmitType::class, [
				"label" => "Uložit",
				"attr" => [
					"class" => "btn btn-lg btn-primary btn-block",
				],
			]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			"data_class" => User::class,
			"validation_groups" => ["profileSetup"],
		));
	}
}
