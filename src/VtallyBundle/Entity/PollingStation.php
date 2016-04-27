<?php

namespace VtallyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PollingStation
 *
 * @ORM\Table(name="polling_station")
 * @ORM\Entity(repositoryClass="VtallyBundle\Repository\PollingStationRepository")
 */
class PollingStation
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
     * @var string
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="district", type="string", length=255, nullable=true)
     */
    private $district;
    
    /**
     * @ORM\ManyToOne(targetEntity="VtallyBundle\Entity\Constituency", inversedBy="pollingStations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $constituency;
    
    /**
     * @ORM\OneToMany(targetEntity="PrBundle\Entity\PrNotification", mappedBy="pollingStation", cascade={"remove"})
     */
    private $prNotifications;
    
    /**
     * @ORM\OneToMany(targetEntity="PaBundle\Entity\PaNotification", mappedBy="pollingStation", cascade={"remove"})
     */
    private $paNotifications;
    
    /**
     * @ORM\OneToMany(targetEntity="PrBundle\Entity\PrVoteCast", mappedBy="pollingStation", cascade={"remove"})
     */
    private $prVoteCasts;
    
    /**
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\User", mappedBy="pollingStation", cascade={"remove", "persist"})
     */
    private $users;
    
    /**
     * @ORM\OneToMany(targetEntity="PrBundle\Entity\PrEditedVoteCast", mappedBy="pollingStation", cascade={"remove"})
     */
    private $prEditedVoteCasts;
    
    /**
     * @ORM\OneToMany(targetEntity="PaBundle\Entity\PaVoteCast", mappedBy="pollingStation", cascade={"remove"})
     */
    private $paVoteCasts;
    
    /**
     * @ORM\OneToMany(targetEntity="PaBundle\Entity\PaEditedVoteCast", mappedBy="pollingStation", cascade={"remove"})
     */
    private $paEditedVoteCasts;
    
    /**
     * @ORM\OneToOne(targetEntity="PrBundle\Entity\PrPinkSheet", inversedBy="pollingStation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $prPinkSheet;
    
    /**
     * @ORM\OneToOne(targetEntity="PaBundle\Entity\PaPinkSheet", inversedBy="pollingStation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $paPinkSheet;
    
    /**
     * @ORM\OneToOne(targetEntity="VtallyBundle\Entity\ReturningOfficer", inversedBy="pollingStation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $returningOfficer;
    
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
     * @return PollingStation
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
     * Set code
     *
     * @param string $code
     *
     * @return PollingStation
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set district
     *
     * @param string $district
     *
     * @return PollingStation
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set constituency
     *
     * @param \VtallyBundle\Entity\Constituency $constituency
     *
     * @return PollingStation
     */
    public function setConstituency(\VtallyBundle\Entity\Constituency $constituency)
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
    

    /**
     * Add prVoteCast
     *
     * @param \PrBundle\Entity\PrVoteCast $prVoteCast
     *
     * @return PollingStation
     */
    public function addPrVoteCast(\PrBundle\Entity\PrVoteCast $prVoteCast)
    {
        $this->prVoteCasts[] = $prVoteCast;

        return $this;
    }

    /**
     * Remove prVoteCast
     *
     * @param \PrBundle\Entity\PrVoteCast $prVoteCast
     */
    public function removePrVoteCast(\PrBundle\Entity\PrVoteCast $prVoteCast)
    {
        $this->prVoteCasts->removeElement($prVoteCast);
    }

    /**
     * Get prVoteCasts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrVoteCasts()
    {
        return $this->prVoteCasts;
    }

    /**
     * Add paVoteCast
     *
     * @param \PaBundle\Entity\PaVoteCast $paVoteCast
     *
     * @return PollingStation
     */
    public function addPaVoteCast(\PaBundle\Entity\PaVoteCast $paVoteCast)
    {
        $this->paVoteCasts[] = $paVoteCast;

        return $this;
    }

    /**
     * Remove paVoteCast
     *
     * @param \PaBundle\Entity\PaVoteCast $paVoteCast
     */
    public function removePaVoteCast(\PaBundle\Entity\PaVoteCast $paVoteCast)
    {
        $this->paVoteCasts->removeElement($paVoteCast);
    }

    /**
     * Get paVoteCasts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaVoteCasts()
    {
        return $this->paVoteCasts;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prNotifications = new \Doctrine\Common\Collections\ArrayCollection();
        $this->prVoteCasts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->paVoteCasts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setActive(false);
    }

    /**
     * Add prNotification
     *
     * @param \PrBundle\Entity\PrNotification $prNotification
     *
     * @return PollingStation
     */
    public function addPrNotification(\PrBundle\Entity\PrNotification $prNotification)
    {
        $this->prNotifications[] = $prNotification;

        return $this;
    }

    /**
     * Remove prNotification
     *
     * @param \PrBundle\Entity\PrNotification $prNotification
     */
    public function removePrNotification(\PrBundle\Entity\PrNotification $prNotification)
    {
        $this->prNotifications->removeElement($prNotification);
    }

    /**
     * Get prNotifications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrNotifications()
    {
        return $this->prNotifications;
    }

    /**
     * Add paNotification
     *
     * @param \PaBundle\Entity\PaNotification $paNotification
     *
     * @return PollingStation
     */
    public function addPaNotification(\PaBundle\Entity\PaNotification $paNotification)
    {
        $this->paNotifications[] = $paNotification;

        return $this;
    }

    /**
     * Remove paNotification
     *
     * @param \PaBundle\Entity\PaNotification $paNotification
     */
    public function removePaNotification(\PaBundle\Entity\PaNotification $paNotification)
    {
        $this->paNotifications->removeElement($paNotification);
    }

    /**
     * Get paNotifications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaNotifications()
    {
        return $this->paNotifications;
    }

    /**
     * Set prPinkSheet
     *
     * @param \PrBundle\Entity\PrPinkSheet $prPinkSheet
     *
     * @return PollingStation
     */
    public function setPrPinkSheet(\PrBundle\Entity\PrPinkSheet $prPinkSheet = null)
    {
        $this->prPinkSheet = $prPinkSheet;

        return $this;
    }

    /**
     * Get prPinkSheet
     *
     * @return \PrBundle\Entity\PrPinkSheet
     */
    public function getPrPinkSheet()
    {
        return $this->prPinkSheet;
    }

    /**
     * Set returningOfficer
     *
     * @param \VtallyBundle\Entity\ReturningOfficer $returningOfficer
     *
     * @return PollingStation
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
     * Set paPinkSheet
     *
     * @param \PaBundle\Entity\PaPinkSheet $paPinkSheet
     *
     * @return PollingStation
     */
    public function setPaPinkSheet(\PaBundle\Entity\PaPinkSheet $paPinkSheet = null)
    {
        $this->paPinkSheet = $paPinkSheet;

        return $this;
    }

    /**
     * Get paPinkSheet
     *
     * @return \PaBundle\Entity\PaPinkSheet
     */
    public function getPaPinkSheet()
    {
        return $this->paPinkSheet;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return PollingStation
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Add prEditedVoteCast
     *
     * @param \PrBundle\Entity\PrEditedVoteCast $prEditedVoteCast
     *
     * @return PollingStation
     */
    public function addPrEditedVoteCast(\PrBundle\Entity\PrEditedVoteCast $prEditedVoteCast)
    {
        $this->prEditedVoteCasts[] = $prEditedVoteCast;

        return $this;
    }

    /**
     * Remove prEditedVoteCast
     *
     * @param \PrBundle\Entity\PrEditedVoteCast $prEditedVoteCast
     */
    public function removePrEditedVoteCast(\PrBundle\Entity\PrEditedVoteCast $prEditedVoteCast)
    {
        $this->prEditedVoteCasts->removeElement($prEditedVoteCast);
    }

    /**
     * Get prEditedVoteCasts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrEditedVoteCasts()
    {
        return $this->prEditedVoteCasts;
    }

    /**
     * Add paEditedVoteCast
     *
     * @param \PaBundle\Entity\PaEditedVoteCast $paEditedVoteCast
     *
     * @return PollingStation
     */
    public function addPaEditedVoteCast(\PaBundle\Entity\PaEditedVoteCast $paEditedVoteCast)
    {
        $this->paEditedVoteCasts[] = $paEditedVoteCast;

        return $this;
    }

    /**
     * Remove paEditedVoteCast
     *
     * @param \PaBundle\Entity\PaEditedVoteCast $paEditedVoteCast
     */
    public function removePaEditedVoteCast(\PaBundle\Entity\PaEditedVoteCast $paEditedVoteCast)
    {
        $this->paEditedVoteCasts->removeElement($paEditedVoteCast);
    }

    /**
     * Get paEditedVoteCasts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaEditedVoteCasts()
    {
        return $this->paEditedVoteCasts;
    }

    /**
     * Add user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return PollingStation
     */
    public function addUser(\UserBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \UserBundle\Entity\User $user
     */
    public function removeUser(\UserBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
