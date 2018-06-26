<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="PAYS")
 * @ORM\Entity
 */
class Pays
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_PAYS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="PAYS_ID_PAYS_seq", allocationSize=1, initialValue=1)
     */
    private $idPays;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE_PAYS", type="string", length=32, nullable=true)
     */
    private $codePays;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_PAYS", type="string", length=45, nullable=true)
     */
    private $libellePays;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ACTIF", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @return int
     */
    public function getIdPays(): int
    {
        return $this->idPays;
    }

    /**
     * @param int $idPays
     */
    public function setIdPays(int $idPays): void
    {
        $this->idPays = $idPays;
    }

    /**
     * @return null|string
     */
    public function getCodePays(): ?string
    {
        return $this->codePays;
    }

    /**
     * @param null|string $codePays
     */
    public function setCodePays(?string $codePays): void
    {
        $this->codePays = $codePays;
    }

    /**
     * @return null|string
     */
    public function getLibellePays(): ?string
    {
        return $this->libellePays;
    }

    /**
     * @param null|string $libellePays
     */
    public function setLibellePays(?string $libellePays): void
    {
        $this->libellePays = $libellePays;
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
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idPays;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idPays = $id;
    }
}
