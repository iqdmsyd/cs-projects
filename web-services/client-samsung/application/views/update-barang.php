<div class="col-10">
      <h5>Update barang</h5>
      <hr>

			<?php if (isset($response)): ?>
				<p class="text-prim"><?php echo $response ?></p>
			<?php endif ?>

      <form action="<?php echo base_url("Barang/update/".$barang->id) ?>" class="mt-4" method="POST">       
        <div class="form-group row">
          <label for="" class="col-2 col-form-label">Nama barang </label>
          <div class="col-10">
            <input class="form-control" type="text" name="nama" value="<?php echo $barang->namaBarang ?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-2 col-form-label">Tipe </label>
          <div class="col-2">
            <select name="tipe" class="form-control">
            	<option value="<?php echo $barang->tipe ?>" selected hidden><?php echo $barang->tipe ?></option>
            	<?php foreach ($this->session->userdata('tipe') as $value): ?>
              	<option value="<?php echo $value['tipe'] ?>"><?php echo $value['tipe'] ?></option>
            	<?php endforeach ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-2 col-form-label">Prosesor </label>
          <div class="col-3">
            <select name="prosesor" class="form-control">
            	<option value="<?php echo $barang->prosesor ?>" selected hidden><?php echo $barang->prosesor ?></option>
							<?php foreach ($this->session->userdata('prosesor') as $value): ?>
              	<option value="<?php echo $value['prosesor'] ?>"><?php echo $value['prosesor'] ?></option>
            	<?php endforeach ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-2 col-form-label">Ram </label>
          <div class="col-2">
            <select name="ram" class="form-control">
            	<option value="<?php echo $barang->ram ?>" selected hidden><?php echo $barang->ram ?></option>
							<?php foreach ($this->session->userdata('ram') as $value): ?>
              	<option value="<?php echo $value['ram'] ?>"><?php echo $value['ram'] ?></option>
            	<?php endforeach ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-2 col-form-label">Tahun </label>
          <div class="col-2">
            <select name="tahun" class="form-control">
            	<option value="<?php echo $barang->tahun ?>" selected hidden><?php echo $barang->tahun ?></option>
							<?php foreach ($this->session->userdata('tahun') as $value): ?>
              	<option value="<?php echo $value['tahun'] ?>"><?php echo $value['tahun'] ?></option>
            	<?php endforeach ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-2 col-form-label">Deskripsi </label>
          <div class="col-10">
            <textarea class="form-control" name="deskripsi" cols="30" rows="6"><?php echo $barang->deskripsi ?></textarea>
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-2 col-form-label">Harga jual </label>
          <div class="col-4">
            <input class="form-control" type="text" name="harga" value="<?php echo $barang->hargaJual ?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="" class="col-2 col-form-label">Gambar </label>
          <div class="col-4">
            <!-- <input class="form-control" type="file" name="gambar"> -->
            <input class="form-control" type="text" name="gambar" value="<?php echo $barang->imgUrl ?>">
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