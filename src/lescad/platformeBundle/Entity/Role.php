<?php

namespace lescad\platformeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="lescad\platformeBundle\Repository\RoleRepository")
 */
class Role
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
     * @var string
     *
     * @ORM\Column(name="nomRole", type="string", length=255)
     */
    private $nomRole;
    
    /**
     * @ORM\ManyToMany(targetEntity="lescad\userBundle\Entity\user",mappedBy="type", cascade={"persist"})
     * 
     */
     private $user;


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
     * @return Role
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
     * Set nomRole
     *
     * @param string $nomRole
     *
     * @return Role
     */
    public function setNomRole($nomRole)
    {
        $this->nomRole = 'ROLE_'.$nomRole;

        return $this;
    }

    /**
     * Get nomRole
     *
     * @return string
     */
    public function getNomRole()
    {
        return $this->nomRole;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \lescad\userBundle\Entity\user $user
     *
     * @return Role
     */
    public function addUser(\lescad\userBundle\Entity\user $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \lescad\userBundle\Entity\user $user
     */
    public function removeUser(\lescad\userBundle\Entity\user $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }
}
