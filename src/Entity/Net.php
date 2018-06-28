<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Net
 *
 * @ORM\Table(name="NET", indexes={@ORM\Index(name="fk_net_cadre_emploi1_idx", columns={"ID_CADRE_EMPLOI"})})
 * @ORM\Entity
 */
class Net
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
     * @ORM\Column(name="LIBELLE", type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE", type="string", length=5, nullable=true)
     */
    private $code;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ACTIF", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @var \CadreEmploi
     *
     * @ORM\ManyToOne(targetEntity="CadreEmploi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CADRE_EMPLOI", referencedColumnName="ID")
     * })
     */
    private $idCadreEmploi;

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
     * @return \CadreEmploi
     */
    public function getIdCadreEmploi(): \CadreEmploi
    {
        return $this->idCadreEmploi;
    }

    /**
     * @param \CadreEmploi $idCadreEmploi
     */
    public function setIdCadreEmploi(\CadreEmploi $idCadreEmploi): void
    {
        $this->idCadreEmploi = $idCadreEmploi;
    }

}
