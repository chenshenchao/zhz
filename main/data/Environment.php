<?php

namespace zhz\data;

/**
 * 
 */
class Environment
{
    private $db;
    private $buffers;
    private $threshold;

    /**
     * 
     */
    public function __construct()
    {
        $this->db = new Storage('zhz.db');
        $this->buffers = [];
        $this->threshold = 100;
    }

    /**
     * 
     */
    public function addDocument($title, $body)
    {
        $id = $this->db->addDocument($title, $body);
        $this->textToPostingList($id, $body);
        if (count($this->buffers) >= $this->threshold) {
            foreach ($this->buffers as $buffer) {
                $this->updatePosting($buffer);
            }
            $this->buffers = [];
        }
    }

    /**
     * 
     */
    public function textToPostingList($documentId, $body)
    {
        
    }

    public function updatePosting($buffer) {

    }
}
