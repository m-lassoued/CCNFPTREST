<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Adresse
 *
 * @ORM\Table(name="ADRESSE", indexes={@ORM\Index(name="fk_adresse_pays1_idx", columns={"ID_PAYS"}), @ORM\Index(name="fk_adresse_commune1_idx", columns={"ID_COMMUNE"}), @ORM\Index(name="fk_adresse_type_adresse1_idx", columns={"ID_TYPE_ADRESSE"})})
 * @ORM\Entity
 */
class Adresse
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
     * @ORM\Column(name="ADRESSE_1", type="string", length=50, nullable=true)
     * @Groups({"adresse"})
     */
    private $adresse1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADRESSE_2", type="string", length=50, nullable=true)
     *  @Groups({"adresse"})
     */
    private $adresse2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADRESSE_3", type="string", length=50, nullable=true)
     *  @Groups({"adresse"})
     */
    private $adresse3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE_POSTAL", type="string", length=10, nullable=true)
     *  @Groups({"adresse"})
     */
    private $codePostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="AUTRE_COMMUNE", type="string", length=64, nullable=true)
     *  @Groups({"adresse"})
     */
    private $autreCommune;

    /**
     * @var Commune
     *
     * @ORM\ManyToOne(targetEntity="Commune")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_COMMUNE", referencedColumnName="ID")
     * })
     */
    private $idCommune;

    /**
     * @var Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PAYS", referencedColumnName="ID")
     * })
     */
    private $idPays;

    /**
     * @var TypeAdresse
     *
     * @ORM\ManyToOne(targetEntity="TypeAdresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TYPE_ADRESSE", referencedColumnName="ID")
     * })
     * @Groups({"adresse"})
     */
    private $idTypeAdresse;

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
    public function getAdresse1(): ?string
    {
        return $this->adresse1;
    }

    /**
     * @param null|string $adresse1
     */
    public function setAdresse1(?string $adresse1): void
    {
        $this->adresse1 = $adresse1;
    }

    /**
     * @return null|string
     */
    public function getAdresse2(): ?string
    {
        return $this->adresse2;
    }

    /**
     * @param null|string $adresse2
     */
    public function setAdresse2(?string $adresse2): void
    {
        $this->adresse2 = $adresse2;
    }

    /**
     * @return null|string
     */
    public function getAdresse3(): ?string
    {
        return $this->adresse3;
    }

    /**
     * @param null|string $adresse3
     */
    public function setAdresse3(?string $adresse3): void
    {
        $this->adresse3 = $adresse3;
    }

    /**
     * @return null|string
     */
    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    /**
     * @param null|string $codePostal
     */
    public function setCodePostal(?string $codePostal): void
    {
        $this->codePostal = $codePostal;
    }

    /**
     * @return null|string
     */
    public function getAutreCommune(): ?string
    {
        return $this->autreCommune;
    }

    /**
     * @param null|string $autreCommune
     */
    public function setAutreCommune(?string $autreCommune): void
    {
        $this->autreCommune = $autreCommune;
    }

    /**
     * @return null|Commune
     */
    public function getIdCommune(): ?Commune
    {
        return $this->idCommune;
    }

    /**
     * @param null|Commune $idCommune
     */
    public function setIdCommune($idCommune): void
    {
        $this->idCommune = $idCommune;
    }

    /**
     * @return null|Pays
     */
    public function getIdPays(): ?Pays
    {
        return $this->idPays;
    }

    /**
     * @param null|Pays $idPays
     */
    public function setIdPays($idPays): void
    {
        $this->idPays = $idPays;
    }

    /**
     * @return null|TypeAdresse
     */
    public function getIdTypeAdresse(): ?TypeAdresse
    {
        return $this->idTypeAdresse;
    }

    /**
     * @param null|TypeAdresse $idTypeAdresse
     */
    public function setIdTypeAdresse($idTypeAdresse): void
    {
        $this->idTypeAdresse = $idTypeAdresse;
    }

}
