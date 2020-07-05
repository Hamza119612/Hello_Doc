<?php

namespace App\Form;

use App\Entity\Rendezvous;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;




class RendezvousType extends AbstractType
{
    private $User;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->User = $tokenStorage->getToken()->getUser();
       
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_rdv', DateTimeType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
               
            ])
            ->add('user',EntityType::class,[
                'class'=>User::class,
                'label' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.id = '.$this->User->getId());
                },
                'choice_label' => 'nom' ,
                'attr'=>array('style'=>'display:none;') ,
                
                ]);
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rendezvous::class,
        ]);
    }
}
