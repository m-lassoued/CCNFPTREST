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
            ->add('dateNaissance')
            ->add('dateDeces')
            ->add('dateEntreeFonctionPublique')
            ->add('estDecede')
            ->add('estRetraite')
            ->add('aQuitteFonctionPublique')
            ->add('dateEntreeDansGrade')
            ->add('categorie')
            ->add('encadrement')
            ->add('identiteVerifiee')
            ->add('dateInactivation')
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
            ->add('idCivilite', EntityType::class, array('class' => Civilite::class, 'choice_label' => 'libelle'))
            ->add('idCoordonnees', EntityType::class, array('class' => Coordonnees::class, 'choice_label' => 'libelle'))
            ->add('idEtatPph', EntityType::class, array('class' => EtatPph::class, 'choice_label' => 'libelle'))
            ->add('idMetier', EntityType::class, array('class' => Metier::class, 'choice_label' => 'libelle'))
            ->add('idMotifInactivation', EntityType::class, array('class' => MotifInactivation::class, 'choice_label' => 'libelle'))
            ->add('idNet', EntityType::class, array('class' => Net::class, 'choice_label' => 'libelle'))
            ->add('idSourceDonnees', EntityType::class, array('class' => SourceDonnees::class, 'choice_label' => 'libelle'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pph::class,
        ]);
    }
}
