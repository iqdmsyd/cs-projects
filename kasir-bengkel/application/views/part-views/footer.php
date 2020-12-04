	<footer class="fixed-bottom mb-2">
		<div class="container" style="background-color: #DDDDDD; height: 182px;">
			<div class="row">
				<!-- New Beli | To Servis -->
				<div class="col-md-2 mt-4">
					<a href="<?php echo site_url('Servis') ?>">
						<button name="submit" style="padding: 5px 15px; font-size: 15px;">Transaksi Servis</button>
					</a>
				</div>
				<div class="col-md-2 mt-4">
					<a href="<?php echo site_url('Part/list') ?>">
						<button name="submit" style="padding: 5px 15px; font-size: 15px;">Riwayat Transaksi</button>
					</a>
				</div>
				
				<!-- Informasi jumlah pesanan dan jumlah beli -->
				<div class="col-md-4 mt-4">
					<table cellpadding="3px">
						<tr>
							<td>Jumlah Pesanan</td>
							<td>:</td>
							<?php
								$pesan = 0;
								if ($this->session->has_userdata('jum_pesan')) {
									$pesan = $this->session->userdata('jum_pesan');
								}
							 ?>
							<td><input disabled="" type="text" name="jmlhpesanan" value="<?php echo $pesan ?>"></td>
						</tr>
						<tr>
							<td>Jumlah Beli</td>
							<td>:</td>
							<?php
								$beli = 0;
								if ($this->session->has_userdata('jum_part')) {
									$beli = $this->session->userdata('jum_part');
								}
							 ?>
							<td><input disabled="" type="text" name="jmlhpesanan" value="<?php echo $beli ?>"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<?php if (empty($done)): ?>
									<a href="<?php echo base_url("Part/cancel") ?>">
										<button style="padding: 5px 15px; font-size: 15px;">Batal</button>
									</a>
								<?php endif ?>
								<?php if (isset($done)): ?>
									<a href="<?php echo base_url("Part/done") ?>">
										<button style="padding: 5px 15px; font-size: 15px;">Selesai</button>
									</a>
									<a href="<?php echo base_url("PrintPdf/Part/".$this->session->userdata('transaksi')->ID) ?>" target="_blank">
										<button style="padding: 5px 15px; font-size: 15px;">Cetak Bukti</button>
									</a>
								<?php endif ?>
							</td>
						</tr>
					</table>
				</div>

				<!-- Informasi total pembayaran dan sisa bayar -->
				<div class="col-md-4 mt-2">
					<form action="<?php echo base_url("Part/pay") ?>" method="GET">
					<table cellpadding="3px">
						<tr>
							<td style="font-size: 20px;">Total Bayar</td>
							<td>:</td>
							<?php
								$bayar = 0;
								if ($this->session->has_userdata('total_bayar')) {
									$bayar = $this->session->userdata('total_bayar');
								}
							 ?>
							<td><input disabled="" type="text" name="totalbayar" value="<?php echo $bayar ?>" style="padding: 5px 0px; font-size: 21px; width: 193px;"></td>
						</tr>
						<tr>
							<td>Jumlah bayar</td>
							<td>:</td>
							<td><input type="text" name="jumlahbayar"
								value=
								<?php 
								if ($this->session->has_userdata('jum_bayar')) {
									echo $this->session->userdata('jum_bayar');
								}
								 ?>
								>
							</td>
						</tr>
						<tr>
							<td>Sisa bayar</td>
							<td>:</td>
							<td><input disabled="" type="text" name="sisabayar"
								value=
								<?php 
								if ($this->session->has_userdata('sisa_bayar')) {
									echo $this->session->userdata('sisa_bayar');
								}
								 ?>
								 >
								</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<input type="submit" name="submit" value="Bayar">
							</td>
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