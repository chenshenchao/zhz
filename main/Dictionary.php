<?php namespace zhz;

/**
 * 字典
 * 
 */
class Dictionary {
    private const KEY = 'zh';
    private const TAG = 'z';

    private $all;

    /**
     * 构造子。
     * 
     */
    public function __construct() {
        $this->all = [];
    }

    /**
     * 录入词素。
     * 
     * @param $lexeme 词素。
     */
    public function enter($lexeme) {
        $count = preg_match_all('/\w/u', $word, $matches);
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
     */
    public function refer($segmentions, $index) {
        $result = [];
        $lexeme = [];
        $arrow = &$this->all;
        $word = $segmentions[$index];
        while (key_exists($word, $arrow)) {
            $lexeme[] = $word;
            if (isset($arrow[$word][self::KEY])) {
                $result[$index] = join($lexeme);
            }
            $word = $segmention[++$index];
        }
        return $result;
    }

    /**
     * 查找最短词素。
     * 
     */
    public function peek($segmentions, $index) {
        $lexeme = [];
        $arrow = &$this->all;
        $word = $segmentions[$index];
        while (key_exists($word, $arrow)) {
            $lexeme[] = $word;
            if (isset($arrow[$word][self::KEY])) {
                return join($lexeme);
            }
            $word = $segmention[++$index];
        }
        return null;
    }

    /**
     * 读取指定文件。
     * 
     * @param string $path 读取路径。
     */
    public function load($path) {
        $raw = file_get_contents($path);
        $this->all = unserialize($raw);
    }

    /**
     * 保存到指定路径。
     * 
     * @param string $path 保存路径。
     */
    public function save($path) {
        $raw = serialize($this->all);
        file_put_contents($path, $raw);
    }
}