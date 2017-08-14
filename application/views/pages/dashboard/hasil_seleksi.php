<br><br>



<div class="container"  style="padding: 32px 88px 0px 88px; width: 1500px;">





  <div class="row">
    <div id="admin" class="col s12">
      <div class="card material-table">
        <div class="table-header">
          <span class="table-title">Data Pendaftar</span>
          <div class="actions">

            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
          </div>
        </div>
        <form id="formValidate" method="post" action="<?php echo base_url('seleksi/save/');?>">
          <table id="datatable">
            <thead>
              <tr>
                <th width="50">No</th>
                <th width="100">ID Pendaftar</th>
                <th>Nama Pendaftar</th>
                <th>Nilai UN</th>
                <th>Bobot Nilai Prestasi</th>
                <th width="220">Bobot Nilai Wawancara</th>
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
                  <form id='formValidate' method='post' action='".base_url('seleksi/save/')."'>
                  <tr>
                  <td>".$no."</td>
                  <td>#".$row->id_pendaftar."</td>
                  <td>".$row->nm_lengkap."</td>
                  <td>".$row->skhu."</td>
                  <td>0</td>
                  <td><div class='input-field'><input type='number' name='nilai_wawancara[]' id='nilai_wawancara' style='width: 130px;'/></div>
                  <input type='hidden' name='id_pendaftar[]' value='".$row->id_pendaftar."'/>
                  <input type='hidden' name='nilai_un[]' value='".$row->skhu."'/></td>
                  <td><button class='btn cyan waves-effect grey darken-2' type='submit' name='action'>Save</button></td>

                  </tr></form>";
                }

                echo "
                <div id='modalDelete".$idpendaftar."' class='modal' style='width: 400px;'>
                <div class='modal-content'>
                <h4>Delete Data Siswa <i><b>".$row->nm_lengkap."</b></i> ?</h4>
                <p><b>!WARNING!</b> This can't be undone!</p>
                </div>
                <div class='modal-footer centered'>
                <a href='".base_url('calonsiswa/delete/'.$idpendaftar)."' class='modal-action modal-close waves-effect waves-green btn-flat'>Ok</a>
                <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Cancel</a>
                </div>
                </div> ";
                $no++;
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