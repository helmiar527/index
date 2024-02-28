<div>
  <!-- Profile -->
  <h1>Profile Public</h1>
  <hr class="bg-white">
  <div class="row">
    <div class="notif-alert">
    </div>
    <div class="col-8">
      <form name="formProfile" method="post">
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="name" value="<?= $data['nama']; ?>">
          <div class="form-text text-light">
            Nama ini akan di tampilkan saat pengiriman email, pesan ataupun nama utama di profil.
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" class="form-control text-dark" value="<?= $data['username']; ?>" readonly>
          <div class="form-text text-light">
            Username sebagai identitas utama akun.
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Ranks</label>
          <input type="text" class="form-control text-dark" value="<?= $data['role']; ?>" readonly>
          <div class="form-text text-light">
            Verifikasi email dan no telfone untuk mendapatkan rank yang lebih tinggi dan dapatkan akses yang lebih luas.
          </div>
        </div>
        <button type="submit" class="btn btn-lg btn-primary" id="submitButtonProfile">Update Profile</button>
        <button type="button" class="btn btn-primary btn-lg d-none" id="loadButtonProfile" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Loading...
        </button>
      </form>
    </div>
    <!-- Foto Profile -->
    <div class="col-4 mt-5">
      <div class="h5">
        Picture Profile
      </div>
      <div class="row">
        <div class="col-sm-9">
          <div class="mt-3">
            <img src="<?= $data['profile'] ?>" class="img-thumbnail" alt="pictureProfile">
          </div>
          <form class="mt-3" name="formPicture" method="post" enctype="multipart/form-data">
            <div class="d-flex justify-content-center">
              <?= $data['deletepro']; ?>
            </div>
            <div class="row mt-3">
              <div class="col-6 col-sm-6">
                <input class="form-control form-control-lg" type="file" name="file" required>
              </div>
              <div class="col-6 col-sm-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateProfilModal" id="submitButtonPicture">
                  Upload
                </button>
                <button type="button" class="btn btn-primary d-none" id="loadButtonPicture" disabled>
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
                </button>
                <div class="modal fade" id="updateProfilModal" tabindex="-1" aria-labelledby="updateProfilLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5 text-warning" id="updateProfilLabel">Peringatan!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Apakah anda yakin ingin mengupdate?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-success">Upload</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="deleteProfilModal" tabindex="-1" aria-labelledby="deleteProfilLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-warning" id="deleteProfilLabel">Peringatan!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-danger" id="delPicture">Iya</button>
      </div>
    </div>
  </div>
</div>