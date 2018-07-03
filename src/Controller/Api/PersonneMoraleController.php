<?php

namespace App\Controller\Api;

use App\Form\PersonneMoraleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use App\Entity\PersonneMorale;

/**
 * Brand controller.
 *
 * @Route("/api")
 */
class PersonneMoraleController extends Controller
{

    /**
     * Récupèrer la liste des personne morales.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"personneMorale"})
     * @FOSRest\Get("/personneMorales")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the personneMorales",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=PersonneMorale::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="personneMorales")
     *
     * @return array
     */
    public function getPersonneMoralesAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(PersonneMorale::class);

        // query for a single Product by its primary key (usually "id")
        $personneMorales = $repository->findBy([],['nom'=>$sort], $limit, $offset);

        return View::create($personneMorales, Response::HTTP_OK );
    }

    /**
     * Récupèrer une personne morale.
     *
     * @ParamConverter("personneMorale", class="App:PersonneMorale")
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"personneMorale"})
     * @FOSRest\Get("/personneMorales/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the personneMorale",
     * )
     * @SWG\Tag(name="personneMorales")
     * @return array
     */
    public function getPersonneMoraleAction(Request $request, PersonneMorale $personneMorale)
    {
        if (empty($personneMorale)) {
            return View::create(['message' => 'PersonneMorale not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($personneMorale, Response::HTTP_OK );
    }
    /**
     * Créer une personne morale.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"personneMorale"})
     * @FOSRest\Post("/personneMorale/new")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the personneMorales",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=PersonneMorale::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=PersonneMorale::class)
     *    )
     *
     * )
     * @SWG\Tag(name="personneMorales")
     *
     * @return array
     */
    public function postPersonneMoraleAction(Request $request)
    {
        $personneMorale = new PersonneMorale();
        $form = $this->createForm(PersonneMoraleType::class, $personneMorale);

        $form->submit($request->request->all()); // Validation des données

        if (!$form->isValid()) {
            return View::create((string) $form->getErrors(true, false), Response::HTTP_BAD_REQUEST );
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($personneMorale);
        $em->flush();

        return View::create($personneMorale, Response::HTTP_CREATED );

    }

    /**
     *
     * Modifier une personne morale.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"personneMorale"})
     * @FOSRest\Put("/personneMorales/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the personneMorale updated",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=PersonneMorale::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=PersonneMorale::class)
     *    )
     *
     * )
     * @SWG\Tag(name="personneMorales")
     *
     */
    public function updatePersonneMoraleAction(Request $request, $id)
    {
        return $this->updatePersonneMorale($request, true, $id);
    }

    /**
     *
     * Modification partielle d'une personne morale.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"personneMorale"})
     * @FOSRest\Patch("/personneMorales/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the personneMorale patched",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=PersonneMorale::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=PersonneMorale::class)
     *    )
     *
     * )
     * @SWG\Tag(name="personneMorales")
     */
    public function patchPersonneMoraleAction(Request $request, $id)
    {
        return $this->updatePersonneMorale($request, false, $id);
    }


    private function updatePersonneMorale(Request $request, $clearMissing, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $personneMorale = $em
            ->getRepository('App:PersonneMorale')
            ->find($id);
        /* @var $personneMorale PersonneMorale */

        if (empty($personneMorale)) {
            return View::create(['message' => 'PersonneMorale not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(PersonneMoraleType::class, $personneMorale);

        // Le paramètre $clearMissing false dit à Symfony de garder les valeurs dans notre
        // entité si l'utilisateur n'en fournit pas une dans sa requête
        $form->submit($request->request->all(), $clearMissing);
        if (!$form->isValid()) {
            return View::create((string) $form->getErrors(true, false), Response::HTTP_BAD_REQUEST );
        }

        $em->persist($personneMorale);
        $em->flush();

        return View::create($personneMorale, Response::HTTP_CREATED );

    }

    /**
     *
     * Supprimer une personne morale.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"personneMorale"})
     * @FOSRest\Delete("/personneMorales/{personneMorale}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the if personneMorale was deleted"
     * )
     *
     * @SWG\Tag(name="personneMorales")
     */
    public function removePersonneMoraleAction(Request $request, $personneMorale)
    {

        $em = $this->getDoctrine()->getManager();
        $personneMorale = $em
            ->getRepository('App:PersonneMorale')
            ->find($personneMorale); // L'identifiant en tant que paramètre n'est plus nécessaire

        /* @var $personneMorale PersonneMorale */
        if (empty($personneMorale)) {
            return View::create(['message' => 'PersonneMorale not found'], Response::HTTP_NOT_FOUND);
        }

        //TODO supprimer les relations avec $personneMorale


        $em->remove($personneMorale);
        $em->flush();

        return View::create(['message' => 'PersonneMorale removed'], Response::HTTP_OK );
    }
}