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

const repass1 = document.querySelector(".repass");
const password = document.querySelector("#pass");
password.addEventListener(
  "click",
  function () {
    repass1.classList.remove("d-none");
  },
  false
);