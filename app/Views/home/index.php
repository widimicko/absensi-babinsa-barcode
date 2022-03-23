<?= $this->extend('template/index') ?>

<?= $this->section('body') ?>

<div class="container">

  <div class="my-5 bg-primary-green text-white p-3">
    <div class="row justify-content-between">
      <div class="col-md-6">
        <img src="<?= base_url('/image/logo_tniad.png') ?>" height="140px" alt="">
      </div>
      <div class="col-md-6">
        <p class="fs-1">Koramil 0827/18 Kangean</p>
      </div>
    </div>
  </div>
  <div class="my-3">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <a href="<?= base_url('/absence/in') ?>" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i> Masuk</a>
      </div>
      <div class="col-md-6">
        <a href="<?= base_url('/absence/out') ?>" class="btn btn-info"><i class="bi bi-box-arrow-right"></i> Pulang</a>
      </div>
    </div>
  </div>
  <div class="my-5 bg-primary-green text-white p-3">
    <div class="text-center">
      <p id="liveClock"></p>
      <p><?= date('l, d M Y') ?></p>
      <p>Sistem Absensi Babinsa Berbasis Web Menggunakan Barcode</p>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
