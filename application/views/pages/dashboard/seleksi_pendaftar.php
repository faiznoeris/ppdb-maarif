<br><br>



<div class="container"  style="padding: 32px 38px 0px 38px; width: 1500px;">


 <div class="row">
  <div class="col s12">
    <ul class="tabs grey darken-1 z-depth-2">
      <li class="tab col s3"><a class="white-text waves-effect waves-light" href="#input_wawancara">Input Nilai Wawancara</a></li>
      <li class="tab col s3"><a class="white-text waves-effect waves-light" href="#hasil_seleksi">Hasil Seleksi</a></li>
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
            <th width="220">Nilai Wawancara</th>
            <th width="130">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;

          foreach ($data as $row) {
            $idpendaftar = $row->id_pendaftar;
            if(!($row->nilai_wawancara > 0)){
              echo "
              <tr>
              <td>".$no."</td>
              <td>#".$row->id_pendaftar."</td>
              <td>".$row->nm_lengkap."</td>
              <td>".$row->skhu."</td>
              <td>".$row->nilai_prestasi."</td>
              <td>".$row->nilai_sertifikat."</td>
              <form id='formValidate' method='post' action='".base_url('seleksi/inputwawancara/'.$row->id_pendaftar)."'>
              <td><div class='input-field'><input type='number' name='nilai_wawancara' id='nilai_wawancara' style='width: 130px;'/></div>
              <input type='hidden' name='id_pendaftar[]' value='".$row->id_pendaftar."'/>
              <input type='hidden' name='nilai_un[]' value='".$row->skhu."'/></td>
              <td><button class='btn cyan waves-effect grey darken-2' type='submit' name='action'>Save</button></td>
              </form>
              </tr>";
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
                <th>Nilai Wawancara</th>
                <th>Nilai Akhir</th>
                <th>Keterangan</th>
                <th width="150">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;

              foreach ($data_hasilseleksi as $row) {
                echo "
                <tr>
                <td>".$no."</td>
                <td>#".$row->id_pendaftar."</td>
                <td>".$row->nm_lengkap."</td>
                <td>".$row->nilai_un."</td>
                <td>".$row->nilai_prestasi."</td>
                <td>".$row->nilai_sertifikat."</td>
                <td>".$row->nilai_wawancara."
                <input type='hidden' name='id_pendaftar[]' value='".$row->id_pendaftar."'/>
                <input type='hidden' name='nilai_un[]' value='".$row->nilai_un."'/>
                </td>
                <td>".$row->nilai_akhir."</td>
                <td>".$row->keterangan."</td>
                <td>";

                if($row->nilai_akhir == "0"){
                  echo "
                  <a class='white-text waves-effect waves-light btn tooltipped grey darken-3' data-position='bottom' data-delay='50' data-tooltip='Lakukan proses penilaian nilai akhir untuk pendaftar dengan ID ".$row->id_pendaftar."' href='". base_url('seleksi/hitungnilaiakhir/one/'.$row->id_pendaftar)."'>Hitung NA</a>";
                }else{
                  echo "-";
                }

                echo "</td></tr>";

                $no++;
              }
              ?>
            </tbody>
          </table>
          <div style="padding: 0px 0px 20px 25px; ">
            <a class="waves-effect waves-light btn tooltipped grey darken-3" data-position="bottom" data-delay="50" data-tooltip="Lakukan proses penilaian nilai akhir untuk semua data pendaftar yang sudah diinput nilai wawancaranya" href="<?= base_url('/seleksi/hitungnilaiakhir/all'); ?>">Hitung Semua Nilai Akhir</a>
            <a class="waves-effect waves-light btn tooltipped grey darken-3" data-position="bottom" data-delay="50" data-tooltip="Reset semua nilai akhir menjadi 0" href="<?= base_url('/seleksi/hitungnilaiakhir/reset'); ?>">Reset</a>
          </div>

        </div>
      </div>
    </div>



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