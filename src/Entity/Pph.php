<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Pph
 *
 * @ORM\Table(name="PPH", indexes={@ORM\Index(name="fk_pph_metier1_idx", columns={"ID_METIER"}), @ORM\Index(name="fk_pph_etat_pph1_idx", columns={"ID_ETAT_PPH"}), @ORM\Index(name="fk_pph_motif_inactivation1_idx", columns={"ID_MOTIF_INACTIVATION"}), @ORM\Index(name="fk_pph_source_donnees1_idx", columns={"ID_SOURCE_DONNEES"}), @ORM\Index(name="fk_pph_net1_idx", columns={"ID_NET"}), @ORM\Index(name="fk_pph_coordonnees1_idx", columns={"ID_COORDONNEES"}), @ORM\Index(name="fk_pph_civilite1_idx", columns={"ID_CIVILITE"})})
 * @ORM\Entity(repositoryClass="App\Repository\PphRepository")
 */
class Pph
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
     * @ORM\Column(name="NOM_NAISSANCE", type="string", length=50, nullable=true)
     * @Groups({"pph"})
     */
    private $nomNaissance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_USAGE", type="string", length=50, nullable=true)
     * @Groups({"pph"})
     */
    private $nomUsage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRENOM", type="string", length=50, nullable=true)
     * @Groups({"pph"})
     */
    private $prenom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_NAISSANCE", type="date", nullable=true)
     * @Groups({"pph"})
     */
    private $dateNaissance;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_DECES", type="date", nullable=true)
     * @Groups({"pph"})
     */
    private $dateDeces;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_ENTREE_FONCTION_PUBLIQUE", type="date", nullable=true)
     * @Groups({"pph"})
     */
    private $dateEntreeFonctionPublique;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="EST_DECEDE", type="boolean", nullable=true)
     * @Groups({"pph"})
     */
    private $estDecede;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="EST_RETRAITE", type="boolean", nullable=true)
     * @Groups({"pph"})
     */
    private $estRetraite;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="A_QUITTE_FONCTION_PUBLIQUE", type="boolean", nullable=true)
     * @Groups({"pph"})
     */
    private $aQuitteFonctionPublique;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_ENTREE_DANS_GRADE", type="date", nullable=true)
     * @Groups({"pph"})
     */
    private $dateEntreeDansGrade;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CATEGORIE", type="string", length=50, nullable=true)
     * @Groups({"pph"})
     */
    private $categorie;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ENCADREMENT", type="boolean", nullable=true)
     * @Groups({"pph"})
     */
    private $encadrement;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="IDENTITE_VERIFIEE", type="boolean", nullable=true)
     * @Groups({"pph"})
     */
    private $identiteVerifiee;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_INACTIVATION", type="date", nullable=true)
     * @Groups({"pph"})
     */
    private $dateInactivation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_GRADE", type="string", length=75, nullable=true)
     * @Groups({"pph"})
     */
    private $libelleGrade;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REFERENCE_PERSONNE_PHYSIQUE", type="string", length=64, nullable=true)
     * @Groups({"pph"})
     */
    private $referencePersonnePhysique;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="EST_AGENT", type="boolean", nullable=true)
     * @Groups({"pph"})
     */
    private $estAgent;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="EST_INTERVENANT", type="boolean", nullable=true)
     * @Groups({"pph"})
     */
    private $estIntervenant;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="EST_GESTIONNAIRE_CT", type="boolean", nullable=true)
     * @Groups({"pph"})
     */
    private $estGestionnaireCt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ID_COMPTE_PORTAIL_AGENT", type="string", length=45, nullable=true)
     * @Groups({"pph"})
     */
    private $idComptePortailAgent;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ID_FICHE_AGENT_IEL", type="integer", nullable=true)
     * @Groups({"pph"})
     */
    private $idFicheAgentIel;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="EST_DEDOUBLONE", type="boolean", nullable=true)
     * @Groups({"pph"})
     */
    private $estDedoublone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_NAISSANCE_CONDENSE", type="string", length=50, nullable=true)
     * @Groups({"pph"})
     */
    private $nomNaissanceCondense;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRENOM_NAISSANCE_CONDENSE", type="string", length=50, nullable=true)
     * @Groups({"pph"})
     */
    private $prenomNaissanceCondense;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_USAGE_CONDENSE", type="string", length=50, nullable=true)
     * @Groups({"pph"})
     */
    private $nomUsageCondense;

    /**
     * @var \Civilite
     *
     * @ORM\ManyToOne(targetEntity="Civilite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CIVILITE", referencedColumnName="ID")
     * })
     */
    private $idCivilite;

    /**
     * @var Coordonnees
     *
     * @ORM\ManyToOne(targetEntity="Coordonnees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_COORDONNEES", referencedColumnName="ID")
     * })
     */
    private $idCoordonnees;

    /**
     * @var EtatPph
     *
     * @ORM\ManyToOne(targetEntity="EtatPph")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ETAT_PPH", referencedColumnName="ID")
     * })
     */
    private $idEtatPph;

    /**
     * @var Metier
     *
     * @ORM\ManyToOne(targetEntity="Metier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_METIER", referencedColumnName="ID")
     * })
     */
    private $idMetier;

    /**
     * @var MotifInactivation
     *
     * @ORM\ManyToOne(targetEntity="MotifInactivation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_MOTIF_INACTIVATION", referencedColumnName="ID")
     * })
     */
    private $idMotifInactivation;

    /**
     * @var Net
     *
     * @ORM\ManyToOne(targetEntity="Net")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_NET", referencedColumnName="ID")
     * })
     */
    private $idNet;

    /**
     * @var SourceDonnees
     *
     * @ORM\ManyToOne(targetEntity="SourceDonnees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_SOURCE_DONNEES", referencedColumnName="ID")
     * })
     */
    private $idSourceDonnees;

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
    public function getNomNaissance(): ?string
    {
        return $this->nomNaissance;
    }

    /**
     * @param null|string $nomNaissance
     */
    public function setNomNaissance(?string $nomNaissance): void
    {
        $this->nomNaissance = $nomNaissance;
    }

    /**
     * @return null|string
     */
    public function getNomUsage(): ?string
    {
        return $this->nomUsage;
    }

    /**
     * @param null|string $nomUsage
     */
    public function setNomUsage(?string $nomUsage): void
    {
        $this->nomUsage = $nomUsage;
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
     * @return \DateTime|null
     */
    public function getDateNaissance(): ?\DateTime
    {
        return $this->dateNaissance;
    }

    /**
     * @param \DateTime|null $dateNaissance
     */
    public function setDateNaissance(?\DateTime $dateNaissance): void
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateDeces(): ?\DateTime
    {
        return $this->dateDeces;
    }

    /**
     * @param \DateTime|null $dateDeces
     */
    public function setDateDeces(?\DateTime $dateDeces): void
    {
        $this->dateDeces = $dateDeces;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateEntreeFonctionPublique(): ?\DateTime
    {
        return $this->dateEntreeFonctionPublique;
    }

    /**
     * @param \DateTime|null $dateEntreeFonctionPublique
     */
    public function setDateEntreeFonctionPublique(?\DateTime $dateEntreeFonctionPublique): void
    {
        $this->dateEntreeFonctionPublique = $dateEntreeFonctionPublique;
    }

    /**
     * @return bool|null
     */
    public function getEstDecede(): ?bool
    {
        return $this->estDecede;
    }

    /**
     * @param bool|null $estDecede
     */
    public function setEstDecede(?bool $estDecede): void
    {
        $this->estDecede = $estDecede;
    }

    /**
     * @return bool|null
     */
    public function getEstRetraite(): ?bool
    {
        return $this->estRetraite;
    }

    /**
     * @param bool|null $estRetraite
     */
    public function setEstRetraite(?bool $estRetraite): void
    {
        $this->estRetraite = $estRetraite;
    }

    /**
     * @return bool|null
     */
    public function getAQuitteFonctionPublique(): ?bool
    {
        return $this->aQuitteFonctionPublique;
    }

    /**
     * @param bool|null $aQuitteFonctionPublique
     */
    public function setAQuitteFonctionPublique(?bool $aQuitteFonctionPublique): void
    {
        $this->aQuitteFonctionPublique = $aQuitteFonctionPublique;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateEntreeDansGrade(): ?\DateTime
    {
        return $this->dateEntreeDansGrade;
    }

    /**
     * @param \DateTime|null $dateEntreeDansGrade
     */
    public function setDateEntreeDansGrade(?\DateTime $dateEntreeDansGrade): void
    {
        $this->dateEntreeDansGrade = $dateEntreeDansGrade;
    }

    /**
     * @return null|string
     */
    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    /**
     * @param null|string $categorie
     */
    public function setCategorie(?string $categorie): void
    {
        $this->categorie = $categorie;
    }

    /**
     * @return bool|null
     */
    public function getEncadrement(): ?bool
    {
        return $this->encadrement;
    }

    /**
     * @param bool|null $encadrement
     */
    public function setEncadrement(?bool $encadrement): void
    {
        $this->encadrement = $encadrement;
    }

    /**
     * @return bool|null
     */
    public function getIdentiteVerifiee(): ?bool
    {
        return $this->identiteVerifiee;
    }

    /**
     * @param bool|null $identiteVerifiee
     */
    public function setIdentiteVerifiee(?bool $identiteVerifiee): void
    {
        $this->identiteVerifiee = $identiteVerifiee;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateInactivation(): ?\DateTime
    {
        return $this->dateInactivation;
    }

    /**
     * @param \DateTime|null $dateInactivation
     */
    public function setDateInactivation(?\DateTime $dateInactivation): void
    {
        $this->dateInactivation = $dateInactivation;
    }

    /**
     * @return null|string
     */
    public function getLibelleGrade(): ?string
    {
        return $this->libelleGrade;
    }

    /**
     * @param null|string $libelleGrade
     */
    public function setLibelleGrade(?string $libelleGrade): void
    {
        $this->libelleGrade = $libelleGrade;
    }

    /**
     * @return null|string
     */
    public function getReferencePersonnePhysique(): ?string
    {
        return $this->referencePersonnePhysique;
    }

    /**
     * @param null|string $referencePersonnePhysique
     */
    public function setReferencePersonnePhysique(?string $referencePersonnePhysique): void
    {
        $this->referencePersonnePhysique = $referencePersonnePhysique;
    }

    /**
     * @return bool|null
     */
    public function getEstAgent(): ?bool
    {
        return $this->estAgent;
    }

    /**
     * @param bool|null $estAgent
     */
    public function setEstAgent(?bool $estAgent): void
    {
        $this->estAgent = $estAgent;
    }

    /**
     * @return bool|null
     */
    public function getEstIntervenant(): ?bool
    {
        return $this->estIntervenant;
    }

    /**
     * @param bool|null $estIntervenant
     */
    public function setEstIntervenant(?bool $estIntervenant): void
    {
        $this->estIntervenant = $estIntervenant;
    }

    /**
     * @return bool|null
     */
    public function getEstGestionnaireCt(): ?bool
    {
        return $this->estGestionnaireCt;
    }

    /**
     * @param bool|null $estGestionnaireCt
     */
    public function setEstGestionnaireCt(?bool $estGestionnaireCt): void
    {
        $this->estGestionnaireCt = $estGestionnaireCt;
    }

    /**
     * @return null|string
     */
    public function getIdComptePortailAgent(): ?string
    {
        return $this->idComptePortailAgent;
    }

    /**
     * @param null|string $idComptePortailAgent
     */
    public function setIdComptePortailAgent(?string $idComptePortailAgent): void
    {
        $this->idComptePortailAgent = $idComptePortailAgent;
    }

    /**
     * @return int|null
     */
    public function getIdFicheAgentIel(): ?int
    {
        return $this->idFicheAgentIel;
    }

    /**
     * @param int|null $idFicheAgentIel
     */
    public function setIdFicheAgentIel(?int $idFicheAgentIel): void
    {
        $this->idFicheAgentIel = $idFicheAgentIel;
    }

    /**
     * @return bool|null
     */
    public function getEstDedoublone(): ?bool
    {
        return $this->estDedoublone;
    }

    /**
     * @param bool|null $estDedoublone
     */
    public function setEstDedoublone(?bool $estDedoublone): void
    {
        $this->estDedoublone = $estDedoublone;
    }

    /**
     * @return null|string
     */
    public function getNomNaissanceCondense(): ?string
    {
        return $this->nomNaissanceCondense;
    }

    /**
     * @param null|string $nomNaissanceCondense
     */
    public function setNomNaissanceCondense(?string $nomNaissanceCondense): void
    {
        $this->nomNaissanceCondense = $nomNaissanceCondense;
    }

    /**
     * @return null|string
     */
    public function getPrenomNaissanceCondense(): ?string
    {
        return $this->prenomNaissanceCondense;
    }

    /**
     * @param null|string $prenomNaissanceCondense
     */
    public function setPrenomNaissanceCondense(?string $prenomNaissanceCondense): void
    {
        $this->prenomNaissanceCondense = $prenomNaissanceCondense;
    }

    /**
     * @return null|string
     */
    public function getNomUsageCondense(): ?string
    {
        return $this->nomUsageCondense;
    }

    /**
     * @param null|string $nomUsageCondense
     */
    public function setNomUsageCondense(?string $nomUsageCondense): void
    {
        $this->nomUsageCondense = $nomUsageCondense;
    }

    /**
     * @return null|Civilite
     */
    public function getIdCivilite(): ?Civilite
    {
        return $this->idCivilite;
    }

    /**
     * @param Civilite $idCivilite
     */
    public function setIdCivilite(Civilite $idCivilite): void
    {
        $this->idCivilite = $idCivilite;
    }

    /**
     * @return null|Coordonnees
     */
    public function getIdCoordonnees(): ?Coordonnees
    {
        return $this->idCoordonnees;
    }

    /**
     * @param Coordonnees $idCoordonnees
     */
    public function setIdCoordonnees(Coordonnees $idCoordonnees): void
    {
        $this->idCoordonnees = $idCoordonnees;
    }

    /**
     * @return null|EtatPph
     */
    public function getIdEtatPph(): ?EtatPph
    {
        return $this->idEtatPph;
    }

    /**
     * @param EtatPph $idEtatPph
     */
    public function setIdEtatPph(EtatPph $idEtatPph): void
    {
        $this->idEtatPph = $idEtatPph;
    }

    /**
     * @return null|Metier
     */
    public function getIdMetier(): ?Metier
    {
        return $this->idMetier;
    }

    /**
     * @param Metier $idMetier
     */
    public function setIdMetier(Metier $idMetier): void
    {
        $this->idMetier = $idMetier;
    }

    /**
     * @return null|MotifInactivation
     */
    public function getIdMotifInactivation(): ?MotifInactivation
    {
        return $this->idMotifInactivation;
    }

    /**
     * @param MotifInactivation $idMotifInactivation
     */
    public function setIdMotifInactivation(MotifInactivation $idMotifInactivation): void
    {
        $this->idMotifInactivation = $idMotifInactivation;
    }

    /**
     * @return null|Net
     */
    public function getIdNet(): ?Net
    {
        return $this->idNet;
    }

    /**
     * @param Net $idNet
     */
    public function setIdNet(Net $idNet): void
    {
        $this->idNet = $idNet;
    }

    /**
     * @return null|SourceDonnees
     */
    public function getIdSourceDonnees(): ?SourceDonnees
    {
        return $this->idSourceDonnees;
    }

    /**
     * @param SourceDonnees $idSourceDonnees
     */
    public function setIdSourceDonnees(SourceDonnees $idSourceDonnees): void
    {
        $this->idSourceDonnees = $idSourceDonnees;
    }

}
