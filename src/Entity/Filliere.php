<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filliere
 *
 * @ORM\Table(name="FILLIERE")
 * @ORM\Entity
 */
class Filliere
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_FILLIERE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="FILLIERE_ID_FILLIERE_seq", allocationSize=1, initialValue=1)
     */
    private $idFilliere;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_FILLIERE", type="string", length=64, nullable=true)
     */
    private $libelleFilliere;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ACTIF", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @return int
     */
    public function getIdFilliere(): int
    {
        return $this->idFilliere;
    }

    /**
     * @param int $idFilliere
     */
    public function setIdFilliere(int $idFilliere): void
    {
        $this->idFilliere = $idFilliere;
    }

    /**
     * @return null|string
     */
    public function getLibelleFilliere(): ?string
    {
        return $this->libelleFilliere;
    }

    /**
     * @param null|string $libelleFilliere
     */
    public function setLibelleFilliere(?string $libelleFilliere): void
    {
        $this->libelleFilliere = $libelleFilliere;
    }

    /**
     * @return bool|null
     */
    public function getActif(): ?bool
    {
        return $this->actif;
    }

    /**
     * @param bool|null $actif
     */
    public function setActif(?bool $actif): void
    {
        $this->actif = $actif;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idFilliere;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idFilliere = $id;
    }
}
