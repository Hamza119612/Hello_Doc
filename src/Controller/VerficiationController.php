<?php

namespace App\Controller;
Use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VerficiationController extends AbstractController
{
    /**
     * @Route("/verficiation", name="verficiation")
     */
    public function index()
    {
       
        $type = $this->getUser()->getType();
        $id = $this->getUser()->getId();
        $entityManager = $this->getDoctrine()->getManager();

        if ($type == 'Docteur') {
        //     $user = new User();
        //     $user->setRoles(['ROLE_ADMIN']);  
        //     $entityManager->persist($user);
        //     $entityManager->flush();
           
        //    var_dump($user);die(0); 
   
              return $this->redirectToRoute('completer_profil' ,['id'=>$id]);
        }
        elseif (($type === 'Patient') ) {
            return $this->redirectToRoute('patient_profile');
        }

        
       
    }
}
