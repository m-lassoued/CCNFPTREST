<?php

namespace App\Controller\Admin;

use App\Entity\Pph;
use App\Form\PphType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pph")
 */
class PphController extends Controller
{
    /**
     * @Route("/", name="pph_index", methods="GET")
     */
    public function index(): Response
    {
        $pphs = $this->getDoctrine()
            ->getRepository(Pph::class)
            ->findAll();

        return $this->render('pph/index.html.twig', ['pphs' => $pphs]);
    }

    /**
     * @Route("/new", name="pph_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $pph = new Pph();
        $form = $this->createForm(PphType::class, $pph);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pph);
            $em->flush();

            return $this->redirectToRoute('pph_index');
        }

        return $this->render('pph/new.html.twig', [
            'pph' => $pph,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pph_show", methods="GET")
     */
    public function show(Pph $pph): Response
    {
        return $this->render('pph/show.html.twig', ['pph' => $pph]);
    }

    /**
     * @Route("/{id}/edit", name="pph_edit", methods="GET|POST")
     */
    public function edit(Request $request, Pph $pph): Response
    {
        $form = $this->createForm(PphType::class, $pph);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pph_edit', ['id' => $pph->getId()]);
        }

        return $this->render('pph/edit.html.twig', [
            'pph' => $pph,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pph_delete", methods="DELETE")
     */
    public function delete(Request $request, Pph $pph): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pph->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pph);
            $em->flush();
        }

        return $this->redirectToRoute('pph_index');
    }
}
