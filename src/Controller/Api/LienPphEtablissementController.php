<?php

namespace App\Controller\Api;

use App\Form\LienPphEtablissementType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use App\Entity\LienPphEtablissement;

/**
 * Brand controller.
 *
 * @Route("/api")
 */
class LienPphEtablissementController extends Controller
{

    /**
     * Récupèrer la liste des liens Personne physique Etablissement.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"lienPphEtablissement","pph","etablissement", "adresse"})
     * @FOSRest\Get("/lienPphEtablissements")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the lienPphEtablissements",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=LienPphEtablissement::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="lienPphEtablissements")
     *
     * @return array
     */
    public function getLienPphEtablissementsAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(LienPphEtablissement::class);

        // query for a single Product by its primary key (usually "id")
        $lienPphEtablissements = $repository->findBy([],['dateDebut'=>$sort], $limit, $offset);

        return View::create($lienPphEtablissements, Response::HTTP_OK );
    }

    /**
     * Récupèrer un lien Personne physique Etablissement.
     *
     * @ParamConverter("lienPphEtablissement", class="App:LienPphEtablissement")
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"lienPphEtablissement","pph","etablissement", "adresse"})
     * @FOSRest\Get("/lienPphEtablissements/{pph}/{etablissement}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the lienPphEtablissement",
     * )
     * @SWG\Tag(name="lienPphEtablissements")
     * @return array
     */
    public function getLienPphEtablissementAction(Request $request, LienPphEtablissement $lienPphEtablissement)
    {
        if (empty($lienPphEtablissement)) {
            return View::create(['message' => 'LienPphEtablissement not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($lienPphEtablissement, Response::HTTP_OK );
    }
    /**
     * Créer un lien Personne physique Etablissement.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"lienPphEtablissement","pph","etablissement", "adresse"})
     * @FOSRest\Post("/lienPphEtablissement/new")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the lienPphEtablissements",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=LienPphEtablissement::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=LienPphEtablissement::class)
     *    )
     *
     * )
     * @SWG\Tag(name="lienPphEtablissements")
     *
     * @return array
     */
    public function postLienPphEtablissementAction(Request $request)
    {
        $lienPphEtablissement = new LienPphEtablissement();
        $form = $this->createForm(LienPphEtablissementType::class, $lienPphEtablissement);

        $form->submit($request->request->all()); // Validation des données

        if (!$form->isValid()) {
            return View::create((string) $form->getErrors(true, false), Response::HTTP_BAD_REQUEST );
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($lienPphEtablissement);
        $em->flush();

        return View::create($lienPphEtablissement, Response::HTTP_CREATED );

    }

    /**
     *
     * Modifier un lien Personne physique Etablissement.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"lienPphEtablissement","pph","etablissement", "adresse"})
     * @FOSRest\Put("/lienPphEtablissements/{pph}/{etablissement}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the lienPphEtablissement updated",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=LienPphEtablissement::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=LienPphEtablissement::class)
     *    )
     *
     * )
     * @SWG\Tag(name="lienPphEtablissements")
     *
     */
    public function updateLienPphEtablissementAction(Request $request, $pph, $etablissement)
    {
        return $this->updateLienPphEtablissement($request, true, $pph, $etablissement);
    }

    /**
     *
     * Modification partielle d'un lien Personne physique Etablissement.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"lienPphEtablissement","pph","etablissement", "adresse"})
     * @FOSRest\Patch("/lienPphEtablissements/{pph}/{etablissement}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the lienPphEtablissement patched",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=LienPphEtablissement::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=LienPphEtablissement::class)
     *    )
     *
     * )
     * @SWG\Tag(name="lienPphEtablissements")
     */
    public function patchLienPphEtablissementAction(Request $request, $pph, $etablissement)
    {
        return $this->updateLienPphEtablissement($request, false, $pph, $etablissement);
    }


    private function updateLienPphEtablissement(Request $request, $clearMissing, $pph, $etablissement)
    {
        $em = $this->getDoctrine()->getManager();
        $lienPphEtablissement = $em
            ->getRepository('App:LienPphEtablissement')
            ->findOneBy(['pph'=>$pph, "etablissement"=>$etablissement]);
        /* @var $lienPphEtablissement LienPphEtablissement */

        if (empty($lienPphEtablissement)) {
            return View::create(['message' => 'LienPphEtablissement not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(LienPphEtablissementType::class, $lienPphEtablissement);

        // Le paramètre $clearMissing false dit à Symfony de garder les valeurs dans notre
        // entité si l'utilisateur n'en fournit pas une dans sa requête
        $form->submit($request->request->all(), $clearMissing);
        if (!$form->isValid()) {
            return View::create((string) $form->getErrors(true, false), Response::HTTP_BAD_REQUEST );
        }

        $em->persist($lienPphEtablissement);
        $em->flush();

        return View::create($lienPphEtablissement, Response::HTTP_CREATED );

    }

    /**
     *
     * Supprimer un lien Personne physique Etablissement.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"lienPphEtablissement","pph","etablissement", "adresse"})
     * @FOSRest\Delete("/lienPphEtablissements/{pph}/{etablissement}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the if lienPphEtablissement was deleted"
     * )
     *
     * @SWG\Tag(name="lienPphEtablissements")
     */
    public function removeLienPphEtablissementAction(Request $request,$pph, $etablissement)
    {

        $em = $this->getDoctrine()->getManager();
        $lienPphEtablissement = $em
            ->getRepository('App:LienPphEtablissement')
            ->findOneBy(['pph'=>$pph, "etablissement"=>$etablissement]); // L'identifiant en tant que paramètre n'est plus nécessaire

        /* @var $lienPphEtablissement LienPphEtablissement */
        if (empty($lienPphEtablissement)) {
            return View::create(['message' => 'LienPphEtablissement not found'], Response::HTTP_NOT_FOUND);
        }

        //TODO supprimer les relations avec $lienPphEtablissement


        $em->remove($lienPphEtablissement);
        $em->flush();

        return View::create(['message' => 'LienPphEtablissement removed'], Response::HTTP_OK );
    }
}