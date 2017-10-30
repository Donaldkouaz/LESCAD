<?php

namespace lescad\platformeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeCours
 *
 * @ORM\Table(name="demande_cours")
 * @ORM\Entity(repositoryClass="lescad\platformeBundle\Repository\DemandeCoursRepository")
 */
class Suggestion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="lescad\platformeBundle\Entity\Departement", inversedBy="demandeCours", cascade={"persist"})
     * 
     * 
     */
    protected $departement;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="contactee", type="boolean")
     */
    protected $contactee = false;

    /**
     * @ORM\ManyToOne(targetEntity="lescad\platformeBundle\Entity\Ville", inversedBy="demandeCours", cascade={"persist"})
     * 
     * 
     */
    protected $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    protected $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedemande", type="datetimetz", nullable=true)
     */
    protected $datedemande;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    protected $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    protected $telephone;
    
     /**
     * Constructor
     */
    public function __construct()
    {
        $this->datedemande = new \DateTime;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set departement
     *
     * @param string $departement
     *
     * @return DemanderCours
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return string
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return DemanderCours
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    

    /**
     * Set datedemande
     *
     * @param \DateTime $datedemande
     *
     * @return DemanderCours
     */
    public function setDatedemande($datedemande)
    {
        $this->datedemande = $datedemande;

        return $this;
    }

    /**
     * Get datedemande
     *
     * @return \DateTime
     */
    public function getDatedemande()
    {
        return $this->datedemande;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return DemanderCours
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return DemanderCours
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return DemanderCours
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set contactee
     *
     * @param boolean $contactee
     *
     * @return DemandeCours
     */
    public function setContactee($contactee)
    {
        $this->contactee = $contactee;

        return $this;
    }

    /**
     * Get contactee
     *
     * @return boolean
     */
    public function getContactee()
    {
        return $this->contactee;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return DemandeCours
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
