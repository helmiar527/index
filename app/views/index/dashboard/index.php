<!-- <div class="row">
<div class="col-xl-4 col-sm-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-9">
          <div class="d-flex align-items-center align-self-start">
            <h4 class="mb-0">Rp. <?= $data['pemasukkanindex']; ?></h4>
            <p class="text-<?= $data['colorpemasukkanindex']; ?> ml-2 mb-0
            font-weight-medium"><?= $data['pemasukkanindexpersen']; ?>%</p>
          </div>
        </div>
        <div class="col-3">
          <div class="icon icon-box-<?= $data['colorpemasukkanindex']; ?>">
            <span class="mdi <?= $data['iconpemasukkanindex']; ?> icon-item"></span>
          </div>
        </div>
      </div>
      <h6 class="text-muted font-weight-normal">Pemasukkan bulan : <span id="bulan"></span></h6>
    <select class="form-select form-select-sm bg-dark text-white" id="bulanSelect" onchange="tampilkanDaftarBulan(this.value)">
    </select>
      <h6 class="text-muted font-weight-normal mt-1">Pemasukkan tahun : <span id="tahun"></span></h6>
    <select class="form-select form-select-sm bg-dark text-white" id="tahunSelect" onchange="tampilkanDaftarTahun(this.value)">
    </select>
    </div>
  </div>
</div> -->
<!--   <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-9">
          <div class="d-flex align-items-center align-self-start">
            <h4 class="mb-0">Rp. <?= $data['pengeluaranindex']; ?></h4>
            <p class="text-<?= $data['colorpengeluaranindex']; ?> ml-2 mb-0 font-weight-medium"><?= $data['pengeluaranindexpersen']; ?>%</p>
          </div>
        </div>
        <div class="col-3">
          <div class="icon icon-box-<?= $data['colorpengeluaranindex']; ?>">
            <span class="mdi <?= $data['iconpengeluaranindex']; ?> icon-item"></span>
          </div>
        </div>
      </div>
      <h6 class="text-muted font-weight-normal">Pengeluaran bulan ini</h6>
    </div>
  </div>
</div> -->
<!--   <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-9">
          <div class="d-flex align-items-center align-self-start">
            <h4 class="mb-0">Rp. <?= $data['tabunganindex']; ?></h4>
            <p class="text-<?= $data['colortabunganindex']; ?> ml-2 mb-0
            font-weight-medium"><?= $data['tabunganindexpersen']; ?>%</p>
          </div>
        </div>
        <div class="col-3">
          <div class="icon icon-box-<?= $data['colortabunganindex']; ?>">
            <span class="mdi <?= $data['icontabunganindex']; ?> icon-item"></span>
          </div>
        </div>
      </div>
      <h6 class="text-muted font-weight-normal">Tabungan bulan ini</h6>
    </div>
  </div>
</div> -->
<!-- </div>
<script type="text/javascript" src="<?= JSJQUERYINDEX; ?>"></script>
<script>
  const scriptURL =
    window.location.origin + window.location.pathname + "/getBulanPemasukkan";
      $.ajax({
        url: scriptURL,
        type: "GET",
        processData: false,
        contentType: false,
      })
        .done((response) => {
  var bulan = JSON.parse(response);
  var select = document.getElementById("bulanSelect");
  for (var i = 0; i < bulan.length; i++) {
    var option = document.createElement("option");
    option.value = bulan[i];
    option.text = bulan[i];
    select.appendChild(option);
  }
        })
        .fail((error) => {
          console.log(error);
        });
</script>
<script>
  function tampilkanDaftarBulan(bulanSelect) {
            // var januari = document.getElementById('Januari');
            // var februari = document.getElementById('februari');
            var bulan = document.getElementById('bulan');

            if (bulanSelect === 'January') {
                bulan.innerHTML = "Januari";
            } else if (bulanSelect === 'February') {
              bulan.innerHTML = "Februari";
            }
            }
</script> -->