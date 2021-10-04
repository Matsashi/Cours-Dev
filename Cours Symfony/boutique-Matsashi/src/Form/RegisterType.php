<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                "label" => "Prénom",
                'required' => true, //Required non obligatoire quand l'attribut est dans la table de la BDD
                "attr"=>[
                    'placeholder'=>"Saisir votre Prénom"
                ],
                'constraints' => [
                    new Length(null,2,30)
                ]
            ])
            ->add('lastname', TextType::class, [
                "label" => "Nom de famille",
                'required' => true,
                "attr"=>[
                    'placeholder'=>"Saisir votre Nom"
                ],
                'constraints' => [
                    new Length(null,1,30)
                ]
            ])
            ->add('city', TextType::class, [
                "label" => "Ville",
                'required' => true,
                "attr"=>[
                    'placeholder'=>"Saisir votre Ville"
                ]
            ])
            ->add('email', EmailType::class, [
                "label" => "Email",
                'required' => true,
                "attr"=>[
                    'placeholder'=>"Saisir votre Email"
                ],
                "constraints" => [
                    new NotBlank([
                        'message' => 'Ce champ ne peut pas être vide'
                    ])
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => 
                    ['label' => 'Mot de passe', 
                    "attr"=>[
                        'placeholder'=> "Saisir votre mot de passe"
                        ]
                    ],
                'second_options' => 
                    ['label' => 'Confirmer le mot de passe', 
                    "attr"=>[
                        'placeholder'=> "Confirmer votre mot de passe"
                        ]
                    ]
            ])
            ->add('submit', SubmitType::class, [
                "label"=>"Envoyer",
                'attr' => ['class' => 'btn btn-outline-dark']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
