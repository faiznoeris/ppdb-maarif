<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- CUSTOM CSS -->
  <link href="<?= base_url('/asset/css/custom.style.css') ?>" rel="stylesheet">
  <!-- MATERIALIZECSS -->
  <link href="<?= base_url('/asset/materialize/css/materialize.css') ?>" rel="stylesheet" media="screen,projection">
  <!-- GOOGLE ICON -->
  <link href="<?= base_url('/asset/materialize/css/material-icon.css') ?>" rel="stylesheet" media="screen,projection">
  <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->

  <link rel="icon" type="image/x-icon" href="<?= base_url('/asset/images/icon.jpg') ?>">

  <title>
    <?=$title;?>
  </title>

</head>


<body>
  <!-- PRELOADER / LOADING -->
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

    if($active == "login"){

      $this->load->view($content);

    }else if($active == "dashboard" || $active == "home"){

      if($active == "home"){
        $this->load->view("template/navbar_home");
      }
      else{
        $this->load->view("template/navbar_dashboard");
      }
      $this->load->view($content);

    }else{

      $this->load->view("template/navbar");
      $this->load->view($content);
      $this->load->view("template/footer");

    }

    ?>

    <!-- untuk menigrim data jumlah total pendaftar tiap jurusan ke chart js -->
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
      <div id="dom-target-sisatotal" style="display: none;">
        <?php 

        if(!empty($total_kuota) && !empty($total_pendaftar)){ 
          $output = $total_kuota - $total_pendaftar;
        }else if(!empty($total_kuota)) { 
          $output = $total_kuota;
        }

        //$output = $totaldata_tab; //Again, do some operation, get the output.
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
  <script type="text/javascript" src="<?= base_url('/asset/js/custom.datatable.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('/asset/js/custom.pendaftaran.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('/asset/js/custom.script.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('/asset/js/custom.chart.js') ?>"></script>
  <!-- CHART JS -->
  <script type="text/javascript" src="<?= base_url('/asset/js/Chart.min.js') ?>"></script>


  <script type="text/javascript">
    //SET MENU AKTIF PADA TABS / NAVIGATION BAR
    $('.nav-wrapper ul li').click(function() {
      $(this).siblings('li').removeClass('active');
      $(this).addClass('active');
    });

    //UNTUK DI PENGUMUMAN HASIL SELEKSI / KELULUSAN, KALO DIKLIK BARIS TABLENYA, MUNCUL MODAL
    $(document).ready(function() {
      localStorage.jmlPrestasi = 1;

      $("#datatable").on("click", ".tr_click", function() {
        var serviceID = "#modal" + this.id;
        $(serviceID).modal('open');
      });
      $("#datatable2").on("click", ".tr_click", function() {
        var serviceID = "#modal" + this.id;
        $(serviceID).modal('open');
      });
      $("#datatable3").on("click", ".tr_click", function() {
        var serviceID = "#modal" + this.id;
        $(serviceID).modal('open');
      });
      $("#datatable4").on("click", ".tr_click", function() {
        var serviceID = "#modal" + this.id;
        $(serviceID).modal('open');
      });
    });

    //INITIALIZE MATERIALIZE DAN GANTI BACKGROUND, ETC
    $("body").attr("class", "grey darken-4");
    $(window).on('load', function() {
      var activePage = "<?php echo $active; ?>";
      var toastact = "<?php echo $this->session->tempdata('toast'); ?>";
      var toastact2 = "<?php echo $this->session->tempdata('toastDeleteCalonSiswa'); ?>";
      var toastact2ID = "<?php echo $this->session->tempdata('toastDeleteCalonSiswaID'); ?>";
      var toastact3 = "<?php echo $this->session->tempdata('toastaddTHajaranFail'); ?>";
      var toastact4 = "<?php echo $this->session->tempdata('toastaddTHajaranSuccess'); ?>";
      var toastact5 = "<?php echo $this->session->tempdata('toastEditBobotSukses'); ?>";
      var toastact6 = "<?php echo $this->session->tempdata('toastEditKuotaSukses'); ?>";

      $("body").attr("class", "grey darken-4");
      $('.preloader').delay(350).fadeOut('slow');
      $('.preloader-wrapper').delay(350).fadeOut();
      $("#main").delay(350).fadeIn('slow');
      $("body").delay(350).queue(function(next) {

        if (activePage == "daftar" || activePage == "daftarsukses") {

          $('.slider').slider();
          $(".button-collapse").sideNav();
          $("body").attr("class", "green");
          $('.scrollspy').scrollSpy();
          $('.parallax').parallax();
          $('ul.tabs').tabs();
          $('select').material_select();
          $('.tooltipped').tooltip({
            delay: 50
          });
          $('.modal').modal();
          $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: 50, // Creates a dropdown of 15 years to control year
            format: 'yyyy-mm-d'
          });

          $("#main").css("display", "flex");
          next();

        } else if (activePage == "login" || activePage == "forgotpassword") {

          $("body").attr("class", "green");
          $("#main").css("display", "flex");
          next();

        } else if (activePage == "home") {
          $(".button-collapse").sideNav();
          $("body").css("background-image", "url(https://wallpapers.wallhaven.cc/wallpapers/full/wallhaven-123653.jpg)");

        } else {

          if (toastact) {
            Materialize.toast('Profie saved!', 1500);
            toastact = false;
          } else if (toastact2) {
            Materialize.toast('Data calon siswa dengan ID ' + toastact2ID + ' berhasil dihapus.', 1500);
            toastact2 = false;
          } else if (toastact3) {
            Materialize.toast('Tahun ajaran yang anda masukkan sudah ada dalam database! Silahkan edit jadwal untuk tahun ajaran tersebut.', 5000);
            toastact3 = false;
          } else if (toastact4) {
            Materialize.toast('Berhasil menambah jadwal.', 2000);
            toastact4 = false;
          } else if (toastact5) {
            Materialize.toast('Berhasil mengupdate bobot nilai.', 2000);
            toastact5 = false;
          } else if (toastact6) {
            Materialize.toast('Berhasil mengupdate kuota.', 2000);
            toastact6 = false;
          }

          $('.slider').slider();
          $(".button-collapse").sideNav();
          $("body").attr("class", "white");
          $('.scrollspy').scrollSpy();
          $('.parallax').parallax();
          $('ul.tabs').tabs();
          $('select').material_select();
          $('.tooltipped').tooltip({
            delay: 50
          });
          $('.modal').modal();

          $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: 40, // Creates a dropdown of 15 years to control year
            format: 'yyyy-mm-d'
          });
          $('.timepicker').pickatime({
            default: 'now', // Set default time: 'now', '1:30AM', '16:30'
            fromnow: 0, // set default time to * milliseconds from now (using with default = 'now')
            twelvehour: false, // Use AM/PM or 24-hour format
            donetext: 'OK', // text for done-button 
            canceltext: 'Cancel', // Text for cancel-button
            autoclose: false, // automatic close timepicker
            ampmclickable: false // make AM PM clickable
          });
          $("#main").css("display", "flex");
          next();
        }
      });
    });
  </script>
</body>

</html>