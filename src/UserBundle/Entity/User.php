<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    private $type;
    
    /**
     * @var string
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;
    
    /**
     * Unmapped property to handle file uploads
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $firstName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="verifierType", type="boolean", nullable=true)
     */
    private $verifierType;
    
    /**
     * @var string
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;
    
    /**
     * @var string
     *
     * @ORM\Column(name="userToken", type="string", length=255, nullable=true)
     */
    private $userToken;
    
    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="integer", length=255, nullable=true)
     */
    private $phoneNumber;
    
    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255, nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "The last name must be at least {{ limit }} characters long",
     *      maxMessage = "The last name cannot be longer than {{ limit }} characters"
     * )
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;
    
    /**
     * @Assert\Valid
     * @ORM\ManyToOne(targetEntity="VtallyBundle\Entity\PollingStation", inversedBy="users")
     * @ORM\JoinColumn(nullable=true)
     */
    private $pollingStation;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tokenTime", type="datetime", length=255, nullable=true)
     */
    private $tokenTime;
    
    /**
    * Sets file.
    *
    * @param UploadedFile $file
    */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
    * Get file.
    *
    * @return UploadedFile
    */
    public function getFile()
    {
        return $this->file;
    }
    
    public function isUserTokenValid($configuredTime)
    {
        //Get the last minute
        $lastMin = $this->getTokenTime()->format('i');
        
        //Get the current minute
        $currentDate = new \DateTime("now");
        $currentMin = $currentDate->format('i');
        
        //Calculate the lapsed minute base on the parameter
        $lapsedMinute = $currentMin - $lastMin;
        
        if(($configuredTime >= $lapsedMinute)&&($currentDate->format('y') == $this->getTokenTime()->format('y'))
                &&($currentDate->format('m') == $this->getTokenTime()->format('m')
                &&($currentDate->format('H') == $this->getTokenTime()->format('H')))){
            
            return true;
        }
        
        return false;
    }
    
    public function refreshTokenTime()
    {
        //$this->setUserToken(rand(0, 999999));
        $this->setTokenTime(new \DateTime("now"));
    }
    
    public function setType($type)
    {
        $this->type = $type;
    }
    
    public function getType()
    {
        return $this->type;
    }
    
    public function isFirstVerifier()
    {
        if($this->getVerifierType()){
            return true;
        }
        return false;
    }
    
    public function isSecondVerifier()
    {
        if(!$this->getVerifierType()){
            return true;
        }
        
        return false;
    }
    
    /**
    * @ORM\PostPersist()
    * @ORM\PostUpdate()
    */
    public function lifecycleFileUpload()
    {
        $this->upload();
    }

    /**
     * @ORM\PreUpdate()
     */
    public function refreshUpdated()
    {
        $this->setUpdated(new \DateTime());
    }
    
    /**
     * @ORM\PreRemove()
     */
    public function removeUPdate()
    {
        //Check whether the file exists first
        if (file_exists(getcwd().'/upload/images/'.$this->getImage())){
            //Remove it
            @unlink(getcwd().'/upload/images/'.$this->getImage());
        }
        
        return;
    }
    
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }
        // move takes the target directory and target filename as params
        $this->getFile()->move(getcwd().'/upload/images', $this->getId().'.'.$this->getFile()->guessExtension());
        // clean up the file property as you won't need it anymore
        $this->setFile(null);
    }
    
    public function __construct() 
    {
        parent::__construct();
        $this->setCreatedAt(new \DateTime("now"));
        $this->setTokenTime(new \DateTime("now"));
    }
    
    /**
     * @Assert\IsTrue(message = "A verifier has to be linked to a polling station")
     */
    public function isPollingStationValid()
    {
        if(!$this->getPollingStation() && ($this->getType() == 'verifier1' || $this->getType() == 'verifier2')){
            return false;
        }
       
        return true;
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
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
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     *
     * @return User
     */
    public function setImage($image)
    {
        if($this->getFile() !== null){
            $this->image = $this->getFile()->guessExtension();
        }
        
        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->getId().'.'.$this->image;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set pollingStation
     *
     * @param \VtallyBundle\Entity\PollingStation $pollingStation
     *
     * @return User
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

    /**
     * Set userToken
     *
     * @param string $userToken
     *
     * @return User
     */
    public function setUserToken($userToken)
    {
        $this->userToken = $userToken;

        return $this;
    }
    
    /**
     * @return string token to identify a session
     */
    public function generateUserToken()
    {
        /**** to be removed in production **********/
        if($this->getVerifierType()){
            $this->setUserToken('ABCD1');
        }else{
            $this->setUserToken('ABCD2');
        }
        return $this->getUserToken();
        /**** to be removed in production **********/
        $this->setUserToken(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));
        //Issue it.
        return $this->getUserToken();
    }

    /**
     * Get userToken
     *
     * @return string
     */
    public function getUserToken()
    {
        return $this->userToken;
    }
    
    

    /**
     * Set tokenTime
     *
     * @param \DateTime $tokenTime
     *
     * @return User
     */
    public function setTokenTime($tokenTime)
    {
        $this->tokenTime = $tokenTime;

        return $this;
    }

    /**
     * Get tokenTime
     *
     * @return \DateTime
     */
    public function getTokenTime()
    {
        return $this->tokenTime;
    }

    /**
     * Set verifierType
     *
     * @param boolean $verifierType
     *
     * @return User
     */
    public function setVerifierType($verifierType)
    {
        $this->verifierType = $verifierType;

        return $this;
    }

    /**
     * Get verifierType
     *
     * @return boolean
     */
    public function getVerifierType()
    {
        return $this->verifierType;
    }

    /**
     * Set phoneNumber
     *
     * @param integer $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return integer
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return User
     */
    public function setActive($active)
    {
        //Make sure to set lastLogin
        $this->setLastLogin(new \DateTime("now"));
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
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return User
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }
}
