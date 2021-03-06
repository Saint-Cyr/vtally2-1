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
     * @param Constituency $constituency
     */
    public function getParliamentaryConstituency(Constituency $constituency)
    {
        $candidates = $constituency->getCandidatesWithVoteCasts();
        return $candidates;
    }
    
    /**
     * 
     * @param PollingStation $pollingStation
     */
    public function getParliamentaryPollingStation(PollingStation $pollingStation)
    {
        $candidates = $pollingStation->getParliamentaryCandidateWithVoteCast();
        
        $objects = $this->sortByVoteCast($candidates);
        
        foreach ($objects as $key => $item){
            $item->setOrder($key + 1);
        }
        
        return $objects;
    }
    
    /**
     * 
     * @param array $constituencies
     * @param array $paParties
     * @param array $indCandidates
     * @return paParty instances hydrated with voteCast, order...
     */
    public function getParliamentaryRegion(Region $region)
    {
        //Get the constituencies
        $constituencies = $region->getConstituenciesSimpleArray();
        //Get paParties
        $paParties = $this->em->getRepository('PaBundle:PaParty')->findAll();
        //Get paIndependentCandidate
        $indCandidates = $this->em->getRepository('PaBundle:IndependentCandidate')->findAll();
        
        $paVoteCasts = $this->getSiteNumber($constituencies, $paParties, $indCandidates);
        $parties = $this->sortBySiteNumber($paVoteCasts['parties']);
        $paVoteCasts['parties'] = $parties;
        
        foreach ($paVoteCasts['parties'] as $key => $item){
            $item->setOrder($key + 1);
        }
        
        return $paVoteCasts;
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
    public function getPresidentialPollingStation(PollingStation $pollingStation)
    {
        $prVoteCasts = $pollingStation->getPrVoteCasts();
        
        foreach ($prVoteCasts as $vote){
            
            $party = $vote->getPrParty();
            $party->initializeVoteCast($vote->getFigureValue());
            $parties[] = $party;
        }
        
        $parties = $this->sortByVoteCast($parties);
        
        foreach ($parties as $key => $item){
            $item->setOrder($key + 1);
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
        
        $objects = $this->sortByVoteCast($parties);
        
        foreach ($objects as $key => $item){
            $item->setOrder($key + 1);
        }
        
        return $objects;
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
        
        $objects = $this->sortByVoteCast($parties);
        
        foreach ($objects as $key => $item){
            $item->setOrder($key + 1);
        }
        
        return $objects;
    }
    
    /**
     * @return array
     */
    public function getPresidentialNation()
    {
        //Get all the polling stations
        $pollingStations = $this->em->getRepository('VtallyBundle:PollingStation')->findAll();
        //Get all the presidential parties
        $prParties = $this->em->getRepository('PrBundle:PrParty')->findAll();
        //Set the vote cast for each prParty
        foreach ($prParties as $prParty){
            $this->setPresidentialVoteCast($prParty, $pollingStations);
        }
        
        $prParties = $this->sortByVoteCast($prParties);
        
        foreach ($prParties as $key => $item){
            $item->setOrder($key + 1);
        }
        
        return $prParties;
    }
    
    
    /**
     * @return array items can be prParties|paParty|any objects
     * that have property voteCast and isPassed. Notice that
     * all items are sorted based on the values of voteCast
     * @param array $objects
     * @deprecated since version 2.1
     */
    public function classify(array $objects)
    {
        
        usort($objects, function($a, $b)
        {
            return strcmp($a->getVoteCast(), $b->getVoteCast());
            
        });
        
        $objects = array_reverse($objects);
        
        foreach ($objects as $key => $item){
            $item->setOrder($key + 1);
        }
        
        return $objects;
    }
    
    public function sortByVoteCast(array $objects)
    {
        //Get the total number of the items in the array
        $n = count($objects);
        for($i = 1; $i < $n; $i++){
            for($j = 0; $j < $n - 1; $j++){
                if($objects[$j]->getVoteCast() > $objects[$j + 1]->getVoteCast()){
                    $temp = $objects[$j];
                    $objects[$j] = $objects[$j + 1];
                    $objects[$j+1] = $temp;
                }
            }
        }
        
        return array_reverse($objects);
    }
    
    public function sortBySiteNumber(array $objects)
    {
        //Get the total number of the items in the array
        $n = count($objects);
        for($i = 1; $i < $n; $i++){
            for($j = 0; $j < $n - 1; $j++){
                if($objects[$j]->getSiteNumber() > $objects[$j + 1]->getSiteNumber()){
                    $temp = $objects[$j];
                    $objects[$j] = $objects[$j + 1];
                    $objects[$j+1] = $temp;
                }
            }
        }
        
        return array_reverse($objects);
    }
    
    
}