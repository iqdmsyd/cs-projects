			<div class="col-10">
				<div class="row">
					<div class="col-4">
						<h4>Daftar Berita</h4>
						<?php if (isset($success)): ?>
							<p style="color: #3AAFA9"><?php echo $success ?></p>
						<?php endif ?>
						<?php if (isset($failed)): ?>
							<p style="color: red"><?php echo $failed ?></p>
						<?php endif ?>
					</div>
					<div class="col-2 ml-auto">
						<a href="<?php echo base_url("Admin/add"); ?>">
							<button class="btn btn-success ml-auto">+Tambah berita</button>
						</a>
					</div>
				</div>
				<form action="<?php echo base_url("Admin/filter"); ?>" method="GET">
				<div class="row my-3">
					<div class="col-1">
						Search By:
					</div>
					<div class="col-2">
						<select name="filter" class="form-control">
							<option value="judul">Judul</option>
							<option value="author">Author</option>
							<option value="kategori">Kategori</option>
						</select>
					</div>
					<div class="col-4">
						<input type="text" name="value" class="form-control" placeholder="Seach by title or author">
					</div>
					<div class="col-3">
						<select name="sort" class="form-control">
							<option value="#">Sort By</option>
							<option value="komentar-asc">Komentar Asc</option>
							<option value="komentar-desc">Komentar Desc</option>
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
							<th class="scope">Judul</th>
							<th class="scope">Author</th>
							<th class="scope">Tanggal</th>
							<th class="scope">Komentar</th>
							<th class="scope">Kategori</th>
							<th class="scope">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; ?>
						<?php foreach ($listberita as $berita): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $berita->judul ?></td>
								<td><?php echo $berita->author ?></td>
								<td><?php echo $berita->tanggal ?></td>
								<td><?php echo $berita->komentar ?></td>
								<td><?php echo $berita->kategori ?></td>
								<td>
									<a href="<?php echo base_url("Admin/update/".$berita->id) ?>"><button class="btn btn-info form-control">Edit</button></a>
									<a href="<?php echo base_url("Admin/delete/".$berita->id) ?>"><button class="btn btn-danger form-control">Delete</button></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>