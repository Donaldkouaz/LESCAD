<?php

namespace lescad\platformeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="pays")
 * @ORM\Entity(repositoryClass="lescad\platformeBundle\Repository\PaysRepository")
 */
class Pays
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
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="codePays", type="string", length=255, nullable=true, unique=true)
     */
    private $codePays;

    /**
     * @var int
     *
     * @ORM\Column(name="codeInd", type="integer", nullable=true, unique=true)
     */
    private $codeInd;

    /**
     * @ORM\OneToMany(targetEntity="lescad\platformeBundle\Entity\Departement", mappedBy="pays", cascade={"persist"})
     * 
     * 
     */
    private $departements;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->departements = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
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
     * @return Pays
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
     * Set codePays
     *
     * @param string $codePays
     *
     * @return Pays
     */
    public function setCodePays($codePays)
    {
        $this->codePays = $codePays;

        return $this;
    }

    /**
     * Get codePays
     *
     * @return string
     */
    public function getCodePays()
    {
        return $this->codePays;
    }

    /**
     * Set codeInd
     *
     * @param integer $codeInd
     *
     * @return Pays
     */
    public function setCodeInd($codeInd)
    {
        $this->codeInd = $codeInd;

        return $this;
    }

    /**
     * Get codeInd
     *
     * @return integer
     */
    public function getCodeInd()
    {
        return $this->codeInd;
    }

    /**
     * Add departement
     *
     * @param \lescad\platformeBundle\Entity\Departement $departement
     *
     * @return Pays
     */
    public function addDepartement(\lescad\platformeBundle\Entity\Departement $departement)
    {
        $this->departements[] = $departement;

        return $this;
    }

    /**
     * Remove departement
     *
     * @param \lescad\platformeBundle\Entity\Departement $departement
     */
    public function removeDepartement(\lescad\platformeBundle\Entity\Departement $departement)
    {
        $this->departements->removeElement($departement);
        $departement->setPays(NULL);
    }

    /**
     * Get departements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartements()
    {
        return $this->departements;
    }
}
