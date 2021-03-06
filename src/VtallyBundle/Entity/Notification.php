<?php

namespace VtallyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table(name="notification")
 * @ORM\Entity(repositoryClass="VtallyBundle\Repository\NotificationRepository")
 */
class Notification
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
     * @ORM\Column(name="firstVerifier", type="string", length=255)
     */
    private $firstVerifier;
    
    /**
     * @ORM\ManyToOne(targetEntity="VtallyBundle\Entity\PollingStation", inversedBy="notifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pollingStation;

    /**
     * @var string
     *
     * @ORM\Column(name="secondVerifier", type="string", length=255)
     */
    private $secondVerifier;
    
     /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


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
     * Set firstVerifier
     *
     * @param string $firstVerifier
     *
     * @return Notification
     */
    public function setFirstVerifier($firstVerifier)
    {
        $this->firstVerifier = $firstVerifier;

        return $this;
    }

    /**
     * Get firstVerifier
     *
     * @return string
     */
    public function getFirstVerifier()
    {
        return $this->firstVerifier;
    }

    /**
     * Set secondVerifier
     *
     * @param string $secondVerifier
     *
     * @return Notification
     */
    public function setSecondVerifier($secondVerifier)
    {
        $this->secondVerifier = $secondVerifier;

        return $this;
    }

    /**
     * Get secondVerifier
     *
     * @return string
     */
    public function getSecondVerifier()
    {
        return $this->secondVerifier;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Notification
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set pollingStation
     *
     * @param \VtallyBundle\Entity\PollingStation $pollingStation
     *
     * @return Notification
     */
    public function setPollingStation(\VtallyBundle\Entity\PollingStation $pollingStation)
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
