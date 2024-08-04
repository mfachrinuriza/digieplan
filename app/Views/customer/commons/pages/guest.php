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

  <!-- Page body -->
  <div class="page-body">
    <div class="container-xl">
      <!-- Page header -->
      <div class="page-header d-print-none">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none" style="padding-bottom: 20px">
              <div class="btn-list">
                <?php
                $shareToAll = 'https://api.whatsapp.com/send/?text=Assalamu%27alaikum%20Wr.%20Wb%20%0ABismillahirahmanirrahim.%20Tanpa%20mengurangi%20rasa%20hormat%2C%20perkenankan%20kami%20mengundang%20Bapak%2FIbu%2FSaudara%2Fi%20-%20 %20untuk%20menghadiri%20acara%20kami.%20%0A%0A%20Berikut%20link%20undangan%20kami%2C%20untuk%20info%20lengkap%20dari%20acara%20bisa%20kunjungi%20%3A%20%0A%20%0A%0AMerupakan%20suatu%20kebahagiaan%20bagi%20kami%20apabila%20Bapak%2FIbu%2FSaudara%2Fi%20berkenan%20untuk%20hadir%20dan%20memberikan%20doa%20restu.%20%0A%0AMohon%20maaf%20perihal%20undangan%20hanya%20di%20bagikan%20melalui%20pesan%20ini.%20%0A%0ATerima%20kasih%20banyak%20atas%20perhatiannya.%20%0AWassalamu%27alaikum%20Wr.%20Wb.%20%0A%0ATerima%20Kasih.';
                ?>
                <a href="<?= $shareToAll ?>" class="btn btn-outline-success" target="_blank">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                    <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1"></path>
                  </svg>
                  Share Ke Semua
                </a>
                <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-guest-create">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                  </svg>
                  Tamu
                </a>
                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row table-responsive">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Buku Tamu</h3>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <div class="form-selectgroup">
                <label class="form-selectgroup-item">
                  <input type="radio" name="guest_status" value="All" class="form-selectgroup-input" checked>
                  <span class="form-selectgroup-label">Semua</span>
                </label>
                <label class="form-selectgroup-item">
                  <input type="radio" name="guest_status" value="Hadir" class="form-selectgroup-input">
                  <span class="form-selectgroup-label">Hadir</span>
                </label>
                <label class="form-selectgroup-item">
                  <input type="radio" name="guest_status" value="Diundang" class="form-selectgroup-input">
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
                        <th>No</th>
                        <th hidden></th>
                        <th>Nama Penerima Undangan</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <?php
                      $number = 1;
                      $statusStyle = "";
                      $isValid = true;
                      if (!isset($profileBride) || !isset($profileGroom)) {
                        $isValid = false;
                      }

                      foreach ($guestList as $guest) {
                        $invitedEncode = urlencode($guest['name'] . ($guest['invite_with'] != null ? (' dan ' . $guest['invite_with']) : ""));
                        $invitedURLEncoded = urlencode(base_url('') . '/' . $transactionSelected['title_path'] . '?to=' . $guest['name'] . ($guest['invite_with'] != null ? ('+%26+' . $guest['invite_with']) : ""));

                        $whatsappURL = 'https://api.whatsapp.com/send/?text=Assalamu%27alaikum%20Wr.%20Wb%20%0ABismillahirahmanirrahim.%20Tanpa%20mengurangi%20rasa%20hormat%2C%20perkenankan%20kami%20mengundang%20Bapak%2FIbu%2FSaudara%2Fi%20-%20' . $invitedEncode . '%20-%20untuk%20menghadiri%20acara%20kami.%20%0A%0A%20Berikut%20link%20undangan%20kami%2C%20untuk%20info%20lengkap%20dari%20acara%20bisa%20kunjungi%20%3A%20%0A' . $invitedURLEncoded . '%20%0A%0AMerupakan%20suatu%20kebahagiaan%20bagi%20kami%20apabila%20Bapak%2FIbu%2FSaudara%2Fi%20berkenan%20untuk%20hadir%20dan%20memberikan%20doa%20restu.%20%0A%0AMohon%20maaf%20perihal%20undangan%20hanya%20di%20bagikan%20melalui%20pesan%20ini.%20%0A%0ATerima%20kasih%20banyak%20atas%20perhatiannya.%20%0AWassalamu%27alaikum%20Wr.%20Wb.%20%0A%0ATerima%20Kasih.';
                        $guestName = $guest['name'] . ($guest['invite_with'] != null ? (' & ' . $guest['invite_with']) : "");

                        if ($guest['status'] == "Hadir") {
                          $statusStyle = "bg-success text-white";
                        } else if ($guest['status'] == "Diundang") {
                          $statusStyle = "bg-warning text-white";
                        } else if ($guest['status'] == "Tidak Hadir") {
                          $statusStyle = "bg-danger text-white";
                        }

                        echo '
                                  <tr valign="middle" id="row-guest">
                                    <td width="5%">' . $number++ . '</td>
                                    <td hidden>' . $guest['status'] . '</td>
                                    <td width="55%">' . $guestName . ' <kbd class="' . $statusStyle . '">' . $guest['status'] . '</kbd></td>
                                    <td width="25%" class="text-center">
                                      <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#' . $modalNameUpdate . $guest['id'] . '">
                                        &nbsp;&nbsp;&nbsp; 
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                            <path d="M16 5l3 3"></path>
                                        </svg>
                                      </a>
                                      <a href="' . base_url('/customer/tamu/delete/' . $guest['id']) . '" class="btn btn-outline-danger">
                                        &nbsp;&nbsp;&nbsp; 
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                          <path d="M4 7l16 0"></path>
                                          <path d="M10 11l0 6"></path>
                                          <path d="M14 11l0 6"></path>
                                          <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                          <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                      </a>
                                      <button class="btn btn-outline-secondary getURLData" data-url="' . base_url('') . '/' . $transactionSelected['title_path'] . '?to=' . $guest['name'] . '+%26+' . $guest['invite_with'] . '" data-validation="' . $isValid . '">
                                        &nbsp;&nbsp;&nbsp; 
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                          <path d="M9 15l6 -6"></path>
                                          <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464"></path>
                                          <path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463"></path>
                                        </svg>
                                      </button>
                                      <a href="' . $whatsappURL . '" target="_blank" class="btn btn-outline-success">
                                        &nbsp;&nbsp;&nbsp; 
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                          <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                                          <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1"></path>
                                        </svg>
                                      </a>       
                                    </td>
                                  </tr>
                                  ';

                        echo view('customer/commons/components/modals/guest/update_guest_modal', ['guest' => $guest]);
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
  <?php
  echo view('customer/commons/components/modals/guest/create_guest_modal');
  echo view('customer/commons/layer/footer_page');
  ?>
</div>