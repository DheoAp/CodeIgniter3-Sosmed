<div class="container mt-5">
  <!-- Row Profle -->
  <div class="row d-flex justify-content-center mb-5">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h5>Ubah Profile</h5>        
        </div>
        <div class="card-body">
        <?= form_open_multipart('user/EditProfile'); ?>
          <div class="form-group">
            <a onclick="return confirm('YAKIN MAU HAPUS AKUN ANDA?');" href="<?= base_url('user/hapusakun/'.$profile->id_user);?>" class="btn btn-danger btn-sm btn-block">HAPUS AKUN</a>
            <hr>
          </div>
          <div class="form-group">
            <input name="id_user" value="<?= $profile->id_user;?>" type="hidden" class="form-control" id="email">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input name="nama_lengkap" value="<?= $profile->nama_lengkap;?>" type="text" class="form-control" id="nim" placeholder="Masukan nama_lengkap">
          </div>

          <div class="form-group">
            <label for="username">Username</label>
            <input name="username" value="<?= $profile->username;?>" type="text" class="form-control" id="username" placeholder="Masukan username">
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <img src="<?= base_url('assets/upload_foto/'.$profile->profile);?>" width="90%" alt="..">
              </div>
              <div class="col-md d-flex align-items-end mt-3">
                <div class="row">
                  <label>Ganti Foto Profile :</label>
                  <input type="file" class="form-control" name="profile">
                  <input type="hidden" class="form-control" name="old_gambar" readonly value="<?= $profile->profile;?>">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm mr-2">Ubah</button>
            <a href="<?= base_url('user');?>" class="btn btn-danger btn-sm">Kembali</a>
          </div>
        <?= form_close();?>
        </div>
      </div>
    </div>
  </div>
  <!-- Row End Profle -->

  <!-- Row Posting -->
  <div class="row d-flex justify-content-center">
    <div class="col-md-10">
      <!-- .card -->
      <!-- Looping -->
      <?php foreach( $posting as $p ): ?>
        <div class="card card-outline-secondary my-2 mb-4">
          <div class="card-header text-dark">
              <a href="<?= base_url('user/HapusPosting/'.$p->id_posting);?>" class="close" >
                <span aria-hidden="true">&times;</span>
              </a>
              <span class="text-dark"> 
              <b><?= $p->nama_lengkap;?></b> - <small class="text-muted">@<?=$profile->username;?></small> | 
              <!-- tambahkan timezone di autoload.php -->
              <?= date('d-M-y H:i',$p->waktu_posting)?>
            </span>              
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
  <!-- End Row Posting -->
</div>