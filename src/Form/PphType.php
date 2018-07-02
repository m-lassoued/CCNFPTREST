<?php

namespace App\Form;

use App\Entity\Civilite;
use App\Entity\Coordonnees;
use App\Entity\EtatPph;
use App\Entity\Metier;
use App\Entity\MotifInactivation;
use App\Entity\Net;
use App\Entity\Pph;
use App\Entity\SourceDonnees;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PphType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomNaissance')
            ->add('nomUsage')
            ->add('prenom')
            ->add('dateNaissance', DateTimeType::class, array('widget' => 'single_text'))
            ->add('dateDeces', DateTimeType::class, array('widget' => 'single_text'))
            ->add('dateEntreeFonctionPublique', DateTimeType::class, array('widget' => 'single_text'))
            ->add('estDecede')
            ->add('estRetraite')
            ->add('aQuitteFonctionPublique')
            ->add('dateEntreeDansGrade', DateTimeType::class, array('widget' => 'single_text'))
            ->add('categorie')
            ->add('encadrement')
            ->add('identiteVerifiee')
            ->add('dateInactivation', DateTimeType::class, array('widget' => 'single_text'))
            ->add('libelleGrade')
            ->add('referencePersonnePhysique')
            ->add('estAgent')
            ->add('estIntervenant')
            ->add('estGestionnaireCt')
            ->add('idComptePortailAgent')
            ->add('idFicheAgentIel')
            ->add('estDedoublone')
            ->add('nomNaissanceCondense')
            ->add('prenomNaissanceCondense')
            ->add('nomUsageCondense')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pph::class,
            'csrf_protection' => false
        ]);
    }
}
