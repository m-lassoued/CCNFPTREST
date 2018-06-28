<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RejetIel
 *
 * @ORM\Table(name="REJET_IEL")
 * @ORM\Entity
 */
class RejetIel
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
     * @ORM\Column(name="REFERENCE_OBJET_IEL", type="string", length=45, nullable=true)
     */
    private $referenceObjetIel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ATTRIBUT_ERREUR", type="string", length=45, nullable=true)
     */
    private $attributErreur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VALEUR_ATTRIBUT", type="string", length=128, nullable=true)
     */
    private $valeurAttribut;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TYPE_ERREUR", type="string", length=45, nullable=true)
     */
    private $typeErreur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="OBJET_IEL", type="string", length=45, nullable=true)
     */
    private $objetIel;

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
    public function getReferenceObjetIel(): ?string
    {
        return $this->referenceObjetIel;
    }

    /**
     * @param null|string $referenceObjetIel
     */
    public function setReferenceObjetIel(?string $referenceObjetIel): void
    {
        $this->referenceObjetIel = $referenceObjetIel;
    }

    /**
     * @return null|string
     */
    public function getAttributErreur(): ?string
    {
        return $this->attributErreur;
    }

    /**
     * @param null|string $attributErreur
     */
    public function setAttributErreur(?string $attributErreur): void
    {
        $this->attributErreur = $attributErreur;
    }

    /**
     * @return null|string
     */
    public function getValeurAttribut(): ?string
    {
        return $this->valeurAttribut;
    }

    /**
     * @param null|string $valeurAttribut
     */
    public function setValeurAttribut(?string $valeurAttribut): void
    {
        $this->valeurAttribut = $valeurAttribut;
    }

    /**
     * @return null|string
     */
    public function getTypeErreur(): ?string
    {
        return $this->typeErreur;
    }

    /**
     * @param null|string $typeErreur
     */
    public function setTypeErreur(?string $typeErreur): void
    {
        $this->typeErreur = $typeErreur;
    }

    /**
     * @return null|string
     */
    public function getObjetIel(): ?string
    {
        return $this->objetIel;
    }

    /**
     * @param null|string $objetIel
     */
    public function setObjetIel(?string $objetIel): void
    {
        $this->objetIel = $objetIel;
    }

}
