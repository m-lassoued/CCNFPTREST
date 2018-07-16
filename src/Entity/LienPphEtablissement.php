<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

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
     * @Groups({"lienPphEtablissement"})
     */
    private $dateDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_FIN", type="date", nullable=true)
     * @Groups({"lienPphEtablissement"})
     */
    private $dateFin;

    /**
     * @var Pph
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Pph")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PPH_ID", referencedColumnName="ID")
     * })
     * @Groups({"lienPphEtablissement"})
     */
    private $pph;

    /**
     * @var Etablissement
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Etablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ETABLISSEMENT_ID", referencedColumnName="ID")
     * })
     * @Groups({"lienPphEtablissement"})
     */
    private $etablissement;

    /**
     * @var TypeLienPphEtablissement
     *
     * @ORM\ManyToOne(targetEntity="TypeLienPphEtablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TYPE_LIEN_PE", referencedColumnName="ID")
     * })
     * @Groups({"lienPphEtablissement"})
     */
    private $idTypeLienPe;

    /**
     * @var Coordonnees
     *
     * @ORM\ManyToOne(targetEntity="Coordonnees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_COORDONNEES", referencedColumnName="ID")
     * })
     */
    private $idCoordonnees;

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
     * @return null|Pph
     */
    public function getPph(): ?Pph
    {
        return $this->pph;
    }

    /**
     * @param null|Pph $pph
     */
    public function setPph($pph): void
    {
        $this->pph = $pph;
    }

    /**
     * @return null|Etablissement
     */
    public function getEtablissement(): ?Etablissement
    {
        return $this->etablissement;
    }

    /**
     * @param null|Etablissement $etablissement
     */
    public function setEtablissement($etablissement): void
    {
        $this->etablissement = $etablissement;
    }

    /**
     * @return null|TypeLienPphEtablissement
     */
    public function getIdTypeLienPe(): ?TypeLienPphEtablissement
    {
        return $this->idTypeLienPe;
    }

    /**
     * @param null|TypeLienPphEtablissement $idTypeLienPe
     */
    public function setIdTypeLienPe($idTypeLienPe): void
    {
        $this->idTypeLienPe = $idTypeLienPe;
    }

    /**
     * @return null|Coordonnees
     */
    public function getIdCoordonnees(): ?Coordonnees
    {
        return $this->idCoordonnees;
    }

    /**
     * @param Coordonnees $idCoordonnees
     */
    public function setIdCoordonnees(Coordonnees $idCoordonnees): void
    {
        $this->idCoordonnees = $idCoordonnees;
    }

}
