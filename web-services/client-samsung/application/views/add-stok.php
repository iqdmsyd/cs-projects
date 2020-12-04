    <div class="col-10">
      <h5>Input stok baru</h5>
      <hr>

			<?php if (isset($response)): ?>
				<p class="text-prim">
					<?php echo $response ?>
				</p>
			<?php endif ?>

      <form action="<?php echo base_url("Barang/addStok"); ?>" class="mt-4" method="POST">       
        <div class="form-group row">
          <label for="" class="col-2 col-form-label">Nama barang </label>
          <div class="col-4">
            <select name="id" class="form-control">
							<?php foreach ($listbarang as $barang): ?>
								<option value="<?php echo($barang->id) ?>">
									<?php echo $barang->namaBarang ?>
								</option>
							<?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-2 col-form-label">Nomor seri </label>
          <div class="col-4">
            <input class="form-control" type="text" name="no-seri">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-2 offset-2">
            <input class="form-control btn btn-prim" type="submit" name="submit" value="Submit">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
