<?php

class IndexProcess
{
    public function index()
    {
        $data['title'] = 'Welcome To HELMIAR527';
        $data['years'] = date('Y');
        $data['years1'] = '2022';
        if (!isset($_SESSION['status']) || $_SESSION['status'] !== "logged") {
            if (isset($_COOKIE['user-login'])) {
                $data['navlog'] = '<li class="nav-item main-nav-7"><a class="nav-link" href="' . BASEURL . '/Login">Dashboard</a></li>';
            } else {
                $data['navlog'] = '<li class="nav-item dropdown main-nav-7"><a class="nav-link dropdown-toggle" href="#" id="hover" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sign Up</a><div class="dropdown-menu" aria-labelledby="navbarDropdown"><a class="dropdown-item" href="' . BASEURL . '/Register">Register</a><a class="dropdown-item" href="' . BASEURL . '/Login">Login</a></div></li>';
            }
        } else {
            $data['navlog'] = '<li class="nav-item main-nav-7"><a class="nav-link" href="' . BASEURL . '/Dashboard">Dashboard</a></li>';
        }
        return $data;
    }

    public function TermsAndConditions()
    {
        $data['title'] = 'Welcome To HELMIAR527';
        $data['years1'] = '2022';
        $data['years'] = date('Y');
        return $data;
    }
}
