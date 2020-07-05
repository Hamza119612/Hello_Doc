<?php

namespace App\Controller;

use App\Entity\Rendezvous;
use App\Entity\User;
use App\Form\RendezvousType;
use App\Repository\RendezvousRepository;
use App\Repository\UserRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rendezvous")
 */
class RendezvousController extends AbstractController
{
    /**
     * @Route("/", name="rendezvous_index", methods={"GET"})
     */
    public function index(RendezvousRepository $RendezvousRepository , UserRepository $UserRepository  ) { 
        

        $Rendezvous = $this->getDoctrine()
        ->getRepository(Rendezvous::class)
        ->findmyrdv(); 


        $Doctor = $RendezvousRepository
        ->findrnameofmydoc(); 
      
        // $rdv = $RendezvousRepository->findAll(); 
        


        return $this->render('rendezvous/index.html.twig', [
            'rendezvouses' => $Rendezvous,
            'user' => $Doctor ,
        ]);
    }

    /**
     * @Route("/listrdvous", name="listrdvous", methods={"GET"})
     */
    public function listrdv( ) { 
        

        $Rendezvous = $this->getDoctrine()
        ->getRepository(Rendezvous::class)
        ->finddoctorrdv(); 


      
        // $rdv = $RendezvousRepository->findAll(); 
        
        return $this->render('medcin_profile/medcinrdv.html.twig', [
            'rendezvouses' => $Rendezvous,
            
        ]);

      
    }



    /**
     * @Route("/PrendreRdv{id}", name="rendezvous_new", methods={"GET","POST"})
     */
    public function new( $id ,Request $request ): Response
    {
        $rendezvou = new Rendezvous();
        $form = $this->createForm(RendezvousType::class, $rendezvou);
        $form->handleRequest($request);
        
        $rendezvou->setDocotrName($id);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rendezvou);
            $entityManager->flush();

            return $this->redirectToRoute('rendezvous_index');
        }

        return $this->render('rendezvous/new.html.twig', [
            'rendezvou' => $rendezvou,
            'form' => $form->createView(),
            
        ]);
    }

    /**
     * @Route("/{id_rdv}", name="rendezvous_show", methods={"GET"})
     */
    public function show(Rendezvous $rendezvou): Response
    {
        return $this->render('rendezvous/show.html.twig', [
            'rendezvou' => $rendezvou,
        ]);
    }

    /**
     * @Route("/{id_rdv}/edit", name="rendezvous_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Rendezvous $rendezvou): Response
    {
        $form = $this->createForm(RendezvousType::class, $rendezvou);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rendezvous_index' );
        }

        return $this->render('rendezvous/edit.html.twig', [
            'rendezvou' => $rendezvou,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id_rdv}", name="rendezvous_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Rendezvous $rendezvou): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rendezvou->getId_rdv(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rendezvou);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rendezvous_index');
    }
}
