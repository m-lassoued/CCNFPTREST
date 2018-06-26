<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonneMorale
 *
 * @ORM\Table(name="PERSONNE_MORALE")
 * @ORM\Entity
 */
class PersonneMorale
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_PMO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="PERSONNE_MORALE_ID_PMO_seq", allocationSize=1, initialValue=1)
     */
    private $idPmo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SIREN", type="string", length=64, nullable=true)
     */
    private $siren;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM", type="string", length=64, nullable=true)
     */
    private $nom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PersonneMorale", inversedBy="idPmo")
     * @ORM\JoinTable(name="pm_has_pm",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_PMO", referencedColumnName="ID_PMO")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_PMO1", referencedColumnName="ID_PMO")
     *   }
     * )
     */
    private $idPmo1;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idPmo1 = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return int
     */
    public function getIdPmo(): int
    {
        return $this->idPmo;
    }

    /**
     * @param int $idPmo
     */
    public function setIdPmo(int $idPmo): void
    {
        $this->idPmo = $idPmo;
    }

    /**
     * @return null|string
     */
    public function getSiren(): ?string
    {
        return $this->siren;
    }

    /**
     * @param null|string $siren
     */
    public function setSiren(?string $siren): void
    {
        $this->siren = $siren;
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
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdPmo1(): \Doctrine\Common\Collections\Collection
    {
        return $this->idPmo1;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $idPmo1
     */
    public function setIdPmo1(\Doctrine\Common\Collections\Collection $idPmo1): void
    {
        $this->idPmo1 = $idPmo1;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idPmo;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idPmo = $id;
    }
}
