<?php

namespace Clc\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * feedback
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Clc\UserBundle\Entity\feedbackRepository")
 */
class feedback
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
     * @ORM\Column(name="text", type="text")
     */
    protected $text;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    protected $category;
    
    /**
     * @ORM\ManyToOne(targetEntity="Clc\UserBundle\Entity\User", cascade={"persist"})
     */
    protected $author;

    /**
     *@var boolean
     *
     *@ORM\Column(name="solved", type="boolean")
     */
    protected $solved;  

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
     * @return feedback
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
     * Set text
     *
     * @param string $text
     * @return feedback
     */
    public function setText($text)
    {
        $this->text = $text;
    
        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return feedback
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set author
     *
     * @param \Clc\UserBundle\Entity\User $author
     * @return feedback
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
     * Set solved
     *
     * @param boolean $solved
     * @return feedback
     */
    public function setSolved($solved)
    {
        $this->solved = $solved;
    
        return $this;
    }

    /**
     * Get solved
     *
     * @return boolean 
     */
    public function getSolved()
    {
        return $this->solved;
    }
}