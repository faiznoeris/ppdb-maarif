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
          <?php elseif($pages == "seleksipendaftar"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a class="breadcrumb">Seleksi Pendaftar</a>
          <?php elseif($pages == "adduser"): ?>
            <a href="<?= base_url(''); ?>" class="breadcrumb">Home</a>
            <a href="<?= base_url('dashboard'); ?>" class="breadcrumb">Dashboard</a>
            <a class="breadcrumb">Add New User</a>
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
    <a href="<?= base_url('dashboard/datapendaftar'); ?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">list</i>Data Pendaftar<span class="new badge grey">4</span></a>
    <a href="<?= base_url('dashboard/seleksipendaftar'); ?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">compare_arrows</i>Seleksi Pendaftar</a>
    <a href="<?= base_url('dashboard/adduser'); ?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">plus_one</i>Add New User</a>

    <a href="#!" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">people</i>Data Siswa</a>
    <a href="#!" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">event_seat</i>Pembagian Kelas</a>
    <a href="<?=base_url('index/test')?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">description</i>Export Laporan</a>
    <a href="<?= base_url('dashboard/pengaturan') ?>" class="waves-effect"><i class="material-icons" style="color: rgba(66, 66, 66, 1);">settings</i>Pengaturan</a>
  </li>
  <li>
    <div class="divider"></div>
  </li>
  <li>
    <a class="subheader">Logout</a>
  </li>
  <li>
    <a href="#modal2" class="waves-effect red-text"><i class="material-icons" style="color: rgba(244, 67, 54, 1);">exit_to_app</i>Logout</a>
  </li>
</ul>

<div id="modal2" class="modal" style="width: 400px;">
  <div class="modal-content">
    <h4>Logout</h4>
    <p>Apakah anda yakin untuk logout sekarang?</p>
  </div>
  <div class="modal-footer centered">
    <a href="<?= base_url('/authentication/logout'); ?>" class="modal-action modal-close waves-effect waves-green btn-flat">Ya</a>
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Tidak</a>
  </div>
</div>