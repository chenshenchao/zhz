<?php

namespace zhz\data;

use PHPUnit\Framework\TestCase;

/**
 * Ngram 单元测试
 * 
 */
class NgramTest extends TestCase
{
    /**
     * 测试切割。
     * 
     */
    public function testSplit()
    {
        $text = '词素切割12343asdfds中文词素';
        $ngram = new Ngram(3);
        $words = $ngram->split($text);
        $count = count($words);
        $this->assertEquals(mb_strlen($text, 'utf-8') - 2, $count);
        $this->assertEquals($words[$count - 2], '中文词');
        $this->assertEquals($words[$count - 1], '文词素');
    }
}
