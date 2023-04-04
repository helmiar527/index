$(function () {
  const form = document.forms["sendtoadmin"];
  const scriptURL =
    window.location.origin + window.location.pathname + "index/incontact";
  const btnLoad = $("#loadButton");
  const btnSend = $("#submitButton");
  $(".needs-validation").submit((e) => {
    e.preventDefault();
    e.stopPropagation();
    if (form.checkValidity()) {
      btnSend.toggleClass("d-none");
      btnLoad.toggleClass("d-none");
      $.ajax({
        url: scriptURL,
        type: "POST",
        data: new FormData(form),
        processData: false,
        contentType: false,
      })
        .done((response) => {
          $(".alert-push").html(response);
          form.reset();
          form.classList.remove("was-validated");
          btnLoad.toggleClass("d-none");
          btnSend.toggleClass("d-none");
        })
        .fail((error) => {
          if (error.status === 400) {
            $(".alert-push").html(error.responseText);
          } else if (error.status == 503) {
            $(".alert-push").html(error.responseText);
          }
          btnSend.toggleClass("d-none");
          btnLoad.toggleClass("d-none");
        });
    }
  });
});
