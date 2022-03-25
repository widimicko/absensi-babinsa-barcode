<?= $this->extend('template/index') ?>

<?= $this->section('body') ?>

<div class="login">
  <main class="form-signin text-center">
    <form action="<?= base_url('/login') ?>" method="post">
      <img class="mb-4" src="<?= base_url('image/logo_tniad.png') ?>" alt="" width="72" height="100">
      <h1 class="h3 mb-3 fw-normal">Sistem Absensi Koramil 0827/18 Kangean</h1>

      <?php if($message = session()->getFlashData('failed')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $message ?>
        </div>
      <?php endif ?>
  
      <div class="form-floating mb-3">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <button class="w-100 btn btn-lg btn-success" type="submit">Masuk</button>
      <p class="mt-5 mb-3 text-muted">copyright &copy; <?= date('Y') ?></p>
    </form>
  </main>
</div>

<?= $this->endSection() ?>
