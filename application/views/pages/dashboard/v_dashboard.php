	<br><br><br>

	<div class="container">
		<center>
			<div class="row s12 z-depth-1">
				<div class="row" style="padding: 32px 48px 32px 48px;">
					<?php if($user_lvl == 0): ?>
						<span class="new badge red" data-badge-caption="Highest Admin"></span><br>
					<?php endif; ?>
					<img src="<?= base_url($this->session->userdata('ava_path')) ?>" alt="" class="circle responsive z-depth-2" style="height: 110px; width: 110px;"> 
					<h5 class="flow-text text-lighten-1">You're logged in as <?php echo $uname; ?></h5> 
					<h6 class="text-lighten-3">Joined from: <?php echo $date_joined; ?></h6><br>

				</div>
			</div>
		</center>



		<div class="row">
			<div class="col s12 m4">
				<div class="card grey darken-1" style="height: 220px;">
					<div class="card-content white-text">
						<span class="card-title">Status Pendaftaran</span>
						<p>
							Pendaftaran: 
							<b>
								<?php
								if(!empty($status_pendaftaran)){
									echo $status_pendaftaran;
								}else{
									echo "Data untuk tahun ajaran ".$tahunajaran. " belum ada dalam database! Silahkan tambahkan secara manual melalui menu Pengaturan.";
								}
								?>
							</b>
							<br>
							Tahun Ajaran: <i><?=$tahunajaran?></i>
						</p>
					</div>
				</div>
				<div class="card grey darken-1" style="height: 220px;">
					<div class="card-content white-text">
						<span class="card-title">Aktifkan Pendaftaran</span>
						<center>
							<?php if ($status_pendaftaran == "aktif"): ?>

								<p>Pendaftaran sudah aktif, klik tombol dibawah untuk menghentikan pendaftaran.</p>

								<br>

								<a class="waves-effect waves-light btn tooltipped grey darken-3 modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Hentikan sesi pendaftaran" href="#modal2">Hentikan Pendaftaran</a>

							<?php elseif(empty($status_pendaftaran)): ?>

								<p>Data untuk tahun ajaran <?= $tahunajaran ?> belum ada dalam database! Silahkan tambahkan secara manual melalui menu Pengaturan.</p>

								<br>

								<a class="waves-effect waves-light btn tooltipped grey darken-3" data-position="bottom" data-delay="50" data-tooltip="Buka halaman pengaturan" href="<?= base_url('dashboard/pengaturan') ?>">Pengaturan</a>

							<?php else: ?>

								<p>Mulai sesi pendaftaran untuk tahun ajaran <i><?=$tahunajaran?></i> dengan menekan tombol Aktifkan Pendaftaran dibawah.</p>
								<!--<input placeholder="2016/2017" id="tahun" type="text" class="white-text">-->

								<br>

								<a class="waves-effect waves-light btn tooltipped grey darken-3 modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Aktifkan sesi pendaftaran" href="#modal1">Aktifkan Pendaftaran</a>

							<?php endif; ?>
						</center>
					</div>
				</div>
				<!--<div class="card green darken-1">
					<div class="ct-chart" style="padding-left: 10px;"></div>
				</div>-->

			</div>

			<div class="col s12 m8">
				<ul class="tabs grey darken-1 z-depth-2">
					<li class="tab col s4"><a class="white-text waves-effect waves-light" href="#graph">Perkembangan Pendaftar</a></li>
					<li class="tab col s4"><a class="white-text waves-effect waves-light" href="#graph2">Jumlah Pendaftar</a></li>
				</ul>


				<div id="graph">
					<ul class="collection z-depth-1" id="timeline" style="height: 590px; overflow: auto; padding: 10px 38px 10px 38px;">
						<canvas id="line-chart" width="800" height="500"></canvas><br><br><br>
						
					</ul>
				</div>

				<div id="graph2">
					<ul class="collection z-depth-1" id="timeline" style="height: 590px;">
						<canvas id="pie-chart" width="800" height="500"></canvas><br>
						<p style="padding-left: 20px; padding-top: 5px;">
							<?php
							if(!empty($data_kuota)){
								$sisaTAV = $data_kuota->kuota_tav - $totaldata_tav;
								$sisaTKR = $data_kuota->kuota_tkr - $totaldata_tkr;
								$sisaTKJ = $data_kuota->kuota_tkj - $totaldata_tkj;
								$sisaTAB = $data_kuota->kuota_tab - $totaldata_tab;
							}else{
								$sisaTAV = "x";
								$sisaTKR = "x";
								$sisaTKJ = "x";
								$sisaTAB = "x";
							}
							?>

							Sisa Kuota TAV: <i><?= $sisaTAV ?></i><br>
							Sisa Kuota TKR: <i><?= $sisaTKR ?></i><br>
							Sisa Kuota TKJ: <i><?= $sisaTKJ ?></i><br>
							Sisa Kuota TAB: <i><?= $sisaTAB ?></i><br>
						</p>
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
			<a href="<?= base_url("dashboard/aktifkanpendaftaran/".$tahunajaran) ?>" class="modal-action modal-close waves-effect waves-green btn-flat">Ya</a>
			<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Tidak</a>
		</div>
	</div>

	<div id="modal2" class="modal" style="width: 400px;">
		<div class="modal-content">
			<h4>Hentikan Pendaftaran</h4>
			<p>Apakah anda yakin untuk menghentikan pendaftaran sekarang?</p>
		</div>
		<div class="modal-footer centered">
			<a href="<?= base_url("dashboard/hentikanpendaftaran/".$tahunajaran) ?>" class="modal-action modal-close waves-effect waves-green btn-flat">Ya</a>
			<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Tidak</a>
		</div>
	</div>