<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Specialite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('Cabinet_add')
            ->add('prix_visite')
            ->add('cin')
            ->add('Specialite',EntityType::class,
                ['class'=>Specialite::class,
                'choice_label'=>'specialite_medcin',
                'label'=>'Specialite'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
