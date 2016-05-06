<?php

namespace PrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PrPinkSheet
 *
 * @ORM\Table(name="pr_pink_sheet")
 * @ORM\Entity(repositoryClass="PrBundle\Repository\PrPinkSheetRepository")
 */
class PrPinkSheet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="edited", type="boolean", nullable=true)
     */
    private $edited;
    
    /**
     * @ORM\OneToOne(targetEntity="VtallyBundle\Entity\PollingStation", mappedBy="prPinkSheet", cascade={"remove"})
     */
    private $pollingStation;
    
    public function __toString() 
    {
        return $this->name;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return PrPinkSheet
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
     * Set edited
     *
     * @param boolean $edited
     *
     * @return PrPinkSheet
     */
    public function setEdited($edited)
    {
        $this->edited = $edited;

        return $this;
    }

    /**
     * Get edited
     *
     * @return bool
     */
    public function getEdited()
    {
        return $this->edited;
    }

    /**
     * Set pollingStation
     *
     * @param \VtallyBundle\Entity\PollingStation $pollingStation
     *
     * @return PrPinkSheet
     */
    public function setPollingStation(\VtallyBundle\Entity\PollingStation $pollingStation = null)
    {
        $this->pollingStation = $pollingStation;

        return $this;
    }

    /**
     * Get pollingStation
     *
     * @return \VtallyBundle\Entity\PollingStation
     */
    public function getPollingStation()
    {
        return $this->pollingStation;
    }
}
