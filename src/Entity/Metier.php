<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

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
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE", type="string", length=64, nullable=true)
     * @Groups({"metier"})
     */
    private $libelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE", type="string", length=64, nullable=true)
     * @Groups({"metier"})
     */
    private $code;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ACTIF", type="boolean", nullable=true)
     * @Groups({"metier"})
     */
    private $actif;

    /**
     * @var FamilleMetier
     *
     * @ORM\ManyToOne(targetEntity="FamilleMetier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_FAMILLE_METIER", referencedColumnName="ID")
     * })
     * @Groups({"metier"})
     */
    private $idFamilleMetier;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return null|string
     */
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    /**
     * @param null|string $libelle
     */
    public function setLibelle(?string $libelle): void
    {
        $this->libelle = $libelle;
    }

    /**
     * @return null|string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
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
     * @return null|FamilleMetier
     */
    public function getIdFamilleMetier(): ?FamilleMetier
    {
        return $this->idFamilleMetier;
    }

    /**
     * @param null|FamilleMetier $idFamilleMetier
     */
    public function setIdFamilleMetier($idFamilleMetier): void
    {
        $this->idFamilleMetier = $idFamilleMetier;
    }

}
