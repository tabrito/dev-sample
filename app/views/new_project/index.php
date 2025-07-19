<div class="container">
  <div class="card p-2" id="bg-card">
    <div class="card-body" style="max-height: 510px; height: 510px; overflow-y: auto;">
      <div class="row">
        <div class="col-lg-6">
          <?php Flasher::flash(); ?>
        </div>
      </div>

      <div class="d-flex justify-content-between">
        <form method="GET" action="" class="d-flex gap-3 mb-3">

        <!-- Filter: Customer -->
        <div class="position-relative d-flex">
          <select name="customer" class="form-select ps-5 no-arrow" onchange="this.form.submit()">
            <option value="">Customer</option>
            <?php foreach ($data['cust'] as $cust) : ?>
            <option value="<?= $cust['id_customer']; ?>"><?= $cust['customer']; ?></option>
            <?php endforeach ?>
          </select>
          <div href="<?= BASEURL; ?>/project/update/<?= $proj['id_project']; ?>" class="icon-plus tampilModalUpdate" data-toggle="modal" data-target="#modal_add_customer" data-id="<?= $proj['id_project']; ?>">
            <i class="fas fa-plus"></i>
          </div>
        </div>
        <div style="width: 20px;"></div>
        <!-- Filter: Category -->
        <div class="position-relative d-flex">
          <select name="category" class="form-select ps-5 no-arrow" onchange="this.form.submit()">
            <option value="">Category</option>
            <?php foreach ($data['cate'] as $cate) : ?>
            <option value="<?= $cate['id_category']; ?>"><?= $cate['category']; ?></option>
            <?php endforeach ?>
          </select>
          <div href="<?= BASEURL; ?>/project/update/<?= $proj['id_project']; ?>" class="icon-plus tampilModalUpdate" data-toggle="modal" data-target="#modal_add_category" data-id="<?= $proj['id_project']; ?>">
            <i class="fas fa-plus"></i>
          </div>
        </div>
      
      </form>

      <div class="d-flex">
        <form action="">
          <label for="project_name" style="color: #343ab4;"><strong>Project Name : </strong></label>              
          <input class="px-3 py-1" style="width: 400px; border-radius: 20px;" type="text" name="note" id="note">
        </form>
      </div>
    </div>
      <div class="d-flex">
        
        <!-- List Product -->
        <div id="prod" class="card new-project-card-prod toggle-content">
          <div class="card-body" style="max-height: 330px; height: 330px; overflow-y: auto;">
            <h4 class="project-title">List Product</h4>
            <table class="table new-prod-form">
              <thead>
                <tr>
                  <th style="width: 50px;">No</th>
                  <th style="width: 240px;">Model</th>
                  <th style="width: 400px;">Spesifikasi</th>
                  <th style="width: 100px;">Qty</th>
                  <th style="width: 100px;">UOM</th>
                </tr>
              </thead>
              <tbody id="table-body-prod">
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                  <tr>
                    <th class="p-0 m-0" style="width: 50px; text-align: center;"><?= $i; ?></th>
                    <td class="p-0 m-0"><input class="form-new-prod" style="width: 240px;" type="text"></td>
                    <td class="p-0 m-0"><input class="form-new-prod" style="width: 490px;" type="text"></td>
                    <td class="p-0 m-0"><input class="form-new-prod" style="width: 100px;" type="number" oninput="this.value = this.value.replace(/[^0-9]/g, '');"></td>
                    <td class="p-0 m-0"><input class="form-new-prod" style="width: 100px;" type="text"></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

            <div class="d-flex align-items-center justify-content-center mt-3">
              <div class="icon-add-row me-2" style="cursor: pointer;">
                <i class="fas fa-plus"></i>
              </div>
              <button type="button" class="btn-add-row d-flex align-items-center tampilModalUpdate" id="addRowProd">
                Add New Row
              </button>
            </div>
          </div>
          <div class="d-flex justify-content-end m-4 toggle-button">
              <button onclick="showContent('flow', this)" class="toggle-new-proj d-flex align-items-center tampilModalUpdate" data-toggle="modal" data-target="#ModalUpdate" data-id="<?= $proj['id_project']; ?>">Flow Project</button>
              <div class="icon-add-row">
                <i class="fas fa-chevron-right"></i>
              </div>
          </div>
        </div>

        <!-- Flow Project -->
        <div id="flow" class="card new-project-card-flow toggle-content">
          <div class="card-body" style="max-height: 330px; height: 330px; overflow-y: auto;">
            <h4 class="project-title">Flow Project</h4>
            <table class="table new-prod-form">
              <thead>
                <tr>
                  <th style="width: 50px;">No</th>
                  <th style="width: 330px;">Step</th>
                  <th style="width: 150px;">Area</th>
                  <th style="width: 150px;">PIC</th>
                  <th style="width: 150px;">Plan Date</th>
                  <th style="width: 150px;">Plan Time</th>
                </tr>
              </thead>
              <tbody id="table-body-flow">
              <?php 
              for ($i = 1; $i <= 5; $i++) { ?>
                <tr>
                <th class="p-0 m-0" style="width: 50px; text-align: center;"><?= $i; ?></th>
                <td class="p-0 m-0"><input class="form-new-prod" style="width: 330px;" type="text"></td>
                <td class="p-0 m-0"><input class="form-new-prod" style="width: 150px;" type="text"></td>
                <td class="p-0 m-0"><input class="form-new-prod" style="width: 150px;" type="text"></td>
                <td class="p-0 m-0"><input class="form-new-prod" style="width: 150px;" type="date"></td>
                <td class="p-0 m-0"><input class="form-new-prod" style="width: 150px;" type="time"></td>
                </tr>
              <?php } ?>
            </tbody>
            </table>

            <div class="d-flex align-items-center justify-content-center">
              <div class="icon-add-row">
                <i class="fas fa-plus"></i>
              </div>
              <button type="button" class="btn-add-row d-flex align-items-center tampilModalUpdate" id="addRowFlow">
                Add New Row
              </button>
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-start m-4 toggle-button">
              <div class="icon-add-row">
                <i class="fas fa-chevron-left"></i>
              </div>
              <button onclick="showContent('prod', this)" class="toggle-new-proj d-flex align-items-center tampilModalUpdate" data-toggle="modal" data-target="#ModalUpdate" data-id="<?= $proj['id_project']; ?>">List Product</button>
          </div>
          <div class="d-flex justify-content-end m-4 toggle-button">
              <button onclick="showContent('doc', this)" class="toggle-new-proj d-flex align-items-center tampilModalUpdate" data-toggle="modal" data-target="#ModalUpdate" data-id="<?= $proj['id_project']; ?>">Document Project</button>
              <div class="icon-add-row">
                <i class="fas fa-chevron-right"></i>
              </div>
          </div>
        </div>
        </div>

        <!-- Document Project -->
        <div id="doc" class="card new-project-card-doc toggle-content">
          <div class="card-body" style="max-height: 330px; height: 330px; overflow-y: auto;">
            <h4 class="project-title">Document Project</h4>
            <table class="table new-prod-form">
              <thead>
                <tr>
                  <th style="width: 50px;">No</th>
                  <th style="width: 500px;">File Document</th>
                  <th style="width: 150px;">Format</th>
                  <th style="width: 280px;">Type Document</th>
                </tr>
              </thead>
              <tbody id="table-body-doc">
              <?php 
              for ($i = 1; $i <= 5; $i++) { ?>
                <tr>
                <th class="p-0 m-0" style="width: 50px; text-align: center;"><?= $i; ?></th>
                <td class="p-0 m-0"><input class="form-new-prod" style="width: 500px;" type="file"></td>
                <td class="p-0 m-0"><input class="form-new-prod" style="width: 150px;" type="text"></td>
                <td class="p-0 m-0"><input class="form-new-prod" style="width: 280px;" type="text"></td>
                </tr>
              <?php } ?>
            </tbody>
            </table>

            <div class="d-flex align-items-center justify-content-center">
              <div class="icon-add-row">
                <i class="fas fa-plus"></i>
              </div>
              <button type="button" class="btn-add-row d-flex align-items-center tampilModalUpdate" id="addRowDoc">
                Add New Row
              </button>
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-start m-4 toggle-button">
              <div class="icon-add-row">
                <i class="fas fa-chevron-left"></i>
              </div>
              <button onclick="showContent('flow', this)" class="toggle-new-proj d-flex align-items-center tampilModalUpdate" data-toggle="modal" data-target="#ModalUpdate" data-id="<?= $proj['id_project']; ?>">Flow Project</button>
          </div>
          <div class="d-flex justify-content-end m-4">
          <a href="<?= BASEURL; ?>/project/update/<?= $proj['id_project']; ?>" class="btn-add-row d-flex justify-content-center align-items-center tampilModalUpdate finish-new-project" data-toggle="modal" data-target="#ModalUpdate" data-id="<?= $proj['id_project']; ?>" style="width: 100px; height: 40px;">Finish</a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Category -->
<div class="modal fade" id="modal_add_category" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content custom-modal-bg">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center; margin-top: 20px; max-height: 450px; overflow-y: auto;">
              <form action="">
                <div>
                  <label style="text-align: left; color: #343ab4; width: 120px;" for="id_category"><strong>ID Category</strong></label>
                  <input class="px-3 py-1" style="width: 400px; border-radius: 20px;" type="text" name="id_category" id="id_category">
                </div>
                <div>
                  <label style="text-align: left; color: #343ab4; width: 120px;" for="category"><strong>Category</strong></label>
                  <input class="px-3 py-1" style="width: 400px; border-radius: 20px;" type="text" name="category" id="category">
                </div>
                <div>
                  <label style="text-align: left; color: #343ab4; width: 120px;" for="leader"><strong>Leader</strong></label>
                  <input class="px-3 py-1" style="width: 400px; border-radius: 20px;" type="text" name="leader" id="leader">
                </div>
                <div style="margin-top: 30px; margin-bottom: 10px;">
                  <div for="work-flow" style="color: #343ab4;"><strong>Alur Kerja</strong></div>
                </div>
                <div id="body-add-cat">
                  <?php for ($i = 1; $i <= 3; $i++) { ?>
                  <div>
                    <label style="color: #343ab4; width: 20px;" for="id_category"><strong><?= $i; ?></strong></label>
                    <input class="px-3 py-1" style="width: 400px; border-radius: 20px; background-color: transparent; border: solid 1px #343ab4;" type="text" name="id_category" id="id_category">
                  </div>
                  <?php } ?>
                </div>
                <div class="mt-2">
                  <label class="icon-add-row">
                    <i class="fas fa-plus"></i>
                  </label>
                  <button type="button" class="btn-add-row tampilModalUpdate" id="addRowCat">
                    Add New Row
                  </button>
                </div>
                <button type="submit" style="background-color: #343ab4; width: 150px; height: 35px; color: white; border: none; border-radius: 20px; margin-top: 30px; margin-bottom: 30px;"><strong>Submit</strong></button>
              </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Customer -->
<div class="modal fade" id="modal_add_customer" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content custom-modal-bg">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center; margin-top: 20px;">
              <form action="">
                <div>
                  <label style="text-align: left; color: #343ab4; width: 120px;" for="id_category"><strong>ID Customer</strong></label>
                  <input class="px-3 py-1" style="width: 400px; border-radius: 20px;" type="text" name="id_category" id="id_category">
                </div>
                <div>
                  <label style="text-align: left; color: #343ab4; width: 120px;" for="category"><strong>Customer</strong></label>
                  <input class="px-3 py-1" style="width: 400px; border-radius: 20px;" type="text" name="category" id="category">
                </div>
                <div>
                  <label style="text-align: left; color: #343ab4; width: 120px;" for="leader"><strong>Alamat</strong></label>
                  <input class="px-3 py-1" style="width: 400px; border-radius: 20px;" type="text" name="leader" id="leader">
                </div>
                <button type="submit" style="background-color: #343ab4; width: 150px; height: 35px; color: white; border: none; border-radius: 20px; margin-top: 30px; margin-bottom: 30px;"><strong>Submit</strong></button>
              </form>
      </div>
    </div>
  </div>
</div>

  <script>
    function showContent(contentId, button) {
      // Sembunyikan semua konten
      document.querySelectorAll('.toggle-content').forEach(el => el.style.display = 'none');

      // Hapus class aktif dari semua tombol
      document.querySelectorAll('.toggle-buttons button').forEach(btn => btn.classList.remove('active-button'));

      // Tampilkan konten yang dipilih
      document.getElementById(contentId).style.display = 'block';

      // Tambahkan class aktif ke tombol
      button.classList.add('active-button');
    }

    // Tampilkan konten A secara default saat halaman dibuka
    document.addEventListener('DOMContentLoaded', function () {
      showContent('prod', document.querySelector('.toggle-buttons button'));
    });



  const addRowProd = document.getElementById('addRowProd');
  const addRowFlow = document.getElementById('addRowFlow');
  const addRowDoc = document.getElementById('addRowDoc');
  const addRowCat = document.getElementById('addRowCat');
  const tbodyProd = document.getElementById('table-body-prod');
  const tbodyFlow = document.getElementById('table-body-flow');
  const tbodyDoc = document.getElementById('table-body-doc');
  const bodyCat = document.getElementById('body-add-cat');

  addRowProd.addEventListener('click', () => {
    const rowCount = tbodyProd.rows.length + 1;

    const newRow = document.createElement('tr');
    newRow.innerHTML = `
      <th class="p-0 m-0" style="width: 50px; text-align: center;">${rowCount}</th>
      <td class="p-0 m-0"><input class="form-new-prod" style="width: 240px;" type="text"></td>
      <td class="p-0 m-0"><input class="form-new-prod" style="width: 490px;" type="text"></td>
      <td class="p-0 m-0"><input class="form-new-prod" style="width: 100px;" type="number" oninput="this.value = this.value.replace(/[^0-9]/g, '');"></td>
      <td class="p-0 m-0"><input class="form-new-prod" style="width: 100px;" type="text"></td>
    `;
    tbodyProd.appendChild(newRow);
  });

  addRowFlow.addEventListener('click', () => {
    const rowCount = tbodyFlow.rows.length + 1;

    const newRow = document.createElement('tr');
    newRow.innerHTML = `
      <th class="p-0 m-0" style="width: 50px; text-align: center;">${rowCount}</th>
      <td class="p-0 m-0"><input class="form-new-prod" style="width: 330px;" type="text"></td>
      <td class="p-0 m-0"><input class="form-new-prod" style="width: 150px;" type="text"></td>
      <td class="p-0 m-0"><input class="form-new-prod" style="width: 150px;" type="text"></td>
      <td class="p-0 m-0"><input class="form-new-prod" style="width: 150px;" type="date"></td>
      <td class="p-0 m-0"><input class="form-new-prod" style="width: 150px;" type="time"></td>
    `;
    tbodyFlow.appendChild(newRow);
  });

  addRowDoc.addEventListener('click', () => {
    const rowCount = tbodyDoc.rows.length + 1;

    const newRow = document.createElement('tr');
    newRow.innerHTML = `
      <th class="p-0 m-0" style="width: 50px; text-align: center;">${rowCount}</th>
      <td class="p-0 m-0"><input class="form-new-prod" style="width: 500px;" type="file"></td>
      <td class="p-0 m-0"><input class="form-new-prod" style="width: 150px;" type="text"></td>
      <td class="p-0 m-0"><input class="form-new-prod" style="width: 280px;" type="text"></td>
    `;
    tbodyDoc.appendChild(newRow);
  });

  addRowCat.addEventListener('click', () => {
    const rowCount = bodyCat.children.length + 1;

    const newRow = document.createElement('div');
    newRow.innerHTML = `
      <label style="color: #343ab4; width: 20px;" for="leader"><strong>${rowCount}</strong></label>
      <input class="px-3 py-1" style="width: 400px; border-radius: 20px; background-color: transparent; border: solid 1px #343ab4;" type="text" name="leader" id="leader">
    `;
    bodyCat.appendChild(newRow);
  });
  </script>