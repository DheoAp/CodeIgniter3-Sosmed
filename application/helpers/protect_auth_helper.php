<?php
  // set helper di autoload 'protect_auth'

  /* 
  | cek_login(), block jika user ingin ke halaman dashboard admin tanpa login
  | taruh cek_login() di controller Home.php
  */
  function cek_login(){
    $ci = get_instance();
    if(!$ci->session->userdata('email')){
        $ci->session->set_flashdata('pesan','Login terlebih dahulu');
        redirect('/');
    }
  }

  /* 
  | akses_login(), block/kembalikan jika user/admin sudah login tapi ingin ke halaman login
  | taruh akses_login() di controller login.php
  */
  function akses_login()  {
    $ci = get_instance();
    $ci->load->model('AuthModel');
    if($ci->session->userdata('email')){
       /* 
      | jika level aksesnya 1 kembali ke halaman home
      | jika level aksesnya 2 kembali halaman user
      */
      $ci->load->model('AuthModel');
      if($ci->AuthModel->level() == 1){
        redirect('admin/home');
      }else{
        redirect('/user');
      }
    }
  }

  /* 
  | jika ada user lain yang sudah login dan ingin mengakses ke halaman lain,
  | (user ingin akses halaman admin atau sebaliknya)
  */
  function block_user(){
    $ci = get_instance();
    $ci->load->model('AuthModel');
    if($ci->AuthModel->level() !=2){
      // Admin tidak bisa mengakses halaman user
      redirect('admin/home');
    }
  }
  function block_admin(){
    $ci = get_instance();
    $ci->load->model('AuthModel');
    if($ci->AuthModel->level() !=1){
      // user tidak bisa mengakses halaman admin
      redirect('/user');
    }
  }
