<?php namespace zhz\data;

/**
 * 
 */
class Ngram
{
    private $n;

    /**
     * 
     */
    public function __construct($n)
    {
        $this->n = $n;
    }

    /**
     * 
     */
    public function split($text)
    {
        $count = preg_match_all('/./u', $text, $matches);
        $length = $count - $this->n + 1;
        $result = [];
        for ($i = 0; $i < $length; ++$i) {
            $word = array_slice($matches[0], $i, $this->n);
            $result[] = join($word);
        }
        return $result;
    }
}
