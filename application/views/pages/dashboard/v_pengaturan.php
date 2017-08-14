<br><br>



<div class="container"  style="padding: 32px 88px 0px 88px; width: 1500px;">

 <div class="row">
  <div class="col s12">
    <ul class="tabs grey darken-1 z-depth-2">
      <li class="tab col s3"><a class="white-text waves-effect waves-light tooltipped" data-position="left" data-delay="50" data-tooltip="Lihat data Tahun Ajaran" href="#tahun_ajaran">Tahun Ajaran</a></li>
      <li class="tab col s3"><a class="white-text waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Lihat data khusus jurusan TAV" href="#kuota">Kuota</a></li>
      <li class="tab col s3"><a class="white-text waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Lihat data khusus jurusan TAB" href="#bobotnilai">Bobot Nilai</a></li>
      <li class="tab col s3"><a class="white-text waves-effect waves-light tooltipped" data-position="right" data-delay="50" data-tooltip="Lihat data khusus jurusan TKR" href="#biaya">Biaya</a></li>
    </ul>
  </div>
</div>

<div class="row" id="tahun_ajaran">
  <div id="admin" class="col s12">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title">Data Tahun Ajaran</span>
        <div class="actions">
          <a href="<?php echo base_url('dashboard/pengaturan/thajaran/add');?>" class="add_circle-toggle waves-effect btn-flat nopadding"><i class="material-icons">add_circle</i></a>
          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable">
        <thead>
          <tr>
            <th width="60">No</th>
            <th>Tahun Ajaran</th>
            <th>Tanggal Mulai Pendaftaran</th>
            <th>Waktu Pendaftaran</th>
            <th>Tanggal Terakhir Pendaftaran</th>
            <th>Status</th>
            <th width="100">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no=1;
          foreach ($peng_thAjaran as $row) {
            $idtahun = $row->id_tahun;
            echo "<tr>
            <td>".$no."</td>
            <td>".$row->tahun."</td>
            <td>".$row->tanggal_mulai."</td>
            <td>".$row->waktu_pendaftaran."</td>
            <td>".$row->tanggal_terakhir."</td>
            <td>".$row->status."</td>
            <td>
            <a class='btn-floating btn-small tooltipped yellow darken-2' data-position='top' data-delay='50' data-tooltip='Edit Jadwal' href='". base_url('dashboard/pengaturan/thajaran/edit/'.$idtahun) . "'>
            <i class='material-icons'>mode_edit</i>
            </a>

            </td>
            </tr>";
            $no++;
            /*
                        <a class='btn-floating btn-small tooltipped red darken-2' data-position='top' data-delay='50' data-tooltip='Hapus Jadwal' href='". base_url('pengaturan/edittahunAjaran/'.$idtahun) . "'>
            <i class='material-icons'>delete</i>
            </a>
            */
          }
          ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="row" id="kuota">
  <div id="admin" class="col s12">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title">Data Kuota</span>
        <div class="actions">
          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable2">
        <thead>
          <tr>
            <th width="60">No</th>
            <th>Tahun Ajaran</th>
            <th>Kuota TAV</th>
            <th>Kuota TKR</th>
            <th>Kuota TKJ</th>
            <th>Kuota TAB</th>
            <th>Total Kuota</th>
            <th width="60">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no=1;
          foreach ($data_kuota as $row) {
            $total = $row->kuota_tav + $row->kuota_tkr + $row->kuota_tkj + $row->kuota_tab;
            echo "<tr>
            <td>".$no."</td>
            <td>".$row->tahun."</td>
            <td>".$row->kuota_tav."</td>
            <td>".$row->kuota_tkr."</td>
            <td>".$row->kuota_tkj."</td>
            <td>".$row->kuota_tab."</td>
            <td>".$total."</td>
            <td>
            <a class='btn-floating btn-small tooltipped yellow darken-2' data-position='top' data-delay='50' data-tooltip='Edit Kuota' href='". base_url('dashboard/pengaturan/kuota/edit/'.$row->id_kuota) . "'>
            <i class='material-icons'>mode_edit</i>
            </a>
            </td>
            </tr>";
            $no++;
          }
          ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="row" id="bobotnilai">
  <div id="admin" class="col s12" >
    <div class="card material-table" style="padding: 22px 28px 0px 28px;">
      <form id="formValidate" method="post" action="<?php echo base_url('pengaturan/savebobot/');?>">

        <h4>Bobot Nilai Prestasi</h4>

        <div class="col s4">
         <div class="row">
          <div class="col s12">
            Nasional - Juara I:
            <div class="input-field inline">
              <input 
              id            = "nas_1"
              name          = "nas_1" 
              type          = "number" 
              class         = "validate"
              placeholder   = "<?= $data_bobot->row()->prestasi_nasional_1 ?>" 
              data-error    = ".errorTxt1">

              <label for = "nas_1"></label>
              <div class="errorTxt1"></div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col s12">
            Nasional - Juara II:
            <div class="input-field inline">
              <input 
              id            = "nas_2"
              name          = "nas_2" 
              type          = "number" 
              class         = "validate"
              placeholder   = "<?= $data_bobot->row()->prestasi_nasional_2 ?>" 
              data-error    = ".errorTxt2">

              <label for = "nas_2"></label>
              <div class="errorTxt2"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col s12">
            Nasional - Juara III:
            <div class="input-field inline">
              <input 
              id            = "nas_3"
              name          = "nas_3" 
              type          = "number" 
              class         = "validate"
              placeholder   = "<?= $data_bobot->row()->prestasi_nasional_3 ?>" 
              data-error    = ".errorTxt3">

              <label for = "nas_3"></label>
              <div class="errorTxt3"></div>
            </div>
          </div>
        </div>
      </div>


      <div class="col s4">
       <div class="row">
        <div class="col s12">
          Provinsi - Juara I:
          <div class="input-field inline">
            <input 
            id            = "prov_1"
            name          = "prov_1" 
            type          = "number" 
            class         = "validate"
            placeholder   = "<?= $data_bobot->row()->prestasi_provinsi_1 ?>" 
            data-error    = ".errorTxtProv1">

            <label for = "prov_1"></label>
            <div class="errorTxtProv1"></div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col s12">
          Provinsi - Juara II:
          <div class="input-field inline">
            <input 
            id            = "prov_2"
            name          = "prov_2" 
            type          = "number" 
            class         = "validate"
            placeholder   = "<?= $data_bobot->row()->prestasi_provinsi_2 ?>" 
            data-error    = ".errorTxtProv2">

            <label for = "prov_2"></label>
            <div class="errorTxtProv2"></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12">
          Provinsi - Juara III:
          <div class="input-field inline">
            <input 
            id            = "prov_3"
            name          = "prov_3" 
            type          = "number" 
            class         = "validate"
            placeholder   = "<?= $data_bobot->row()->prestasi_provinsi_3 ?>" 
            data-error    = ".errorTxtProv3">

            <label for = "prov_3"></label>
            <div class="errorTxtProv3"></div>
          </div>
        </div>
      </div>
    </div>


    <div class="col s4">
     <div class="row">
      <div class="col s12">
        Kabupaten - Juara I:
        <div class="input-field inline">
          <input 
          id            = "kab_1"
          name          = "kab_1" 
          type          = "number" 
          class         = "validate"
          placeholder   = "<?= $data_bobot->row()->prestasi_kabupaten_1 ?>" 
          data-error    = ".errorTxtKab1">

          <label for = "kab_1"></label>
          <div class="errorTxtKab1"></div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col s12">
        Kabupaten - Juara II:
        <div class="input-field inline">
          <input 
          id            = "kab_2"
          name          = "kab_2" 
          type          = "number" 
          class         = "validate"
          placeholder   = "<?= $data_bobot->row()->prestasi_kabupaten_2 ?>" 
          data-error    = ".errorTxtKab2">

          <label for = "kab_2"></label>
          <div class="errorTxtKab2"></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col s12">
        Kabupaten - Juara III:
        <div class="input-field inline">
          <input 
          id            = "kab_3"
          name          = "kab_3" 
          type          = "number" 
          class         = "validate"
          placeholder   = "<?= $data_bobot->row()->prestasi_kabupaten_3 ?>" 
          data-error    = ".errorTxtKab3">

          <label for = "kab_3"></label>
          <div class="errorTxtKab3"></div>
        </div>
      </div>
    </div>
    <br><br>
  </div>



  <h4>Bobot Nilai Sertifikat</h4>

  <div class="col s4">
   <div class="row">
    <div class="col s12">
      Sertifikat - Lanjut:
      <div class="input-field inline">
        <input 
        id            = "ser_1"
        name          = "ser_1" 
        type          = "number" 
        class         = "validate"
        placeholder   = "<?= $data_bobot->row()->sertifikat_lanjut ?>" 
        data-error    = ".errorTxtSer1">

        <label for = "ser_1"></label>
        <div class="errorTxtSer1"></div>
      </div>
    </div>
  </div>
</div>

<div class="col s4">
  <div class="row">
    <div class="col s12">
      Sertifikat - Menengah:
      <div class="input-field inline">
        <input 
        id            = "ser_2"
        name          = "ser_2" 
        type          = "number" 
        class         = "validate"
        placeholder   = "<?= $data_bobot->row()->sertifikat_menengah ?>" 
        data-error    = ".errorTxtSer2">

        <label for = "ser_2"></label>
        <div class="errorTxtSer2"></div>
      </div>
    </div>
  </div>
</div>
<div class="col s4">
  <div class="row">
    <div class="col s12">
      Sertifikat - Dasar:
      <div class="input-field inline">
        <input 
        id            = "ser_3"
        name          = "ser_3" 
        type          = "number" 
        class         = "validate"
        placeholder   = "<?= $data_bobot->row()->sertifikat_dasar ?>" 
        data-error    = ".errorTxtSer3">

        <label for = "ser_3"></label>
        <div class="errorTxtSer3"></div>
      </div>
    </div>
  </div>
</div>

<br>
<div class="row">
  <div class="row center">
    <div class="row">
      <div class="input-field col s12">
        <button class="btn cyan waves-effect green darken-3" type="submit" name="action">SAVE</button>
      </div>
    </div>
  </div>

</form>
</div>
</div>
</div>
</div>


<br><br>

<style type="text/css">
.input-field div.error{
  position: relative;
  top: -1rem;
  float: right;
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