<div class="container">
  <div class="card p-2" id="bg-card" style="height: 525px;">
          <div class="card-body" style="max-height: 510px; overflow-y: auto;">

            <div class="d-flex">
              <div style="width: 500px;">
                <h4 class="project-detail-title"><?= $data['prodID']['project']; ?></h4>
                <div class="project-detail-catcust"><?= $data['prodID']['category']; ?> - <?= $data['prodID']['customer']; ?></div>
              </div>
            </div>

            <hr style="background-color: black;">

            <div class="d-flex">
              <div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #343ab4;">Model</div>
                  <div class="data-product" style="width: 400px; color: #343ab4;"><strong><?= $data['prodID']['model']; ?></strong></div>
                </div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #343ab4;">Spesifikasi</div>
                  <div class="data-product" style="width: 400px; color: #343ab4;"><strong><?= $data['prodID']['spesifikasi']; ?></strong></div>
                </div>
              </div>
              <div style="width: 100px;"></div>
              <div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #343ab4;">Status</div>
                  <div class="data-product" style="width: 300px; color: #343ab4;"><strong><?= $data['prodID']['status']; ?></strong></div>
                </div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #343ab4;">Qty</div>
                  <div class="data-product" style="width: 300px; color: #343ab4;"><strong><?= $data['prodID']['qty']; ?> <?= $data['prodID']['uom']; ?></strong></div>
                </div>
              </div>
            </div>
            <div style="height: 50px;"></div>
            <table class="table border-0" style="border-spacing: 10px; border-collapse: separate;">
            <thead>
              <tr>
                <th></th>
                <th style="text-align: center;">Date</th>
                <th style="text-align: center;">Time</th>
                <th style="text-align: center;">PIC</th>
                <th style="text-align: center;">Note</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data['Astep'] as $Astep) : ?>
                <?php
                $emptyRowHandled = false; // Penanda agar hanya satu kali tombol ditampilkan
                foreach ($data['Astep'] as $Astep):
                ?>
                <tr>
                  <th style="width: 150px;"><?= $Astep['step']; ?></th>

                  <?php
                    $isEmpty = empty($Astep['created_at']) && empty($Astep['call_name']) && empty($Astep['note']);

                    if ($isEmpty && !$emptyRowHandled):
                      $emptyRowHandled = true; // Aktifkan penanda agar tidak muncul lagi nanti
                  ?>
                    <td colspan="4" style="text-align: center;">
                      <button class="btn-update-project tampilModalUpdate" data-toggle="modal" data-target="#ModalUpdate" data-id="<?= $proj['id_project']; ?>" type="button">Add Progress</button>
                    </td>
                  <?php else: ?>
                    <td style="<?= !empty($Astep['created_at']) ? 'background-color: yellow; border-radius: 40px; text-align: center;' : '' ?>">
                      <?= !empty($Astep['created_at']) ? date('d-M-y', strtotime($Astep['created_at'])) : '&nbsp;'; ?>
                    </td>
                    <td style="<?= !empty($Astep['created_at']) ? 'background-color: yellow; border-radius: 40px; text-align: center;' : '' ?>">
                      <?= !empty($Astep['created_at']) ? date('H:i', strtotime($Astep['created_at'])) : '&nbsp;'; ?>
                    </td>
                    <td style="<?= !empty($Astep['call_name']) ? 'background-color: yellow; border-radius: 40px; text-align: center;' : '' ?>">
                      <?= !empty($Astep['call_name']) ? $Astep['call_name'] : '&nbsp;'; ?>
                    </td>
                    <td style="<?= !empty($Astep['note']) ? 'background-color: yellow; border-radius: 40px; text-align: center;' : '' ?>">
                      <?= !empty($Astep['note']) ? $Astep['note'] : '&nbsp;'; ?>
                    </td>
                  <?php endif; ?>
                </tr>
                <?php endforeach; ?>


              <?php
              break;
              endforeach ?>
            </tbody>
            </table>
            
          </div>
          
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content custom-modal-bg">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Add Progress</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div style="width: 500px;">
                <h4 class="project-detail-title" style="color: #484848; font-size: 20px;"><?= $data['prodID']['project']; ?></h4>
                <div class="project-detail-catcust" style="font-size: 15px;"><?= $data['prodID']['category']; ?> - <?= $data['prodID']['customer']; ?></div>
              </div>
              <hr style="background-color: black;">
              <div class="d-flex">
              <div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #484848;">Model</div>
                  <div class="data-product" style="width: 400px; color: #484848;"><strong><?= $data['prodID']['model']; ?></strong></div>
                </div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #484848;">Spesifikasi</div>
                  <div class="data-product" style="width: 400px; color: #484848;"><strong><?= $data['prodID']['spesifikasi']; ?></strong></div>
                </div>
              </div>
              <div style="width: 100px;"></div>
              <div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #484848;">Status</div>
                  <div class="data-product" style="width: 300px; color: #484848;"><strong><?= $data['prodID']['status']; ?></strong></div>
                </div>
                <div class="d-flex py-2">
                  <div class="label-product" style="width: 100px; color: #484848;">Qty</div>
                  <div class="data-product" style="width: 300px; color: #484848;"><strong><?= $data['prodID']['qty']; ?> <?= $data['prodID']['uom']; ?></strong></div>
                </div>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-center mt-4">
              <div class="prod-progress-prev d-flex align-items-center"><?= $data['prodID']['step']; ?></div>
              <i class="bi bi-arrow-right fw-bold"></i>  
              <div class="prod-progress-next d-flex align-items-center"><?= $data['prodID']['step']; ?></div>
            </div>
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
                  <button class="px-3 py-1" style="background-color: #343ab4; color: white; border: none; border-radius: 20px; font-weight: 600;">Add</button>
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
