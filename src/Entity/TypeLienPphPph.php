<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeLienPphPph
 *
 * @ORM\Table(name="TYPE_LIEN_PPH_PPH")
 * @ORM\Entity
 */
class TypeLienPphPph
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_TYPE_LIEN", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="TYPE_LIEN_PPH_PPH_ID_TYPE_LIEN", allocationSize=1, initialValue=1)
     */
    private $idTypeLien;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_TYPE_LIEN", type="string", length=64, nullable=true)
     */
    private $libelleTypeLien;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ACTIF", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @return int
     */
    public function getIdTypeLien(): int
    {
        return $this->idTypeLien;
    }

    /**
     * @param int $idTypeLien
     */
    public function setIdTypeLien(int $idTypeLien): void
    {
        $this->idTypeLien = $idTypeLien;
    }

    /**
     * @return null|string
     */
    public function getLibelleTypeLien(): ?string
    {
        return $this->libelleTypeLien;
    }

    /**
     * @param null|string $libelleTypeLien
     */
    public function setLibelleTypeLien(?string $libelleTypeLien): void
    {
        $this->libelleTypeLien = $libelleTypeLien;
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
        return $this->idTypeLien;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idTypeLien = $id;
    }
}
