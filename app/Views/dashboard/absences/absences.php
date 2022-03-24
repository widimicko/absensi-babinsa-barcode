<?php $validation =  \Config\Services::validation(); ?>

<?= $this->extend('dashboard/template/main') ?>

<?= $this->section('main') ?>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Data Absensi</h1>
  </div>

  <?php if($message = session()->getFlashData('failed')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $message ?>
    </div>
  <?php elseif($message = session()->getFlashData('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= $message ?>
    </div>
  <?php endif ?>

  <?php if ($validation->getErrors()) : ?>
    <div class="alert alert-danger" role="alert">
      <ul>
        <?php foreach($validation->getErrors() as $error) : ?>
          <li><?= $error ?></li>
        <?php endforeach ?>
      </ul>
    </div>
  <?php endif ?>

  <div class="card rounded shadow p-4">
    <div class="table-responsive">
      <table class="table table-striped table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Pangkat</th>
            <th scope="col">Absen</th>
            <th scope="col">Ditambahkan Pada</th>
          </tr>
        </thead>
        <tbody>
        <?php $iteration = 1 ?>
          <?php foreach ($absences as $absence) : ?>
            <tr>
              <td><?= $iteration++ ?></td>
              <td><?= $absence['name'] ?></td>
              <td><?= $absence['rank'] ?></td>
              <td><?= $absence['absence'] ?></td>
              <td><?= $absence['created_at'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

<?= $this->endSection() ?>
