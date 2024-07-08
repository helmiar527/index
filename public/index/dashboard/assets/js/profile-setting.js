$(function() {
  const formProfile = document.forms["formProfile"];
  const btnSendProfile = $("#submitButtonProfile");
  const btnLoadProfile = $("#loadButtonProfile");
  const pathSegmentsProfile = window.location.pathname.split('/');
  const desiredPathProfile = pathSegmentsProfile.slice(0, pathSegmentsProfile.indexOf('dashboard') + 1).join('/');
  const scriptURLProfile = window.location.origin + desiredPathProfile + "/updateProfile";
  const formPicture = document.forms["formPicture"];
  const btnSendPicture = $("#submitButtonPicture");
  const btnLoadPicture = $("#loadButtonPicture");
  const pathSegmentsPicture = window.location.pathname.split('/');
  const desiredPathPicture = pathSegmentsPicture.slice(0, pathSegmentsPicture.indexOf('dashboard') + 1).join('/');
  const scriptURLPicture = window.location.origin + desiredPathPicture + "/pictureProfilUpdate";
  const btnSendPictureDel = $("#submitButtonPictureDel");
  const btnLoadPictureDel = $("#loadButtonPictureDel");
  const pathSegmentsPictureDel = window.location.pathname.split('/');
  const desiredPathPictureDel = pathSegmentsPictureDel.slice(0, pathSegmentsPictureDel.indexOf('dashboard') + 1).join('/');
  const scriptURLPictureDel = window.location.origin + desiredPathPictureDel + "/deleteFotoProfil";
  const formAccount = document.forms["formAccount"];
  const btnSendAccount = $("#submitButtonAccount");
  const btnLoadAccount = $("#loadButtonAccount");
  const pathSegmentsAccount = window.location.pathname.split('/');
  const desiredPathAccount = pathSegmentsAccount.slice(0, pathSegmentsAccount.indexOf('dashboard') + 1).join('/');
  const scriptURLAccount = window.location.origin + desiredPathAccount + "/accountProfileUpdate";
  const timeOut = 3000;

  function clearAlert() {
      $(".notif-alert").html("");
  }

  function clearAlertReload() {
      $(".notif-alert").html("");
      location.reload();
  }


  $(formProfile).submit((e) => {
      e.preventDefault();
      e.stopPropagation();
      btnSendProfile.toggleClass("d-none");
      btnLoadProfile.toggleClass("d-none");
      $.ajax({
              url: scriptURLProfile,
              type: "POST",
              data: new FormData(formProfile),
              processData: false,
              contentType: false,
          })
          .done((response) => {
              btnSendProfile.toggleClass("d-none");
              btnLoadProfile.toggleClass("d-none");
              $(".notif-alert").html(response);
              const timer = setTimeout(clearAlert, timeOut);
          })
          .fail((error) => {
              btnSendProfile.toggleClass("d-none");
              btnLoadProfile.toggleClass("d-none");
              $(".notif-alert").html(error.responseText);
              const timer = setTimeout(clearAlert, timeOut);
          });
  });
  $(formPicture).submit((e) => {
      e.preventDefault();
      e.stopPropagation();
      $("#updateProfilModal").modal('hide');
      btnSendPicture.toggleClass("d-none");
      btnLoadPicture.toggleClass("d-none");
      $.ajax({
              url: scriptURLPicture,
              type: "POST",
              data: new FormData(formPicture),
              processData: false,
              contentType: false,
          })
          .done((response) => {
              btnSendPicture.toggleClass("d-none");
              btnLoadPicture.toggleClass("d-none");
              $(".notif-alert").html(response);
              const timer = setTimeout(clearAlertReload, timeOut);
          })
          .fail((error) => {
              btnSendPicture.toggleClass("d-none");
              btnLoadPicture.toggleClass("d-none");
              $(".notif-alert").html(error.responseText);
              const timer = setTimeout(clearAlert, timeOut);
          });
  });
  $("#delPicture").click((e) => {
      $("#deleteProfilModal").modal('hide');
      btnSendPictureDel.toggleClass("d-none");
      btnLoadPictureDel.toggleClass("d-none");
      var xhr = new XMLHttpRequest();
      xhr.open('GET', scriptURLPictureDel, true);
      xhr.send();
      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
              $(".notif-alert").html(xhr.responseText);
              btnSendPictureDel.toggleClass("d-none");
              btnLoadPictureDel.toggleClass("d-none");
              const timer = setTimeout(clearAlertReload, timeOut);
          } else if (xhr.readyState == 4 && xhr.status != 200) {
              btnSendPictureDel.toggleClass("d-none");
              btnLoadPictureDel.toggleClass("d-none");
              $(".notif-alert").html(xhr.status);
              const timer = setTimeout(clearAlert, timeOut);
          }
      };
  });
  $(formAccount).submit((e) => {
      e.preventDefault();
      e.stopPropagation();
      btnSendAccount.toggleClass("d-none");
      btnLoadAccount.toggleClass("d-none");
      $.ajax({
              url: scriptURLAccount,
              type: "POST",
              data: new FormData(formAccount),
              processData: false,
              contentType: false,
          })
          .done((response) => {
              btnSendAccount.toggleClass("d-none");
              btnLoadAccount.toggleClass("d-none");
              $(".notif-alert").html(response);
              const timer = setTimeout(clearAlert, timeOut);
          })
          .fail((error) => {
              btnSendAccount.toggleClass("d-none");
              btnLoadAccount.toggleClass("d-none");
              $(".notif-alert").html(error.responseText);
              const timer = setTimeout(clearAlert, timeOut);
          });
  });
});