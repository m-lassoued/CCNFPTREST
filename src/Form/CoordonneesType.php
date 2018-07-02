<?php

namespace App\Form;

use App\Entity\Coordonnees;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoordonneesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('telephoneFixe')
            ->add('telephonePortable')
            ->add('adresseEPrincipale')
            ->add('adresseESecondaire')
            ->add('idAdresse')
            ->add('idTypeCoordonnees')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Coordonnees::class,
        ]);
    }
}
