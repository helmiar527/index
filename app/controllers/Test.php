<?php

class Test extends controller {
    public function index() {
        // $cookie = md5(SALT);
        // setcookie("nama", "coba", time() + (86400 * 7));
        // var_dump(SALT);
        header("Refresh: 1");
        echo($_COOKIE['nama']);
        echo($_COOKIE['login']);
    }
    public function a() {
        $cookie = md5(SALT);
        setcookie("nama", "coba", time() + (86400 * 7));
        setcookie("login", $cookie, time() + (86400 * 7));
        // var_dump(SALT);
    }
}