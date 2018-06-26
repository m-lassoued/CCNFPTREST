<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etablissement
 *
 * @ORM\Table(name="ETABLISSEMENT", indexes={@ORM\Index(name="fk_eco1_idx", columns={"ID_COORDONNEES"}), @ORM\Index(name="fk_epm1_idx", columns={"ID_PMO"})})
 * @ORM\Entity
 */
class Etablissement
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_ETABLISSEMENT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ETABLISSEMENT_ID_ETABLISSEMENT", allocationSize=1, initialValue=1)
     */
    private $idEtablissement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SIRET", type="string", length=64, nullable=true)
     */
    private $siret;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_CREATION", type="date", nullable=true)
     */
    private $dateCreation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM", type="string", length=64, nullable=true)
     */
    private $nom;

    /**
     * @var \Coordonnees
     *
     * @ORM\ManyToOne(targetEntity="Coordonnees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_COORDONNEES", referencedColumnName="ID_COORDONNEES")
     * })
     */
    private $idCoordonnees;

    /**
     * @var \PersonneMorale
     *
     * @ORM\ManyToOne(targetEntity="PersonneMorale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PMO", referencedColumnName="ID_PMO")
     * })
     */
    private $idPmo;

    /**
     * @return int
     */
    public function getIdEtablissement(): int
    {
        return $this->idEtablissement;
    }

    /**
     * @param int $idEtablissement
     */
    public function setIdEtablissement(int $idEtablissement): void
    {
        $this->idEtablissement = $idEtablissement;
    }

    /**
     * @return null|string
     */
    public function getSiret(): ?string
    {
        return $this->siret;
    }

    /**
     * @param null|string $siret
     */
    public function setSiret(?string $siret): void
    {
        $this->siret = $siret;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateCreation(): ?\DateTime
    {
        return $this->dateCreation;
    }

    /**
     * @param \DateTime|null $dateCreation
     */
    public function setDateCreation(?\DateTime $dateCreation): void
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return null|string
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param null|string $nom
     */
    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return \Coordonnees
     */
    public function getIdCoordonnees(): \Coordonnees
    {
        return $this->idCoordonnees;
    }

    /**
     * @param \Coordonnees $idCoordonnees
     */
    public function setIdCoordonnees(\Coordonnees $idCoordonnees): void
    {
        $this->idCoordonnees = $idCoordonnees;
    }

    /**
     * @return \PersonneMorale
     */
    public function getIdPmo(): \PersonneMorale
    {
        return $this->idPmo;
    }

    /**
     * @param \PersonneMorale $idPmo
     */
    public function setIdPmo(\PersonneMorale $idPmo): void
    {
        $this->idPmo = $idPmo;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idEtablissement;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idCoordonnees = $id;
    }
}
