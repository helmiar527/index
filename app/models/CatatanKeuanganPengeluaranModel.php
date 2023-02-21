<?php

class CatatanKeuanganPengeluaranModel
{
    private $table = 'catatanPengeluaran';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengeluaran($data)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('username', $data['unameUser']);
        return $this->db->resultSet();
    }

    public function insertPengeluaran($data)
    {
        $query = "INSERT INTO " . $this->table . " (id, hari, tanggal, pengeluaran, jumlah, nominal, status, username) VALUES(NULL, :hari, :tanggal, :pengeluaran, :jumlah, :nominal, :status, :username)";
        $this->db->query($query);
        $this->db->bind('hari', $data['hari']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('pengeluaran', $data['pengeluaran']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('nominal', $data['nominal']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('username', $data['username']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deletePengeluaran($data)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id AND username = :username";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('username', $data['username']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
