<?= $this->extend('template/index') ?>

<?= $this->section('body') ?>

<div class="container my-5">
  <h1>Login</h1>
  <?php if($message = session()->getFlashData('failed')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $message ?>
    </div>
  <?php endif ?>
  <form action="<?= base_url('/login') ?>" method="post">
    <?= csrf_field() ?>
    <input type="email" name="email" class="form-control">
    <input type="password" name="password" class="form-control">
    <button>Login</button>
  </form>
</div>

<?= $this->endSection() ?>
