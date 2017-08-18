//SET AUTOFOCUS KE PALING BAWAH KALO ADA ERROR
$(function() {
  var link = location.href;
  if(link.includes("pendaftaran/gagal")){
    $("#btnsubmit").attr('autofocus','');
  }
});

//BUAT NAMBAHIN FORM ADD PRESTASI
$("a[name='addPrestasi']").click(function() {
  localStorage.jmlPrestasi = Number(localStorage.jmlPrestasi) + 1;


  var domElement = $('<div class="row" id="prestasi' + localStorage.jmlPrestasi + '" style="display: block;"><div class="input-field col s2"><select class="icons" name="select_tingkat_prestasi' + localStorage.jmlPrestasi + '" id="select_tingkat_prestasi' + localStorage.jmlPrestasi + '" required="required"><option value="0" disabled selected>Pilih salah satu</option><option value="1">Nasional</option><option value="2">Provinsi</option><option value="3">Kabupaten</option></select><label for="select_tingkat_prestasi' + localStorage.jmlPrestasi + '">Tingkat Prestasi</label></div><div class="input-field col s2"><select class="icons" name="select_peringkat_juara' + localStorage.jmlPrestasi + '" id="select_peringkat_juara' + localStorage.jmlPrestasi + '" required="required"><option value="0" disabled selected>Pilih salah satu</option><option value="1">Juara I</option><option value="2">Juara II</option><option value="3">Juara III</option></select><label for="select_peringkat_juara' + localStorage.jmlPrestasi + '">Peringkat / Juara</label></div><div class="input-field col s4"><input name="prestasi_ket' + localStorage.jmlPrestasi + '" id="prestasi_ket' + localStorage.jmlPrestasi + '" type="text" placeholder="Juara 1 Volley" class="materialize-textarea"></textarea><label for="prestasi_ket' + localStorage.jmlPrestasi + '">Keterangan Juara</label></div></div>');

  $('#prestasi1').after(domElement);
  $('#select_tingkat_prestasi' + localStorage.jmlPrestasi).material_select();
  $('#select_peringkat_juara' + localStorage.jmlPrestasi).material_select();
  $('#jmlPrestasi').attr('value', localStorage.jmlPrestasi);
  Materialize.updateTextFields();
});


//BUAT MUNCULIN SELECT DESA SESUAI KECAMATAN YANG DIPILIH
$('#select_kecamatan').change(function() {
  if ($(this).val() == "manual") {
    $('#manual_kecamatan').css('display', 'block');
    $('#kecamatan').css('display', 'none');
    $('#kecamatan_input').attr('required', '');
    $('#select_kecamatan').removeAttr('required');

    $('#manual_desa').css('display', 'block');
    $('#desa').css('display', 'none');
    $('#desa_input').attr('required', '');
    $('#select_desa').removeAttr('required');
  } else {
    $.ajax({
      url: "http://localhost:8080/pendaftaransiswa/index/filldd/desa/" + $(this).val(),
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        if (data.success) {
          $('#select_desa').html(data.options);
          $('#select_desa').material_select();

        } else {}
      }
    });
  }

})


//BUAT MUNCULIN SELECT KECAMATAN SESUAI KABUPATEN YANG DIPILIH
$('#select_kabupaten').change(function() {
  if ($(this).val() == "manual") {
    $('#manual_kabupaten').css('display', 'block');
    $('#kabupaten').css('display', 'none');
    $('#kabupaten_input').attr('required', '');
    $('#select_kabupaten').removeAttr('required');

    $('#manual_kecamatan').css('display', 'block');
    $('#kecamatan').css('display', 'none');
    $('#kecamatan_input').attr('required', '');
    $('#select_kecamatan').removeAttr('required');

    $('#manual_desa').css('display', 'block');
    $('#desa').css('display', 'none');
    $('#desa_input').attr('required', '');
    $('#select_desa').removeAttr('required');
  } else {
    $.ajax({
      url: "http://localhost:8080/pendaftaransiswa/index/filldd/kecamatan/" + $(this).val(),
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        if (data.success) {
                    //alert(data.options);
                    $('#select_kecamatan').html(data.options);
                    $('#select_kecamatan').material_select();

                    //$('#select_kecamatan').css('display','none');
                  } else {}
                }
              });
  }

})


$('#select_desa').change(function() {
  if ($(this).val() == "manual") {
    $('#manual_desa').css('display', 'block');
    $('#desa').css('display', 'none');
    $('#desa_input').attr('required', '');
    $('#select_desa').removeAttr('required');
  }

})



$('#select_ijazah').change(function() {
  $('#ijazah').removeAttr('disabled');
  $('#ijazah').attr('required', '');
  $('#skhun').removeAttr('disabled');
  $('#skhun').attr('required', '');
})
$('#select_skhun').change(function() {
  $('#skhun').removeAttr('disabled');
  $('#skhun').attr('required', '');
})
$('#select_kps').change(function() {
  if ($(this).val() == "Ya") {
    $('#kps').removeAttr('disabled');
    $('#kps').attr('required', '');
  } else {
    $('#kps').attr('disabled', '');
    $('#kps').removeAttr('required');
  }

})


//BUAT MUNCULIN FORM SERTIFIKAT
$('#select_memiliki_sertifikat').change(function() {
  if ($(this).val() == "1") {
    $('#sertifikat_inggris').css('display', 'block');
    $('#select_jenjang_sertifikat').attr('required', '');

  } else {
    $('#sertifikat_inggris').css('display', 'none');
    $('#select_jenjang_sertifikat').removeAttr('required');
    $('#ket_sertifikat').val('');
  }
});


//BUAT MUNCULIN ATAU NGILANGIN FORM ORGTUA/WALI
$(function() {
  var e = document.getElementById("select_orgtua");
  var strValue = e.options[e.selectedIndex].value;
  if (strValue != "") {
    $("#select_orgtua").change();
  }
});


//BUAT MUNCULIN FORM ORGTUA / WALI
$('#select_orgtua').change(function() {
  if ($(this).val() == "OrgTua") {
    $('#dataorgtua').css('display', 'block');
    $('#datawali').css('display', 'none');

    $('#nama_ayah').attr('required', '');
    $('#tahun_lahir_ayah').attr('required', '');
    $('#pekerjaan_ayah').attr('required', '');
    $('#pendidikan_ayah').attr('required', '');
    $('#nama_ibu').attr('required', '');
    $('#tahun_lahir_ibu').attr('required', '');
    $('#pekerjaan_ibu').attr('required', '');
    $('#pendidikan_ibu').attr('required', '');

    $('#nama_wali').removeAttr('required');
    $('#nama_wali').val('');
    $('#tahun_lahir_wali').removeAttr('required');
    $('#pekerjaan_wali').val('');
    $('#pekerjaan_wali').removeAttr('required');
    $('#pendidikan_wali').val('');
    $('#pendidikan_wali').removeAttr('required');
  } else if ($(this).val() == "Wali") {
    $('#datawali').css('display', 'block');
    $('#dataorgtua').css('display', 'none');

    $('#nama_wali').attr('required', '');
    $('#tahun_lahir_wali').attr('required', '');
    $('#pekerjaan_wali').attr('required', '');
    $('#pendidikan_wali').attr('required', '');

    $('#nama_ayah').val('');
    $('#nama_ayah').removeAttr('required');
    $('#tahun_lahir_ayah').removeAttr('required');
    $('#pekerjaan_ayah').val('');
    $('#pekerjaan_ayah').removeAttr('required');
    $('#pendidikan_ayah').val('');
    $('#pendidikan_ayah').removeAttr('required');
    $('#nama_ibu').val('');
    $('#nama_ibu').removeAttr('required');
    $('#tahun_lahir_ibu').removeAttr('required');
    $('#pekerjaan_ibu').val('');
    $('#pekerjaan_ibu').removeAttr('required');
    $('#pendidikan_ibu').val('');
    $('#pendidikan_ibu').removeAttr('required');
  } else if ($(this).val() == "Wali_edit") {
    $('#datawali').css('display', 'block');
    $('#dataorgtua').css('display', 'none');

    $('#nama_ayah').val('');
    $('#pekerjaan_ayah').val('');
    $('#pendidikan_ayah').val('');
    $('#nama_ibu').val('');
    $('#pekerjaan_ibu').val('');
    $('#pendidikan_ibu').val('');
  } else if ($(this).val() == "OrgTua_edit") {
    $('#dataorgtua').css('display', 'block');
    $('#datawali').css('display', 'none');

    $('#nama_wali').val('');
    $('#pekerjaan_wali').val('');
    $('#pendidikan_wali').val('');
  }
});