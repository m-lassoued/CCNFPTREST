<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeCoordonnees
 *
 * @ORM\Table(name="TYPE_COORDONNEES")
 * @ORM\Entity
 */
class TypeCoordonnees
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_TYPE_COORDONNEES", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="TYPE_COORDONNEES_ID_TYPE_COORD", allocationSize=1, initialValue=1)
     */
    private $idTypeCoordonnees;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_TYPE_COORDONNEES", type="string", length=32, nullable=true)
     */
    private $libelleTypeCoordonnees;

    /**
     * @return int
     */
    public function getIdTypeCoordonnees(): int
    {
        return $this->idTypeCoordonnees;
    }

    /**
     * @param int $idTypeCoordonnees
     */
    public function setIdTypeCoordonnees(int $idTypeCoordonnees): void
    {
        $this->idTypeCoordonnees = $idTypeCoordonnees;
    }

    /**
     * @return null|string
     */
    public function getLibelleTypeCoordonnees(): ?string
    {
        return $this->libelleTypeCoordonnees;
    }

    /**
     * @param null|string $libelleTypeCoordonnees
     */
    public function setLibelleTypeCoordonnees(?string $libelleTypeCoordonnees): void
    {
        $this->libelleTypeCoordonnees = $libelleTypeCoordonnees;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idTypeCoordonnees;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idTypeCoordonnees = $id;
    }
}
