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
        <div class="d-flex flex-column gap-2">
          <div class="d-flex gap-3 justify-content-center align-items-center">
            <img src="<?= base_url('image/icon/barcode.png') ?>" alt="barcode">
            <p>Absen Pulang</p>
          </div>
          <div id="scanner" class="mt-3"></div>
          <?php if($message = session()->getFlashData('failed')) : ?>
              <div class="alert alert-danger" role="alert">
                  <?= $message ?>
              </div>
            <?php elseif($message = session()->getFlashData('success')) : ?>
              <div class="alert alert-success" role="alert">
                  <?= $message ?>
              </div>
            <?php endif ?>
            <form action="<?= base_url('/absence/Pulang') ?>" method="POST">
              <input type="text" name="credential" id="credentialInput" class="form-control mb-3" placeholder="Scan barcode" autofocus>
              <button type="submit" class="btn btn-primary" id="sumbitAbsence">Absen</button>
            </form>
          <a href="<?= base_url('/') ?>" class="text-center"><i class="bi bi-arrow-left"></i> Kembali ke Home</a>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-6 bg-success text-white p-3">
          <p>Sudah Pulang</p>
          <p><?= count($membersOut) ?></p>
        </div>
        <div class="col-6 bg-danger text-white p-3">
          <p>Belum Pulang</p>
          <p><?= count($membersIn) - count($membersOut) ?></p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card border border-success">
        <p class="fs-3 text-center">5 Absensi Pulang Terakhir</p>
        <div style="height: 500px; overflow-y: auto;">
          <div id="recents" class="p-2">
            <?php foreach($recents as $recent) : ?>
              <div class="row ">
                <div class="col-6">
                  <div class="">
                    <img src="<?= base_url('image/member/'. $recent['image']) ?>" class="image-fluid w-100" height="150px">								
                  </div>
                </div>
                <div class="col-6">
                  <div class="">
                  <p><?= $recent['name'] ?></p>
                  <p><?= $recent['rank'] ?></p>
                  <p><?= $recent['created_at'] ?></p>
                  </div>
                </div>
              </div>
              <hr />

            <?php endforeach; ?>
          </div>
        </div>
        <div class="bg-primary-green text-white p-3">
          <marquee><p class="fs-5">Selamat Datang</p></marquee>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
  function onScanSuccess(decodedText, decodedResult) {
    credentialInput.value = decodedText
  }

  let html5QrcodeScanner = new Html5QrcodeScanner("scanner", { 
    fps: 10,
    qrbox: { width: 250, height: 250 }
  },
  /* verbose= */
  false
  );
  html5QrcodeScanner.render(onScanSuccess);
</script>

<?= $this->endSection() ?>
