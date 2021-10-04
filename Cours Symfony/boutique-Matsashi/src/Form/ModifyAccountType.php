<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ModifyAccountType extends AbstractType
{
    private $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $this->security->getUser();
        $builder
            ->add('firstname', TextType::class, [
                "label" => "Prénom",
                'disabled' => true,
                'constraints' => [
                    new Length(null, 2, 30)
                ]
            ])
            ->add('lastname', TextType::class, [
                "label" => "Nom de famille",
                'disabled' => true,
                'constraints' => [
                    new Length(null, 1, 30)
                ]
            ])
            ->add('city', TextType::class, [
                "label" => "Ville",
                'required' => true,
                "constraints" => [
                    new NotBlank([
                        'message' => 'Ce champ ne peut pas être vide'
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                "label" => "Email",
                'required' => true,
                "disabled" => true,
                "constraints" => [
                    new NotBlank([
                        'message' => 'Ce champ ne peut pas être vide'
                    ])
                ]
            ])
            ->add('old_password', PasswordType::class, [
                "label" => "Mot de passe actuel",
                "mapped" => false,
                "required" => false
            ])
            ->add('new_password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques.',
                'options' => ['attr' => ['class' => 'password-field']],
                "mapped" => false,
                "required" => false,
                'first_options'  =>
                [
                    'label' => 'Nouveau mot de passe',
                    "attr" => [
                        'placeholder' => "Saisir votre nouveau mot de passe"
                    ]
                ],
                'second_options' =>
                [
                    'label' => 'Confirmer le nouveau mot de passe',
                    "attr" => [
                        'placeholder' => "Confirmer votre nouveau mot de passe"
                    ]
                ]
            ])
            ->add('submit', SubmitType::class, [
                "label" => "Envoyer",
                'attr' => ['class' => 'btn btn-outline-dark']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
