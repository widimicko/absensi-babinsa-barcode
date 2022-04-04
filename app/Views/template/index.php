<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('library/bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/library/aos/aos.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/library/liveAnalog/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/style/style.css') ?>">
    <title>Aplikasi Absensi</title>
  </head>
  <body>

    <?= $this->renderSection('body') ?>

    <script src="<?= base_url('/library/jquery/jquery-slim.min.js') ?>"></script>
    <script src="<?= base_url('/library/bootstrap/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('/library/aos/aos.js') ?>"></script>
    <script src="<?= base_url('/library/liveAnalog/script.js') ?>"></script>
    <script src="<?= base_url('/script/liveClock.js') ?>"></script>
    <script src="<?= base_url('script/library.init.js') ?>"></script>
    <script>
      AOS.init({
        duration: 1000,
      });
      if ($('#analogClock')) {
        $('#analogClock').thooClock();
      }
    </script>
  </body>
</html>