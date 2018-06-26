<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FamilleMetier
 *
 * @ORM\Table(name="FAMILLE_METIER")
 * @ORM\Entity
 */
class FamilleMetier
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_FAMILLE_METIER", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="FAMILLE_METIER_ID_FAMILLE_METI", allocationSize=1, initialValue=1)
     */
    private $idFamilleMetier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_FAMILLE_METIER", type="string", length=64, nullable=true)
     */
    private $libelleFamilleMetier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE_FAMILLE_METIER", type="string", length=64, nullable=true)
     */
    private $codeFamilleMetier;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ACTIF", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @return int
     */
    public function getIdFamilleMetier(): int
    {
        return $this->idFamilleMetier;
    }

    /**
     * @param int $idFamilleMetier
     */
    public function setIdFamilleMetier(int $idFamilleMetier): void
    {
        $this->idFamilleMetier = $idFamilleMetier;
    }

    /**
     * @return null|string
     */
    public function getLibelleFamilleMetier(): ?string
    {
        return $this->libelleFamilleMetier;
    }

    /**
     * @param null|string $libelleFamilleMetier
     */
    public function setLibelleFamilleMetier(?string $libelleFamilleMetier): void
    {
        $this->libelleFamilleMetier = $libelleFamilleMetier;
    }

    /**
     * @return null|string
     */
    public function getCodeFamilleMetier(): ?string
    {
        return $this->codeFamilleMetier;
    }

    /**
     * @param null|string $codeFamilleMetier
     */
    public function setCodeFamilleMetier(?string $codeFamilleMetier): void
    {
        $this->codeFamilleMetier = $codeFamilleMetier;
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
        return $this->idFamilleMetier;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idFamilleMetier = $id;
    }
}
