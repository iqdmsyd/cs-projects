    <div class="col-10">
    	<div class="row">
    		<div class="col-4">
    			<h5>Daftar referensi</h5>
    		</div>
    		<div class="col-2 ml-auto">
    			<a href="<?php echo base_url("Referensi/insert"); ?>">
    				<button class="btn btn-prim">Tambah Referensi</button>
    			</a>
    		</div>
    	</div>
    	<hr>
			
			<div class="row mb-3">
				<div class="col-4">
					<h5 class="text-prim">&bull; Referensi Tipe</h5>
					<table class="table table-bordered mb-3">
						<tr>
							<th>ID</th>
							<th>Tipe</th>
						</tr>
						<?php foreach ($this->session->userdata('tipe') as $value): ?>
							<tr>
								<td><?php echo $value['id'] ?></td>
								<td><?php echo $value['tipe'] ?></td>
							</tr>
						<?php endforeach ?>
					</table>		
				</div>

				<div class="col-4">
					<h5 class="text-prim">&bull; Referensi Tahun</h5>
					<table class="table table-bordered mb-3">
						<tr>
							<th>ID</th>
							<th>Tahun</th>
						</tr>
						<?php foreach ($this->session->userdata('tahun') as $value): ?>
							<tr>
								<td><?php echo $value['id'] ?></td>
								<td><?php echo $value['tahun'] ?></td>
							</tr>
						<?php endforeach ?>
					</table>		
				</div>
			</div>
			
			<div class="row">
				<div class="col-4">
					<h5 class="text-prim">&bull; Referensi Prosesor</h5>
					<table class="table table-bordered mb-3">
						<tr>
							<th>ID</th>
							<th>Prosesor</th>
						</tr>
						<?php foreach ($this->session->userdata('prosesor') as $value): ?>
							<tr>
								<td><?php echo $value['id'] ?></td>
								<td><?php echo $value['prosesor'] ?></td>
							</tr>
						<?php endforeach ?>
					</table>		
				</div>

				<div class="col-4">
					<h5 class="text-prim">&bull; Referensi RAM</h5>
					<table class="table table-bordered mb-3">
						<tr>
							<th>ID</th>
							<th>RAM</th>
						</tr>
						<?php foreach ($this->session->userdata('ram') as $value): ?>
							<tr>
								<td><?php echo $value['id'] ?></td>
								<td><?php echo $value['ram'] ?></td>
							</tr>
						<?php endforeach ?>
					</table>		
				</div>
			</div>
    </div>
  </div>
</div>
