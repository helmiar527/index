<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Table Pemasukkan</h4>
      <div class="notif-alert-universal">
      </div>
      <div class="row">
        <div class="col">
          <button type="button" class="btn btn-primary btn-icon-text mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal"><i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Pemasukkan </button>
        </div>
        <div class="col d-flex justify-content-end">
          <button type="button" class="btn btn-warning btn-icon-text mb-3" id="submitButtonRefresh"><i class="mdi mdi-reload btn-icon-prepend"></i> Refresh </button>
          <button type="button" class="btn btn-warning mb-3 d-none" id="loadButtonRefresh" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label>Urutkan Berdasarkan</label>
            <select class="js-example-basic-single form-select form-control" id="submitButtonUrutan" style="width:100%">
              <option value="tglbaru" selected>Tanggal Terbaru</option>
              <option value="tgllama">Tanggal Terlama</option>
              <option value="scon">Status Confirm</option>
              <option value="suncon">Tanggal Unconfirm</option>
            </select>
            <button type="button" class="btn btn-primary mr-2 btn-lg d-none" id="loadButtonUrutan" style="width:100%" disabled>
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Loading...
            </button>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <div class="input-group mt-4">
              <input type="text" class="form-control" placeholder="Searching" id="searching" aria-label="Searching" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-sm btn-primary" type="submit" id="submitButtonSearch">Search</button>
                <button type="button" class="btn btn-primary mr-2 btn-sm d-none" id="loadButtonSearch" style="width:100%" disabled>
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="table-responsive mt-3">
        <table class="table table-bordered table-hover" id="dataTable">
          <thead>
            <tr>
              <th> No </th>
              <th> Hari </th>
              <th> Tanggal </th>
              <th> Pemasukkan </th>
              <th> Nominal </th>
              <th> Status </th>
              <th> Hapus </th>
              <th> Edit </th>
            </tr>
          </thead>
          <tbody>
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
        <h1 class="modal-title fs-5" id="tambahModalLabel">Tambahkan Pemasukkan</h1>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      <div class="modal-body">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="notif-alert-tambah">
              </div>
              <form class="forms-sample needs-validation" name="formaddpemasukkan" method="post" novalidate>
                <input type="hidden" id="tambahhari" name="tambahhari">
                <div class="form-group">
                  <label for="tambahtanggal">Tanggal</label>
                  <input type="date" class="form-control" id="tambahtanggal" name="tambahtanggal" placeholder="Tanggal" required>
                </div>
                <div class="form-group">
                  <label for="tambahpemasukkan">Sumber Pemasukkan</label>
                  <input type="text" class="form-control" id="tambahpemasukkan" name="tambahpemasukkan" placeholder="Pemasukkan" required>
                </div>
                <div class="form-group">
                  <label for="tambahnominal">Nominal</label>
                  <input type="text" class="form-control" id="tambahnominal" name="tambahnominal" placeholder="Nominal" required>
                </div>
                <div class="form-group">
                  <label for="tambahstatus">Status</label>
                  <select class="form-control" id="tambahstatus" name="tambahstatus" required>
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
                <button type="submit" class="btn btn-success mr-2 btn-lg" id="submitButtonTambah">Save</button>
                <button type="button" class="btn btn-primary mr-2 btn-lg d-none" id="loadButtonTambah" disabled>
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Edit Pemasukkan</h1>
      </div>
      <div class="modal-body">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="notif-alert-edit"></div>
              <form class="forms-sample needs-validation" name="formeditpemasukkan" method="post" novalidate>
                <input type="hidden" id="editid" name="editid">
                <input type="hidden" id="edithari" name="edithari">
                <div class="form-group">
                  <label for="edittanggal">Tanggal</label>
                  <input type="date" class="form-control" id="edittanggal" name="edittanggal" placeholder="Tanggal" required>
                </div>
                <div class="form-group">
                  <label for="editpemasukkan">Sumber Pemasukkan</label>
                  <input type="text" class="form-control" id="editpemasukkan" name="editpemasukkan" placeholder="Pemasukkan" required>
                </div>
                <div class="form-group">
                  <label for="editnominal">Nominal</label>
                  <input type="text" class="form-control" id="editnominal" name="editnominal" placeholder="Nominal" required>
                </div>
                <div class="form-group">
                  <label for="editstatus">Status</label>
                  <select class="form-control" id="editstatus" name="editstatus" required>
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
                <button type="submit" class="btn btn-success mr-2 btn-lg" id="submitButtonEdit">Save</button>
                <button type="button" class="btn btn-primary mr-2 btn-lg d-none" id="loadButtonEdit" disabled>
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>