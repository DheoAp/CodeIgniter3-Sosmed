<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Daftar</title>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md d-flex justify-content-center">
          <div class="card" style="width: 450px;">
            <div class="card-header">
              Form Daftar
            </div>
            <div class="card-body">
              <form action="<?= base_url('daftar');?>" method="POST">
                <div class="form-group">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input type="nama_lengkap" name="nama_lengkap" class="form-control" id="nama_lengkap" value="<?= set_value('nama_lengkap');?>" >
                  <?= form_error('nama_lengkap', '<small class="text-danger pl-1">', '</small>'); ?>
                  
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="username" name="username" class="form-control" id="username" value="<?= set_value('username');?>">
                  <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" value="<?= set_value('email');?>">
                  <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                </div>

                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control" id="password">
                      <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label for="password">Ulangi Password</label>
                      <input type="password" name="password2" class="form-control" id="password">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
              </form>
              <div class="form-group">
                <span>Sudah punya akun?</span> <a href="<?= base_url('');?>">Login.</a>
              </div>
            </div>
          </div>          
        </div>
      </div>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
