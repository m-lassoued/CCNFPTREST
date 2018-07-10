<?php

namespace App\Service;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Exclude;

/**
 * Response represents an functional code response.
 *
 */
class ResponseApi
{
    const CODE_OK = 0; //Le traitement s’est terminé sans erreur
    const ERROR_CODE_PARAM_REQUI = 1; //Erreur : Au moins un des paramètres d’entrée obligatoires est manquant
    const ERROR_CODE_PARAM_FORMAT = 2; //Erreur : Au moins un des paramètres d’entrée n’est pas au format attendu
    const ERROR_CODE_PARAM_MANQUANT = 3; //Erreur : Au moins un des paramètres d’entrée doit être renseigné
    const ERROR_CODE_PPH_INTROUVABLE = 4; //Erreur : Personne physique introuvable
    const ERROR_CODE_AGENT_NON_APPERE = 5; //Erreur : Le Compte Portail Agent n’est pas appairé avec cette personne physique
    const ERROR_CODE_PPH_INACTIVE = 6; //Erreur : La personne physique trouvée est inactive
    const ERROR_CODE_7 = 7; //Erreur : Coordonnées introuvable
    const ERROR_CODE_8 = 8; //Erreur : Adresse introuvable
    const ERROR_CODE_9 = 9; //Erreur : Lien PPH/Etablissement introuvable
    const ERROR_CODE_10 = 10; //Erreur : Etablissement introuvable
    const ERROR_CODE_11 = 11; //Erreur : Personne morale introuvable
    const ERROR_CODE_12 = 12; //Erreur : Type de lien PPH/Etablissement introuvable
    const ERROR_CODE_13 = 13; //Erreur : Type de lien PPH/PPH introuvable
    const ERROR_CODE_METIER_INTROUVABLE = 14; //Erreur : Métier introuvable
    const ERROR_CODE_15 = 15; //Erreur : Famille de métier introuvable
    const ERROR_CODE_16 = 16; //Erreur : NET introuvable
    const ERROR_CODE_17 = 17; //Erreur : Pays introuvable
    const ERROR_CODE_18 = 18; //Erreur : Motif d’inactivation introuvable
    const ERROR_CODE_19 = 19; //Erreur : Source de données introuvable
    const ERROR_CODE_20 = 20; //Erreur : Coordonnées introuvables
    const ERROR_CODE_21 = 21; //Erreur : Impossible de créer la Personne Physique, elle existe déjà.
    const ERROR_CODE_22 = 22; //Erreur : Impossible de créer les Coordonnées Personnelles, la Personne Physique en a déjà
    const ERROR_CODE_23 = 23; //Erreur : Impossible de créer les Coordonnées Professionnelles, le Lien PPH/Etablissement en a déjà
    const ERROR_CODE_24 = 24; //Erreur : Impossible de créer l’Adresse, les Coordonnées Personnelles en ont déjà
    const ERROR_CODE_25 = 25; //Erreur : Impossible de créer l’Adresse, les Coordonnées Professionnelles en ont déjà
    const ERROR_CODE_26 = 26; //Erreur : Impossible de créer l’Adresse, l’Etablissement en a déjà
    const ERROR_CODE_27 = 27; //Erreur : Seul l’Id ou le Code doit être renseigné
    const ERROR_CODE_28 = 28; //Erreur : Civilité incorrecte
    const ERROR_CODE_29 = 29; //Erreur : Commune introuvable
    const ERROR_CODE_30 = 30; //Erreur : Seul l’Id Personne Physique ou l’Id Lien PPH/Etablissement doit être renseigné
    const ERROR_CODE_31 = 31; //Erreur : Seul l’Id Coordonnées ou l’Id Etablissement doit être renseigné
    const ERROR_CODE_32 = 32; //Erreur : Le Compte Portail Agent est déjà appairé à une autre personne physique
    const ERROR_CODE_33 = 33; //Erreur : La Personne Physique est déjà appairée à un Compte Portail Agent
    const ERROR_CODE_34 = 34; //Erreur : Il n’est pas possible d’appairer un Compte Portail Agent à une Personne Physique inactivée suite à la fusion avec une autre personne physique
    const ERROR_CODE_35 = 35; //Erreur : Il n’est pas possible de fusionner une Personne Physique appairée à un Compte Portail Agent dont l’identité n’est pas vérifiée
    const ERROR_CODE_36 = 36; //Erreur : La Personne Physique 2 est appairée à un Compte Portail Agent. Elle ne peut pas être désactivée. (Merci d’inverser les Personnes Physiques 1 et 2 en entrée)
    const ERROR_CODE_37 = 37; //Erreur : La Fiche Agent associée à la Personne Physique 2 est active alors que celle associée à la Personne Physique 1 est inactive. (Merci d’inverser les Personnes Physiques 1 et 2 en entrée)
    const ERROR_CODE_38 = 38; //Erreur : Le Type de Lien PPH/PPH « Fusion » n’existe pas
    const ERROR_CODE_39 = 39; //Erreur : Lien PPH/PPH introuvable
    const ERROR_CODE_40 = 40; //Erreur : Les 2 personnes physiques ont déjà été fusionnées
    const ERROR_CODE_41 = 41; //Erreur : Impossible de fusionner les 2 personnes physiques. Elles ont été déclarées Homonymes.
    const ERROR_CODE_42 = 42; //Erreur : Le Type de Lien PPH/PPH « Homonyme » n’existe pas
    const ERROR_CODE_43 = 43; //Erreur : Les 2 personnes physiques ont été fusionnées. Il faut supprimer le Lien PPH/PPH avec le motif « Homonyme »
    const ERROR_CODE_44 = 44; //Erreur : Les 2 personnes physiques ont déjà été déclarées Homonymes.
    const ERROR_CODE_45 = 45; //Erreur : La Personne Physique a déjà été fusionnée en tant que PPH2. Vous ne pouvez pas la fusionner avec une autre Personne Physique.
    const ERROR_CODE_46 = 46; //Erreur : La Personne Physique a été fusionnée en tant que PPH2. Vous ne pouvez pas déclarer de lien d’homonymie avec cette Personne Physique. Il faut sélectionner la Personne Physique active (PPH1) au travers de ce lien de Fusion.
    const ERROR_CODE_47 = 47; //Erreur : Utilisateur introuvable
    const ERROR_CODE_48 = 48; //Erreur : Il est impossible de valider l’identité d’une personne physique non appairée à un Compte Portail Agent.
    const ERROR_CODE_49 = 49; //Erreur : L’identité de la personne physique est déjà validée
    const ERROR_CODE_50 = 50; //Erreur : Cadre d’emploi introuvable
    const ERROR_CODE_51 = 51; //Erreur : Filière introuvable
    const ERROR_CODE_52 = 52; //Erreur : Catégorie introuvable
    const ERROR_CODE_53 = 53; //Erreur : Impossible de supprimer uniquement l’objet Personne Physique, il y a des Coordonnées personnelles associées.
    const ERROR_CODE_54 = 54; //Erreur : Impossible de supprimer uniquement l’objet Personne Physique, il y a des Liens PPH/Etablissement associés.
    const ERROR_CODE_55 = 55; //Erreur : Impossible de supprimer uniquement l’objet Personne Physique, il y a des Liens PPH/PPH associés.
    const ERROR_CODE_56 = 56; //Erreur : Impossible de supprimer uniquement l’objet Lien PPH/Etablissement, il y a des Coordonnées professionnelles associées.
    const ERROR_CODE_57 = 57; //Erreur : Impossible de supprimer uniquement l’objet Coordonnées, il y a une Adresse associée.
    const ERROR_CODE_58 = 58; //Erreur : l’Identifiant AD passé en paramètre est erroné.

    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $statusText;
    
    /**
     * @var mixed
     */
    protected $data;
    
    /**
     * Status codes translation table.
     *
     * The list of codes is complete according to the WS-RG-TRT-01
     * @Exclude()
     * @var array
     */
    public static $statusTexts = array(
        0 => "Le traitement s’est terminé sans erreur",
        1 => "Erreur : Au moins un des paramètres d’entrée obligatoires est manquant",
        2 => "Erreur : Au moins un des paramètres d’entrée n’est pas au format attendu",
        3 => "Erreur : Au moins un des paramètres d’entrée doit être renseigné",
        4 => "Erreur : Personne physique introuvable",
        5 => "Erreur : Le Compte Portail Agent n’est pas appairé avec cette personne physique",
        6 => "Erreur : La personne physique trouvée est inactive",
        7 => "Erreur : Coordonnées introuvable",
        8 => "Erreur : Adresse introuvable",
        9 => "Erreur : Lien PPH/Etablissement introuvable",
        10 => "Erreur : Etablissement introuvable",
        11 => "Erreur : Personne morale introuvable",
        12 => "Erreur : Type de lien PPH/Etablissement introuvable",
        13 => "Erreur : Type de lien PPH/PPH introuvable",
        14 => "Erreur : Métier introuvable",
        15 => "Erreur : Famille de métier introuvable",
        16 => "Erreur : NET introuvable",
        17 => "Erreur : Pays introuvable",
        18 => "Erreur : Motif d’inactivation introuvable",
        19 => "Erreur : Source de données introuvable",
        20 => "Erreur : Coordonnées introuvables",
        21 => "Erreur : Impossible de créer la Personne Physique, elle existe déjà.",
        22 => "Erreur : Impossible de créer les Coordonnées Personnelles, la Personne Physique en a déjà",
        23 => "Erreur : Impossible de créer les Coordonnées Professionnelles, le Lien PPH/Etablissement en a déjà",
        24 => "Erreur : Impossible de créer l’Adresse, les Coordonnées Personnelles en ont déjà",
        25 => "Erreur : Impossible de créer l’Adresse, les Coordonnées Professionnelles en ont déjà",
        26 => "Erreur : Impossible de créer l’Adresse, l’Etablissement en a déjà",
        27 => "Erreur : Seul l’Id ou le Code doit être renseigné",
        28 => "Erreur : Civilité incorrecte",
        29 => "Erreur : Commune introuvable",
        30 => "Erreur : Seul l’Id Personne Physique ou l’Id Lien PPH/Etablissement doit être renseigné",
        31 => "Erreur : Seul l’Id Coordonnées ou l’Id Etablissement doit être renseigné",
        32 => "Erreur : Le Compte Portail Agent est déjà appairé à une autre personne physique",
        33 => "Erreur : La Personne Physique est déjà appairée à un Compte Portail Agent",
        34 => "Erreur : Il n’est pas possible d’appairer un Compte Portail Agent à une Personne Physique inactivée suite à la fusion avec une autre personne physique",
        35 => "Erreur : Il n’est pas possible de fusionner une Personne Physique appairée à un Compte Portail Agent dont l’identité n’est pas vérifiée",
        36 => "Erreur : La Personne Physique 2 est appairée à un Compte Portail Agent. Elle ne peut pas être désactivée. (Merci d’inverser les Personnes Physiques 1 et 2 en entrée)",
        37 => "Erreur : La Fiche Agent associée à la Personne Physique 2 est active alors que celle associée à la Personne Physique 1 est inactive. (Merci d’inverser les Personnes Physiques 1 et 2 en entrée)",
        38 => "Erreur : Le Type de Lien PPH/PPH « Fusion » n’existe pas",
        39 => "Erreur : Lien PPH/PPH introuvable",
        40 => "Erreur : Les 2 personnes physiques ont déjà été fusionnées",
        41 => "Erreur : Impossible de fusionner les 2 personnes physiques. Elles ont été déclarées Homonymes.",
        42 => "Erreur : Le Type de Lien PPH/PPH « Homonyme » n’existe pas",
        43 => "Erreur : Les 2 personnes physiques ont été fusionnées. Il faut supprimer le Lien PPH/PPH avec le motif « Homonyme »",
        44 => "Erreur : Les 2 personnes physiques ont déjà été déclarées Homonymes.",
        45 => "Erreur : La Personne Physique a déjà été fusionnée en tant que PPH2. Vous ne pouvez pas la fusionner avec une autre Personne Physique.",
        46 => "Erreur : La Personne Physique a été fusionnée en tant que PPH2. Vous ne pouvez pas déclarer de lien d’homonymie avec cette Personne Physique. Il faut sélectionner la Personne Physique active (PPH1) au travers de ce lien de Fusion.",
        47 => "Erreur : Utilisateur introuvable",
        48 => "Erreur : Il est impossible de valider l’identité d’une personne physique non appairée à un Compte Portail Agent.",
        49 => "Erreur : L’identité de la personne physique est déjà validée",
        50 => "Erreur : Cadre d’emploi introuvable",
        51 => "Erreur : Filière introuvable",
        52 => "Erreur : Catégorie introuvable",
        53 => "Erreur : Impossible de supprimer uniquement l’objet Personne Physique, il y a des Coordonnées personnelles associées.",
        54 => "Erreur : Impossible de supprimer uniquement l’objet Personne Physique, il y a des Liens PPH/Etablissement associés.",
        55 => "Erreur : Impossible de supprimer uniquement l’objet Personne Physique, il y a des Liens PPH/PPH associés.",
        56 => "Erreur : Impossible de supprimer uniquement l’objet Lien PPH/Etablissement, il y a des Coordonnées professionnelles associées.",
        57 => "Erreur : Impossible de supprimer uniquement l’objet Coordonnées, il y a une Adresse associée.",
        58 => "Erreur : l’Identifiant AD passé en paramètre est erroné.",
    );
    /**
     * Factory method for chainability.
     * @param int   $status  The response status code
     * @param mixed $data The response data, see setData()
     *
     * @return static
     */
    public static function create($status = 0, $data = null)
    {
        return new static($status, $data);
    }

    public function __construct(int $status = 0,$data = null)
    {
        $this->setStatusCode($status);
        $this->setData($data);
    }



    /**
     * Returns the Response Error as an string.
     *
     * @return string
     */
    public function __toString()
    {
        return
            sprintf('Error /%s %s' ,$this->statusCode, $this->statusText)."\r\n";
    }

    /**
     * Sets the response status code.
     *
     * If the status text is null it will be automatically populated for the known
     * status codes and left empty otherwise.
     *
     * @return $this
     *
     * @throws \InvalidArgumentException When the HTTP status code is not valid
     *
     * @final
     */
    public function setStatusCode(int $code, $text = null)
    {
        $this->statusCode = $code;
        if ($this->isInvalid()) {
            throw new \InvalidArgumentException(sprintf('The status code "%s" is not valid.', $code));
        }

        if (null === $text) {
            $this->statusText = isset(self::$statusTexts[$code]) ? self::$statusTexts[$code] : 'unknown status';

            return $this;
        }

        if (false === $text) {
            $this->statusText = '';

            return $this;
        }

        $this->statusText = $text;

        return $this;
    }

    /**
     * Retrieves the status code for the current web response.
     *
     * @final
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }


    /**
     * Is response invalid?
     *
     * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
     *
     * @final
     */
    public function isInvalid(): bool
    {
        return $this->statusCode < 0 || $this->statusCode >= 59;
    }

    /**
     * Sets the response data.
     **
     * @param mixed $data 
     *
     * @return $this
     **/
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Gets the current response data.
     *
     * @return mixed Data
     */
    public function getData()
    {
        return $this->data;
    }

}
