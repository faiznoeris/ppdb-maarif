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
        <span class="table-title">Material Datatable</span>
        <div class="actions">
          <a href="#add_users" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons">person_add</i></a>
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
          
          foreach ($seleksiPendaftar as $Spendf) {
            echo "<tr>
            <td>".$no."</td>
            <td>".$Spendf->nm_lengkap."</td>
            <td>".$Spendf->asal_sekolah."</td>
            <td>".$Spendf->jenis_kelamin."</td>
            <td>".$Spendf->skhu."</td>
            <td>
            <a class='btn-floating btn-small tooltipped green darken-2' data-position='left' data-delay='50' data-tooltip='Edit Data Siswa' href='<?= base_url('/editdatasiswa'); ?>'>
            <i class='material-icons' style='height: 20px;'>mode_edit</i>
            </a>
            <a class='btn-floating btn-small tooltipped yellow darken-2' data-position='top' data-delay='50' data-tooltip='Lihat Detail Data Siswa' href='#modal1'>
            <i class='material-icons' style='height: 20px;'>remove_red_eye</i>
            </a> 
            <a class='btn-floating btn-small tooltipped red darken-2' data-position='right' data-delay='50' data-tooltip='Delete Siswa' href='#modal1'>
            <i class='material-icons' style='height: 20px;'>delete</i>
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


<!-- Modal Structure -->
<div id="modal1" class="modal" style="width: 400px;">
  <div class="modal-content">
    <h4>Delete Data Siswa</h4>
    <p><b>!WARNING!</b> This can't be undone!</p>
  </div>
  <div class="modal-footer centered">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
  </div>
</div>

<br><br>

<br><br>