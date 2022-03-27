<?= $this->extend('dashboard/template/main') ?>

<?= $this->section('main') ?>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Tambah Anggota</h1>
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
      <form action="<?= base_url('/dashboard/members/store') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input required type="text" name="name" class="form-control" value="<?= old('name') ?>">
          <div class="invalid-feedback">
            <?= session('errors.name') ?>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">NRP</label>
          <input required type="number" name="nrp" class="form-control" value="<?= old('nrp') ?>">
          <div class="invalid-feedback">
            <?= session('errors.nrp') ?>
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
          <label class="form-label">Pangkat</label>
          <select name="rank" class="form-select">
          <option value="Pelda"
            <?= old('rank') == 'Pelda' ? 'selected' : '' ?>
            >Pelda</option>
            <option value="Serma"
            <?= old('rank') == 'Serma' ? 'selected' : '' ?>
            >Serma</option>
            <option value="Sertu"
            <?= old('rank') == 'Sertu' ? 'selected' : '' ?>
            >Sertu</option>
            <option value="Serda"
            <?= old('rank') == 'Serda' ? 'selected' : '' ?>
            >Serda</option>
            <option value="Serka"
            <?= old('rank') == 'Serka' ? 'selected' : '' ?>
            >Serka</option>
            <option value="Koptu"
            <?= old('rank') == 'Koptu' ? 'selected' : '' ?>
            >Koptu</option>
            <option value="Kopda"
            <?= old('rank') == 'Kopda' ? 'selected' : '' ?>
            >Kopda</option>
          </select>
          <div class="invalid-feedback">
            <?= session('errors.rank') ?>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Tanggal Lahir</label>
          <input required type="date" name="birthdate"class="form-control" value="<?= old('birthdate') ?>">
          <div class="invalid-feedback">
            <?= session('errors.birthdate') ?>
          </div>
        </div>
        <div class="mb-3">
          <div class="d-flex gap-3">
            <a href="<?= base_url('/dashboard/members') ?>" class="btn btn-info text-white"><i class="bi bi-arrow-left"></i> Kembali</a>
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
