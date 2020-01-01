<?php

namespace zhz\data;

/**
 * 
 */
class IndexHash
{
    /**
     * 
     */
    private $tokenId; // 词元编号
    private $postingList; // 倒排列表
    private $documentCount; // 出现词元的文档数
    private $positionCount; // 出现词元的位置数
    private $hashs; // 倒排列表关联索引
}
