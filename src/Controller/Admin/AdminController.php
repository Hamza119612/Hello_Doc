<?php

namespace App\Controller\Admin;
Use App\Entity\User;
use App\Repository\UserRepository;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    

    /**
     * @Route("/admin/new", name="createadmin")
     */
    public function index()
    {

        $entityManager = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setNom('Admin ');
        $user->setPrenom('Admin ');
        $password = $this->encoder->encodePassword($user, 'hamza123');
        $user->setPassword($password);
        $user->setEmail('Admin@admin.com ');
        $user->setRoles(['ROLE_ADMIN']); 


        $entityManager->persist($user);

        $entityManager->flush();



        return $this->redirectToRoute('app_login');

            
            
        }


  
    
}