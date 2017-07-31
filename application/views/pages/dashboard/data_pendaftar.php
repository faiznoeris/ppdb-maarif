<br><br>



<div class="container"  style="padding: 32px 88px 0px 88px; width: 1500px;">
 <div class="row">
  <div class="col s12">
    <ul class="tabs green darken-1 z-depth-2">
      <li class="tab col s3"><a class="white-text waves-effect waves-light tooltipped" data-position="left" data-delay="50" data-tooltip="Lihat data khusus jurusan TKJ" href="#jurusan_tkj">Jurusan TKJ</a></li>
      <li class="tab col s3"><a class="white-text waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Lihat data khusus jurusan TAV" href="#jurusan_tkj">Jurusan TAV</a></li>
      <li class="tab col s3"><a class="white-text waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Lihat data khusus jurusan TAB" href="#jurusan_tkj">Jurusan TAB</a></li>
      <li class="tab col s3"><a class="white-text waves-effect waves-light tooltipped" data-position="right" data-delay="50" data-tooltip="Lihat data khusus jurusan TKR" href="#jurusan_tkj">Jurusan TKR</a></li>
    </ul>
  </div>
</div>
<div class="row" >
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
            <th width="300">Nama</th>
            <th width="250">Asal Sekolah</th>
            <th width="150">L/P</th>
            <th>Nilai UN</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          
          foreach ($data_pendaftar as $row) {
            $idpendaftar = $row->id_pendaftar;
            echo "<tr>
            <td>".$no."</td>
            <td>".$row->nm_lengkap."</td>
            <td>".$row->asal_sekolah."</td>
            <td>".$row->jenis_kelamin."</td>
            <td>".$row->skhu."</td>
            <td>
            <a class='btn-floating btn-small tooltipped green darken-2' data-position='left' data-delay='50' data-tooltip='Edit Data Siswa' href='". base_url('dashboard/datapendaftar/edit/'.$idpendaftar) . "'>
            <i class='material-icons'>mode_edit</i>
            </a>
            <a class='btn-floating btn-small tooltipped yellow darken-2' data-position='top' data-delay='50' data-tooltip='Lihat Detail Data Siswa' href='". base_url('dashboard/datapendaftar/view/'.$idpendaftar) . "'>
            <i class='material-icons'>remove_red_eye</i>
            </a> 
            <a class='btn-floating btn-small tooltipped red darken-2' data-position='right' data-delay='50' data-tooltip='Delete Siswa' href='#modalDelete".$idpendaftar."'>
            <i class='material-icons'>delete</i>
            </a> 
            </td>
            </tr>";

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
            </div>";
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<!-- Modal Structure -->


<br><br>

<br><br>