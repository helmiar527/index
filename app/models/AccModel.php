<?php

class AccModel {
  private $table = 'accUser';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function cekAcc($data) {
    $query = "SELECT * FROM " . $this->table . " WHERE unameUser = :username OR emailUser = :email";
    $this->db->query($query);
    $this->db->bind('username', $data['uname']);
    $this->db->bind('email', $data['email']);
    return $this->db->single();
  }
  
  public function cekAccLog($data) {
    $query = "SELECT * FROM " . $this->table . " WHERE unameUser = :username OR emailUser = :email";
    $this->db->query($query);
    $this->db->bind('username', $data['uname1']);
    $this->db->bind('email', $data['uname2']);
    return $this->db->single();
  }
  
  public function addAccUser($data) {
    $query = "INSERT INTO " . $this->table . " (idAccUser, nameUser, unameUser, emailUser, passUser) VALUES(NULL, :name, :uname, :email, :pass)";
    $pass = password_hash($data['pass'], PASSWORD_DEFAULT);
    $this->db->query($query);
    $this->db->bind('name', $data['name']);
    $this->db->bind('uname', $data['uname']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('pass', $pass);
    $this->db->execute();
    return $this->db->rowCount();
  }
}