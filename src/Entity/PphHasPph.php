<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PphHasPph
 *
 * @ORM\Table(name="PPH_HAS_PPH", indexes={@ORM\Index(name="fk_pph_has_pph_pph2_idx", columns={"PPH_ID_PPH1"}), @ORM\Index(name="fk_pph_has_ptp1_idx", columns={"ID_TYPE_LIEN"}), @ORM\Index(name="fk_pph_has_pph_pph1_idx", columns={"PPH_ID_PPH"})})
 * @ORM\Entity
 */
class PphHasPph
{
    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_DEBUT", type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_FIN", type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @var \TypeLienPphPph
     *
     * @ORM\ManyToOne(targetEntity="TypeLienPphPph")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TYPE_LIEN", referencedColumnName="ID")
     * })
     */
    private $idTypeLien;

    /**
     * @var \Pph
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Pph")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PPH_ID_PPH", referencedColumnName="ID")
     * })
     */
    private $pphPph;

    /**
     * @var \Pph
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Pph")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PPH_ID_PPH1", referencedColumnName="ID")
     * })
     */
    private $pphPph1;

    /**
     * @return \DateTime|null
     */
    public function getDateDebut(): ?\DateTime
    {
        return $this->dateDebut;
    }

    /**
     * @param \DateTime|null $dateDebut
     */
    public function setDateDebut(?\DateTime $dateDebut): void
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateFin(): ?\DateTime
    {
        return $this->dateFin;
    }

    /**
     * @param \DateTime|null $dateFin
     */
    public function setDateFin(?\DateTime $dateFin): void
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return \TypeLienPphPph
     */
    public function getIdTypeLien(): \TypeLienPphPph
    {
        return $this->idTypeLien;
    }

    /**
     * @param \TypeLienPphPph $idTypeLien
     */
    public function setIdTypeLien(\TypeLienPphPph $idTypeLien): void
    {
        $this->idTypeLien = $idTypeLien;
    }

    /**
     * @return \Pph
     */
    public function getPphPph(): \Pph
    {
        return $this->pphPph;
    }

    /**
     * @param \Pph $pphPph
     */
    public function setPphPph(\Pph $pphPph): void
    {
        $this->pphPph = $pphPph;
    }

    /**
     * @return \Pph
     */
    public function getPphPph1(): \Pph
    {
        return $this->pphPph1;
    }

    /**
     * @param \Pph $pphPph1
     */
    public function setPphPph1(\Pph $pphPph1): void
    {
        $this->pphPph1 = $pphPph1;
    }

}
