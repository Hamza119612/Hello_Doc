<?php

namespace App\Controller;

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

/**
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
     * @Route("/{id}/completer_profil", name="completer_profil", methods={"GET","POST"})
     */
    public function new($id,Request $request , UserRepository $UserRepository, User $user): Response
    {
        $form = $this->createForm(Usertype::class, $user);
        $form->handleRequest($request);

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
        $user->setRoles(['ROLE_ADMIN']); 
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $this->getDoctrine()->getManager()->flush();
            
            
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

    /**
     * @Route("/{id}", name="medcin_show", methods={"GET"})
     */
    public function show(Medcin $medcin): Response
    {
        return $this->render('medcin/show.html.twig', [
            'medcin' => $medcin,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="medcin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Medcin $medcin): Response
    {
        $form = $this->createForm(MedcinType::class, $medcin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('medcin_index');
        }

        return $this->render('medcin/edit.html.twig', [
            'medcin' => $medcin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="medcin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Medcin $medcin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medcin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($medcin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('medcin_index');
    }
}
