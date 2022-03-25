<?= $this->extend('dashboard/template/main') ?>

<?= $this->section('main') ?>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Data Anggota</h1>
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
    <div class="table-responsive">
      <a href="/dashboard/members/create" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Tambah</a>
      <table class="table table-bordered table-striped table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Foto</th>
            <th scope="col">Pangkat</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Ditambahkan Pada</th>
            <th scope="col">Terakhir Diubah</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php $iteration = 1 ?>
          <?php foreach ($members as $member) : ?>
            <tr>
              <td><?= $iteration++ ?></td>
              <td><?= $member['name'] ?></td>
              <td>
                <img src="<?= base_url('image/member/'. $member['image']) ?>" height="100px" alt="">
              </td>
              <td><?= $member['rank'] ?></td>
              <td><?= $member['birthdate'] ?></td>
              <td><?= $member['created_at'] ?></td>
              <td><?= $member['updated_at'] ?></td>
              <td>
                <a href="<?= base_url('/dashboard/members/print/'. $member['id']) ?>" class="btn btn-info text-white"><i class="bi bi-printer"></i> Print</a>
                <a href="<?= base_url('/dashboard/members/edit/'. $member['id']) ?>" class="btn btn-warning text-white"><i class="bi bi-pencil"></i> Ubah</a>
                <a href="<?= base_url('/dashboard/members/destroy/'. $member['id']) ?>" class="btn btn-danger text-white"><i class="bi bi-trash"></i> Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <?= $this->endSection() ?>
