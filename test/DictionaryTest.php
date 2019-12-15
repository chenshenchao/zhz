<?php

namespace zhz;

use PHPUnit\Framework\TestCase;

/**
 * 字典测试
 * 
 */
class DictionaryTest extends TestCase
{
    /**
     * 测试字典录入。
     * 
     */
    public function testEnter()
    {
        $dictionary = new Dictionary;
        $dictionary->enter('中文');
        $dictionary->enter('分词');
        $dictionary->enter('中文分词');
        preg_match_all('/\w/u', 'zhz中文分词', $matches);
        $this->assertCount(2, $dictionary->refer($matches[0], 3));
        $this->assertCount(1, $dictionary->refer($matches[0], 5));
    }
}
