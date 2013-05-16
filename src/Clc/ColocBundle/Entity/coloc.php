<?php

namespace Clc\ColocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * coloc
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Clc\ColocBundle\Entity\colocRepository")
 */
class coloc
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    protected $date;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address1", type="string", length=255)
     */
    protected $address1;

    /**
     * @var string
     *
     * @ORM\Column(name="address2", type="string", length=255, nullable=true)
     */
    protected $address2;

    /**
     * @var integer
     *
     * @ORM\Column(name="zipcode", type="integer")
     */
    protected $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    protected $country;

    /**
     * @ORM\ManyToOne(targetEntity="Clc\ColocBundle\Entity\currency", cascade={"persist"})
     */
    protected $currency;

    /**
     * @var smallint
     *
     * @ORM\Column(name="number", type="smallint", nullable=true)
     */
    protected $number;

    /**
     * @var string
     *
     * @ORM\Column(name="other", type="text", nullable=true)
     */
    protected $other;
    
    /**
     * @ORM\OneToMany(targetEntity="Clc\UserBundle\Entity\User", mappedBy="coloc", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $users;
    
    /**
     * @ORM\OneToMany(targetEntity="Clc\ExpensemanagerBundle\Entity\expense", mappedBy="coloc", cascade={"persist"})
     */
    protected $expenses;
    
    /**
     * @ORM\OneToMany(targetEntity="Clc\ExpensemanagerBundle\Entity\payback", mappedBy="coloc", cascade={"persist"})
     */
    protected $paybacks;

    /**
     * @ORM\OneToMany(targetEntity="Clc\TodosBundle\Entity\task", mappedBy="coloc", cascade={"persist"})
     */
    protected $tasks;    
    
    /**
     * @ORM\OneToMany(targetEntity="Clc\ColocBundle\Entity\invitation", mappedBy="coloc", cascade={"persist"})
     */
    protected $invitations;

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
     * @return coloc
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
     * Set name
     *
     * @param string $name
     * @return coloc
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
     * Set address1
     *
     * @param string $address1
     * @return coloc
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    
        return $this;
    }

    /**
     * Get address1
     *
     * @return string 
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     * @return coloc
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    
        return $this;
    }

    /**
     * Get address2
     *
     * @return string 
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set zipcode
     *
     * @param integer $zipcode
     * @return coloc
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    
        return $this;
    }

    /**
     * Get zipcode
     *
     * @return integer 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return coloc
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return coloc
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return coloc
     */
    public function setNumber($number)
    {
        $this->number = $number;
    
        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set other
     *
     * @param string $other
     * @return coloc
     */
    public function setOther($other)
    {
        $this->other = $other;
    
        return $this;
    }

    /**
     * Get other
     *
     * @return string 
     */
    public function getOther()
    {
        return $this->other;
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
     * @return coloc
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

    /**
     * Add expenses
     *
     * @param \Clc\ExpensemanagerBundle\Entity\expense $expenses
     * @return coloc
     */
    public function addExpense(\Clc\ExpensemanagerBundle\Entity\expense $expenses)
    {
        $this->expenses[] = $expenses;
    
        return $this;
    }

    /**
     * Remove expenses
     *
     * @param \Clc\ExpensemanagerBundle\Entity\expense $expenses
     */
    public function removeExpense(\Clc\ExpensemanagerBundle\Entity\expense $expenses)
    {
        $this->expenses->removeElement($expenses);
    }

    /**
     * Get expenses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExpenses()
    {
        return $this->expenses;
    }

    /**
     * Add paybacks
     *
     * @param \Clc\ExpensemanagerBundle\Entity\payback $paybacks
     * @return coloc
     */
    public function addPayback(\Clc\ExpensemanagerBundle\Entity\payback $paybacks)
    {
        $this->paybacks[] = $paybacks;
    
        return $this;
    }

    /**
     * Remove paybacks
     *
     * @param \Clc\ExpensemanagerBundle\Entity\payback $paybacks
     */
    public function removePayback(\Clc\ExpensemanagerBundle\Entity\payback $paybacks)
    {
        $this->paybacks->removeElement($paybacks);
    }

    /**
     * Get paybacks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPaybacks()
    {
        return $this->paybacks;
    }

    /**
     * Add invitations
     *
     * @param \Clc\ColocBundle\Entity\invitation $invitations
     * @return coloc
     */
    public function addInvitation(\Clc\ColocBundle\Entity\invitation $invitations)
    {
        $this->invitations[] = $invitations;
    
        return $this;
    }

    /**
     * Remove invitations
     *
     * @param \Clc\ColocBundle\Entity\invitation $invitations
     */
    public function removeInvitation(\Clc\ColocBundle\Entity\invitation $invitations)
    {
        $this->invitations->removeElement($invitations);
    }

    /**
     * Get invitations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInvitations()
    {
        return $this->invitations;
    }


    /**
     * Set currency
     *
     * @param \Clc\ColocBundle\Entity\currency $currency
     * @return coloc
     */
    public function setCurrency(\Clc\ColocBundle\Entity\currency $currency = null)
    {
        $this->currency = $currency;
    
        return $this;
    }

    /**
     * Get currency
     *
     * @return \Clc\ColocBundle\Entity\currency 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Add tasks
     *
     * @param \Clc\TodosBundle\Entity\task $tasks
     * @return coloc
     */
    public function addTask(\Clc\TodosBundle\Entity\task $tasks)
    {
        $this->tasks[] = $tasks;
    
        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \Clc\TodosBundle\Entity\task $tasks
     */
    public function removeTask(\Clc\TodosBundle\Entity\task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasks()
    {
        return $this->tasks;
    }
}