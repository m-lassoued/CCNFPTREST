<?php

namespace App\Controller;

use App\Entity\LienPphEtablissement;
use App\Form\LienPphEtablissementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lien/pph/etablissement")
 */
class LienPphEtablissementController extends Controller
{
    /**
     * @Route("/", name="lien_pph_etablissement_index", methods="GET")
     */
    public function index(): Response
    {
        $lienPphEtablissements = $this->getDoctrine()
            ->getRepository(LienPphEtablissement::class)
            ->findAll();

        return $this->render('lien_pph_etablissement/index.html.twig', ['lien_pph_etablissements' => $lienPphEtablissements]);
    }

    /**
     * @Route("/new", name="lien_pph_etablissement_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $lienPphEtablissement = new LienPphEtablissement();
        $form = $this->createForm(LienPphEtablissementType::class, $lienPphEtablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lienPphEtablissement);
            $em->flush();

            return $this->redirectToRoute('lien_pph_etablissement_index');
        }

        return $this->render('lien_pph_etablissement/new.html.twig', [
            'lien_pph_etablissement' => $lienPphEtablissement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{pph}", name="lien_pph_etablissement_show", methods="GET")
     */
    public function show(LienPphEtablissement $lienPphEtablissement): Response
    {
        return $this->render('lien_pph_etablissement/show.html.twig', ['lien_pph_etablissement' => $lienPphEtablissement]);
    }

    /**
     * @Route("/{pph}/edit", name="lien_pph_etablissement_edit", methods="GET|POST")
     */
    public function edit(Request $request, LienPphEtablissement $lienPphEtablissement): Response
    {
        $form = $this->createForm(LienPphEtablissementType::class, $lienPphEtablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lien_pph_etablissement_edit', ['pph' => $lienPphEtablissement->getPph()]);
        }

        return $this->render('lien_pph_etablissement/edit.html.twig', [
            'lien_pph_etablissement' => $lienPphEtablissement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{pph}", name="lien_pph_etablissement_delete", methods="DELETE")
     */
    public function delete(Request $request, LienPphEtablissement $lienPphEtablissement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lienPphEtablissement->getPph(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lienPphEtablissement);
            $em->flush();
        }

        return $this->redirectToRoute('lien_pph_etablissement_index');
    }
}
