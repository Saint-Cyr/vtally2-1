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

class DefaultHandler
{
    private $em;
    
    public function __construct($em) 
    {
        $this->em = $em;
    }
    
    /**
     * 
     * @param type $type string
     * @param type $id integer ID doctrine
     * @return doctrineArrayCollection
     */
    public function processDownload($type, $id = null)
    {
        $doc = array();
        switch ($type){
            case 'presidential_all':
                
                $doc['document'] = $this->downloadPresidentialAll();
                $doc['type'] = 'presidential';
                return $doc;
                break;
            case 'presidential_region':
                $doc['document'] = $this->downloadPresidentialRegion($id);
                $doc['type'] = 'presidential';
                return $doc;
                break;
            case 'presidential_constituency':
                $doc['document'] = $this->downloadPresidentialConstituency($id);
                $doc['type'] = 'presidential';
                return $doc;
                break;
            case 'parliamentary_all':
                $doc['document'] = $this->downloadParliamentaryAll();
                $doc['type'] = 'parliamentary';
                return $doc;
                break;
            case 'parliamentary_region':
                $doc['document'] = $this->downloadParliamentaryRegion($id);
                $doc['type'] = 'parliamentary';
                return $doc;
                break;
            case 'parliamentary_constituency':
                $doc['document'] = $this->downloadParliamentaryConstituency($id);
                $doc['type'] = 'parliamentary';
                return $doc;
                break;
        }
    }
    
    /**
     * 
     * @return doctrine Array
     */
    public function downloadPresidentialAll()
    {
        $doc = $this->em->getRepository('PrBundle:PrPinkSheet')->findAll();
        return $doc;
    }
    
    /**
     * 
     * @param type $id
     * @return boolean|doctrine array
     */
    public function downloadPresidentialRegion($id)
    {
        //Get all the presidential pink sheet for a given region
        $region = $this->em->getRepository('VtallyBundle:Region')->find($id);
        if(!$region){
            return false;
        }
        
        $pollingStationTab = array();
        $doc = array();
        $constituencies = $region->getConstituencies();
        
        foreach ($constituencies as $const){
            $docVar = $this->downloadPresidentialConstituency($const->getId());
            foreach ($docVar as $d){
                $doc [] = $d;
            }
        }
        
        //Make sure $doc is not null. Otherwise return false to the controller in order for it
        //to return 404 status code
        if(!$doc){
            return false;
        }
        
        return $doc;
    }
    
    /**
     * 
     * @param type $id
     * @return boolean|doctrine array
     */
    public function downloadPresidentialConstituency($id)
    {
        //Get the constituency
        $constituency = $this->em->getRepository('VtallyBundle:Constituency')->find($id);
        if(!$constituency){
            return false;
        }
        //Array to collect all the pink sheet
        $doc = array();
        //Get all the polling Station context
        $pollingStations = $constituency->getPollingStations();
        
        foreach ($pollingStations as $p){
            $doc[] = $p->getPrPinkSheet();
        }
        
        return $doc;
    }
    
    /**
     * 
     * @return doctrine array
     */
    public function downloadParliamentaryAll()
    {
        $doc = $this->em->getRepository('PaBundle:PaPinkSheet')->findAll();
        return $doc;
    }
    
    /**
     * 
     * @param type $id
     * @return boolean|doctrine array
     */
    public function downloadParliamentaryRegion($id)
    {
        //Get all the presidential pink sheet for a given region
        $region = $this->em->getRepository('VtallyBundle:Region')->find($id);
        if(!$region){
            return false;
        }
        
        $pollingStationTab = array();
        $doc = array();
        $constituencies = $region->getConstituencies();
        
        foreach ($constituencies as $const){
            $docVar = $this->downloadParliamentaryConstituency($const->getId());
            foreach ($docVar as $d){
                $doc [] = $d;
            }
        }
        
        //Make sure $doc is not null. Otherwise return false to the controller in order for it
        //to return 404 status code
        if(!$doc){
            return false;
        }
        
        return $doc;
    }
    
    /**
     * 
     * @param type $id
     * @return boolean|doctrine array
     */
    public function downloadParliamentaryConstituency($id)
    {
        //Get the constituency
        $constituency = $this->em->getRepository('VtallyBundle:Constituency')->find($id);
        if(!$constituency){
            return false;
        }
        //Array to collect all the pink sheet
        $doc = array();
        //Get all the polling Station context
        $pollingStations = $constituency->getPollingStations();
        
        foreach ($pollingStations as $p){
            $doc[] = $p->getPaPinkSheet();
        }
        
        return $doc;
    }
    
}