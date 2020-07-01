<?php

namespace App\Controller;

use App\Entity\Spcialite;
use App\Form\SpcialiteType;
use App\Repository\SpcialiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/specialite")
 */
class SpcialiteController extends AbstractController
{
    /**
     * @Route("/", name="spcialite_index", methods={"GET"})
     */
    public function index(SpcialiteRepository $spcialiteRepository): Response
    {
        return $this->render('spcialite/index.html.twig', [
            'spcialites' => $spcialiteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="spcialite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $spcialite = new Spcialite();
        $form = $this->createForm(SpcialiteType::class, $spcialite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($spcialite);
            $entityManager->flush();

            return $this->redirectToRoute('spcialite_index');
        }

        return $this->render('spcialite/new.html.twig', [
            'spcialite' => $spcialite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="spcialite_show", methods={"GET"})
     */
    public function show(Spcialite $spcialite): Response
    {
        return $this->render('spcialite/show.html.twig', [
            'spcialite' => $spcialite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="spcialite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Spcialite $spcialite): Response
    {
        $form = $this->createForm(SpcialiteType::class, $spcialite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('spcialite_index');
        }

        return $this->render('spcialite/edit.html.twig', [
            'spcialite' => $spcialite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="spcialite_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Spcialite $spcialite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$spcialite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($spcialite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('spcialite_index');
    }
}
