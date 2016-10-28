<?php
namespace AppBundle\FormType;

use AppBundle\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @author Tomáš Linhart <lin.tomeus@gmail.com>
 */
class QuestionFormType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add("firstName", TextType::class, [
			"label" => "Jméno",
			"attr" => [
				"class" => "form-control",
			],
			"constraints" => [
				new NotBlank(["message" => "Prosím vyplňte Vaše jméno"]),
			],
		])->add("lastName", TextType::class, [
			"label" => "Příjmení",
			"attr" => [
				"class" => "form-control",
			],
			"constraints" => [
				new NotBlank(["message" => "Prosím vyplňte Vaše příjmení"]),
			],
		])->add("email", EmailType::class, [
			"label" => "E-mail",
			"attr" => [
				"class" => "form-control",
			],
			"constraints" => [
				new NotBlank(["message" => "Prosím vyplňte Vaši emailovou adresu"]),
				new Email(["message" => "Prosím vyplňte email ve správném tvaru."])
			],
		])->add("question", TextareaType::class, [
			"label" => "Otázka",
			"attr" => [
				"class" => "form-control",
			],
			"constraints" => [
				new NotBlank(["message" => "Prosím vyplňte Vaši ulici"]),
			],
		]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			"data_class" => Question::class,
		));
	}

}
