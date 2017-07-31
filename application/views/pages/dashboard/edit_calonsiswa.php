  <br><br>

  <div class="container "  style=" padding: 32px 88px 0px 88px; width: 1500px;">
    <div class="col s12 m12 l6 z-depth-3" id="datasiswa_edit">
      <div class="card-panel">
        <center>
          <h5>Edit Data Siswa - <i><?= $data_siswa->nm_lengkap ?> - #<?= $data_siswa->id_pendaftar ?></i></h5><br>
        </center>
        <div class="row">
          <form id="formValidate" method="post" action="<?php echo base_url('calonsiswa/saveedit/'.$data_siswa->id_pendaftar);?>">

            <div class="row">
              <div class="input-field col s6">
                <input  
                name      = "nama" 
                placeholder   = "<?= $data_siswa->nm_lengkap ?>"
                id        = "nama" 
                type      =   "text"
                class       = "validate" 
                
                data-error    = ".errorTxt1">
                <label for="nama">Nama Lengkap</label>
                <div class="errorTxt1"></div>
              </div>
            </div>

            <!-- JENIS KELAMIN -->
            <div class="row"> 
              <div class="input-field col s12 m6">
                <select class="icons" name="select_kelamin" id="select_kelamin">
                  <?php if($data_siswa->jenis_kelamin == "Perempuan"): ?>
                    <option value="Laki - Laki" >Laki - Laki</option>
                    <option value="Perempuan" selected="">Perempuan</option>
                  <?php else: ?>
                    <option value="Laki - Laki" selected="">Laki - Laki</option>
                    <option value="Perempuan" >Perempuan</option>
                  <?php endif; ?>
                </select>
                <label>Jenis Kelamin</label>
              </div>
            </div>


            <br>

            <!-- ASAL SEKOLAH -->
            <div class="row">
              <div class="input-field col s6">
                <input  
                name      =   "asalsekolah" 
                placeholder   =   "<?= $data_siswa->asal_sekolah ?>" 
                id        =   "asalsekolah" 
                type      =   "text"
                class       = "validate" 
                >
                <label for="asalsekolah">Sekolah Asal</label>
              </div>
            </div>

            <!-- NISN -->
            <div class="row">
              <div class="input-field col s6">
                <input 
                name          =   "nisn" 
                placeholder      =   "<?= $data_siswa->nisn ?>"
                id               =   "nisn" 
                type             =   "number"
                class       = "validate" 
                

                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"               maxlength     =   "10"
                data-error    = ".errorTxt2">
                <label for="nisn">NISN (diperoleh dari sekolah asal)</label>
                <div class="errorTxt2"></div>
              </div>
            </div>

            <!-- NILAI SKHU -->
            <div class="row">
              <div class="input-field col s2">
                <input  
                name      = "skhu"
                placeholder   = "<?= $data_siswa->skhu ?>"
                id        = "skhu" 
                type      = "number"
                class       = "validate" 
                
                data-error    = ".errorTxt3">
                <label for="skhu">Jumlah Nilai/SKHU</label>
                <div class="errorTxt3"></div>
              </div>
            </div>

            <!-- NOMOR SERI IJAZAH --> 
            <div class="row">
              <div class="input-field col s4">
                <select name="select_ijazah" id="select_ijazah">
                  <?php if(strpos($data_siswa->no_ijasah, "MTs")): ?>
                    <option value="SMP">SMP</option>
                    <option value="MTs" selected="">MTs</option>
                  <?php else: ?>
                    <option value="SMP" selected="">SMP</option>
                    <option value="MTs" >MTs</option>
                  <?php endif ?>
                </select>
                <label for="ijazah">Nomor Seri Ijazah & SKHUN SMP/MTs</label>
              </div>
              <div class="input-field col s4">
                <input name             =    "ijazah" 
                placeholder      =    "<?= $data_siswa->no_ijasah ?>"
                id               =    "ijazah" 
                type             =    "number" 
                class        =  "validate"      
                maxlength     = "9"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                data-error     =  ".errorTxt4" />
                <div class="errorTxt4"></div>                   
              </div>
              <div class="input-field col s4">
                <input 
                name             =    "skhun" 
                placeholder      =    "<?= $data_siswa->no_skhun ?>"
                id               =    "skhun" 
                type             =    "number"
                class        =    "validate" 
                maxlength     = "9"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                data-error     =    ".errorTxt5"/>
                <div class="errorTxt5"></div>
              </div>
            </div>



            <!-- NOMOR UJIAN NASIONAL -->
              
            <?php
              $no_un = explode("-", $data_siswa->no_un);
              foreach ($no_un as $key => $value) {
                $no[$key] = $value;
              }
            ?>
            <div class="row">
              <label style="margin-left: 10px;">No. Ujian Nasional SMP/MTs</label><br>
              <div class="input-field col s1">
                <input  
                name      = "no_un_0" 
                placeholder   = "<?= $no['0'] ?>" 
                id        = "no-un" 
                type      = "number"
                maxlength     = "1" 
                 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                
                style       =   "text-align: center;">
              </div>
              <div class="input-field col s1">
                <input  
                name      = "no_un_1" 
                placeholder   = "<?= $no['1'] ?>" 
                id        = "no-un" 
                type      = "number"
                maxlength     = "2" 
                 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                
                style="text-align: center;">  
              </div>
              <div class="input-field col s1">
                <input  
                name      = "no_un_2" 
                placeholder   = "<?= $no['2'] ?>" 
                id        = "no-un" 
                type      = "number"
                maxlength     =   "2" 
                 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                
                style="text-align: center;">  
              </div>
              <div class="input-field col s1">
                <input  
                name      = "no_un_3" 
                placeholder   = "<?= $no['3'] ?>" 
                id        = "no-un" 
                type      = "number"
                maxlength     =   "2" 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                
                style="text-align: center;">  
              </div>
              <div class="input-field col s1">
                <input 
                name      = "no_un_4" 
                placeholder   = "<?= $no['4'] ?>" 
                id        = "no-un" 
                type      = "number"
                maxlength     =   "3" 
                 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                
                style="text-align: center;">  
              </div>
              <div class="input-field col s1">
                <input  
                name      = "no_un_5" 
                placeholder   = "<?= $no['5'] ?>" 
                id        = "no-un" 
                type      = "number"
                maxlength     =   "3" 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                
                style="text-align: center;">  
              </div>
              <div class="input-field col s1">
                <input  
                name      = "no_un_6" 
                placeholder   = "<?= $no['6'] ?>" 
                id        = "no-un" 
                type      = "number"
                maxlength     =   "1" 
                 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                
                style="text-align: center;">  
              </div>
            </div>  
          

          <!-- NOMOR INDUK KEPENDUDUKAN -->
          <div class="row">
            <div class="input-field col s6">
              <input  name      = "nik" 
              placeholder   = "<?= $data_siswa->nik ?>"
              id        = "nik" 
              type      = "number"
              class        =  "validate" 

              maxlength     = "13"
              oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 

              data-error     =    ".errorTxt13">
              <label for="nik">No. Induk Kependudukan (NIK)</label>
              <div class="errorTxt13"></div>  
            </div>
          </div>    

          <!-- TEMPAT & TANGGAL LAHIR -->
          <div class="row">
            <div class="input-field col s4">
              <input  name      = "tmpt_lhr" 
              placeholder   = "<?= $data_siswa->temp_lahir ?>" 
              id        = "tmpt_lhr" 
              type      = "text"
              class       = "validate" 

              data-error    = ".errorTxt14">      
              <label for="tmpt_lhr">Tempat, Tanggal Lahir</label>
              <div class="errorTxt14"></div>  
            </div>
            <div class="input-field col s4">
              <input  
              name      = "tgl_lhr" 
              placeholder="<?= $data_siswa->tgl_lahir ?>" 
              type      = "date" 
              class       = "datepicker"
              class       = "validate" 
              data-error    = ".errorTxt15">
              <div class="errorTxt15  "></div>  
            </div>
          </div>
          

          <!-- ALAMAT -->
            
            <div class="row">
              <label style="margin-left: 10px;">Alamat</label><br> 
              <div class="input-field col s1">
                <input name="rt" placeholder="RT" id="RT" type="text"
                class       = "validate" 
                >
              </div>
              <div class="input-field col s1">
                <input name="rw" placeholder="RW" id="RW" type="text" class       = "validate" 
                >
              </div>
              <div class="input-field col s4">
                <input name="desa" placeholder="Desa" id="desa" type="text" class       = "validate" 
                
                data-error = ".errorTxtDesa">
                <div class="errorTxtDesa"></div>
              </div>
              <div class="input-field col s4">
                <select name="select_kecamatan" id="select_kecamatan">
                  <option value="" disabled selected>Pilih salah satu</option>
                  <option value="PU001">Purwokerto Utara</option>
                  <option value="PU002">Purwokerto Timur</option>
                </select>
                <label for="select_kecamatan">Kecamatan</label>
              </div>
              <div class="input-field col s6">
                <select name="select_kabupaten" id="select_kabupaten" >
                  <option value="" disabled selected>Pilih salah satu</option>
                  <option value="PU001">Banyumas</option>
                  <option value="PU002">Purbalingga</option>
                </select>
                <label for="select_kabupaten">Kabpuaten</label>
              </div>
              <div class="input-field col s4">
                <input  name      = "kodepos" 
                placeholder   = "Kode Pos" 
                id        = "kodepos" 
                type      = "number"
                class       = "validate" 
                >
              </div>
            </div>
          

          <!-- KONTAK (EMAIL DAN NO HP / TELP) -->
          <div class="row">
            <div class="input-field col s5">
              <input  name      = "email" 
              placeholder   = "<?= $data_siswa->email ?>"
              id        = "email" 
              type      = "email"
              class       = "validate" 

              data-error    = ".errorTxtEmail">     
              <label for="email">Email</label>
              <div class="errorTxtEmail"></div>
            </div>
            <div class="input-field col s3">
              <input  name      = "no_telp" 
              placeholder   = "<?= $data_siswa->telp ?>"
              id        = "no_telp" 
              type      = "number"
              class       = "validate" 

              data-error    = ".errorTxtHP">    
              <label for="no_telp">No. Telpon/HP</label>
              <div class="errorTxtHP"></div>
            </div>
          </div>

          <!-- KPS -->
          <div class="row">     
            <div class="input-field col s3">
              <select id="select_kps">
                <?php if($data_siswa->no_kps != 0): ?>
                  <option value="Ya" selected="">YA</option>
                  <option value="TIDAK">TIDAK</option>
                <?php else: ?>
                 <option value="Ya" >YA</option>
                 <option value="TIDAK" selected="">TIDAK</option>
               <?php endif; ?>
             </select>
             <label>Penerima KPS</label>
           </div>
           <div class="input-field col s4">
            <input  
            name      = "kps" 
            placeholder   = "<?= $data_siswa->no_kps ?>"
            id        = "kps" 
            type      = "number" 
            class        =  "validate"  
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
            maxlength     = "6 " 
            data-error     =  ".errorTxt23">
            <div class="errorTxt23"></div>  
          </div>
        </div>  

        <!-- TINGGI & BERAT BADAN -->
        <div class="row">
          <div class="input-field col s4">
            <input  name      = "tinggi_badan" 
            placeholder   = "<?= $data_siswa->tinggi_bdn?>"
            id        =   "tinggi_badan" 
            type      = "number"
            class       = "validate" 

            data-error    = ".errorTxt24">                      
            <label for="tinggi_badan">Tinggi Badan (CM)</label>
            <div class="errorTxt24"></div>  
          </div>
          <div class="input-field col s4">
            <input  name      = "berat_badan" 
            placeholder   = "<?= $data_siswa->berat_bdn ?>"
            id        = "berat_badan" 
            type      = "number"
            class       = "validate" 

            data-error    = ".errorTxt25">  
            <label for="berat_badan">Berat Badan (KG)</label>
            <div class="errorTxt25"></div>  
          </div>
        </div>

        <!-- Jarak & Waktu Tempuh Ke Sekolah -->
        <div class="row">
          <div class="input-field col s4">
            <input  name      = "jarak_tempuh" 
            placeholder   = "<?= $data_siswa->jarak_rumah ?>"
            id        = "jarak_tempuh" 
            type      = "number"
            class       = "validate" 

            data-error    = ".errorTxt26">  
            <label for="jarak_tempuh">Jarak Tempuh ke Sekolah (KM)</label>
            <div class="errorTxt26"></div>
          </div>
          <div class="input-field col s4">
            <input  name      = "waktu_tempuh" 
            placeholder   = "<?= $data_siswa->waktu_tempuh ?>"
            id        =   "waktu_tempuh" 
            type      = "number"
            class       = "validate" 

            data-error    = ".errorTxt27">  
            <label for="waktu_tempuh">Waktu Tempuh ke Sekolah (MENIT)</label>
            <div class="errorTxt27"></div>
          </div>
        </div>

        <!-- JUMLAH SAUDARA DAN ANAK KE -->
        <div class="row">
          <div class="input-field col s4">
            <input  name      = "jml_saudara" 
            placeholder   =   "<?= $data_siswa->jml_sodara ?>"
            id        = "jml_saudara" 
            type      = "number"
            class       = "validate" 

            data-error    = ".errorTxt28">  
            <label for="jml_saudara">Jumlah Saudara Kandung</label>
            <div class="errorTxt28"></div>
          </div>
          <div class="input-field col s4">
            <input  name      = "anak_ke"
            placeholder   =  "<?= $data_siswa->anak_ke ?>"
            id        = "anak_ke" 
            type      = "number"
            class       = "validate" 

            data-error    = ".errorTxt29">  
            <label for="anak_ke">Anak ke</label>
            <div class="errorTxt29"></div>
          </div>
        </div>

        <!-- Prestasi & Hobi -->
        <div class="row">
          <div class="input-field col s6">
            <textarea 
            name      = "hobi" 
            id        = "hobi" 
            placeholder   = "<?= $data_siswa->hobi ?>" 
            class       = "materialize-textarea"></textarea>
            <label for="hobi">Hobi</label>
          </div>
          <div class="input-field col s6">
            <textarea 
            name      = "prestasi" 
            id        = "prestasi" 
            placeholder   = "<?= $data_siswa->prestasi ?>"
            class       = "materialize-textarea"></textarea>
            <label for="prestasi">Prestasi</label>
          </div>
        </div>

        <br><div class="divider"></div><br>
        <h5>Data Orang Tua / Wali</h5><br>
        <!-- DATA ORANG TUA / WALI -->

        <div class="row">
          <div class="input-field col s3">
            <select name="select_orgtua" id="select_orgtua">
              <?php if($data_siswa->nm_ayah != "0"): ?>
                <option value="OrgTua_edit" selected="">Ayah / Ibu</option>
                <option value="Wali_edit">Wali</option>
              <?php else: ?>
                <option value="OrgTua_edit">Ayah / Ibu</option>
                <option value="Wali_edit" selected="">Wali</option>
              <?php endif; ?>
            </select>
            <label for="select_orgtua">Data Orang Tua / Wali*</label>
          </div>
        </div>

        <div id="dataorgtua" style="display: none;">
          <h6>Data Ayah</h6><br>
          <!-- Data Ayah -->
          <div class="row">
            <div class="input-field col s4">
              <input name="nama_ayah" placeholder="<?= $data_siswa->nm_ayah ?>" id="nama_ayah" type="text">
              <label for="nama_ayah">Nama Ayah</label>
            </div>
            <div class="input-field col s4">
              <select name="tahun_lahir_ayah" id="tahun_lahir_ayah">
                <option value="" disabled selected>Pilih salah satu</option>
                <?php 
                for ($i=1960; $i <= 2017; $i++) { 
                  if($data_siswa->th_lahir_ayah == $i){
                    echo "<option value='".$i."' selected=''>".$i."</option>";  
                  }else{
                    echo "<option value='".$i."'>".$i."</option>";
                  }
                  
                }
                ?>
              </select>
              <label for="select_orgtua">Tahun Lahir Ayah</label>

            </div>
          </div>

          <div class="row">
            <div class="input-field col s4">
              <input name="pekerjaan_ayah" placeholder="<?= $data_siswa->pekerjaan_ayah ?>" id="pekerjaan_ayah" type="text">
              <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
            </div>
            <div class="input-field col s4">
              <input name="pendidikan_ayah" placeholder="<?= $data_siswa->pendidikan_ayah ?>" id="pendidikan_ayah" type="text">
              <label for="pendidikan_ayah">Pendidikan Terakhir Ayah</label>
            </div>
          </div>

          <br>


          <h6>Data Ibu</h6><br>
          <!-- Data Ibu -->
          <div class="row">
            <div class="input-field col s4">
              <input name="nama_ibu" placeholder="<?= $data_siswa->nm_ibu ?>" id="nama_ibu" type="text">
              <label for="nama_ibu">Nama Ibu</label>
            </div>
            <div class="input-field col s4">
              <select name="tahun_lahir_ibu" id="tahun_lahir_ibu">
                <option value="" disabled selected>Pilih salah satu</option>
                <?php 
                for ($i=1960; $i <= 2017; $i++) { 
                  if($data_siswa->th_lahir_ibu == $i){
                    echo "<option value='".$i."' selected=''>".$i."</option>";  
                  }else{
                    echo "<option value='".$i."'>".$i."</option>";
                  }
                  
                }
                ?>
              </select>
              <label for="select_orgtua">Tahun Lahir Ibu</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s4">
              <input name="pekerjaan_ibu" placeholder="<?= $data_siswa->pekerjaan_ibu ?>" id="pekerjaan_ibu" type="text">
              <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
            </div>
            <div class="input-field col s4">
              <input name="pendidikan_ibu" placeholder="<?= $data_siswa->pendidikan_ibu ?>" id="pendidikan_ibu" type="text">
              <label for="pendidikan_ibu">Pendidikan Terakhir Ibu</label>
            </div>
          </div>

          <br>
        </div>

        <div id="datawali" style="display: none;">                  
          <h6>Data Wali</h6><br>
          <!-- Data Wali -->
          <div class="row">
            <div class="input-field col s4">
              <input name="nama_wali" placeholder="<?= $data_siswa->nm_wali ?>" id="nama_wali" type="text">
              <label for="nama_wali">Nama Wali</label>
            </div>
            <div class="input-field col s4">
              <select name="tahun_lahir_wali" id="tahun_lahir_wali">
                <option value="" disabled selected>Pilih salah satu</option>
                <?php 
                for ($i=1960; $i <= 2017; $i++) { 
                  if($data_siswa->th_lahir_wali == $i){
                    echo "<option value='".$i."' selected=''>".$i."</option>";  
                  }else{
                    echo "<option value='".$i."'>".$i."</option>";
                  }
                  
                }
                ?>
              </select>
              <label for="select_orgtua">Tahun Lahir Wali</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s4">
              <input name="pekerjaan_wali" placeholder="<?= $data_siswa->pekerjaan_wali ?>" id="pekerjaan_wali" type="text">
              <label for="pekerjaan_wali">Pekerjaan Wali</label>
            </div>
            <div class="input-field col s4">
              <input name="pendidikan_wali" placeholder="<?= $data_siswa->pendidikan_wali ?>" id="pendidikan_wali" type="text">
              <label for="pendidikan_wali">Pendidikan Terakhir Wali</label>
            </div>
          </div>

        </div>
        <br><div class="divider"></div><br>
        <h5>Jurusan</h5><br>

        <div class="row"> 
          <div class="input-field col s12 m6">
            <select class="icons" name="select_jurusan" id="select_jurusan" required="required">
              <?php if($data_siswa->id_jurusan == "0"): ?>
                <option value="0" data-icon="http://materializecss.com/images/sample-1.jpg" class="left circle" selected="">Teknik Audio Video</option>
                <option value="1" data-icon="http://materializecss.com/images/office.jpg" class="left circle">Teknik Kendaraan Ringan</option>
                <option value="2" data-icon="http://materializecss.com/images/yuna.jpg" class="left circle">Teknik Komputer Jaringan</option>
                <option value="3" data-icon="http://materializecss.com/images/yuna.jpg" class="left circle">Teknik Alat Berat</option>
              <?php elseif($data_siswa->id_jurusan == "1"): ?>
                <option value="0" data-icon="http://materializecss.com/images/sample-1.jpg" class="left circle">Teknik Audio Video</option>
                <option value="1" data-icon="http://materializecss.com/images/office.jpg" class="left circle" selected="">Teknik Kendaraan Ringan</option>
                <option value="2" data-icon="http://materializecss.com/images/yuna.jpg" class="left circle">Teknik Komputer Jaringan</option>
                <option value="3" data-icon="http://materializecss.com/images/yuna.jpg" class="left circle">Teknik Alat Berat</option>
              <?php elseif($data_siswa->id_jurusan == "2"): ?>
                <option value="0" data-icon="http://materializecss.com/images/sample-1.jpg" class="left circle">Teknik Audio Video</option>
                <option value="1" data-icon="http://materializecss.com/images/office.jpg" class="left circle">Teknik Kendaraan Ringan</option>
                <option value="2" data-icon="http://materializecss.com/images/yuna.jpg" class="left circle" selected="">Teknik Komputer Jaringan</option>
                <option value="3" data-icon="http://materializecss.com/images/yuna.jpg" class="left circle">Teknik Alat Berat</option>
              <?php elseif($data_siswa->id_jurusan == "3"): ?>
                <option value="0" data-icon="http://materializecss.com/images/sample-1.jpg" class="left circle">Teknik Audio Video</option>
                <option value="1" data-icon="http://materializecss.com/images/office.jpg" class="left circle">Teknik Kendaraan Ringan</option>
                <option value="2" data-icon="http://materializecss.com/images/yuna.jpg" class="left circle">Teknik Komputer Jaringan</option>
                <option value="3" data-icon="http://materializecss.com/images/yuna.jpg" class="left circle" selected="">Teknik Alat Berat</option>
              <?php endif; ?>
            </select>
            <label>Jurusan yang ingin dipilih*</label>
          </div>
        </div>

        <div class="divider"></div><br>




        <label class="left">
          <b class='red-text text-darken-2'>
            <?php if(isset($error)){echo $error;} ?>
          </b>
        </label>

        <?php if(isset($error)){echo "<br/>";} ?>

        <div class="row center">
          <div class="row">
            <div class="input-field col s12">
              <button class="btn cyan waves-effect green darken-3" type="submit" name="action">Submit</button>
            </div>
          </div>
        </div>

      </form>
    </div>            
  </div>
</div>
</div>
</div>

<br><br>

