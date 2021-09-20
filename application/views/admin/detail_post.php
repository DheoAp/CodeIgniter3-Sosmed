<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			
      <div class="row">
        <div class="col">
        <div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table mr-1"></i>
					Posts
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Id Posting</th>
									<th>Postingan</th>
									<th>Waktu Posting</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach( $posting as $user ): ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $user->id_posting; ?></td>
									<td><?= $user->posting; ?></td>
									<td><?= date('d-M-y | H:i:s',$user->waktu_posting)?></td>
									<td>
										<div class="btn-group d-flex justify-content-center px-3" role="group">
											<a title="Hapus Postingan" href="#" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Hapus Postingan</a>
										</div>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
            <a href="<?= base_url('admin/home');?>" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Kembali</a>
					</div>
				</div>
			</div>
    </div>
  <main>
</div>
