<?php

class DashboardProcess extends Controller
{
    public function index()
    {
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
        return $data;
    }

    public function catatanPemasukkan()
    {
        $row = $this->model('AccModel')->updateAcc($_SESSION);
        if ($_POST == NULL) {
            $data['title'] = 'Catatan Pemasukkan';
            $data['select'] = 'selected';
            $data['select1'] = '';
            $data['select2'] = '';
            $data['select3'] = '';
        } else {
            $data['title'] = 'Searching by ' . $_POST['searching'];
            if ($_POST['urutan'] == 'tglbaru') {
                $data['select'] = 'selected';
                $data['select1'] = '';
                $data['select2'] = '';
                $data['select3'] = '';
            } elseif ($_POST['urutan'] == 'tgllama') {
                $data['select'] = '';
                $data['select1'] = 'selected';
                $data['select2'] = '';
                $data['select3'] = '';
            } elseif ($_POST['urutan'] == 'scon') {
                $data['select'] = '';
                $data['select1'] = '';
                $data['select2'] = 'selected';
                $data['select3'] = '';
            } elseif ($_POST['urutan'] == 'suncon') {
                $data['select'] = '';
                $data['select1'] = '';
                $data['select2'] = '';
                $data['select3'] = 'selected';
            }
        }
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
        if ($_POST == NULL) {
            $_POST['searching'] = '';
            $_POST['urutan'] = 'ORDER BY tanggal DESC';
        }
        if ($_POST['urutan'] == 'tglbaru') {
            $_POST['urutan'] = 'ORDER BY tanggal DESC';
        } elseif ($_POST['urutan'] == 'tgllama') {
            $_POST['urutan'] = 'ORDER BY tanggal ASC';
        } elseif ($_POST['urutan'] == 'scon') {
            $_POST['urutan'] = 'ORDER BY status ASC';
        } elseif ($_POST['urutan'] == 'suncon') {
            $_POST['urutan'] = 'ORDER BY status DESC';
        }
        $_POST['unameUser'] = $_SESSION['unameUser'];
        $row1 = $this->model('CatatanKeuanganPemasukkanModel')->getAllPemasukkan($_POST);
        $data['pemasukkan'] = $row1;
        return $data;
    }

    public function catatanPengeluaran()
    {
        $row = $this->model('AccModel')->updateAcc($_SESSION);
        if ($_POST == NULL) {
            $data['title'] = 'Catatan Pengeluaran';
            $data['select'] = 'selected';
            $data['select1'] = '';
            $data['select2'] = '';
            $data['select3'] = '';
        } else {
            $data['title'] = 'Searching by ' . $_POST['searching'];
            if ($_POST['urutan'] == 'tglbaru') {
                $data['select'] = 'selected';
                $data['select1'] = '';
                $data['select2'] = '';
                $data['select3'] = '';
            } elseif ($_POST['urutan'] == 'tgllama') {
                $data['select'] = '';
                $data['select1'] = 'selected';
                $data['select2'] = '';
                $data['select3'] = '';
            } elseif ($_POST['urutan'] == 'scon') {
                $data['select'] = '';
                $data['select1'] = '';
                $data['select2'] = 'selected';
                $data['select3'] = '';
            } elseif ($_POST['urutan'] == 'suncon') {
                $data['select'] = '';
                $data['select1'] = '';
                $data['select2'] = '';
                $data['select3'] = 'selected';
            }
        }
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
        if ($_POST == NULL) {
            $_POST['searching'] = '';
            $_POST['urutan'] = 'ORDER BY tanggal DESC';
        }
        if ($_POST['urutan'] == 'tglbaru') {
            $_POST['urutan'] = 'ORDER BY tanggal DESC';
        } elseif ($_POST['urutan'] == 'tgllama') {
            $_POST['urutan'] = 'ORDER BY tanggal ASC';
        } elseif ($_POST['urutan'] == 'scon') {
            $_POST['urutan'] = 'ORDER BY status ASC';
        } elseif ($_POST['urutan'] == 'suncon') {
            $_POST['urutan'] = 'ORDER BY status DESC';
        }
        $_POST['unameUser'] = $_SESSION['unameUser'];
        $row1 = $this->model('CatatanKeuanganPengeluaranModel')->getAllPengeluaran($_POST);
        $data['pengeluaran'] = $row1;
        return $data;
    }

    public function catatanTabungan()
    {
        // $row = $this->model('AccModel')->updateAcc($_SESSION);
        // $data['title'] = 'Catatan Tabungan';
        // $data['years1'] = '2022';
        // $data['years'] = date('Y');
        // $data['nama'] = $row['nameUser'];
        // $data['username'] = $row['unameUser'];
        // $data['email'] = $row['emailUser'];
        // $data['rank'] = $row['roleUser'];

        // if ($row['fileName'] == NULL) {
        //     $data['profile'] = ROOTURL . '/datasource/profile/no-profile.png';
        // } else {
        //     $data['profile'] = ROOTURL . '/datasource/profile/' . $row['fileName'];
        // }
        // return $data;
        $row = $this->model('AccModel')->updateAcc($_SESSION);
        if ($_POST == NULL) {
            $data['title'] = 'Catatan Tabungan';
            $data['select'] = 'selected';
            $data['select1'] = '';
            $data['select2'] = '';
            $data['select3'] = '';
        } else {
            $data['title'] = 'Searching by ' . $_POST['searching'];
            if ($_POST['urutan'] == 'tglbaru') {
                $data['select'] = 'selected';
                $data['select1'] = '';
                $data['select2'] = '';
                $data['select3'] = '';
            } elseif ($_POST['urutan'] == 'tgllama') {
                $data['select'] = '';
                $data['select1'] = 'selected';
                $data['select2'] = '';
                $data['select3'] = '';
            } elseif ($_POST['urutan'] == 'scon') {
                $data['select'] = '';
                $data['select1'] = '';
                $data['select2'] = 'selected';
                $data['select3'] = '';
            } elseif ($_POST['urutan'] == 'suncon') {
                $data['select'] = '';
                $data['select1'] = '';
                $data['select2'] = '';
                $data['select3'] = 'selected';
            }
        }
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
        if ($_POST == NULL) {
            $_POST['searching'] = '';
            $_POST['urutan'] = 'ORDER BY tanggal DESC';
        }
        if ($_POST['urutan'] == 'tglbaru') {
            $_POST['urutan'] = 'ORDER BY tanggal DESC';
        } elseif ($_POST['urutan'] == 'tgllama') {
            $_POST['urutan'] = 'ORDER BY tanggal ASC';
        } elseif ($_POST['urutan'] == 'scon') {
            $_POST['urutan'] = 'ORDER BY status ASC';
        } elseif ($_POST['urutan'] == 'suncon') {
            $_POST['urutan'] = 'ORDER BY status DESC';
        }
        $_POST['unameUser'] = $_SESSION['unameUser'];
        $row1 = $this->model('CatatanKeuanganTabunganModel')->getAllTabungan($_POST);
        $data['tabungan'] = $row1;
        return $data;
    }

    public function settings()
    {
        $row = $this->model('AccModel')->updateAcc($_SESSION);
        $data['title'] = 'Settings';
        $data['years1'] = '2022';
        $data['years'] = date('Y');
        $data['nama'] = $row['nameUser'];
        $data['username'] = $row['unameUser'];
        $data['email'] = $row['emailUser'];
        $data['number'] = $row['numberUser'];
        $data['readonly'] = '';
        $data['text-dark'] = '';
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
            $data['text-dark'] = 'text-dark';
        }

        if ($row['fileName'] == !NULL) {
            $data['deletepro'] = '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProfilModal">Delete Foto Profile</button>';
        } else {
            $data['deletepro'] = '';
        }
        return $data;
    }
}
