<?php namespace zhz;

/**
 * 
 */
class Segmenter {
    private $dictionary;

    /**
     * 
     */
    public function __construct($dictionary) {

    }

    /**
     * 
     */
    public function segment($text) {
        $count = preg_match_all('/\w/u', $text, $matches);
        $segmentions = $matches[0];
    }
}