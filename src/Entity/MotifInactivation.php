<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MotifInactivation
 *
 * @ORM\Table(name="MOTIF_INACTIVATION")
 * @ORM\Entity
 */
class MotifInactivation
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
     * @var int|null
     *
     * @ORM\Column(name="CODE", type="integer", nullable=true)
     */
    private $code;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE", type="string", length=100, nullable=true)
     */
    private $libelle;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ACTIF", type="boolean", nullable=true)
     */
    private $actif;

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
     * @return int|null
     */
    public function getCode(): ?int
    {
        return $this->code;
    }

    /**
     * @param int|null $code
     */
    public function setCode(?int $code): void
    {
        $this->code = $code;
    }

    /**
     * @return null|string
     */
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    /**
     * @param null|string $libelle
     */
    public function setLibelle(?string $libelle): void
    {
        $this->libelle = $libelle;
    }

    /**
     * @return bool|null
     */
    public function getActif(): ?bool
    {
        return $this->actif;
    }

    /**
     * @param bool|null $actif
     */
    public function setActif(?bool $actif): void
    {
        $this->actif = $actif;
    }
}
