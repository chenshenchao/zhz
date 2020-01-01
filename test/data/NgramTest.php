<?php

namespace zhz\data;

use PHPUnit\Framework\TestCase;

/**
 * 
 */
class NgramTest extends TestCase
{
    /**
     * 
     */
    public function testSplit()
    {
        $text = '词素切割12343asdfds中文词素';
        $ngram = new Ngram(3);
        $words = $ngram->split($text);
        $this->assertEquals(end($words), '文词素');
    }
}
