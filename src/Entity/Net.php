<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Net
 *
 * @ORM\Table(name="NET", indexes={@ORM\Index(name="fk_net_cadre_emploi1_idx", columns={"ID_CADRE_EMPLOI"})})
 * @ORM\Entity
 */
class Net
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_NET", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="NET_ID_NET_seq", allocationSize=1, initialValue=1)
     */
    private $idNet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_NET", type="string", length=64, nullable=true)
     */
    private $libelleNet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODE_NET", type="string", length=64, nullable=true)
     */
    private $codeNet;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ACTIF", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @var \CadreEmploi
     *
     * @ORM\ManyToOne(targetEntity="CadreEmploi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CADRE_EMPLOI", referencedColumnName="ID_CADRE_EMPLOI")
     * })
     */
    private $idCadreEmploi;

    /**
     * @return int
     */
    public function getIdNet(): int
    {
        return $this->idNet;
    }

    /**
     * @param int $idNet
     */
    public function setIdNet(int $idNet): void
    {
        $this->idNet = $idNet;
    }

    /**
     * @return null|string
     */
    public function getLibelleNet(): ?string
    {
        return $this->libelleNet;
    }

    /**
     * @param null|string $libelleNet
     */
    public function setLibelleNet(?string $libelleNet): void
    {
        $this->libelleNet = $libelleNet;
    }

    /**
     * @return null|string
     */
    public function getCodeNet(): ?string
    {
        return $this->codeNet;
    }

    /**
     * @param null|string $codeNet
     */
    public function setCodeNet(?string $codeNet): void
    {
        $this->codeNet = $codeNet;
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
     * @return \CadreEmploi
     */
    public function getIdCadreEmploi(): \CadreEmploi
    {
        return $this->idCadreEmploi;
    }

    /**
     * @param \CadreEmploi $idCadreEmploi
     */
    public function setIdCadreEmploi(\CadreEmploi $idCadreEmploi): void
    {
        $this->idCadreEmploi = $idCadreEmploi;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idNet;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idNet = $id;
    }
}
