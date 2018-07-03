<?php

namespace App\Controller\Api;

use App\Form\AdresseType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use App\Entity\Adresse;

/**
 * Brand controller.
 *
 * @Route("/api")
 */
class AdresseController extends Controller
{

    /**
     * Récupèrer la liste des adresses.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"adresse"})
     * @FOSRest\Get("/adresses")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the adresses",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Adresse::class))
     *     )
     * )
     * @SWG\Parameter(name="offset",in="query",type="integer",description="Index de début de la pagination", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="limit",in="query",type="integer",description="Nombre d'éléments à afficher", allowEmptyValue=false, format="\d+")
     * @SWG\Parameter(name="sort",in="query",type="string",description="Ordre de tri (basé sur le nom)",format="(asc|desc)")
     *
     * @SWG\Tag(name="adresses")
     *
     * @return array
     */
    public function getAdressesAction(Request $request)
    {

        $offset = $request->get('offset');
        $limit = $request->get('limit');
        $sort = $request->get('sort')?$request->get('sort'):'asc';

        $repository = $this->getDoctrine()->getRepository(Adresse::class);

        // query for a single Product by its primary key (usually "id")
        $adresses = $repository->findBy([],['adresse1'=>$sort], $limit, $offset);

        return View::create($adresses, Response::HTTP_OK );
    }

    /**
     * Récupèrer une adresse.
     *
     * @ParamConverter("adresse", class="App:Adresse")
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"adresse"})
     * @FOSRest\Get("/adresses/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the adresse",
     * )
     * @SWG\Tag(name="adresses")
     * @return array
     */
    public function getAdresseAction(Request $request, Adresse $adresse)
    {
        if (empty($adresse)) {
            return View::create(['message' => 'Adresse not found'], Response::HTTP_NOT_FOUND);
        }

        return View::create($adresse, Response::HTTP_OK );
    }
    /**
     * Créer une adresse.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"adresse"})
     * @FOSRest\Post("/adresse/new")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the adresses",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Adresse::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Adresse::class)
     *    )
     *
     * )
     * @SWG\Tag(name="adresses")
     *
     * @return array
     */
    public function postAdresseAction(Request $request)
    {
        $adresse = new Adresse();
        $form = $this->createForm(AdresseType::class, $adresse);

        $form->submit($request->request->all()); // Validation des données

        if (!$form->isValid()) {
            return View::create((string) $form->getErrors(true, false), Response::HTTP_BAD_REQUEST );
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($adresse);
        $em->flush();

        return View::create($adresse, Response::HTTP_CREATED );

    }

    /**
     *
     * Modifier une adresse.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"adresse"})
     * @FOSRest\Put("/adresses/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the adresse updated",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Adresse::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Adresse::class)
     *    )
     *
     * )
     * @SWG\Tag(name="adresses")
     *
     */
    public function updateAdresseAction(Request $request, $id)
    {
        return $this->updateAdresse($request, true, $id);
    }

    /**
     *
     * Modification partielle d'une adresse.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"adresse"})
     * @FOSRest\Patch("/adresses/{id}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the adresse patched",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Adresse::class))
     *     )
     * )
     *
     * @SWG\Parameter(
     *    name="body",
     *    in="body",
     *    @SWG\Schema(
     *       type="object",
     *        @Model(type=Adresse::class)
     *    )
     *
     * )
     * @SWG\Tag(name="adresses")
     */
    public function patchAdresseAction(Request $request, $id)
    {
        return $this->updateAdresse($request, false, $id);
    }


    private function updateAdresse(Request $request, $clearMissing, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $adresse = $em
            ->getRepository('App:Adresse')
            ->find($id);
        /* @var $adresse Adresse */

        if (empty($adresse)) {
            return View::create(['message' => 'Adresse not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(AdresseType::class, $adresse);

        // Le paramètre $clearMissing false dit à Symfony de garder les valeurs dans notre
        // entité si l'utilisateur n'en fournit pas une dans sa requête

        $form->submit($request->request->all(), $clearMissing);

        if (!$form->isValid()) {
            return View::create((string) $form->getErrors(true, false), Response::HTTP_BAD_REQUEST );
        }

        $em->persist($adresse);
        $em->flush();

        return View::create($adresse, Response::HTTP_CREATED );

    }

    /**
     *
     * Supprimer une adresse.
     *
     * @FOSRest\View(populateDefaultVars=false, serializerGroups={"adresse"})
     * @FOSRest\Delete("/adresses/{adresse}")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the if adresse was deleted"
     * )
     *
     * @SWG\Tag(name="adresses")
     */
    public function removeAdresseAction(Request $request, $adresse)
    {

        $em = $this->getDoctrine()->getManager();
        $adresse = $em
            ->getRepository('App:Adresse')
            ->find($adresse); // L'identifiant en tant que paramètre n'est plus nécessaire

        /* @var $adresse Adresse */
        if (empty($adresse)) {
            return View::create(['message' => 'Adresse not found'], Response::HTTP_NOT_FOUND);
        }

        //TODO supprimer les relations avec $adresse


        $em->remove($adresse);
        $em->flush();

        return View::create(['message' => 'Adresse removed'], Response::HTTP_OK );
    }
}