<?php

namespace App\Controller;

use App\Entity\Etablissement;
use App\Form\EtablissementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/etablissement")
 */
class EtablissementController extends Controller
{
    /**
     * @Route("/", name="etablissement_index", methods="GET")
     */
    public function index(): Response
    {
        $etablissements = $this->getDoctrine()
            ->getRepository(Etablissement::class)
            ->findAll();

        return $this->render('etablissement/index.html.twig', ['etablissements' => $etablissements]);
    }

    /**
     * @Route("/new", name="etablissement_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $etablissement = new Etablissement();
        $form = $this->createForm(EtablissementType::class, $etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etablissement);
            $em->flush();

            return $this->redirectToRoute('etablissement_index');
        }

        return $this->render('etablissement/new.html.twig', [
            'etablissement' => $etablissement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="etablissement_show", methods="GET")
     */
    public function show(Etablissement $etablissement): Response
    {
        return $this->render('etablissement/show.html.twig', ['etablissement' => $etablissement]);
    }

    /**
     * @Route("/{id}/edit", name="etablissement_edit", methods="GET|POST")
     */
    public function edit(Request $request, Etablissement $etablissement): Response
    {
        $form = $this->createForm(EtablissementType::class, $etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etablissement_edit', ['id' => $etablissement->getId()]);
        }

        return $this->render('etablissement/edit.html.twig', [
            'etablissement' => $etablissement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="etablissement_delete", methods="DELETE")
     */
    public function delete(Request $request, Etablissement $etablissement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etablissement->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($etablissement);
            $em->flush();
        }

        return $this->redirectToRoute('etablissement_index');
    }
}
