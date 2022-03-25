<?php $validation =  \Config\Services::validation(); ?>

<?= $this->extend('dashboard/template/main') ?>

<?= $this->section('main') ?>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Ganti Password</h1>
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

  <div class="col-lg-6 mb-5">
    <div class="card rounded shadow p-3">
      <form action="<?= base_url('/dashboard/change-password') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label class="form-label">Password Saat Ini</label>
          <input required type="password" name="current_password" class="form-control">
          <div class="invalid-feedback">
            <?= session('errors.current_password') ?>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Password baru</label>
          <input required type="password" name="password" class="form-control">
          <div class="invalid-feedback">
            <?= session('errors.password') ?>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Konfirmasi Password</label>
          <input required type="password" name="confirmation_password" class="form-control">
          <div class="invalid-feedback">
            <?= session('errors.confirmation_password') ?>
          </div>
        </div>
        
        <div class="mb-3">
          <div class="d-flex gap-3">
            <button class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div style="height: 200px;"></div>

  <?= $this->endSection() ?>
