<?php

class DashboardProcess extends Controller
{
    public function index()
    {
        $row = $this->model('AccModel')->updateAcc($_SESSION);
        $data['title'] = 'Dashboard';
        $data['years1'] = '2022';
        $data['years'] = date('Y');
        $data['nama'] = $row['name'];
        $data['username'] = $row['username'];
        $data['email'] = $row['email'];
        $data['rank'] = $row['role'];

        if ($row['fileName'] == NULL) {
            $data['profile'] = ROOTURL . '/datasource/profile/no-profile.png';
        } else {
            $data['profile'] = ROOTURL . '/datasource/profile/' . $row['fileName'];
        }

        // No Repeat
        $_POST['username'] = $_SESSION['username'];

        // Pemasukkan
        // Total bulan ini
        $_POST['tanggal'] = date('Y-m');
        $_POST['status'] = 1;
        $row1a = $this->model('CatatanKeuanganPemasukkanModel')->getAllPemasukkanIndex($_POST);
        if ($row1a == NULL) {
            $data['pemasukkanindex'] = '0';
        } else {
            foreach ($row1a as $row1a) {
                $pemasukkan1a[] = $row1a["nominal"];
            }
            $kata1a = implode('+', $pemasukkan1a);
            $arr1a = explode("+", $kata1a);
            $total1a = 0;
            foreach ($arr1a as $val1a) {
                $total1a += intval($val1a);
            }
            $data['pemasukkanindex'] = number_format($total1a, 0, ',', '.');
        }
        // Total bulan kemarin
        $_POST['tanggal'] = date("Y-m", strtotime("-1 month", strtotime(date('Y-m'))));
        $_POST['status'] = 1;
        $row1b = $this->model('CatatanKeuanganPemasukkanModel')->getAllPemasukkanIndex($_POST);
        if ($row1b == !NULL) {
            foreach ($row1b as $row1b) {
                $pemasukkan1b[] = $row1b["nominal"];
            }
            $kata1b = implode('+', $pemasukkan1b);
            $arr1b = explode("+", $kata1b);
            $total1b = 0;
            foreach ($arr1b as $val1b) {
                $total1b += intval($val1b);
            }
        }
        // Persentase
        if (empty($total1a) || empty($total1b)) {
            $data['pemasukkanindexpersen'] = '0';
            $data['colorpemasukkanindex'] = 'danger';
            $data['iconpemasukkanindex'] = 'mdi-minus';
        } else {
            $persentase = (($total1a - $total1b) / $total1b) * 100;
            $persentaseraw = substr($persentase, 0, 5);
            if ($persentaseraw < 0) {
                $data['pemasukkanindexpersen'] = $persentaseraw;
                $data['colorpemasukkanindex'] = 'danger';
                $data['iconpemasukkanindex'] = 'mdi-arrow-bottom-right';
            } else {
                $data['pemasukkanindexpersen'] = '+' . $persentaseraw;
                $data['colorpemasukkanindex'] = 'success';
                $data['iconpemasukkanindex'] = 'mdi-arrow-top-right';
            }
        }
        // Pengeluaran
        // Total bulan ini
        $_POST['tanggal'] = date('Y-m');
        $_POST['status'] = 1;
        $row2a = $this->model('CatatanKeuanganPengeluaranModel')->getAllPengeluaranIndex($_POST);
        foreach ($row2a as &$item) {
            $item['total'] = $item['jumlah'] * $item['nominal'];
        }
        unset($item);
        if ($row2a == NULL) {
            $data['pengeluaranindex'] = '0';
        } else {
            foreach ($row2a as $row2a) {
                $pengeluaran2a[] = $row2a["total"];
            }
            $kata2a = implode('+', $pengeluaran2a);
            $arr2a = explode("+", $kata2a);
            $total2a = 0;
            foreach ($arr2a as $val2a) {
                $total2a += intval($val2a);
            }
            $data['pengeluaranindex'] = number_format($total2a, 0, ',', '.');
        }
        // Total bulan kemarin
        $_POST['tanggal'] = date("Y-m", strtotime("-1 month", strtotime(date('Y-m'))));
        $_POST['status'] = 1;
        $row2b = $this->model('CatatanKeuanganPengeluaranModel')->getAllPengeluaranIndex($_POST);
        if ($row2b == !NULL) {
            foreach ($row2b as $row2b) {
                $pengeluaran2b[] = $row2b["nominal"];
            }
            $kata2b = implode('+', $pengeluaran2b);
            $arr2b = explode("+", $kata2b);
            $total2b = 0;
            foreach ($arr2b as $val2b) {
                $total2b += intval($val2b);
            }
        }
        // Persentase
        if (empty($total2a) || empty($total2b)) {
            $data['pengeluaranindexpersen'] = '0';
            $data['colorpengeluaranindex'] = 'danger';
            $data['iconpengeluaranindex'] = 'mdi-minus';
        } else {
            $persentase = (($total2a - $total2b) / $total2b) * 100;
            $persentaseraw = substr($persentase, 0, 5);
            if ($persentaseraw < 0) {
                $data['pengeluaranindexpersen'] = $persentaseraw;
                $data['colorpengeluaranindex'] = 'danger';
                $data['iconpengeluaranindex'] = 'mdi-arrow-bottom-right';
            } else {
                $data['pengeluaranindexpersen'] = '+' . $persentaseraw;
                $data['colorpengeluaranindex'] = 'success';
                $data['iconpengeluaranindex'] = 'mdi-arrow-top-right';
            }
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
        $data['nama'] = $row['name'];
        $data['username'] = $row['username'];
        $data['email'] = $row['email'];
        $data['rank'] = $row['role'];
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
        $_POST['username'] = $_SESSION['username'];
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
        $data['nama'] = $row['name'];
        $data['username'] = $row['username'];
        $data['email'] = $row['email'];
        $data['rank'] = $row['role'];
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
        $_POST['username'] = $_SESSION['username'];
        $row1 = $this->model('CatatanKeuanganPengeluaranModel')->getAllPengeluaran($_POST);
        $data['pengeluaran'] = $row1;
        return $data;
    }

    public function catatanTabungan()
    {
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
        $data['nama'] = $row['name'];
        $data['username'] = $row['username'];
        $data['email'] = $row['email'];
        $data['rank'] = $row['role'];
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
        $_POST['username'] = $_SESSION['username'];
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
        $data['nama'] = $row['name'];
        $data['username'] = $row['username'];
        $data['email'] = $row['email'];
        $data['number'] = $row['number'];
        $data['readonly'] = '';
        $data['text-dark'] = '';
        $data['role'] = $row['role'];
        $data['telfone'] = '';

        if ($row['fileName'] == NULL) {
            $data['profile'] = ROOTURL . '/datasource/profile/no-profile.png';
        } else {
            $data['profile'] = ROOTURL . '/datasource/profile/' . $row['fileName'];
        }

        if ($row['emailVery'] == 1) {
            $data['color'] = 'btn-success';
            $data['icon'] = '<i class="mdi mdi-check btn-icon-append"></i>';
        } else {
            $data['color'] = 'btn-warning';
            $data['icon'] = '';
        }

        if ($row['numberVery'] == 1) {
            $data['color'] = 'btn-success';
            $data['icon'] = '<i class="mdi mdi-check btn-icon-append"></i>';
        } else {
            $data['color'] = 'btn-warning';
            $data['icon'] = '';
        }

        if ($row['changeEmail'] == 1) {
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
