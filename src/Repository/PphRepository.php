<?php
namespace App\Repository;

use App\Repository\AbstractRepository;

class PphRepository extends AbstractRepository
{
    /**
     * @param string $term
     * @param string $order
     *
     * @return \Traversable
     */
    public function search($term, $order = 'asc', $limit = 20, $offset = 0)
    {
        $qb = $this
            ->createQueryBuilder('pph')
            ->select('pph')
            ->orderBy('pph.nomUsage', $order)
        ;

        if ($term) {
            $qb
                ->where('pph.nomUsage LIKE ?1')
                ->setParameter(1, '%' . $term . '%')
            ;
        }
        return $this->paginate($qb, $limit, $offset);
    }
    public function findByNomPrenomDateNaissance($nom, $prenom, $dateNaissance)
    {

        $ids = [];
        $pphs = $this->createQueryBuilder('pph')
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
        foreach ($pphs as $pph){
            $ids[]=$pph['id'];
        }

        return $ids;
    }

}