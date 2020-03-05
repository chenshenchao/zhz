<?php

namespace zhz\data;

/**
 * Ngram
 * 
 */
class Ngram
{
    private $n;

    /**
     * 设置每组切割字符个数。
     * 
     */
    public function __construct($n)
    {
        $this->n = $n;
    }

    /**
     * 切割字符串。
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
