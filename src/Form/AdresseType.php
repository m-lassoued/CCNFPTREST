<?php

namespace App\Form;

use App\Entity\Adresse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresse1')
            ->add('adresse2')
            ->add('adresse3')
            ->add('codePostal')
            ->add('autreCommune')
            ->add('idCommune')
            ->add('idPays')
            ->add('idTypeAdresse')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
            'csrf_protection' => false
        ]);
    }
}
