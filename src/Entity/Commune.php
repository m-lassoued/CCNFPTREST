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
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE", type="string", length=32, nullable=true)
     */
    private $code;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_INSEE", type="string", length=45, nullable=true)
     */
    private $libelleInsee;

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
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return null|string
     */
    public function getLibelleInsee(): ?string
    {
        return $this->libelleInsee;
    }

    /**
     * @param null|string $libelleInsee
     */
    public function setLibelleInsee(?string $libelleInsee): void
    {
        $this->libelleInsee = $libelleInsee;
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

    public function __toString(): string
    {
        return $this->code;
    }

}
