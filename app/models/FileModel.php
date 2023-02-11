<?php

class FileModel
{
    private $table1 = 'accUser';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
}
