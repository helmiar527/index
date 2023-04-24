<?php

class Dashboard extends controller
{
  public function __construct()
  {
    if (!isset($_SESSION['status']) || $_SESSION['status'] !== "logged") {
      Flasher::setFlash('danger', 'Sesi login ', 'Tidak dapat ditemukan! ', 'Silahkan login.');
      header('Location: ' . BASEURL . '/login');
      exit;
    }
  }

  public function index()
  {
    $data = $this->process('DashboardProcess')->index();
    $this->view('hcb/head', $data);
    $this->view('hcb/index/dashboard/utility/css/cssindex');
    $this->view('hcb/center');
    $this->view('hcb/index/dashboard/body/bodyopen');
    $this->view('index/dashboard/navfood/nav', $data);
    $this->view('hcb/index/dashboard/body/bodyopen1');
    $this->view('index/dashboard/navfood/nav1', $data);
    $this->view('hcb/index/dashboard/body/bodyopen2');
    $this->view('hcb/index/dashboard/body/bodyopen3');
    $this->view('index/dashboard/index', $data);
    $this->view('index/dashboard/navfood/footer', $data);
    $this->view('hcb/index/dashboard/body/bodyclose3');
    $this->view('hcb/index/dashboard/body/bodyclose2');
    $this->view('hcb/index/dashboard/body/bodyclose1');
    $this->view('hcb/index/dashboard/body/bodyclose');
    $this->view('hcb/index/dashboard/utility/js/jsindex');
    $this->view('index/all/coming');
    $this->view('hcb/body');
    // var_dump($data['persentase1a']);
    // echo (date('m-Y'));
  }

  public function catatanPemasukkan()
  {
    $data = $this->process('DashboardProcess')->catatanPemasukkan();
    $this->view('hcb/head', $data);
    $this->view('hcb/index/dashboard/utility/css/cssmkeuangan');
    $this->view('hcb/center');
    $this->view('hcb/index/dashboard/body/bodyopen');
    $this->view('index/dashboard/navfood/nav', $data);
    $this->view('hcb/index/dashboard/body/bodyopen1');
    $this->view('index/dashboard/navfood/nav1', $data);
    $this->view('hcb/index/dashboard/body/bodyopen2');
    $this->view('hcb/index/dashboard/body/bodyopen3');
    $this->view('index/dashboard/catatanPemasukkan', $data);
    $this->view('index/dashboard/navfood/footer', $data);
    $this->view('hcb/index/dashboard/body/bodyclose3');
    $this->view('hcb/index/dashboard/body/bodyclose2');
    $this->view('hcb/index/dashboard/body/bodyclose1');
    $this->view('hcb/index/dashboard/body/bodyclose');
    $this->view('hcb/index/dashboard/utility/js/jsmkeuangan');
    $this->view('index/all/coming');
    $this->view('hcb/body');
  }

  public function tambahPemasukkan()
  {
    $_POST['username'] = $_SESSION['username'];
    if ($this->model('CatatanKeuanganPemasukkanModel')->insertPemasukkan($_POST) > 0) {
      Flasher::setFlash('success', 'Pemasukkan ' . $_POST['pemasukkan'], ' Berhasil ditambahkan! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanPemasukkan');
      exit;
    } else {
      Flasher::setFlash('danger', 'Pemasukkan ' . $_POST['pemasukkan'], ' Gagal ditambahkan! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanPemasukkan');
      exit;
    }
  }

  public function ubahPemasukkan()
  {
    $_POST['username'] = $_SESSION['username'];
    if ($this->model('CatatanKeuanganPemasukkanModel')->changePemasukkan($_POST) > 0) {
      Flasher::setFlash('success', 'Pemasukkan ' . $_POST['pemasukkan'], ' Berhasil diubah! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanPemasukkan');
      exit;
    } else {
      Flasher::setFlash('danger', 'Pemasukkan ' . $_POST['pemasukkan'], ' Gagal diubah! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanPemasukkan');
      exit;
    }
  }

  public function deletePemasukkan($id = '', $pemasukkan = '')
  {
    $data['id'] = $id;
    $data['username'] = $_SESSION['username'];
    if ($this->model('CatatanKeuanganPemasukkanModel')->deletePemasukkan($data) > 0) {
      Flasher::setFlash('success', 'Pemasukkan ' . $pemasukkan, ' Berhasil dihapus! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanPemasukkan');
      exit;
    } else {
      Flasher::setFlash('danger', 'Pemasukkan ' . $pemasukkan, ' Gagal dihapus! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanPemasukkan');
      exit;
    }
  }

  public function catatanPengeluaran()
  {
    $data = $this->process('DashboardProcess')->catatanPengeluaran();
    $this->view('hcb/head', $data);
    $this->view('hcb/index/dashboard/utility/css/cssmkeuangan');
    $this->view('hcb/center');
    $this->view('hcb/index/dashboard/body/bodyopen');
    $this->view('index/dashboard/navfood/nav', $data);
    $this->view('hcb/index/dashboard/body/bodyopen1');
    $this->view('index/dashboard/navfood/nav1', $data);
    $this->view('hcb/index/dashboard/body/bodyopen2');
    $this->view('hcb/index/dashboard/body/bodyopen3');
    $this->view('index/dashboard/catatanPengeluaran', $data);
    $this->view('index/dashboard/navfood/footer', $data);
    $this->view('hcb/index/dashboard/body/bodyclose3');
    $this->view('hcb/index/dashboard/body/bodyclose2');
    $this->view('hcb/index/dashboard/body/bodyclose1');
    $this->view('hcb/index/dashboard/body/bodyclose');
    $this->view('hcb/index/dashboard/utility/js/jsmkeuangan');
    $this->view('index/all/coming');
    $this->view('hcb/body');
  }

  public function tambahPengeluaran()
  {
    $_POST['username'] = $_SESSION['username'];
    if ($this->model('CatatanKeuanganPengeluaranModel')->insertPengeluaran($_POST) > 0) {
      Flasher::setFlash('success', 'Pengeluaran ' . $_POST['pengeluaran'], ' Berhasil ditambahkan! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanPengeluaran');
      exit;
    } else {
      Flasher::setFlash('danger', 'Pengeluaran ' . $_POST['pengeluaran'], ' Gagal ditambahkan! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanPengeluaran');
      exit;
    }
  }

  public function ubahPengeluaran()
  {
    $_POST['username'] = $_SESSION['username'];
    if ($this->model('CatatanKeuanganPengeluaranModel')->changePengeluaran($_POST) > 0) {
      Flasher::setFlash('success', 'Pengeluaran ' . $_POST['pengeluaran'], ' Berhasil diubah! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanPengeluaran');
      exit;
    } else {
      Flasher::setFlash('danger', 'Pengeluaran ' . $_POST['pengeluaran'], ' Gagal diubah! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanPengeluaran');
      exit;
    }
  }

  public function deletePengeluaran($id = '', $pemasukkan = '')
  {
    $data['id'] = $id;
    $data['username'] = $_SESSION['username'];
    if ($this->model('CatatanKeuanganPengeluaranModel')->deletePengeluaran($data) > 0) {
      Flasher::setFlash('success', 'Pengeluaran ' . $pemasukkan, ' Berhasil dihapus! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanPengeluaran');
      exit;
    } else {
      Flasher::setFlash('danger', 'Pengeluaran ' . $pemasukkan, ' Gagal dihapus! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanPengeluaran');
      exit;
    }
  }

  public function catatanTabungan()
  {
    $data = $this->process('DashboardProcess')->catatanTabungan();
    $this->view('hcb/head', $data);
    $this->view('hcb/index/dashboard/utility/css/cssmkeuangan');
    $this->view('hcb/center');
    $this->view('hcb/index/dashboard/body/bodyopen');
    $this->view('index/dashboard/navfood/nav', $data);
    $this->view('hcb/index/dashboard/body/bodyopen1');
    $this->view('index/dashboard/navfood/nav1', $data);
    $this->view('hcb/index/dashboard/body/bodyopen2');
    $this->view('hcb/index/dashboard/body/bodyopen3');
    $this->view('index/dashboard/catatanTabungan', $data);
    $this->view('index/dashboard/navfood/footer', $data);
    $this->view('hcb/index/dashboard/body/bodyclose3');
    $this->view('hcb/index/dashboard/body/bodyclose2');
    $this->view('hcb/index/dashboard/body/bodyclose1');
    $this->view('hcb/index/dashboard/body/bodyclose');
    $this->view('hcb/index/dashboard/utility/js/jsmkeuangan');
    $this->view('index/all/coming');
    $this->view('hcb/body');
  }

  public function tambahTabungan()
  {
    $_POST['username'] = $_SESSION['username'];
    if ($this->model('CatatanKeuanganTabunganModel')->insertTabungan($_POST) > 0) {
      Flasher::setFlash('success', 'Tabungan ' . $_POST['tabungan'], ' Berhasil ditambahkan! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanTabungan');
      exit;
    } else {
      Flasher::setFlash('danger', 'Tabungan ' . $_POST['tabungan'], ' Gagal ditambahkan! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanTabungan');
      exit;
    }
  }

  public function ubahTabungan()
  {
    $_POST['username'] = $_SESSION['username'];
    if ($this->model('CatatanKeuanganTabunganModel')->changeTabungan($_POST) > 0) {
      Flasher::setFlash('success', 'Tabungan ' . $_POST['tabungan'], ' Berhasil diubah! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanTabungan');
      exit;
    } else {
      Flasher::setFlash('danger', 'Tabungan ' . $_POST['tabungan'], ' Gagal diubah! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanTabungan');
      exit;
    }
  }

  public function deleteTabungan($id = '', $tabungan = '')
  {
    $data['id'] = $id;
    $data['username'] = $_SESSION['username'];
    if ($this->model('CatatanKeuanganTabunganModel')->deleteTabungan($data) > 0) {
      Flasher::setFlash('success', 'Tabungan ' . $tabungan, ' Berhasil dihapus! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanTabungan');
      exit;
    } else {
      Flasher::setFlash('danger', 'Tabungan ' . $tabungan, ' Gagal dihapus! ', '.');
      header('Location: ' . BASEURL . '/dashboard/catatanTabungan');
      exit;
    }
  }

  public function settings()
  {
    $data = $this->process('DashboardProcess')->settings();
    $this->view('hcb/head', $data);
    $this->view('hcb/index/dashboard/utility/css/csssettings');
    $this->view('hcb/center');
    $this->view('hcb/index/dashboard/body/bodyopen');
    $this->view('index/dashboard/navfood/navSetting', $data);
    $this->view('hcb/index/dashboard/body/bodyopen1');
    $this->view('index/dashboard/navfood/nav1', $data);
    $this->view('hcb/index/dashboard/body/bodyopen2');
    $this->view('hcb/index/dashboard/body/bodyopen3');
    $this->view('index/dashboard/setting', $data);
    $this->view('index/dashboard/navfood/footer', $data);
    $this->view('hcb/index/dashboard/body/bodyclose3');
    $this->view('hcb/index/dashboard/body/bodyclose2');
    $this->view('hcb/index/dashboard/body/bodyclose1');
    $this->view('hcb/index/dashboard/body/bodyclose');
    $this->view('hcb/index/dashboard/utility/js/jssettings');
    $this->view('index/all/coming');
    $this->view('hcb/body');
  }

  public function pictureProfilUpdate()
  {
    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_type = $file['type'];
    $allowed_types = [
      'image/jpeg',
      'image/png'
    ];
    $fileName = str_replace(' ', '', $file_name);
    $_POST['uname'] = $_SESSION['username'];
    $_POST['fileName'] = $_SESSION['username'] . '-' . $fileName;
    $_POST['fileSize'] = $file_size;

    if (in_array($file_type, $allowed_types)) {
      $file_destination = ROOT . '/datasource/profile/' . $_SESSION['username'] . '-' . $fileName;
      if ($file_size > 2097152) {
        Flasher::setFlash('warning', 'Foto profil ', 'Tidak boleh lebih dari 2 MB', '.');
        header('Location: ' . BASEURL . '/dashboard/settings');
        exit;
      } else {
        if (file_exists($file_destination)) {
          unlink($file_destination);
          if ($this->model('AccModel')->addProfileUser($_POST) > 0) {
            move_uploaded_file($file_tmp, $file_destination);
            Flasher::setFlash('success', 'Foto profil ', 'Berhasil diubah! ', '.');
            header('Location: ' . BASEURL . '/dashboard/settings');
            exit;
          } else {
            Flasher::setFlash('danger', 'Foto profil ', 'Gagal diubah! ', 'Pastikan nama dari file yang di upload berbeda.');
            header('Location: ' . BASEURL . '/dashboard/settings');
            exit;
          }
        } else {
          if ($this->model('AccModel')->addProfileUser($_POST) > 0) {
            move_uploaded_file($file_tmp, $file_destination);
            Flasher::setFlash('success', 'Foto profil ', 'Berhasil diubah! ', '.');
            header('Location: ' . BASEURL . '/dashboard/settings');
            exit;
          } else {
            Flasher::setFlash('danger', 'Foto profil ', 'Gagal diubah! ', 'Pastikan nama dari file yang di upload berbeda.');
            header('Location: ' . BASEURL . '/dashboard/settings');
            exit;
          }
        }
      }
    } else {
      Flasher::setFlash('danger', 'Foto profil ', 'Gagal diupload! ', 'Pastikan foto profil berextensi JPG/PNG.');
      header('Location: ' . BASEURL . '/dashboard/settings');
      exit;
    }
  }

  public function deleteFotoProfil()
  {
    $row = $this->model('AccModel')->updateAcc($_SESSION);
    $_POST['uname'] = $_SESSION['username'];
    $_POST['fileName'] = '';
    $_POST['fileSize'] = '';

    $cek = ROOT . '/datasource/profile/' . $row['fileName'];
    if ($this->model('AccModel')->addProfileUser($_POST) > 0) {
      unlink($cek);
      Flasher::setFlash('success', 'Profil ', 'Berhasil dihapus! ', '.');
      header('Location: ' . BASEURL . '/dashboard/settings');
      exit;
    } else {
      Flasher::setFlash('danger', 'Profil ', 'Gagal dihapus! ', '.');
      header('Location: ' . BASEURL . '/dashboard/settings');
      exit;
    }
  }

  public function profilUpdate()
  {
    $row = $this->model('AccModel')->updateAcc($_SESSION);
    $_POST['username'] = $_SESSION['username'];
    if ($row['changeEmailUser'] == 1) {
      $_POST['email'] = $row['emailUser'];
      $_POST['changeEmail'] = $row['changeEmailUser'];
      if ($this->model('AccModel')->updateAccUser($_POST) > 0) {
        Flasher::setFlash('success', 'Profil ', 'Berhasil diubah! ', '.');
        header('Location: ' . BASEURL . '/dashboard/settings');
        exit;
      } else {
        Flasher::setFlash('warning', 'Profil ', 'Gagal diubah! ', 'Tidak ada perubahan di profil.');
        header('Location: ' . BASEURL . '/dashboard/settings');
        exit;
      }
    } else {
      if ($_POST['email'] == $row['emailUser']) {
        $_POST['changeEmail'] = $row['changeEmailUser'];
        if ($this->model('AccModel')->updateAccUser($_POST) > 0) {
          Flasher::setFlash('success', 'Profil ', 'Berhasil diubah! ', '.');
          header('Location: ' . BASEURL . '/dashboard/settings');
          exit;
        } else {
          Flasher::setFlash('warning', 'Profil ', 'Gagal diubah! ', 'Tidak ada perubahan di profil.');
          header('Location: ' . BASEURL . '/dashboard/settings');
          exit;
        }
      } else {
        $_POST['changeEmail'] = '1';
        if ($this->model('AccModel')->updateAccUser($_POST) > 0) {
          Flasher::setFlash('success', 'Profil ', 'Berhasil diubah! ', '.');
          header('Location: ' . BASEURL . '/dashboard/settings');
          exit;
        } else {
          Flasher::setFlash('warning', 'Profil ', 'Gagal diubah! ', 'Tidak ada perubahan di profil.');
          header('Location: ' . BASEURL . '/dashboard/settings');
          exit;
        }
      }
    }
  }

  public function calculator()
  {
  }
}
