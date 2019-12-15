<?php

namespace zhz;

/**
 * 字典
 * 
 */
class Dictionary
{
    private const KEY = 'zhz-key'; // 表示终结的键
    private const TAG = 'zhz-tag'; // 表示终结的标

    private $all;

    /**
     * 构造子。
     * 
     */
    public function __construct()
    {
        $this->all = [];
    }

    /**
     * 录入词素。
     * 
     * @param $lexeme 词素。
     */
    public function enter($lexeme)
    {
        preg_match_all('/\w/u', $lexeme, $matches);
        $arrow = &$this->all;
        foreach ($matches[0] as $word) {
            if (!key_exists($word, $arrow)) {
                $arrow[$word] = [];
            }
            $arrow = &$arrow[$word];
        }
        $arrow[self::KEY] = self::TAG;
    }

    /**
     * 查找词素。
     * 
     * @param $segmentions 字符数组。
     * @param $index 指定字符串开始位置。
     * @return 可能的词素集。
     */
    public function refer($segmentions, $index)
    {
        $result = [];
        $lexeme = [];
        $arrow = &$this->all;
        $word = $segmentions[$index];
        while (key_exists($word, $arrow)) {
            $lexeme[] = $word;
            if (isset($arrow[$word][self::KEY])) {
                $result[$index] = join($lexeme);
            }
            $arrow = &$arrow[$word];
            $word = $segmentions[++$index] ?? null;
        }
        return $result;
    }

    /**
     * 读取指定文件。
     * 
     * @param string $path 读取路径。
     */
    public function load($path)
    {
        $raw = file_get_contents($path);
        $this->all = unserialize($raw);
    }

    /**
     * 保存到指定路径。
     * 
     * @param string $path 保存路径。
     */
    public function save($path)
    {
        $raw = serialize($this->all);
        file_put_contents($path, $raw);
    }
}
