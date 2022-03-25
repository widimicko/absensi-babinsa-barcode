<?= $this->extend('template/index') ?>

<?= $this->section('body') ?>

<div class="container">

  <div class="my-5 bg-primary-green text-white p-3">
    <div data-aos="fade-down" class="row justify-content-between">
      <div class="col-md-6">
        <img src="<?= base_url('/image/logo_tniad.png') ?>" height="140px" alt="">
      </div>
      <div class="col-md-6">
        <p class="fs-1">Koramil 0827/18 Kangean</p>
      </div>
    </div>
  </div>
  <div class="my-3">
    <div class="row justify-content-center gap-4">
      <div data-aos="fade-right" class="col-6 border shadow text-white text-center bg-primary" style="position: relative; height: 200px; width: 200px;">
          <a href="<?= base_url('/absence/in') ?>" class="text-white nav-link fs-4 stretched-link">Masuk</a>
          <p class="fs-1"><i class="bi bi-box-arrow-in-right"></i></p>
      </div>
      <div data-aos="fade-left" class="col-6 border shadow text-white text-center bg-info" style="position: relative; height: 200px; width: 200px;">
        <a href="<?= base_url('/absence/out') ?>" class="text-white nav-link fs-4 stretched-link">Pulang</a>
        <p class="fs-1"><i class="bi bi-box-arrow-right"></i></p>
      </div>
    </div>
  </div>
  <div data-aos="fade-up" class="my-5 bg-primary-green text-white p-3">
    <div class="text-center">
      <p id="liveClock"></p>
      <p><?= date('l, d M Y') ?></p>
      <p>Sistem Absensi Babinsa Berbasis Web Menggunakan Barcode</p>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
