<div class="container">
  <div class="card p-2" id="bg-card" style="height: 525px;">
          <div class="card-body">

            <div class="d-flex">
              <div style="width: 500px;">
                <h4 class="project-detail-title"><?= $data['product']['project']; ?></h4>
                <div class="project-detail-catcust"><?= $data['product']['category']; ?> - <?= $data['product']['customer']; ?></div>
              </div>
              <div class="d-flex justify-content-end">
                <div class="project-detail-startdate d-flex align-items-center">Start Date : <?= date('d-M-y', strtotime($data['product']['start_date'])); ?></div>
                <div class="project-detail-duedate d-flex align-items-center">Due Date : <?= date('d-M-y', strtotime($data['product']['due_date'])); ?></div>
              </div>
            </div>

            <hr style="background-color: black;">

            <table class="table border-0">
            <thead>
              <tr>
                <th>No</th>
                <th>Model</th>
                <th>Spesifikasi</th>
                <th>Qty</th>
                <th>Progress</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            
              <?php
              $i = 1;
              foreach ($data['product_list'] as $prod) : ?>
              
              <?php
                 $model = new Project_model();
                 $operrates = $model -> getOperatebyProduct($prod['id_product']);
              ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $prod['model']; ?></td>
                  <td><?= $prod['spesifikasi']; ?></td>
                  <td><?= $prod['qty']; ?></td>
                  <td class="d-flex"><div class="d-flex me-1">
                        <?php foreach ($data['steps'] as $steps) : ?>
                        <div style="margin-top: 0 !important;" class="<?php
                             
                            $class = 'progress-bar';
                            foreach ($operrates as $operate) {
                      
                              if ($operate['id_step'] == $steps['id_step']) {
                                $class = 'progress-bar-fill me-1';
                                break;
                              }
                            }
                            echo $class;
                          ?>"></div>
                        <?php endforeach; ?>
                      </div>
                    </td>
                  <td>
                    <a href="<?= BASEURL; ?>/project/detail_product/<?= $prod['id_product']; ?>/<?= $prod['id_product']; ?>" class="project-detail d-flex align-items-center">Details</a>
                  </td>
                </tr>
              <?php
              $i++;
              endforeach ?>
            </tbody>
            </table>

            <div class="d-flex align-items-center justify-content-center">
              <a href="#" class="btn-update-project d-flex align-items-center tampilModalUpdate" data-toggle="modal" data-target="#ModalUpdate" data-id="<?= $prod['id_project']; ?>">Update This Project</a>
            </div>

          </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content custom-modal-bg">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Update Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div style="width: 500px;">
                <h4 class="project-detail-title" style="color: #484848; font-size: 20px;"><?= $data['product']['project']; ?></h4>
                <div class="project-detail-catcust" style="font-size: 15px;"><?= $data['product']['category']; ?> - <?= $data['product']['customer']; ?></div>
              </div>

                          <hr style="background-color: black;">

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
              foreach ($data['product_list'] as $proj) : ?>
                <tr>
                  <td>
                    <form method="POST" action="">
                      <input type="checkbox" class="big-checkbox" name="" id="">
                    </form>
                  </td>
                  <td><?= $proj['model']; ?></td>
                  <td><?= $proj['spesifikasi']; ?></td>
                  <td><?= $proj['qty']; ?></td>
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

<script>
  const buttons = document.querySelectorAll('.btn-update');

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      buttons.forEach(b => b.classList.remove('active')); // Matikan semua
      btn.classList.add('active'); // Aktifkan yang diklik
    });
  });
</script>
