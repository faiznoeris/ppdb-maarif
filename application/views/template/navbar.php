<header>
  <div class="navbar-fixed">
    <nav class="nav-extended">
      <div class="nav-wrapper green darken-3">
        <a href="<?= base_url(''); ?>" class="brand-logo"><img style="height: 60px; width: 70px; float: left; padding-right: 10px;"src="<?= base_url('/asset/images/icon.jpg') ?>">SMK Ma'arif NU 1 Sumpiuh</i></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <?php
          if($active == "jurusan"){
            echo '<li><a href='. base_url('') .'>Home</a></li>';
            echo '<li class="active"><a href='. base_url('jurusan') .'>Informasi Jurusan</a></li>';
            echo '<li><a href='. base_url('pengumuman') .'>Pengumuman Kelulusan</a></li>';
            echo '<li><a href='. base_url('pendaftaran') .'>Pendaftaran</a></li>';
            if($loggedin){
              echo '<li><a href='. base_url('dashboard') .'>Dashboard</a></li>';
            }else{
              echo '<li><a href='. base_url('login') .'>Login</a></li>';
            }
            /*echo '<li><a href='. base_url('') .'>Home</a></li>';
            echo '<li class="active"><a href=#section1>Teknik Audio Video</a></li>';
            echo '<li><a href=#section2>Teknik Kendaraan Ringan</a></li>';
            echo '<li><a href=#section3>Teknik Komputer Jaringan</a></li>';
            echo '<li><a href=#section4>Teknik Alat Berat</a></li>';*/
          }else if($active == "daftar"){          
            echo '<li><a href='. base_url('') .'>Home</a></li>';
            echo '<li><a href='. base_url('jurusan') .'>Informasi Jurusan</a></li>';
            echo '<li><a href='. base_url('pengumuman') .'>Pengumuman Kelulusan</a></li>';
            echo '<li class="active"><a href='. base_url('pendaftaran') .'>Pendaftaran</a></li>';
            if($loggedin){
              echo '<li><a href='. base_url('dashboard') .'>Dashboard</a></li>';
            }else{
              echo '<li><a href='. base_url('login') .'>Login</a></li>';
            }
          }else if($active == "pengumuman"){
            echo '<li><a href='. base_url('') .'>Home</a></li>';
            echo '<li><a href='. base_url('jurusan') .'>Informasi Jurusan</a></li>';
            echo '<li class="active"><a href='. base_url('pengumuman') .'>Pengumuman Kelulusan</a></li>';
            echo '<li><a href='. base_url('pendaftaran') .'>Pendaftaran</a></li>';
            if($loggedin){
              echo '<li><a href='. base_url('dashboard') .'>Dashboard</a></li>';
            }else{
              echo '<li><a href='. base_url('login') .'>Login</a></li>';
            }
          }
          ?>

          <!--<li><a href="<?= base_url('/login'); ?>">Login</a></li>-->
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="sass.html">Sass</a></li>
          <li><a href="badges.html">Components</a></li>
          <li><a href="collapsible.html">Javascript</a></li>
          <li><a href="mobile.html">Mobile</a></li>
        </ul>
      </div>
      <?php
      if($active == "pengumuman"){
        echo "
        <div class='nav-content green darken-3'>
          <ul class='tabs tabs-transparent'>
            <li class='tab'><a href=#section1 id='scrotab'>Teknik Audio Video</a></li>
            <li class='tab'><a href=#section2 id='scrotab'>Teknik Kendaraan Ringan</a></li>
            <li class='tab'><a href=#section3 id='scrotab'>Teknik Komputer Jaringan</a></li>
            <li class='tab'><a href=#section4 id='scrotab'>Teknik Alat Berat</a></li>
          </ul>
        </div>";
      }
      ?>
    </nav>
  </div>
</header>