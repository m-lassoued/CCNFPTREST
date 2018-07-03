<?php

namespace App\Form;

use App\Entity\PersonneMorale;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonneMoraleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('siren')
            ->add('nom')
            ->add('idPmo1')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PersonneMorale::class,
            'csrf_protection' => false
        ]);
    }
}
