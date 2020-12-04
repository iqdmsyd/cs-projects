	<footer class="fixed-bottom mb-2">
		<div class="container" style="background-color: #DDDDDD; height: 182px;">
			<div class="row">
				<!-- New Servis | To Beli -->
				<div class="col-md-2 mt-4">
					<a href="<?php echo site_url('Part') ?>">
						<button style="padding: 5px 15px; font-size: 15px;">Transaksi Part</button>
					</a>
				</div>
				<div class="col-md-2 mt-4 mr-auto">
					<a href="<?php echo base_url("Servis/list") ?>">
						<button style="padding: 5px 15px; font-size: 15px;">List Servis</button>
					</a>
				</div>
				
				<!-- Informasi 	jumlah jasa -->
				<div class="col-md-4 mt-4">
					<table cellpadding="3px">
						<tr>
							<td>Jumlah Jasa</td>
							<td>:</td>
								<?php
								$jasa = 0;
								if ($this->session->has_userdata('jum_jasa')) {
									$jasa = $this->session->userdata('jum_jasa');
								}
							 ?>
							<td><input disabled="" type="text" name="jmljasa" value="<?php echo $jasa ?>"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<?php if (empty($payed)): ?>
									<a href="<?php echo base_url("Servis/save") ?>">
									<button style="padding: 5px 15px; font-size: 15px;">Simpan</button>
									</a>
								<?php endif ?>
								<?php if (isset($payed)): ?>
									<a href="<?php echo base_url("Servis/done") ?>">
										<button style="padding: 5px 15px; font-size: 15px;">Selesai</button>
									</a>
									<a href="<?php echo base_url("PrintPdf/Servis/".$this->session->userdata("servis")->ID) ?>" target="_blank">
										<button style="padding: 5px 15px; font-size: 15px;">Cetak Bukti</button>
									</a>
								<?php endif ?>
							</td>
						</tr>
					</table>
				</div>

				<!-- Informasi jumlah bayar dan sisa bayar -->
				<div class="col-md-4 mt-4">
					<form action="<?php echo base_url("Servis/pay") ?>" method="GET">
					<table cellpadding="3px">
						<tr>
							<td style="font-size: 20px;">Total Bayar</td>
							<td>:</td>
							<?php
								$bayar = 0;
								if ($this->session->has_userdata('total_biaya')) {
									$bayar = $this->session->userdata('total_biaya');
								}
							 ?>
							<td><input disabled="" type="text" name="totalbiaya" value="<?php echo $bayar ?>" style="padding: 5px 0px; font-size: 21px; width: 193px;"></td>
						</tr>
						<tr>
							<td>Jumlah bayar</td>
							<td>:</td>
							<td><input type="text" name="jumlahbiaya"
								value=
								<?php 
								if ($this->session->has_userdata('jum_biaya')) {
									echo $this->session->userdata('jum_biaya');
								}
								 ?>
								>
							</td>
						</tr>
						<tr>
							<td>Sisa bayar</td>
							<td>:</td>
							<td><input disabled="" type="text" name="sisabiaya"
								value=
								<?php 
								if ($this->session->has_userdata('sisa_biaya')) {
									echo $this->session->userdata('sisa_biaya');
								}
								 ?>
								 >
								</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<?php if (empty($payed)): ?>
								<td><input type="submit" name="submit" value="Bayar"></td>									
							<?php endif ?>
						</tr>
					</table>
				</form>
				</div>
			</div>
			
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>