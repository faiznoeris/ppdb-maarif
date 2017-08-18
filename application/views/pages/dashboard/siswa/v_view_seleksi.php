<br><br>



<div class="container"  style="padding: 32px 38px 0px 38px; width: 1500px;">


 <div class="row">
  <div class="col s12">
    <ul class="tabs grey darken-1 z-depth-2">
      <li class="tab col s3"><a class="white-text waves-effect waves-light" href="#input_wawancara">Input Nilai Wawancara</a></li>
      <li class="tab col s3"><a class="white-text waves-effect waves-light" href="#hasil_seleksi">Hasil Seleksi</a></li>
      <?php if($data_userlvl == 0): ?>
        <li class="tab col s3"><a class="white-text waves-effect waves-light" href="#data_approval">Daftar Waiting Approval</a></li>
      <?php endif ?>
    </ul>
  </div>
</div>


<div class="row" id="input_wawancara">
  <div id="admin" class="col s12">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title">Data Pendaftar</span>
        <div class="actions">

          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable">
        <thead>
          <tr>
            <th width="50">No</th>
            <th width="100">ID Pendaftar</th>
            <th>Nama Pendaftar</th>
            <th>Nilai UN</th>
            <th>Nilai Prestasi</th>
            <th>Nilai Sertifikat</th>
            <!--<th width="220">Nilai Wawancara</th>-->
            <th width="120">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;

          foreach ($data as $row) {
            $idpendaftar = $row->id_pendaftar;
            if(!($row->nilai_minat > -1 && $row->nilai_kepribadian > -1 && $row->nilai_ibadah > -1 && $row->nilai_keluarga > -1 && $row->nilai_lain > -1)){
              echo "
              <form id='formValidate' method='post' action='".base_url('seleksi/inputwawancara/'.$row->id_pendaftar)."'>
              <tr>
              <td>".$no."</td>
              <td>#".$row->id_pendaftar."</td>
              <td>".$row->nm_lengkap."</td>
              <td>".$row->skhu."</td>
              <td>".$row->nilai_prestasi."</td>
              <td>".$row->nilai_sertifikat."</td>";
              /*<td><div class='input-field'><input type='number' name='nilai_wawancara' id='nilai_wawancara' style='width: 130px;'/></div>
              <input type='hidden' name='id_pendaftar[]' value='".$row->id_pendaftar."'/>
              <input type='hidden' name='nilai_un[]' value='".$row->skhu."'/></td>*/
              echo "<td> 
              <a class='white-text btn tooltipped grey darken-2 modal-trigger' data-position='top' data-delay='50' data-tooltip='Input Nilai Wawancara' href='#modalInputWawancara".$idpendaftar."'>
              Input
              </a> </td>
              </form>
              </tr>";

              if($row->nilai_minat == -1){
                $minat = 0;
              }else{
                $minat = $row->nilai_minat;
              }

              if($row->nilai_kepribadian == -1){
                $kepribadian = 0;
              }else{
                $kepribadian = $row->nilai_kepribadian;
              }

              if($row->nilai_ibadah == -1){
                $ibadah = 0;
              }else{
                $ibadah = $row->nilai_ibadah;
              }

              if($row->nilai_keluarga == -1){
                $keluarga = 0;
              }else{
                $keluarga = $row->nilai_keluarga;
              }
              
              if($row->nilai_narkoba == -1){
                $narkoba = 0;
              }else{
                $narkoba = $row->nilai_narkoba;
              }

              if($row->nilai_lain == -1){
                $lain = 0;
              }else{
                $lain = $row->nilai_lain;
              }

              echo "
              <div id='modalInputWawancara".$idpendaftar."' class='modal'>
              <div class='modal-content'>
              <h4>Input Nilai Wawancara | <b><i>#".$row->id_pendaftar."</b></i></h4>
              <form id='formValidate' method='post' action='".base_url('seleksi/inputwawancara/'.$row->id_pendaftar)."'>
              <br> 
              <div class='row'>
              <div class='col s12'>     
              Nilai Minat:<div class='input-field inline'><input type='number' max='25' placeholder='".$minat."' name='nilai_minat' style='width: 130px;'/></div>
              </div>
              <div class='col s12'>     
              Nilai Kepribadian:<div class='input-field inline'><input type='number' max='20' placeholder='".$kepribadian."' name='nilai_kepribadian' style='width: 130px;'/></div>
              </div>
              <div class='col s12'>     
              Nilai Ibadah & Sholat:<div class='input-field inline'><input type='number' max='25' placeholder='".$ibadah."' name='nilai_ibadah' style='width: 130px;'/></div>
              </div>
              <div class='col s12'>     
              Nilai Keluarga:<div class='input-field inline'><input type='number' max='20' placeholder='".$keluarga."' name='nilai_keluarga' style='width: 130px;'/></div>
              </div>
              <div class='col s12'>     
              Nilai Narkoba:<div class='input-field inline'><input type='number' max='8' placeholder='".$narkoba."' name='nilai_narkoba' style='width: 130px;'/></div>
              </div>
              <div class='col s12'>     
              Nilai Lain - Lain:<div class='input-field inline'><input type='number' max='2' placeholder='".$lain."' name='nilai_lain'  style='width: 130px;'/></div>
              </div>
              </div>
              <div class='modal-footer centered'>
              <button class='modal-action waves-effect waves-green btn-flat' type='submit' name='action'>Save</button>
              <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Cancel</a>
              </form>
              </div>
              </div>";
              $no++;
            }
            
          }
          ?>
        </tbody>
      </table>
          <!--<div style="padding: 0px 0px 20px 25px; ">
            <button class="btn cyan waves-effect grey darken-2" type="submit" name="action">Save</button>
          </div>-->

        </div>
      </div>
    </div>



    <div class="row" id="hasil_seleksi">
      <div id="admin" class="col s12">
        <div class="card material-table">
          <div class="table-header">
            <span class="table-title">Data Hasil Seleksi</span>
            <div class="actions">

              <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
            </div>
          </div>
          <table id="datatableHasilSeleksi">
            <thead>
              <tr>
                <th width="50">No</th>
                <th width="100">ID Pendaftar</th>
                <th>Nama Pendaftar</th>
                <th>Nilai UN</th>
                <th>Nilai Prestasi</th>
                <th>Nilai Sertifikat</th>
                <th>Nilai Wawancara Total</th>
                <th>Nilai Akhir</th>
                <th>Keterangan</th>
                <th width="110">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;

              foreach ($data_hasilseleksi as $row) {
                $idpendaftar = $row->id_pendaftar;
                $totalwawancara = $row->nilai_minat + $row->nilai_kepribadian + $row->nilai_ibadah + $row->nilai_keluarga + $row->nilai_narkoba + $row->nilai_lain;
                if($totalwawancara == -6){
                  $totalwawancara = 0;
                }
                if($row->wait_approval != 1){
                  echo 
                  "<tr>
                  <td>".$no."</td>
                  <td>#".$row->id_pendaftar."</td>
                  <td>".$row->nm_lengkap."</td>
                  <td>".$row->nilai_un."</td>
                  <td>".$row->nilai_prestasi."</td>
                  <td>".$row->nilai_sertifikat."</td>
                  <td>".$totalwawancara."</td>
                  <input type='hidden' name='id_pendaftar[]' value='".$row->id_pendaftar."'/>
                  <input type='hidden' name='nilai_un[]' value='".$row->nilai_un."'/>
                  </td>
                  <td>".$row->nilai_akhir."</td>
                  <td>".$row->keterangan."</td>
                  <td>";

                  if($row->nilai_akhir == "0"){
                    echo "
                    <a class='btn-floating btn-small tooltipped grey darken-2 modal-trigger' data-position='left' data-delay='50' data-tooltip='Lakukan proses penilaian nilai akhir untuk pendaftar dengan ID ".$row->id_pendaftar."' href='#modalHitungNA".$row->id_pendaftar."'>
                    <i class='material-icons' style='color: rgba(255, 255, 255, 1);'>done</i>
                    </a>";

                    echo "
                    <div id='modalHitungNA".$row->id_pendaftar."' class='modal' style='width: 500px;'>
                    <div class='modal-content'>
                    <h4>Hitung Nilai Akhir</h4>
                    <p><b>!WARNING!</b> This can't be undone!<br><br>Hitung nilai akhir untuk <i><b>".$row->nm_lengkap."</b></i> ?</p>
                    </div>
                    <div class='modal-footer centered'>
                    <a href='".base_url('seleksi/hitungnilaiakhir/one/'.$row->id_pendaftar)."' class='modal-action modal-close waves-effect waves-green btn-flat'>Ok</a>
                    <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Cancel</a>
                    </div>
                    </div>";


                    if($row->nilai_minat != -1 && $row->nilai_kepribadian != -1 && $row->nilai_ibadah != -1 && $row->nilai_keluarga != -1 && $row->nilai_narkoba != -1 && $row->nilai_lain != -1){
                      echo "
                      </a><a class='btn-floating btn-small tooltipped grey darken-2 modal-trigger' data-position='right' data-delay='50' data-tooltip='Edit Nilai Wawancara' href='#modalEdit".$idpendaftar."'>
                      <i class='material-icons' style='color: rgba(255, 255, 255, 1);'>edit</i>
                      </a>

                      <div id='modalEdit".$idpendaftar."' class='modal'>
                      <div class='modal-content'>
                      <h4>Edit Nilai Wawancara <i><b>".$row->nm_lengkap."</b></i> ?</h4>";

                      if($data_userlvl == 0){
                        echo "
                        <form id='formValidate' method='post' action='".base_url('seleksi/editwawancara/higheradmin/'.$data_iduser.'/'.$row->id_pendaftar)."'>";
                      }else{
                        echo "
                        <form id='formValidate' method='post' action='".base_url('seleksi/editwawancara/reguleradmin/'.$data_iduser.'/'.$row->id_pendaftar)."'>";
                      }

                      echo "
                      <br> 
                      <div class='row'>
                      <div class='col s12'>     
                      Nilai Minat:<div class='input-field inline'><input type='number' max='25' placeholder='".$row->nilai_minat."' name='nilai_minat' style='width: 130px;'/></div>
                      </div>
                      <div class='col s12'>     
                      Nilai Kepribadian:<div class='input-field inline'><input type='number' max='20' placeholder='".$row->nilai_kepribadian."' name='nilai_kepribadian' style='width: 130px;'/></div>
                      </div>
                      <div class='col s12'>     
                      Nilai Ibadah & Sholat:<div class='input-field inline'><input type='number' max='25' placeholder='".$row->nilai_ibadah."' name='nilai_ibadah' style='width: 130px;'/></div>
                      </div>
                      <div class='col s12'>     
                      Nilai Keluarga:<div class='input-field inline'><input type='number' max='20' placeholder='".$row->nilai_keluarga."' name='nilai_keluarga' style='width: 130px;'/></div>
                      </div>
                      <div class='col s12'>     
                      Nilai Narkoba:<div class='input-field inline'><input type='number' max='8' placeholder='".$row->nilai_narkoba."' name='nilai_narkoba' style='width: 130px;'/></div>
                      </div>
                      <div class='col s12'>     
                      Nilai Lain - Lain:<div class='input-field inline'><input type='number' max='2' placeholder='".$row->nilai_lain."' name='nilai_lain'  style='width: 130px;'/></div>
                      </div>
                      </div>
                      <div class='modal-footer centered'>
                      <button class='modal-action waves-effect waves-green btn-flat' type='submit' name='action'>Save</button>
                      <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Cancel</a>
                      </form>
                      </div>
                      </div>";
                    }
                  }else{
                    echo "-";
                  }

                  echo "</td></tr>";

                  $no++;
                }
              }
              ?>
            </tbody>
          </table>
          <div style="padding: 0px 0px 20px 25px; ">
            <a class="waves-effect waves-light btn tooltipped grey darken-3" data-position="bottom" data-delay="50" data-tooltip="Lakukan proses penilaian nilai akhir untuk semua data pendaftar yang sudah diinput nilai wawancaranya" href="<?= base_url('/seleksi/hitungnilaiakhir/all'); ?>">Hitung Semua Nilai Akhir</a>
            <!--<a class="waves-effect waves-light btn tooltipped grey darken-3" data-position="bottom" data-delay="50" data-tooltip="Reset semua nilai akhir menjadi 0" href="<?= base_url('/seleksi/hitungnilaiakhir/reset'); ?>">Reset</a>-->
          </div>

        </div>
      </div>
    </div>

    <?php if($data_userlvl == 0): ?>
      <div class="row" id="data_approval">
        <div id="admin" class="col s12">
          <div class="card material-table">
            <div class="table-header">
              <span class="table-title">Data Waiting Approval</span>
              <div class="actions">

                <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
              </div>
            </div>
            <table id="datatable3">
              <thead>
                <tr>
                  <th width="50">No</th>
                  <th width="150">ID Pendaftar</th>
                  <th width="250">Requested By</th>
                  <th width="200">Date Requested</th>
                  <th width="250">Changes</th>
                  <th width="150">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;

                foreach ($data_approval as $row) {
                  echo "
                  <tr class='tr_click' id='".$row->id_pendaftar."'>
                  <td>".$no."</td>
                  <td>#".$row->id_pendaftar."</td>
                  <td>".$row->username."</td>
                  <td>".$row->date_requested2."</td>
                  <td>Click to see</td>
                  <td>              
                  <a class='btn-floating btn-small tooltipped green darken-2 modal-trigger' data-position='right' data-delay='50' data-tooltip='Approve Edit' href='".base_url('seleksi/approve/'.$row->id_approval)."'>
                  <i class='material-icons' style='color: rgba(255, 255, 255, 1);'>done</i>
                  </a></td>
                  </tr>";

                  echo "
                  <div id='modal".$row->id_pendaftar."' class='modal'>
                  <div class='modal-content'>
                  <h4>Detail changes for ID Pendaftar ".$row->id_pendaftar."</h4>
                  <p>
                  ".$row->changes."
                  </p>
                  </div>
                  <div class='modal-footer'>
                  <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Close</a>
                  </div>
                  </div>";
                  $no++;
                }
                ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <br><br>

  <style type="text/css">
  .input-field div.error{
    position: relative;
    top: -1rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field .prefix.active {
    color: green !important;
  }

  .row .input-field input:focus {
    border-bottom: 1px solid green !important;
    box-shadow: 0 1px 0 0 green !important
  }
</style>