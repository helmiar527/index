<?php

class Dashboard extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['status']) || $_SESSION['status'] !== "logged") {
      Flasher::setFlash('danger', 'Sesi login ', 'Telah habis! ', 'Silahkan login.');
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
  }

  public function getBulanPemasukkan()
  {
    $_POST['username'] = 'admin';
    $_POST['status'] = '1';
    $array = $this->model('CatatanKeuanganPemasukkanModel')->getBulan($_POST);
    $bulan = array();
    $tahun = array();
    foreach ($array as $item) {
      $tanggal = $item["tanggal"];
      $bulan[] = date("F", strtotime($tanggal));
      $tahun[] = date("Y", strtotime($tanggal));
    }
    $jsonArray = json_encode($bulan);
    echo ($jsonArray);
  }

  public function getTahunPemasukkan()
  {
    $_POST['username'] = 'admin';
    $_POST['status'] = '1';
    $array = $this->model('CatatanKeuanganPemasukkanModel')->getBulan($_POST);
    $bulan = array();
    $tahun = array();
    foreach ($array as $item) {
      $tanggal = $item["tanggal"];
      $bulan[] = date("F", strtotime($tanggal));
      $tahun[] = date("Y", strtotime($tanggal));
    }
    $array_unique = array_unique($tahun);
    $jsonArray = json_encode($array_unique);
    echo ($jsonArray);
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
    $this->view('hcb/index/dashboard/utility/js/jsmkeuanganpemasukkan');
    $this->view('index/all/coming');
    $this->view('hcb/body');
  }

  public function getPemasukkan()
  {
    if ($_POST == !NULL) {
      if (empty($_POST['urutan'])) {
        http_response_code(400);
        $this->api(json_encode(array('The data you entered is incomplete'), JSON_PRETTY_PRINT));
        exit;
      } else {
        $data['username'] = $_SESSION['username'];
        switch ($_POST['urutan']) {
          case 'tglbaru':
            $data['urutan'] = "ORDER BY tanggal DESC";
            break;
          case 'tgllama':
            $data['urutan'] = "ORDER BY tanggal ASC";
            break;
          case 'scon':
            $data['urutan'] = "ORDER BY status DESC";
            break;
          case 'suncon':
            $data['urutan'] = "ORDER BY status ASC";
            break;
          default:
            $data['urutan'] = "ORDER BY tanggal DESC";
            break;
        }
        if (is_null($_POST['searching'])) {
          $data['searching'] = "";
        } else {
          $data['searching'] = $_POST['searching'];
        }
        $row = $this->model('CatatanKeuanganPemasukkanModel')->getAllPemasukkan($data);
        $json = json_encode($row);
        echo ($json);
      }
    } else {
      http_response_code(400);
      $this->api(json_encode(array('You not access this api'), JSON_PRETTY_PRINT));
      exit;
    }
  }

  public function tambahPemasukkan()
  {
    if ($_POST == !NULL) {
      $_POST['username'] = $_SESSION['username'];
      if (empty($_POST['tambahhari']) || empty($_POST['tambahtanggal']) || empty($_POST['tambahpemasukkan']) || empty($_POST['tambahnominal']) || empty($_POST['username'])) {
        http_response_code(400);
        $this->api(json_encode(array('The data you entered is incomplete'), JSON_PRETTY_PRINT));
        exit;
      } else {
        if (isset($_POST['tambahstatus']) && is_numeric($_POST['tambahstatus'])) {
          if ($this->model('CatatanKeuanganPemasukkanModel')->insertPemasukkan($_POST) > 0) {
            Flasher::setFlash('success', 'Pemasukkan ' . $_POST['tambahpemasukkan'], ' Berhasil ditambahkan! ', '.');
            http_response_code(200);
            Flasher::flash();
            exit;
          } else {
            Flasher::setFlash('danger', 'Pemasukkan ' . $_POST['tambahpemasukkan'], ' Gagal ditambahkan! ', '.');
            http_response_code(200);
            Flasher::flash();
            exit;
          }
        } else {
          http_response_code(400);
          $this->api(json_encode(array('The data you entered is incomplete'), JSON_PRETTY_PRINT));
          exit;
        }
      }
    } else {
      http_response_code(400);
      $this->api(json_encode(array('You not access this api'), JSON_PRETTY_PRINT));
      exit;
    }
  }

  public function ubahPemasukkan()
  {
    if ($_POST == !NULL) {
      $json_first = array_key_first($_POST);
      $array_data = json_decode($json_first, true);
      $array_data['username'] = $_SESSION['username'];
      if (empty($array_data['id']) || empty($array_data['hari']) || empty($array_data['tanggal']) || empty($array_data['pemasukkan']) || empty($array_data['nominal']) || empty($array_data['username'])) {
        http_response_code(400);
        $this->api(json_encode(array('The data you entered is incomplete'), JSON_PRETTY_PRINT));
        exit;
      } else {
        if ($this->model('CatatanKeuanganPemasukkanModel')->changePemasukkan($array_data) > 0) {
          Flasher::setFlash('success', 'Pemasukkan ' . $array_data['pemasukkan'], ' Berhasil diubah! ', '.');
          http_response_code(200);
          Flasher::flash();
          exit;
        } else {
          Flasher::setFlash('warning', 'Pemasukkan ' . $array_data['pemasukkan'], ' Gagal diubah!, Data tetap sama', '.');
          http_response_code(200);
          Flasher::flash();
          exit;
        }
      }
    } else {
      http_response_code(400);
      $this->api(json_encode(array('You not access this api'), JSON_PRETTY_PRINT));
      exit;
    }
  }

  public function deletePemasukkan()
  {
    if ($_POST == !NULL) {
      $_POST['username'] = $_SESSION['username'];
      if (empty($_POST['id']) || empty($_POST['name'])) {
        http_response_code(400);
        $this->api(json_encode(array('The data you entered is incomplete'), JSON_PRETTY_PRINT));
        exit;
      } else {
        if ($this->model('CatatanKeuanganPemasukkanModel')->deletePemasukkan($_POST) > 0) {
          Flasher::setFlash('success', 'Pemasukkan ' . $_POST['name'], ' Berhasil dihapus! ', '.');
          http_response_code(200);
          Flasher::flash();
          exit;
        } else {
          Flasher::setFlash('danger', 'Pemasukkan ' . $_POST['name'], ' Gagal dihapus! ', '.');
          http_response_code(200);
          Flasher::flash();
          exit;
        }
      }
    } else {
      http_response_code(400);
      $this->api(json_encode(array('The data you entered is incomplete'), JSON_PRETTY_PRINT));
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
    $this->view('hcb/index/dashboard/utility/js/jsmkeuanganpengeluaran');
    $this->view('index/all/coming');
    $this->view('hcb/body');
  }

  public function getPengeluaran()
  {
    if ($_POST == !NULL) {
      if (empty($_POST['urutan'])) {
        http_response_code(400);
        $this->api(json_encode(array('The data you entered is incomplete'), JSON_PRETTY_PRINT));
        exit;
      } else {
        $data['username'] = $_SESSION['username'];
        switch ($_POST['urutan']) {
          case 'tglbaru':
            $data['urutan'] = "ORDER BY tanggal DESC";
            break;
          case 'tgllama':
            $data['urutan'] = "ORDER BY tanggal ASC";
            break;
          case 'scon':
            $data['urutan'] = "ORDER BY status DESC";
            break;
          case 'suncon':
            $data['urutan'] = "ORDER BY status ASC";
            break;
          default:
            $data['urutan'] = "ORDER BY tanggal DESC";
            break;
        }
        if (is_null($_POST['searching'])) {
          $data['searching'] = "";
        } else {
          $data['searching'] = $_POST['searching'];
        }
        $row = $this->model('CatatanKeuanganPengeluaranModel')->getAllPengeluaran($data);
        $json = json_encode($row);
        echo ($json);
      }
    } else {
      http_response_code(400);
      $this->api(json_encode(array('You not access this api'), JSON_PRETTY_PRINT));
      exit;
    }
  }

  public function tambahPengeluaran()
  {
    if ($_POST == !NULL) {
      if (empty($_POST['tambahhari']) || empty($_POST['tambahtanggal']) || empty($_POST['tambahpengeluaran']) || empty($_POST['tambahjumlah']) || empty($_POST['tambahnominal']) || empty($_POST['tambahtotal'])) {
        http_response_code(400);
        $this->api(json_encode(array('The data you entered is incomplete'), JSON_PRETTY_PRINT));
        exit;
      } else {
        $_POST['username'] = $_SESSION['username'];
        if ($this->model('CatatanKeuanganPengeluaranModel')->insertPengeluaran($_POST) > 0) {
          Flasher::setFlash('success', 'Pemasukkan ' . $_POST['tambahpengeluaran'], ' Berhasil ditambahkan! ', '.');
          http_response_code(200);
          Flasher::flash();
          exit;
        } else {
          Flasher::setFlash('danger', 'Pemasukkan ' . $_POST['tambahpengeluaran'], ' Gagal ditambahkan! ', '.');
          http_response_code(200);
          Flasher::flash();
          exit;
        }
      }
    } else {
      http_response_code(400);
      $this->api(json_encode(array('You not access this api'), JSON_PRETTY_PRINT));
      exit;
    }
  }

  public function ubahPengeluaran()
  {
    if ($_POST == !NULL) {
      $json_first = array_key_first($_POST);
      $array_data = json_decode($json_first, true);
      $array_data['username'] = $_SESSION['username'];
      if (empty($array_data['id']) || empty($array_data['hari']) || empty($array_data['tanggal']) || empty($array_data['pengeluaran']) || empty($array_data['jumlah']) || empty($array_data['nominal']) || empty($array_data['total']) || empty($array_data['username'])) {
        http_response_code(400);
        $this->api(json_encode(array('The data you entered is incomplete'), JSON_PRETTY_PRINT));
        exit;
      } else {
        if ($this->model('CatatanKeuanganPengeluaranModel')->changePengeluaran($array_data) > 0) {
          Flasher::setFlash('success', 'Pengeluaran ' . $array_data['pengeluaran'], ' Berhasil diubah! ', '.');
          http_response_code(200);
          Flasher::flash();
          exit;
        } else {
          Flasher::setFlash('warning', 'Pengeluaran ' . $array_data['pengeluaran'], ' Gagal diubah!, Data tetap sama', '.');
          http_response_code(200);
          Flasher::flash();
          exit;
        }
      }
    } else {
      http_response_code(400);
      $this->api(json_encode(array('You not access this api'), JSON_PRETTY_PRINT));
      exit;
    }
  }

  public function deletePengeluaran()
  {
    if ($_POST == !NULL) {
      $_POST['username'] = $_SESSION['username'];
      if (empty($_POST['id']) || empty($_POST['name'])) {
        http_response_code(400);
        $this->api(json_encode(array('The data you entered is incomplete'), JSON_PRETTY_PRINT));
        exit;
      } else {
        if ($this->model('CatatanKeuanganPengeluaranModel')->deletePengeluaran($_POST) > 0) {
          Flasher::setFlash('success', 'Pengeluaran ' . $_POST['name'], ' Berhasil dihapus! ', '.');
          http_response_code(200);
          Flasher::flash();
          exit;
        } else {
          Flasher::setFlash('danger', 'Pengeluaran ' . $_POST['name'], ' Gagal dihapus! ', '.');
          http_response_code(200);
          Flasher::flash();
          exit;
        }
      }
    } else {
      http_response_code(400);
      $this->api(json_encode(array('The data you entered is incomplete'), JSON_PRETTY_PRINT));
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
      header('Location: ' . BASEURL . '/Dashboard/catatanTabungan');
      exit;
    } else {
      Flasher::setFlash('danger', 'Tabungan ' . $_POST['tabungan'], ' Gagal ditambahkan! ', '.');
      header('Location: ' . BASEURL . '/Dashboard/catatanTabungan');
      exit;
    }
  }

  public function ubahTabungan()
  {
    $_POST['username'] = $_SESSION['username'];
    if ($this->model('CatatanKeuanganTabunganModel')->changeTabungan($_POST) > 0) {
      Flasher::setFlash('success', 'Tabungan ' . $_POST['tabungan'], ' Berhasil diubah! ', '.');
      header('Location: ' . BASEURL . '/Dashboard/catatanTabungan');
      exit;
    } else {
      Flasher::setFlash('danger', 'Tabungan ' . $_POST['tabungan'], ' Gagal diubah! ', '.');
      header('Location: ' . BASEURL . '/Dashboard/catatanTabungan');
      exit;
    }
  }

  public function deleteTabungan($id = '', $tabungan = '')
  {
    $data['id'] = $id;
    $data['username'] = $_SESSION['username'];
    if ($this->model('CatatanKeuanganTabunganModel')->deleteTabungan($data) > 0) {
      Flasher::setFlash('success', 'Tabungan ' . $tabungan, ' Berhasil dihapus! ', '.');
      header('Location: ' . BASEURL . '/Dashboard/catatanTabungan');
      exit;
    } else {
      Flasher::setFlash('danger', 'Tabungan ' . $tabungan, ' Gagal dihapus! ', '.');
      header('Location: ' . BASEURL . '/Dashboard/catatanTabungan');
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
    $this->view('index/dashboard/settings', $data);
    $this->view('index/dashboard/navfood/footer', $data);
    $this->view('hcb/index/dashboard/body/bodyclose3');
    $this->view('hcb/index/dashboard/body/bodyclose2');
    $this->view('hcb/index/dashboard/body/bodyclose1');
    $this->view('hcb/index/dashboard/body/bodyclose');
    $this->view('hcb/index/dashboard/utility/js/jssettings');
    $this->view('index/all/coming');
    $this->view('hcb/body');
  }

  public function profileSetting()
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
    $this->view('index/dashboard/profilesetting', $data);
    $this->view('index/dashboard/navfood/footer', $data);
    $this->view('hcb/index/dashboard/body/bodyclose3');
    $this->view('hcb/index/dashboard/body/bodyclose2');
    $this->view('hcb/index/dashboard/body/bodyclose1');
    $this->view('hcb/index/dashboard/body/bodyclose');
    $this->view('hcb/index/dashboard/utility/js/jssettings');
    $this->view('index/all/coming');
    $this->view('hcb/body');
  }

  public function accountSetting()
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
    $this->view('index/dashboard/accountsetting', $data);
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
    $data = $this->process('DashboardProcess')->fileProfile();

    if (in_array($file_type, $allowed_types)) {
      $file_destination = ROOT . '/datasource/profile/' . $_SESSION['username'] . '-' . $fileName;
      if ($file_size > 2097152) {
        Flasher::setFlash('warning', 'Foto profil ', 'Tidak boleh lebih dari 2 MB', '.');
        http_response_code(400);
        Flasher::flash();
        exit;
      } else {
        if (file_exists($file_destination)) {
          Flasher::setFlash('warning', 'Foto profil yang di upload ', 'tidak boleh sama! ', '.');
          http_response_code(400);
          Flasher::flash();
        } else {
          if ($data['fileName'] == !NULL) {
            $file_from = ROOT . '/datasource/profile/' . $data['fileName'];
            if (file_exists($file_from)) {
              unlink($file_from);
            }
          }
          if ($this->model('AccModel')->updateProfileUser($_POST) > 0) {
            move_uploaded_file($file_tmp, $file_destination);
            Flasher::setFlash('success', 'Foto profil ', 'Berhasil diubah! ', '.');
            http_response_code(200);
            Flasher::flash();
            exit;
          } else {
            Flasher::setFlash('danger', 'Foto profil ', 'Gagal diubah! ', 'Pastikan nama dari file yang di upload berbeda.');
            http_response_code(400);
            Flasher::flash();
            exit;
          }
        }
      }
    } else {
      echo ("tipe file tidak boleh");
      Flasher::setFlash('danger', 'Foto profil ', 'Gagal diupload! ', 'Pastikan foto profil berextensi JPG/PNG.');
      http_response_code(400);
      Flasher::flash();
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
    if ($this->model('AccModel')->updateProfileUser($_POST) > 0) {
      unlink($cek);
      Flasher::setFlash('success', 'Profil ', 'Berhasil dihapus! ', '.');
      http_response_code(200);
      Flasher::flash();
      exit;
    } else {
      Flasher::setFlash('danger', 'Profil ', 'Gagal dihapus! ', '.');
      http_response_code(400);
      Flasher::flash();
      exit;
    }
  }

  public function updateProfile()
  {
    if ($_POST == !NULL) {
      if (empty($_POST['name'])) {
        http_response_code(400);
        $this->api(json_encode(array('The data you sent is incomplete.'), JSON_PRETTY_PRINT));
        exit;
      } else {
        $_POST['username'] = $_SESSION['username'];
        if ($this->model('AccModel')->updateAccProfileUser($_POST) > 0) {
          Flasher::setFlash('success', 'Profil ', 'Berhasil diubah! ', '.');
          http_response_code(200);
          Flasher::flash();
          exit;
        } else {
          Flasher::setFlash('warning', 'Profil ', 'Gagal diubah! ', 'Tidak ada perubahan di profil.');
          http_response_code(200);
          Flasher::flash();
          exit;
        }
      }
    } else {
      http_response_code(400);
      $this->api(json_encode(array('You not access this api'), JSON_PRETTY_PRINT));
      exit;
    }
  }

  public function accountProfileUpdate()
  {
    $data = $this->model('AccModel')->cekAccLog($_SESSION);
    if ($data['changeEmail'] == 0) {
      if ($_POST['email'] !== $data['email']) {
        $_POST['changeEmail'] = "1";
      } else {
        $_POST['changeEmail'] = "0";
      }
    } else {
      $_POST['changeEmail'] = "1";
    }
    $_POST['username'] = $_SESSION['username'];
    if ($this->model('AccModel')->updateAccAccountUser($_POST) > 0) {
      Flasher::setFlash('success', 'Account ', 'Berhasil diubah! ', '.');
      http_response_code(200);
      Flasher::flash();
      exit;
    } else {
      Flasher::setFlash('warning', 'Account ', 'Gagal diubah! ', 'Tidak ada perubahan di profil.');
      http_response_code(200);
      Flasher::flash();
      exit;
    }
  }

  public function calculator()
  {
  }
}
