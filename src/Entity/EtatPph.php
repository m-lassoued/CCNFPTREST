<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtatPph
 *
 * @ORM\Table(name="ETAT_PPH")
 * @ORM\Entity
 */
class EtatPph
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_ETAT_PPH", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ETAT_PPH_ID_ETAT_PPH_seq", allocationSize=1, initialValue=1)
     */
    private $idEtatPph;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_ETAT_PPH", type="string", length=32, nullable=true)
     */
    private $libelleEtatPph;

    /**
     * @return int
     */
    public function getIdEtatPph(): int
    {
        return $this->idEtatPph;
    }

    /**
     * @param int $idEtatPph
     */
    public function setIdEtatPph(int $idEtatPph): void
    {
        $this->idEtatPph = $idEtatPph;
    }

    /**
     * @return null|string
     */
    public function getLibelleEtatPph(): ?string
    {
        return $this->libelleEtatPph;
    }

    /**
     * @param null|string $libelleEtatPph
     */
    public function setLibelleEtatPph(?string $libelleEtatPph): void
    {
        $this->libelleEtatPph = $libelleEtatPph;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idEtatPph;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idEtatPph = $id;
    }
}
