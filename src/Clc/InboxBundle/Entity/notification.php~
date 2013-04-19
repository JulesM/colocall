<?php

namespace Clc\InboxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * notification
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Clc\InboxBundle\Entity\notificationRepository")
 */
class notification
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
     * @var integer
     *
     * @ORM\Column(name="category", type="integer")
     */
    protected $category;

    /**
     * @var \stdClass
     * 
     * @ORM\ManyToOne(targetEntity="Clc\UserBundle\Entity\User", cascade={"persist"})
     */
    protected $author;
    
    /**
     * @var \stdClass
     * 
     * @ORM\ManyToMany(targetEntity="Clc\UserBundle\Entity\User", inversedBy="notifications", cascade={"persist"})
     */
    protected $users;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    protected $date;

    /**
     * @var \stdClass
     *
     * @ORM\OneToOne(targetEntity="Clc\ExpensemanagerBundle\Entity\expense", inversedBy="notification", cascade={"persist"})
     */
    protected $expense;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Clc\ExpensemanagerBundle\Entity\payback", cascade={"persist"})
     */
    protected $payback;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Clc\TodosBundle\Entity\task", cascade={"persist"})
     */
    protected $task;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Clc\ShoppinglistBundle\Entity\item", cascade={"persist"})
     */
    protected $item;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer")
     */
    protected $active;

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
     * Set category
     *
     * @param integer $category
     * @return notification
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return integer 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set author
     *
     * @param \stdClass $author
     * @return notification
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \stdClass 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return notification
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
     * Set expense
     *
     * @param \stdClass $expense
     * @return notification
     */
    public function setExpense($expense)
    {
        $this->expense = $expense;
    
        return $this;
    }

    /**
     * Get expense
     *
     * @return \stdClass 
     */
    public function getExpense()
    {
        return $this->expense;
    }

    /**
     * Set payback
     *
     * @param \stdClass $payback
     * @return notification
     */
    public function setPayback($payback)
    {
        $this->payback = $payback;
    
        return $this;
    }

    /**
     * Get payback
     *
     * @return \stdClass 
     */
    public function getPayback()
    {
        return $this->payback;
    }

    /**
     * Set task
     *
     * @param \stdClass $task
     * @return notification
     */
    public function setTask($task)
    {
        $this->task = $task;
    
        return $this;
    }

    /**
     * Get task
     *
     * @return \stdClass 
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set item
     *
     * @param \stdClass $item
     * @return notification
     */
    public function setItem($item)
    {
        $this->item = $item;
    
        return $this;
    }

    /**
     * Get item
     *
     * @return \stdClass 
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set toUser
     *
     * @param \Clc\UserBundle\Entity\User $toUser
     * @return notification
     */
    public function setToUser(\Clc\UserBundle\Entity\User $toUser = null)
    {
        $this->toUser = $toUser;
    
        return $this;
    }

    /**
     * Get toUser
     *
     * @return \Clc\UserBundle\Entity\User 
     */
    public function getToUser()
    {
        return $this->toUser;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set active
     *
     * @param integer $active
     * @return notification
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return integer 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Add users
     *
     * @param \Clc\UserBundle\Entity\User $users
     * @return notification
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