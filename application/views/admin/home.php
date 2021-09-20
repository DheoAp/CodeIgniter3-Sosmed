<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">Dashboard</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active">Dashboard</li>
			</ol>
			<div class="row">
				<div class="col-xl-3 col-md-6">
					<div class="card bg-primary text-white mb-4">
						<div class="card-body">Primary Card</div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="#">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table mr-1"></i>
					User
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Email</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach( $user as $user ): ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $user->nama_lengkap; ?></td>
									<td><?= $user->username; ?></td>
									<td><?= $user->email; ?></td>
									
									<td>
										<div class="btn-group d-flex justify-content-center px-3" role="group">
											<a href="<?= base_url('detail/'.$user->id_user);?>" title="Info Akun" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i> Info</a>

											<a onclick="return confirm('YAKIN MAU HAPUS AKUN?');" href="<?= base_url('admin/home/HapusAkun/'.$user->id_user);?>" title="Info Akun" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
										</div>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer class="py-4 bg-light mt-auto">
		<div class="container-fluid">
			<div class="d-flex align-items-center justify-content-between small">
				<div class="text-muted">Copyright &copy; Dheo Apriansyah <?= date('Y');?></div>
				<div>
				Icons made by <a target="_blank" href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> |
					<a href="#">Privacy Policy</a>
					&middot;
					<a href="#">Terms &amp; Conditions</a>
				</div>
			</div>
		</div>
	</footer>
</div>

<!-- Modal Untuk info user-->
	
<!-- Modal Untuk info user-->

      