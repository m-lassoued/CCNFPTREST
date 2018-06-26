<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SourceDonnees
 *
 * @ORM\Table(name="SOURCE_DONNEES")
 * @ORM\Entity
 */
class SourceDonnees
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_SOURCE_DONNEES", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="SOURCE_DONNEES_ID_SOURCE_DONNE", allocationSize=1, initialValue=1)
     */
    private $idSourceDonnees;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_SOURCE_DONNEES", type="string", length=32, nullable=true)
     */
    private $libelleSourceDonnees;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ACTIF", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @return int
     */
    public function getIdSourceDonnees(): int
    {
        return $this->idSourceDonnees;
    }

    /**
     * @param int $idSourceDonnees
     */
    public function setIdSourceDonnees(int $idSourceDonnees): void
    {
        $this->idSourceDonnees = $idSourceDonnees;
    }

    /**
     * @return null|string
     */
    public function getLibelleSourceDonnees(): ?string
    {
        return $this->libelleSourceDonnees;
    }

    /**
     * @param null|string $libelleSourceDonnees
     */
    public function setLibelleSourceDonnees(?string $libelleSourceDonnees): void
    {
        $this->libelleSourceDonnees = $libelleSourceDonnees;
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
        return $this->idSourceDonnees;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idSourceDonnees = $id;
    }
}
