<?php

namespace lescad\platformeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville")
 * @ORM\Entity(repositoryClass="lescad\platformeBundle\Repository\VilleRepository")
 */
class Ville
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    
     /**
     * @ORM\ManyToOne(targetEntity="lescad\platformeBundle\Entity\Departement", inversedBy="villes", cascade={"persist"})
     * 
     * 
     */
    private $departement;
    
     /**
     * @ORM\OneToMany(targetEntity="lescad\platformeBundle\Entity\DemandeCours", mappedBy="ville", cascade={"persist"})
     * 
     * 
     */
    private $demandeCours;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Ville
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
     * Set departement
     *
     * @param \lescad\platformeBundle\Entity\Departement $departement
     *
     * @return Ville
     */
    public function setDepartement(\lescad\platformeBundle\Entity\Departement $departement = null)
    {
        $this->departement = $departement;
        $departement->addVille($this);

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
     * Constructor
     */
    public function __construct()
    {
        $this->demandeCours = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add demandeCour
     *
     * @param \lescad\platformeBundle\Entity\DemandeCours $demandeCour
     *
     * @return Ville
     */
    public function addDemandeCour(\lescad\platformeBundle\Entity\DemandeCours $demandeCour)
    {
        $this->demandeCours[] = $demandeCour;

        return $this;
    }

    /**
     * Remove demandeCour
     *
     * @param \lescad\platformeBundle\Entity\DemandeCours $demandeCour
     */
    public function removeDemandeCour(\lescad\platformeBundle\Entity\DemandeCours $demandeCour)
    {
        $this->demandeCours->removeElement($demandeCour);
    }

    /**
     * Get demandeCours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDemandeCours()
    {
        return $this->demandeCours;
    }
    
    public function __toString()
    {
        return $this->getNom() ?: '';
    }
}
