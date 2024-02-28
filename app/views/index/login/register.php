<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100 m-0">
      <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
        <div class="card col-lg-4 mx-auto">
          <div class="card-body px-5 py-5">
            <h3 class="card-title text-left mb-3">Register</h3>
            <div class="notif-alert">
            </div>
            <form class="needs-validation" name="registerform" method="post" novalidate>
              <div class="form-group">
                <label id="name-label">Full Name</label>
                <input id="name" name="name" type="text" class="form-control p_input" required>
                <div class="invalid-feedback">
                  A name is required.
                </div>
                <div class="valid-feedback">
                  Good name.
                </div>
              </div>
              <div class="form-group">
                <label id="uname-label">Username</label>
                <input id="uname" name="username" type="text" class="form-control p_input" required>
                <div class="invalid-feedback">
                  A username is required.
                </div>
                <div class="valid-feedback">
                  Unique username.
                </div>
              </div>
              <div class="form-group">
                <label id="email-label">Email</label>
                <input id="email" name="email" type="email" class="form-control p_input" required>
                <div class="invalid-feedback">
                  A email is required.
                </div>
                <div class="valid-feedback">
                  Looks good.
                </div>
              </div>
              <div class="form-group">
                <label id="pass-label">Password</label>
                <input id="pass" name="password" type="password" class="form-control p_input" required>
                <div class="invalid-feedback">
                  A password is required.
                </div>
                <div class="valid-feedback">
                  Good password.
                </div>
              </div>
              <div class="form-group d-none repass">
                <label>Retype Password</label>
                <input id="repass" name="repassword" type="password" class="form-control p_input" required>
                <div class="invalid-feedback">
                  Please retype password is required.
                </div>
                <div class="valid-feedback">
                  Good.
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block enter-btn" id="submitButton">Submit</button>
                <button type="button" class="btn btn-primary btn-block enter-btn d-none" id="loadButton" disabled>
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
                </button>
              </div>
              <p class="sign-up text-center" id="link-login">
                Already have an Account?<a href="<?= BASEURL; ?>/Login"> Sign In</a>
              </p>
              <p class="terms" id="terms">
                By creating an account you are accepting our<a href="#" data-bs-toggle="modal" data-bs-target="#comingModal"> Terms & Conditions</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>