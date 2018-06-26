<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadreEmploi
 *
 * @ORM\Table(name="CADRE_EMPLOI", indexes={@ORM\Index(name="fk_cadre_emploi_filliere1_idx", columns={"ID_FILLIERE"})})
 * @ORM\Entity
 */
class CadreEmploi
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_CADRE_EMPLOI", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="CADRE_EMPLOI_ID_CADRE_EMPLOI_s", allocationSize=1, initialValue=1)
     */
    private $idCadreEmploi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_CADRE_EMPLOI", type="string", length=64, nullable=true)
     */
    private $libelleCadreEmploi;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ACTIF", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @var \Filliere
     *
     * @ORM\ManyToOne(targetEntity="Filliere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_FILLIERE", referencedColumnName="ID_FILLIERE")
     * })
     */
    private $idFilliere;

    /**
     * @return int
     */
    public function getIdCadreEmploi(): int
    {
        return $this->idCadreEmploi;
    }

    /**
     * @param int $idCadreEmploi
     */
    public function setIdCadreEmploi(int $idCadreEmploi): void
    {
        $this->idCadreEmploi = $idCadreEmploi;
    }

    /**
     * @return null|string
     */
    public function getLibelleCadreEmploi(): ?string
    {
        return $this->libelleCadreEmploi;
    }

    /**
     * @param null|string $libelleCadreEmploi
     */
    public function setLibelleCadreEmploi(?string $libelleCadreEmploi): void
    {
        $this->libelleCadreEmploi = $libelleCadreEmploi;
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
     * @return \Filliere
     */
    public function getIdFilliere(): \Filliere
    {
        return $this->idFilliere;
    }

    /**
     * @param \Filliere $idFilliere
     */
    public function setIdFilliere(\Filliere $idFilliere): void
    {
        $this->idFilliere = $idFilliere;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idCadreEmploi;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idCadreEmploi = $id;
    }
}
