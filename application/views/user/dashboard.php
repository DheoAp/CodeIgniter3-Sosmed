
  <!-- Page Content -->
  <div class="container">

    <div class="row" style="margin-top:60px">
      
      <!-- .col-lg-3 -->
      <div class="col-lg-3 d-flex align-items-center">
        <div style="margin-top: -50px;">
          <img src="<?= base_url('assets/upload_foto/'.$profile->profile);?>" class="img-fluid mx-auto d-block img-thumbnail" style="max-width: 50%;height: auto;" alt="...">
          <div class="text-center my-1">
            <span class="card-text font-weight-bold"><?= $profile->nama_lengkap;?></span> | <span class="card-text"><small class="text-muted">@<?=$profile->username;?></small></span>
            
            <a title="Edit Profile" rel="stylesheet" href="<?= base_url('user/profile/'.$profile->username);?>"><i class="fas fa-pen fa-xs"></i></a>
          </div>
        </div>
      </div>
      <!-- /.col-lg-3 -->
      <div class="col-lg-9">
        <?php if( $this->session->flashdata('pesan') ): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= $this->session->flashdata('pesan');?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <!-- Untuk membuat postingan -->
        <form action="<?= base_url('user/posting');?>" method="POST">
          <div class="form-group d-flex align-items-center" >
            <textarea class="form-control" name="posting" placeholder="Tulis disini..." rows="4"></textarea>
          </div>
          <div class="col">
            <div class="row">
              <div class="col d-flex justify-content-start">
                <?= form_error('posting', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="col d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
            </div>
          </div>
        </form>
        <!-- End Untuk membuat postingan -->
        <hr>
      </div>
      <!-- /.col-lg-9 -->
    </div>
    <!-- Menampilkan postingan -->
    <div class="row justify-content-end" >
      <div class="col-lg-9">
        <!-- .card -->
        <!-- Looping -->
        <?php foreach( $AllPosting as $p ): ?>
          <div class="card card-outline-secondary my-2 mb-4">
            <div class="card-header text-dark">
              <?php if($this->session->userdata('id_user') == $p->id_user): ?>
                <!-- Jika ada session yang memiliki id_user, maka tampilkan tombol hapus -->
                <a onclick="return confirm('YAKIN MAU POSTINGAN ANDA?');" title="Hapus posting" href="<?= base_url('user/HapusPosting/'.$p->id_posting);?>" class="close" >
                  <span aria-hidden="true">&times;</span>
                </a>
                <span class="text-dark"> 
                <b><?= $p->nama_lengkap;?></b> - <small class="text-muted">@<?=$profile->username;?></small> | 
                <!-- tambahkan timezone di autoload.php -->
                <?= date('d-M-y H:i',$p->waktu_posting)?>
              </span>
              <?php else: ?>
                <!-- Jika tidak session maka tampilkan nama, username dan waktu posting saja -->
                <span class="text-dark"> 
                <b><?= $p->nama_lengkap;?></b> - <small class="text-muted">@<?=$p->username;?></small> | 
                <!-- tambahkan timezone di autoload.php -->
                <?= date('d-M-y H:i',$p->waktu_posting)?>
              <?php endif; ?>
              
            </div>            
            <div class="card-body">                
              <p><?= $p->posting;?></p>
            </div>
          </div>        
        <?php endforeach; ?>
        <!-- EndLooping -->
        
                  
        <!-- /.card -->
      </div>
    </div>
    <!-- End Menampilkan postingan -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark" style="margin-top: 202px;">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Dheo Apriansyah <?= date('Y');?></p>
    </div>
    <!-- /.container -->
  </footer>

