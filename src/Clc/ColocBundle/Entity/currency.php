<?php

namespace Clc\ColocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * currency
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Clc\ColocBundle\Entity\currencyRepository")
 */
class currency
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
     * @var string
     *
     * @ORM\Column(name="ISO", type="string", length=255)
     */
    private $ISO;

    /**
     * @var string
     *
     * @ORM\Column(name="Symbol", type="string", length=255)
     */
    private $Symbol;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     */
    private $Description;


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
     * Set ISO
     *
     * @param string $iSO
     * @return currency
     */
    public function setISO($iSO)
    {
        $this->ISO = $iSO;
    
        return $this;
    }

    /**
     * Get ISO
     *
     * @return string 
     */
    public function getISO()
    {
        return $this->ISO;
    }

    /**
     * Set Symbol
     *
     * @param string $symbol
     * @return currency
     */
    public function setSymbol($symbol)
    {
        $this->Symbol = $symbol;
    
        return $this;
    }

    /**
     * Get Symbol
     *
     * @return string 
     */
    public function getSymbol()
    {
        return $this->Symbol;
    }

    /**
     * Set Description
     *
     * @param string $description
     * @return currency
     */
    public function setDescription($description)
    {
        $this->Description = $description;
    
        return $this;
    }

    /**
     * Get Description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->Description;
    }
}