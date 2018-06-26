<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metier
 *
 * @ORM\Table(name="METIER", indexes={@ORM\Index(name="fk_mfm1_idx", columns={"ID_FAMILLE_METIER"})})
 * @ORM\Entity
 */
class Metier
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_METIER", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="METIER_ID_METIER_seq", allocationSize=1, initialValue=1)
     */
    private $idMetier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_METIER", type="string", length=64, nullable=true)
     */
    private $libelleMetier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE_METIER", type="string", length=64, nullable=true)
     */
    private $codeMetier;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ACTIF", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @var \FamilleMetier
     *
     * @ORM\ManyToOne(targetEntity="FamilleMetier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_FAMILLE_METIER", referencedColumnName="ID_FAMILLE_METIER")
     * })
     */
    private $idFamilleMetier;

    /**
     * @return int
     */
    public function getIdMetier(): int
    {
        return $this->idMetier;
    }

    /**
     * @param int $idMetier
     */
    public function setIdMetier(int $idMetier): void
    {
        $this->idMetier = $idMetier;
    }

    /**
     * @return null|string
     */
    public function getLibelleMetier(): ?string
    {
        return $this->libelleMetier;
    }

    /**
     * @param null|string $libelleMetier
     */
    public function setLibelleMetier(?string $libelleMetier): void
    {
        $this->libelleMetier = $libelleMetier;
    }

    /**
     * @return null|string
     */
    public function getCodeMetier(): ?string
    {
        return $this->codeMetier;
    }

    /**
     * @param null|string $codeMetier
     */
    public function setCodeMetier(?string $codeMetier): void
    {
        $this->codeMetier = $codeMetier;
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
     * @return \FamilleMetier
     */
    public function getIdFamilleMetier(): \FamilleMetier
    {
        return $this->idFamilleMetier;
    }

    /**
     * @param \FamilleMetier $idFamilleMetier
     */
    public function setIdFamilleMetier(\FamilleMetier $idFamilleMetier): void
    {
        $this->idFamilleMetier = $idFamilleMetier;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idMetier;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idMetier = $id;
    }
}
