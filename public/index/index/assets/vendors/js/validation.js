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

const inputMessage = document.querySelector("#message");
const feedback = document.querySelector("#feedback");
inputMessage.addEventListener("input", function() {
  if (this.value < 5) {
    feedback.classList.remove('d-none');
  } else if (this.value > 10) {}
});