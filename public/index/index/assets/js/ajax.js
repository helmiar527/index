$(function() {
  const form = document.forms["sendtoadmin"];
  const scriptURL =
    window.location.origin + window.location.pathname + "index/inContact";
  const btnLoad = $("#loadButton");
  const btnSend = $("#submitButton");
  const timeInput = document.getElementById('time');
  const currentTime = new Date().toLocaleTimeString('en-US', {
    hour12: false
  });
  const dateInput = document.getElementById('date');
  const formattedDate = new Date().toLocaleDateString('id-ID');
  $(".needs-validation").submit((e) => {
    e.preventDefault();
    e.stopPropagation();
    if (form.checkValidity()) {
      timeInput.value = currentTime;
      dateInput.value = formattedDate;
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
          $(".alert-push").html(error.responseText);
          btnSend.toggleClass("d-none");
          btnLoad.toggleClass("d-none");
        })
    }
  });
});