<?php

namespace zhz;

use PHPUnit\Framework\TestCase;
use zhz\data\Storage;

class StorageTest extends TestCase
{
    /**
     * 
     */
    public function testAdd()
    {
        $title = bin2hex(random_bytes(16));
        $body = bin2hex(random_bytes(256));
        $db = new Storage('test.db');
        $id = $db->addDocument($title, $body);
        $document = $db->getDocument($id);
        $this->assertEquals($document['title'], $title);
        $this->assertEquals($document['body'], $body);
    }
}
