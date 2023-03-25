const formss = document.querySelector(".needs-validation");
const form = document.forms["submit-to-db"];
const scriptURL =
  window.location.protocol +
  "//" +
  window.location.hostname +
  window.location.pathname +
  "index/incontact";
const btnLoad = document.querySelector("#loadButton");
const btnSend = document.querySelector("#submitButton");
const alertS = document.querySelector(".alert-success");
const alertD = document.querySelector(".alert-danger");
formss.addEventListener("submit", (e) => {
  if (formss.checkValidity()) {
    e.preventDefault();
    e.stopPropagation();
    btnSend.classList.toggle("d-none");
    btnLoad.classList.toggle("d-none");
    fetch(scriptURL, {
      method: "POST",
      body: new FormData(form),
    })
      .then((response) => {
        if (!response.ok) {
          alertD.classList.toggle("d-none");
        }
        btnSend.classList.toggle("d-none");
        btnLoad.classList.toggle("d-none");
        alertS.classList.toggle("d-none");
        form.reset();
        formss.classList.remove("was-validated");
      })
      .catch((error) => {
        alertD.classList.toggle("d-none");
      });
  }
});
