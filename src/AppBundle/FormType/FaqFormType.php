<?php
namespace AppBundle\FormType;

use AppBundle\Entity\Faq;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 */
class FaqFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add("email", EmailType::class, [
				"label" => "E-mail",
				"attr" => [
					"class" => "form-control",
				],
			])->add("question", TextareaType::class, [
				"label" => "Question",
				"attr" => [
					"class" => "form-control",
				],
				"constraints" => [
					new NotBlank(["message" => "Prosím vyplňte Váš dotaz"]),
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