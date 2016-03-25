<?php

namespace PaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaNotification
 *
 * @ORM\Table(name="pa_notification")
 * @ORM\Entity(repositoryClass="PaBundle\Repository\PaNotificationRepository")
 */
class PaNotification
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="firstVerifier", type="string", length=255)
     */
    private $firstVerifier;

    /**
     * @var string
     *
     * @ORM\Column(name="secondVerifier", type="string", length=255)
     */
    private $secondVerifier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="VtallyBundle\Entity\PollingStation", inversedBy="paNotifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pollingStation;
    
    public function __construct() 
    {
        $this->setCreatedAt(new \DateTime("now"));
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
     * Set type
     *
     * @param string $type
     *
     * @return PaNotification
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
     * Set firstVerifier
     *
     * @param string $firstVerifier
     *
     * @return PaNotification
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
     * @return PaNotification
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PaNotification
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
     * @return PaNotification
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
