<?php

namespace Clc\ExpensemanagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * expense
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Clc\ExpensemanagerBundle\Entity\expenseRepository")
 */
class expense
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="decimal")
     */
    protected $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addedDate", type="date")
     */
    protected $addedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    protected $date;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer", nullable=true)
     */
    protected $state;
    
    /**
     * @ORM\ManyToOne(targetEntity="Clc\UserBundle\Entity\User", cascade={"persist"})
     */
    protected $author;
    
    /**
     * @ORM\ManyToOne(targetEntity="Clc\UserBundle\Entity\User", cascade={"persist"})
     */
    protected $owner;
    
    /**
     * @ORM\ManyToOne(targetEntity="Clc\ColocBundle\Entity\coloc", cascade={"persist"})
     */
    protected $coloc;
    
    /**
     * @ORM\ManyToMany(targetEntity="Clc\UserBundle\Entity\User", cascade={"persist"})
     */
    protected $users;

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
     * Set name
     *
     * @param string $name
     * @return expense
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return expense
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set addedDate
     *
     * @param \DateTime $addedDate
     * @return expense
     */
    public function setAddedDate($addedDate)
    {
        $this->addedDate = $addedDate;
    
        return $this;
    }

    /**
     * Get addedDate
     *
     * @return \DateTime 
     */
    public function getAddedDate()
    {
        return $this->addedDate;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return expense
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
     * Set state
     *
     * @param integer $state
     * @return expense
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set owner
     *
     * @param \Clc\UserBundle\Entity\User $owner
     * @return expense
     */
    public function setOwner(\Clc\UserBundle\Entity\User $owner = null)
    {
        $this->owner = $owner;
    
        return $this;
    }

    /**
     * Get owner
     *
     * @return \Clc\UserBundle\Entity\User 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set coloc
     *
     * @param \Clc\ColocBundle\Entity\coloc $coloc
     * @return expense
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

    /**
     * Set author
     *
     * @param \Clc\UserBundle\Entity\User $author
     * @return expense
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
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add users
     *
     * @param \Clc\UserBundle\Entity\User $users
     * @return expense
     */
    public function addUser(\Clc\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Clc\UserBundle\Entity\User $users
     */
    public function removeUser(\Clc\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}