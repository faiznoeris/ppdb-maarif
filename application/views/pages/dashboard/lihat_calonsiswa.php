<br><br>

<div class="container"  style=" padding: 32px 88px 0px 88px; width: 1500px;">




 <div class="row s12 m12 l6 ">
  <div class="card-panel">
    <div class="row">
      <center>
        <img class="responsive-img" src="http://spu.edu/~/media/administration/student-financial-services/panel/student-in-sub.ashx" style="height: 250px; width: 330px;">
        <h4><i>#<?= $data_siswa->id_pendaftar; ?></i></h4>
        
        <a class="waves-effect waves-light btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Unduh detail data pendaftar <?= $data_siswa->nm_lengkap ?>" href="<?= base_url('index/test2'); ?>"><i class="material-icons" style="font-size: 25px;">get_app</i></a>
        <a class="waves-effect waves-light btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit data pendaftar <?= $data_siswa->nm_lengkap ?>" href="<?= base_url('dashboard/datapendaftar/edit/'.$data_siswa->id_pendaftar) ?>"><i class="material-icons" style="font-size: 25px;">mode_edit</i></a>

      </center><br>

      <div class="col s12">
        <ul class="tabs z-depth-2 teal lighten-1">
          <li class="tab col s3"><a class="white-text waves-effect waves-light tooltipped" data-position="left" data-delay="50" data-tooltip="Lihat detail data pendaftar" href="#datasiswa_edit">Data Pendaftar</a></li>
          <li class="tab col s3"><a class="white-text waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Lihat detail data wali pendaftar" href="#datawali_edit">Data Orang Tua / Wali Pendaftar</a></li>
        </ul>
      </div>

      <div class="col s12">
        <div class="card-panel light-blue lighten-5" id="datasiswa_edit">
          <b>Nama Lengkap Pendaftar</b>: <i><?= $data_siswa->nm_lengkap; ?></i><br>
          <b>Jenis Kelamin</b>: <i><?= $data_siswa->jenis_kelamin; ?></i><br>
          <b>Sekolah Asal</b>: <i><?= $data_siswa->asal_sekolah; ?></i><br>
          <b>NISN</b>: <i><?= $data_siswa->nisn; ?></i><br>
          <b>SKHU</b>: <i><?= $data_siswa->skhu; ?></i><br>
          <b>Nomor Seri Ijazah</b>: <i><?= $data_siswa->no_ijasah; ?></i><br>
          <b>Nomor Seri SKHUN</b>: <i><?= $data_siswa->no_skhun; ?></i><br>
          <b>Nomor Seri UN</b>: <i><?= $data_siswa->no_un; ?></i><br>
          <b>Nomor Induk Kependudukan (NIK)</b>: <i><?= $data_siswa->nik ?></i><br>
          <b>Tempat, Tanggal Lahir</b>: <i><?= $data_siswa->temp_lahir ?></i>, <i><?= $data_siswa->tgl_lahir ?></i><br>
          <b>Alamat</b>: <i><?= $data_siswa->alamat ?></i><br>
          <b>Nomor HP</b>: <i><?= $data_siswa->telp ?></i><br>
          <b>Email</b>: <i><?= $data_siswa->email ?></i><br>
          <b>KPS</b>: 
          <i>
            <?php if($data_siswa->no_kps == 0): ?>
              Tidak terdaftar sebagai penerima KPS
            <?php else: ?>
              <?= $data_siswa->no_kps ?>
            <?php endif;?>  
          </i><br>
          <b>Tinggi Badan</b>: <i><?= $data_siswa->tinggi_bdn ?></i><br>
          <b>Berat Badan</b>: <i><?= $data_siswa->berat_bdn ?></i><br>
          <b>Jarak Tempuh</b>: <i><?= $data_siswa->jarak_rumah ?></i><br>
          <b>Waktu Tempuh</b>: <i><?= $data_siswa->waktu_tempuh ?></i><br>
          <b>Jumlah Saudara</b>: <i><?= $data_siswa->jml_sodara ?></i><br>
          <b>Anak ke</b>: <i><?= $data_siswa->anak_ke ?></i><br>
          <b>Hobi</b>: 
          <i>
            <?php if($data_siswa->hobi == "0"): ?>
              -
            <?php else: ?>
              <?= $data_siswa->hobi ?>
            <?php endif;?>  
          </i><br>
          <b>Prestasi</b>: 
          <i>
            <?php if($data_siswa->prestasi == "0"): ?>
              -
            <?php else: ?>
              <?= $data_siswa->prestasi ?>
            <?php endif;?>  
          </i><br>
          <b>Jurusan</b>: 
          <i>
            <?php if($data_siswa->id_jurusan == 0): ?>
              Teknik Audio Video
            <?php elseif($data_siswa->id_jurusan == 1): ?>
              Teknik Kendaraan Ringan
            <?php elseif($data_siswa->id_jurusan == 2): ?>
              Teknik Komputer Jaringan
            <?php elseif($data_siswa->id_jurusan == 3): ?>
              Teknik Alat Berat
            <?php endif;?>
          </i><br> 
        </div>
      </div>

      <div class="col s12" id="datawali_edit">
        <div class="card-panel light-blue lighten-5">
          <?php if($data_siswa->nm_ayah != "0"): ?>
            <b>Nama Ayah</b>: 
            <i>
              <?php if($data_siswa->nm_ayah == "0"): ?>
                -
              <?php else: ?>
                <?= $data_siswa->nm_ayah ?>
              <?php endif;?> 
            </i><br>
            <b>Tahun Lahir Ayah</b>:
            <i>
              <?php if($data_siswa->th_lahir_ayah == "0000"): ?>
                -
              <?php else: ?>
                <?= $data_siswa->th_lahir_ayah ?>
              <?php endif;?> 
            </i><br>
            <b>Pekerjaan Ayah</b>:
            <i>
              <?php if($data_siswa->pekerjaan_ayah == "0"): ?>
                -
              <?php else: ?>
                <?= $data_siswa->pekerjaan_ayah ?>
              <?php endif;?> 
            </i><br>
            <b>Pendidikan Ayah</b>:
            <i>
              <?php if($data_siswa->pendidikan_ayah == "0"): ?>
                -
              <?php else: ?>
                <?= $data_siswa->pendidikan_ayah ?>
              <?php endif;?> 
            </i><br><br>
            <b>Nama Ibu</b>: 
            <i>
              <?php if($data_siswa->nm_ibu == "0"): ?>
                -
              <?php else: ?>
                <?= $data_siswa->nm_ibu ?>
              <?php endif;?> 
            </i><br>
            <b>Tahun Lahir Ibu</b>:
            <i>
              <?php if($data_siswa->th_lahir_ibu == "0000"): ?>
                -
              <?php else: ?>
                <?= $data_siswa->th_lahir_ibu ?>
              <?php endif;?> 
            </i><br>
            <b>Pekerjaan Ibu</b>:
            <i>
              <?php if($data_siswa->pekerjaan_ibu == "0"): ?>
                -
              <?php else: ?>
                <?= $data_siswa->pekerjaan_ibu ?>
              <?php endif;?> 
            </i><br>
            <b>Pendidikan Ibu</b>:
            <i>
              <?php if($data_siswa->pendidikan_ibu == "0"): ?>
                -
              <?php else: ?>
                <?= $data_siswa->pendidikan_ibu ?>
              <?php endif;?> 
            </i><br>
          <?php else: ?></i>
            <b>Nama Wali</b>: 
            <i>
              <?php if($data_siswa->nm_wali == "0"): ?>
                -
              <?php else: ?>
                <?= $data_siswa->nm_wali ?>
              <?php endif;?> 
            </i><br>
            <b>Tahun Lahir Wali</b>:
            <i>
              <?php if($data_siswa->th_lahir_wali == "0000"): ?>
                -
              <?php else: ?>
                <?= $data_siswa->th_lahir_wali ?>
              <?php endif;?> 
            </i><br>
            <b>Pekerjaan Wali</b>:
            <i>
              <?php if($data_siswa->pekerjaan_wali == "0"): ?>
                -
              <?php else: ?>
                <?= $data_siswa->pekerjaan_wali ?>
              <?php endif;?> 
            </i><br>
            <b>Pendidikan Wali</b>:
            <i>
              <?php if($data_siswa->pendidikan_wali == "0"): ?>
                -
              <?php else: ?>
                <?= $data_siswa->pendidikan_wali ?>
              <?php endif;?> 
            </i><br>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</div>
</div>


<br><br>

