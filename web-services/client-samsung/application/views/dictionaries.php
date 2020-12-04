		<div class="col-10">
			<h5>Dictionaries</h5>
			<hr>

			<form action="<?php echo base_url("Dictionary"); ?>" method="GET">
				<div class="row mb-3">
					<div class="col-4">
						<select name="table" class="form-control">
							<option value="None" selected hidden>Pilih tabel</option>
							<option value="Barang">Barang</option>
							<option value="DetilBarang">Detil Barang</option>
							<option value="Transaksi">Transaksi</option>
							<option value="DetilTransaksi">Detil Transaksi</option>
						</select>
					</div>
					<div class="col-2">
						<input type="submit" name="submit" value="Submit" class="form-control btn btn-prim">
					</div>
				</div>
			</form>
			
			<?php if (isset($dictionaries)): ?>
				<h5 class="text-prim">Tabel <?php echo $table ?></h5>
				<table class="table table-bordered mt-2">
					<tr>
						<th>Name</th>
						<th>Key</th>
						<th>Type</th>
						<th>Is Nullable</th>
					</tr>
					<?php foreach ($dictionaries as $dictionary): ?>
						<tr>
							<td><?php echo $dictionary->name ?></td>
							<td><?php echo $dictionary->key ?></td>
							<td><?php echo $dictionary->type ?></td>
							<td><?php echo $dictionary->isNullable ?></td>
						</tr>
					<?php endforeach ?>
				</table>
			<?php endif ?>
		</div>
	</div>
</div>