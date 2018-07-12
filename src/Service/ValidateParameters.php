<?php

namespace App\Service;

use Symfony\Component\Form\FormInterface;

/**
 * Validate parameters of requested WS.
 *
 */
class ValidateParameters
{
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
    public static function getErrorsFromForm(FormInterface $form)
    {
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
