<?php

class AccModel
{
  private $table = 'accUser';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function cekAcc($data)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE username = :username OR email = :email";
    $this->db->query($query);
    $this->db->bind('username', $data['username']);
    $this->db->bind('email', $data['email']);
    return $this->db->single();
  }

  public function updateAcc($data)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE username = :username OR email = :email";
    $this->db->query($query);
    $this->db->bind('username', $data['username']);
    $this->db->bind('email', $data['email']);
    return $this->db->single();
  }

  public function cekAccLog($data)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE username = :username OR email = :email";
    $this->db->query($query);
    $this->db->bind('username', $data['username']);
    $this->db->bind('email', $data['username']);
    return $this->db->single();
  }

  public function addAccUser($data)
  {
    $query = "INSERT INTO " . $this->table . " (id, name, username, email, number, password, role, fileName, fileSize, emailVery, changeEmail, numberVery) VALUES(NULL, :name, :username, :email, :number, :password, :role, :filen, :files, :change, :change, :change)";
    $pass = password_hash($data['password'] . SALTPASS, PASSWORD_DEFAULT);
    $this->db->query($query);
    $this->db->bind('name', $data['name']);
    $this->db->bind('username', $data['username']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('number', $data['file']);
    $this->db->bind('password', $pass);
    $this->db->bind('role', $data['role']);
    $this->db->bind('filen', $data['file']);
    $this->db->bind('files', $data['file']);
    $this->db->bind('change', $data['isChange']);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function addProfileUser($data)
  {
    $query = "UPDATE " . $this->table . " SET fileName = :filen, fileSize = :files WHERE unameUser = :uname";
    $this->db->query($query);
    $this->db->bind('filen', $data['fileName']);
    $this->db->bind('files', $data['fileSize']);
    $this->db->bind('uname', $data['uname']);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function updateAccUser($data)
  {
    $query = "UPDATE " . $this->table . " SET nameUser = :name, emailUser = :email, numberUser = :number, changeEmailUser = :changeEmail WHERE unameUser = :uname";
    $this->db->query($query);
    $this->db->bind('name', $data['name']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('number', $data['number']);
    $this->db->bind('changeEmail', $data['changeEmail']);
    $this->db->bind('uname', $data['unameUser']);
    $this->db->execute();
    return $this->db->rowCount();
  }
}
