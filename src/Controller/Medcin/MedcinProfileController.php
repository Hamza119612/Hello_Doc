<?php

namespace App\Controller\Medcin ;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MedcinProfileController extends AbstractController
{
    /**
     * @Route("/medcin_profile", name="medcin_profile")
     */
    public function medcin_profile()
    {
        return $this->render('medcin_profile/index.html.twig', [
            'controller_name' => 'MedcinProfileController',
        ]);
    }


    
}
