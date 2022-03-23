<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('/style/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.css"/>

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
  

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.js"></script>
    <script>
      
      const dataTableLanguage = {
        "decimal":        "",
        "emptyTable":     "Tidak ada data yang tersedia",
        "info":           "Menampilkan _START_ ke _END_ dari _TOTAL_ data",
        "infoEmpty":      "Menampilkan 0 ke 0 dari 0 data",
        "infoFiltered":   "(Berhasil memfilter dari _MAX_ data)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Tampilkan _MENU_ data",
        "loadingRecords": "Memuat...",
        "processing":     "Memproses...",
        "search":         "Pencarian:",
        "zeroRecords":    "Tidak ditemukan data yang cocok",
        "paginate": {
          "first":      "Pertama",
          "last":       "Terakhir",
          "next":       "Selanjutnya",
          "previous":   "Sebelumnya"
        },
      }

      $(document).ready(function() {
        if (document.getElementById('dataTable')) {
          $('#dataTable').DataTable({
            "language": dataTableLanguage,
            dom: 'Bflrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print','colvis'
            ]
          });
        }
      });
    </script>
  </body>
</html>
