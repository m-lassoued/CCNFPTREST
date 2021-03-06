<?php

namespace App\Controller\Api;

use App\Entity\LienPphEtablissement;
use App\Entity\PphHasPph;
use FOS\RestBundle\Controller\FOSRestController;
use App\Service\ResponseApi;
use App\Service\ValidateParameters;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

use App\Entity\Pph;
use App\Form\PphType;
use App\Representation\Pphs;
use App\Entity\Search\PphSearch;
use App\Entity\Search\PphComplet;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Brand controller.
 *
 * @Route("/api")
 */
class PphController extends FOSRestController
{

    /**
     * Récupèrer la liste des personnes physiques.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"pph"})
     * @FOSRest\Get("/pphs", name="app_api_pphs")
     * @FOSRest\QueryParam(
     *     name="keyword",
     *     requirements="[a-zA-Z0-9]+",
     *     nullable=true,
     *     description="The keyword to search for."
     * )
     * @FOSRest\QueryParam(
     *     name="sort",
     *     requirements="asc|desc",
     *     default="asc",
     *     description="Sort order (asc or desc)."
     * )
     * @FOSRest\QueryParam(
     *     name="limit",
     *     requirements="\d+",
     *     default="20",
     *     description="Max number of categories per page."
     * )
     * @FOSRest\QueryParam(
     *     name="offset",
     *     requirements="\d+",
     *     default="0",
     * description="The pagination offset."
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  pphs",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Pph::class))
     *     )
     * )
     * @SWG\Tag(name="pphs")
     *
     * @return array
     */
    public function getPphsAction(ParamFetcherInterface $paramFetcher)
    {
        $repository = $this->getDoctrine()->getRepository(Pph::class);

        $pphs = $repository->search(
            $paramFetcher->get('keyword'), $paramFetcher->get('sort'), $paramFetcher->get('limit'),
            $paramFetcher->get('offset')
        );

        return $this->get('pphs_view_handler')
            ->handleRepresentation(new Pphs($pphs), $paramFetcher->all())
            ;
    }
    /**
     * Rechercher une Personne Physique via Nom de naissance, Prénom et Date de naissance.
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Post("/pphs/recherche_par_nom_prenom_dateNaissance")
     *
     * @ParamConverter("pphsearch", class="App\Entity\Search\PphSearch", converter="fos_rest.request_body")
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=PphSearch::class)
     *    )
     *
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  pphs",
     * )
     *
     * @SWG\Tag(name="WS_P1++")
     *
     **/
    public function getPphsByNomPrenomDateNaissanceAction (Request $request,  ConstraintViolationListInterface $violations)
    {
        $required = ["nom","prenom","dateNaissance"];
        if($checkParamsResponse = ValidateParameters::checkParams($request, $violations, $required)){
            return $checkParamsResponse;
        }

        $nom = strtoupper(str_replace(' ','',$request->get('nom')));
        $prenom = strtoupper(str_replace(' ','',$request->get('prenom')));
        $dateNaissance = new \DateTime(str_replace('/','-',$request->get('dateNaissance')));
        $dateNaissance->format('d-m-Y');
        $repository = $this->getDoctrine()->getRepository(Pph::class);

        $pphsIds =  $repository->findByNomPrenomDateNaissance($nom, $prenom, $dateNaissance);

        if(!count($pphsIds)){
            return View::create(ResponseApi::create(ResponseApi::ERROR_CODE_PPH_INTROUVABLE), Response::HTTP_NOT_FOUND );
        }

        return View::create(ResponseApi::create(ResponseApi::CODE_OK, $pphsIds), Response::HTTP_OK );
    }

    /**
     * WS-R&C-CU-02.3 : Consulter une Personne Physique Complète (avec les objets associés) .
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Post("/pphs/pph_complet")
     *
     * @ParamConverter("pphsearch", class="App\Entity\Search\PphComplet", converter="fos_rest.request_body")
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=PphComplet::class)
     *    )
     *
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  pph complet",
     * )
     *
     * @SWG\Tag(name="WS_P1++")
     *
     **/
    public function getCompletePphAction (Request $request,  ConstraintViolationListInterface $violations)
    {
        $required = ["idpph","referencePersonnePhysique"];
        if($checkParamsResponse = ValidateParameters::checkParams($request, $violations, $required, false)){
            return $checkParamsResponse;
        }

        $repository = $this->getDoctrine()->getRepository(Pph::class);
        /** @var Pph $pph */
        $pph =  $repository->findCompletePphByIdReferenceComptePortail($request->get('idpph'), $request->get('referencePersonnePhysique'), $request->get('idComptePortailAgent'));
        $idComptePortailAgent = $request->get('idComptePortailAgent');
        if(!$pph){

            return View::create(ResponseApi::create(ResponseApi::ERROR_CODE_PPH_INTROUVABLE), Response::HTTP_NOT_FOUND );
        } elseif(!empty($idComptePortailAgent) && $pph->getIdComptePortailAgent() != $idComptePortailAgent){

            return View::create(ResponseApi::create(ResponseApi::ERROR_CODE_AGENT_NON_APPERE), Response::HTTP_NOT_FOUND );
        } elseif (empty($pph->getIdEtatPph()) || $pph->getIdEtatPph()->getId()!= 1) {

            return View::create(ResponseApi::create(ResponseApi::ERROR_CODE_PPH_INACTIVE), Response::HTTP_NOT_FOUND );
        }
        $lienPphPphs = $this->getDoctrine()->getRepository(PphHasPph::class)->findBy(["pphPph"=>$pph]);
        $lienPphEtablissements = $this->getDoctrine()->getRepository(LienPphEtablissement::class)->findBy(["pph"=>$pph]);



        return View::create(ResponseApi::create(ResponseApi::CODE_OK,
                            ["pph"=>$pph,
                             "pphHasPphs"=>$lienPphPphs,
                             "lienPphEtablissements"=>$lienPphEtablissements
                            ]),
            Response::HTTP_OK );
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