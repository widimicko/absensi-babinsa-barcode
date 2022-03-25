<?php use chillerlan\QRCode\{QRCode, QROptions}; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
    .content {
      height: 100%;
      width: 100%;
      position: relative;
    }
    .page-break {
      page-break-before: always;
    }
    .text-center {
      text-align: center;
    }
    .content-center {
      margin: 0 auto;
      width: 50%;
    }
    .barcode-container {
      position: absolute;
      left: 10px;
      top: 10px;
    }

    .image-container {
      position: absolute;
      right: 10px;
      bottom: 10px;
    }

    .card-title-container {
      position: absolute;
      right: 10px;
      top: 10px;
    }

    .name-container {
      position: absolute;
      left: 10px;
      bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="content">
    <div class="barcode-container">
      <?php echo '<img src="'.(new QRCode)->render($member['credential']).'" style="height: 120px; width: 120px;" alt="QR Code" />'; ?>
    </div>
    <div class="card-title-container text-center">
      <p>Kartu Anggota</p>
      <p>Koramil 0827/18 Kangean</p>
    </div>
    <div class="bottom-container">
      <div class="name-container">
        <p><?= $member['name'] ?></p>
        <p><?= $member['rank'] ?></p>
      </div>
      <div class="image-container">
        <img src="image/member/<?= $member['image'] ?>" style="height: 120px; width: 120px;"><br>
      </div>
    </div>
  </div>
</body>
</html>