<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Spcialite;
use Doctrine\ORM\EntityRepository;

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
            ->add('Specialite',EntityType::class,[
                'class'=>Spcialite::class,
                'label'=>'Votre Specialite',
                'choice_label' => 'Spec_Medcin',
            ]);
            
            
}

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
