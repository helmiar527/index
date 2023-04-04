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
        $query = "INSERT INTO " . $this->table . " (id, nameCookie, cookie, device, username) VALUES(NULL, :nameCookie, :cookie, :device, :username)";
        $this->db->query($query);
        $this->db->bind('nameCookie', $data['nameCookie']);
        $this->db->bind('cookie', $data['cookie']);
        $this->db->bind('device', $data['device']);
        $this->db->bind('username', $data['username']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delCookie($data)
    {
        $query = "DELETE FROM " . $this->table . " WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cekCookie($data)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE device = :device";
        $this->db->query($query);
        $this->db->bind('device', $data['device']);
        return $this->db->single();
    }
}
