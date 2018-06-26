<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Civilite
 *
 * @ORM\Table(name="CIVILITE")
 * @ORM\Entity
 */
class Civilite
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_CIVILITE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="CIVILITE_ID_CIVILITE_seq", allocationSize=1, initialValue=1)
     */
    private $idCivilite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_CIVILITE", type="string", length=32, nullable=true)
     */
    private $libelleCivilite;

    /**
     * @return int
     */
    public function getIdCivilite(): int
    {
        return $this->idCivilite;
    }

    /**
     * @param int $idCivilite
     */
    public function setIdCivilite(int $idCivilite): void
    {
        $this->idCivilite = $idCivilite;
    }

    /**
     * @return null|string
     */
    public function getLibelleCivilite(): ?string
    {
        return $this->libelleCivilite;
    }

    /**
     * @param null|string $libelleCivilite
     */
    public function setLibelleCivilite(?string $libelleCivilite): void
    {
        $this->libelleCivilite = $libelleCivilite;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idCivilite;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idCivilite = $id;
    }
}
