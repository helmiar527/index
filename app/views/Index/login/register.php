<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100 m-0">
      <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
        <div class="card col-lg-4 mx-auto">
          <div class="card-body px-5 py-5">
            <h3 class="card-title text-left mb-3">Register</h3>
            <?php Flasher::flash(); ?>
            <form class="needs-validation" name="registerform" action="<?= BASEURL; ?>/register/register" method="post" novalidate>
              <div class="form-group">
                <label>Full Name</label>
                <input id="name" name="name" type="text" class="form-control p_input" required>
                <div class="invalid-feedback">
                  A name is required.
                </div>
                <div class="valid-feedback">
                  Good name.
                </div>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input id="uname" name="uname" type="text" class="form-control p_input" required>
                <div class="invalid-feedback">
                  A username is required.
                </div>
                <div class="valid-feedback">
                  Unique username.
                </div>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input id="email" name="email" type="email" class="form-control p_input" required>
                <div class="invalid-feedback">
                  A email is required.
                </div>
                <div class="valid-feedback">
                  Looks good.
                </div>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input id="pass" name="pass" type="password" class="form-control p_input" required>
                <div class="invalid-feedback">
                  A password is required.
                </div>
                <div class="valid-feedback">
                  Good password.
                </div>
              </div>
              <div class="form-group d-none repass">
                <label>Retype Password</label>
                <input id="repass" name="repass" type="password" class="form-control p_input" required>
                <div class="invalid-feedback">
                  Please retype password is required.
                </div>
                <div class="valid-feedback">
                  Good.
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block
                  enter-btn">Submit</button>
              </div>
              <p class="sign-up text-center">
                Already have an Account?<a href="<?= BASEURL; ?>/login"> Sign In</a>
              </p>
              <p class="terms">
                By creating an account you are accepting our<a href="#" data-bs-toggle="modal" data-bs-target="#comingModal"> Terms & Conditions</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>