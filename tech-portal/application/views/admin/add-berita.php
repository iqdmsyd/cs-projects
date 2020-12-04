			<div class="col-10">
				<?php if (isset($success)): ?>
					<p style="color: #3AAFA9"><?php echo $success ?></p>
				<?php endif ?>
				<?php if (isset($failed)): ?>
					<p style="color: red"><?php echo $failed ?></p>
				<?php endif ?>
				<h4>Tambah berita baru</h4>
				<?php echo form_open_multipart("Admin/add"); ?>
					<div class="form-group">
						<label for="judul">Judul Berita</label>
						<input id="judul" type="text" class="col-8 form-control" name="judul" value="" required autofocus>
					</div>

					<div class="form-group">
						<label for="author">Author</label>
						<input id="author" type="text" class="col-8 form-control" name="author" value="" required>
					</div>

					<div class="form-group">
						<label for="kategori">Kategori</label>
						<select name="kategori" id="kategori" class="col-3 form-control" required>
							<option value="smartphone" class="form-control">Smartphone</option>
							<option value="computer" class="form-control">Computer</option>
							<option value="camera" class="form-control">Camera</option>
							<option value="programming" class="form-control">Programming</option>
						</select>
					</div>

					<div class="form-group">
						<label for="tanggal">Tanggal</label>
						<input id="tanggal" type="date" class="col-3 form-control" name="tanggal" value="" required>
					</div>

					<div class="form-group">
						<label for="img">Gambar</label>
						<input id="img" type="file" class="col-3 form-control" name="img" value="">
					</div>

					<div class="form-group">
						<label for="tags">Tags</label>
						<input id="tags" type="text" class="col-6 form-control" name="tags" value="" required>
					</div>

					<div class="form-group">
						<label for="teks">Teks Berita</label>
						<textarea name="teks" id="teks" cols="30" rows="10" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-success col-2 form-control">
					</div>
				</form>
				
		
			</div>
		</div>
	</div>