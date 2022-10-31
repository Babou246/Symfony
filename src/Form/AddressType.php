<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'label'=>'Veuillez nommer votre address',
                'attr'=>[
                    'placeholder'=>'Nommer votre addresse'
                ]
            ])
            ->add('firstname',TextType::class,[
                'label'=>'Votre prenom',
                'attr'=>[
                    'placeholder'=>'Entrer votre prenom'
                ]
            ])
            ->add('lastname',TextType::class,[
                'label'=>'Votre nom',
                'attr'=>[
                    'placeholder'=>'Entrer votre Nom'
                ]
            ])
            ->add('company',TextType::class,[
                'label'=>'Votre Societé',
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'(facultatif)Entrer le nom de votre societé'
                ]
            ])
            ->add('address',TextType::class,[
                'label'=>'Votre address',
                'attr'=>[
                    'placeholder'=>'Rue24, Dakar amitié'
                ]
            ])
            ->add('postal',TextType::class,[
                'label'=>'Votre code postal',
                'attr'=>[
                    'placeholder'=>'1234'
                ]
            ])
            ->add('city',TextType::class,[
                'label'=>'Votre ville',
                'attr'=>[
                    'placeholder'=>'Entrer la ville'
                ]
            ])
            ->add('country',CountryType::class,[
                'label'=>'Votre pays',
                'attr'=>[
                    'placeholder'=>'Sénégal...'
                ]
            ])
            ->add('phone',TelType::class,[
                'label'=>'Votre Numéro de Téléphone',
                'attr'=>[
                    'placeholder'=>'+221 77 100 76 95'
                ]
            ])
            ->add('submit',SubmitType::class,[
                'label'=>'Valider',
                'attr'=> [
                    'class'=>'btn btn-block btn-info'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
