<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Tabungan</h4>
            <?php Flasher::flash(); ?>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-primary btn-icon-text mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal"><i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Tabungan </button>
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="<?= BASEURL; ?>/dashboard/catatanTabungan"><button type="button" class="btn btn-warning btn-icon-text mb-3"><i class="mdi mdi-reload btn-icon-prepend"></i> Refresh </button></a>
                </div>
            </div>
            <form action="<?= BASEURL; ?>/dashboard/catatanTabungan" method="post">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Urutkan Berdasarkan</label>
                            <select class="js-example-basic-single form-select form-control" name="urutan" style="width:100%">
                                <option value="tglbaru" <?= $data['select']; ?>>Tanggal Terbaru</option>
                                <option value="tgllama" <?= $data['select1']; ?>>Tanggal Terlama</option>
                                <option value="scon" <?= $data['select2']; ?>>Status Confirm</option>
                                <option value="suncon" <?= $data['select3']; ?>>Tanggal Unconfirm</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group mt-4">
                                <input type="text" class="form-control" placeholder="Searching" value="<?= $_POST['searching']; ?>" name="searching" aria-label="Searching" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Hari </th>
                            <th> Tanggal </th>
                            <th> Tabungan </th>
                            <th> Nominal </th>
                            <th> Status </th>
                            <th> Edit </th>
                            <th> Hapus </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data['tabungan'] as $tabungan) : ?>
                            <?php if ($tabungan['status'] == true) {
                                $color = 'success';
                                $status = 'confirm';
                            } else {
                                $color = 'warning';
                                $status = 'unconfirm';
                            } ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <?php $i++ ?>
                                <td><?= $tabungan['hari']; ?></td>
                                <td><?= $tabungan['tanggal']; ?></td>
                                <td><?= $tabungan['tabungan']; ?></td>
                                <td><?= $tabungan['nominal']; ?></td>
                                <td><label class="badge badge-<?= $color; ?>"><?= $status; ?></label></td>
                                <td class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-info btn-icon-text" data-bs-toggle="modal" data-bs-target="#edit<?= $tabungan['id']; ?>Modal"><i class="mdi mdi-border-color btn-icon-prepend"></i></button>
                                    <div class="modal fade text-light" id="edit<?= $tabungan['id']; ?>Modal" tabindex="-1" aria-labelledby="edit<?= $tabungan['id']; ?>ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="edit<?= $tabungan['id']; ?>ModalLabel">Edit Tabungan</h1>
                                                    <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-12 grid-margin stretch-card">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form class="forms-sample needs-validation" action="<?= BASEURL; ?>/dashboard/ubahTabungan" method="post" novalidate>
                                                                    <input type="hidden" name="id" value="<?= $tabungan['id']; ?>">
                                                                    <div class="form-group">
                                                                        <label for="hari">Hari</label>
                                                                        <select class="form-control js-example-basic-single" style="width:100%" id="hari" name="hari" required>
                                                                            <?php
                                                                            $data['hari'] = $tabungan['hari'];
                                                                            if ($data['hari'] == 'Senin') {
                                                                                $data['sHari1'] = 'selected';
                                                                                $data['sHari2'] = '';
                                                                                $data['sHari3'] = '';
                                                                                $data['sHari4'] = '';
                                                                                $data['sHari5'] = '';
                                                                                $data['sHari6'] = '';
                                                                                $data['sHari7'] = '';
                                                                            } elseif ($data['hari'] == 'Selasa') {
                                                                                $data['sHari2'] = 'selected';
                                                                                $data['sHari1'] = '';
                                                                                $data['sHari3'] = '';
                                                                                $data['sHari4'] = '';
                                                                                $data['sHari5'] = '';
                                                                                $data['sHari6'] = '';
                                                                                $data['sHari7'] = '';
                                                                            } elseif ($data['hari'] == 'Rabu') {
                                                                                $data['sHari3'] = 'selected';
                                                                                $data['sHari2'] = '';
                                                                                $data['sHari1'] = '';
                                                                                $data['sHari4'] = '';
                                                                                $data['sHari5'] = '';
                                                                                $data['sHari6'] = '';
                                                                                $data['sHari7'] = '';
                                                                            } elseif ($data['hari'] == 'Kamis') {
                                                                                $data['sHari4'] = 'selected';
                                                                                $data['sHari2'] = '';
                                                                                $data['sHari3'] = '';
                                                                                $data['sHari1'] = '';
                                                                                $data['sHari5'] = '';
                                                                                $data['sHari6'] = '';
                                                                                $data['sHari7'] = '';
                                                                            } elseif ($data['hari'] == 'Jumat') {
                                                                                $data['sHari5'] = 'selected';
                                                                                $data['sHari2'] = '';
                                                                                $data['sHari3'] = '';
                                                                                $data['sHari4'] = '';
                                                                                $data['sHari1'] = '';
                                                                                $data['sHari6'] = '';
                                                                                $data['sHari7'] = '';
                                                                            } elseif ($data['hari'] == 'Sabtu') {
                                                                                $data['sHari6'] = 'selected';
                                                                                $data['sHari2'] = '';
                                                                                $data['sHari3'] = '';
                                                                                $data['sHari4'] = '';
                                                                                $data['sHari5'] = '';
                                                                                $data['sHari1'] = '';
                                                                                $data['sHari7'] = '';
                                                                            } elseif ($data['hari'] == 'Minggu') {
                                                                                $data['sHari7'] = 'selected';
                                                                                $data['sHari2'] = '';
                                                                                $data['sHari3'] = '';
                                                                                $data['sHari4'] = '';
                                                                                $data['sHari5'] = '';
                                                                                $data['sHari6'] = '';
                                                                                $data['sHari1'] = '';
                                                                            }
                                                                            ?>
                                                                            <option value="Senin" <?= $data['sHari1']; ?>>Senin</option>
                                                                            <option value="Selasa" <?= $data['sHari2']; ?>>Selasa</option>
                                                                            <option value="Rabu" <?= $data['sHari3']; ?>>Rabu</option>
                                                                            <option value="Kamis" <?= $data['sHari4']; ?>>Kamis</option>
                                                                            <option value="Jumat" <?= $data['sHari5']; ?>>Jumat</option>
                                                                            <option value="Sabtu" <?= $data['sHari6']; ?>>Sabtu</option>
                                                                            <option value="Minggu" <?= $data['sHari7']; ?>>Minggu</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="tanggal">Tanggal</label>
                                                                        <input type="date" class="form-control" value="<?= $tabungan['tanggal']; ?>" id="tanggal" name="tanggal" placeholder="Tanggal" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="tabungan">Tabungan</label>
                                                                        <input type="text" class="form-control" value="<?= $tabungan['tabungan']; ?>" id="tabungan" name="tabungan" placeholder="Tabungan" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nominal">Nominal</label>
                                                                        <input type="text" class="form-control" value="<?= $tabungan['nominal']; ?>" id="nominal" name="nominal" placeholder="Nominal" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="status">Status</label>
                                                                        <select class="form-control" id="status" name="status" required>
                                                                            <?php
                                                                            $data['status'] = $tabungan['status'];
                                                                            if ($data['status'] == true) {
                                                                                $data['sStatus1'] = 'selected';
                                                                                $data['sStatus2'] = '';
                                                                            } elseif ($data['status'] == false) {
                                                                                $data['sStatus2'] = 'selected';
                                                                                $data['sStatus1'] = '';
                                                                            }
                                                                            ?>
                                                                            <option value="0" <?= $data['sStatus2'] ?>>Unconfirm</option>
                                                                            <option value="1" <?= $data['sStatus1'] ?>>Confirm</option>
                                                                        </select>
                                                                        <p class="mt-3">
                                                                            Status <span class="text-danger">Unconfirm</span> adalah pemasukkan yang nominalnya</p>
                                                                        <p> belum masuk tetapi di catat dulu.
                                                                        </p>
                                                                        <p class="mt-1">
                                                                            Status <span class="text-success">Confirm</span> adalah pemasukkan yang nominalnya
                                                                        </p>
                                                                        <p>sudah masuk dan di catat.</p>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-success mr-2">Save</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-icon-text" data-bs-toggle="modal" data-bs-target="#delete<?= $tabungan['id']; ?>Modal"><i class="mdi mdi-backspace btn-icon-prepend"></i></button>
                                    <div class="modal fade" id="delete<?= $tabungan['id']; ?>Modal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 text-warning" id="deleteModalLabel">Peringatan!</h1>
                                                    <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-white">
                                                    Apakah anda yakin ingin menghapusnya?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <a href="<?= BASEURL ?>/dashboard/deleteTabungan/<?= $tabungan['id']; ?>/<?= $tabungan['tabungan']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">Tambahkan Tabungan</h1>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample needs-validation" action="<?= BASEURL; ?>/dashboard/tambahTabungan" method="post" novalidate>
                                <div class="form-group">
                                    <label for="hari">Hari</label>
                                    <select class="form-control js-example-basic-single" style="width:100%" id="hari" name="hari" required>
                                        <option value="" selected disabled>Pilih...</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label for="tabungan">Tabungan</label>
                                    <input type="text" class="form-control" id="tabungan" name="tabungan" placeholder="Tabungan" required>
                                </div>
                                <div class="form-group">
                                    <label for="nominal">Nominal</label>
                                    <input type="text" class="form-control" id="nominal" name="nominal" placeholder="Nominal" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="" selected disabled>Pilih...</option>
                                        <option value="0">Unconfirm</option>
                                        <option value="1">Confirm</option>
                                    </select>
                                    <p class="mt-3">
                                        Status <span class="text-danger">Unconfirm</span> adalah pemasukkan yang nominalnya belum masuk tetapi di catat dulu.
                                    </p>
                                    <p class="mt-1">
                                        Status <span class="text-success">Confirm</span> adalah pemasukkan yang nominalnya sudah masuk dan di catat.
                                    </p>
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>