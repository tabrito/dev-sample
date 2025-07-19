<div class="container">
  <div class="card p-2" id="bg-card" style="height: 525px;">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <?php Flasher::flash(); ?>
        </div>
      </div>

      <div class="d-flex justify-content-between">
        <form method="GET" action="" class="d-flex gap-3 mb-3">

        <!-- Filter: Customer -->
        <div class="position-relative m-2">
          <select name="customer" class="form-select ps-5 no-arrow" onchange="this.form.submit()">
            <option value="">Customer</option>
            <?php foreach ($data['cust'] as $cust) : ?>
            <option value="<?= $cust['id_customer']; ?>"><?= $cust['customer']; ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <!-- Filter: Category -->
        <div class="position-relative m-2">
          <select name="category" class="form-select ps-5 no-arrow" onchange="this.form.submit()">
            <option value="">Category</option>
            <?php foreach ($data['cate'] as $cate) : ?>
            <option value="<?= $cate['id_category']; ?>"><?= $cate['category']; ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <!-- Filter: Status -->
        <div class="position-relative m-2">
          <select name="status" class="form-select ps-5 no-arrow" onchange="this.form.submit()">
            <option value="">Status</option>
            <option value="on_track">On Track</option>
            <option value="delay">Delay</option>
            <option value="concern">Concern</option>
            <option value="done">Done</option>
          </select>
        </div>
      
      </form>

      <!-- Form Search -->
      <form class="project-search form-search d-flex align-items-center" role="search" action="<?= BASEURL; ?>/search" method="GET">
        <input class=" project-search form-control form-control-lg rounded-pill me-2" type="search" placeholder="Search..." name="q" aria-label="Search">
        <button class="project-search btn btn-lg rounded-circle" type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>
    </div>


      <?php foreach ($data['proj'] as $proj) : ?>
        <div class="card project-card">
          <div class="card-body d-flex align-items-center">
            <div style="width: 300px;">
              <h4 class="project-title"><?= $proj['project']; ?></h4>
              <div class="project-catcust"><?= $proj['category']; ?> - <?= $proj['customer']; ?></div>
            </div>
            <div class="project-duedate d-flex align-items-center"><?= date('d-M-y', strtotime($proj['due_date'])); ?></div>
            <div class="project-step d-flex align-items-center"><?= $proj['step']; ?></div>
            <a href="<?= BASEURL; ?>/project/detail/<?= $proj['id_project']; ?>" class="project-detail d-flex align-items-center">Details</a>
            <div class="project-progress d-flex align-items-center"><?= $proj['progress']; ?>%</div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>

          <div class="form-group">
            <label for="nim">NIM</label>
            <input type="number" class="form-control" id="nim" name="nim">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>

          <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan">
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Manajemen">Manajemen</option>
              <option value="Sastra Inggris">Sastra Inggris</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Teknik Industri">Teknik Industri</option>
              <option value="Matematika">Matematika</option>
            </select>
          </div>
          <div class=" modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>