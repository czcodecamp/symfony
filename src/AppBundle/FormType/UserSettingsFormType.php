<?php
namespace AppBundle\FormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Optional;
use Symfony\Component\Validator\Constraints\Regex;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 */
class UserSettingsFormType extends AbstractType
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
			]
		])->add("lastName", TextType::class, [
			"label" => "Příjmení",
			"attr" => [
				"class" => "form-control",
			],
			"constraints" => [
				new NotBlank(["message" => "Prosím vyplňte Vaše příjmení"]),
			]
		])->add("phone", TextType::class, [
			"label" => "Telefonní číslo",
			"attr" => [
				"class" => "form-control",
			],
			"constraints" => [
				new Regex([
					"message" => "Prosím vyplňte vaše telefonní číslo ve formátu 777123456",
					"pattern" => "#^(\\+420)? ?[1-9][0-9]{2} ?[0-9]{3} ?[0-9]{3}$#",
					"htmlPattern" => "^(\\+420)? ?[1-9][0-9]{2} ?[0-9]{3} ?[0-9]{3}$",
				]),
				new Optional(),
			]
		]);
	}

}