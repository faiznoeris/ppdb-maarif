	<br><br><br>

	<div class="container">
		<div class="row" style="width: 1000px;">
			<ul class="tabs green darken-1 z-depth-2">
				<li class="tab col s4"><a class="white-text waves-effect waves-light" href="#timeline">Timeline</a></li>
				<li class="tab col s4"><a class="white-text waves-effect waves-light" href="#graphic">Graphic</a></li>
			</ul>
			<div id="timeline">
				<form class="col s12">
					<div class="file-field input-field">
						<div class="col s12">
							This is an inline input field:
							<div class="input-field inline">
								<input id="email" type="email" class="validate">
								<label for="email" data-error="wrong" data-success="right"></label>
							</div>
						</div>

						<div class="col s12">
							This is an inline input field:
							<div class="input-field inline">
								<input id="email" type="email" class="validate">
								<label for="email" data-error="wrong" data-success="right"></label>
							</div>
						</div>

						<div class="col s12">
							This is an inline input field:
							<div class="input-field inline">
								<input id="email" type="email" class="validate">
								<label for="email" data-error="wrong" data-success="right"></label>
							</div>
						</div>

						<div class="col s12">
							<select>
								<option value="" disabled selected>Choose your option</option>
								<option value="1">Option 1</option>
								<option value="2">Option 2</option>
								<option value="3">Option 3</option>
							</select>
							<label>Materialize Select</label>
						</div>

						<div class="btn">
							<span>File</span>
							<input type="file">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>

						<a href="<?=base_url('index/test')?>" class="waves-effect waves-light btn">button</a>
					</div>

				</form>
			</div>

			<div id="graphic">
				<ul class="collection z-depth-1" id="timeline" style="height: 590px; overflow: auto; padding: 10px 38px 10px 38px;">
					<canvas id="line-chart" width="800" height="500"></canvas><br><br><br>
					<canvas id="pie-chart" width="800" height="500"></canvas>
				</ul>
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