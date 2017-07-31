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
        $('#pekerjaan_wali').removeAttr('required');
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
        labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
        datasets: [{ 
          data: [86,114,106,106,107,111,133,221,783,2478],
          label: "Africa",
          borderColor: "#3e95cd",
          fill: false
        }, { 
          data: [282,350,411,502,635,809,947,1402,3700,5267],
          label: "Asia",
          borderColor: "#8e5ea2",
          fill: false
        }, { 
          data: [168,170,178,190,203,276,408,547,675,734],
          label: "Europe",
          borderColor: "#3cba9f",
          fill: false
        }, { 
          data: [40,20,10,16,24,38,74,167,508,784],
          label: "Latin America",
          borderColor: "#e8c3b9",
          fill: false
        }, { 
          data: [6,3,2,2,7,26,82,172,312,433],
          label: "North America",
          borderColor: "#c45850",
          fill: false
        }
        ]
      },
      options: {
        title: {
          display: true,
          text: 'World population per region (in millions)'
        }
      }
    });
     new Chart(document.getElementById("pie-chart"), {
      type: 'pie',
      data: {
        labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
        datasets: [{
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }]
      },
      options: {
        title: {
          display: true,
          text: 'Predicted world population (millions) in 2050'
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
    					selectMonths: true, // Creates a dropdown to control month
    					selectYears: 40, // Creates a dropdown of 15 years to control year
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
    					selectMonths: true, // Creates a dropdown to control month
    					selectYears: 40, // Creates a dropdown of 15 years to control year
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
      }	

    });

     });
   </script>
 </body>
 </html>