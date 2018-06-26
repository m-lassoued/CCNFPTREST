<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="ID_ADRESSE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ADRESSE_ID_ADRESSE_seq", allocationSize=1, initialValue=1)
     */
    private $idAdresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADRESSE_1", type="string", length=128, nullable=true)
     */
    private $adresse1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADRESSE_2", type="string", length=128, nullable=true)
     */
    private $adresse2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADRESSE_3", type="string", length=128, nullable=true)
     */
    private $adresse3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="COMMUNE", type="string", length=64, nullable=true)
     */
    private $commune;

    /**
     * @var string|null
     *
     * @ORM\Column(name="AUTRE_COMMUNE", type="string", length=64, nullable=true)
     */
    private $autreCommune;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE_POSTAL", type="string", length=32, nullable=true)
     */
    private $codePostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PAYS", type="string", length=64, nullable=true)
     */
    private $pays;

    /**
     * @var \Commune
     *
     * @ORM\ManyToOne(targetEntity="Commune")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_COMMUNE", referencedColumnName="ID_COMMUNE")
     * })
     */
    private $idCommune;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PAYS", referencedColumnName="ID_PAYS")
     * })
     */
    private $idPays;

    /**
     * @var \TypeAdresse
     *
     * @ORM\ManyToOne(targetEntity="TypeAdresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TYPE_ADRESSE", referencedColumnName="ID_TYPE_ADRESSE")
     * })
     */
    private $idTypeAdresse;

    /**
     * @return int
     */
    public function getIdAdresse(): int
    {
        return $this->idAdresse;
    }

    /**
     * @param int $idAdresse
     */
    public function setIdAdresse(int $idAdresse): void
    {
        $this->idAdresse = $idAdresse;
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
    public function getCommune(): ?string
    {
        return $this->commune;
    }

    /**
     * @param null|string $commune
     */
    public function setCommune(?string $commune): void
    {
        $this->commune = $commune;
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
    public function getPays(): ?string
    {
        return $this->pays;
    }

    /**
     * @param null|string $pays
     */
    public function setPays(?string $pays): void
    {
        $this->pays = $pays;
    }

    /**
     * @return \Commune
     */
    public function getIdCommune(): \Commune
    {
        return $this->idCommune;
    }

    /**
     * @param \Commune $idCommune
     */
    public function setIdCommune(\Commune $idCommune): void
    {
        $this->idCommune = $idCommune;
    }

    /**
     * @return \Pays
     */
    public function getIdPays(): \Pays
    {
        return $this->idPays;
    }

    /**
     * @param \Pays $idPays
     */
    public function setIdPays(\Pays $idPays): void
    {
        $this->idPays = $idPays;
    }

    /**
     * @return \TypeAdresse
     */
    public function getIdTypeAdresse(): \TypeAdresse
    {
        return $this->idTypeAdresse;
    }

    /**
     * @param \TypeAdresse $idTypeAdresse
     */
    public function setIdTypeAdresse(\TypeAdresse $idTypeAdresse): void
    {
        $this->idTypeAdresse = $idTypeAdresse;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idAdresse;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idAdresse = $id;
    }

}
