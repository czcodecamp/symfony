<?php
namespace AppBundle\FormType;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Jozef Liška <jozoliska@gmail.com>
 */
class ProfileFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add("name", TextType::class, [
                "label" => "Meno",
                "attr" => [
                    "class" => "form-control",
                ],
            ])
            ->add("surname", TextType::class, [
                "label" => "Priezvisko",
                "attr" => [
                    "class" => "form-control",
                ],
            ])
            ->add("street", TextType::class, [
                "label" => "Ulica",
                "attr" => [
                    "class" => "form-control",
                ],
            ])
            ->add("city", TextType::class, [
                "label" => "Mesto",
                "attr" => [
                    "class" => "form-control",
                ],
            ])
            ->add("zip", TextType::class, [
                "label" => "PSČ",
                "attr" => [
                    "class" => "form-control",
                ],
            ])
            ->add("phone", TextType::class, [
                "label" => "Telefón",
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
            ->add("submit", SubmitType::class, [
                "label" => "Uložiť",
                "attr" => [
                    "class" => "form-control",
                ],
            ]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			"data_class" => User::class,
            'validation_groups' => ['edit'],
		));
	}
}