<?php

namespace Clc\ExpensemanagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * payback
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Clc\ExpensemanagerBundle\Entity\paybackRepository")
 */
class payback
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
     * @ORM\Column(name="date", type="date")
     */
    protected $date;

    /**
     * @ORM\ManyToOne(targetEntity="Clc\ColocBundle\Entity\coloc", inversedBy="paybacks", cascade={"persist"})
     */
    protected $coloc;

    /**
     * @var array
     *
     * @ORM\Column(name="paymentsArray", type="array")
     */
    protected $paymentsArray;

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
     * @return payback
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
     * Set coloc
     *
     * @param \stdClass $coloc
     * @return payback
     */
    public function setColoc($coloc)
    {
        $this->coloc = $coloc;
    
        return $this;
    }

    /**
     * Get coloc
     *
     * @return \stdClass 
     */
    public function getColoc()
    {
        return $this->coloc;
    }
    
    /**
     * Set paymentsArray
     *
     * @param array $paymentsArray
     * @return payback
     */
    public function setPaymentsArray($paymentsArray)
    {
        $this->paymentsArray = $paymentsArray;
    
        return $this;
    }

    /**
     * Get paymentsArray
     *
     * @return array 
     */
    public function getPaymentsArray()
    {
        return $this->paymentsArray;
    }
}