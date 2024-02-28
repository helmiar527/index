<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100 m-0">
      <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
        <div class="card col-lg-4 mx-auto">
          <div class="card-body px-5 py-5">
            <h3 class="card-title text-left mb-3">Login</h3>
            <div class="notif-alert">
              <?php Flasher::flash(); ?>
            </div>
            <form class="needs-validation" name="loginform" method="post" novalidate>
              <div class="form-group">
                <label id="username-label">Username or email *</label>
                <input type="text" class="form-control p_input" id="username" name="username" required>
                <div class="invalid-feedback">
                  A username or email is required.
                </div>
              </div>
              <div class="form-group">
                <label id="password-label">Password *</label>
                <input type="password" class="form-control p_input" id="password" name="password" required>
                <div class="invalid-feedback">
                  A password is required.
                </div>
              </div>
              <div class="form-group d-flex align-items-center justify-content-between">
                <div class="form-check">
                  <label id="remember-label" class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember"> Remember me
                  </label>
                </div>
                <a href="#" class="forgot-pass" data-bs-toggle="modal" data-bs-target="#comingModal" id="forgot-pass">Forgot password</a>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block enter-btn" id="submitButton">Login</button>
                <button type="button" class="btn btn-primary btn-block enter-btn d-none" id="loadButton" disabled>
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
                </button>
              </div>
              <p class="sign-up">
                Don't have an Account?<a href="<?= BASEURL; ?>/Register"> Sign Up</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>