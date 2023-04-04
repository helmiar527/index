$(function () {
  const form = document.forms["registerform"];
  const btnSend = $("#submitButton");
  const btnLoad = $("#loadButton");
  const scriptURL =
    window.location.origin + window.location.pathname + "/register";
  const alerttURL =
    window.location.origin + window.location.pathname + "/alertpass";

  $(form).submit((e) => {
    if (form.checkValidity()) {
      e.preventDefault();
      e.stopPropagation();
      btnSend.toggleClass("d-none");
      btnLoad.toggleClass("d-none");
      const pass1 = $("#pass");
      const repass1 = $("#repass");
      if (pass1.val() == repass1.val()) {
        $.ajax({
          url: scriptURL,
          type: "POST",
          data: new FormData(form),
          processData: false,
          contentType: false,
        })
          .done((response) => {
            $(".notif-alert").html(response);
            btnSend.toggleClass("d-none");
            btnLoad.toggleClass("d-none");
          })
          .fail((error) => {
            if (error.status === 503) {
              $(".notif-alert").html(error.responseText);
            } else if (error.status === 400) {
              $(".notif-alert").html(error.responseText);
            } else if (error.status === 402) {
              $(".notif-alert").html(error.responseText);
            }
            btnSend.toggleClass("d-none");
            btnLoad.toggleClass("d-none");
          });
      } else {
        $.ajax({
          url: alerttURL,
          type: "GET",
          success: function (response) {
            $(".notif-alert").html(response);
          },
        });
        btnSend.toggleClass("d-none");
        btnLoad.toggleClass("d-none");
      }
    }
  });
});
