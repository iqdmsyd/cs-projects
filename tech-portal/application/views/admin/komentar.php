			<div class="col-10">
				<h4>Daftar Komentar</h4>
				<?php if (isset($success)): ?>
					<p style="color: #3AAFA9"><?php echo $success ?></p>
				<?php endif ?>
				<?php if (isset($failed)): ?>
					<p style="color: red"><?php echo $failed ?></p>
				<?php endif ?>

				<form action="<?php echo base_url("Admin/filterKomentar"); ?>" method="GET">
				<div class="row my-3">
					<div class="col-2">
						Search By ID Berita
					</div>
					<div class="col-5">
						<input type="text" name="id" class="form-control" placeholder="Seach by ID Berita">
					</div>
					<div class="col-3">
						<select name="sort" class="form-control">
							<option value="#">Sort By</option>
							<option value="terbaru">Terbaru</option>
							<option value="terlama">Terlama</option>
						</select>
					</div>
					<div class="col-2">
						<input type="submit" name="submit" class="form-control btn btn-info">
					</div>															
				</div>
				</form>

				<table class="table">
					<thead>
						<tr>
							<th class="scope">No</th>
							<th class="scope">ID Berita</th>
							<th class="scope">Username</th>
							<th class="scope">Komentar</th>
							<th class="scope">Waktu</th>
							<th class="scope">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; ?>
						<?php foreach ($listkomentar as $komentar): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $komentar->id_berita ?></td>
								<td><?php echo $komentar->username ?></td>
								<td><?php echo $komentar->komentar ?></td>
								<td><?php echo $komentar->waktu ?></td>
								<td>
									<a href="<?php echo base_url("Admin/deleteKomentar/".$komentar->id."/".$komentar->id_berita) ?>">
										<button class="btn btn-danger">Delete</button>
									</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>