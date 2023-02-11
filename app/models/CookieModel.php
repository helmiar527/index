<?php

class CookieModel
{
    private $table = 'cookie';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addCookie($data)
    {
        $query = "INSERT INTO " . $this->table . " (idCookie, unameCookie, cookie) VALUES(NULL, :uname, :cookie)";
        $this->db->query($query);
        $this->db->bind('uname', $data['nameuser']);
        $this->db->bind('cookie', md5(SALT));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cekCookie($data)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE unameCookie = :username";
        $this->db->query($query);
        $this->db->bind('username', $data['nameuser']);
        return $this->db->single();
    }
}
