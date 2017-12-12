<?php

/**
 * This file is part of the <LESCAD> project.
 *
 * (c) <Donald KOUAZOUN> <donald.kouazoun@outlook.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="fos_user_user")
 * @ORM\Entity
 */

class User extends BaseUser
{
   
    /**
     * @var int $id
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="lescad\platformeBundle\Entity\Ville", cascade={"persist"})
     * 
     * 
     */
    private $ville;

    /**
     * Get id
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }
    

    /**
     * Set ville
     *
     * @param \lescad\platformeBundle\Entity\Ville $ville
     *
     * @return User
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
}
