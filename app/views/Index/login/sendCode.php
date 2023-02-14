<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100 m-0">
      <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
        <div class="card col-lg-4 mx-auto">
          <div class="card-body px-5 py-5">
            <?php Flasher::flash(); ?>
            <h3 class="card-title text-left mb-3">Input Code</h3>
            <p>Masukkan code yang telah di kirim ke email <?= $data['email']; ?> untuk reset password</p>
            <form class="needs-validation" name="forgotpassform" action="" method="post" novalidate>
              <div class="form-group">
                <label>Email *</label>
                <input type="text" class="form-control p_input" name="username" placeholder="Input email......" required>
                <div class="invalid-feedback">
                  Input email.
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block enter-btn">Send Code</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>