<?php
namespace AppBundle\FormType;

use AppBundle\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 */
class AddressFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add("name", TextType::class, [
				"label" => "Název / Jméno",
				"attr" => [
					"class" => "form-control",
				],
				"required" => true,
			])
			->add("street", TextType::class, [
				"label" => "Ulice č.p./č.o.",
				"attr" => [
					"class" => "form-control",
				],
				"required" => true,
			])
			->add("city", TextType::class, [
				"label" => "Město",
				"attr" => [
					"class" => "form-control",
				],
				"required" => true,
			])
			->add("zip", TextType::class, [
				"label" => "PSČ",
				"attr" => [
					"class" => "form-control",
				],
				"required" => true,
			])
			->add("submit", SubmitType::class, [
				"label" => "Přidat adresu",
				"attr" => [
					"class" => "btn btn-lg btn-primary btn-block",
				],
			]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			"data_class" => Address::class,
		));
	}
}
