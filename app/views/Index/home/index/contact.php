<section class="page-section" id="contact">
  <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-lg-8 col-xl-6 text-center">
        <h2 class="mt-0">Let's Get In Touch!</h2>
        <hr class="divider">
        <p class="text-muted mb-5">
          Kirimkan pesan untuk masukkan dan pemberitahuan
        </p>
      </div>
    </div>
    <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
      <div class="col-lg-6">
        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
          <div class="form-floating mb-3">
            <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required">
            <label for="name">Full Name</label>
            <div class="invalid-feedback" data-sb-feedback="name:required">
              A name is required.
            </div>
          </div>
          <div class="form-floating mb-3">
            <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email">
            <label for="email">Email address</label>
            <div class="invalid-feedback" data-sb-feedback="email:required">
              An email is required.
            </div>
            <div class="invalid-feedback" data-sb-feedback="email:email">
              Email is not valid.
            </div>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
            <label for="message">Message</label>
            <div class="invalid-feedback" data-sb-feedback="message:required">
              A message is required.
            </div>
          </div>
          <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
              <div class="fw-bolder">
                Form submission successful!
              </div>
              To activate this form, sign up at
              <br />
            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
          </div>
        </div>
        <div class="d-none" id="submitErrorMessage">
          <div class="text-center text-danger mb-3">
            Error sending message!
          </div>
        </div>
        <div class="d-grid">
          <button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>