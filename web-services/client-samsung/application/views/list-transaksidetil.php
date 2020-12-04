    <div class="col-10">
			<h5>Detil transaksi</h5>
			<hr>

			<table cellpadding="6px">
				<tr>
					<td>ID</td>
					<td>:</td>
					<td><?php echo $transaksi->id ?></td>
				</tr>
				<tr>
					<td>ID Grosir</td>
					<td>:</td>
					<td><?php echo $transaksi->iD_Grosir ?></td>
				</tr>
				<tr>
					<td>Tanggal Transaksi</td>
					<td>:</td>
					<td><?php echo $transaksi->tanggalTransaksi ?></td>
				</tr>
				<tr>
					<td>Kuantitas</td>
					<td>:</td>
					<td><?php echo $transaksi->qty ?></td>
				</tr>
				<tr>
					<td>Total bayar</td>
					<td>:</td>
					<td>Rp. <?php echo $transaksi->totalBayar ?></td>
				</tr>
			</table>
			
      <table class="table table-bordered mt-2">
        <tr>
          <th style="width: 5px">No</th>
          <th>ID Barang</th>
          <th>No Seri</th>
          <th>Harga Jual</th>
        </tr>
        <?php $no=1; ?>
        <?php foreach ($listdetil as $transaksi): ?>
	        <tr>
	          <td><?php echo $no++ ?></td>
	          <td><?php echo $transaksi->iD_Barang ?></td>
	          <td><?php echo $transaksi->noSeri ?></td>
	          <td>Rp. <?php echo $transaksi->hargaJual ?></td>
	        </tr>
        <?php endforeach ?>
      </table>
    </div>
  </div>
</div>
