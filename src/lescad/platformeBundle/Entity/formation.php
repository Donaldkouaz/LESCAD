<?php

namespace lescad\platformeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="lescad\platformeBundle\Repository\formationRepository")
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks()
 */
class formation {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="prerequis", type="text", nullable=true)
     */
    private $prerequis = 'Aucune connaissance spécifique n\'est requise pour commencer cette formation.';

    /**
     * @var string
     *
     * @ORM\Column(name="cout", type="string", length=255)
     */
    private $cout;

    /**
     * @var string
     * @Gedmo\Slug(fields={"nom"})
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;
    private $duree;
    private $dureereel;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="avant", type="boolean")
     */
    private $avant = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecreation", type="datetimetz")
     */
    private $datecreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datemodification", type="datetimetz", nullable=true)
     */
    private $datemodification;

    /**
     * @ORM\ManyToMany(targetEntity="lescad\platformeBundle\Entity\matiere",inversedBy="formations", cascade={"persist"})
     * 
     */
    private $matieres;

    /**
     * @ORM\ManyToOne(targetEntity="lescad\platformeBundle\Entity\categorie", inversedBy="formations", cascade={"persist"})
     * 
     * 
     */
    private $categorie;

    /**
     * 
     * @Vich\UploadableField(mapping="formation_image", fileNameProperty="nomImage", size="tailleImage")
     * 
     * @var File
     */
    private $fichierImage;
    
     /**
     * 
     * @Vich\UploadableField(mapping="formation_banniere", fileNameProperty="nomBanniere", size="tailleBanniere")
     * 
     * @var File
     */
    private $fichierBanniere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $nomImage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     * @var integer
     */
    private $tailleImage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $nomBanniere;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     * @var integer
     */
    private $tailleBanniere;

    
    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return formation
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return formation
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Get duree
     *
     * @return int
     */
    public function getDuree() {
        $this->duree = 0;
        foreach ($this->matieres as $matiere) {
            $this->duree += $matiere->getDuree();
        }
        return $this->duree;
    }

    /**
     * Get dureereel
     *
     * @return int
     */
    public function getDureereel() {
        //Nombre d'heure par jour = 4; Par semaine = 8
        $n = 4;
        $t = $this->getDuree();
        if ($t <= $n) {
            $this->dureereel = 'Une journée';
        } elseif ($t <= (2 * $n)) {
            $this->dureereel = 'Une semaine';
        } elseif ($t <= (4 * $n)) {
            $this->dureereel = 'Deux semaines';
        } elseif ($t <= (6 * $n)) {
            $this->dureereel = 'Trois semaines';
        } elseif ($t < 417) {
            $q = ceil($t/(8*$n));
            $this->dureereel = $q.' mois';
        }
        return $this->dureereel;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return formation
     */
    public function setActive($active) {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive() {
        return $this->active;
    }

    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     *
     * @return formation
     */
    public function setDatecreation($datecreation) {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return \DateTime
     */
    public function getDatecreation() {
        return $this->datecreation;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->matieres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->datecreation = new \Datetime();
    }

    /**
     * Add matiere
     *
     * @param \lescad\platformeBundle\Entity\matiere $matiere
     *
     * @return formation
     */
    public function addMatiere(\lescad\platformeBundle\Entity\matiere $matiere) {
        $this->matieres[] = $matiere;

        return $this;
    }

    /**
     * Remove matiere
     *
     * @param \lescad\platformeBundle\Entity\matiere $matiere
     */
    public function removeMatiere(\lescad\platformeBundle\Entity\matiere $matiere) {
        $this->matieres->removeElement($matiere);
    }

    /**
     * Get matieres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMatieres() {
        return $this->matieres;
    }

    /**
     * Set categorie
     *
     * @param \lescad\platformeBundle\Entity\categorie $categorie
     *
     * @return formation
     */
    public function setCategorie(\lescad\platformeBundle\Entity\categorie $categorie = null) {
        $this->categorie = $categorie;
        $categorie->addFormation($this);

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \lescad\platformeBundle\Entity\categorie
     */
    public function getCategorie() {
        return $this->categorie;
    }

    /**
     * Set datemodification
     *
     * @param \DateTime $datemodification
     *
     * @return formation
     */
    public function setDatemodification($datemodification) {
        $this->datemodification = $datemodification;

        return $this;
    }

    /**
     * Get datemodification
     *
     * @return \DateTime
     */
    public function getDatemodification() {
        return $this->datemodification;
    }

    /**
     * @ORM\PreUpdate
     */
    public function modifierDatemodification() {
        $this->setDatemodification(new \DateTime());
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return formation
     */
    public function setSlug($slug) {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * Set prerequis
     *
     * @param string $prerequis
     *
     * @return formation
     */
    public function setPrerequis($prerequis) {
        $this->prerequis = $prerequis;

        return $this;
    }

    /**
     * Get prerequis
     *
     * @return string
     */
    public function getPrerequis() {
        return $this->prerequis;
    }

    /**
     * Set cout
     *
     * @param string $cout
     *
     * @return formation
     */
    public function setCout($cout) {
        $this->cout = $cout;

        return $this;
    }

    /**
     * Get cout
     *
     * @return string
     */
    public function getCout() {
        return $this->cout;
    }

    /**
     * Set nomImage
     *
     * @param string $nomImage
     *
     * @return formation
     */
    public function setNomImage($nomImage) {
        $this->nomImage = $nomImage;

        return $this;
    }

    /**
     * Get nomImage
     *
     * @return string
     */
    public function getNomImage() {
        return $this->nomImage;
    }

    /**
     * Set tailleImage
     *
     * @param integer $tailleImage
     *
     * @return formation
     */
    public function setTailleImage($tailleImage) {
        $this->tailleImage = $tailleImage;

        return $this;
    }

    /**
     * Get tailleImage
     *
     * @return integer
     */
    public function getTailleImage() {
        return $this->tailleImage;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setFichierImage(File $image = null) {
        $this->fichierImage = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->datemodification = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getFichierImage() {
        return $this->fichierImage;
    }
    
        public function setFichierBanniere(File $image = null) {
        $this->fichierBanniere = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->datemodification = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getFichierBanniere() {
        return $this->fichierBanniere;
    }


    /**
     * Set nomBanniere
     *
     * @param string $nomBanniere
     *
     * @return formation
     */
    public function setNomBanniere($nomBanniere)
    {
        $this->nomBanniere = $nomBanniere;

        return $this;
    }

    /**
     * Get nomBanniere
     *
     * @return string
     */
    public function getNomBanniere()
    {
        return $this->nomBanniere;
    }

    /**
     * Set tailleBanniere
     *
     * @param integer $tailleBanniere
     *
     * @return formation
     */
    public function setTailleBanniere($tailleBanniere)
    {
        $this->tailleBanniere = $tailleBanniere;

        return $this;
    }

    /**
     * Get tailleBanniere
     *
     * @return integer
     */
    public function getTailleBanniere()
    {
        return $this->tailleBanniere;
    }

    /**
     * Set avant
     *
     * @param boolean $avant
     *
     * @return formation
     */
    public function setAvant($avant)
    {
        $this->avant = $avant;

        return $this;
    }

    /**
     * Get avant
     *
     * @return boolean
     */
    public function getAvant()
    {
        return $this->avant;
    }
    
    public function __toString()
    {
        return $this->getNom() ?: '';
    }
}
