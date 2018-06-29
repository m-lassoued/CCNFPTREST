<?php

namespace App\Controller\Api;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Request\ParamFetcher;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
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
     * Récupère la liste des personnes physiques.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"pph"})
     * @FOSRest\Get("/pphs")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the pphs",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Pph::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="pphs")
     *
     * @return array
     */
    public function getPphAction(Request $request)
    {
        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(Pph::class);
        
        // query for a single Product by its primary key (usually "id")
        $pphs = $repository->findBy([],['nomUsage'=>$sort], $limit, $offset);

        return View::create($pphs, Response::HTTP_OK , []);
    }

    /**
     * Créer une personne physique.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"pph"})
     * @FOSRest\Post("/pph/new")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the pphs",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Pph::class))
     *     )
     * )
     * @SWG\Parameter(name="nom_naissance",in="formData",type="string",description="")
     * @SWG\Parameter(name="nom_usage",in="formData",type="string",description="")
     * @SWG\Parameter(name="prenom",in="formData",type="string",description="")
     * @SWG\Parameter(name="date_naissance",in="formData",type="string",description="")
     * @SWG\Parameter(name="date_entree_fonction_publique",in="formData",type="string",description="")
     * @SWG\Parameter(name="est_decede",in="formData",type="boolean",description="")
     * @SWG\Parameter(name="est_retraite",in="formData",type="boolean",description="")
     * @SWG\Parameter(name="a_quitte_fonction_publique",in="formData",type="boolean",description="")
     * @SWG\Parameter(name="date_entree_dans_grade",in="formData",type="string",description="")
     * @SWG\Parameter(name="categorie",in="formData",type="string",description="")
     * @SWG\Parameter(name="date_entree_dans_grade",in="formData",type="string",description="")
     * @SWG\Parameter(name="encadrement",in="formData",type="string",description="")
     * @SWG\Parameter(name="identite_verifiee",in="formData",type="boolean",description="")
     * @SWG\Parameter(name="libelle_grade",in="formData",type="string",description="")
     * @SWG\Parameter(name="est_agent",in="formData",type="boolean",description="")
     * @SWG\Parameter(name="est_intervenant",in="formData",type="boolean",description="")
     * @SWG\Parameter(name="est_gestionnaire_ct",in="formData",type="boolean",description="")
     * @SWG\Parameter(name="id_fiche_agent_iel",in="formData",type="integer",description="")
     *
     * @SWG\Tag(name="pphs")
     *
     * @return array
     */
    public function postPphAction(Request $request)
    {
        $pph = new Pph();

        $pph->setNomNaissance($request->get('nom_naissance'));
        $pph->setNomUsage($request->get('nom_usage'));
        $pph->setPrenom($request->get('prenom'));
        $pph->setNomNaissanceCondense(strtoupper($request->get('nom_naissance')));
        $pph->setPrenomNaissanceCondense(strtoupper($request->get('prenom')));
        $pph->setNomUsageCondense(strtoupper($request->get('nom_usage')));
        $pph->setDateNaissance(new \DateTime($request->get('date_naissance')));
        $pph->setDateEntreeFonctionPublique(new \DateTime($request->get('date_entree_fonction_publique')));
        $pph->setEstDecede($request->get('est_decede'));
        $pph->setEstRetraite($request->get('est_retraite'));
        $pph->setAQuitteFonctionPublique($request->get('a_quitte_fonction_publique'));
        $pph->setDateEntreeDansGrade(new \DateTime($request->get('date_entree_dans_grade')));
        $pph->setCategorie($request->get('categorie'));
        $pph->setEncadrement($request->get('encadrement'));
        $pph->setIdentiteVerifiee($request->get('identite_verifiee'));
        $pph->setLibelleGrade($request->get('libelle_grade'));
        $pph->setReferencePersonnePhysique($pph->getNomNaissanceCondense().$pph->getPrenomNaissanceCondense().'ID'.md5(time()));
        $pph->setEstAgent($request->get('est_agent'));
        $pph->setEstIntervenant($request->get('est_intervenant'));
        $pph->setEstGestionnaireCt($request->get('est_gestionnaire_ct'));
        $pph->setIdComptePortailAgent($request->get('id_fiche_agent_iel'));

        $em = $this->getDoctrine()->getManager();
        $em->persist($pph);
        $em->flush();

        return View::create($pph, Response::HTTP_CREATED , []);
        
    }
}