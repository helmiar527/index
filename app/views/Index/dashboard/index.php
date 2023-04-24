<div class="row">
  <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h4 class="mb-0">Rp. <?= $data['pemasukkanindex']; ?></h4>
              <p class="text-<?= $data['colorpemasukkanindex']; ?> ml-2 mb-0 font-weight-medium"><?= $data['pemasukkanindexpersen']; ?>%</p>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-<?= $data['colorpemasukkanindex']; ?>">
              <span class="mdi <?= $data['iconpemasukkanindex']; ?> icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Pemasukkan bulan ini</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
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
  </div>
  <!-- <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h4 class="mb-0">$17.34</h4>
              <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success">
              <span class="mdi mdi-arrow-top-right icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Revenue current</h6>
      </div>
    </div>
  </div> -->
  <!-- <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">$31.53</h3>
              <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success">
              <span class="mdi mdi-arrow-top-right icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Expense current</h6>
      </div>
    </div>
  </div> -->
</div>