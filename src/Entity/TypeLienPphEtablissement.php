<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeLienPphEtablissement
 *
 * @ORM\Table(name="TYPE_LIEN_PPH_ETABLISSEMENT")
 * @ORM\Entity
 */
class TypeLienPphEtablissement
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_TYPE_LIEN_PE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="TYPE_LIEN_PPH_ETABLISSEMENT_ID", allocationSize=1, initialValue=1)
     */
    private $idTypeLienPe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_TYPE_LIEN", type="string", length=32, nullable=true)
     */
    private $libelleTypeLien;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE_LIEN_PE", type="string", length=45, nullable=true)
     */
    private $codeLienPe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="STATUS", type="string", length=45, nullable=true)
     */
    private $status;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ACTIF", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @return int
     */
    public function getIdTypeLienPe(): int
    {
        return $this->idTypeLienPe;
    }

    /**
     * @param int $idTypeLienPe
     */
    public function setIdTypeLienPe(int $idTypeLienPe): void
    {
        $this->idTypeLienPe = $idTypeLienPe;
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
     * @return null|string
     */
    public function getCodeLienPe(): ?string
    {
        return $this->codeLienPe;
    }

    /**
     * @param null|string $codeLienPe
     */
    public function setCodeLienPe(?string $codeLienPe): void
    {
        $this->codeLienPe = $codeLienPe;
    }

    /**
     * @return null|string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param null|string $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
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
        return $this->idTypeLienPe;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idTypeLienPe = $id;
    }
}
