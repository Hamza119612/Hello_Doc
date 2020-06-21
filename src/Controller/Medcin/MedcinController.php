<?php

namespace App\Controller\Medcin;

use App\Entity\Medcin;
use App\Entity\User;
use App\Form\MedcinType;
use App\Form\UserType;
use App\Repository\MedcinRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * 
 * @Route("/medcin")
 */
class MedcinController extends AbstractController
{
    /**
     * @Route("/ListMedcin", name="medcin_index", methods={"GET"})
     */
    public function index(MedcinRepository $medcinRepository , UserRepository $UserRepository ): Response
    {

        
        $Medcin = $this->getDoctrine()
            ->getRepository(User::class)->findBydoc();
            

            // var_dump($doctor);die(0);
                return $this->render('medcin/index.html.twig', [
            'medcin' => $Medcin,
            // 'doctor'=>$doctor,
        ]);
    }
    /**
     *
     * @Route("/{id}/completer_profil", name="completer_profil", methods={"GET","POST"})
     */
    public function new($id,Request $request , UserRepository $UserRepository, User $user): Response
    {
        $form = $this->createForm(Usertype::class, $user);
        $form->handleRequest($request);
        $is_registred = $this->getUser()->getIsRegistred();

        $email = $this->getUser()->getEmail();
        $nom = $this->getUser()->getNom();
        $prenom = $this->getUser()->getPrenom();
        $type = $this->getUser()->getType();
        $telephone = $this->getUser()->getTelephone();
        $date_de_naissance = $this->getUser()->getDateDeNaissance();
        $user->setEmail($email);
        $user->setNom($nom);
        $user->getPrenom($prenom);
        $user->setType($type);
        $user->setTelephone($telephone);
        $user->setDateDeNaissance($date_de_naissance);
        $user->setRoles(['ROLE_MEDCIN']); 
        $user->setIsRegistred(TRUE); 
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $this->getDoctrine()->getManager()->flush();


            return $this->redirectToRoute('app_login');
            
        }

        return $this->render('medcin/new.html.twig', [
            'email'=>$email,
            'nom'=>$nom,
            'prenom'=>$prenom,
            'type'=>$type,
            'telephone'=>$telephone,
            
            'form' => $form->createView(),
        ]);
    }

  
}
