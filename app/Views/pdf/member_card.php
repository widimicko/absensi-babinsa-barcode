<?php use chillerlan\QRCode\{QRCode, QROptions}; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .page_break { page-break-before: always; }
    .text-center { text-align: center; }
  </style>
</head>
<body>
  <h1 class="text-center">Koramil 0827/18 Kangean</h1>
  <img class="text-center" src="image/member/<?= $member['image'] ?>" height="100px">
  <h3 class="text-center"><?= $member['name'] ?></h3>
  <h4 class="text-center"><?= $member['rank'] ?></h4>

  <?php echo '<img src="'.(new QRCode)->render($member['credential']).'" class="text-center" alt="QR Code" />'; ?>
</body>
</html>