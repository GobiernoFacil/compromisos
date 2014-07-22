<?php

namespace Modernizacion\Helpers;

use DB;
use Fuente;
use Scalia\SphinxSearch\SphinxSearch;

/**
 * Class SearchHelper
 * @package Modernizacion\Helpers
 */
class SphinxHelper {

    /**
     * @var SphinxSearch
     */
    private $sphinx = null;

    /**
     * @param SphinxSearch $sphinx
     */
    function __construct(SphinxSearch $sphinx){
        $this->sphinx = $sphinx;
    }

    /**
     * @param $text
     * @param array $options
     * @return array
     */
    public function search($text, $options = array()){
        $ids = $filters = array();

        $sqb = $this->sphinx->search($text, 'compromisos_index');

        if($options['fuentes'])
            $sqb->filter('fuente', $options['fuentes']);

        if($options['instituciones'])
            $sqb->filter('institucion', $options['instituciones']);

        if($options['tags'])
            $sqb->filter('tag', $options['tags']);

        if($options['usuarios'])
            $sqb->filter('usuario', $options['usuarios']);

        if($options['sectores'])
            $sqb->filter('sector', $options['sectores']);

        if($options['tipos'])
            $sqb->filter('tipo', $options['tipos']);

        if($options['avances'])
            $sqb->filter('avance', $options['avances']);

        if(empty($text))
            $sqb->setMatchMode(\Sphinx\SphinxClient::SPH_MATCH_FULLSCAN);

        $result = $sqb->limit(10000)->get();

        if(!$result || !isset($result['matches']))
            return array('ids' => null, 'filters' => null);


        foreach($result['matches'] as $id => $match){
            array_push($ids, $id);
            foreach($match['attrs'] as $filter_key => $value){
                if(!isset($filters[$filter_key]))
                    $filters[$filter_key] = array();

                array_push($filters[$filter_key], $value);
            }
        }

        return array('ids' => $ids, 'filters' => $filters);
    }


}