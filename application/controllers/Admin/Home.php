<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    /* 
    | ada di folder helper -> protect_auth_helper.php
    | cek_login() : cek apakah user sudah login
    */ 
    cek_login();
    /* 
    | block_admin() :  block jika halaman ini di akses oleh level akses selain 1 (admin), 
    | jika level akses selain 1 maka akan di block atau di tendang
    | hanya bisa di akses oleh admin (level 1) 
    */
    block_admin();
  }

  public function index()
  {
    $data= [
      'user' => $this->AuthModel->ProfileUser('user')->result(),
      'title' => 'Admin | '. $this->session->userdata('nama_lengkap'),
    ];
    $this->load->view('admin/layout/header',$data);
    $this->load->view('admin/layout/sidebar');
    $this->load->view('admin/home');
    $this->load->view('admin/layout/footer');
  }

  public function detail($id_user)
  {
    $data= [
      // Menampilkan postingan sesuai dengan id user atau session
      'posting' => $this->db->query("SELECT * FROM posting p,user u WHERE p.id_user=u.id_user AND u.id_user='$id_user' ORDER BY id_posting DESC")->result(),
      
      'user' => $this->AuthModel->GetProfile($id_user)->row(),
      'title' => 'Admin | '. $this->session->userdata('nama_lengkap'),
    ];
    $this->load->view('admin/layout/header',$data);
    $this->load->view('admin/layout/sidebar');
    $this->load->view('admin/detailUser');
    $this->load->view('admin/layout/footer');
  }

  public function HapusAkun($id_user)
  {
    
    $where = [
      'id_user' => $id_user,
    ];
    
    // Proses Hapus Akun
    $this->db->where('id_user',$id_user);
    $query = $this->db->get('user');
    $row = $query->row();
    unlink("./assets/upload_foto/$row->profile");
    // End Proses Hapus Akun

    $this->AuthModel->deleteAkun($where);
    redirect('admin/home');
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('/');
  }

} // akhir class