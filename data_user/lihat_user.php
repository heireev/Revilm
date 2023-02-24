<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<?php
include '../db/koneksi.php';
?>

<div class="card">
	<div class="card-header">
		<h2 class="card-title"><b>
				<center>Anggota Komunitas (@VAnggotaRevilm)</center>
			</b></h2>
	</div>

	<div class="card-body">
		<table class="table table-striped table-bordered table-hover" id="shortTable">
			<thead class="utama text-center bg-primary text-white">
				<th>
					<center>No.</center>
				</th>
				<th>
					<center>Nama</center>
				</th>
				<th>
					<center>Email</center>
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
							<?php echo $row['nama_user']; ?>
						</center>
					</td>
					<td>
						<Center>
							<?php echo $row['email_user']; ?>
						</center>
					</td>
					<?php $no++ ?>
				</tr>

				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="card-footer text-muted">
		<center><i>Revilm</i></center>
	</div>

</div>

<script>
	$(document).ready(function () {
		$('#shortTable').DataTable();
	})
</script>