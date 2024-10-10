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
