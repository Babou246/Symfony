<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class,[
                'disabled'=>true,
                'label'=>'Votre Email'
            ])
            ->add('firstname',TextType::class,[
                'disabled'=>true,
                'label'=>'Votre Nom'
            ])
            ->add('lastname',TextType::class,[
                'disabled'=>true,
                'label'=>'Votre Prenom'
            ])
            ->add('old_password',PasswordType::class,[
                'mapped'=>false,
                'label'=>'Mot de passe',
                'attr'=>[
                    'placeholder'=>'Veuillez saisir Votre mot de passe actuel'
                ]
            ])
            ->add('new_password',RepeatedType::class,[
                'type'=>PasswordType::class,
                'mapped'=>false,
                'invalid_message'=>'Le mot de passe et la confirmation doivent être conforme',
                'label'=>'Mon nouveau Mot de passe',
                'required'=> true,
                'first_options'=>[
                    'label'=> 'Mon nouveau mot de passe',
                    'attr'=>[
                        'placeholder'=> 'Merci de saisir votre nouveau mot de passe'
                    ]
                ],
                'second_options'=>[
                    'label'=> 'Confirmer le nouveau Mot de passe',
                    'attr'=>[
                        'placeholder'=> 'Merci de confirmer votre nouveau mot de passe'
                    ]
                ]                
            ])
            ->add('submit',SubmitType::class,[
                'label'=>'Mettre à jour',
                'attr'=>[
                    'placeholder'=>'Merci de saisir votre Password'
                ]
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
