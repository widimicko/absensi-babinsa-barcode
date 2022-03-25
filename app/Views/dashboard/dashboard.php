<?= $this->extend('dashboard/template/main') ?>

<?= $this->section('main') ?>

<div class="mt-4">
  <p class="fs-3"><?= date('l, d M Y') ?></p>
  <div class="row justify-content-center">
    <div class="col-3">
      <div class="card bg-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row text-white">
            <div class="col-9">
              <p class="fs-4">Anggota Aktif</p>
              <p class="fs-4"><?= count($members) ?></p>
            </div>
            <div class="col-3">
              <p class="fs-1"><i class="bi bi-people-fill"></i></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card bg-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row text-white">
            <div class="col-9">
              <p class="fs-4">Anggota Masuk</p>
              <p class="fs-4"><?= count($membersIn) ?></p>
            </div>
            <div class="col-3">
              <p class="fs-1"><i class="bi bi-calendar-check"></i></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card bg-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row text-white">
            <div class="col-9">
              <p class="fs-4">Anggota Tidak Masuk</p>
              <p class="fs-4"><?= count($members) - count($membersIn) ?></p>
            </div>
            <div class="col-3">
              <p class="fs-1"><i class="bi bi-exclamation-octagon"></i></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card bg-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row text-white">
            <div class="col-9">
              <p class="fs-4">Anggota Pulang</p>
              <p class="fs-4"><?= count($membersOut) ?></p>
            </div>
            <div class="col-3">
              <p class="fs-1"><i class="bi bi-house-fill"></i></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
<div style="height: 700px; width: 100%;"></div>

  <?= $this->endSection() ?>