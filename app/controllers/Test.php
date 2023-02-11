<?php
class Test extends controller
{
  public function index()
  {

    // Mengconnect ke server FTP
    $conn = ftp_connect('helmiar527.ip-dynamic.net');

    // Login ke server FTP menggunakan nama pengguna dan kata sandi
    $login = ftp_login($conn, 'www', 'www');

    // Cek jika koneksi dan login berhasil
    if ((!$conn) || (!$login)) {
      echo "Koneksi atau login ke server FTP gagal.";
      die;
    } else {
      echo "Koneksi dan login ke server FTP berhasil.";
    }

    // Mendapatkan isi folder
    $contents = ftp_nlist($conn, '.');

    // Tampilkan isi folder
    foreach ($contents as $file) {
      echo $file . "<br />";
    }
  }
}
