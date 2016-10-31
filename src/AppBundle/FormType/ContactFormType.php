<?php
namespace AppBundle\FormType;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @author Aleš Kůdela
 */
class ContactFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add("email", EmailType::class, [
				"label" => "E-mail",
				"attr" => [
					"class" => "form-control",
				],
			])->add("firstName", TextType::class, [
                                "label" => "Jméno",
                                "attr" => [
                                        "class" => "form-control",
                                ],
                                "constraints" => [
                                        new NotBlank(["message" => "Prosím vyplňte Vaše jméno"]),
                                ]
                        ])->add("surname", TextType::class, [
                                "label" => "Příjmení",
                                "attr" => [
                                        "class" => "form-control",
                                ],
                                "constraints" => [
                                        new NotBlank(["message" => "Prosím vyplňte Vaše příjmení"]),
                                ]
                        ])->add("query", TextType::class, [
                                "label" => "Dotaz",
                                "attr" => [
                                        "class" => "form-control",
                                ],
                                "constraints" => [
                                        new NotBlank(["message" => "Prosím vyplňte Váš dotaz"]),
                                ]
                        ]);
	}
}