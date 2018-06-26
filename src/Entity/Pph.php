<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pph
 *
 * @ORM\Table(name="PPH", indexes={@ORM\Index(name="fk_pph_metier1_idx", columns={"ID_METIER"}), @ORM\Index(name="fk_pph_etat_pph1_idx", columns={"ID_ETAT_PPH"}), @ORM\Index(name="fk_pph_coordonnees1_idx", columns={"ID_COORDONNEES"}), @ORM\Index(name="fk_pph_source_donnees1_idx", columns={"ID_SOURCE_DONNEES"}), @ORM\Index(name="fk_pph_net1_idx", columns={"ID_NET"}), @ORM\Index(name="fk_pph_civilite1_idx", columns={"ID_CIVILITE"})})
 * @ORM\Entity
 */
class Pph
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_PPH", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="PPH_ID_PPH_seq", allocationSize=1, initialValue=1)
     */
    private $idPph;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_NAISSANCE", type="string", length=64, nullable=true)
     */
    private $nomNaissance;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_NAISSANCE", type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRENOM", type="string", length=64, nullable=true)
     */
    private $prenom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_DECES", type="date", nullable=true)
     */
    private $dateDeces;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_ENTREE_FONCTION_PUBLIQUE", type="date", nullable=true)
     */
    private $dateEntreeFonctionPublique;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_USAGE", type="string", length=64, nullable=true)
     */
    private $nomUsage;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="EST_DECEDE", type="boolean", nullable=true)
     */
    private $estDecede;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="EST_RETRAITE", type="boolean", nullable=true)
     */
    private $estRetraite;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="A_QUITTE_FONCTION_PUBLIQUE", type="boolean", nullable=true)
     */
    private $aQuitteFonctionPublique;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_ENTREE_DANS_GRADE", type="date", nullable=true)
     */
    private $dateEntreeDansGrade;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CATEGORIE", type="string", length=64, nullable=true)
     */
    private $categorie;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ENCADREMENT", type="boolean", nullable=true)
     */
    private $encadrement;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="IDENTITE_VERIFIEE", type="boolean", nullable=true)
     */
    private $identiteVerifiee;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_INACTIVATION", type="date", nullable=true)
     */
    private $dateInactivation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE_GRADE", type="string", length=32, nullable=true)
     */
    private $libelleGrade;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REFERENCE_PERSONNE_PHYSIQUE", type="string", length=64, nullable=true)
     */
    private $referencePersonnePhysique;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="EST_AGENT", type="boolean", nullable=true)
     */
    private $estAgent;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="EST_INTERVENANT", type="boolean", nullable=true)
     */
    private $estIntervenant;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="EST_GESTIONNAIRE_CT", type="boolean", nullable=true)
     */
    private $estGestionnaireCt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ID_COMPTE_PORTAIL_AGENT", type="string", length=45, nullable=true)
     */
    private $idComptePortailAgent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ID_FICHE_AGENT_IEL", type="string", length=45, nullable=true)
     */
    private $idFicheAgentIel;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="EST_DEDOUBLOUNE", type="boolean", nullable=true)
     */
    private $estDedoubloune;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_NAISSANCE_CONDENCE", type="string", length=64, nullable=true)
     */
    private $nomNaissanceCondence;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRENOM_NAISSANCE_CONDENCE", type="string", length=64, nullable=true)
     */
    private $prenomNaissanceCondence;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_USAGE_CONDENCE", type="string", length=64, nullable=true)
     */
    private $nomUsageCondence;

    /**
     * @var \Civilite
     *
     * @ORM\ManyToOne(targetEntity="Civilite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CIVILITE", referencedColumnName="ID_CIVILITE")
     * })
     */
    private $idCivilite;

    /**
     * @var \Coordonnees
     *
     * @ORM\ManyToOne(targetEntity="Coordonnees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_COORDONNEES", referencedColumnName="ID_COORDONNEES")
     * })
     */
    private $idCoordonnees;

    /**
     * @var \EtatPph
     *
     * @ORM\ManyToOne(targetEntity="EtatPph")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ETAT_PPH", referencedColumnName="ID_ETAT_PPH")
     * })
     */
    private $idEtatPph;

    /**
     * @var \Metier
     *
     * @ORM\ManyToOne(targetEntity="Metier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_METIER", referencedColumnName="ID_METIER")
     * })
     */
    private $idMetier;

    /**
     * @var \Net
     *
     * @ORM\ManyToOne(targetEntity="Net")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_NET", referencedColumnName="ID_NET")
     * })
     */
    private $idNet;

    /**
     * @var \SourceDonnees
     *
     * @ORM\ManyToOne(targetEntity="SourceDonnees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_SOURCE_DONNEES", referencedColumnName="ID_SOURCE_DONNEES")
     * })
     */
    private $idSourceDonnees;

    /**
     * @return int
     */
    public function getIdPph(): int
    {
        return $this->idPph;
    }

    /**
     * @param int $idPph
     */
    public function setIdPph(int $idPph): void
    {
        $this->idPph = $idPph;
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
     * @return null|string
     */
    public function getIdFicheAgentIel(): ?string
    {
        return $this->idFicheAgentIel;
    }

    /**
     * @param null|string $idFicheAgentIel
     */
    public function setIdFicheAgentIel(?string $idFicheAgentIel): void
    {
        $this->idFicheAgentIel = $idFicheAgentIel;
    }

    /**
     * @return bool|null
     */
    public function getEstDedoubloune(): ?bool
    {
        return $this->estDedoubloune;
    }

    /**
     * @param bool|null $estDedoubloune
     */
    public function setEstDedoubloune(?bool $estDedoubloune): void
    {
        $this->estDedoubloune = $estDedoubloune;
    }

    /**
     * @return null|string
     */
    public function getNomNaissanceCondence(): ?string
    {
        return $this->nomNaissanceCondence;
    }

    /**
     * @param null|string $nomNaissanceCondence
     */
    public function setNomNaissanceCondence(?string $nomNaissanceCondence): void
    {
        $this->nomNaissanceCondence = $nomNaissanceCondence;
    }

    /**
     * @return null|string
     */
    public function getPrenomNaissanceCondence(): ?string
    {
        return $this->prenomNaissanceCondence;
    }

    /**
     * @param null|string $prenomNaissanceCondence
     */
    public function setPrenomNaissanceCondence(?string $prenomNaissanceCondence): void
    {
        $this->prenomNaissanceCondence = $prenomNaissanceCondence;
    }

    /**
     * @return null|string
     */
    public function getNomUsageCondence(): ?string
    {
        return $this->nomUsageCondence;
    }

    /**
     * @param null|string $nomUsageCondence
     */
    public function setNomUsageCondence(?string $nomUsageCondence): void
    {
        $this->nomUsageCondence = $nomUsageCondence;
    }

    /**
     * @return \Civilite
     */
    public function getIdCivilite(): \Civilite
    {
        return $this->idCivilite;
    }

    /**
     * @param \Civilite $idCivilite
     */
    public function setIdCivilite(\Civilite $idCivilite): void
    {
        $this->idCivilite = $idCivilite;
    }

    /**
     * @return \Coordonnees
     */
    public function getIdCoordonnees(): \Coordonnees
    {
        return $this->idCoordonnees;
    }

    /**
     * @param \Coordonnees $idCoordonnees
     */
    public function setIdCoordonnees(\Coordonnees $idCoordonnees): void
    {
        $this->idCoordonnees = $idCoordonnees;
    }

    /**
     * @return \EtatPph
     */
    public function getIdEtatPph(): \EtatPph
    {
        return $this->idEtatPph;
    }

    /**
     * @param \EtatPph $idEtatPph
     */
    public function setIdEtatPph(\EtatPph $idEtatPph): void
    {
        $this->idEtatPph = $idEtatPph;
    }

    /**
     * @return \Metier
     */
    public function getIdMetier(): \Metier
    {
        return $this->idMetier;
    }

    /**
     * @param \Metier $idMetier
     */
    public function setIdMetier(\Metier $idMetier): void
    {
        $this->idMetier = $idMetier;
    }

    /**
     * @return \Net
     */
    public function getIdNet(): \Net
    {
        return $this->idNet;
    }

    /**
     * @param \Net $idNet
     */
    public function setIdNet(\Net $idNet): void
    {
        $this->idNet = $idNet;
    }

    /**
     * @return \SourceDonnees
     */
    public function getIdSourceDonnees(): \SourceDonnees
    {
        return $this->idSourceDonnees;
    }

    /**
     * @param \SourceDonnees $idSourceDonnees
     */
    public function setIdSourceDonnees(\SourceDonnees $idSourceDonnees): void
    {
        $this->idSourceDonnees = $idSourceDonnees;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->idPph;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->idPph = $id;
    }
}
