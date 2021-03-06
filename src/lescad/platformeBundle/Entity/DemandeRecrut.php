<?php

namespace lescad\platformeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeRecrut
 *
 * @ORM\Table(name="demande_recrut")
 * @ORM\Entity(repositoryClass="lescad\platformeBundle\Repository\DemandeRecrutRepository")
 */
class DemandeRecrut
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
     * @ORM\ManyToOne(targetEntity="lescad\platformeBundle\Entity\Ville", inversedBy="demandeCours", cascade={"persist"})
     * 
     * 
     */
    protected $ville;

    /**
     * @var bool
     *
     * @ORM\Column(name="contactee", type="boolean", nullable=true)
     */
    private $contactee;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedemande", type="datetimetz", nullable=true)
     */
    private $datedemande;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;

    
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
     * Set contactee
     *
     * @param boolean $contactee
     *
     * @return DemandeRecrut
     */
    public function setContactee($contactee)
    {
        $this->contactee = $contactee;

        return $this;
    }

    /**
     * Get contactee
     *
     * @return bool
     */
    public function getContactee()
    {
        return $this->contactee;
    }


    /**
     * Set datedemande
     *
     * @param \DateTime $datedemande
     *
     * @return DemandeRecrut
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
     * @return DemandeRecrut
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
     * @return DemandeRecrut
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
     * @return DemandeRecrut
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
     * Set departement
     *
     * @param \lescad\platformeBundle\Entity\Departement $departement
     *
     * @return DemandeRecrut
     */
    public function setDepartement(\lescad\platformeBundle\Entity\Departement $departement = null)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return \lescad\platformeBundle\Entity\Departement
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set ville
     *
     * @param \lescad\platformeBundle\Entity\Ville $ville
     *
     * @return DemandeRecrut
     */
    public function setVille(\lescad\platformeBundle\Entity\Ville $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \lescad\platformeBundle\Entity\Ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return DemandeRecrut
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
    
    public function __toString()
    {
        return $this->getPrenom() ?: '';
    }
}
