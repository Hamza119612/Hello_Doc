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
        $is_registred = $this->getUser()->getIsRegistred();


        $type = $this->getUser()->getType();
        $role = $this->getUser()->getROles();
        $id = $this->getUser()->getId();
        $entityManager = $this->getDoctrine()->getManager();

        if ($type == 'Docteur'  ) {
        
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
         else {
             return $this->redirectToRoute('admin_index');
         }
      
        
       
    }
}
