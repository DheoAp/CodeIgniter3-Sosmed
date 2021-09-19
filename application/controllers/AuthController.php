<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    /*  
    | ada di folder helper -> protect_auth_helper.php
    | halaman login tidak bisa di akses jika ada session nya
    */
    akses_login();
  }

  // Untuk view login
  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if($this->form_validation->run() == false){
      $this->load->view('login');
    }else{
      $this->_login();
    }
  }

  public function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    
    $user  = $this->AuthModel->login($email);

    if($user)
    {
      if(password_verify($password, $user['password']))
      {
        $data = [
          'id_user' => $user['id_user'],
          'email' => $user['email'],
          'level' => $user['level'],
          'nama_lengkap' => $user['nama_lengkap'],
          'status' => $user['status'],
        ];
        $this->session->set_userdata($data);
        if($user['level'] == 1){
          redirect('admin/home');
        }else{
          redirect('user');
        }   
      }else{
        $this->session->set_flashdata('pesan','Password salah!');
        redirect('/');
      }      
    }else{
      $this->session->set_flashdata('pesan','Email belum terdaftar!');
      redirect('/');
    }
    
  }

  public function daftar()
  {
    // validasi form
    $this->form_validation->set_rules('nama_lengkap', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',
    [
      'is_unique' => 'Email sudah terdaftar!'
    ]);
    $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]',
    [
      'is_unique' => 'Username sudah terdaftar!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]',
    [
      'matches' => 'Password tidak sama!',
      'min_length' => 'Password terlalu pendek!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

    if($this->form_validation->run() == false) {
      $this->load->view('daftar');
    }else{
      // jika validasi sukses
      $data = [
        'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap',true)),
        'username' => htmlspecialchars($this->input->post('username',true)),
        'email' => htmlspecialchars($this->input->post('email',true)),
        'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
        'level' => 2,
        'profile' => 'profile.jpeg'
      ];
      $this->AuthModel->InsertUser($data);
      $this->session->set_flashdata('pesan','berhasil buat akun, silakan login.');
      redirect('login');
    }
    
  }

} // akhir class