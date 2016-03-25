<?php

namespace PrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PrNotification
 *
 * @ORM\Table(name="pr_notification")
 * @ORM\Entity(repositoryClass="PrBundle\Repository\PrNotificationRepository")
 */
class PrNotification
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
     * @ORM\ManyToOne(targetEntity="VtallyBundle\Entity\PollingStation", inversedBy="prNotifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pollingStation;
    
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
     * @return PrNotification
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
     * @return PrNotification
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
     * @return PrNotification
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
     * Set pollingStation
     *
     * @param \VtallyBundle\Entity\PollingStation $pollingStation
     *
     * @return PrNotification
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
