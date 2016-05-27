<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace VtallyBundle\Component; 


class CSVTypes 
{
    const RAETSEL             = 1;
    const SPRUECHE            = 2;

    public static function getTypes() 
    {
        return array(
                self::RAETSEL => 'Polling Station',
                self::SPRUECHE => 'Constituency',

        );
    }
    
    public static function getTypesAndIds() 
    {
        $all = self::getTypes();
        
        $return = array();
        
        foreach($all as $key => $value) {
            $return[] = array("id" => $key, "title" => $value);
        }
        
        return $return;
    }
    
    public static function getNameOfType($type) 
    {
        $allTypes=self::getTypes();
        
        if (isset($allTypes[$type])) return $allTypes[$type];
        
        return "- Unknown Type -";
    }
    
    public static function getEntityClass($type) 
    {
        switch ($type) {
            case self::RAETSEL:         return "VtallyBundle:PollingStation";
            case self::SPRUECHE:        return "VtallyBundle:Constituency";
            default: return false;
        }
    }
    
    public static function existsType($type) 
    {
        $allTypes = self::getTypes();
        
        if (isset($allTypes[$type])) return true;
        
        return false;
    }

}
