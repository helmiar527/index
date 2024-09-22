<script type="text/javascript" src="<?= JSCORONA; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA0; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA12; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA13; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA1; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA3; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA2; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA5; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA4; ?>"></script>
<script type="text/javascript" src="<?= JSFORMVALIDATION; ?>"></script>
<script>
  $(function() {
    const formAdd = document.forms["formaddtabungan"];
    const pathSegments = window.location.pathname.split('/');
    const desiredPath = pathSegments.slice(0, pathSegments.indexOf('dashboard') + 1).join('/');
    const scriptURLGet = window.location.origin + desiredPath + "/getTabungan";
    const scriptURLTambah = window.location.origin + desiredPath + "/tambahTabungan";
    const scriptURLDel = window.location.origin + desiredPath + "/deleteTabungan";
    const scriptURLEdit = window.location.origin + desiredPath + "/ubahTabungan";
    const btnLoadRefresh = $("#loadButtonRefresh");
    const btnSendRefresh = $("#submitButtonRefresh");
    const btnLoadUrutan = $("#loadButtonUrutan");
    const btnSendUrutan = $("#submitButtonUrutan");
    const btnLoadSearch = $("#loadButtonSearch");
    const btnSendSearch = $("#submitButtonSearch");
    const btnLoadTambah = $("#loadButtonTambah");
    const btnSendTambah = $("#submitButtonTambah");
    const btnLoadEdit = $("#loadButtonEdit");
    const btnSendEdit = $("#submitButtonEdit");
    const timeOut = 3000;
    const formDataSelect = new FormData();
    const other = {
      urutan: $("#submitButtonUrutan").val(),
      searching: $("#searching").val()
    }

    function clearAlertTambah() {
      $(".notif-alert-tambah").html("");
    }

    function clearAlertUniversal() {
      $(".notif-alert-universal").html("");
    }

    function getTabungan(data) {
      formDataSelect.append('urutan', data.urutan);
      formDataSelect.append('searching', data.searching);
      $.ajax({
          url: scriptURLGet,
          type: "POST",
          data: formDataSelect,
          dataType: 'json',
          processData: false,
          contentType: false,
        })
        .done((response) => {
          $("#dataTable tbody").html("");
          var tbody = $('#dataTable tbody');
          var dataIDs = [];
          $.each(response, function(index, item) {
            dataIDs.push(item.id);
            var row = $('<tr>');
            row.append('<td>' + (index + 1) + '</td>');
            row.append('<td>' + item.hari + '</td>');
            row.append('<td>' + item.tanggal + '</td>');
            row.append('<td>' + item.tabungan + '</td>');
            row.append('<td>' + item.nominal + '</td>');
            var labelClass = item.status == 1 ? 'badge badge-success' : 'badge badge-warning';
            var labelText = item.status == 1 ? 'confirm' : 'unconfirm';
            var statusHtml = '<label class="' + labelClass + '">' + labelText + '</label>';
            row.append('<td>' + statusHtml + '</td>');
            row.append(
              '<td>' +
              '<button type="button" class="btn btn-danger btn-icon-text mb-3 mainButton" data-id="' + item.id + '" data-name="' + item.tabungan + '">' +
              '<i class="mdi mdi-backspace btn-icon-prepend"></i>' +
              '</button>' +
              '<button type="button" class="btn btn-success btn-icon-text mb-3 submitButtonHapus d-none mr-1">' +
              '<i class="mdi mdi-check btn-icon-prepend"></i>' +
              '</button>' +
              '<button type="button" class="btn btn-secondary btn-icon-text mb-3 cancelButtonHapus d-none">' +
              '<i class="mdi mdi-close btn-icon-prepend"></i>' +
              '</button>' +
              '<button type="button" class="btn btn-danger btn-icon-text mb-3 failedButtonHapus d-none">' +
              '<i class="mdi mdi-close btn-icon-prepend"></i>' +
              '</button>' +
              '<button type="button" class="btn btn-danger mb-3 loadButtonHapus d-none" disabled>' +
              '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
              '</button>' +
              '</td>'
            );
            row.append(
              '<td>' +
              '<button type="button" class="btn btn-primary btn-icon-text mb-3 editButton" data-id="' + item.id + '" data-hari="' + item.hari + '" data-tanggal="' + item.tanggal + '" data-tabungan="' + item.tabungan + '"data-nominal="' + item.nominal + '" data-status="' + item.status + '">' +
              '<i class="mdi mdi-pencil btn-icon-prepend"></i>' +
              '</button>' +
              '</td>'
            );
            tbody.append(row);
          });
          btnLoadRefresh.addClass("d-none");
          btnSendRefresh.removeClass("d-none");
          btnLoadUrutan.addClass("d-none");
          btnSendUrutan.removeClass("d-none");
          btnSendSearch.removeClass("d-none");
          btnLoadSearch.addClass("d-none");
        })
        .fail((error) => {
          btnLoadRefresh.addClass("d-none");
          btnSendRefresh.removeClass("d-none");
          btnLoadUrutan.addClass("d-none");
          btnSendUrutan.removeClass("d-none");
          btnSendSearch.removeClass("d-none");
          btnLoadSearch.addClass("d-none");
        })
    }

    getTabungan(other);

    $("#submitButtonRefresh").on('click', function() {
      btnLoadRefresh.removeClass("d-none");
      btnSendRefresh.addClass("d-none");
      getTabungan(other);
    });

    $("#submitButtonUrutan").on('change', function() {
      btnLoadUrutan.removeClass("d-none");
      btnSendUrutan.addClass("d-none");
      const selectedValue = {
        urutan: $(this).val(),
        searching: $("#searching").val()
      }
      getTabungan(selectedValue);
    });

    $("#submitButtonSearch").on('click', function() {
      btnLoadSearch.removeClass("d-none");
      btnSendSearch.addClass("d-none");
      const selectedValue = {
        urutan: $("#urutan").val(),
        searching: $("#searching").val()
      }
      getTabungan(selectedValue);
    });

    $(document).on('click', '.mainButton', function() {
      const row = $(this).closest('tr');
      const mainButton = row.find('.mainButton');
      const submitButton = row.find('.submitButtonHapus');
      const cancelButton = row.find('.cancelButtonHapus');

      mainButton.addClass('d-none');
      submitButton.removeClass('d-none');
      cancelButton.removeClass('d-none');
    });

    $(document).on('click', '.cancelButtonHapus', function() {
      const row = $(this).closest('tr');
      const mainButton = row.find('.mainButton');
      const submitButton = row.find('.submitButtonHapus');
      const cancelButton = row.find('.cancelButtonHapus');

      submitButton.addClass('d-none');
      cancelButton.addClass('d-none');
      mainButton.removeClass('d-none');
    });

    $(document).on('click', '.submitButtonHapus', function() {
      const id = $(this).closest('td').find('.mainButton').data('id');
      const name = $(this).closest('td').find('.mainButton').data('name');
      const row = $(this).closest('tr');
      const submitButton = row.find('.submitButtonHapus');
      const loadButton = row.find('.loadButtonHapus');
      const cancelButton = row.find('.cancelButtonHapus');
      const failedButton = row.find('.failedButtonHapus');

      submitButton.addClass('d-none');
      cancelButton.addClass('d-none');
      loadButton.removeClass('d-none');

      $.ajax({
          url: scriptURLDel,
          type: "POST",
          data: {
            id: id,
            name: name
          },
        })
        .done((response) => {
          loadButton.addClass('d-none');
          submitButton.removeClass('d-none');
          getTabungan(other);
          $(".notif-alert-universal").html(response);
          setTimeout(clearAlertUniversal, timeOut);
        })
        .fail((error) => {
          loadButton.addClass('d-none');
          failedButton.removeClass('d-none');
          getTabungan(other);
          $(".notif-alert-universal").html(error.responseText);
          setTimeout(clearAlertUniversal, timeOut);
        })
    });

    $(formAdd).submit((e) => {
      if (formAdd.checkValidity()) {
        e.preventDefault();
        e.stopPropagation();
        btnSendTambah.addClass("d-none");
        btnLoadTambah.removeClass("d-none");
        const inputTanggal = document.getElementById("tambahtanggal").value;
        const tanggalInput = new Date(inputTanggal);
        const indeksHari = tanggalInput.getDay();
        const namaHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        document.getElementById('tambahhari').value = namaHari[indeksHari];
        $.ajax({
            url: scriptURLTambah,
            type: "POST",
            data: new FormData(formAdd),
            processData: false,
            contentType: false,
          })
          .done((response) => {
            btnSendTambah.removeClass("d-none");
            btnLoadTambah.addClass("d-none");
            $(".notif-alert-tambah").html(response);
            formAdd.reset();
            formAdd.classList.remove("was-validated");
            setTimeout(clearAlertTambah, timeOut);
          })
          .fail((error) => {
            btnSendTambah.removeClass("d-none");
            btnLoadTambah.addClass("d-none");
            $(".notif-alert-tambah").html(error.responseText);
            formAdd.reset();
            formAdd.classList.remove("was-validated");
            setTimeout(clearAlertTambah, timeOut);
          })
      }
    });
    $(document).on('click', '.editButton', function() {
      const id = $(this).data('id');
      const hari = $(this).data('hari');
      const tanggal = $(this).data('tanggal');
      const tabungan = $(this).data('tabungan');
      const nominal = $(this).data('nominal');
      const status = $(this).data('status');

      $('#editid').val(id);
      $('#edithari').val(hari);
      $('#edittanggal').val(tanggal);
      $('#edittabungan').val(tabungan);
      $('#editnominal').val(nominal);
      $('#editstatus').val(status);

      $('#editModal').modal('show');
    });
    $(document).on('submit', 'form[name="formedittabungan"]', function(e) {
      e.preventDefault();
      btnLoadEdit.removeClass("d-none");
      btnSendEdit.addClass("d-none");
      const data = {
        id: $('#editid').val(),
        hari: $('#edithari').val(),
        tanggal: $('#edittanggal').val(),
        tabungan: $('#edittabungan').val(),
        nominal: $('#editnominal').val(),
        status: $('#editstatus').val()
      };
      $.ajax({
          url: scriptURLEdit,
          type: "POST",
          data: JSON.stringify(data),
        })
        .done((response) => {
          btnLoadEdit.addClass("d-none");
          btnSendEdit.removeClass("d-none");
          $('#editModal').modal('hide');
          $(".notif-alert-universal").html(response);
          getTabungan(other);
          setTimeout(clearAlertUniversal, timeOut);
        })
        .fail((error) => {
          btnLoadEdit.addClass("d-none");
          btnSendEdit.removeClass("d-none");
          $('#editModal').modal('hide');
          $(".notif-alert-universal").html(error.responseText);
          getTabungan(other);
          setTimeout(clearAlertUniversal, timeOut);
        })
    });
  });
</script>