	<br><br><br>

	<div class="container">
		<center>
			<div class="row s12 z-depth-1">
				<div class="row" style="padding: 32px 48px 32px 48px;">
					<img src="<?= base_url($this->session->userdata('ava_path')) ?>" alt="" class="circle responsive z-depth-2" style="height: 110px; width: 110px;"> 
					<h5 class="flow-text text-lighten-1">You're logged in as <?php echo $uname; ?></h5>
					<h6 class="text-lighten-3">Joined from: <?php echo $date_joined; ?></h6><br>

					<div class="divider"></div> <br>
					
					<div class="col s4">
						<a class="waves-effect waves-light btn tooltipped green darken-3" data-position="left" data-delay="50" data-tooltip="Untuk melihat table calon siswa" style="float: right;" href="<?= base_url('/dashboard/datapendaftar'); ?>">Lihat data pendaftar</a>
					</div>
					<div class="col s4" >
						<a class="waves-effect waves-light btn tooltipped green darken-3" data-position="bottom" data-delay="50" data-tooltip="Menambah user admin / penguji / panitia yang baru" href="<?= base_url('/dashboard/adduser'); ?>">Add New User</a>
					</div>
					<div class="col s4" >
						<a class="waves-effect waves-light btn tooltipped green darken-3" data-position="right" data-delay="50" data-tooltip="Ubah username, avatar, password, dll" style="float: left;" href="<?= base_url('/dashboard/editprofile'); ?>">Edit Profile</a>
					</div>
				</div>
			</div>
		</center>



		<div class="row">
			<div class="col s12 m4">
				<div class="card green darken-1" style="height: 220px;">
					<div class="card-content white-text">
						<span class="card-title">Status Pendaftaran</span>
						<p>
							Pendaftaran: 
							<b>
								<?php
								if($status_pendaftaran == 1){
									echo "Aktif";
								}else{
									echo "Tidak Aktif";
								}
								?>
							</b>
							<br>
							Tahun Ajaran: <i><?=$tahunajaran?></i>
						</p>
					</div>
				</div>
				<div class="card green darken-1" style="height: 220px;">
					<div class="card-content white-text">
						<span class="card-title">Aktifkan Pendaftaran</span>
						<center>
							<?php if ($status_pendaftaran == 1): ?>

								<p>Pendaftaran sudah aktif, klik tombol dibawah untuk menghentikan pendaftaran.</p>

								<br><br>

								<a class="waves-effect waves-light btn tooltipped green darken-3" data-position="bottom" data-delay="50" data-tooltip="Hentikan sesi pendaftaran" href="#modal2">Hentikan Pendaftaran</a>

							<?php else: ?>

								<p>Mulai sesi pendaftaran untuk tahun ajaran <i><?=$tahunajaran?></i> dengan menekan tombol Aktifkan Pendaftaran dibawah.</p>
								<!--<input placeholder="2016/2017" id="tahun" type="text" class="white-text">-->

								<br>

								<a class="waves-effect waves-light btn tooltipped green darken-3" data-position="bottom" data-delay="50" data-tooltip="Aktifkan sesi pendaftaran" href="#modal1">Aktifkan Pendaftaran</a>

							<?php endif; ?>
						</center>
					</div>
				</div>
				<!--<div class="card green darken-1">
					<div class="ct-chart" style="padding-left: 10px;"></div>
				</div>-->

			</div>

			<div class="col s12 m8">
				<ul class="tabs green darken-1 z-depth-2">
					<li class="tab col s4"><a class="white-text waves-effect waves-light" href="#timeline">Timeline</a></li>
					<li class="tab col s4"><a class="white-text waves-effect waves-light" href="#graphic">Graphic</a></li>
					<li class="tab col s4"><a class="white-text waves-effect waves-light" href="#satulagi">Satu Lagi</a></li>
				</ul>
				<div id="timeline">
					<ul class="collection z-depth-1" style="height: 590px;">
						<?php 		
						foreach ($timelinedata->result() as $row) {
							?>

							<li class="collection-item avatar">
								<img src="<?= base_url($row->ava_path) ?>" alt="" class="circle"> 
								<span class="title"><?= $row->action ?><br>
									<div class="chip">
										<?= $row->username ?>
									</div>
								</span>

								<i class="secondary-content"><?= $row->date ?></i>
							</li>

							<?php	
						} 
						?>
					</ul>
					<center>
						<ul class="pagination">
							<!-- Show pagination links -->
							<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
							<li class="active green"><a href="#!">1</a></li>
							<li class="waves-effect"><a href="#!">2</a></li>
							<li class="waves-effect"><a href="#!">3</a></li>
							<li class="waves-effect"><a href="#!">4</a></li>
							<li class="waves-effect"><a href="#!">5</a></li>
							<li class="waves-effect"><a href="#!">6</a></li>
							<li class="waves-effect"><a href="#!">7</a></li>
							<li class="waves-effect"><a href="#!">8</a></li>
							<li class="waves-effect"><a href="#!">9</a></li>
							<li class="waves-effect"><a href="#!">10  </a></li>
							<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
						</ul>
					</center>
				</div>

				<div id="graphic">
					<ul class="collection z-depth-1" id="timeline" style="height: 590px; overflow: auto; padding: 10px 38px 10px 38px;">
						<canvas id="line-chart" width="800" height="500"></canvas><br><br><br>
						<canvas id="pie-chart" width="800" height="500"></canvas>
					</ul>
				</div>

				<div id="satulagi">
					<ul class="collection z-depth-1" id="timeline" style="height: 590px;">
						SATULAGI
					</ul>
				</div>

			</div>



		</div>
	</div>





	<br>


	<!-- Modal Structure -->
	<div id="modal1" class="modal" style="width: 400px;">
		<div class="modal-content">
			<h4>Aktifkan Pendaftaran</h4>
			<p>Apakah anda yakin untuk mengaktifkan pendaftaran sekarang?</p>
		</div>
		<div class="modal-footer centered">
			<a href="<?= base_url("dashboard/aktifkanpendaftaran") ?>" class="modal-action modal-close waves-effect waves-green btn-flat">Ya</a>
			<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Tidak</a>
		</div>
	</div>

	<div id="modal2" class="modal" style="width: 400px;">
		<div class="modal-content">
			<h4>Hentikan Pendaftaran</h4>
			<p>Apakah anda yakin untuk menghentikan pendaftaran sekarang?</p>
		</div>
		<div class="modal-footer centered">
			<a href="<?= base_url("dashboard/hentikanpendaftaran") ?>" class="modal-action modal-close waves-effect waves-green btn-flat">Ya</a>
			<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Tidak</a>
		</div>
	</div>