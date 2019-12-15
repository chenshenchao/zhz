<?php

namespace zhz;

/**
 * 存储类
 * 
 */
class Archive
{
    private $folder;

    /**
     * 构造子。
     * 
     * @param $folder 档案文件夹
     */
    public function __construct($folder)
    {
        $this->folder = $folder;
    }

    /**
     * 查询
     * 
     * @param $condition 条件
     */
    public function query($condition)
    { }
}
