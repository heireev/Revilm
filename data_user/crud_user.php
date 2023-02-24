<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<div class="card">
	<div class="card-header">
		<h2 class="card-title"><b>
				<center>Data User (@AdminRevilm)</center>
			</b></h2>
	</div>

	<div class="card-body">
		<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#SaveUser"><b>Tambah
				User</b></button>
		<br><br>

		<table class="table table-striped table-bordered table-hover" id="shortTable">
			<thead class="utama text-center text-white">
				<th>
					<center>No.</center>
				</th>
				<th>
					<center>ID</center>
				</th>
				<th>
					<center>Nama</center>
				</th>
				<th>
					<center>Email</center>
				</th>
				<th>
					<center>Role</center>
				</th>
				<th>
					<center>Password</center>
				</th>
				<th>
					<center>Aksi</center>
				</th>
			</thead>
			<tbody>
				<?php
				include '../db/koneksi.php';

				$no = 1;
				$query = mysqli_query($koneksi, "select * from tbl_user");
				while ($row = mysqli_fetch_array($query)) {
				?>
					<tr>
						<td>
							<Center>
								<?php echo $no ?>
							</center>
						</td>
						<td>
							<Center>
								<?php echo $row['id_user']; ?>
							</center>
						</td>
						<td>
							<Center>
								<?php echo $row['nama_user']; ?>
							</center>
						</td>
						<td>
							<Center>
								<?php echo $row['email_user']; ?>
							</center>
						</td>
						<td>
							<Center>
								<?php echo $row['role']; ?>
							</center>
						</td>
						<td>
							<Center>
								<?php echo $row['pass_user']; ?>
							</center>
						</td>
						<?php $no++ ?>
						<td>
							<Center>
								<button type="button" name="edit" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#EditUser<?php echo $row['id_user']; ?>">Edit</button>

								<button type="button" name="hapus" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#HapusUser<?php echo $row['id_user']; ?>">Hapus</button>
							</center>

							<!--Modal edit-->
							<div class="modal fade" id="EditUser<?php echo $row['id_user']; ?>">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Edit User</h5>
											<button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="data_user/edit_user.php" method="post" role="form">
											<div class="modal-body">
												<div class="form-group">
													<label>ID User</label>
													<input type="text" name="idU" class="form-control" value="<?php echo $row['id_user']; ?>" readonly>
												</div>
												<div class="form-group">
													<label>Nama</label>
													<input type="text" name="namaU" class="form-control" value="<?php echo $row['nama_user']; ?>">
												</div>
												<div class="form-group">
													<label>Email</label>
													<input type="text" name="emailU" class="form-control" value="<?php echo $row['email_user']; ?>">
												</div>
												<div class="form-group">
													<label>Role</label>
													<select class="form-control" name="roleU">
														<option <?php if ($row['role'] == "Anggota") {
																	echo "selected=''";
																}
																?>>Anggota</option>
														<option <?php if ($row['role'] == "Admin") {
																	echo "selected=''";
																} ?>>Admin</option>
													</select>
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="text" name="passU" class="form-control" value="<?php echo $row['pass_user']; ?>">
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary">Update</button>
												<button type="button" class="btn btn-default" data-bs-dismiss="modal">Keluar</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<!--Modal hapus-->
							<div class="modal fade" id="HapusUser<?php echo $row['id_user']; ?>">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Hapus User</h5>
											<button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="data_user/hapus_user.php" method="post" role="form">
											<div class="modal-body">
												<input type="hidden" name="idU" class="form-control" value="<?php echo $row['id_user']; ?>">
												<center>
													<h4>Yakin data ini akan dihapus?</h4>
												</center>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary">Ya</button>
												<button type="button" class="btn btn-default" data-bs-dismiss="modal">Tidak</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>
</div>
<div class="card-footer text-muted">
	<center><i>Revilm</i></center>
</div>

<!-- Modal Tambah User -->
<div class="modal fade" id="SaveUser">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Data</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="data_user/simpan_user.php" method="post" role="form">
				<div class="modal-body">
					<div class="form-group">
						<label>Nama User</label>
						<input type="text" name="namaU" class="form-control">
					</div>
					<div class="form-group">
						<label>Email User</label>
						<input type="text" name="emailU" class="form-control">
					</div>
					<div class="form-group">
						<label>Status User</label>
						<select class="form-control" name="roleU">
							<option value="" selected> - Pilih Status - </option>
							<option value="Admin">Admin</option>
							<option value="Anggota">Anggota</option>
						</select>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="text" name="passU" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Tambah User</button>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>

<style>
	.utama {
		background-image: linear-gradient(to right, #1E90FF, #1E90FF);
	}
</style>
<script>
	$(document).ready(function() {
		$('#shortTable').DataTable();
	})
</script>