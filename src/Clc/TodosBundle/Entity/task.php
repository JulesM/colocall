<?php
//src/Clc/TodosBundle/Entity/task.php

namespace Clc\TodosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * task
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Clc\TodosBundle\Entity\taskRepository")
 */
class task
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
     * @ORM\Column(name="state", type="integer")
     */
    protected $state;
    
    /**
     * @var string
     *
     * @ORM\Column(name="task", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $task;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="dueDate", type="date")
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    protected $dueDate;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="date", type="date")
     */
    protected $date;
    
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set task
     *
     * @param string $task
     * @return task
     */
    public function setTask($task)
    {
        $this->task = $task;
    
        return $this;
    }

    /**
     * Get task
     *
     * @return string 
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set dueDate
     *
     * @param \DateTime $dueDate
     * @return task
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    
        return $this;
    }

    /**
     * Get dueDate
     *
     * @return \DateTime 
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return task
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
     * Set author
     *
     * @param \Clc\UserBundle\Entity\User $author
     * @return task
     */
    public function setAuthor(\Clc\UserBundle\Entity\User $author)
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
     * Set owner
     *
     * @param \Clc\UserBundle\Entity\User $owner
     * @return task
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
     * @return task
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
     * Set state
     *
     * @param integer $state
     * @return task
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
}