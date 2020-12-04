    <div class="col-10">
    	<h5>Daftar riwayat transaksi</h5>
    	<hr>
		
      <?php if (isset($grosir)): ?>
				<table cellpadding="6px">
					<tr>
						<td>ID Grosir</td>
						<td>:</td>
						<td><?php echo $transaksi->id ?></td>
					</tr>
					<tr>
						<td>Nama Grosir</td>
						<td>:</td>
						<td><?php echo $transaksi->namaGrosir ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?php echo $transaksi->alamat ?></td>
					</tr>
					<tr>
						<td>Nama Pemilik</td>
						<td>:</td>
						<td><?php echo $transaksi->namaPemilik ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td>Rp. <?php echo $transaksi->email ?></td>
					</tr>
					<tr>
						<td>No Telp</td>
						<td>:</td>
						<td>Rp. <?php echo $transaksi->noTelp ?></td>
					</tr>
				</table>
      <?php endif ?>

      <form action="<?php echo base_url("Transaksi/filter") ?>">
      	<div class="row">
      		<div class="col-2">
      			<input type="text" name="id" class="form-control" placeholder="ID Transaksi" autofocus>
      		</div>
      		<div class="col-4">
      			<select name="order" class="form-control">
      				<?php if (isset($order)){ ?>
								<option value="<?php echo $order ?>" hidden selected><?php echo $order ?></option>
							<?php }else { ?>
								<option value="None" hidden selected>Urut berdasarkan</option>
							<?php } ?>
							<option value="Termurah">Termurah</option>
							<option value="Termahal">Termahal</option>
							<option value="Terbaru">Terbaru</option>
							<option value="Terlama">Terlama</option>
							<option value="Terbanyak">Terbanyak</option>
							<option value="Tersedikit">Tersedikit</option>
      			</select>
      		</div>
      		<div class="col-2">
      			<input type="submit" name="submit" class="form-control btn btn-prim" value="Submit">
      		</div>
      	</div>
      </form>
      
      <table class="table table-bordered mt-2">
        <tr>
          <th style="width: 5px">No</th>
          <th>ID Grosir</th>
          <th>Tanggal Transaksi</th>
          <th>Kuantitas</th>
          <th>Total Bayar</th>
          <th></th>
        </tr>
        <?php $no=1; ?>
        <?php if (isset($listtransaksi)): ?>
	        <?php foreach ($listtransaksi as $transaksi): ?>
		        <tr>
		          <td><?php echo $no++ ?></td>
		          <td><?php echo $transaksi->iD_Grosir ?></td>
		          <td><?php echo $transaksi->tanggalTransaksi ?></td>
		          <td><?php echo $transaksi->qty ?></td>
		          <td>Rp. <?php echo $transaksi->totalBayar ?></td>
		          <td style="width: 100px">
								<a href=" <?php echo(base_url("Transaksi/detilByID/".$transaksi->id)); ?> ">Lihat detil</a>
		          </td>
		        </tr>
	        <?php endforeach ?>
        <?php endif ?>
      </table>

      <?php if (isset($pesan)): ?>
      	<p class="text-prim"><?php echo $pesan ?></p>
      <?php endif ?>
    </div>
  </div>
</div>
