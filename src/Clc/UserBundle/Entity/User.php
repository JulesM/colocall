<?php
// src/Clc/UserBundle/Entity/User.php
 
namespace Clc\UserBundle\Entity;
 
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="clc_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
    * @ORM\OneToOne(targetEntity="Clc\UserBundle\Entity\profile_picture", cascade={"persist"})
    */
    private $profile_picture;

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
     * Set profile_picture
     *
     * @param \Clc\UserBundle\Entity\profile_picture $profilePicture
     * @return User
     */
    public function setProfilePicture(\Clc\UserBundle\Entity\profile_picture $profilePicture = null)
    {
        $this->profile_picture = $profilePicture;
    
        return $this;
    }

    /**
     * Get profile_picture
     *
     * @return \Clc\UserBundle\Entity\profile_picture 
     */
    public function getProfilePicture()
    {
        return $this->profile_picture;
    }
}