<?php

namespace zhz;

use PHPUnit\Framework\TestCase;

/**
 * 分词器测试
 * 
 */
class TokenizerTest extends TestCase
{
    /**
     * 测试分词
     * 
     */
    public function testSegment()
    {
        $dictionary = new Dictionary;
        $dictionary->enter('中文');
        $dictionary->enter('分词');
        $dictionary->enter('中文分词');
        $dictionary->enter('单元');
        $dictionary->enter('测试');
        $dictionary->enter('单元测试');
        $tokenizer = new Tokenizer($dictionary);
        $result = $tokenizer->tokenize('zhz中文分词单元测试');
        $this->assertEquals($result, ['z', 'h', 'z', '中文', '分词', '单元', '测试']);
    }
}
