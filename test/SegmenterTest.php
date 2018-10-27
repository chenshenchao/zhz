<?php namespace zhz;

use PHPUnit\Framework\TestCase;

/**
 * 
 */
class SegmenterTest extends TestCase {
    /**
     * 
     */
    public function testSegment() {
        $dictionary = new Dictionary;
        $dictionary->enter('中文');
        $dictionary->enter('分词');
        $dictionary->enter('中文分词');
        $segmenter = new Segmenter($dictionary);
        $result = $segmenter->segment('zhz中文分词');
        $this->assertEquals($result, ['z','h','z','中文','分词']);
    }
}