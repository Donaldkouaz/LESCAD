<?php

namespace lescad\platformeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table(name="departement")
 * @ORM\Entity(repositoryClass="lescad\platformeBundle\Repository\DepartementRepository")
 */
class Departement
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
     * @ORM\OneToMany(targetEntity="lescad\platformeBundle\Entity\Ville", mappedBy="departement", cascade={"persist"})
     * 
     * 
     */
    private $villes;
    
    /**
     * @ORM\ManyToOne(targetEntity="lescad\platformeBundle\Entity\Pays", inversedBy="departements", cascade={"persist"})
     * 
     * 
     */
    private $pays;
    
     /**
     * @ORM\OneToMany(targetEntity="lescad\platformeBundle\Entity\DemandeCours", mappedBy="departement", cascade={"persist"})
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
     * @return Departement
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
     * Constructor
     */
    public function __construct()
    {
        $this->villes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ville
     *
     * @param \lescad\platformeBundle\Entity\Ville $ville
     *
     * @return Departement
     */
    public function addVille(\lescad\platformeBundle\Entity\Ville $ville)
    {
        $this->villes[] = $ville;

        return $this;
    }

    /**
     * Remove ville
     *
     * @param \lescad\platformeBundle\Entity\Ville $ville
     */
    public function removeVille(\lescad\platformeBundle\Entity\Ville $ville)
    {
        $this->villes->removeElement($ville);
        $ville->setDepartement(NULL);
    }

    /**
     * Get villes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVilles()
    {
        return $this->villes;
    }

    /**
     * Set pays
     *
     * @param \lescad\platformeBundle\Entity\Pays $pays
     *
     * @return Departement
     */
    public function setPays(\lescad\platformeBundle\Entity\Pays $pays = null)
    {
        $this->pays = $pays;
        $pays->addDepartement($this);

        return $this;
    }

    /**
     * Get pays
     *
     * @return \lescad\platformeBundle\Entity\Pays
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Add demandeCour
     *
     * @param \lescad\platformeBundle\Entity\DemandeCours $demandeCour
     *
     * @return Departement
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
}
