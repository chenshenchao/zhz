<?php

namespace zhz;

/**
 * 分词器
 * 
 */
class Segmenter
{
    private $dictionary;

    /**
     * 构造子。
     * 
     * @param $dictionary 字典
     */
    public function __construct($dictionary)
    {
        $this->dictionary = $dictionary;
    }

    /**
     * 分词。
     * 
     * @param $text 文本
     */
    public function segment($text)
    {
        $result = [];
        $index = 0;
        $count = preg_match_all('/\w/u', $text, $matches);
        $segmentions = $matches[0];
        $lexemes = $this->dictionary->refer($segmentions, $index);
        while ($index < $count) {
            if (empty($lexemes)) {
                $result[] = $segmentions[$index++];
                if ($index >= $count) {
                    return $result;
                }
                $lexemes = $this->dictionary->refer($segmentions, $index);
            } else {
                [$i, $buffer] = $this->quick($segmentions, $lexemes);
                if (isset($i)) {
                    $result[] = $lexemes[$i];
                    $lexemes = $buffer;
                    $index = $i + 1;
                } else {
                    $result[] = reset($lexemes);
                    $index = key($lexemes) + 1;
                    $lexemes = [];
                }
            }
        }
        return $result;
    }

    /**
     * 
     */
    public function quick($segmentions, $lexemes)
    {
        $count = count($segmentions);
        foreach ($lexemes as $i => $lexeme) {
            $index = $i + 1;
            if ($index >= $count) {
                break;
            }
            $result = $this->dictionary->refer($segmentions, $index);
            if (!empty($result)) {
                return [$i, $result];
            }
        }
        return [null, []];
    }
}
