<?= $this->extend('dashboard/template/main') ?>

<?= $this->section('main') ?>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Halaman Detail Anggota</h1>
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

  <div class="card rounded shadow p-4">
    <div class="d-flex flex-column justify-content-center">
      <p class="fs-1 text-danger text-center">Halaman ID Card ada di view/pdf/member_card.php</p>
      <p class="fs-5 text-center">ID Card</p>
      <a href="<?= base_url('/dashboard/members/print/'. $member['id']) ?>" class="btn btn-primary mx-auto w-25"><i class="bi bi-printer"></i> Print</a>
      <div class="mx-auto my-auto mt-3">
        <div style="width: 74mm; height: 105mm; border: 2px black solid;">
          <p>test</p>
        </div>
      </div>
    </div>
  </div>

  <?= $this->endSection() ?>
