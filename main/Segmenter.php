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
        $this->dictionary = $dictionary;
    }

    /**
     * 
     */
    public function segment($text) {
        $result = [];
        $count = preg_match_all('/\w/u', $text, $matches);
        $segmentions = $matches[0];
        $lexemes = [];
        // TODO...
        return $result;
    }

    public function quick($segmentions, $lexemes) {
        foreach ($lexemes as $i => $lexeme) {
            $result = $this->dictionary->refer($segmentions, $i);
            if (!empty($result)) {
                return [$i, $result];
            }
        }
        return null;
    }
}