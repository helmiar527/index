const repass1 = document.querySelector(".repass");
const password = document.querySelector("#pass");
password.addEventListener(
  "click",
  function () {
    repass1.classList.remove("d-none");
  },
  false
);