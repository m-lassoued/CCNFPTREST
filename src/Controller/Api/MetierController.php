<?php

namespace App\Controller\Api;

use App\Form\MetierType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use App\Entity\Metier;

/**
 * Brand controller.
 *
 * @Route("/api")
 */
class MetierController extends Controller
{

    /**
     * Récupèrer la liste des metiers.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"metier"})
     * @FOSRest\Get("/metiers")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the metiers",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Metier::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="metiers")
     *
     * @return array
     */
    public function getMetiersAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(Metier::class);

        // query for a single Product by its primary key (usually "id")
        $metiers = $repository->findBy([],['libelle'=>$sort], $limit, $offset);

        return View::create($metiers, Response::HTTP_OK );
    }

    /**
     * Récupèrer une metier.
     *
     * @ParamConverter("metier", class="App:Metier")
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"metier"})
     * @FOSRest\Get("/metiers/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the metier",
     * )
     * @SWG\Tag(name="metiers")
     * @return array
     */
    public function getMetierAction(Request $request, Metier $metier)
    {
        if (empty($metier)) {
            return View::create(['message' => 'Metier not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($metier, Response::HTTP_OK );
    }
    /**
     * Créer une metier.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"metier"})
     * @FOSRest\Post("/metier/new")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the metiers",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Metier::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Metier::class)
     *    )
     *
     * )
     * @SWG\Tag(name="metiers")
     *
     * @return array
     */
    public function postMetierAction(Request $request)
    {
        $metier = new Metier();
        $form = $this->createForm(MetierType::class, $metier);

        $form->submit($request->request->all()); // Validation des données

        if (!$form->isValid()) {
            return View::create($form->getErrors(), Response::HTTP_BAD_REQUEST );
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($metier);
        $em->flush();

        return View::create($metier, Response::HTTP_CREATED );

    }

    /**
     *
     * Modifier une metier.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"metier"})
     * @FOSRest\Put("/metiers/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the metier updated",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Metier::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Metier::class)
     *    )
     *
     * )
     * @SWG\Tag(name="metiers")
     *
     */
    public function updateMetierAction(Request $request, $id)
    {
        return $this->updateMetier($request, true, $id);
    }

    /**
     *
     * Modification partielle d'une metier.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"metier"})
     * @FOSRest\Patch("/metiers/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the metier patched",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Metier::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Metier::class)
     *    )
     *
     * )
     * @SWG\Tag(name="metiers")
     */
    public function patchMetierAction(Request $request, $id)
    {
        return $this->updateMetier($request, false, $id);
    }


    private function updateMetier(Request $request, $clearMissing, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $metier = $em
            ->getRepository('App:Metier')
            ->find($id);
        /* @var $metier Metier */

        if (empty($metier)) {
            return View::create(['message' => 'Metier not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(MetierType::class, $metier);

        // Le paramètre $clearMissing false dit à Symfony de garder les valeurs dans notre
        // entité si l'utilisateur n'en fournit pas une dans sa requête
        $form->submit($request->request->all(), $clearMissing);
        if (!$form->isValid()) {
            return View::create($form->getErrors(), Response::HTTP_BAD_REQUEST );
        }

        $em->persist($metier);
        $em->flush();

        return View::create($metier, Response::HTTP_CREATED );

    }

    /**
     *
     * Supprimer une metier.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"metier"})
     * @FOSRest\Delete("/metiers/{metier}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the if metier was deleted"
     * )
     *
     * @SWG\Tag(name="metiers")
     */
    public function removeMetierAction(Request $request, $metier)
    {

        $em = $this->getDoctrine()->getManager();
        $metier = $em
            ->getRepository('App:Metier')
            ->find($metier); // L'identifiant en tant que paramètre n'est plus nécessaire

        /* @var $metier Metier */
        if (empty($metier)) {
            return View::create(['message' => 'Metier not found'], Response::HTTP_NOT_FOUND);
        }

        //TODO supprimer les relations avec $metier


        $em->remove($metier);
        $em->flush();

        return View::create(['message' => 'Metier removed'], Response::HTTP_OK );
    }
}