<?php

class CatatanKeuanganPemasukkanModel
{
    private $table = 'catatanPemasukkan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function insertPemasukkan($data)
    {
        $query = "INSERT INTO " . $this->table . " (id, hari, tanggal, pemasukkan, nominal, status, username) VALUES(NULL, :hari, :tanggal, :pemasukkan, :nominal, :status, :username)";
        $this->db->query($query);
        $this->db->bind('hari', $data['hari']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('pemasukkan', $data['pemasukkan']);
        $this->db->bind('nominal', $data['nominal']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('username', $data['username']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deletePemasukkan($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllPemasukkan($data)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('username', $data['unameUser']);
        return $this->db->resultSet();
    }
}
