<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="UTILISATEUR")
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_UTILISATEUR", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="UTILISATEUR_ID_UTILISATEUR_seq", allocationSize=1, initialValue=1)
     */
    private $idUtilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM", type="string", length=45, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRENOM", type="string", length=45, nullable=true)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADRESSE_ELECTRONIQUE", type="string", length=64, nullable=true)
     */
    private $adresseElectronique;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IDENTIFIANT_AD", type="string", length=45, nullable=true)
     */
    private $identifiantAd;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ACTIF", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DROIT_UTILISATEUR", type="string", length=45, nullable=true)
     */
    private $droitUtilisateur;

    /**
     * @return int
     */
    public function getIdUtilisateur(): int
    {
        return $this->idUtilisateur;
    }

    /**
     * @param int $idUtilisateur
     */
    public function setIdUtilisateur(int $idUtilisateur): void
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    /**
     * @return null|string
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param null|string $nom
     */
    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return null|string
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @param null|string $prenom
     */
    public function setPrenom(?string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return null|string
     */
    public function getAdresseElectronique(): ?string
    {
        return $this->adresseElectronique;
    }

    /**
     * @param null|string $adresseElectronique
     */
    public function setAdresseElectronique(?string $adresseElectronique): void
    {
        $this->adresseElectronique = $adresseElectronique;
    }

    /**
     * @return null|string
     */
    public function getIdentifiantAd(): ?string
    {
        return $this->identifiantAd;
    }

    /**
     * @param null|string $identifiantAd
     */
    public function setIdentifiantAd(?string $identifiantAd): void
    {
        $this->identifiantAd = $identifiantAd;
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
     * @return null|string
     */
    public function getDroitUtilisateur(): ?string
    {
        return $this->droitUtilisateur;
    }

    /**
     * @param null|string $droitUtilisateur
     */
    public function setDroitUtilisateur(?string $droitUtilisateur): void
    {
        $this->droitUtilisateur = $droitUtilisateur;
    }


}
