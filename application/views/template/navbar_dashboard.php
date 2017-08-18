<div class="wrapper">
  <div class="navbar-fixed">
    <nav class="nav-extended grey darken-3">
      <div class="nav-wrapper">
        <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down" >
          <li><a class="text-darken-3" href="<?= base_url('authentication/logout'); ?>"><b>Logout</b></a></li>
        </ul>
      </div>
      <div class="nav-content grey darken-3">
        <div class="col s12" style="margin-left: 20px; margin-bottom: 10px;">
          <?php if($pages == "dashboard"): ?>
            <a class="breadcrumb" href="<?= base_url(''); ?>">Home</a>
            <a class="breadcrumb">Dashboard</a>
          <?php elseif($pages == "datapendaftar"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a class="breadcrumb">Lihat Data Pendaftar</a>
          <?php elseif($pages == "datasiswa"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a class="breadcrumb">Lihat Data Siswa</a>
          <?php elseif($pages == "seleksipendaftar"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a class="breadcrumb">Seleksi Pendaftar</a>
          <?php elseif($pages == "datablacklist"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a class="breadcrumb">Data Blacklist</a>
          <?php elseif($pages == "daftarulang"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a class="breadcrumb">Daftar Ulang</a>
          <?php elseif($pages == "adduser"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a class="breadcrumb">Add New User</a>
          <?php elseif($pages == "daftaruser"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a class="breadcrumb">Daftar User</a>
          <?php elseif($pages == "editdatapendaftar"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a href="<?= base_url('dashboard/datapendaftar'); ?>" class="breadcrumb">Lihat Data Pendaftar</a>
            <a class="breadcrumb">Edit Data Siswa</a>
          <?php elseif($pages == "lihatdatapendaftar"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a href="<?= base_url('dashboard/datapendaftar'); ?>" class="breadcrumb">Lihat Data Pendaftar</a>
            <a class="breadcrumb">Lihat Detail Data Siswa</a>
          <?php elseif($pages == "editprofile"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a href="<?= base_url('dashboard/editprofile'); ?>" class="breadcrumb">Edit Profile</a>
          <?php elseif($pages == "pengaturan"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a class="breadcrumb">Pengaturan</a>
          <?php elseif($pages == "addthajaran"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a href="<?= base_url('dashboard/pengaturan'); ?>" class="breadcrumb">Pengaturan</a>
            <a class="breadcrumb">Add Tahun Ajaran</a>
          <?php elseif($pages == "editthajaran"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a href="<?= base_url('dashboard/pengaturan'); ?>" class="breadcrumb">Pengaturan</a>
            <a class="breadcrumb">Edit Tahun Ajaran</a>
          <?php elseif($pages == "editkuota"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a href="<?= base_url('dashboard/pengaturan'); ?>" class="breadcrumb">Pengaturan</a>
            <a class="breadcrumb">Edit Kuota</a>
          <?php elseif($pages == "editbiaya"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a href="<?= base_url('dashboard/pengaturan'); ?>" class="breadcrumb">Pengaturan</a>
            <a class="breadcrumb">Edit Biaya</a>
          <?php elseif($pages == "addbiaya"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a href="<?= base_url('dashboard/pengaturan'); ?>" class="breadcrumb">Pengaturan</a>
            <a class="breadcrumb">Add Biaya</a>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </div>
</div>

<ul id="slide-out" class="side-nav">
  <li>
    <div class="userView">
      <div class="background">
        <img src="http://t03.deviantart.net/1U2jU8djSEfSv6fAy15-2oxnoUU=/fit-in/700x350/filters:fixed_height(100,100):origin()/pre03/e377/th/pre/f/2016/196/1/9/material_design_wallpaper_orange_030_by_charlie_henson-daa22rw.png" class="responsive-img">
      </div>
      <a href="#!user"><img class="circle" src="<?= base_url($this->session->userdata('ava_path')) ?>"></a>
      <a href="#!name"><span class="white-text name"><?= $this->session->userdata('username') ?></span></a>
      <a href="#!email"><span class="white-text email"><?= $this->session->userdata('email') ?></span></a>
    </div>
  </li>
  <li>
    <a href="<?= base_url('dashboard'); ?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">dashboard</i>Dashboard</a>
  </li>
  <li>
    <div class="divider"></div>
  </li>
  <li>
    <a class="subheader">Profile</a>
  </li>
  <li>
    <a href="<?= base_url('dashboard/editprofile'); ?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">account_circle</i>Edit Profile</a>
  </li>
  <li>
    <div class="divider"></div>
  </li>
  <li>
    <a class="subheader">Main</a>
  </li>
  <li>
    <a href="<?= base_url('dashboard/datapendaftar'); ?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">list</i>Data Pendaftar</a>
    <a href="<?= base_url('dashboard/seleksipendaftar'); ?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">compare_arrows</i>Seleksi Pendaftar</a>
    <a href="<?= base_url('dashboard/daftarulang'); ?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">done_all</i>Daftar Ulang</a>
    

    <a href="<?= base_url('dashboard/datasiswa') ?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">people</i>Data Siswa</a>
    <a href="#modalkelas" class="waves-effect modal-trigger"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">event_seat</i>Pembagian Kelas</a>
    <a href="<?=base_url('dashboard/datablacklist')?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">block</i>Data Blacklist (Temporary)</a>

  </li>
  <li>
    <div class="divider"></div>
  </li>

  <?php $session = $this->session->all_userdata(); ?>
  <?php if($session['user_lvl'] == 0): ?>

    <li>
      <a class="subheader">Admin Stuff</a>
      <a href="<?= base_url('dashboard/adduser'); ?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">plus_one</i>Tambah User</a>
      <a href="<?= base_url('dashboard/daftaruser'); ?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">people_outline</i>Daftar User</a>
      <a href="<?= base_url('dashboard/pengaturan') ?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">settings</i>Pengaturan</a>

    </li>

  <?php endif; ?>

  <li>
    <a class="subheader">Logout</a>
  </li>
  <li>
    <a href="#modallogout" class="waves-effect red-text modal-trigger"><i class="material-icons" style="color: rgba(244, 67, 54, 1);">exit_to_app</i>Logout</a>
  </li>
</ul>

<div id="modallogout" class="modal" style="width: 400px;">
  <div class="modal-content">
    <h4>Logout</h4>
    <p>Apakah anda yakin untuk logout sekarang?</p>
  </div>
  <div class="modal-footer centered">
    <a href="<?= base_url('/authentication/logout'); ?>" class="modal-action modal-close waves-effect waves-green btn-flat">Ya</a>
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Tidak</a>
  </div>
</div>

<div id="modalkelas" class="modal" style="width: 600px;">
  <div class="modal-content">
    <h4>Pembagian Kelas (MOS/Reguler)</h4>
    <p>Lakukan pembagian kelas sekarang? Pilih tombol dibawah untuk melakukan proses pembagian kelas untuk MOS / Reguler.</p>
  </div>
  <div class="modal-footer centered">
    <a href="<?= base_url('/laporan/kelasmos'); ?>" class="modal-action modal-close waves-effect waves-green btn-flat">Kelas MOS</a>
    <a href="<?= base_url('/laporan/kelasreguler'); ?>" class="modal-action modal-close waves-effect waves-green btn-flat">Kelas Reguler</a>
  </div>
</div>