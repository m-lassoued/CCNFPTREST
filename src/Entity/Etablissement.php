<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Etablissement
 *
 * @ORM\Table(name="ETABLISSEMENT", indexes={@ORM\Index(name="fk_epm1_idx", columns={"ID_PMO"}), @ORM\Index(name="fk_e_adresse1_idx", columns={"ID_ADRESSE"})})
 * @ORM\Entity
 */
class Etablissement
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
     * @ORM\Column(name="SIRET", type="string", length=15, nullable=true)
     * @Groups({"etablissement"})
     */
    private $siret;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_CREATION", type="date", nullable=true)
     * @Groups({"etablissement"})
     */
    private $dateCreation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM", type="string", length=75, nullable=true)
     * @Groups({"etablissement"})
     */
    private $nom;

    /**
     * @var PersonneMorale
     *
     * @ORM\ManyToOne(targetEntity="PersonneMorale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PMO", referencedColumnName="ID")
     * })
     * @Groups({"etablissement"})
     */
    private $idPmo;

    /**
     * @var Adresse
     *
     * @ORM\ManyToOne(targetEntity="Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ADRESSE", referencedColumnName="ID")
     * })
     * @Groups({"etablissement"})
     */
    private $idAdresse;

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
     * @return null|PersonneMorale
     */
    public function getIdPmo(): ?PersonneMorale
    {
        return $this->idPmo;
    }

    /**
     * @param null|PersonneMorale $idPmo
     */
    public function setIdPmo($idPmo): void
    {
        $this->idPmo = $idPmo;
    }

    /**
     * @return null|Adresse
     */
    public function getIdAdresse(): ?Adresse
    {
        return $this->idAdresse;
    }

    /**
     * @param null|Adresse $idAdresse
     */
    public function setIdAdresse($idAdresse): void
    {
        $this->idAdresse = $idAdresse;
    }

}
