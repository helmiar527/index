<?php

class DashboardProcess extends Controller
{
    public function index()
    {
        $row = $this->model('AccModel')->updateAcc($_SESSION);
        $data['title'] = 'Dashboard';
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
        // $_POST['tanggal'] = date('Y-m');
        // $_POST['status'] = 1;
        // $row1a = $this->model('CatatanKeuanganPemasukkanModel')->getAllPemasukkanIndex($_POST);
        // if ($row1a == NULL) {
        //     $data['pemasukkanindex'] = '0';
        // } else {
        //     foreach ($row1a as $row1a) {
        //         $pemasukkan1a[] = $row1a["nominal"];
        //     }
        //     $kata1a = implode('+', $pemasukkan1a);
        //     $arr1a = explode("+", $kata1a);
        //     $total1a = 0;
        //     foreach ($arr1a as $val1a) {
        //         $total1a += intval($val1a);
        //     }
        //     $data['pemasukkanindex'] = number_format($total1a, 0, ',', '.');
        // }
        // Total bulan kemarin
        // $_POST['tanggal'] = date("Y-m", strtotime("-1 month", strtotime(date('Y-m'))));
        // $_POST['status'] = 1;
        // $row1b = $this->model('CatatanKeuanganPemasukkanModel')->getAllPemasukkanIndex($_POST);
        // if ($row1b == !NULL) {
        //     foreach ($row1b as $row1b) {
        //         $pemasukkan1b[] = $row1b["nominal"];
        //     }
        //     $kata1b = implode('+', $pemasukkan1b);
        //     $arr1b = explode("+", $kata1b);
        //     $total1b = 0;
        //     foreach ($arr1b as $val1b) {
        //         $total1b += intval($val1b);
        //     }
        // }
        // Persentase
        // if (empty($total1a) || empty($total1b)) {
        //     $data['pemasukkanindexpersen'] = '0';
        //     $data['colorpemasukkanindex'] = 'warning';
        //     $data['iconpemasukkanindex'] = 'mdi-minus';
        // } else {
        //     $persentase = (($total1a - $total1b) / $total1b) * 100;
        //     $persentaseraw = substr($persentase, 0, 5);
        //     if ($persentaseraw < 0) {
        //         $data['pemasukkanindexpersen'] = $persentaseraw;
        //         $data['colorpemasukkanindex'] = 'danger';
        //         $data['iconpemasukkanindex'] = 'mdi-arrow-bottom-right';
        //     } else {
        //         $data['pemasukkanindexpersen'] = '+' . $persentaseraw;
        //         $data['colorpemasukkanindex'] = 'success';
        //         $data['iconpemasukkanindex'] = 'mdi-arrow-top-right';
        //     }
        // }
        return $data;
    }

    public function catatanPemasukkan()
    {
        $row = $this->model('AccModel')->updateAcc($_SESSION);
        $data['title'] = 'Catatan Pemasukkan';
        $data['nama'] = $row['name'];
        $data['username'] = $row['username'];
        $data['email'] = $row['email'];
        $data['rank'] = $row['role'];
        if ($row['fileName'] == NULL) {
            $data['profile'] = ROOTURL . '/datasource/profile/no-profile.png';
        } else {
            $data['profile'] = ROOTURL . '/datasource/profile/' . $row['fileName'];
        }
        return $data;
    }

    public function catatanPengeluaran()
    {
        $row = $this->model('AccModel')->updateAcc($_SESSION);
        $data['title'] = 'Catatan Pengeluaran';
        $data['nama'] = $row['name'];
        $data['username'] = $row['username'];
        $data['email'] = $row['email'];
        $data['rank'] = $row['role'];
        if ($row['fileName'] == NULL) {
            $data['profile'] = ROOTURL . '/datasource/profile/no-profile.png';
        } else {
            $data['profile'] = ROOTURL . '/datasource/profile/' . $row['fileName'];
        }
        return $data;
    }

    public function catatanTabungan()
    {
        $row = $this->model('AccModel')->updateAcc($_SESSION);
        $data['title'] = 'Catatan Tabungan';
        $data['nama'] = $row['name'];
        $data['username'] = $row['username'];
        $data['email'] = $row['email'];
        $data['rank'] = $row['role'];
        if ($row['fileName'] == NULL) {
            $data['profile'] = ROOTURL . '/datasource/profile/no-profile.png';
        } else {
            $data['profile'] = ROOTURL . '/datasource/profile/' . $row['fileName'];
        }
        return $data;
    }

    public function settings()
    {
        $row = $this->model('AccModel')->updateAcc($_SESSION);
        $data['title'] = 'Settings';
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
            $data['deletepro'] = '
            <button type="button" class="btn btn-danger" id="submitButtonPictureDel" data-bs-toggle="modal" data-bs-target="#deleteProfilModal">Delete Foto Profile</button>
            <button type="button" class="btn btn-danger d-none" id="loadButtonPictureDel" disabled>
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
                </button>
            ';
        } else {
            $data['deletepro'] = '';
        }
        return $data;
    }

    public function fileProfile()
    {
        $row = $this->model('AccModel')->updateAcc($_SESSION);
        $data['fileName'] = $row['fileName'];
        return $data;
    }
}
