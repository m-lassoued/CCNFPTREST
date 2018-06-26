<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Coordonnees
 *
 * @ORM\Table(name="COORDONNEES", indexes={@ORM\Index(name="fk_co_type_co1_idx", columns={"ID_TYPE_COORDONNEES"}), @ORM\Index(name="fk_coordonnees_adresse_idx", columns={"ADRESSE_ID_ADRESSE"})})
 * @ORM\Entity
 */
class Coordonnees
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_COORDONNEES", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="COORDONNEES_ID_COORDONNEES_seq", allocationSize=1, initialValue=1)
     */
    private $idCoordonnees;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TELEPHONE_FIXE", type="string", length=32, nullable=true)
     */
    private $telephoneFixe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TELEPHONE_PORTABLE", type="string", length=32, nullable=true)
     */
    private $telephonePortable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADRESSE_E_PRINCIPALE", type="string", length=128, nullable=true)
     */
    private $adresseEPrincipale;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADRESSE_E_SECONDAIRE", type="string", length=128, nullable=true)
     */
    private $adresseESecondaire;

    /**
     * @var \Adresse
     *
     * @ORM\ManyToOne(targetEntity="Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ADRESSE_ID_ADRESSE", referencedColumnName="ID_ADRESSE")
     * })
     */
    private $adresseAdresse;

    /**
     * @var \TypeCoordonnees
     *
     * @ORM\ManyToOne(targetEntity="TypeCoordonnees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TYPE_COORDONNEES", referencedColumnName="ID_TYPE_COORDONNEES")
     * })
     */
    private $idTypeCoordonnees;

    /**
     * @return int
     */
    public function getIdCoordonnees(): int
    {
        return $this->idCoordonnees;
    }

    /**
     * @param int $idCoordonnees
     */
    public function setIdCoordonnees(int $idCoordonnees): void
    {
        $this->idCoordonnees = $idCoordonnees;
    }

    /**
     * @return null|string
     */
    public function getTelephoneFixe(): ?string
    {
        return $this->telephoneFixe;
    }

    /**
     * @param null|string $telephoneFixe
     */
    public function setTelephoneFixe(?string $telephoneFixe): void
    {
        $this->telephoneFixe = $telephoneFixe;
    }

    /**
     * @return null|string
     */
    public function getTelephonePortable(): ?string
    {
        return $this->telephonePortable;
    }

    /**
     * @param null|string $telephonePortable
     */
    public function setTelephonePortable(?string $telephonePortable): void
    {
        $this->telephonePortable = $telephonePortable;
    }

    /**
     * @return null|string
     */
    public function getAdresseEPrincipale(): ?string
    {
        return $this->adresseEPrincipale;
    }

    /**
     * @param null|string $adresseEPrincipale
     */
    public function setAdresseEPrincipale(?string $adresseEPrincipale): void
    {
        $this->adresseEPrincipale = $adresseEPrincipale;
    }

    /**
     * @return null|string
     */
    public function getAdresseESecondaire(): ?string
    {
        return $this->adresseESecondaire;
    }

    /**
     * @param null|string $adresseESecondaire
     */
    public function setAdresseESecondaire(?string $adresseESecondaire): void
    {
        $this->adresseESecondaire = $adresseESecondaire;
    }

    /**
     * @return \Adresse
     */
    public function getAdresseAdresse(): \Adresse
    {
        return $this->adresseAdresse;
    }

    /**
     * @param \Adresse $adresseAdresse
     */
    public function setAdresseAdresse(\Adresse $adresseAdresse): void
    {
        $this->adresseAdresse = $adresseAdresse;
    }

    /**
     * @return \TypeCoordonnees
     */
    public function getIdTypeCoordonnees(): \TypeCoordonnees
    {
        return $this->idTypeCoordonnees;
    }

    /**
     * @param \TypeCoordonnees $idTypeCoordonnees
     */
    public function setIdTypeCoordonnees(\TypeCoordonnees $idTypeCoordonnees): void
    {
        $this->idTypeCoordonnees = $idTypeCoordonnees;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idCoordonnees;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idCoordonnees = $id;
    }
}
