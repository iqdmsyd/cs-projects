    <div class="col-10">
      <h5>Tambah Referensi</h5>
      <hr>

      <?php if (isset($pesan)): ?>
        <p class="text-prim"><?php echo $pesan ?></p>
      <?php endif ?>
      
      <form action="<?php echo base_url("Referensi/insert"); ?>" class="mt-4" method="POST">
        <div class="form-group row">
          <div class="col-2">
            <select name="Ref" class="form-control">
              <option value="" hidden disabled selected>Referensi</option>
              <option value="Tipe">Tipe</option>
              <option value="Tahun">Tahun</option>
              <option value="Ram">Ram</option>
              <option value="Processor">Processor</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-2 col-form-label">Input Referensi</label>
          <div class="col-4">
            <input class="form-control" type="text" name="inputRef" value="">
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
