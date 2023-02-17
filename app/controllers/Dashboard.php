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
    $this->view('hcb/index/dashboard/utility/css/css');
    $this->view('hcb/center');
    $this->view('hcb/index/dashboard/body/bodyopen');
    $this->view('index/dashboard/navfood/nav', $data);
    $this->view('hcb/index/dashboard/body/bodyopen1');
    $this->view('index/dashboard/navfood/nav1', $data);
    $this->view('hcb/index/dashboard/body/bodyopen2');
    $this->view('hcb/index/dashboard/body/bodyopen3');
    $this->view('index/dashboard/index');
    $this->view('index/dashboard/navfood/footer', $data);
    $this->view('hcb/index/dashboard/body/bodyclose3');
    $this->view('hcb/index/dashboard/body/bodyclose2');
    $this->view('hcb/index/dashboard/body/bodyclose1');
    $this->view('hcb/index/dashboard/body/bodyclose');
    $this->view('hcb/index/dashboard/utility/js/js');
    $this->view('index/all/coming');
    $this->view('hcb/body');
  }

  public function settings()
  {
    $data = $this->process('DashboardProcess')->settings();
    $this->view('hcb/head', $data);
    $this->view('hcb/index/dashboard/utility/css/css');
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
    $this->view('hcb/index/dashboard/utility/js/js');
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

  public function deleteFotoProfil()
  {
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

  public function profilUpdate()
  {
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

  public function calculator()
  {
  }
}
