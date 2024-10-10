<div class="row">
  <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-10">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">Rp. <span id="valRpPemasukkan"></span></h3>
              <p class="ml-2 mb-0
            font-weight-medium" id="cPerPemasukkan"><span id="valPerPemasukkan"></span>%</p>
            </div>
          </div>
          <div class="col-2">
            <div class="icon icon-box-success d-none" id="arrowUpPemasukkan">
              <span class="mdi mdi-arrow-top-right icon-item"></span>
            </div>
            <div class="icon icon-box-danger d-none" id="arrowDownPemasukkan">
              <span class="mdi mdi-arrow-bottom-left icon-item"></span>
            </div>
            <div class="icon icon-box-secondary d-none" id="arrowMinPemasukkan">
              <span class="mdi mdi-minus icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Pemasukkan di bulan : <span id="bulanPemasukkan"></span></h6>
        <h6 class="text-muted font-weight-normal mt-1">Pemasukkan di tahun : <span id="tahunPemasukkan"></span></h6>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <div class="dropdown">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
              Change
            </button>
            <form class="dropdown-menu p-4" name="formlistpemasukkan" method="post">
              <div class="mb-3">
                <label for="bulanpemasukkan" class="form-label">Bulan</label>
                <select class="form-control text-white" id="listBulanPemasukkan" name="bulanpemasukkan">
                </select>
              </div>
              <div class="mb-3">
                <label for="tahunpemasukkan" class="form-label">Tahun</label>
                <select class="form-control text-white" id="listTahunPemasukkan" name="tahunpemasukkan">
                </select>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-10">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">Rp. <span id="valRpPengeluaran"></span></h3>
              <p class="ml-2 mb-0
            font-weight-medium" id="cPerPengeluaran"><span id="valPerPengeluaran"></span>%</p>
            </div>
          </div>
          <div class="col-2">
            <div class="icon icon-box-danger d-none" id="arrowUpPengeluaran">
              <span class="mdi mdi-arrow-top-right icon-item"></span>
            </div>
            <div class="icon icon-box-success d-none" id="arrowDownPengeluaran">
              <span class="mdi mdi-arrow-bottom-left icon-item"></span>
            </div>
            <div class="icon icon-box-secondary d-none" id="arrowMinPengeluaran">
              <span class="mdi mdi-minus icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Pengeluaran di bulan : <span id="bulanPengeluaran"></span></h6>
        <h6 class="text-muted font-weight-normal mt-1">Pengeluaran di tahun : <span id="tahunPengeluaran"></span></h6>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <div class="dropdown">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
              Change
            </button>
            <form class="dropdown-menu p-4" name="formlistpengeluaran" method="post">
              <div class="mb-3">
                <label for="bulanpengeluaran" class="form-label">Bulan</label>
                <select class="form-control text-white" id="listBulanPengeluaran" name="bulanpengeluaran">
                </select>
              </div>
              <div class="mb-3">
                <label for="tahunpengeluaran" class="form-label">Tahun</label>
                <select class="form-control text-white" id="listTahunPengeluaran" name="tahunpengeluaran">
                </select>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-10">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">Rp. <span id="valRpTabungan"></span></h3>
              <p class="ml-2 mb-0
            font-weight-medium" id="cPerTabungan"><span id="valPerTabungan"></span>%</p>
            </div>
          </div>
          <div class="col-2">
            <div class="icon icon-box-success d-none" id="arrowUpTabungan">
              <span class="mdi mdi-arrow-top-right icon-item"></span>
            </div>
            <div class="icon icon-box-danger d-none" id="arrowDownTabungan">
              <span class="mdi mdi-arrow-bottom-left icon-item"></span>
            </div>
            <div class="icon icon-box-secondary d-none" id="arrowMinTabungan">
              <span class="mdi mdi-minus icon-item"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Tabungan di bulan : <span id="bulanTabungan"></span></h6>
        <h6 class="text-muted font-weight-normal mt-1">Tabungan di tahun : <span id="tahunTabungan"></span></h6>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <div class="dropdown">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
              Change
            </button>
            <form class="dropdown-menu p-4" name="formlisttabungan" method="post">
              <div class="mb-3">
                <label for="bulantabungan" class="form-label">Bulan</label>
                <select class="form-control text-white" id="listBulanTabungan" name="bulantabungan">
                </select>
              </div>
              <div class="mb-3">
                <label for="tahuntabungan" class="form-label">Tahun</label>
                <select class="form-control text-white" id="listTahunTabungan" name="tahuntabungan">
                </select>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>