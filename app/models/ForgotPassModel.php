<?php

class ForgotPassModel
{
  private $table = 'forgotPassword';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function cekStatus($data)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
    $this->db->query($query);
    $this->db->bind('email', $data['email']);
    return $this->db->single();
  }

  public function addCode($data)
  {
    $null = '';
    $query = "INSERT INTO " . $this->table . " (id, date, day, email, code,
    status, tryOne, tryTwo) VALUES(NULL, :date, :day, :email, :code, :status, :tryOne, :tryTwo)";
    $this->db->query($query);
    $this->db->bind('date', $data['date']);
    $this->db->bind('day', $data['day']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('code', $data['code']);
    $this->db->bind('status', $data['status']);
    $this->db->bind('tryOne', $null);
    $this->db->bind('tryTwo', $null);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function addTry($data)
  {
    $null = '';
    $query = "INSERT INTO " . $this->table . " (id, date, day, email, code, status, tryOne, tryTwo) VALUES(NULL, :date, :day, :email, :code, :status, :tryOne, :tryTwo)";
    $this->db->query($query);
    $this->db->bind('date', $null);
    $this->db->bind('day', $data['day1']);
    $this->db->bind('email', $data['email1']);
    $this->db->bind('code', $data['code1']);
    $this->db->bind('status', $data['status1']);
    $this->db->bind('tryOne', $data['tryOne']);
    $this->db->bind('tryTwo', $null);
    $this->db->execute();
    return $this->db->rowCount();
  }
}
