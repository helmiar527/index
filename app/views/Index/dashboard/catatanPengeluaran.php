<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Pengeluaran</h4>
            <button type="button" class="btn btn-primary btn-icon-text mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal"><i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Pengeluaran </button>
            <?php Flasher::flash(); ?>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Hari </th>
                            <th> Tanggal </th>
                            <th> Pengeluaran </th>
                            <th> Jumlah </th>
                            <th> Nominal </th>
                            <th> Total </th>
                            <th> Status </th>
                            <th> Edit </th>
                            <th> Hapus </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data['pengeluaran'] as $pengeluaran) : ?>
                            <?php if ($pengeluaran['status'] == 'confirm') {
                                $color = 'success';
                            } else {
                                $color = 'warning';
                            } ?>
                            <?php $total = $pengeluaran['jumlah'] * $pengeluaran['nominal']; ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <?php $i++ ?>
                                <td><?= $pengeluaran['hari']; ?></td>
                                <td><?= $pengeluaran['tanggal']; ?></td>
                                <td><?= $pengeluaran['pengeluaran']; ?></td>
                                <td><?= $pengeluaran['jumlah']; ?></td>
                                <td>Rp. <?= $pengeluaran['nominal']; ?></td>
                                <td>Rp. <?= $total; ?></td>
                                <td><label class="badge badge-<?= $color; ?>"><?= $pengeluaran['status']; ?></label></td>
                                <td></td>
                                <td><button type="button" class="btn btn-danger btn-icon-text" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="mdi mdi-backspace btn-icon-prepend"></i></button></td>
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
                <h1 class="modal-title fs-5" id="tambahModalLabel">Tambahkan Pengeluaran</h1>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample needs-validation" action="<?= BASEURL; ?>/dashboard/tambahPengeluaran" method="post" novalidate>
                                <div class="form-group">
                                    <label for="hari">Hari</label>
                                    <select class="form-control" id="hari" name="hari" required>
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
                                    <label for="pengeluaran">Pengeluaran</label>
                                    <input type="text" class="form-control" id="pengeluaran" name="pengeluaran" placeholder="pengeluaran" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="jumlah" required>
                                </div>
                                <div class="form-group">
                                    <label for="nominal">Nominal</label>
                                    <input type="text" class="form-control" id="nominal" name="nominal" placeholder="Nominal" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="" selected disabled>Pilih...</option>
                                        <option value="unconfirm">Unconfirm</option>
                                        <option value="confirm">Confirm</option>
                                    </select>
                                    <p class="mt-3">Status <span class="text-danger">Unconfirm</span> adalah pemasukkan yang nominalnya belum masuk tetapi di catat dulu.</p>
                                    <p class="mt-1">Status <span class="text-success">Confirm</span> adalah pemasukkan yang nominalnya sudah masuk dan di catat.</p>
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
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-warning" id="deleteModalLabel">Peringatan!</h1>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapusnya?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="<?= BASEURL ?>/dashboard/deletePengeluaran/<?= $pengeluaran['id']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
            </div>
        </div>
    </div>
</div>