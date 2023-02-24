<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<div class="container">
	<div class="col-12">
		<br>

		<div class="card">

			<div class="card-header">
				<h2 class="card-title"><b>
						<center>Buku Tamu (@VisitorRevilm)</center>
					</b></h2>
			</div>

			<div class="card-body">
				<table class="table table-striped table-bordered table-hover" id="shortData">
					<thead class="utama text-center text-white">
						<th>
							<center>No.</center>
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
					</thead>
					<tbody>
						<?php
                        include '../db/koneksi.php';

                        $no = 1;
                        $query = mysqli_query($koneksi, "select * from tbl_buku_tamu");
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
							<?php $no++ ?>
						</tr>

						<?php } ?>
					</tbody>
				</table>
				<br>
				<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
					data-bs-target="#ModalTamuA"><b>Rekam Kunjungan</b></button>
			</div>
			<div class="card-footer text-muted">
				<center><i>Revilm</i></center>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="ModalTamuA">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Input Data</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="data_tamu/simpan_tamu-guest.php" method="post" role="form">
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
					<button type="submit" class="btn btn-primary">Rekam Data</button>
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
	$(document).ready(function () {
		$('#shortData').DataTable();
	})
</script>