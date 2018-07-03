<?php

namespace App\Form;

use App\Entity\LienPphEtablissement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LienPphEtablissementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDebut', DateTimeType::class, array('widget' => 'single_text'))
            ->add('dateFin', DateTimeType::class, array('widget' => 'single_text'))
            ->add('pph')
            ->add('etablissement')
            ->add('idTypeLienPe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LienPphEtablissement::class,
            'csrf_protection' => false
        ]);
    }
}
