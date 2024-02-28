$(function () {
  const form = document.forms["loginform"];
  const btnSend = $("#submitButton");
  const btnLoad = $("#loadButton");
  const cekCookietURL =
    window.location.origin + window.location.pathname + "/cekCookie";
  const cekAccURL =
    window.location.origin + window.location.pathname + "/cekAcc";
  const loginURL = window.location.origin + window.location.pathname + "/login";

  $(form).submit((e) => {
    if (form.checkValidity()) {
      e.preventDefault();
      e.stopPropagation();
      btnSend.toggleClass("d-none");
      btnLoad.toggleClass("d-none");
      $.ajax({
        url: cekCookietURL,
        type: "POST",
        data: new FormData(form),
        processData: false,
        contentType: false,
      })
        .done((response) => {
          $(".notif-alert").html(response);
          $.ajax({
            url: cekAccURL,
            type: "POST",
            data: new FormData(form),
            processData: false,
            contentType: false,
          })
            .done((response) => {
              $.ajax({
                url: loginURL,
                type: "POST",
                data: new FormData(form),
                processData: false,
                contentType: false,
              })
                .done((response) => {
                  location.reload();
                })
                .fail((error) => {
                  btnSend.toggleClass("d-none");
                  btnLoad.toggleClass("d-none");
                  $(".notif-alert").html(error.responseText);
                });
            })
            .fail((error) => {
              btnSend.toggleClass("d-none");
              btnLoad.toggleClass("d-none");
              $(".notif-alert").html(error.responseText);
            });
        })
        .fail((error) => {
          btnSend.toggleClass("d-none");
          btnLoad.toggleClass("d-none");
          $(".notif-alert").html(error.responseText);
        });
    }
  });
});
