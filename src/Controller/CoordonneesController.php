<?php

namespace App\Controller;

use App\Entity\Coordonnees;
use App\Form\CoordonneesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/coordonnees")
 */
class CoordonneesController extends Controller
{
    /**
     * @Route("/", name="coordonnees_index", methods="GET")
     */
    public function index(): Response
    {
        $coordonnees = $this->getDoctrine()
            ->getRepository(Coordonnees::class)
            ->findAll();

        return $this->render('coordonnees/index.html.twig', ['coordonnees' => $coordonnees]);
    }

    /**
     * @Route("/new", name="coordonnees_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $coordonnee = new Coordonnees();
        $form = $this->createForm(CoordonneesType::class, $coordonnee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coordonnee);
            $em->flush();

            return $this->redirectToRoute('coordonnees_index');
        }

        return $this->render('coordonnees/new.html.twig', [
            'coordonnee' => $coordonnee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="coordonnees_show", methods="GET")
     */
    public function show(Coordonnees $coordonnee): Response
    {
        return $this->render('coordonnees/show.html.twig', ['coordonnee' => $coordonnee]);
    }

    /**
     * @Route("/{id}/edit", name="coordonnees_edit", methods="GET|POST")
     */
    public function edit(Request $request, Coordonnees $coordonnee): Response
    {
        $form = $this->createForm(CoordonneesType::class, $coordonnee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('coordonnees_edit', ['id' => $coordonnee->getId()]);
        }

        return $this->render('coordonnees/edit.html.twig', [
            'coordonnee' => $coordonnee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="coordonnees_delete", methods="DELETE")
     */
    public function delete(Request $request, Coordonnees $coordonnee): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coordonnee->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($coordonnee);
            $em->flush();
        }

        return $this->redirectToRoute('coordonnees_index');
    }
}
