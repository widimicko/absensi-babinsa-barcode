<?= $this->extend('dashboard/template/main') ?>

<?= $this->section('main') ?>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Tambah Absensi</h1>
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

  <div class="col-lg-6 mb-5">
    <div class="card rounded shadow p-3">
      <form action="<?= base_url('/dashboard/absences/store') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label class="form-label">Anggota <span class="text-danger fw-bolder">*</span></label>
          <select name="member_id" class="form-select" id="select2">
            <?php foreach ($members as $member) : ?>
              <option value="<?= $member['id'] ?>"><?= $member['name'] ?> | <?= $member['nrp'] ?> | <?= $member['rank'] ?></option>
            <?php endforeach ?>
          </select>
          <div class="invalid-feedback">
            <?= session('errors.member_id') ?>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Absen <span class="text-danger fw-bolder">*</span></label>
          <select name="absence" class="form-select">
            <option value="Ijin">Ijin</option>
            <option value="Masuk">Masuk</option>
            <option value="Pulang">Pulang</option>
          </select>
          <div class="invalid-feedback">
            <?= session('errors.absence') ?>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Tanggal <span class="text-danger fw-bolder">*</span></label>
          <input required type="date" name="date"class="form-control" value="<?= date('Y-m-d') ?>">
          <div class="invalid-feedback">
            <?= session('errors.date') ?>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Foto</label>
          <img class="img-preview img-fluid mb-3 col-sm-5">
          <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage()">
          <div class="invalid-feedback">
            <?= session('errors.image') ?>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Keterangan</label>
          <textarea name="description" cols="10" rows="5" class="form-control"><?= old('description') ?></textarea>
          <div class="invalid-feedback">
            <?= session('errors.description') ?>
          </div>
        </div>
        <div class="mb-3">
          <div class="d-flex gap-3">
            <a href="<?= base_url('/dashboard/absences') ?>" class="btn btn-info text-white"><i class="bi bi-arrow-left"></i> Kembali</a>
            <button class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div style="height: 200px;"></div>

  <script>
    function previewImage() {
      const image = document.querySelector('#image')
      const imagePreview = document.querySelector('.img-preview')

      imagePreview.style.display = 'block'
      imagePreview.style.height = '200px'

      const oFReader = new FileReader()
      oFReader.readAsDataURL(image.files[0])

      oFReader.onload = function(oFREvent) {
        imagePreview.src = oFREvent.target.result
      }
    }
  </script>

  <?= $this->endSection() ?>
