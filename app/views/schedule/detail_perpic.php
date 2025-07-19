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
        <div class="position-relative" style="margin-right: 10px;">
          <select name="customer" class="form-select ps-5 no-arrow" onchange="this.form.submit()">
            <option value="">Customer</option>
            <?php foreach ($data['cust'] as $cust) : ?>
            <option value="<?= $cust['id_customer']; ?>"><?= $cust['customer']; ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <!-- Filter: Category -->
        <div class="position-relative" style="margin-right: 10px;">
          <select name="category" class="form-select ps-5 no-arrow" onchange="this.form.submit()">
            <option value="">Category</option>
            <?php foreach ($data['cate'] as $cate) : ?>
            <option value="<?= $cate['id_category']; ?>"><?= $cate['category']; ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <!-- Filter: Status -->
        <div class="position-relative" style="margin-right: 10px;">
          <select name="status" class="form-select ps-5 no-arrow" onchange="this.form.submit()">
            <option value="">Status</option>
            <option value="on_track">On Track</option>
            <option value="delay">Delay</option>
            <option value="concern">Concern</option>
            <option value="done">Done</option>
          </select>
        </div>
      </form>
    </div>

        <div class="card project-card">
          <div class="card-body" style="max-height: 410px; height: 410px; overflow-y: auto;">
            <div class="d-flex">
              <h4 class="project-title">Scheduling  :</h4> <br style="width: 10px;">
              <h4 class="project-title-date"><?= date('l, d F Y', strtotime($data['date']));  ?> - </h4><br style="width: 10px;">
              <h4 class="project-title-date"><?= $data['name']['full_name'];  ?></h4>
            </h4>
            </div>
            <table style="table-layout: fixed; width: max-content; border-collapse: collapse;" class="table new-prod-form">
              <thead>
                <tr>
                  <th style="width: 120px; min-width: 120px; max-width: 120px;"></th>
                  <th style="width: 120px; max-width: 150px; text-align: center;"><a href="<?= BASEURL; ?>/schedule/detail_perpic/<?= date('Y-m-d', strtotime('+4 day')); ?>" style="color: black; text-decoration: none;"><?= $data['name']['full_name'] ?></a></th>
                </tr>
              </thead>
              <tbody id="table-body-prod">
                <?php 
                $startHour = 7;
                $endHour = 16;
                for ($i = $startHour; $i < $endHour; $i++) {
                      // Lewati jam 12
                      if ($i == 12) {
                          continue;
                      }
                      $from = strtotime("$i:00");
                      $to = strtotime(($i + 1) . ":00");
                ?>
                  <tr>
                    <th style="position: relative; width: 120px; min-width: 120px; max-width: 120px; overflow: hidden;">
                      <div style="position: absolute; top: 50%; left: 20%; transform: translate(0, -50%); white-space: nowrap;">
                        <?= date('h', $from) . ' - ' . date('h A', $to); ?>
                      </div>
                    </th>

                    <td class="p-1 text-center">
                      <div class="d-flex" style="width: 850px; overflow: hidden; white-space: nowrap;text-overflow: ellipsis;">
                        <div class="d-flex bar-name-schedule1">
                          <div class="p-1 mx-2"><strong style="font-weight: 600;"><?= $data['proj']['project']; ?><br></strong><?= $data['proj']['step']; ?></div>
                          <div class="p-1 mx-2"><strong style="font-weight: 600;">Step<br></strong>7/10</div>
                          <div class="p-1 mx-2"><strong style="font-weight: 600;">Duedate<br></strong><?= date('d M Y', strtotime($data['proj']['due_date'])); ?></div>
                        </div>
                        <div class="d-flex bar-name-schedule2">
                          <div class="p-1 mx-2"><strong style="font-weight: 600;"><?= $data['proj']['project']; ?><br></strong><?= $data['proj']['step']; ?></div>
                          <div class="p-1 mx-2"><strong style="font-weight: 600;">Step<br></strong>7/10</div>
                          <div class="p-1 mx-2"><strong style="font-weight: 600;">Duedate<br></strong><?= date('d M Y', strtotime($data['proj']['due_date'])); ?></div>
                        </div>
                        <div class="d-flex bar-name-schedule3">
                          <div class="p-1 mx-2"><strong style="font-weight: 600;"><?= $data['proj']['project']; ?><br></strong><?= $data['proj']['step']; ?></div>
                          <div class="p-1 mx-2"><strong style="font-weight: 600;">Step<br></strong>7/10</div>
                          <div class="p-1 mx-2"><strong style="font-weight: 600;">Duedate<br></strong><?= date('d M Y', strtotime($data['proj']['due_date'])); ?></div>
                        </div>
                    </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
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