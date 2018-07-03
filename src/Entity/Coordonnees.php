<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Coordonnees
 *
 * @ORM\Table(name="COORDONNEES", indexes={@ORM\Index(name="fk_co_type_co1_idx", columns={"ID_TYPE_COORDONNEES"}), @ORM\Index(name="fk_coordonnees_adresse_idx", columns={"ID_ADRESSE"})})
 * @ORM\Entity
 */
class Coordonnees
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
     * @ORM\Column(name="TELEPHONE_FIXE", type="string", length=25, nullable=true)
     * @Groups({"coordonnees"})
     */
    private $telephoneFixe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TELEPHONE_PORTABLE", type="string", length=25, nullable=true)
     * @Groups({"coordonnees"})
     */
    private $telephonePortable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADRESSE_E_PRINCIPALE", type="string", length=320, nullable=true)
     * @Groups({"coordonnees"})
     */
    private $adresseEPrincipale;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADRESSE_E_SECONDAIRE", type="string", length=320, nullable=true)
     * @Groups({"coordonnees"})
     */
    private $adresseESecondaire;

    /**
     * @var  Adresse
     *
     * @ORM\ManyToOne(targetEntity="Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ADRESSE", referencedColumnName="ID")
     * })
     * @Groups({"coordonnees"})
     */
    private $idAdresse;

    /**
     * @var TypeCoordonnees
     *
     * @ORM\ManyToOne(targetEntity="TypeCoordonnees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TYPE_COORDONNEES", referencedColumnName="ID")
     * })
     * @Groups({"coordonnees"})
     */
    private $idTypeCoordonnees;

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
     * @return  null|Adresse
     */
    public function getIdAdresse():  ?Adresse
    {
        return $this->idAdresse;
    }

    /**
     * @param  null|Adresse $idAdresse
     */
    public function setIdAdresse($idAdresse): void
    {
        $this->idAdresse = $idAdresse;
    }

    /**
     * @return null|TypeCoordonnees
     */
    public function getIdTypeCoordonnees(): ?TypeCoordonnees
    {
        return $this->idTypeCoordonnees;
    }

    /**
     * @param null|TypeCoordonnees $idTypeCoordonnees
     */
    public function setIdTypeCoordonnees($idTypeCoordonnees): void
    {
        $this->idTypeCoordonnees = $idTypeCoordonnees;
    }

}
