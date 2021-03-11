<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">

			<div class="row d-flex justify-content-center mb-5 mt-3">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h5>Profile User</h5>        
						</div>
						<div class="card-body">
							<div class="form-group">
								<a onclick="return confirm('YAKIN MAU HAPUS AKUN?');" href="<?= base_url('admin/home/HapusAkun/'.$user->id_user);?>" class="btn btn-danger btn-sm btn-block">HAPUS AKUN</a>
								<hr>
							</div>
							<div class="form-group">
								<div class="row d-flex justify-content-center">
									<div class="col-md-4">
										<img src="<?= base_url('assets/upload_foto/'.$user->profile);?>" width="95%" alt="..">
									</div>
								</div>
							</div>
							<div class="form-group">
								<input name="id_user" value="<?= $user->id_user;?>" type="hidden" class="form-control" id="email">
								<label for="nama_lengkap">Nama Lengkap</label>
								<input name="nama_lengkap" value="<?= $user->nama_lengkap;?>" readonly type="text" class="form-control" id="nim" placeholder="Masukan nama_lengkap">
							</div>

							<div class="form-group">
								<label for="username">Username</label>
								<input name="username" value="<?= $user->username;?>" type="text" readonly class="form-control" id="username" placeholder="Masukan username">
							</div>
							<div class="form-group ">
								<a href="<?= base_url('admin/home');?>" class="btn btn-danger btn-sm">Kembali</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
      <div class="row">
        <div class="col">
        <div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table mr-1"></i>
					Posting User
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Id Posting</th>
									<th>Username</th>
									<th>Waktu Posting</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach( $posting as $user ): ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $user->id_posting; ?></td>
									<td><?= $user->username; ?></td>
									<td><?= date('d-M-y | H:i:s',$user->waktu_posting)?></td>
									<td>
										<div class="btn-group d-flex justify-content-center px-3" role="group">
											<a href="<?= base_url('admin/home/detail/'.$user->id_user);?>" title="Info Akun" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i> Info</a>
											<a title="Hapus Postingan" href="<?= base_url('');?>" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Hapus</a>
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
  <main>
</div>
