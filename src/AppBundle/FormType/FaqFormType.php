<?php
namespace AppBundle\FormType;

use AppBundle\Entity\Faq;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;


/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 */
class FaqFormType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add("question", TextareaType::class, [
				"label" => "Otázka",
				"attr" => [
					"class" => "form-control",
				],
				"constraints" => [
					new NotBlank(["message" => "Prosím vyplňte otázku"]),
				],
			])->add("answer", TextareaType::class, [
				"label" => "Odpověď",
				"attr" => [
					"class" => "form-control",
				],
				"constraints" => [
					new NotBlank(["message" => "Prosím vyplňte odpověď"]),
				],
			]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			"data_class" => Faq::class,
		));
	}

}
