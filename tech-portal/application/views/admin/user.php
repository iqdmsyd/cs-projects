			<div class="col-10">
				<h4>Daftar User</h4>
				<?php if (isset($success)): ?>
					<p style="color: #3AAFA9"><?php echo $success ?></p>
				<?php endif ?>
				<?php if (isset($failed)): ?>
					<p style="color: red"><?php echo $failed ?></p>
				<?php endif ?>
				<table class="table">
					<thead>
						<tr>
							<th class="scope">No</th>
							<th class="scope">Username</th>
							<th class="scope">Email</th>
							<th class="scope">Password</th>
							<th class="scope">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; ?>
						<?php foreach ($listuser as $user): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $user->username ?></td>
								<td><?php echo $user->email ?></td>
								<td><?php echo $user->password ?></td>
								<td>
									<a href="<?php echo base_url("Admin/deleteUser/".$user->id) ?>">
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