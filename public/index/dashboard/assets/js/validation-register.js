(() => {
  "use strict";
  const forms = document.querySelectorAll(".needs-validation");
  Array.from(forms).forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add("was-validated");
      },
      false
    );
  });
})();

const repass = document.querySelector(".repass");
const pass = document.querySelector("#pass");
pass.addEventListener(
  "click",
  function () {
    if (repass.classList.value !== "form-group repass") {
      repass.classList.remove("d-none");
    }
  },
  false
);
