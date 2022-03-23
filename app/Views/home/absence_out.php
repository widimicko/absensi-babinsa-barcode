<?= $this->extend('template/index') ?>

<?= $this->section('body') ?>

<div class="container">
  <h1 class="text-center mt-4">Sistem Absensi Babinsa Berbasis Web Menggunakan Barcode</h1>

  <div class="row justify-content-center g-4 mt-5">
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card border border-success">
        <div class="p-4">
          <div id="analogClock"></div>
        </div>
        <div class="bg-primary-green text-white p-3">
          <p class="fs-3" id="liveClock"></p>
          <p><?= date('l, d M Y') ?></p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
    <div id="analogClock"></div>
      <p class="fs-1">Koramil 0827/18 Kangean</p>
      <div class="card mt-2 p-4 border border-success">
        <div class="d-flex gap-3 justify-content-center align-items-center">
          <img src="<?= base_url('image/icon/barcode.png') ?>" alt="barcode">
          <p>Absen Pulang</p>
        </div>
        <div id="scanner" class="mt-3"></div>
        <input type="text" name="credential" id="credential" class="form-control mt-3" placeholder="Scan barcode" autofocus>
        <a href="<?= base_url('/') ?>" class="text-center"><i class="bi bi-arrow-left"></i> Kembali ke Home</a>
      </div>
      <div class="row mt-4">
        <div class="col-6 bg-success text-white p-3">
          <p>Sudah Pulang</p>
          <p>10</p>
        </div>
        <div class="col-6 bg-danger text-white p-3">
          <p>Belum Pulang</p>
          <p>2</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card border border-success">
        <p class="fs-3 text-center">5 Absensi Pulang Terakhir</p>
        <?php if (true) : ?>
          <div style="height: 500px;"></div>
        <?php endif; ?>
        <div class="bg-primary-green text-white p-3">
          <marquee><p class="fs-5">Selamat Datang</p></marquee>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
