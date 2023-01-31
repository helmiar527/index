<?php

class Flasher {
  public static function setFlash($tipe, $awal, $aksi, $pesan) {
    $_SESSION['flash'] = [
      'tipe' => $tipe,
      'awal' => $awal,
      'aksi' => $aksi,
      'pesan' => $pesan
    ];
  }

  public static function flash() {
    if (isset($_SESSION['flash'])) {
      echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">' . $_SESSION['flash']['awal'] .'<strong>' . $_SESSION['flash']['aksi'] . '</strong> ' . $_SESSION['flash']['pesan'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      unset($_SESSION['flash']);
    }
  }
}