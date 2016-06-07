<?php

/*
 * This file is part of Components of VTALLY2 project
 * By contributor S@int-Cyr MAPOUKA
 * (c) YAME Group <info@yamegroup.com>
 * For the full copyrght and license information, please view the LICENSE
 * file that was distributed with this source code
 */
namespace VtallyBundle\Component; 
use PrBundle\Entity\PrParty;
use VtallyBundle\Entity\PollingStation;
use VtallyBundle\Entity\Region;
use VtallyBundle\Entity\Constituency;

class StatisticHandler
{
    private $em;
    
    public function __construct($em) 
    {
        $this->em = $em;
    }
    
    /**
     * 
     * @param array $constituencies
     * @param array $parties
     * @param array $indCandidates
     * @return array('parties' => array(), 'IC' => array())
     */
    public function getSiteNumber(array $constituencies, array $parties = null, array $indCandidates = null)
    {
        $sites = array('parties' => array(), 'IC' => array());
        
        if($parties){
            foreach ($parties as $party){  
                $depCandidates = $party->getDependentCandidates();
                foreach ($depCandidates as $candidate){ 
                    foreach ($constituencies as $const){
                        if($const->getWinner() === $candidate){ 
                            $party->increaseSiteNumber();  
                        }
                    }
                }
            }
            
            $sites['parties'] = $parties;
        }
        
        if($indCandidates) {
            $ICsite = 0;
            foreach ($indCandidates as $candidate){
                foreach ($constituencies as $const){
                    if($const->getWinner() === $candidate){
                        $ICsite++;
                    }
                }
            }
            
            $sites['IC'] = $ICsite;
        }
        
        return $sites;
    }
    
    /**
     * @param array $parties1
     * @param array $parties2
     * @return array
     * @deprecated since version 0.3
     */
    public function presidentialMerge(array $parties1, array $parties2)
    {
        foreach ($parties1 as $party1){
            
            if(!($this->findPartyByName($party1->getName(), $parties2))){
                return;
            }
            
            $party2 = $this->findPartyByName($party1->getName(), $parties2);
            $party1->increaseVoteCast($party2->getVoteCast());
        }
        
        return $parties1;
    }
    
    /**
     * 
     * @param type $name
     * @param array $parties
     * @return boolean | PrPartyType
     */
    public function findPartyByName($name, array $parties)
    {
        foreach ( $parties as $element ) {
            if ( $name == $element->getName() ) {
                return $element;
            }
        }

        return false;
    }
    
    /**
     * @param PrParty $party
     * @param Doctrine array $pollingStations
     */
    public function setPresidentialVoteCast(PrParty $party, $pollingStations)
    {
        //Make sure the voteCast field is 0 before start
        $party->initializeVoteCast(0);
        //For each polling Station, increase the vote cast value
        foreach ($pollingStations as $pol){
            
            $votes = $pol->getPrVoteCasts();
            
            foreach ($votes as $v){
                
                if($v->getPrParty()->getName() == $party->getName()){
                    $party->increaseVoteCast($v->getFigureValue());
                    
                }
            }
        }
    }
    
    /**
     * @param PollingStation $pollingStation
     * @return array of PrParty
     */
    public function getPresidentialPollingStation(PollingStation$pollingStation)
    {
        $prVoteCasts = $pollingStation->getPrVoteCasts();
        
        foreach ($prVoteCasts as $vote){
            
            $party = $vote->getPrParty();
            $party->initializeVoteCast($vote->getFigureValue());
            $parties[] = $party;
            
        }
        
        return $parties;
    }
    
    /**
     * 
     * @param Constituency $constituency
     * @return array of PrParty
     */
    public function getPresidentialConstituency(Constituency $constituency)
    {
        $parties = $this->em->getRepository('PrBundle:PrParty')->findAll();
        
        $pollingStations = $constituency->getPollingStations();
        
        foreach ($parties as $p){
            $this->setPresidentialVoteCast($p, $pollingStations);
        }
        
        return $parties;
    }
    
    /**
     * @param Region $region
     * @return array
     */
    public function getPresidentialRegion(Region $region)
    {
        //variable to store all the pollingStations for the Region $region
        $pollingStations = array();
        //Get all the parties from the DataBase
        $parties = $this->em->getRepository('PrBundle:PrParty')->findAll();
        //Get all the constituencies belong to $region
        $constituencies = $region->getConstituencies();
        //Colloct all the pollingStations belong to $region
        foreach ($constituencies as $const){
            
            foreach ($const->getPollingStations() as $pol){
                $pollingStations[] = $pol;
            } 
        }
        //Update each one of the parties in order to have theire write votecast value
        //base on the pollingStation list
        foreach ($parties as $p){
            $this->setPresidentialVoteCast($p, $pollingStations);
        }
        
        return $parties;
    }
    
    /**
     * @return array
     */
    public function getPresidentialNation()
    {
        //Get all the regions
        $regions = $this->em->getRepository('VtallyBundle:Region')->findAll();
        $prParties1 = $this->em->getRepository('PrBundle:PrParty')->findAll();
        //For each region, increase the value of each prParty
        foreach ($regions as $reg){
            //Get the vote cast for this region
            $prParties2 = $this->getPresidentialRegion($reg);
            $merged = $this->presidentialMerge($prParties1, $prParties2);
        }
        return $merged;
    }
}