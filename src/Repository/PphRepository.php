<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class PphRepository extends EntityRepository
{
    public function findByNomPrenomDateNaissance($nom, $prenom, $dateNaissance)
    {

        return $this->createQueryBuilder('pph')
            ->select('pph.id')
            ->andWhere('pph.nomNaissanceCondense = :nom')
            ->andWhere('pph.prenomNaissanceCondense = :prenom')
            ->andWhere('pph.dateNaissance = :dateNaissance')
            ->setParameter('nom', $nom)
            ->setParameter('prenom', $prenom)
            ->setParameter('dateNaissance', $dateNaissance)
            ->orderBy('pph.nomNaissance', 'ASC')
            ->orderBy('pph.prenom', 'ASC')
            ->orderBy('pph.dateNaissance', 'ASC')
            ->orderBy('pph.idEtatPph', 'ASC')
            ->getQuery()
            ->getArrayResult();
    }

}