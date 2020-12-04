    <div class="col-10">
    	<h5>Stok barang</h5>
    	<hr>

      <form action="<?php echo(base_url("Barang/stok")); ?>" method="GET">
        <div class="row">
          <div class="col-4">
            <select name="id" class="form-control">
            	<option value="" selected disabled hidden>
            		<?php if (isset($barang)) { ?>
            			<?php echo $barang->namaBarang ?>
            		<?php } else { ?>
            			Pilih barang di sini
            		<?php } ?>
            	</option>

							<?php foreach ($listbarang as $barang): ?>
								<option value="<?php echo $barang->id ?>">
									<?php echo $barang->namaBarang ?>
								</option>
							<?php endforeach ?>
            </select> 
          </div>
          <div class="col-2">
          	<input type="text" name="stok" value="Total : <?php echo $total ?>" class="form-control" disabled>
          </div>
          <div class="col-2">
            <input type="submit" name="submit" class="form-control btn btn-prim" value="Lihat stok">
          </div>
        </div>
      </form>
			
			<div class="row">
				<div class="col-8">
		      <table class="table table-bordered mt-2">
		        <tr>
		          <th style="width: 5px">No</th>
		          <th>ID Barang</th>
		          <th>No Seri</th>
		        </tr>
		        <?php $no=1; ?>
		        <?php if (isset($liststok)): ?>
			        <?php foreach ($liststok as $stok): ?>
				        <tr>
				          <td style="width: 25px"><?php echo $no++ ?></td>
				          <td style="width: 50px"><?php echo $stok->iD_Barang ?></td>
				          <td style="width: 200px"><?php echo $stok->noSeri ?></td>
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
  </div>
</div>
