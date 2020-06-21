<?php

namespace App\Controller\midlware;
Use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class VerficiationController extends AbstractController
{
    /**
     * @Route("/verficiation", name="verficiation")
     */
    public function index( User $user)
    {
        $is_registred = $this->getUser()->getIsRegistred();


        $type = $this->getUser()->getType();
        $role = $this->getUser()->getROles();
        $id = $this->getUser()->getId();
        $entityManager = $this->getDoctrine()->getManager();

        if ($type == 'Docteur'  ) {
<<<<<<< HEAD:src/Controller/VerficiationController.php
        
=======
            $user->setRoles(['ROLE_MEDCIN']); 
        //     $user = new User();
        //     $user->setRoles(['ROLE_ADMIN']);  
        //     $entityManager->persist($user);
        //     $entityManager->flush();
           
        //    var_dump($user);die(0); 
>>>>>>> 76f88b131c60ff7e61c9881eb12f9fa869e9f893:src/Controller/midlware/VerficiationController.php
            if ($is_registred) {
                return $this->redirectToRoute('medcin_profile');
            }
            else {
                return $this->redirectToRoute('completer_profil' ,['id'=>$id]);

            }
        }
        elseif (($type === 'Patient' ) ) {
            return $this->redirectToRoute('patient_profile');
        }
<<<<<<< HEAD:src/Controller/VerficiationController.php
         else {
             return $this->redirectToRoute('admin_index');
         }
=======
        else {
            return $this->redirectToRoute('admin_index');
        }
>>>>>>> 76f88b131c60ff7e61c9881eb12f9fa869e9f893:src/Controller/midlware/VerficiationController.php
      
        
       
    }
}
