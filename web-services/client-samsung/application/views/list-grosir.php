    <div class="col-10">
    	<h5>Daftar grosir</h5>
    	<hr>
		
      <table class="table table-bordered mt-2">
        <tr>
          <th style="width: 5px">No</th>
          <th>ID</th>
          <th>Nama Grosir</th>
          <th>Alamat</th>
          <th>Nama Pemilik</th>
          <th>Email</th>
          <th>No Telp</th>
          <th>Riwayat transaksi</th>
        </tr>
        <?php $no=1; ?>
        <?php foreach ($listgrosir as $grosir): ?>
	        <tr>
	          <td class="tab-prim"><?php echo $no++ ?></td>
	          <td class="tab-prim"><?php echo $grosir->id ?></td>
	          <td class="tab-prim"><?php echo $grosir->namaGrosir ?></td>
	          <td class="tab-prim"><?php echo $grosir->alamat ?></td>
	          <td class="tab-prim"><?php echo $grosir->namaPemilik ?></td>
	          <td class="tab-prim"><?php echo $grosir->email ?></td>
	          <td class="tab-prim"><?php echo $grosir->noTelp ?></td>
	          <td style="width: 100px">
							<a href=" <?php echo(base_url("Transaksi/getByIDGrosir/".$grosir->id)); ?> ">Lihat riwayat transaksi</a>
	          </td>
	        </tr>
        <?php endforeach ?>
      </table>
    </div>
  </div>
</div>
