<?php

namespace App\Entity\Search;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 */
class PphSearch
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     * @Assert\NotBlank
     * @Assert\Length(min=2, max=50)
     */
    private $nom;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     * @Assert\NotBlank
     * @Assert\Length(min=2, max=50)
     */
    private $prenom;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     * @Assert\NotBlank
     * @Assert\Length(min=10, max=10)
     * @Assert\DateTime(format="d/m/Y")
     */
    private $dateNaissance;

    /**
     * @param string $title
     * @param string $nom
     * @param string $dateNaissance
     */
    public function __construct($nom, $prenom, $dateNaissance)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string|null $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string|null
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @param string|null $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string|null
     */
    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    /**
     * @param string|null $dateNaissance
     */
    public function setDateNaissance($dateNaissance): void
    {
        $this->dateNaissance = $dateNaissance;
    }


}
