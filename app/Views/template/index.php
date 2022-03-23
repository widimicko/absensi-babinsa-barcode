<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('/style/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/library/liveAnalog/style.css') ?>">
    <title>Aplikasi Absensi</title>
  </head>
  <body>

    <?= $this->renderSection('body') ?>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="<?= base_url('/script/liveClock.js') ?>"></script>
    <script src="<?= base_url('/library/liveAnalog/script.js') ?>"></script>
    <script>
      if ($('#analogClock')) {
        $('#analogClock').thooClock();
      }
    </script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
      function onScanSuccess(decodedText, decodedResult) {
        console.log(`Code matched = ${decodedText}`, decodedResult);
      }

      function onScanFailure(error) {
        console.warn(`Code scan error = ${error}`);
      }

      if(document.getElementById('scanner')) {
        let html5QrcodeScanner = new Html5QrcodeScanner(
          "scanner",
          { fps: 10, qrbox: {width: 250, height: 250} },
          /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
      }
    </script>
  </body>
</html>