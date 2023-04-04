<section class="page-section" id="contact">
  <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-lg-8 col-xl-6 text-center">
        <h2 class="mt-0" data-aos="fade-up">Let's Get In Touch!</h2>
        <hr class="divider">
        <p class="text-muted mb-5" data-aos="fade-down">
          Kirimkan pesan untuk masukkan dan pemberitahuan
        </p>
      </div>
    </div>
    <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
      <div class="col-lg-6">
        <div>
        </div>
        <div class="alert-push">
        </div>
        <form class="needs-validation" name="sendtoadmin" novalidate>
          <input type="hidden" id="time" name="time" value="<?= date("H:i:s"); ?>" required>
          <input type="hidden" id="date" name="date" value="<?= date("Y-m-d"); ?>" required>
          <div class="form-floating mb-3" data-aos="fade-right">
            <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." data-sb-validations="required" required>
            <label for="name">Full Name</label>
            <div class="invalid-feedback" data-sb-feedback="name:required">
              A name is required.
            </div>
          </div>
          <div class="form-floating mb-3" data-aos="fade-left">
            <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" required>
            <label for="email">Email address</label>
            <div class="invalid-feedback" data-sb-feedback="email:required">
              An email is required.
            </div>
            <div class="invalid-feedback" data-sb-feedback="email:email">
              Email is not valid.
            </div>
          </div>
          <div class="form-floating mb-3" data-aos="fade-right">
            <textarea class="form-control" id="message" name="message" type="text" placeholder="Enter your message here..." style="height:
              10rem" data-sb-validations="required" minlength="10" required></textarea>
            <label for="message">Message</label>
            <div class="invalid-feedback" data-sb-feedback="message:required">
              A message is required.
            </div>
            <div class="invalid-feedback" id="feedback" data-sb-feedback="message:required">
              Minimum message 10 words.
            </div>
          </div>
          <div class="d-grid">
            <button class="btn btn-primary btn-xl" id="submitButton" type="submit" data-aos="fade-in">Submit</button>
            <button class="btn btn-primary btn-xl d-none" id="loadButton" type="button" disabled>
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Loading...
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>