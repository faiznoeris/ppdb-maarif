 <main>
   <br><br>



   <div class="container"  style=" padding: 32px 88px 0px 88px; width: 1500px;">
     <div class="row" id="section1">
      <div id="admin" class="col s12">
        <div class="card material-table">
          <div class="table-header">
            <span class="table-title">Calon Siswa Teknik Audio Video<br><b style="font-size: 13px;">*klik untuk melihat detail data</b></span>
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
                <th>Asal Sekolah</th>
                <th>Alamat</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;

              foreach ($data_tav as $row) {
                echo "
                <tr class='tr_click' id='".$row->id_pendaftar."'>
                <td>".$no."</td>
                <td>#".$row->id_pendaftar."</td>
                <td>".$row->nm_lengkap."</td>
                <td>".$row->asal_sekolah."</td>
                <td>".$row->alamat."</td>
                <td><b>".$row->keterangan."</b></td></tr>";

                echo "
                <div id='modal".$row->id_pendaftar."' class='modal'>
                <div class='modal-content'>
                <h4>".$row->nm_lengkap." | #".$row->id_pendaftar."</h4>
                <p>
                Nama: <b><i>".$row->nm_lengkap."</i></b><br>
                ID Pendaftaran: <b><i>#".$row->id_pendaftar."</i></b><br>
                Asal Sekolah: <b><i>".$row->asal_sekolah."</i></b><br>
                Alamat: <b><i>".$row->alamat."</i></b><br>
                Keterangan: <b><i>".$row->keterangan."</i></b><br><br>
                <center><a href='".base_url('index/test')."' class='waves-effect waves-green btn-flat green-text'>Download Keterangan Lulus</a><a href='".base_url('index/test')."' class='waves-effect waves-green btn-flat green-text'>Download Rincian Pembayaran</a></center>
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

    <div class="row" id="section2">
      <div id="admin" class="col s12">
        <div class="card material-table">
          <div class="table-header">
            <span class="table-title">Calon Siswa Teknik Kendaraan Ringan<br><b style="font-size: 13px;">*klik untuk melihat detail data</b></span>
            <div class="actions">

              <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
            </div>
          </div>
          <table id="datatable2">
            <thead>
              <tr>
                <th width="50">No</th>
                <th width="100">ID Pendaftar</th>
                <th>Nama Pendaftar</th>
                <th>Asal Sekolah</th>
                <th>Alamat</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;

              foreach ($data_tkr as $row) {
                echo "
                <tr class='tr_click' id='".$row->id_pendaftar."'>
                <td>".$no."</td>
                <td>#".$row->id_pendaftar."</td>
                <td>".$row->nm_lengkap."</td>
                <td>".$row->asal_sekolah."</td>
                <td>".$row->alamat."</td>
                <td><b>".$row->keterangan."</b></td></tr>";

                echo "
                <div id='modal".$row->id_pendaftar."' class='modal'>
                <div class='modal-content'>
                <h4>".$row->nm_lengkap." | #".$row->id_pendaftar."</h4>
                <p>
                Nama: <b><i>".$row->nm_lengkap."</i></b><br>
                ID Pendaftaran: <b><i>#".$row->id_pendaftar."</i></b><br>
                Asal Sekolah: <b><i>".$row->asal_sekolah."</i></b><br>
                Alamat: <b><i>".$row->alamat."</i></b><br>
                Keterangan: <b><i>".$row->keterangan."</i></b><br><br>
                <center><a href='".base_url('index/test')."' class='waves-effect waves-green btn-flat green-text'>Download Keterangan Lulus</a><a href='".base_url('index/test')."' class='waves-effect waves-green btn-flat green-text'>Download Rincian Pembayaran</a></center>
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

    <div class="row" id="section3">
      <div id="admin" class="col s12">
        <div class="card material-table">
          <div class="table-header">
            <span class="table-title">Calon Siswa Teknik Komputer Jaringan<br><b style="font-size: 13px;">*klik untuk melihat detail data</b></span>
            <div class="actions">

              <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
            </div>
          </div>
          <table id="datatable3">
            <thead>
              <tr>
                <th width="50">No</th>
                <th width="100">ID Pendaftar</th>
                <th>Nama Pendaftar</th>
                <th>Asal Sekolah</th>
                <th>Alamat</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;

              foreach ($data_tkj as $row) {
                echo "
                <tr class='tr_click' id='".$row->id_pendaftar."'>
                <td>".$no."</td>
                <td>#".$row->id_pendaftar."</td>
                <td>".$row->nm_lengkap."</td>
                <td>".$row->asal_sekolah."</td>
                <td>".$row->alamat."</td>
                <td><b>".$row->keterangan."</b></td></tr>";

                echo "
                <div id='modal".$row->id_pendaftar."' class='modal'>
                <div class='modal-content'>
                <h4>".$row->nm_lengkap." | #".$row->id_pendaftar."</h4>
                <p>
                Nama: <b><i>".$row->nm_lengkap."</i></b><br>
                ID Pendaftaran: <b><i>#".$row->id_pendaftar."</i></b><br>
                Asal Sekolah: <b><i>".$row->asal_sekolah."</i></b><br>
                Alamat: <b><i>".$row->alamat."</i></b><br>
                Keterangan: <b><i>".$row->keterangan."</i></b><br><br>
                <center><a href='".base_url('index/test')."' class='waves-effect waves-green btn-flat green-text'>Download Keterangan Lulus</a><a href='".base_url('index/test')."' class='waves-effect waves-green btn-flat green-text'>Download Rincian Pembayaran</a></center>
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
          <!--<div style="padding: 0px 0px 20px 25px; ">

          </div>-->

        </div>
      </div>
    </div>

    <div class="row" id="section4">
      <div id="admin" class="col s12">
        <div class="card material-table">
          <div class="table-header">
            <span class="table-title">Calon Siswa Teknik Alat Berat<br><b style="font-size: 13px;">*klik untuk melihat detail data</b></span>
            <div class="actions">

              <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
            </div>
          </div>
          <table id="datatable4">
            <thead>
              <tr>
                <th width="50">No</th>
                <th width="100">ID Pendaftar</th>
                <th>Nama Pendaftar</th>
                <th>Asal Sekolah</th>
                <th>Alamat</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;

              foreach ($data_tab as $row) {
                echo "
                <tr class='tr_click' id='".$row->id_pendaftar."'>
                <td>".$no."</td>
                <td>#".$row->id_pendaftar."</td>
                <td>".$row->nm_lengkap."</td>
                <td>".$row->asal_sekolah."</td>
                <td>".$row->alamat."</td>
                <td><b>".$row->keterangan."</b></td></tr>";

                echo "
                <div id='modal".$row->id_pendaftar."' class='modal'>
                <div class='modal-content'>
                <h4>".$row->nm_lengkap." | #".$row->id_pendaftar."</h4>
                <p>
                Nama: <b><i>".$row->nm_lengkap."</i></b><br>
                ID Pendaftaran: <b><i>#".$row->id_pendaftar."</i></b><br>
                Asal Sekolah: <b><i>".$row->asal_sekolah."</i></b><br>
                Alamat: <b><i>".$row->alamat."</i></b><br>
                Keterangan: <b><i>".$row->keterangan."</i></b><br><br>
                <center><a href='".base_url('index/test')."' class='waves-effect waves-green btn-flat green-text'>Download Keterangan Lulus</a><a href='".base_url('index/test')."' class='waves-effect waves-green btn-flat green-text'>Download Rincian Pembayaran</a></center>
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



    <br><br>

    <br><br>



  </main>