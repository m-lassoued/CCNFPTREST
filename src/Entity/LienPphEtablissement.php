<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LienPphEtablissement
 *
 * @ORM\Table(name="LIEN_PPH_ETABLISSEMENT", indexes={@ORM\Index(name="fk_pph_has_eet1_idx", columns={"ETABLISSEMENT_ID"}), @ORM\Index(name="fk_lien_pph_e_pph1_idx", columns={"PPH_ID"}), @ORM\Index(name="fk_pph_has_etht1_idx", columns={"ID_TYPE_LIEN_PE"})})
 * @ORM\Entity
 */
class LienPphEtablissement
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
     * @var \Pph
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Pph")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PPH_ID", referencedColumnName="ID")
     * })
     */
    private $pph;

    /**
     * @var \Etablissement
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Etablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ETABLISSEMENT_ID", referencedColumnName="ID")
     * })
     */
    private $etablissement;

    /**
     * @var \TypeLienPphEtablissement
     *
     * @ORM\ManyToOne(targetEntity="TypeLienPphEtablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TYPE_LIEN_PE", referencedColumnName="ID")
     * })
     */
    private $idTypeLienPe;

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
     * @return \Pph
     */
    public function getPph(): \Pph
    {
        return $this->pph;
    }

    /**
     * @param \Pph $pph
     */
    public function setPph(\Pph $pph): void
    {
        $this->pph = $pph;
    }

    /**
     * @return \Etablissement
     */
    public function getEtablissement(): \Etablissement
    {
        return $this->etablissement;
    }

    /**
     * @param \Etablissement $etablissement
     */
    public function setEtablissement(\Etablissement $etablissement): void
    {
        $this->etablissement = $etablissement;
    }

    /**
     * @return \TypeLienPphEtablissement
     */
    public function getIdTypeLienPe(): \TypeLienPphEtablissement
    {
        return $this->idTypeLienPe;
    }

    /**
     * @param \TypeLienPphEtablissement $idTypeLienPe
     */
    public function setIdTypeLienPe(\TypeLienPphEtablissement $idTypeLienPe): void
    {
        $this->idTypeLienPe = $idTypeLienPe;
    }

}
