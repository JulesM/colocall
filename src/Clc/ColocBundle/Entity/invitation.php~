<?php

namespace Clc\ColocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * invitation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Clc\ColocBundle\Entity\invitationRepository")
 */
class invitation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable = true)
     */
    private $message;
    
    /**
     * @ORM\ManyToOne(targetEntity="Clc\UserBundle\Entity\User", cascade={"persist"})
     */
    protected $author;
    
    /**
     * @ORM\ManyToOne(targetEntity="Clc\ColocBundle\Entity\coloc", inversedBy="invitations", cascade={"persist"})
     */
    protected $coloc;
    
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    private $email;

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
     * Set date
     *
     * @param \DateTime $date
     * @return invitation
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return invitation
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

    /**
     * Set email
     *
     * @param string $email
     * @return invitation
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set author
     *
     * @param \Clc\UserBundle\Entity\User $author
     * @return invitation
     */
    public function setAuthor(\Clc\UserBundle\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \Clc\UserBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set coloc
     *
     * @param \Clc\ColocBundle\Entity\coloc $coloc
     * @return invitation
     */
    public function setColoc(\Clc\ColocBundle\Entity\coloc $coloc = null)
    {
        $this->coloc = $coloc;
    
        return $this;
    }

    /**
     * Get coloc
     *
     * @return \Clc\ColocBundle\Entity\coloc 
     */
    public function getColoc()
    {
        return $this->coloc;
    }
}