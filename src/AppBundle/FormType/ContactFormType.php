<?php

namespace AppBundle\FormType;

use AppBundle\Entity\ContactMsg;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
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
		->add("email", EmailType::class, [
		    "label" => "Email",
		    "attr" => [
			"class" => "form-control",
		    ],
		])
		->add("subject", TextType::class, [
		    "label" => "Předmět",
		    "attr" => [
			"class" => "form-control",
		    ],
		])
		->add("msg", TextType::class, [
		    "label" => "Zpráva",
		    "attr" => [
			"class" => "form-control",
		    ],
	]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
	$resolver->setDefaults(array(
	    "data_class" => ContactMsg::class,
	));
    }

}
