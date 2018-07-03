<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Form\AdresseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adresse")
 */
class AdresseController extends Controller
{
    /**
     * @Route("/", name="adresse_index", methods="GET")
     */
    public function index(): Response
    {
        $adresses = $this->getDoctrine()
            ->getRepository(Adresse::class)
            ->findAll();

        return $this->render('adresse/index.html.twig', ['adresses' => $adresses]);
    }

    /**
     * @Route("/new", name="adresse_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $adresse = new Adresse();
        $form = $this->createForm(AdresseType::class, $adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($adresse);
            $em->flush();

            return $this->redirectToRoute('adresse_index');
        }

        return $this->render('adresse/new.html.twig', [
            'adresse' => $adresse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adresse_show", methods="GET")
     */
    public function show(Adresse $adresse): Response
    {
        return $this->render('adresse/show.html.twig', ['adresse' => $adresse]);
    }

    /**
     * @Route("/{id}/edit", name="adresse_edit", methods="GET|POST")
     */
    public function edit(Request $request, Adresse $adresse): Response
    {
        $form = $this->createForm(AdresseType::class, $adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adresse_edit', ['id' => $adresse->getId()]);
        }

        return $this->render('adresse/edit.html.twig', [
            'adresse' => $adresse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adresse_delete", methods="DELETE")
     */
    public function delete(Request $request, Adresse $adresse): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adresse->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($adresse);
            $em->flush();
        }

        return $this->redirectToRoute('adresse_index');
    }
}
