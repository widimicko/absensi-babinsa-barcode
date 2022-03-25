<?php $validation =  \Config\Services::validation(); ?>

<?= $this->extend('dashboard/template/main') ?>

<?= $this->section('main') ?>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Data Pengguna</h1>
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
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bi bi-plus"></i> Tambah</button>
      <table class="table table-bordered table-striped table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Ditambahkan Pada</th>
            <th scope="col">Terakhir Diubah</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php $iteration = 1 ?>
          <?php foreach ($users as $user) : ?>
            <tr>
              <td><?= $iteration++ ?></td>
              <td><?= $user['name'] ?></td>
              <td><?= $user['email'] ?></td>
              <td><?= $user['created_at'] ?></td>
              <td><?= $user['updated_at'] ?></td>
              <td>
                <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id="<?= $user['id'] ?>" data-bs-name="<?= $user['name'] ?>" data-bs-email="<?= $user['email'] ?>"><i class="bi bi-pencil"></i> Edit</button>
                <a href="<?= base_url('/dashboard/users/destroy/'. $user['id']) ?>" class="btn btn-danger text-white"><i class="bi bi-trash"></i> Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="/dashboard/users/store" method="POST">
        <?= csrf_field() ?>
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Tambah Pengguna</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label>Name</label>
            <input type="text" class="form-control" name="name" required>
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="editForm" method="POST">
      <?= csrf_field() ?>
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Ubah Pengguna</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label>Name</label>
              <input type="text" id="input-edit-name" class="form-control " name="name" required>
            </div>
            <div class="mb-3">
              <label>Email</label>
              <input type="email" id="input-edit-email" class="form-control " name="email" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
    const editModal = document.getElementById('editModal')

    editModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget

      const id = button.getAttribute('data-bs-id')
      const name = button.getAttribute('data-bs-name')
      const email = button.getAttribute('data-bs-email')

      const nameInput = editModal.querySelector('#input-edit-name')
      const emailInput = editModal.querySelector('#input-edit-email')

      document.getElementById('editForm').setAttribute('action', `${window.location.origin}/dashboard/users/update/${id}`)
      nameInput.value = name
      emailInput.value = email
    })
  </script>

  <?= $this->endSection() ?>
