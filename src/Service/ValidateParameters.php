<?php

namespace App\Service;

use FOS\RestBundle\View\View;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationList;

/**
 * Validate parameters of requested WS.
 *
 */
class ValidateParameters
{
    /**
     * @param Request $request
     * @param ConstraintViolationList $violations
     * @param array $required
     * @return bool|View
     */
    public static function checkParams($request,$violations, $required=[]){

        if(!empty($required) && !self::checkRequiredParams($request, $required)){
            return View::create(ResponseApi::create(ResponseApi::ERROR_CODE_PARAM_REQUI), Response::HTTP_BAD_REQUEST );
        }
        if(!count($request->request->all())){
            return View::create(ResponseApi::create(ResponseApi::ERROR_CODE_PARAM_MANQUANT), Response::HTTP_BAD_REQUEST );
        }
        if($errors = self::checkViolations($violations)){
            return View::create(ResponseApi::create(ResponseApi::ERROR_CODE_PARAM_FORMAT, $errors), Response::HTTP_BAD_REQUEST );
        }

        return false;
    }
    public static function checkRequiredParams($request,$required){

        foreach ($required as $r) {
            if(!$request->get($r)){
                return false;
            }
        }

        return true;
    }
    public static function checkViolations($violations){

        $errors = [];
        if (count($violations)) {
            foreach ($violations as $violation) {
                $errors [$violation->getPropertyPath()] =  $violation->getMessage();
            }
            return $errors;
        }

        return false;
    }
    public static function getErrorsFromForm(FormInterface $form) {

        $errors = array();
        foreach ($form->getErrors() as $error) {
            $errors[] = $error->getMessage();
        }
        foreach ($form->all() as $childForm) {
            if ($childForm instanceof FormInterface) {
                if ($childErrors = self::getErrorsFromForm($childForm)) {
                    $errors[$childForm->getName()] = $childErrors;
                }
            }
        }

        return $errors;
    }
}
