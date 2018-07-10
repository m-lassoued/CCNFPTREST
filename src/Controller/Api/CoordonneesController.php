<?php

namespace App\Controller\Api;

use App\Form\CoordonneesType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use App\Entity\Coordonnees;

/**
 * Brand controller.
 *
 * @Route("/api")
 */
class CoordonneesController extends Controller
{

    /**
     * Récupèrer la liste des coordonnees.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"coordonnees","adresse"})
     * @FOSRest\Get("/coordonneess")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  coordonneess",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Coordonnees::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="coordonneess")
     *
     * @return array
     */
    public function getCoordonneessAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(Coordonnees::class);


        $coordonneess = $repository->findBy([],['adresseEPrincipale'=>$sort], $limit, $offset);

        return View::create($coordonneess, Response::HTTP_OK );
    }

    /**
     * Récupèrer un coordonnee.
     *
     * @ParamConverter("coordonnees", class="App:Coordonnees")
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"coordonnees","adresse"}))
     * @FOSRest\Get("/coordonneess/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  coordonnees",
     * )
     * @SWG\Tag(name="coordonneess")
     * @return array
     */
    public function getCoordonneesAction(Request $request, Coordonnees $coordonnees)
    {
        if (empty($coordonnees)) {
            return View::create(['message' => 'Coordonnees not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($coordonnees, Response::HTTP_OK );
    }
    /**
     * Créer un coordonnee.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"coordonnees","adresse"}))
     * @FOSRest\Post("/coordonnees/new")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  coordonneess",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Coordonnees::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Coordonnees::class)
     *    )
     *
     * )
     * @SWG\Tag(name="coordonneess")
     *
     * @return array
     */
    public function postCoordonneesAction(Request $request)
    {
        $coordonnees = new Coordonnees();
        $form = $this->createForm(CoordonneesType::class, $coordonnees);

        $form->submit($request->request->all()); // Validation des données

        if (!$form->isValid()) {
            return View::create((string) $form->getErrors(true, false), Response::HTTP_BAD_REQUEST );
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($coordonnees);
        $em->flush();

        return View::create($coordonnees, Response::HTTP_CREATED );

    }

    /**
     *
     * Modifier un coordonnee.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"coordonnees","adresse"}))
     * @FOSRest\Put("/coordonneess/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  coordonnees updated",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Coordonnees::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Coordonnees::class)
     *    )
     *
     * )
     * @SWG\Tag(name="coordonneess")
     *
     */
    public function updateCoordonneesAction(Request $request, $id)
    {
        return $this->updateCoordonnees($request, true, $id);
    }

    /**
     *
     * Modification partielle d'un coordonnee.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"coordonnees","adresse"}))
     * @FOSRest\Patch("/coordonneess/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  coordonnees patched",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Coordonnees::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Coordonnees::class)
     *    )
     *
     * )
     * @SWG\Tag(name="coordonneess")
     */
    public function patchCoordonneesAction(Request $request, $id)
    {
        return $this->updateCoordonnees($request, false, $id);
    }


    private function updateCoordonnees(Request $request, $clearMissing, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $coordonnees = $em
            ->getRepository('App:Coordonnees')
            ->find($id);
        /* @var $coordonnees Coordonnees */

        if (empty($coordonnees)) {
            return View::create(['message' => 'Coordonnees not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(CoordonneesType::class, $coordonnees);

        // Le paramètre $clearMissing false dit à Symfony de garder les valeurs dans notre
        // entité si l'utilisateur n'en fournit pas une dans sa requête
        $form->submit($request->request->all(), $clearMissing);
        if (!$form->isValid()) {
            return View::create((string) $form->getErrors(true, false), Response::HTTP_BAD_REQUEST );
        }

        $em->persist($coordonnees);
        $em->flush();

        return View::create($coordonnees, Response::HTTP_CREATED );

    }

    /**
     *
     * Supprimer un coordonnee.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"coordonnees","adresse"}))
     * @FOSRest\Delete("/coordonneess/{coordonnees}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  if coordonnees was deleted"
     * )
     *
     * @SWG\Tag(name="coordonneess")
     */
    public function removeCoordonneesAction(Request $request, $coordonnees)
    {

        $em = $this->getDoctrine()->getManager();
        $coordonnees = $em
            ->getRepository('App:Coordonnees')
            ->find($coordonnees); // L'identifiant en tant que paramètre n'est plus nécessaire

        /* @var $coordonnees Coordonnees */
        if (empty($coordonnees)) {
            return View::create(['message' => 'Coordonnees not found'], Response::HTTP_NOT_FOUND);
        }

        //TODO supprimer les relations avec $coordonnees


        $em->remove($coordonnees);
        $em->flush();

        return View::create(['message' => 'Coordonnees removed'], Response::HTTP_OK );
    }
}