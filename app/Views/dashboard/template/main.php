<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('library/bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('library/datatable/datatables.min.css') ?>"/>
    <link rel="stylesheet" href="<?= base_url('library/select2/select2.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('/style/style.css') ?>">

    <title>Aplikasi Absensi | Dashboard</title>
  </head>
  <body>
    <?= $this->include('dashboard/template/header') ?>

    <div class="container-fluid">
      <div class="row">
        <?= $this->include('dashboard/template/sidebar') ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
          <?= $this->renderSection('main') ?>
        </main>
      </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel">Keluar Aplikasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Jika anda yakin untuk keluar aplikasi silahkan tekan tombol keluar dibawah ini.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <a href="<?= base_url('/logout') ?>" class="btn btn-primary">Keluar</a>
          </div>
        </div>
      </div>
    </div>
  

    <script src="<?= base_url('/library/jquery/jquery-slim.min.js') ?>"></script>
    <script src="<?= base_url('/library/bootstrap/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('library/datatable/pdfmake.min.js') ?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="<?= base_url('library/datatable/datatables.min.js') ?>"></script>
    <script src="<?= base_url('library/select2/select2.min.js') ?>"></script>
    <script src="<?= base_url('script/library.init.js') ?>"></script>
  </body>
</html>
