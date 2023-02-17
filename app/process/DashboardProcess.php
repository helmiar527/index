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
