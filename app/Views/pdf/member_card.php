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

    .screen {
        height: 100%;
        width: 100%;
        position: absolute;
        background-image: url('member_card/bg_member_card.png');
        background-repeat: no-repeat;
        background-size: contain;
      }

    .content {
      height: 100%;
      width: 100%;
      position: relative;
    }
    .page-break {
      page-break-before: always;
    }
    .barcode-container {
      position: absolute;
      right: 70px;
      top: 70px;
    }

    .image-container {
      position: absolute;
      left: 10px;
      bottom: 10px;
    }

    .text-white {
      color: white;
    }

    .name-container {
      position: absolute;
      left: 140px;
      bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="screen">
    <div class="content">
      <div class="barcode-container">
        <?php echo '<img src="'.(new QRCode)->render($member['credential']).'" style="height: 120px; width: 120px;" alt="QR Code" />'; ?>
      </div>
      <div class="bottom-container">
        <div class="image-container">
          <img src="image/member/<?= $member['image'] ?>" style="height: 120px; width: 120px;"><br>
        </div>
        <div class="name-container">
          <p class="text-white"><?= $member['name'] ?></p>
          <p class="text-white"><?= $member['nrp'] ?></p>
          <p class="text-white"><?= $member['rank'] ?></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>