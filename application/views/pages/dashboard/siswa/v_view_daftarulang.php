  <br><br>



  <div class="container"  style="padding: 32px 38px 0px 38px; width: 1500px;">


   <div class="row">
    <div class="col s12">
      <ul class="tabs grey darken-1 z-depth-2">
        <li class="tab col s3"><a class="white-text waves-effect waves-light" href="#daftar_ulang">Data Daftar Ulang / Titip</a></li>
        <li class="tab col s3"><a class="white-text waves-effect waves-light" href="#data_cadangan">Data Cadangan</a></li>
        <li class="tab col s3"><a class="white-text waves-effect waves-light" href="#data_cabutberkas">Data Cabut Berkas</a></li>
      </ul>
    </div>
  </div>

  <a class="waves-effect waves-light btn grey darken-2" href="<?= base_url('/laporan/daftarulang'); ?>">Export Data (DU,Titip,Cadangan)</a>

  <div class="row" id="daftar_ulang">
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
              <th width="200">Nama Pendaftar</th>
              <th>Hasil Seleksi</th>
              <th>Belum Dibayar</th>
              <th>Nominal Pembayaran</th>
              <th>Status Daftar Ulang</th>
              <th>Deadline</th>
              <th width="105">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;

            foreach ($data as $row) {
              $idpendaftar = $row->id_pendaftar;
              if($row->status != 'du' && $row->status != 'cadangan'){
                echo "
                <tr>
                <td>".$no."</td>
                <td>#".$row->id_pendaftar."</td>
                <td>".$row->nm_lengkap."</td>
                <td>".$row->keterangan_lulus."</td>
                <td>Rp. ".$row->biaya_belumbayar."</td>
                <form id='formValidate' method='post' action='".base_url('daftarulang/inputbayaran/'.$row->id_pendaftar)."'>
                <td><div class='input-field'><input type='number' name='nominal_pembayaran' id='nominal_pembayaran' style='width: 130px;'/></div>
                <td>".$row->status."</td>
                <td>".$row->deadline2."</td>
                <td><button class='btn-floating btn-small tooltipped green darken-2' data-position='left' data-delay='50' data-tooltip='Simpan Pembayaran' type='submit' name='action'><i class='material-icons'>done</i></button>
                <a class='btn-floating btn-small tooltipped red darken-2 modal-trigger' data-position='right' data-delay='50' data-tooltip='Cabut Berkas' href='#modalCabutBerkas".$idpendaftar."'>
                <i class='material-icons' style='color: rgba(255, 255, 255, 1);'>delete</i>
                </a> 

                <div id='modalCabutBerkas".$idpendaftar."' class='modal' style='width: 500px;'>
                <div class='modal-content'>
                <h4>Pendaftar Cabut Berkas</h4>
                <p><b>!WARNING!</b> This can't be undone!<br><br>Set status cabut berkas untuk pendaftar <i><b>".$row->nm_lengkap."</b></i> ?</p>
                </div>
                <div class='modal-footer centered'>
                <a href='".base_url('daftarulang/cabutberkas/'.$row->id_pendaftar)."' class='modal-action modal-close waves-effect waves-green btn-flat'>Ok</a>
                <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Cancel</a>
                </div>
                </div>

                </td>
                </form>
                </tr>";
                $no++;
              }

            }
            ?>
          </tbody>
        </table>
        <div style="padding: 0px 0px 20px 25px; ">
          <!--<a class="waves-effect waves-light btn grey darken-2" href="<?= base_url('/index/test2'); ?>">Export Data</a><br><br>-->
          <span class="flow-text" style="font-size: 15px;">
            <u>Catatan:</u><br>
            DU: <b><?= $data_du ?></b><br>
            Titip: <b><?= $data_titip ?></b><br>
            DU + Titip: <b><?= $data_dutitip ?></b><br>
            Belum Melakukan Pembayaran: <b><?= $data_blmbayar ?></b><br>
          </span>
        </div>

      </div>
    </div>
  </div>



  <div class="row" id="data_cadangan">
    <div id="admin" class="col s12">
      <div class="card material-table">
        <div class="table-header">
          <span class="table-title">Data Pendaftar</span>
          <div class="actions">

            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
          </div>
        </div>
        <table id="datatable2">
          <thead>
            <tr>
              <th width="50">No</th>
              <th width="100">ID Pendaftar</th>
              <th width="250">Nama Pendaftar</th>
              <th width="250">Hasil Seleksi</th>
              <th width="250">Status Daftar Ulang</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;

            foreach ($data as $row) {
              if($row->status == 'cadangan'){
                echo "
                <tr>
                <td>".$no."</td>
                <td>#".$row->id_pendaftar."</td>
                <td>".$row->nm_lengkap."</td>
                <td>".$row->keterangan_lulus."</td>
                <td>".$row->status."</td></tr>";
                $no++;
              }
            }
            ?>
          </tbody>
        </table>
        <div style="padding: 0px 0px 20px 25px; ">
          <!--<a class="waves-effect waves-light btn grey darken-2" href="<?= base_url('/index/test2'); ?>">Export Data</a><br><br>-->
          <span class="flow-text" style="font-size: 15px;">
            <u>Catatan:</u><br>
            Cadangan: <b><?= $data_cadangan ?></b><br>
          </span>
        </div>

      </div>
    </div>
  </div>


  <div class="row" id="data_cabutberkas">
    <div id="admin" class="col s12">
      <div class="card material-table">
        <div class="table-header">
          <span class="table-title">Data Pendaftar</span>
          <div class="actions">

            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
          </div>
        </div>
        <table id="datatable3">
          <thead>
            <tr>
              <th width="50">No</th>
              <th width="100">ID Pendaftar</th>
              <th width="250">Nama Pendaftar</th>
              <th width="250">Hasil Seleksi</th>
              <th width="250">Status Daftar Ulang</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;

            foreach ($data_cbtberkas as $row) {
              if($row->status == 'cabut-berkas'){
                echo "
                <tr>
                <td>".$no."</td>
                <td>#".$row->id_pendaftar."</td>
                <td>".$row->nm_lengkap."</td>
                <td>".$row->keterangan_lulus."</td>
                <td>".$row->status."</td></tr>";
                $no++;
              }
            }
            ?>
          </tbody>
        </table>
        <div style="padding: 0px 0px 20px 25px; ">
          <!--<a class="waves-effect waves-light btn grey darken-2" href="<?= base_url('/index/test2'); ?>">Export Data</a><br><br>-->
          <span class="flow-text" style="font-size: 15px;">
            <u>Catatan:</u><br>
            Cabut Berkas: <b><?= $jml_cabutberkas ?></b><br>
          </span>
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