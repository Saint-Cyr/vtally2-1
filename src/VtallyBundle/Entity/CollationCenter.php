<?php

namespace VtallyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CollationCenter
 *
 * @ORM\Table(name="collation_center")
 * @ORM\Entity(repositoryClass="VtallyBundle\Repository\CollationCenterRepository")
 */
class CollationCenter
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
     * @ORM\OneToOne(targetEntity="VtallyBundle\Entity\ReturningOfficer", inversedBy="collationCenter")
     * @ORM\JoinColumn(nullable=true)
     */
    private $returningOfficer;
    
    /**
     * @ORM\OneToOne(targetEntity="VtallyBundle\Entity\Constituency", mappedBy="collationCenter", cascade={"persist"})
     */
    private $constituency;
    
    public function __toString() 
    {
        return $this->getName();
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
     * @return CollationCenter
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
     * Set returningOfficer
     *
     * @param \VtallyBundle\Entity\ReturningOfficer $returningOfficer
     *
     * @return CollationCenter
     */
    public function setReturningOfficer(\VtallyBundle\Entity\ReturningOfficer $returningOfficer = null)
    {
        $this->returningOfficer = $returningOfficer;

        return $this;
    }

    /**
     * Get returningOfficer
     *
     * @return \VtallyBundle\Entity\ReturningOfficer
     */
    public function getReturningOfficer()
    {
        return $this->returningOfficer;
    }

    /**
     * Set constituency
     *
     * @param \VtallyBundle\Entity\Constituency $constituency
     *
     * @return CollationCenter
     */
    public function setConstituency(\VtallyBundle\Entity\Constituency $constituency = null)
    {
        $this->constituency = $constituency;

        return $this;
    }

    /**
     * Get constituency
     *
     * @return \VtallyBundle\Entity\Constituency
     */
    public function getConstituency()
    {
        return $this->constituency;
    }
}
