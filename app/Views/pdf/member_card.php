<?php use chillerlan\QRCode\{QRCode, QROptions}; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
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
  </style>
</head>
<body>
  <h1 class="text-center"><?= $member['name'] ?></h1>
  <h3 class="text-center"><?= $member['rank'] ?></h3>
  <div class="content-center">
    <img src="image/member/<?= $member['image'] ?>" style="height: 200px; width: 100%;"><br>
    <?php echo '<img src="'.(new QRCode)->render($member['credential']).'" style="margin: 0 auto;" alt="QR Code" />'; ?>
  </div>
  <h3 class="text-center">Koramil 0827/18 Kangean</h3>
</body>
</html>