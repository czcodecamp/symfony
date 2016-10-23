<?php
namespace AppBundle\FormType;

use AppBundle\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Vašek Boch <vasek.boch@live.com>
 * @author Jan Klat <jenik@klatys.cz>
 */
class UserEditFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add("firstName", EmailType::class, [
				"label" => "Jméno",
				"attr" => [
					"class" => "form-control",
				],
			])
            ->add("surName", EmailType::class, [
                "label" => "Příjmení",
                "attr" => [
                    "class" => "form-control",
                ],
            ])
            ->add("street", EmailType::class, [
                "label" => "Ulice",
                "attr" => [
                    "class" => "form-control",
                ],
            ])
            ->add("city", EmailType::class, [
                "label" => "Město",
                "attr" => [
                    "class" => "form-control",
                ],
            ])
            ->add("zip", EmailType::class, [
                "label" => "PSČ",
                "attr" => [
                    "class" => "form-control",
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