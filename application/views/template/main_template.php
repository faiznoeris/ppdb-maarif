<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!-- CUSTOM CSS -->
  <link href="<?= base_url('/asset/css/custom.style.css') ?>" rel="stylesheet">
  <!-- MATERIALIZECSS -->
  <link href="<?= base_url('/asset/materialize/css/materialize.css') ?>" rel="stylesheet" media="screen,projection">
  <!-- GOOGLE ICON -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="<?= base_url('/asset/images/icon.jpg') ?>">

  <title><?=$title;?></title>

</head>


<body>
  <!-- PRELOADER -->
  <center>
    <div class="preloader-wrapper big active" style="top:250px;">
      <div class="spinner-layer spinner-green-only">

        <div class="circle-clipper left">
          <div class="circle"></div>
        </div>

        <div class="gap-patch">
          <div class="circle"></div>
        </div>

        <div class="circle-clipper right">
          <div class="circle"></div>
        </div>

      </div>
    </div>
  </center>

  <!-- THE WHOLE WEB (NAVBAR, BODY, FOOTER) -->
  <div id="main" style="display: none; min-height: 100vh; flex-direction: column;">

    <?php

    if($active == "login" || $active == "forgotpassword"){
      $this->load->view($content);
    }
    
    else if($active == "dashboard" || $active == "home"){

      if($active == "home"){
        $this->load->view("template/navbar_home");
      }
      else{
        $this->load->view("template/navbar_dashboard");
      }

      $this->load->view($content);
    }

    else{
      $this->load->view("template/navbar");
      $this->load->view($content);
      $this->load->view("template/footer");
    }

    ?>

    <div id="dom-target-tav" style="display: none;">
      <?php 
        $output = $totaldata_tav; //Again, do some operation, get the output.
        echo htmlspecialchars($output); /* You have to escape because the result
        will not be valid HTML otherwise. */
        ?>
      </div>
      <div id="dom-target-tkr" style="display: none;">
        <?php 
        $output = $totaldata_tkr; //Again, do some operation, get the output.
        echo htmlspecialchars($output); /* You have to escape because the result
        will not be valid HTML otherwise. */
        ?>
      </div>
      <div id="dom-target-tkj" style="display: none;">
        <?php 
        $output = $totaldata_tkj; //Again, do some operation, get the output.
        echo htmlspecialchars($output); /* You have to escape because the result
        will not be valid HTML otherwise. */
        ?>
      </div>
      <div id="dom-target-tab" style="display: none;">
        <?php 
        $output = $totaldata_tab; //Again, do some operation, get the output.
        echo htmlspecialchars($output); /* You have to escape because the result
        will not be valid HTML otherwise. */
        ?>
      </div>
    </div>


  <!-- ================================================
  Scripts
  ================================================ -->
  <script type="text/javascript" src="<?= base_url('/asset/js/jquery-3.2.1.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('/asset/js/jquery.validate.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('/asset/js/jquery.dataTables.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('/asset/materialize/js/materialize.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('/asset/js/custom.script.js') ?>"></script>
  <!-- CHART JS -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>


  <script type="text/javascript">

    $('.nav-wrapper ul li').click(function() {
      $(this).siblings('li').removeClass('active');
      $(this).addClass('active');
    });

    $(document).ready(function() {


      localStorage.jmlPrestasi = 1;

      //$('.tr_pengumuman').click(function(){
       $("#datatable").on("click", ".tr_pengumuman", function(){
       //alert("test called");
       var serviceID = "#modal"+this.id;
       //alert("serviceID :: " + serviceID);
       $(serviceID).modal('open');
       //location.href = '$modal';
       //$('.modal').modal();
     });
       $("#datatable2").on("click", ".tr_pengumuman", function(){
       //alert("test called");
       var serviceID = "#modal"+this.id;
       //alert("serviceID :: " + serviceID);
       $(serviceID).modal('open');
       //location.href = '$modal';
       //$('.modal').modal();
     });
       $("#datatable3").on("click", ".tr_pengumuman", function(){
       //alert("test called");
       var serviceID = "#modal"+this.id;
       //alert("serviceID :: " + serviceID);
       $(serviceID).modal('open');
       //location.href = '$modal';
       //$('.modal').modal();
     });
       $("#datatable4").on("click", ".tr_pengumuman", function(){
       //alert("test called");
       var serviceID = "#modal"+this.id;
       //alert("serviceID :: " + serviceID);
       $(serviceID).modal('open');
       //location.href = '$modal';
       //$('.modal').modal();
     });

    

       $("a[name='addPrestasi']").click(function() {
        //if (localStorage.jmlPrestasi) {
          localStorage.jmlPrestasi = Number(localStorage.jmlPrestasi)+1;
        //} else {
          //localStorage.jmlPrestasi = 1;
        //}

        var domElement = $('<div class="row" id="prestasi'+localStorage.jmlPrestasi+'" style="display: block;"><div class="input-field col s2"><select class="icons" name="select_tingkat_prestasi'+localStorage.jmlPrestasi+'" id="select_tingkat_prestasi'+localStorage.jmlPrestasi+'" required="required"><option value="" disabled selected>Pilih salah satu</option><option value="1">Nasional</option><option value="2">Provinsi</option><option value="3">Kabupaten</option></select><label for="select_tingkat_prestasi'+localStorage.jmlPrestasi+'">Tingkat Prestasi</label></div><div class="input-field col s2"><select class="icons" name="select_peringkat_juara'+localStorage.jmlPrestasi+'" id="select_peringkat_juara'+localStorage.jmlPrestasi+'" required="required"><option value="" disabled selected>Pilih salah satu</option><option value="1">Juara I</option><option value="2">Juara II</option><option value="3">Juara III</option></select><label for="select_peringkat_juara'+localStorage.jmlPrestasi+'">Peringkat / Juara</label></div><div class="input-field col s4"><input name="prestasi_ket'+localStorage.jmlPrestasi+'" id="prestasi_ket'+localStorage.jmlPrestasi+'" type="text" placeholder="Juara 1 Makan Kerupuk 17 an" class="materialize-textarea"></textarea><label for="prestasi_ket'+localStorage.jmlPrestasi+'">Keterangan Juara</label></div></div>');
        
        $('#prestasi1').after(domElement);
        $('#select_tingkat_prestasi'+localStorage.jmlPrestasi).material_select();
        $('#select_peringkat_juara'+localStorage.jmlPrestasi).material_select();
        $('#jmlPrestasi').attr('value',localStorage.jmlPrestasi);
        Materialize.updateTextFields();
      });

       $('#select_desa').change(function () {
        //alert($(this).val());
        if ($(this).val() == "manual") {
          $('#manual_desa').css('display','block');
          $('#desa').css('display','none');
          $('#desa_input').attr('required','');
          $('#select_desa').removeAttr('required');
        }

      })

       $('#select_kecamatan').change(function () {
        if ($(this).val() == "manual") {
          $('#manual_kecamatan').css('display','block');
          $('#kecamatan').css('display','none');
          $('#kecamatan_input').attr('required','');
          $('#select_kecamatan').removeAttr('required');

          $('#manual_desa').css('display','block');
          $('#desa').css('display','none');
          $('#desa_input').attr('required','');
          $('#select_desa').removeAttr('required');
        }else{
          $.ajax({
            url: "http://localhost:8080/pendaftaransiswa/index/filldropdown/desa/"+$(this).val(),                        
            type: 'GET',                   
            dataType:'json',                   
            success : function(data) { 
              if (data.success) {
              //alert(data.options);
              $('#select_desa').html(data.options);
              $('#select_desa').material_select();
              
              //$('#select_kecamatan').css('display','none');
            }else {
            }
          }
        });
        }

      })

       $('#select_kabupaten').change(function () {
        if ($(this).val() == "manual") {
          $('#manual_kabupaten').css('display','block');
          $('#kabupaten').css('display','none');
          $('#kabupaten_input').attr('required','');
          $('#select_kabupaten').removeAttr('required');

          $('#manual_kecamatan').css('display','block');
          $('#kecamatan').css('display','none');
          $('#kecamatan_input').attr('required','');
          $('#select_kecamatan').removeAttr('required');

          $('#manual_desa').css('display','block');
          $('#desa').css('display','none');
          $('#desa_input').attr('required','');
          $('#select_desa').removeAttr('required');
        }else{
          $.ajax({
            url: "http://localhost:8080/pendaftaransiswa/index/filldropdown/kecamatan/"+$(this).val(),                        
            type: 'GET',                   
            dataType:'json',                   
            success : function(data) { 
              if (data.success) {
              //alert(data.options);
              $('#select_kecamatan').html(data.options);
              $('#select_kecamatan').material_select();
              
              //$('#select_kecamatan').css('display','none');
            }else {
            }
          }
        });
        }

      })


       $('#select_ijazah').change(function () {
        $('#ijazah').removeAttr('disabled');
        $('#ijazah').attr('required', '');
        $('#skhun').removeAttr('disabled');
        $('#skhun').attr('required', '');
      })
       $('#select_skhun').change(function () {
        $('#skhun').removeAttr('disabled');
        $('#skhun').attr('required', '');
      })
       $('#select_kps').change(function () {
        if($(this).val() == "Ya"){
          $('#kps').removeAttr('disabled');
          $('#kps').attr('required', '');
        }else{
          $('#kps').attr('disabled','');
          $('#kps').removeAttr('required');
        }

      })
       $(function () {
        var e = document.getElementById("select_orgtua");
        var strValue = e.options[e.selectedIndex].value;
        if(strValue != ""){
          $("#select_orgtua").change();  
        }

      });

       $('#select_jml_prestasi').change(function () {
        if($(this).val() == "1"){
          $('#prestasi1').css('display','block');
          $('#prestasi2').css('display','none');
          $('#prestasi3').css('display','none'); 

          $('#select_tingkat_prestasi1').attr('required', '');
          $('#select_peringkat_juara1').attr('required', '');

          $('#select_tingkat_prestasi2').removeAttr('required');
          $('#select_peringkat_juara2').removeAttr('required');
          $('#prestasi_ket2').val('');
          $('#select_tingkat_prestasi3').removeAttr('required');
          $('#select_peringkat_juara3').removeAttr('required');
          $('#prestasi_ket3').val('');
        }else if($(this).val() == "2"){
          $('#prestasi1').css('display','block');
          $('#prestasi2').css('display','block');
          $('#prestasi3').css('display','none'); 

          $('#select_tingkat_prestasi1').attr('required', '');
          $('#select_peringkat_juara1').attr('required', '');
          $('#select_tingkat_prestasi2').attr('required', '');
          $('#select_peringkat_juara2').attr('required', '');

          $('#select_tingkat_prestasi3').removeAttr('required');
          $('#select_peringkat_juara3').removeAttr('required');
          $('#prestasi_ket3').val('');
        }else if($(this).val() == "3"){
          $('#prestasi1').css('display','block');
          $('#prestasi2').css('display','block');
          $('#prestasi3').css('display','block'); 
        }else if($(this).val() == "0"){
          $('#prestasi1').css('display','none');
          $('#prestasi2').css('display','none');
          $('#prestasi3').css('display','none');

          $('#select_tingkat_prestasi1').attr('required', '');
          $('#select_peringkat_juara1').attr('required', '');
          $('#select_tingkat_prestasi2').attr('required', '');
          $('#select_peringkat_juara2').attr('required', ''); 
          $('#select_tingkat_prestasi3').attr('required', '');
          $('#select_peringkat_juara3').attr('required', ''); 

          $('#select_tingkat_prestasi1').removeAttr('required');
          $('#select_peringkat_juara1').removeAttr('required');
          $('#prestasi_ket1').val('');
          $('#select_tingkat_prestasi2').removeAttr('required');
          $('#select_peringkat_juara2').removeAttr('required');
          $('#prestasi_ket2').val('');
          $('#select_tingkat_prestasi3').removeAttr('required');
          $('#select_peringkat_juara3').removeAttr('required');
          $('#prestasi_ket3').val('');
        }
      });


       $('#select_memiliki_sertifikat').change(function () {
        if($(this).val() == "1"){
          $('#sertifikat_inggris').css('display','block');
          $('#select_jenjang_sertifikat').attr('required', '');

        }else{
          $('#sertifikat_inggris').css('display','none');
          $('#select_jenjang_sertifikat').removeAttr('required');
          $('#ket_sertifikat').val('');
        }
      });

       $('#select_orgtua').change(function () {
        if($(this).val() == "OrgTua"){
          $('#dataorgtua').css('display','block');
          $('#datawali').css('display','none');

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
        //$('#tahun_lahir_wali').prop('selectedIndex',0);
        $('#tahun_lahir_wali').removeAttr('required');
        $('#pekerjaan_wali').val('');
        $('#pekerjaan_wali').removeAttr('required');
        $('#pendidikan_wali').val('');
        $('#pendidikan_wali').removeAttr('required');
      }else if($(this).val() == "Wali"){
        $('#datawali').css('display','block');
        $('#dataorgtua').css('display','none');

        $('#nama_wali').attr('required', '');
        $('#tahun_lahir_wali').attr('required', '');
        $('#pekerjaan_wali').attr('required', '');
        $('#pendidikan_wali').attr('required', '');

        $('#nama_ayah').val('');
        $('#nama_ayah').removeAttr('required');
        //$('#tahun_lahir_ayah').val([]);
        $('#tahun_lahir_ayah').removeAttr('required');
        $('#pekerjaan_ayah').val('');
        $('#pekerjaan_ayah').removeAttr('required');
        $('#pendidikan_ayah').val('');
        $('#pendidikan_ayah').removeAttr('required');
        $('#nama_ibu').val('');
        $('#nama_ibu').removeAttr('required');
        //$('#tahun_lahir_ibu').val([]);
        $('#tahun_lahir_ibu').removeAttr('required');
        $('#pekerjaan_ibu').val('');
        $('#pekerjaan_ibu').removeAttr('required');
        $('#pendidikan_ibu').val('');
        $('#pendidikan_ibu').removeAttr('required');
      }else if($(this).val() == "Wali_edit"){
        $('#datawali').css('display','block');
        $('#dataorgtua').css('display','none');

        $('#nama_ayah').val('');
        $('#pekerjaan_ayah').val('');
        $('#pendidikan_ayah').val('');
        $('#nama_ibu').val('');
        $('#pekerjaan_ibu').val('');
        $('#pendidikan_ibu').val('');
      }else if($(this).val() == "OrgTua_edit"){
        $('#dataorgtua').css('display','block');
        $('#datawali').css('display','none');

        $('#nama_wali').val('');
        $('#pekerjaan_wali').val('');
        $('#pendidikan_wali').val('');
      }
    });

       new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
          labels: ['2012/2013','2013/2014','2014/2015','2015/2016','2016/2017','2017/2018'],
          datasets: [{ 
            data: [86,114,106,106,107,111],
            label: "Teknik Audio Video",
            borderColor: "#3e95cd",
            fill: false
          }, { 
            data: [282,350,411,502,635,809],
            label: "Teknik Kendaraan Ringan",
            borderColor: "#8e5ea2",
            fill: false
          }, { 
            data: [168,170,178,190,203,276],
            label: "Teknik Komputer Jaringan",
            borderColor: "#3cba9f",
            fill: false
          }, { 
            data: [40,20,10,16,24,38],
            label: "Teknik Alat Berat",
            borderColor: "#e8c3b9",
            fill: false
          }
          ]
        },
        options: {
          title: {
            display: true,
            text: 'Perkembangan Jumlah Pendaftar 5 Tahun Terakhir'
          }
        }
      });
       var div_tav = document.getElementById("dom-target-tav");
       var div_tkr = document.getElementById("dom-target-tkr");
       var div_tkj = document.getElementById("dom-target-tkj");
       var div_tab = document.getElementById("dom-target-tab");
       var tav = div_tav.textContent;
       var tkr = div_tkr.textContent;
       var tkj = div_tkj.textContent;
       var tab = div_tab.textContent;
       var sisatotal  = "<?php if(!empty($total_kuota) && !empty($total_pendaftar)){ echo $total_kuota - $total_pendaftar; }else { echo "0";} ?>"
       new Chart(document.getElementById("pie-chart"), {
        type: 'pie',
        data: {
          labels: ["Teknik Audio Video", "Teknik Kendaraan Ringan", "Teknik Komputer Jaringan", "Teknik Alat Berat","Sisa Total Kuota"],
          datasets: [{
            label: "Jumlah Pendaftar",
            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#c45850","#e8c3b9"],
            data: [tav,tkr,tkj,tab,sisatotal]
          }]
        },
        options: {
          title: {
            display: true,
            text: 'Jumlah Pendaftar Tiap Jurusan'
          }
        }
      });
     });

$(document).ready(function() {

  window.validate_field = function(object) {
   var hasLength = object.attr('data-length') !== undefined;
   var lenAttr = parseInt(object.attr('data-length'));
   var len = object.val().length;

   if ($('.login').hasClass('invalid')) {
    $('.prefix').css("color","#F44336");
  }else if($('.login').hasClass('valid')){
    $('.prefix').css("color","green");
  }

  if (object.val().length === 0 && object[0].validity.badInput === false && !object.is(':required')) {
    if (object.hasClass('validate')) {
     object.removeClass('valid');
     object.removeClass('invalid');
   }
 } else {
  if (object.hasClass('validate')) {
                    // Check for character counter attributes
                    if ((object.is(':valid') && hasLength && (len <= lenAttr)) || (object.is(':valid') && !hasLength)) {
                    	object.removeClass('invalid');
                    	object.addClass('valid');
                    } else {
                    	object.removeClass('valid');
                    	object.addClass('invalid');
                    }
                  }
                }
              };
            });
$.validator.setDefaults({
 ignore: []
});
$("#formValidate").validate({
    		/*rules: {
    			username: {
    				required: true,
    				minlength: 12
    			}
    		},*/
    		messages: {
    			pin:{
    				//required: "Enter a username.",
    				min: "Enter a 4 number pin.",
    				max: "Enter a 4 number pin."
    			},
          rt:{
            required: "Kosong!"
          },
          rw:{
            required: "Kosong!"
          },
          no_un_0:{
            required: "Kosong!"
          },
          no_un_1:{
            required: "Kosong!"
          },
          no_un_2:{
            required: "Kosong!"
          },
          no_un_3:{
            required: "Kosong!"
          },
          no_un_4:{
            required: "Kosong!"
          },
          no_un_5:{
            required: "Kosong!"
          },
          no_un_6:{
            required: "Kosong!"
          },
          skhu:{
            required: "Kosong!"
          },
          select_ijazah:{
            required: "Pilih terlebih dahulu!"
          },
          select_kps:{
            required: "Pilih terlebih dahulu!"
          },
          select_orgtua:{
            required: "Pilih terlebih dahulu!"
          }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
         var placement = $(element).data('error');
         if (placement) {
          $(placement).append(error)
        } else {
          error.insertAfter(element);
        }
      }
    });
var selectedTableSiswa = [];
$("body").attr("class","grey darken-4");
$(window).on('load', function() {
 var activePage = "<?php echo $active; ?>";
 var toastact = "<?php echo $this->session->tempdata('toast'); ?>";
 var toastact2 = "<?php echo $this->session->tempdata('toastDeleteCalonSiswa'); ?>";
 var toastact2ID = "<?php echo $this->session->tempdata('toastDeleteCalonSiswaID'); ?>";
 var toastact3 = "<?php echo $this->session->tempdata('toastaddTHajaranFail'); ?>";
 var toastact4 = "<?php echo $this->session->tempdata('toastaddTHajaranSuccess'); ?>";
 var toastact5 = "<?php echo $this->session->tempdata('toastEditBobotSukses'); ?>";
 var toastact6 = "<?php echo $this->session->tempdata('toastEditKuotaSukses'); ?>";
 


 $("body").attr("class","grey darken-4");
 $('.preloader').delay(350).fadeOut('slow');
 $('.preloader-wrapper').delay(350).fadeOut();
       //$('.preloader-wrapper').delay(1900).fadeOut();
       $("#main").delay(350).fadeIn('slow');
       $("body").delay(350).queue(function (next) { 
        if(activePage == "daftar" || activePage == "daftarsukses"){
          $('.slider').slider();
          $(".button-collapse").sideNav();
          $("body").attr("class","green");
          $('.scrollspy').scrollSpy();
          $('.parallax').parallax();
          $('ul.tabs').tabs();
          $('select').material_select();
          $('.tooltipped').tooltip({delay: 50});
          $('.modal').modal();

          $('.datepicker').pickadate({
           selectMonths: true,
    					selectYears: 40, // Creates a dropdown of 15 years to control year
              format: 'yyyy-mm-d',
              
            });
          $("#table tr").click(function(){
            $(this).toggleClass("trSelected");    
            var value=$(this).find('td:first').html();
            selectedTableSiswa.push(value);
				//alert(selectedTableSiswa);    
			});
          $("#main").css("display", "flex");
          next(); 
					//$(this).css("background-image","url(https://wallpapers.wallhaven.cc/wallpapers/full/wallhaven-123653.jpg)");
				}else if(activePage == "login" || activePage == "forgotpassword"){
          $('.slider').slider();
          $(".button-collapse").sideNav();
          $("body").attr("class","green");
          $('.scrollspy').scrollSpy();
          $('.parallax').parallax();
          $('ul.tabs').tabs();
          $('select').material_select();
          $('.tooltipped').tooltip({delay: 50});
          $('.modal').modal();
          $('.datepicker').pickadate({
    					selectMonths: true, // Creates a dropdown to control month
    					selectYears: 40,// Creates a dropdown of 15 years to control year
              format: 'yyyy-mm-d'
            });

          $("#table tr").click(function(){
            $(this).toggleClass("trSelected");    
            var value=$(this).find('td:first').html();
            selectedTableSiswa.push(value);
				//alert(selectedTableSiswa);    
			});
          $("#main").css("display", "flex");
          next();
        }else if(activePage == "home"){
          $(".button-collapse").sideNav();
          $("body").css("background-image","url(https://wallpapers.wallhaven.cc/wallpapers/full/wallhaven-123653.jpg)");

        }else{
         if(toastact){
          Materialize.toast('Profie saved!', 1500);
          toastact = false;
        }else if(toastact2){
          Materialize.toast('Data calon siswa dengan ID '+toastact2ID+' berhasil dihapus.', 1500);
          toastact2 = false;
        }else if(toastact3){
          Materialize.toast('Tahun ajaran yang anda masukkan sudah ada dalam database! Silahkan edit jadwal untuk tahun ajaran tersebut.', 5000);
          toastact3 = false;
        }else if(toastact4){
          Materialize.toast('Berhasil menambah jadwal.', 2000);
          toastact4 = false;
        }else if(toastact5){
          Materialize.toast('Berhasil mengupdate bobot nilai.', 2000);
          toastact5 = false;
        }else if(toastact6){
          Materialize.toast('Berhasil mengupdate kuota.', 2000);
          toastact6 = false;
        }

        $('.slider').slider();
        $(".button-collapse").sideNav();
        $("body").attr("class","white");
        $('.scrollspy').scrollSpy();
        $('.parallax').parallax();
        $('ul.tabs').tabs();
        $('select').material_select();
        $('.tooltipped').tooltip({delay: 50});
        $('.modal').modal();
        
        $('.datepicker').pickadate({
         selectMonths: true, 
    					selectYears: 40, // Creates a dropdown of 15 years to control year
              format: 'yyyy-mm-d'
            });
        $('.timepicker').pickatime({
    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
    twelvehour: false, // Use AM/PM or 24-hour format
    donetext: 'OK', // text for done-button 
    canceltext: 'Cancel', // Text for cancel-button
    autoclose: false, // automatic close timepicker
    ampmclickable: false // make AM PM clickable
  });
        $("#table tr").click(function(){
          $(this).toggleClass("trSelected");    
          var value=$(this).find('td:first').html();
          selectedTableSiswa.push(value);
				//alert(selectedTableSiswa);    
			});
        $("#main").css("display", "flex");
        next();
      }	

    });

});
</script>
</body>
</html>