    <div class="col-10">
    	<h5>List barang</h5>
    	<hr>

    	<?php if (isset($response)): ?>
				<p class="text-prim"><?php echo $response ?></p>
			<?php endif ?>

			<form action="<?php echo base_url("Barang/filter"); ?>" method="GET">
				
				<div class="row">
					<div class="col-2">
						<input class="form-control" type="text" name="id" placeholder="ID" value="<?php if(isset($id)){echo($id);} ?>" >
					</div>

					<div class="col-2">
						<select name="tipe" class="form-control">
							<?php if (isset($tipe)){ ?>
								<option value="<?php echo $tipe ?>" hidden selected><?php echo $tipe ?></option>
							<?php }else { ?>
								<option value="None" hidden selected>Tipe</option>
							<?php } ?>

							<?php foreach ($this->session->userdata('tipe') as $value): ?>
								<option value="<?php echo $value['tipe'] ?>"><?php echo $value['tipe'] ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="col-2">
						<select name="ram" class="form-control">
							<?php if (isset($ram)){ ?>
								<option value="<?php echo $ram ?>" hidden selected><?php echo $ram ?></option>
							<?php }else { ?>
								<option value="None" hidden selected>Ram</option>
							<?php } ?>

							<?php foreach ($this->session->userdata('ram') as $value): ?>
								<option value="<?php echo $value['ram'] ?>"><?php echo $value['ram'] ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="col-2">
						<select name="tahun" class="form-control">
							<?php if (isset($tahun)){ ?>
								<option value="<?php echo $tahun ?>" hidden selected><?php echo $tahun ?></option>
							<?php }else { ?>
								<option value="None" hidden selected>Tahun</option>
							<?php } ?>

							<?php foreach ($this->session->userdata('tahun') as $value): ?>
								<option value="<?php echo $value['tahun'] ?>"><?php echo $value['tahun'] ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="col-3">
						<select name="prosesor" class="form-control">
							<?php if (isset($prosesor)){ ?>
								<option value="<?php echo $prosesor ?>" hidden selected><?php echo $prosesor ?></option>
							<?php }else { ?>
								<option value="None" hidden selected>Prosesor</option>
							<?php } ?>

							<?php foreach ($this->session->userdata('prosesor') as $value): ?>
								<option value="<?php echo $value['prosesor'] ?>"><?php echo $value['prosesor'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>

				<div class="row my-2">
					<div class="col-2">
						<input type="text" name="stok-min" class="form-control" value="<?php if(isset($stokmin)){echo($stokmin);} ?>" placeholder="Stok min.." >
					</div>
					<div class="col-2">
						<input type="text" name="stok-max" class="form-control" value="<?php if(isset($stokmax)){echo($stokmax);} ?>" placeholder="Stok max.." >
					</div>
					<div class="col-2">
						<input type="text" name="harga-min" class="form-control" value="<?php if(isset($hargamin)){echo($hargamin);} ?>" placeholder="Harga min.." >
					</div>
					<div class="col-2">
						<input type="text" name="harga-max" class="form-control" value="<?php if(isset($hargamax)){echo($hargamax);} ?>" placeholder="Harga max.." >
					</div>
					<div class="col-3">
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
				</div>

				<div class="row mb-2">
					<div class="col-6">
						<input type="text" value="<?php if(isset($nama)){echo($nama);} ?>" name="nama" class="form-control" placeholder="Nama barang.." autofocus>
					</div>
					<div class="col-2">
						<a href="<?php echo base_url("Barang/filter"); ?>">
							<button class="btn btn-danger form-control">Clear</button>
						</a>
					</div>
					<div class="col-3">
						<input type="submit" name="submit" class="form-control btn btn-prim" value="Search">
					</div>
				</div>

			</form>
			
      <table class="table table-bordered table-responsive mt-2">
        <tr>
          <th style="width: 5px" class="tab-prim">No</th>
          <th class="tab-prim">Nama Barang</th>
          <th class="tab-prim">Prosesor</th>
          <th class="tab-prim">Ram</th>
          <th class="tab-prim">Tahun</th>
          <th class="tab-prim">Stok</th>
          <!-- <th class="tab-prim">Gambar</th> -->
          <!-- <th class="tab-prim">Deskripsi</th> -->
          <th class="tab-prim">Harga</th>
          <th></th>
        </tr>
        <?php $no=1; ?>
        <?php if (isset($listbarang)): ?>
	        <?php foreach ($listbarang as $barang): ?>
		        <tr style="width: 100%">
		          <td class="tab-prim"><?php echo $no++ ?></td>
		          <td class="tab-prim" style="width: 240px"><?php echo $barang->namaBarang; ?></td>
		          <td class="tab-prim" style="width: 240px"><?php echo $barang->prosesor; ?></td>
		          <td class="tab-prim" style="width: 40px"><?php echo $barang->ram ?></td>
		          <td class="tab-prim" style="width: 30px"><?php echo $barang->tahun ?></td>
		          <!-- <td class="tab-prim" style="width: 200px"><img src="<?php echo $barang->imgUrl ?>" alt="<?php echo $barang->namaBarang ?>" class="w-80 img-fluid"></td> -->
		          <!-- <td class="tab-prim" style="width: 50px"><?php echo $barang->deskripsi ?></td> -->
		          <td class="tab-prim" style="width: 20px"><?php echo $barang->stok ?></td>
		          <?php $str_num = number_format( $barang->hargaJual, 0, '.', '.' ); ?>
		          <td class="tab-prim" style="width: 150px">Rp. <?php echo $str_num ?></td>
		          <td class="tab-prim" style="width: 50px">
		            <div class="btn-group" role="group" aria-label="Basic example">
			            <!-- <a href=" <?php echo(base_url("Barang/update/".$barang->id)); ?> "><button class="btn btn-prim form-control mb-2">Detail</button></a>
			            <a href=" <?php echo(base_url("Barang/update/".$barang->id)); ?> "><button class="btn btn-prim form-control mb-2">Edit</button></a>
			            <a href=" <?php echo(base_url("Barang/delete/".$barang->id)); ?> "><button class="btn btn-danger form-control">Delete</button></a> -->
		              <a href=" <?php echo(base_url("Barang/detail/".$barang->id)); ?> ">Detail</a>
								  <!-- <a href=" <?php echo(base_url("Barang/update/".$barang->id)); ?> "><button type="button" class="btn btn-secondary">Edit</button></a>
								  <a href=" <?php echo(base_url("Barang/delete/".$barang->id)); ?><button type="button" class="btn btn-danger">Delete</button></a> -->
								</div>
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
