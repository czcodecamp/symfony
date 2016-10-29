<?php

namespace AppBundle\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("name", TextType::class, [
	        "label" => "Jméno",
	        "attr" => [
		        "class" => "form-control",
	        ],
	        "constraints" => [
		        new NotBlank(["message" => "Prosím vyplňte Vaše jméno"]),
	        ],
        ])->add("email", TextType::class, [
	        "label" => "Email",
	        "attr" => [
		        "class" => "form-control",
	        ],
	        "constraints" => [
		        new NotBlank(["message" => "Prosím vyplňte Váš email"]),
	        ],
        ])->add("message", TextareaType::class, [
	        "label" => "Zpráva",
	        "attr" => [
		        "class" => "form-control",
	        ],
	        "constraints" => [
		        new NotBlank(["message" => "Prosím vyplňte Vaši zprávu"]),
	        ],
        ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }


}
