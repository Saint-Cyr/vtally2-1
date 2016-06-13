<?php

namespace PrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * PrParty
 *
 * @ORM\Table(name="pr_party")
 * @ORM\Entity(repositoryClass="PrBundle\Repository\PrPartyRepository")
 * @ORM\HasLifecycleCallbacks
 */
class PrParty
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
     * Unmapped property to handle file uploads
     */
    private $file;
    
    private $voteCast;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;
    
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, unique=true, nullable=true)
     */
    private $image;
    
    /**
     * @ORM\OneToOne(targetEntity="PrBundle\Entity\PrDependentCandidate", mappedBy="prParty", cascade={"remove", "persist"})
     */
    private $prDependentCandidate;
    
    /**
     * @ORM\OneToMany(targetEntity="PrBundle\Entity\PrVoteCast", mappedBy="prParty", cascade={"remove"})
     */
    private $prVoteCasts;
    
    public function getTotalVoteCast()
    {
        $vote = 0;
        
        foreach ($this->getPrVoteCasts() as $v){
            $vote = $vote + $v->getFigureValue();
        }
        
        return $vote;
    }
    
    public function __toString() 
    {
        return $this->name;
    }
    
    public function initializeVoteCast($voteCast)
    {
        $this->voteCast = $voteCast;
    }
    
    public function increaseVoteCast($voteCast)
    {
        $this->voteCast = $this->voteCast + $voteCast;
    }
    
    public function getVoteCast()
    {
        return $this->voteCast;
    }
    
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
    * @ORM\PrePersist()
    * @ORM\PreUpdate()
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
        $this->image = $this->getName().'.'.$this->getFile()->guessExtension();
        $this->getFile()->move(getcwd().'/upload/images', $this->getName().'.'.$this->getFile()->guessExtension());
        // clean up the file property as you won't need it anymore
        $this->setFile(null);
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return PrParty
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
     * Set prDependentCandidate
     *
     * @param \PrBundle\Entity\PrDependentCandidate $prDependentCandidate
     *
     * @return PrParty
     */
    public function setPrDependentCandidate(\PrBundle\Entity\PrDependentCandidate $prDependentCandidate = null)
    {
        $this->prDependentCandidate = $prDependentCandidate;

        return $this;
    }

    /**
     * Get prDependentCandidate
     *
     * @return \PrBundle\Entity\PrDependentCandidate
     */
    public function getPrDependentCandidate()
    {
        return $this->prDependentCandidate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prVoteCasts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add prVoteCast
     *
     * @param \PrBundle\Entity\PrVoteCast $prVoteCast
     *
     * @return PrParty
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
     * Set image
     *
     * @param string $image
     *
     * @return PrParty
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return PrParty
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
}
