<?php

namespace App\Controller;

use App\Entity\PersonneMorale;
use App\Form\PersonneMoraleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/personne/morale")
 */
class PersonneMoraleController extends Controller
{
    /**
     * @Route("/", name="personne_morale_index", methods="GET")
     */
    public function index(): Response
    {
        $personneMorales = $this->getDoctrine()
            ->getRepository(PersonneMorale::class)
            ->findAll();

        return $this->render('personne_morale/index.html.twig', ['personne_morales' => $personneMorales]);
    }

    /**
     * @Route("/new", name="personne_morale_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $personneMorale = new PersonneMorale();
        $form = $this->createForm(PersonneMoraleType::class, $personneMorale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($personneMorale);
            $em->flush();

            return $this->redirectToRoute('personne_morale_index');
        }

        return $this->render('personne_morale/new.html.twig', [
            'personne_morale' => $personneMorale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personne_morale_show", methods="GET")
     */
    public function show(PersonneMorale $personneMorale): Response
    {
        return $this->render('personne_morale/show.html.twig', ['personne_morale' => $personneMorale]);
    }

    /**
     * @Route("/{id}/edit", name="personne_morale_edit", methods="GET|POST")
     */
    public function edit(Request $request, PersonneMorale $personneMorale): Response
    {
        $form = $this->createForm(PersonneMoraleType::class, $personneMorale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personne_morale_edit', ['id' => $personneMorale->getId()]);
        }

        return $this->render('personne_morale/edit.html.twig', [
            'personne_morale' => $personneMorale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personne_morale_delete", methods="DELETE")
     */
    public function delete(Request $request, PersonneMorale $personneMorale): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personneMorale->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($personneMorale);
            $em->flush();
        }

        return $this->redirectToRoute('personne_morale_index');
    }
}
