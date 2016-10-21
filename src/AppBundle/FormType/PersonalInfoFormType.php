<?php

namespace AppBundle\FormType;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonalInfoFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add("name", TextType::class, [
				"label" => "Jméno",
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
			->add("username", EmailType::class, [
				"label" => "E-mail",
				"attr" => [
					"class" => "form-control",
				],
			])
			->add('address', AddressFormType::class);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			"data_class" => User::class,
		));
	}
}
