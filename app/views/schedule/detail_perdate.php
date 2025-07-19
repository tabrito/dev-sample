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

        <!-- Filter: PIC -->
        <div class="position-relative" style="margin-right: 10px;">
          <select name="pic" class="form-select ps-5 no-arrow" onchange="this.form.submit()">
            <option value="">PIC</option>
            <?php foreach ($data['pic'] as $pic) : ?>
            <option value="<?= $pic['nik']; ?>"><?= $pic['full_name']; ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </form>
    </div>

        <div class="card project-card">
          <div class="card-body" style="max-height: 410px; height: 410px; overflow-y: auto;">
            <div class="d-flex">
              <h4 class="project-title">Scheduling  :</h4> <br style="width: 10px;">
              <h4 class="project-title-date"><?= date('l, d F Y', strtotime($data['date']));  ?></h4>
            </div>
            <div class="d-flex justify-content-between" style="margin-left: 120px;">
              <div class="d-flex justify-content-start toggle-button">
                <div class="icon-add-row">
                  <i class="fas fa-chevron-left"></i>
                </div>
                <button onclick="showContent('prod', this)" class="toggle-new-proj d-flex align-items-center tampilModalUpdate" data-toggle="modal" data-target="#ModalUpdate" data-id="<?= $proj['id_project']; ?>">Prev</button>
              </div>
              <div class="d-flex justify-content-end toggle-button">
                  <button onclick="showContent('doc', this)" class="toggle-new-proj d-flex align-items-center tampilModalUpdate" data-toggle="modal" data-target="#ModalUpdate" data-id="<?= $proj['id_project']; ?>">Next</button>
                  <div class="icon-add-row">
                    <i class="fas fa-chevron-right"></i>
                  </div>
              </div>
            </div>
            <table style="table-layout: fixed; width: max-content; border-collapse: collapse;" class="table new-prod-form">
              <thead>
                <tr>
                  <th style="width: 120px; min-width: 110px; max-width: 110px;"></th>
                  <?php foreach ($data['pic'] as $pic) : ?>
                  <th style="width: 50px; max-width: 50px; text-align: center;"><a href="<?= BASEURL; ?>/schedule/detail_perpic/<?= $data['date']; ?>/<?= $pic['nik'] ?>" style="color: black; text-decoration: none;"><?= $pic['full_name'] ?></a></th>
                  <?php endforeach ?>
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
                      <a href="#" class="d-flex" style="width: 163px; overflow: hidden; white-space: nowrap;text-overflow: ellipsis;" data-toggle="modal" data-target="#ModalSchedule" data-id="<?= $proj['id_project']; ?>">
                        <div class="bar-pic-schedule1 text-align-center p-1"><strong style="font-weight: 600;"><?= $data['proj']['project']; ?><br></strong><?= $data['proj']['step']; ?></div> 
                    </a>
                    </td>
                    <td class="p-1 text-center">
                      <div class="d-flex" style="width: 163px; overflow: hidden; white-space: nowrap;text-overflow: ellipsis;">
                        <div class="bar-pic-schedule1 text-align-center p-1"><strong style="font-weight: 600;"><?= $data['proj']['project']; ?><br></strong><?= $data['proj']['step']; ?></div>
                        <div class="bar-pic-schedule2 text-align-center p-1"><strong style="font-weight: 600;"><?= $data['proj']['project']; ?><br></strong><?= $data['proj']['step']; ?></div>
                      </div>
                    </td>
                    <td class="p-1 text-center">
                      <div class="d-flex" style="width: 163px; overflow: hidden; white-space: nowrap;text-overflow: ellipsis;">
                        <div class="bar-pic-schedule1 text-align-center p-1"><strong style="font-weight: 600;"><?= $data['proj']['project']; ?><br></strong><?= $data['proj']['step']; ?></div>
                        <div class="bar-pic-schedule2 text-align-center p-1"><strong style="font-weight: 600;"><?= $data['proj']['project']; ?><br></strong><?= $data['proj']['step']; ?></div>
                      </div>
                    </td>
                    <td class="p-1 text-center">
                      <div class="d-flex" style="width: 163px; overflow: hidden; white-space: nowrap;text-overflow: ellipsis;">
                        <div class="bar-pic-schedule1 text-align-center p-1"><strong style="font-weight: 600;"><?= $data['proj']['project']; ?><br></strong><?= $data['proj']['step']; ?></div>
                        <div class="bar-pic-schedule2 text-align-center p-1"><strong style="font-weight: 600;"><?= $data['proj']['project']; ?><br></strong><?= $data['proj']['step']; ?></div>
                      </div>
                    </td>
                    <td class="p-1 text-center">
                      <div class="d-flex" style="width: 163px; overflow: hidden; white-space: nowrap;text-overflow: ellipsis;">
                        <div class="bar-pic-schedule1 text-align-center p-1"><strong style="font-weight: 600;"><?= $data['proj']['project']; ?><br></strong><?= $data['proj']['step']; ?></div>
                        <div class="bar-pic-schedule2 text-align-center p-1"><strong style="font-weight: 600;"><?= $data['proj']['project']; ?><br></strong><?= $data['proj']['step']; ?></div>
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
<div class="modal fade" id="ModalSchedule" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content custom-modal-bg p-3">
      <div class="modal-header d-flex">
        <h5 class="modal-title" id="formModalLabel"><?= $data['proj']['project']; ?> : <?= $data['proj']['step']; ?></h5>
        <div class="project-duedate d-flex align-items-center" style="width: 200px;">Duedate : <?= date('d-M-y', strtotime($data['proj']['due_date'])); ?></div>
      </div>
      <div class="modal-body">
            <div class="d-flex">
              <div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #484848;"><strong>Step</strong></div>
                  <div class="update-sched"><strong><?= $data['proj']['step']; ?></strong></div>
                </div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #484848;"><strong>PIC</strong></div>
                  <div class="update-sched"><strong><?= $data['proj']['full_name']; ?></strong></div>
                </div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #484848;"><strong>Area</strong></div>
                  <div class="update-sched"><strong><?= $data['proj']['area']; ?></strong></div>
                </div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #484848;"><strong>Plan Date</strong></div>
                  <div class="update-sched"><strong><?= date('d F Y', strtotime($data['proj']['plan_date'])); ?></strong></div>
                </div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #484848;"><strong>Plan Time</strong></div>
                  <div class="update-sched"><strong><?= date('h:i A', strtotime($data['proj']['plan_date'])); ?></strong></div>
                </div>
              </div>
            <div class="d-flex">
              <div style="margin-left: 30px;">
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #484848;"><strong>Customer</strong></div>
                  <div class="data-product" style="width: 400px;"><strong><?= $data['proj']['customer']; ?></strong></div>
                </div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #484848;"><strong>Category</strong></div>
                  <div class="data-product" style="width: 400px;"><strong><?= $data['proj']['category']; ?></strong></div>
                </div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #484848;"><strong>Step</strong></div>
                  <div class="data-product" style="width: 400px;"><strong>2/7</strong></div>
                </div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #484848;"><strong>Persentase</strong></div>
                  <div class="data-product" style="width: 400px;"><strong>35%</strong></div>
                </div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #484848;"><strong>Duedate</strong></div>
                  <div class="data-product" style="width: 400px;"><strong><?= date('d F Y', strtotime($data['proj']['due_date'])); ?></strong></div>
                </div>
              </div>
              <div style="width: 100px;"></div>
            </div>

            <table class="table border-0">
            <thead class="border-0">
              <tr>
                <th></th>
                <th>Model</th>
                <th>Spesifikasi</th>
                <th>Qty</th>
                <th>Step</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data['Dproj'] as $proj) : ?>
                <tr>
                  <td>
                    <form method="POST" action="">
                      <input type="checkbox" class="big-checkbox" name="" id="">
                    </form>
                  </td>
                  <td><?= $proj['model']; ?></td>
                  <td><?= $proj['spesifikasi']; ?></td>
                  <td><?= $proj['qty']; ?> <?= $proj['uom']; ?></td>
                  <td class="d-flex align-items-center justify-content-center">
                        <div class="progress-prev d-flex align-items-center"><?= $proj['step']; ?></div>
                        <i class="bi bi-arrow-right fw-bold"></i>  
                        <div class="progress-next d-flex align-items-center"><?= $proj['step']; ?></div>
                  </td>
                </tr>
              <?php
              endforeach ?>
            </tbody>
            </table>
            <div class="d-flex align-items-center justify-content-center mt-4">
            <button type="button" id="btn-update1" class="btn btn-update d-flex align-items-center justify-content-center" data-bs-toggle="button" aria-pressed="false" autocomplete="off">
              Progress
            </button>
            <div style="width: 20px;"></div>
            <button type="button" id="btn-update2" class="btn btn-update d-flex align-items-center justify-content-center" data-bs-toggle="button" aria-pressed="false" autocomplete="off">
              Concern
            </button>
            </div>
              <div class="d-flex align-items-center justify-content-center mt-4 mb-3">
                <form action="">
                  <label for="note"><strong>Note : </strong></label>              
                  <input class="px-3 py-1" style="width: 400px; border-radius: 20px;" type="text" name="note" id="note">
                  <button class="px-3 py-1" style="background-color: #343ab4; color: white; border: none; border-radius: 20px; font-weight: 600;">Update</button>
                </form>
            </div>
      </div>
    </div>
  </div>
</div>