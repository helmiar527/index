<?php

class IndexProcess extends Controller
{
  public function index()
  {
    $data['nameProfile'] = 'Helmi Ainur Rofiq';
    $data['title'] = 'Welcome Admin ' . $data['nameProfile'];
    $data['body'] = 'hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
    $data['index'] = 'Dashboard';
    $data['imgProfile'] = 'https://helmiar527.my.id/dev/index/admin/public/admin/assets/dist/img/user1-128x128.jpg';
    return $data;
  }

  public function newFitur()
  {
    $data['title'] = 'New Fitur Announcement';
    $data['body'] = 'hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
    $data['index'] = 'New Fitur';
    $data['imgProfile'] = 'https://helmiar527.my.id/dev/index/admin/public/admin/assets/dist/img/user1-128x128.jpg';
    $data['nameProfile'] = 'Helmi Ainur Rofiq';
    return $data;
  }
}
