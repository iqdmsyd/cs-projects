    <div class="col-10">
      <h5><?php echo $barang->namaBarang ?></h5>
      <hr>
      
      <div class="row">
      	<div class="col-3">
      		<img src="<?php echo $barang->imgUrl ?>">
      		<?php $str_num = number_format( $barang->hargaJual, 0, '.', '.' ); ?>
      		<h4><b>Rp. <?php echo $str_num ?></b></h4>
      	</div>

      	<div class="col-6">
      		<table cellpadding="10px">
      			<tr>
	      			<td>Release</td>
	      			<td>:<span class="mx-1"></span> <?php echo $barang->tahun ?></td>
      			</tr>
      			<tr>
	      			<td>Prosesor</td>
	      			<td>:<span class="mx-1"></span> <?php echo $barang->prosesor ?></td>
      			</tr>
      			<tr>
	      			<td>RAM</td>
	      			<td>:<span class="mx-1"></span> <?php echo $barang->ram ?></td>
      			</tr>
      			<tr>
	      			<td>Stok</td>
	      			<td>:<span class="mx-1"></span> <?php echo $barang->stok ?></td>
      			</tr>
      			<tr>
	      			<td><b>Detail</b></td>
      			</tr>
      		</table>
	      			
					<textarea class="form-control" cols="30" rows="7" style="border: none"><?php echo $barang->deskripsi ?></textarea>		
      	</div>

      	<div class="col-3">
      		<div class="btn-group" role="group" aria-label="Basic example">
	          <a href=" <?php echo(base_url("Barang/update/".$barang->id)); ?> "><button class="btn btn-prim form-control mb-2">Edit</button></a>
	          <a href=" <?php echo(base_url("Barang/delete/".$barang->id)); ?> "><button class="btn btn-danger form-control">Delete</button></a>
	          <!-- <a href=" <?php echo(base_url("Barang/detail/".$barang->id)); ?> ">Edit</a>
	          <a href=" <?php echo(base_url("Barang/detail/".$barang->id)); ?> ">Delete</a> -->
					  <!-- <a href=" <?php echo(base_url("Barang/update/".$barang->id)); ?> "><button type="button" class="btn btn-secondary">Edit</button></a>
					  <a href=" <?php echo(base_url("Barang/delete/".$barang->id)); ?><button type="button" class="btn btn-danger">Delete</button></a> -->
					</div>
      	</div>
      </div>
    </div>
  </div>
</div>
