<div class="page-wrapper">
  <!-- Page header -->
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col-10">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            <?= TITLE_COMPANY ?>
          </div>
          <h2 class="page-title">
            <?= $title ?>
          </h2>
        </div>
        <div class="col-auto ms-auto d-print-none" style="padding-bottom: 20px">
          <?= view('customer/commons/components/dropdown/event_list_dropdown') ?>
        </div>
      </div>
    </div>
  </div>

  <div class="page-body">
    <div class="container-xl">
      <div class="row table-responsive">
        <div class="card">
          <div class="">
            <div class="row g-2 align-items-center">
              <div class="col-10">
                <h3 class="card-title" style="margin-left: 2rem; margin-top: 1rem">Daftar Buku Tamu</h3>
              </div>
              <div class="col-auto ms-auto d-print-none">
                <div class="col-auto ms-auto d-print-none">

                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <div class="form-selectgroup">
                <label class="form-selectgroup-item">
                  <input type="radio" name="guest_status" value="all" class="form-selectgroup-input" checked>
                  <span class="form-selectgroup-label">Semua</span>
                </label>
                <label class="form-selectgroup-item">
                  <input type="radio" name="guest_status" value="Hadir" class="form-selectgroup-input">
                  <span class="form-selectgroup-label">Hadir</span>
                </label>
                <label class="form-selectgroup-item">
                  <input type="radio" name="guest_status" value="Diundan" class="form-selectgroup-input">
                  <span class="form-selectgroup-label">Diundang</span>
                </label>
                <label class="form-selectgroup-item">
                  <input type="radio" name="guest_status" value="Tidak Hadir" class="form-selectgroup-input">
                  <span class="form-selectgroup-label">Tidak Hadir</span>
                </label>
              </div>
            </div>
            <!-- Datatables -->
            <div class="card">
              <div class="card-body">
                <div id="table-default" class="table-responsive">
                  <table id="myTable" class="table">
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th hidden></th>
                        <th class="text-center">Nama Penerima Undangan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Do'a & Harapan</th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <?php
                      $number = 1;
                      foreach ($guestList as $guest) {
                        echo '
                                  <tr>
                                    <td width="5%">' . $number++ . '</td>
                                    <td hidden>' . $guest['status'] . '</td>
                                    <td width="20%">' . $guest['name'] . '</td>
                                    <td width="10%">' . $guest['status'] . '</td>
                                    <td width="65%">' . $guest['wishes'] . '</td>
                                  </tr>
                                  ';
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <!-- Libs JS -->
  <script src="./dist/libs/list.js/dist/list.min.js?1684106062" defer></script>
  <!-- Tabler Core -->
  <script src="./dist/js/tabler.min.js?1684106062" defer></script>
  <script src="./dist/js/demo.min.js?1684106062" defer></script>

</div>