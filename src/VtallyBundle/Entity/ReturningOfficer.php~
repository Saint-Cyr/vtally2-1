<?php

namespace VtallyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReturningOfficer
 *
 * @ORM\Table(name="returning_officer")
 * @ORM\Entity(repositoryClass="VtallyBundle\Repository\ReturningOfficerRepository")
 */
class ReturningOfficer
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\OneToOne(targetEntity="VtallyBundle\Entity\PollingStation", mappedBy="returningOfficer", cascade={"persist"})
     */
    private $pollingStation;
    
    /**
     * @ORM\OneToOne(targetEntity="VtallyBundle\Entity\CollationCenter", mappedBy="returningOfficer", cascade={"persist"})
     */
    private $collationCenter;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function __construct() 
    {
        $this->setCreatedAt(new \DateTime("now"));
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ReturningOfficer
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ReturningOfficer
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set pollingStation
     *
     * @param \VtallyBundle\Entity\PollingStation $pollingStation
     *
     * @return ReturningOfficer
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

    /**
     * Set collationCenter
     *
     * @param \VtallyBundle\Entity\CollationCenter $collationCenter
     *
     * @return ReturningOfficer
     */
    public function setCollationCenter(\VtallyBundle\Entity\CollationCenter $collationCenter = null)
    {
        $this->collationCenter = $collationCenter;

        return $this;
    }

    /**
     * Get collationCenter
     *
     * @return \VtallyBundle\Entity\CollationCenter
     */
    public function getCollationCenter()
    {
        return $this->collationCenter;
    }
}
