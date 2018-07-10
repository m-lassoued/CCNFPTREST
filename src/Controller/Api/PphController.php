<?php

namespace App\Controller\Api;

use App\Form\PphType;
use App\Service\ResponseApi;
use Doctrine\Common\Collections\Collection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use App\Entity\Pph;

/**
 * Brand controller.
 *
 * @Route("/api")
 */
class PphController extends Controller
{

    /**
     * Récupèrer la liste des personnes physiques.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"pph"})
     * @FOSRest\Get("/pphs")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  pphs",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Pph::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", required=true, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", required=true, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="pphs")
     *
     * @return array
     */
    public function getPphsAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(Pph::class);
        

        $pphs = $repository->findBy([],['nomUsage'=>$sort], $limit, $offset);

        return View::create($pphs, Response::HTTP_OK );
    }
    /**
     * Rechercher une Personne Physique via Nom de naissance, Prénom et Date de naissance.
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/pphs/recherche_par_nom_prenom_dateNaissance")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  pphs",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Pph::class))
     *     )
     * )

     * @SWG\Parameter(name="nom",in="query",type="string",description="Nom de naissance", required=true)
     * @SWG\Parameter(name="prenom",in="query",type="string",description="Prénom", required=true)
     * @SWG\Parameter(name="date_naissance",in="query",type="string",description="Date de naissance",format="dd-mm-YY", required=true)
     *
     * @SWG\Tag(name="pphs")
     *
     * @return array
     */
    public function getPphsByNomPrenomDateNaissanceAction(Request $request)
    {
        $nom = strtoupper($request->get('nom'));
        $prenom = strtoupper($request->get('prenom'));
        $dateNaissance = new \DateTime($request->get('date_naissance'));

        $repository = $this->getDoctrine()->getRepository(Pph::class);


        $pphsIds =  $repository->findByNomPrenomDateNaissance($nom, $prenom, $dateNaissance);

        if(!count($pphsIds)){
            return View::create(ResponseApi::create(ResponseApi::ERROR_CODE_PPH_INTROUVABLE), Response::HTTP_NOT_FOUND );
        }

        return View::create(ResponseApi::create(ResponseApi::CODE_OK, $pphsIds), Response::HTTP_OK );
    }

    /**
     * Récupèrer une personne physique.
     *
     * @ParamConverter("pph", class="App:Pph")
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"pph"})
     * @FOSRest\Get("/pphs/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  pph",
     * )
     * @SWG\Tag(name="pphs")
     * @return array
     */
    public function getPphAction(Request $request, Pph $pph)
    {
        if (empty($pph)) {
            return View::create(['message' => 'Pph not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($pph, Response::HTTP_OK );
    }
    /**
     * Créer une personne physique.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"pph"})
     * @FOSRest\Post("/pph/new")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  pphs",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Pph::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Pph::class)
     *    )
        *
     * )
     * @SWG\Tag(name="pphs")
     *
     * @return array
     */
    public function postPphAction(Request $request)
    {
        $pph = new Pph();
        $form = $this->createForm(PphType::class, $pph);

        $form->submit($request->request->all()); // Validation des données

        if (!$form->isValid()) {
            return View::create((string) $form->getErrors(true, false), Response::HTTP_BAD_REQUEST );
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($pph);
        $em->flush();

        return View::create($pph, Response::HTTP_CREATED );
        
    }

    /**
     *
     * Modifier une personne physique.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"pph"})
     * @FOSRest\Put("/pphs/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  pph updated",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Pph::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Pph::class)
     *    )
     *
     * )
     * @SWG\Tag(name="pphs")
     *
     */
    public function updatePphAction(Request $request, $id)
    {
        return $this->updatePph($request, true, $id);
    }

    /**
     *
     * Modification partielle d'une personne physique.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"pph"})
     * @FOSRest\Patch("/pphs/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  pph patched",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Pph::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Pph::class)
     *    )
     *
     * )
     * @SWG\Tag(name="pphs")
     */
    public function patchPphAction(Request $request, $id)
    {
        return $this->updatePph($request, false, $id);
    }


    private function updatePph(Request $request, $clearMissing, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $pph = $em
            ->getRepository('App:Pph')
            ->find($id);
        /* @var $pph Pph */

        if (empty($pph)) {
            return View::create(['message' => 'Pph not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(PphType::class, $pph);

        // Le paramètre $clearMissing false dit à Symfony de garder les valeurs dans notre
        // entité si l'utilisateur n'en fournit pas une dans sa requête
        $form->submit($request->request->all(), $clearMissing);
        if (!$form->isValid()) {
            return View::create((string) $form->getErrors(true, false), Response::HTTP_BAD_REQUEST );
        }

        $em->persist($pph);
        $em->flush();
        
        return View::create($pph, Response::HTTP_CREATED );

    }

    /**
     *
     * Supprimer une personne physique.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"pph"})
     * @FOSRest\Delete("/pphs/{pph}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  if pph was deleted"
     * )
     *
     * @SWG\Tag(name="pphs")
     */
    public function removePphAction(Request $request, $pph)
    {

        $em = $this->getDoctrine()->getManager();
        $pph = $em
            ->getRepository('App:Pph')
            ->find($pph); // L'identifiant en tant que paramètre n'est plus nécessaire

        /* @var $pph Pph */
        if (empty($pph)) {
            return View::create(['message' => 'Pph not found'], Response::HTTP_NOT_FOUND);
        }

        // TODO supprimer les relations avec $pph
        /*foreach ($pphHasPphs as $pphHasPph)
        {
            $em->remove($pphHasPph);
        }*/

        $em->remove($pph);
        $em->flush();

        return View::create(['message' => 'Pph removed'], Response::HTTP_OK );
    }
}