<?php

namespace App\Controller\Api;

use App\Form\EtablissementType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use App\Entity\Etablissement;

/**
 * Brand controller.
 *
 * @Route("/api")
 */
class EtablissementController extends Controller
{

    /**
     * Récupèrer la liste des etablissements.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"etablissement","adresse","personneMorale"})
     * @FOSRest\Get("/etablissements")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  etablissements",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Etablissement::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="etablissements")
     *
     * @return array
     */
    public function getEtablissementsAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(Etablissement::class);


        $etablissements = $repository->findBy([],['nom'=>$sort], $limit, $offset);

        return View::create($etablissements, Response::HTTP_OK );
    }

    /**
     * Récupèrer un etablissement.
     *
     * @ParamConverter("etablissement", class="App:Etablissement")
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"etablissement","adresse","personneMorale"})
     * @FOSRest\Get("/etablissements/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  etablissement",
     * )
     * @SWG\Tag(name="etablissements")
     * @return array
     */
    public function getEtablissementAction(Request $request, Etablissement $etablissement)
    {
        if (empty($etablissement)) {
            return View::create(['message' => 'Etablissement not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($etablissement, Response::HTTP_OK );
    }
    /**
     * Créer un etablissement.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"etablissement","adresse","personneMorale"})
     * @FOSRest\Post("/etablissement/new")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  etablissements",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Etablissement::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Etablissement::class)
     *    )
     *
     * )
     * @SWG\Tag(name="etablissements")
     *
     * @return array
     */
    public function postEtablissementAction(Request $request)
    {
        $etablissement = new Etablissement();
        $form = $this->createForm(EtablissementType::class, $etablissement);

        $form->submit($request->request->all()); // Validation des données

        if (!$form->isValid()) {
            return View::create((string) $form->getErrors(true, false), Response::HTTP_BAD_REQUEST );
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($etablissement);
        $em->flush();

        return View::create($etablissement, Response::HTTP_CREATED );

    }

    /**
     *
     * Modifier un etablissement.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"etablissement","adresse","personneMorale"})
     * @FOSRest\Put("/etablissements/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  etablissement updated",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Etablissement::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Etablissement::class)
     *    )
     *
     * )
     * @SWG\Tag(name="etablissements")
     *
     */
    public function updateEtablissementAction(Request $request, $id)
    {
        return $this->updateEtablissement($request, true, $id);
    }

    /**
     *
     * Modification partielle d'un etablissement.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"etablissement","adresse","personneMorale"})
     * @FOSRest\Patch("/etablissements/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  etablissement patched",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Etablissement::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Etablissement::class)
     *    )
     *
     * )
     * @SWG\Tag(name="etablissements")
     */
    public function patchEtablissementAction(Request $request, $id)
    {
        return $this->updateEtablissement($request, false, $id);
    }


    private function updateEtablissement(Request $request, $clearMissing, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $etablissement = $em
            ->getRepository('App:Etablissement')
            ->find($id);
        /* @var $etablissement Etablissement */

        if (empty($etablissement)) {
            return View::create(['message' => 'Etablissement not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(EtablissementType::class, $etablissement);

        // Le paramètre $clearMissing false dit à Symfony de garder les valeurs dans notre
        // entité si l'utilisateur n'en fournit pas une dans sa requête
        $form->submit($request->request->all(), $clearMissing);
        if (!$form->isValid()) {
            return View::create((string) $form->getErrors(true, false), Response::HTTP_BAD_REQUEST );
        }

        $em->persist($etablissement);
        $em->flush();

        return View::create($etablissement, Response::HTTP_CREATED );

    }

    /**
     *
     * Supprimer un etablissement.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"etablissement","adresse","personneMorale"})
     * @FOSRest\Delete("/etablissements/{etablissement}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  if etablissement was deleted"
     * )
     *
     * @SWG\Tag(name="etablissements")
     */
    public function removeEtablissementAction(Request $request, $etablissement)
    {

        $em = $this->getDoctrine()->getManager();
        $etablissement = $em
            ->getRepository('App:Etablissement')
            ->find($etablissement); // L'identifiant en tant que paramètre n'est plus nécessaire

        /* @var $etablissement Etablissement */
        if (empty($etablissement)) {
            return View::create(['message' => 'Etablissement not found'], Response::HTTP_NOT_FOUND);
        }

        //TODO supprimer les relations avec $etablissement


        $em->remove($etablissement);
        $em->flush();

        return View::create(['message' => 'Etablissement removed'], Response::HTTP_OK );
    }
}