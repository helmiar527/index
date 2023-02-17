<div>
  <h1>Profile Public</h1>
  <hr class="bg-white">
  <div class="row">
    <?php Flasher::flash(); ?>
    <div class="col-8">
      <form action="<?= BASEURL; ?>/dashboard/profilUpdate" method="post">
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
          <label class="form-label">Email</label>
          <div class="row">
            <div class="col-9">
              <input type="text" class="form-control <?= $data['text-dark']; ?>" name="email" value="<?= $data['email']; ?>" <?= $data['readonly']; ?>>
            </div>
            <div class="col-3">
              <button type="button" class="btn btn-md <?= $data['color']; ?> btn-icon-text" data-bs-toggle="modal" data-bs-target="#comingModal">Verifikasi
                <?= $data['icon']; ?>
              </button>
            </div>
          </div>
          <div class="form-text text-light">
            Email hanya dapat di ganti 1 kali, pastikan email aktif agar dapat di verifikasi.
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">No Telfone</label>
          <div class="row">
            <div class="col-9">
              <input type="text" class="form-control" name="number" value="<?= $data['number']; ?>">
            </div>
            <div class="col-3">
              <button type="button" class="btn btn-md <?= $data['color']; ?> btn-icon-text" data-bs-toggle="modal" data-bs-target="#comingModal">Verifikasi
                <?= $data['icon']; ?>
              </button>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Ranks</label>
          <input type="text" class="form-control text-dark" value="<?= $data['role']; ?>" readonly>
          <div class="form-text text-light">
            Verifikasi email dan no telfone untuk mendapatkan rank yang lebih tinggi dan dapatkan akses yang lebih luas.
          </div>
        </div>
        <button type="submit" class="btn btn-lg btn-primary">Update profile</button>
      </form>
    </div>
    <div class="col-4">
      <div class="h5">
        Picture Profile
      </div>
      <div class="row">
        <div class="col-sm-9">
          <div class="mt-3">
            <img src="<?= $data['profile'] ?>" class="img-thumbnail" alt="pictureProfile">
          </div>
          <form class="mt-3" action="<?= BASEURL; ?>/dashboard/pictureProfilUpdate" method="post" enctype="multipart/form-data">
            <div class="d-flex justify-content-center">
              <?= $data['deletepro']; ?>
            </div>
            <div class="row mt-3">
              <div class="col-6 col-sm-6">
                <input class="form-control" type="file" name="file" required>
              </div>
              <div class="col-6 col-sm-6 d-flex justify-content-end">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateProfilModal">
                  Upload
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
        <a href="<?= BASEURL; ?>/dashboard/deleteFotoProfil"><button type="button" class="btn btn-danger">Iya</button></a>
      </div>
    </div>
  </div>
</div>