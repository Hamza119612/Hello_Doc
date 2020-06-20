<?php

namespace App\Controller\Patient_profile;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PatientProfileController extends AbstractController
{
    /**
     * @Route("/patient_profile", name="patient_profile")
     */
    public function index()
    {
        return $this->render('Patient/profile.html.twig', [
            'controller_name' => 'PatientProfileController',
        ]);
    }
}
