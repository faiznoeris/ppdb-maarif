<div class="navbar-fixed">
  <nav class="transparent z-depth-0">
    <div class="nav-wrapper">
      <div class="row">
        <div class="col s12">
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <a href="<?=base_url('')?>" class="brand-logo">SMK Ma'arif NU 1 Sumpiuh</a>
          <ul class="right hide-on-med-and-down">
            <li><a href=<?=base_url('')?>>Home</a></li>
            <li><a href=<?=base_url('jurusan')?>>Informasi Jurusan</a></li>
            <li><a href=<?=base_url('pengumuman')?>>Pengumuman Kelulusan</a></li>
            <li><a href=<?=base_url('pendaftaran')?>>Pendaftaran</a></li>
            <?php 
            if($loggedin){
              echo '<li><a href='. base_url('dashboard') .'>Dashboard</a></li>';
            }else{
              echo '<li><a href='. base_url('login') .'>Login</a></li>';
            } 
            ?>

          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">Javascript</a></li>
            <li><a href="mobile.html">Mobile</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>




