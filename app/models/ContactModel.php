<?php

class ContactModel
{
  private $table = 'contact';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function insertContact($data)
  {
    $query = "INSERT INTO " . $this->table . " (id, time, date, name, email, message, device) VALUES(NULL, :time, :date, :name, :email, :message, :device)";
    $this->db->query($query);
    $this->db->bind('time', $data['time']);
    $this->db->bind('date', $data['date']);
    $this->db->bind('name', $data['name']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('message', $data['message']);
    $this->db->bind('device', $data['device']);
    $this->db->execute();
    return $this->db->rowCount();
  }
}
