<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>


<div class="card">
	<div class="card-header">
		<h2 class="card-title"><b>
				<center>Data Tamu (@AdminRevilm)</center>
			</b></h2>
	</div>

	<div class="card-body">
		<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
			data-bs-target="#rekamModal"><b>Tambah Data</b></button>
		<br><br>

		<table class="table table-striped table-bordered table-hover" id="shortTable">
			<thead class="utama text-center text-white">
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
					<center>Asal</center>
				</th>
				<th>
					<center>Kesan Pesan</center>
				</th>
				<th>
					<center>Aksi</center>
				</th>
			</thead>
			<tbody>
				<?php
                include '../db/koneksi.php';

                $query = mysqli_query($koneksi, "select * from tbl_buku_tamu");
                while ($row = mysqli_fetch_array($query)) {
                ?>
				<tr>
					<td>
						<Center>
							<?php echo $row['id_tamu']; ?>
						</center>
					</td>
					<td>
						<Center>
							<?php echo $row['nama_tamu']; ?>
						</center>
					</td>
					<td>
						<Center>
							<?php echo $row['email_tamu']; ?>
						</center>
					</td>
					<td>
						<Center>
							<?php echo $row['asal_tamu']; ?>
						</center>
					</td>
					<td>
						<?php echo $row['kesan_pesan']; ?>
					</td>
					<td>
						<center>
							<button type="button" name="edit" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
								data-bs-target="#ModalEditData<?php echo $row['id_tamu']; ?>">Edit</button>



							<button type="button" name="hapus" class="btn btn-danger btn-sm" data-bs-toggle="modal"
								data-bs-target="#ModalHapusData<?php echo $row['id_tamu']; ?>">Hapus</button>
						</center>

						<!-- Modal edit -->
						<div class="modal fade" id="ModalEditData<?php echo $row['id_tamu']; ?>">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Edit Data</h5>
											<button type="button" class="close" data-bs-dismiss="modal"
												aria-label="close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="data_tamu/edit_tamu.php" method="post" role="form">
											<div class="modal-body">
												<div class="form-group">
													<label>ID Pengunjung</label>
													<input type="text" name="idT" class="form-control"
														value="<?php echo $row['id_tamu']; ?>" readonly>
												</div>
												<div class="form-group">
													<label>Nama</label>
													<input type="text" name="namaT" class="form-control"
														value="<?php echo $row['nama_tamu']; ?>">
												</div>
												<div class="form-group">
													<label>Email</label>
													<input type="text" name="emailT" class="form-control"
														value="<?php echo $row['email_tamu']; ?>">
												</div>
												<div class="form-group">
													<label>Asal</label>
													<input type="text" name="asalT" class="form-control"
														value="<?php echo $row['asal_tamu']; ?>">
												</div>
												<div class="form-group">
													<label>Kesan & Pesan</label>
													<textarea name="kepesT" class="form-control" cols="30"
														rows="6"><?php echo $row['kesan_pesan']; ?></textarea>
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary">Update</button>
												<button type="button" class="btn btn-default"
													data-bs-dismiss="modal">Keluar</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<!--Modal hapus-->
							<div class="modal fade" id="ModalHapusData<?php echo $row['id_tamu']; ?>">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Hapus Data</h5>
											<button type="button" class="close" data-bs-dismiss="modal"
												aria-label="close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="data_tamu/hapus_tamu.php" method="post" role="form">
											<div class="modal-body">
												<input type="hidden" name="idT" class="form-control"
													value="<?php echo $row['id_tamu']; ?>">
												<center>
													<h4>Yakin data ini akan dihapus?</h4>
												</center>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary">Ya</button>
												<button type="button" class="btn btn-default"
													data-bs-dismiss="modal">Tidak</button>
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

	<div class="card-footer text-muted">
		<center><i>Revilm</i></center>
	</div>
</div>

<!-- Modal Rekam -->
<div class="modal fade" id="rekamModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Input Data</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="data_tamu/simpan_tamu.php" method="post" role="form">
				<div class="modal-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="namaT" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="emailT" class="form-control">
					</div>
					<div class="form-group">
						<label>Asal</label>
						<input type="text" name="asalT" class="form-control">
					</div>
					<div class="form-group">
						<label>Kesan & Pesan</label>
						<textarea class="form-control" name="kepesT"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Tambah Data</button>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<style>
	.utama {
		background-image: linear-gradient(to right, #1E90FF, #1E90FF);
	}
</style>
<script>
	$(document).ready(function () {
		$('#shortTable').DataTable();
	})
</script>