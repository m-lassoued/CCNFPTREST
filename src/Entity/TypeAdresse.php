<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeAdresse
 *
 * @ORM\Table(name="TYPE_ADRESSE")
 * @ORM\Entity
 */
class TypeAdresse
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_TYPE_ADRESSE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="TYPE_ADRESSE_ID_TYPE_ADRESSE_s", allocationSize=1, initialValue=1)
     */
    private $idTypeAdresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_TYPE_ADRESSE", type="string", length=32, nullable=true)
     */
    private $libelleTypeAdresse;

    /**
     * @return int
     */
    public function getIdTypeAdresse(): int
    {
        return $this->idTypeAdresse;
    }

    /**
     * @param int $idTypeAdresse
     */
    public function setIdTypeAdresse(int $idTypeAdresse): void
    {
        $this->idTypeAdresse = $idTypeAdresse;
    }

    /**
     * @return null|string
     */
    public function getLibelleTypeAdresse(): ?string
    {
        return $this->libelleTypeAdresse;
    }

    /**
     * @param null|string $libelleTypeAdresse
     */
    public function setLibelleTypeAdresse(?string $libelleTypeAdresse): void
    {
        $this->libelleTypeAdresse = $libelleTypeAdresse;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idTypeAdresse;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idTypeAdresse = $id;
    }
}
