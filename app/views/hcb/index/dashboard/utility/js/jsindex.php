<script type="text/javascript" src="<?= JSCORONA; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA0; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA6; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA7; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA8; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA9; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA10; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA1; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA3; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA2; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA5; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA4; ?>"></script>
<script type="text/javascript" src="<?= JSCORONA11; ?>"></script>
<script>
  $(function() {
    const formListPemasukkan = document.forms["formlistpemasukkan"];
    const formListPengeluaran = document.forms["formlistpengeluaran"];
    const formListTabungan = document.forms["formlisttabungan"];
    const pathSegments = window.location.pathname.split('/');
    const desiredPath = pathSegments.slice(0, pathSegments.indexOf('dashboard') + 1).join('/');
    const scriptURLGetBulanTahunPemasukkan = window.location.origin + desiredPath + "/getBulanTahunPemasukkanIndex";
    const scriptURLGetAllIndexPemasukkan = window.location.origin + desiredPath + "/getAllPemasukkanIndex";
    const scriptURLGetBulanTahunPengeluaran = window.location.origin + desiredPath + "/getBulanTahunPengeluaranIndex";
    const scriptURLGetAllIndexPengeluaran = window.location.origin + desiredPath + "/getAllPengeluaranIndex";
    const scriptURLGetBulanTahunTabungan = window.location.origin + desiredPath + "/getBulanTahunTabunganIndex";
    const scriptURLGetAllIndexTabungan = window.location.origin + desiredPath + "/getAllTabunganIndex";
    const listBulanPemasukkan = $("#listBulanPemasukkan");
    const listTahunPemasukkan = $("#listTahunPemasukkan");
    const listBulanPengeluaran = $("#listBulanPengeluaran");
    const listTahunPengeluaran = $("#listTahunPengeluaran");
    const listBulanTabungan = $("#listBulanTabungan");
    const listTahunTabungan = $("#listTahunTabungan");
    const dBulanPemasukkan = $("#bulanPemasukkan");
    const dTahunPemasukkan = $("#tahunPemasukkan");
    const dBulanPengeluaran = $("#bulanPengeluaran");
    const dTahunPengeluaran = $("#tahunPengeluaran");
    const dBulanTabungan = $("#bulanTabungan");
    const dTahunTabungan = $("#tahunTabungan");
    const vRpPemasukkan = $("#valRpPemasukkan");
    const vPerPemasukkan = $("#valPerPemasukkan");
    const vRpPengeluaran = $("#valRpPengeluaran");
    const vPerPengeluaran = $("#valPerPengeluaran");
    const vRpTabungan = $("#valRpTabungan");
    const vPerTabungan = $("#valPerTabungan");
    const arrowUpPemasukkan = $("#arrowUpPemasukkan");
    const arrowDownPemasukkan = $("#arrowDownPemasukkan");
    const arrowMinPemasukkan = $("#arrowMinPemasukkan");
    const arrowUpPengeluaran = $("#arrowUpPengeluaran");
    const arrowDownPengeluaran = $("#arrowDownPengeluaran");
    const arrowMinPengeluaran = $("#arrowMinPengeluaran");
    const arrowUpTabungan = $("#arrowUpTabungan");
    const arrowDownTabungan = $("#arrowDownTabungan");
    const arrowMinTabungan = $("#arrowMinTabungan");
    const cPerPemasukkan = $("#cPerPemasukkan");
    const cPerPengeluaran = $("#cPerPengeluaran");
    const cPerTabungan = $("#cPerTabungan");
    const bulanTahun = {
      currentYear: new Date().getFullYear()
    }

    function formatRupiah(angka) {
      return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function getPemasukkanIndex() {
      $.ajax({
          url: scriptURLGetAllIndexPemasukkan,
          type: "POST",
          data: new FormData(formListPemasukkan),
          dataType: 'json',
          processData: false,
          contentType: false
        })
        .done((response) => {
          vRpPemasukkan.html(formatRupiah(response.totalini));
          const total1 = response.totalini - response.totalsebelumnya;
          const total2 = total1 / response.totalsebelumnya;
          const persen = total2 * 100;
          if (!isFinite(persen) || isNaN(persen)) {
            vPerPemasukkan.html(0);
          } else {
            vPerPemasukkan.html(persen.toFixed(2));
          }
          if (response.totalini < response.totalsebelumnya) {
            arrowMinPemasukkan.addClass("d-none");
            arrowUpPemasukkan.addClass("d-none");
            arrowDownPemasukkan.removeClass("d-none");
            cPerPemasukkan.removeClass("text-secondary");
            cPerPemasukkan.removeClass("text-success");
            cPerPemasukkan.addClass("text-danger");
          } else {
            if (!isFinite(persen) || isNaN(persen)) {
              arrowUpPemasukkan.addClass("d-none");
              arrowDownPemasukkan.addClass("d-none");
              arrowMinPemasukkan.removeClass("d-none");
              cPerPemasukkan.removeClass("text-success");
              cPerPemasukkan.removeClass("text-danger");
              cPerPemasukkan.addClass("text-secondary");
            } else {
              arrowMinPemasukkan.addClass("d-none");
              arrowDownPemasukkan.addClass("d-none");
              arrowUpPemasukkan.removeClass("d-none");
              cPerPemasukkan.removeClass("text-secondary");
              cPerPemasukkan.removeClass("text-danger");
              cPerPemasukkan.addClass("text-success");
            }
          }
        })
        .fail((error) => {
          console.log(error);
        })
    }

    function getPengeluaranIndex() {
      $.ajax({
          url: scriptURLGetAllIndexPengeluaran,
          type: "POST",
          data: new FormData(formListPengeluaran),
          dataType: 'json',
          processData: false,
          contentType: false
        })
        .done((response) => {
          vRpPengeluaran.html(formatRupiah(response.totalini));
          const total1 = response.totalini - response.totalsebelumnya;
          const total2 = total1 / response.totalsebelumnya;
          const persen = total2 * 100;
          if (!isFinite(persen) || isNaN(persen)) {
            vPerPengeluaran.html(0);
          } else {
            vPerPengeluaran.html(persen.toFixed(2));
          }
          if (response.totalini < response.totalsebelumnya) {
            arrowMinPengeluaran.addClass("d-none");
            arrowUpPengeluaran.addClass("d-none");
            arrowDownPengeluaran.removeClass("d-none");
            cPerPengeluaran.removeClass("text-secondary");
            cPerPengeluaran.removeClass("text-danger");
            cPerPengeluaran.addClass("text-success");
          } else {
            if (!isFinite(persen) || isNaN(persen)) {
              arrowUpPengeluaran.addClass("d-none");
              arrowDownPengeluaran.addClass("d-none");
              arrowMinPengeluaran.removeClass("d-none");
              cPerPengeluaran.removeClass("text-success");
              cPerPengeluaran.removeClass("text-danger");
              cPerPengeluaran.addClass("text-secondary");
            } else {
              if (persen == 0) {
                arrowUpPengeluaran.addClass("d-none");
                arrowDownPengeluaran.addClass("d-none");
                arrowMinPengeluaran.removeClass("d-none");
                cPerPengeluaran.removeClass("text-danger");
                cPerPengeluaran.removeClass("text-success");
                cPerPengeluaran.addClass("text-secondary");
              } else {
                arrowMinPengeluaran.addClass("d-none");
                arrowDownPengeluaran.addClass("d-none");
                arrowUpPengeluaran.removeClass("d-none");
                cPerPengeluaran.removeClass("text-secondary");
                cPerPengeluaran.removeClass("text-success");
                cPerPengeluaran.addClass("text-danger");
              }
            }
          }
        })
        .fail((error) => {
          console.log(error);
        })
    }

    function getTabunganIndex() {
      $.ajax({
          url: scriptURLGetAllIndexTabungan,
          type: "POST",
          data: new FormData(formListTabungan),
          dataType: 'json',
          processData: false,
          contentType: false
        })
        .done((response) => {
          vRpTabungan.html(formatRupiah(response.totalini));
          const total1 = response.totalini - response.totalsebelumnya;
          const total2 = total1 / response.totalsebelumnya;
          const persen = total2 * 100;
          if (!isFinite(persen) || isNaN(persen)) {
            vPerTabungan.html(0);
          } else {
            vPerTabungan.html(persen.toFixed(2));
          }
          if (response.totalini < response.totalsebelumnya) {
            arrowMinTabungan.addClass("d-none");
            arrowUpTabungan.addClass("d-none");
            arrowDownTabungan.removeClass("d-none");
            cPerTabungan.removeClass("text-secondary");
            cPerTabungan.removeClass("text-success");
            cPerTabungan.addClass("text-danger");
          } else {
            if (!isFinite(persen) || isNaN(persen)) {
              arrowUpTabungan.addClass("d-none");
              arrowDownTabungan.addClass("d-none");
              arrowMinTabungan.removeClass("d-none");
              cPerTabungan.removeClass("text-success");
              cPerTabungan.removeClass("text-danger");
              cPerTabungan.addClass("text-secondary");
            } else {
              if (persen == 0) {
                arrowMinTabungan.removeClass("d-none");
                arrowDownTabungan.addClass("d-none");
                arrowUpTabungan.addClass("d-none");
                cPerTabungan.addClass("text-secondary");
                cPerTabungan.removeClass("text-danger");
                cPerTabungan.removeClass("text-success");
              } else {
                arrowMinTabungan.addClass("d-none");
                arrowDownTabungan.addClass("d-none");
                arrowUpTabungan.removeClass("d-none");
                cPerTabungan.removeClass("text-secondary");
                cPerTabungan.removeClass("text-danger");
                cPerTabungan.addClass("text-success");
              }
            }
          }
        })
        .fail((error) => {
          console.log(error);
        })
    }

    function getBulanTahunPemasukkan(data) {
      $.ajax({
          url: scriptURLGetBulanTahunPemasukkan,
          type: "POST",
          dataType: 'json',
          data: {},
        })
        .done((response) => {
          listTahunPemasukkan.empty();
          $.each(response, function(tahun) {
            listTahunPemasukkan.append($('<option>', {
              value: tahun,
              text: tahun
            }));
          });
          listTahunPemasukkan.val(data.currentYear);
          dTahunPemasukkan.html(data.currentYear);
          const selectedYear = listTahunPemasukkan.val();
          const months = response[selectedYear].map(bulan => {
            const date = new Date(`${selectedYear}-${bulan}-1`);
            return {
              name: date.toLocaleString('default', {
                month: 'long'
              }),
              value: (date.getMonth() + 1).toString().padStart(2, '0')
            };
          });

          listBulanPemasukkan.empty();
          $.each(months, function(index, bulan) {
            listBulanPemasukkan.append($('<option>', {
              value: bulan.value,
              text: bulan.name
            }));
          });
          const currentMonth = new Date().toLocaleString('default', {
            month: 'long'
          });
          const currentMonthNum = (new Date().getMonth() + 1).toString().padStart(2, '0');
          if (selectedYear == data.currentYear) {
            listBulanPemasukkan.val(currentMonthNum);
          }
          dBulanPemasukkan.html(currentMonth);
          getPemasukkanIndex();
        })
        .fail((error) => {
          console.log(error);
        })
    }

    function getBulanTahunPengeluaran(data) {
      $.ajax({
          url: scriptURLGetBulanTahunPengeluaran,
          type: "POST",
          dataType: 'json',
          data: {},
        })
        .done((response) => {
          listTahunPengeluaran.empty();
          $.each(response, function(tahun) {
            listTahunPengeluaran.append($('<option>', {
              value: tahun,
              text: tahun
            }));
          });
          listTahunPengeluaran.val(data.currentYear);
          dTahunPengeluaran.html(data.currentYear);
          const selectedYear = listTahunPengeluaran.val();
          const months = response[selectedYear].map(bulan => {
            const date = new Date(`${selectedYear}-${bulan}-1`);
            return {
              name: date.toLocaleString('default', {
                month: 'long'
              }),
              value: (date.getMonth() + 1).toString().padStart(2, '0')
            };
          });
          listBulanPengeluaran.empty();
          $.each(months, function(index, bulan) {
            listBulanPengeluaran.append($('<option>', {
              value: bulan.value,
              text: bulan.name
            }));
          });
          const currentMonth = new Date().toLocaleString('default', {
            month: 'long'
          });
          const currentMonthNum = (new Date().getMonth() + 1).toString().padStart(2, '0');
          if (selectedYear == data.currentYear) {
            listBulanPengeluaran.val(currentMonthNum);
          }
          dBulanPengeluaran.html(currentMonth);
          getPengeluaranIndex();
        })
        .fail((error) => {
          console.log(error);
        })
    }

    function getBulanTahunTabungan(data) {
      $.ajax({
          url: scriptURLGetBulanTahunTabungan,
          type: "POST",
          dataType: 'json',
          data: {},
        })
        .done((response) => {
          listTahunTabungan.empty();
          $.each(response, function(tahun) {
            listTahunTabungan.append($('<option>', {
              value: tahun,
              text: tahun
            }));
          });
          listTahunTabungan.val(data.currentYear);
          dTahunTabungan.html(data.currentYear);
          const selectedYear = listTahunTabungan.val();
          const months = response[selectedYear].map(bulan => {
            const date = new Date(`${selectedYear}-${bulan}-1`);
            return {
              name: date.toLocaleString('default', {
                month: 'long'
              }),
              value: (date.getMonth() + 1).toString().padStart(2, '0')
            };
          });
          listBulanTabungan.empty();
          $.each(months, function(index, bulan) {
            listBulanTabungan.append($('<option>', {
              value: bulan.value,
              text: bulan.name
            }));
          });
          const currentMonth = new Date().toLocaleString('default', {
            month: 'long'
          });
          const currentMonthNum = (new Date().getMonth() + 1).toString().padStart(2, '0');
          if (selectedYear == data.currentYear) {
            listBulanTabungan.val(currentMonthNum);
          }
          dBulanTabungan.html(currentMonth);
          getTabunganIndex();
        })
        .fail((error) => {
          console.log(error);
        })
    }

    getBulanTahunPemasukkan(bulanTahun);
    getBulanTahunPengeluaran(bulanTahun);
    getBulanTahunTabungan(bulanTahun);

    listTahunPemasukkan.change(function() {
      const bulanTahun = {
        currentYear: listTahunPemasukkan.val()
      }
      getBulanTahunPemasukkan(bulanTahun);
    });
    listTahunPengeluaran.change(function() {
      const bulanTahun = {
        currentYear: listTahunPengeluaran.val()
      }
      getBulanTahunPengeluaran(bulanTahun);
    });
    listTahunTabungan.change(function() {
      const bulanTahun = {
        currentYear: listTahunTabungan.val()
      }
      getBulanTahunTabungan(bulanTahun);
    });
    listBulanPemasukkan.change(function() {
      dBulanPemasukkan.html(listBulanPemasukkan.find('option:selected').text());
      getPemasukkanIndex();
    });
    listBulanPengeluaran.change(function() {
      dBulanPengeluaran.html(listBulanPengeluaran.find('option:selected').text());
      getPengeluaranIndex();
    });
    listBulanTabungan.change(function() {
      dBulanTabungan.html(listBulanTabungan.find('option:selected').text());
      getTabunganIndex();
    });
  });
</script>