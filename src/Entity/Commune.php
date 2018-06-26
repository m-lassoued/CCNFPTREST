<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commune
 *
 * @ORM\Table(name="COMMUNE")
 * @ORM\Entity
 */
class Commune
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_COMMUNE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="COMMUNE_ID_COMMUNE_seq", allocationSize=1, initialValue=1)
     */
    private $idCommune;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE_COMMUNE", type="string", length=32, nullable=true)
     */
    private $codeCommune;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_INSEE_COMMUNE", type="string", length=45, nullable=true)
     */
    private $libelleInseeCommune;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE_POSTAL", type="string", length=32, nullable=true)
     */
    private $codePostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_CODE_POSTAL", type="string", length=32, nullable=true)
     */
    private $libelleCodePostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE_INSEE", type="string", length=45, nullable=true)
     */
    private $codeInsee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ANCIEN_CODE_INSEE", type="string", length=45, nullable=true)
     */
    private $ancienCodeInsee;

    /**
     * @return int
     */
    public function getIdCommune(): int
    {
        return $this->idCommune;
    }

    /**
     * @param int $idCommune
     */
    public function setIdCommune(int $idCommune): void
    {
        $this->idCommune = $idCommune;
    }

    /**
     * @return null|string
     */
    public function getCodeCommune(): ?string
    {
        return $this->codeCommune;
    }

    /**
     * @param null|string $codeCommune
     */
    public function setCodeCommune(?string $codeCommune): void
    {
        $this->codeCommune = $codeCommune;
    }

    /**
     * @return null|string
     */
    public function getLibelleInseeCommune(): ?string
    {
        return $this->libelleInseeCommune;
    }

    /**
     * @param null|string $libelleInseeCommune
     */
    public function setLibelleInseeCommune(?string $libelleInseeCommune): void
    {
        $this->libelleInseeCommune = $libelleInseeCommune;
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
    public function getLibelleCodePostal(): ?string
    {
        return $this->libelleCodePostal;
    }

    /**
     * @param null|string $libelleCodePostal
     */
    public function setLibelleCodePostal(?string $libelleCodePostal): void
    {
        $this->libelleCodePostal = $libelleCodePostal;
    }

    /**
     * @return null|string
     */
    public function getCodeInsee(): ?string
    {
        return $this->codeInsee;
    }

    /**
     * @param null|string $codeInsee
     */
    public function setCodeInsee(?string $codeInsee): void
    {
        $this->codeInsee = $codeInsee;
    }

    /**
     * @return null|string
     */
    public function getAncienCodeInsee(): ?string
    {
        return $this->ancienCodeInsee;
    }

    /**
     * @param null|string $ancienCodeInsee
     */
    public function setAncienCodeInsee(?string $ancienCodeInsee): void
    {
        $this->ancienCodeInsee = $ancienCodeInsee;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idCommune;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idCommune = $id;
    }
}
