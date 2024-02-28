<div>
  <h1>Account Setting</h1>
  <hr class="bg-white">
  <div class="row">
    <div class="notif-alert">
    </div>
    <div class="col-8">
      <form name="formAccount" method="post">
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
        <button type="submit" class="btn btn-lg btn-primary" id="submitButtonAccount">Update profile</button>
        <button type="button" class="btn btn-primary btn-lg d-none" id="loadButtonAccount" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Loading...
        </button>
      </form>
    </div>
  </div>
</div>