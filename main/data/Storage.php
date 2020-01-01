<?php

namespace zhz\data;

use SQLite3;

/**
 * 
 */
class Storage extends SQLite3
{
    private $path;

    /**
     * 
     */
    function __construct($path)
    {
        if (!is_file($path)) {
            $this->open($path);
            $this->exec(<<<SQL
            CREATE TABLE document(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT NOT NULL,
                body TEXT NOT NULL
            );
            SQL);
            $this->close();
        }
        $this->path = $path;
    }

    /**
     * 
     */
    public function addDocument($title, $body)
    {
        $this->open($this->path);
        $this->exec(<<<SQL
        INSERT INTO document
            (title, body)
        VALUES
            ('$title', '$body');
        SQL);
        $result = $this->query(<<<SQL
        SELECT LAST_INSERT_ROWID() AS id FROM document;
        SQL);
        return $result->fetchArray(SQLITE3_ASSOC)['id'];
    }

    /**
     * 
     */
    public function getDocument($id)
    {
        $result = $this->query(<<<SQL
        SELECT * FROM document
        WHERE id=$id;
        SQL);
        return $result->fetchArray(SQLITE3_ASSOC);
    }
}
