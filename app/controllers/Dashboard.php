<?php

class Dashboard extends controller
{
  public function __construct() {
    if (!isset($_SESSION['status']) || $_SESSION['status'] !== "logged") {
      Flasher::setFlash('danger', 'Sesi login ', 'Tidak dapat ditemukan! ', 'Silahkan login.');
      header('Location: ' . BASEURL . '/login');
      exit;
    }
  }

  public function index() {
    $row = $this->model('AccModel')->updateAcc($_SESSION);
    $data['title'] = 'Dashboard';
    $data['years1'] = '2022';
    $data['years'] = date('Y');
    $data['nama'] = $row['nameUser'];
    $data['username'] = $row['unameUser'];
    $data['email'] = $row['emailUser'];
    $data['rank'] = $row['roleUser'];

    if ($row['fileName'] == NULL) {
      $data['profile'] = ROOTURL . '/datasource/profile/no-profile.png';
    } else {
      $data['profile'] = ROOTURL . '/datasource/profile/' . $row['fileName'];
    }

    $this->view('headcenterbody/head', $data);
    $this->view('headcenterbody/utility/css/index/dashboard/css');
    $this->view('headcenterbody/center');
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyopen');
    $this->view('index/dashboard/navfood/nav', $data);
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyopen1');
    $this->view('index/dashboard/navfood/nav1', $data);
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyopen2');
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyopen3');
    // $this->view('index/dashboard/index');
    $this->view('index/dashboard/navfood/footer', $data);
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyclose3');
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyclose2');
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyclose1');
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyclose');
    //$this->view('headcenterbody/utility/js/index/dashboard/js');
    //$this->view('index/all/coming');
    $this->view('headcenterbody/body');
  }

  public function settings() {
    $row = $this->model('AccModel')->updateAcc($_SESSION);
    $data['title'] = 'Setting';
    $data['years1'] = '2022';
    $data['years'] = date('Y');
    $data['nama'] = $row['nameUser'];
    $data['username'] = $row['unameUser'];
    $data['email'] = $row['emailUser'];
    $data['number'] = $row['numberUser'];
    $data['readonly'] = '';
    $data['readonly1'] = '';
    $data['role'] = $row['roleUser'];
    $data['telfone'] = '';

    if ($row['fileName'] == NULL) {
      $data['profile'] = ROOTURL . '/datasource/profile/no-profile.png';
    } else {
      $data['profile'] = ROOTURL . '/datasource/profile/' . $row['fileName'];
    }

    if ($row['emailVeryUser'] == 1) {
      $data['color'] = 'btn-success';
      $data['icon'] = '<i class="mdi mdi-check btn-icon-append"></i>';
    } else {
      $data['color'] = 'btn-warning';
      $data['icon'] = '';
    }

    if ($row['numberVeryUser'] == 1) {
      $data['color'] = 'btn-success';
      $data['icon'] = '<i class="mdi mdi-check btn-icon-append"></i>';
    } else {
      $data['color'] = 'btn-warning';
      $data['icon'] = '';
    }

    if ($row['changeEmailUser'] == 1) {
      $data['readonly'] = 'readonly';
      $data['readonly1'] = 'text-dark';
    }

    if ($row['fileName'] == !NULL) {
      $data['deletepro'] = '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProfilModal">Delete Foto Profile</button>';
    } else {
      $data['deletepro'] = '';
    }

    $this->view('headcenterbody/head', $data);
    $this->view('headcenterbody/utility/css/index/dashboard/css');
    $this->view('headcenterbody/center');
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyopen');
    $this->view('index/dashboard/navfood/navSetting', $data);
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyopen1');
    $this->view('index/dashboard/navfood/nav1', $data);
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyopen2');
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyopen3');
    $this->view('index/dashboard/setting', $data);
    $this->view('index/dashboard/navfood/footer', $data);
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyclose3');
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyclose2');
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyclose1');
    $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyclose');
    $this->view('headcenterbody/utility/js/index/dashboard/js');
    $this->view('index/all/coming');
    $this->view('headcenterbody/body');
  }

  public function pictureProfilUpdate() {
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
    $_POST['uname'] = $_SESSION['unameUser'];
    $_POST['fileName'] = $_SESSION['unameUser'] . '-' . $fileName;
    $_POST['fileSize'] = $file_size;

    if (in_array($file_type, $allowed_types)) {
      $file_destination = ROOT . '/datasource/profile/' . $_SESSION['unameUser'] . '-' . $fileName;
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

  public function deleteFotoProfil() {
    $row = $this->model('AccModel')->updateAcc($_SESSION);
    $_POST['uname'] = $_SESSION['unameUser'];
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

  public function profilUpdate() {
    $row = $this->model('AccModel')->updateAcc($_SESSION);
    $_POST['unameUser'] = $_SESSION['unameUser'];
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

  public function calculator() {}
}