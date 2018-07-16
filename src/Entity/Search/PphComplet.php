<?php

namespace App\Entity\Search;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 */
class PphComplet
{
    /**
     * @var integer $idpph
     * @Serializer\Type("string")
     * @Serializer\Expose
     * @Assert\Type(type="numeric", message="La valeur {{ value }} n'est pas un nombre.")
     *
     *
     */
    private $idpph;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     * @Assert\Length(min=20, max=20)
     *
     *
     */
    private $referencePersonnePhysique;
    /**
     * @var integer
     * @Serializer\Type("string")
     * @Serializer\Expose
     * @Assert\Type(type="numeric", message="La valeur {{ value }} n'est pas un nombre.")
     */
    private $idComptePortailAgent;

    /**
     * @param integer $idpph
     * @param string $referencePersonnePhysique
     * @param string $idComptePortailAgent
     */
    public function __construct($idpph, $referencePersonnePhysique, $idComptePortailAgent)
    {
        $this->idpph = $idpph;
        $this->referencePersonnePhysique = $referencePersonnePhysique;
        $this->idComptePortailAgent = $idComptePortailAgent;
    }

    /**
     * @return integer|null
     */
    public function getIdpph(): ?string
    {
        return $this->idpph;
    }

    /**
     * @param integer|null $idpph
     */
    public function setIdpph($idpph): void
    {
        $this->idpph = $idpph;
    }

    /**
     * @return string|null
     */
    public function getReferencePersonnePhysique(): ?string
    {
        return $this->referencePersonnePhysique;
    }

    /**
     * @param string|null $referencePersonnePhysique
     */
    public function setReferencePersonnePhysique($referencePersonnePhysique): void
    {
        $this->referencePersonnePhysique = $referencePersonnePhysique;
    }

    /**
     * @return string|null
     */
    public function getIdComptePortailAgent(): ?string
    {
        return $this->idComptePortailAgent;
    }

    /**
     * @param string|null $idComptePortailAgent
     */
    public function setIdComptePortailAgent($idComptePortailAgent): void
    {
        $this->idComptePortailAgent = $idComptePortailAgent;
    }


}
