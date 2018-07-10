<?php

namespace App\Controller\Api;

use App\Service\ResponseApi;
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
use App\Entity\TypeLienPphPph;
use App\Entity\TypeLienPphEtablissement;
use App\Entity\CadreEmploi;
use App\Entity\Commune;
use App\Entity\FamilleMetier;
use App\Entity\Net;
use App\Entity\MotifInactivation;
use App\Entity\Pays;
use App\Entity\SourceDonnees;
use App\Entity\Filliere;

/**
 * Brand controller.
 *
 * @Route("/api")
 */
class ReferentielController extends Controller
{

    /**
     * Récupèrer la liste des typeLienPphEtablissements.
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/typeLienPphEtablissements")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  typeLienPphEtablissements",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=TypeLienPphEtablissement::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="Referentiel")
     *
     * @return array
     */
    public function getTypeLienPphEtablissementsAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(TypeLienPphEtablissement::class);


        $typeLienPphEtablissements = $repository->findBy([],['libelle'=>$sort], $limit, $offset);

        return View::create($typeLienPphEtablissements, Response::HTTP_OK );
    }

    /**
     * Récupèrer une typeLienPphEtablissement.
     *
     * @ParamConverter("typeLienPphEtablissement", class="App:TypeLienPphEtablissement")
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/typeLienPphEtablissements/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  typeLienPphEtablissement",
     * )
     * @SWG\Tag(name="Referentiel")
     * @return array
     */
    public function getTypeLienPphEtablissementAction(Request $request, TypeLienPphEtablissement $typeLienPphEtablissement)
    {
        if (empty($typeLienPphEtablissement)) {
            return View::create(['message' => 'TypeLienPphEtablissement not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($typeLienPphEtablissement, Response::HTTP_OK );
    }
    /**
     * Récupèrer la liste des typeLienPphPphs.
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/typeLienPphPphs")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  typeLienPphPphs",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=TypeLienPphPph::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="Referentiel")
     *
     * @return array
     */
    public function getTypeLienPphPphsAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(TypeLienPphPph::class);


        $typeLienPphPphs = $repository->findBy([],['libelle'=>$sort], $limit, $offset);

        return View::create($typeLienPphPphs, Response::HTTP_OK );
    }

    /**
     * Récupèrer une typeLienPphPph.
     *
     * @ParamConverter("typeLienPphPph", class="App:TypeLienPphPph")
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/typeLienPphPphs/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  typeLienPphPph",
     * )
     * @SWG\Tag(name="Referentiel")
     * @return array
     */
    public function getTypeLienPphPphAction(Request $request, TypeLienPphPph $typeLienPphPph)
    {
        if (empty($typeLienPphPph)) {
            return View::create(['message' => 'TypeLienPphPph not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($typeLienPphPph, Response::HTTP_OK );
    }
    /**
     * Récupèrer la liste des metiers.
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/metiers")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  metiers",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Metier::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="Referentiel")
     *
     * @return array
     */
    public function getMetiersAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(Metier::class);


        $metiers = $repository->findBy([],['libelle'=>$sort], $limit, $offset);

        return View::create($metiers, Response::HTTP_OK );
    }

    /**
     * Récupèrer une metier.
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/metier")
     * @SWG\Parameter(name="id",in="query",type="integer", required=false, format="\d+")
     * @SWG\Parameter(name="code",in="query",type="string", required=false)
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  metier",
     * )
     * @SWG\Tag(name="Referentiel")
     * @return array
     */
    public function getMetierAction(Request $request)
    {

        $criteriaArray = [];
        $result = $this->getRequestParameter($request, $criteriaArray);
        if(empty($criteriaArray)) return $result;

        $repository = $this->getDoctrine()->getRepository(Metier::class);

        $metier = $repository->findOneBy($criteriaArray);

        if (empty($metier)) {
            return View::create( ResponseApi::create(14), Response::HTTP_NOT_FOUND);
        }

        return View::create(ResponseApi::create(ResponseApi::CODE_OK, $metier), Response::HTTP_OK );
    }

    /**
     * Récupèrer la liste des cadres d'emploi.
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/cadreEmplois")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  cadreEmplois",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=CadreEmploi::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="Referentiel")
     *
     * @return array
     */
    public function getCadreEmploisAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(CadreEmploi::class);


        $cadreEmplois = $repository->findBy([],['libelle'=>$sort], $limit, $offset);

        return View::create($cadreEmplois, Response::HTTP_OK );
    }

    /**
     * Récupèrer une cadreEmploi.
     *
     * @ParamConverter("cadreEmploi", class="App:CadreEmploi")
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/cadreEmplois/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  cadreEmploi",
     * )
     * @SWG\Tag(name="Referentiel")
     * @return array
     */
    public function getCadreEmploiAction(Request $request, CadreEmploi $cadreEmploi)
    {
        if (empty($cadreEmploi)) {
            return View::create(['message' => 'Cadre Emploi not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($cadreEmploi, Response::HTTP_OK );
    }

    /**
     * Récupèrer la liste des communes.
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/communes")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  communes",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Commune::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="Referentiel")
     *
     * @return array
     */
    public function getCommunesAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(Commune::class);


        $communes = $repository->findBy([],['libelleInsee'=>$sort], $limit, $offset);

        return View::create($communes, Response::HTTP_OK );
    }

    /**
     * Récupèrer une commune.
     *
     * @ParamConverter("commune", class="App:Commune")
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/communes/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  commune",
     * )
     * @SWG\Tag(name="Referentiel")
     * @return array
     */
    public function getCommuneAction(Request $request, Commune $commune)
    {
        if (empty($commune)) {
            return View::create(['message' => 'Commune not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($commune, Response::HTTP_OK );
    }
    /**
     * Récupèrer la liste des familleMetiers.
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/familleMetiers")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  familleMetiers",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=FamilleMetier::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="Referentiel")
     *
     * @return array
     */
    public function getFamilleMetiersAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(FamilleMetier::class);


        $familleMetiers = $repository->findBy([],['libelle'=>$sort], $limit, $offset);

        return View::create($familleMetiers, Response::HTTP_OK );
    }

    /**
     * Récupèrer une familleMetier.
     *
     * @ParamConverter("familleMetier", class="App:FamilleMetier")
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/familleMetiers/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  familleMetier",
     * )
     * @SWG\Tag(name="Referentiel")
     * @return array
     */
    public function getFamilleMetierAction(Request $request, FamilleMetier $familleMetier)
    {
        if (empty($familleMetier)) {
            return View::create(['message' => 'FamilleMetier not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($familleMetier, Response::HTTP_OK );
    }


    /**
     * Récupèrer la liste des fillieres.
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/fillieres")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  fillieres",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Filliere::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="Referentiel")
     *
     * @return array
     */
    public function getFillieresAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(Filliere::class);


        $fillieres = $repository->findBy([],['libelle'=>$sort], $limit, $offset);

        return View::create($fillieres, Response::HTTP_OK );
    }

    /**
     * Récupèrer une filliere.
     *
     * @ParamConverter("filliere", class="App:Filliere")
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/fillieres/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  filliere",
     * )
     * @SWG\Tag(name="Referentiel")
     * @return array
     */
    public function getFilliereAction(Request $request, Filliere $filliere)
    {
        if (empty($filliere)) {
            return View::create(['message' => 'Filliere not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($filliere, Response::HTTP_OK );
    }
    /**
     * Récupèrer la liste des motifInactivations.
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/motifInactivations")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  motifInactivations",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=MotifInactivation::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="Referentiel")
     *
     * @return array
     */
    public function getMotifInactivationsAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(MotifInactivation::class);


        $motifInactivations = $repository->findBy([],['libelle'=>$sort], $limit, $offset);

        return View::create($motifInactivations, Response::HTTP_OK );
    }

    /**
     * Récupèrer une motifInactivation.
     *
     * @ParamConverter("motifInactivation", class="App:MotifInactivation")
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/motifInactivations/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  motifInactivation",
     * )
     * @SWG\Tag(name="Referentiel")
     * @return array
     */
    public function getMotifInactivationAction(Request $request, MotifInactivation $motifInactivation)
    {
        if (empty($motifInactivation)) {
            return View::create(['message' => 'MotifInactivation not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($motifInactivation, Response::HTTP_OK );
    }


    /**
     * Récupèrer la liste des nets.
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/nets")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  nets",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Net::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="Referentiel")
     *
     * @return array
     */
    public function getNetsAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(Net::class);


        $nets = $repository->findBy([],['libelle'=>$sort], $limit, $offset);

        return View::create($nets, Response::HTTP_OK );
    }

    /**
     * Récupèrer une net.
     *
     * @ParamConverter("net", class="App:Net")
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/nets/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  net",
     * )
     * @SWG\Tag(name="Referentiel")
     * @return array
     */
    public function getNetAction(Request $request, Net $net)
    {
        if (empty($net)) {
            return View::create(['message' => 'Net not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($net, Response::HTTP_OK );
    }

    /**
     * Récupèrer la liste des pays.
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/pays")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  pays",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Pays::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="Referentiel")
     *
     * @return array
     */
    public function getPaysListAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(Pays::class);


        $pays = $repository->findBy([],['libelle'=>$sort], $limit, $offset);

        return View::create($pays, Response::HTTP_OK );
    }

    /**
     * Récupèrer une pays.
     *
     * @ParamConverter("pays", class="App:Pays")
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/pays/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  pays",
     * )
     * @SWG\Tag(name="Referentiel")
     * @return array
     */
    public function getPaysAction(Request $request, Pays $pays)
    {
        if (empty($pays)) {
            return View::create(['message' => 'Pays not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($pays, Response::HTTP_OK );
    }
    /**
     * Récupèrer la liste des sourceDonneess.
     *
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/sourceDonneess")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  sourceDonneess",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=SourceDonnees::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="Referentiel")
     *
     * @return array
     */
    public function getSourceDonneessAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(SourceDonnees::class);


        $sourceDonneess = $repository->findBy([],['libelle'=>$sort], $limit, $offset);

        return View::create($sourceDonneess, Response::HTTP_OK );
    }

    /**
     * Récupèrer une sourceDonnees.
     *
     * @ParamConverter("sourceDonnees", class="App:SourceDonnees")
     * @FOSRest\View(populateDefaultVars=false)
     * @FOSRest\Get("/sourceDonneess/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Retourner  sourceDonnees",
     * )
     * @SWG\Tag(name="Referentiel")
     * @return array
     */
    public function getSourceDonneesAction(Request $request, SourceDonnees $sourceDonnees)
    {
        if (empty($sourceDonnees)) {
            return View::create(['message' => 'SourceDonnees not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($sourceDonnees, Response::HTTP_OK );
    }

    public function getRequestParameter($request, &$criteriaArray)
    {
        if(!empty($request->get('id')) && !empty($request->get('code'))){

            return View::create(['message' => 'Must fill id or code, not both !'], Response::HTTP_BAD_REQUEST);

        } elseif(!empty($request->get('id'))) {
            $criteriaArray['id']=$request->get('id');
        } elseif (!empty($request->get('code'))) {
            $criteriaArray['code'] = $request->get('code');
        } else {
            return View::create(['message' => 'Must fill one parameter : id or code !'], Response::HTTP_BAD_REQUEST);
        }

    }
}