<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultHomeController extends AbstractController {

    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('default_home/index.html.twig');
    }

//     /**
//      * @Route("/profile", name="user_profile")
//      */
//     public function profile()
//     {
//         return $this->render('user/profile.html.twig');
//     }




}