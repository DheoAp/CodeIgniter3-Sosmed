<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    /* 
    | ada di folder helper -> protect_auth_helper.php
    | cek_login() : cek apakah user sudah login
    */ 
    cek_login();
    /* 
    | block_user() :  block jika halaman ini di akses oleh level akses selain 2 (user), 
    | jika level akses selain 2 maka akan di block atau di tendang
    | hanya bisa di akses oleh user (level 2) 
    */
    block_user();
  }

  public function index()
  {
    $id_user =  $this->session->userdata('id_user');
    $data= [
      'title' => 'User',
      'profile' => $this->AuthModel->GetProfile($id_user)->row(),

      // Menampilkan postingan sesuai dengan id user atau session
      'posting' => $this->db->query("SELECT * FROM posting p,user u WHERE p.id_user=u.id_user AND u.id_user='$id_user' ORDER BY id_posting DESC")->result(),
      
      // 'AllPosting' = menampilkan semua postingan
      'AllPosting' => $this->AuthModel->AllPosting()->result()
    ];
    $this->load->view('user/layout/header',$data);
    $this->load->view('user/dashboard');
    $this->load->view('user/layout/footer');
  }

  public function posting()
  {
    $this->form_validation->set_rules('posting', 'Posting', 'required');
    if($this->form_validation->run() == false){
        redirect('user');
    }else{
      $data = [
        'posting' => htmlspecialchars($this->input->post('posting',true)),
        'id_user' => $this->session->userdata('id_user'),
        'waktu_posting' => time()
      ];
      $this->AuthModel->InsertPosting($data);
      redirect('user');
    }
    
  }

  public function HapusPosting($id_posting)
  {
    $where = [
      'id_posting' => $id_posting
    ];
    $this->AuthModel->deletePosting('posting',$where);
    redirect('user');
    
  }

  
  public function profile()
  {
    $id_user =  $this->session->userdata('id_user');
    $data = [
      // 'poting' = menampilkan postingan berdaskan id yang ada di session
      'posting' => $this->db->query("SELECT * FROM posting p,user u WHERE p.id_user=u.id_user AND u.id_user='$id_user' ORDER BY id_posting DESC")->result(),
      'profile' => $this->AuthModel->GetProfile($id_user)->row(),
      'title' => 'Profile '.$this->session->userdata('nama_lengkap')
    ];
    $this->load->view('user/layout/header',$data);
    $this->load->view('user/profile_user');
    $this->load->view('user/layout/footer');
  }

  /* 
  | Edit Profil
  */
  public function EditProfile()
  {
    $id_user = $this->input->post('id_user');
    $username = $this->input->post('username');

    // Tampung data gambar dari id
    $id_gambar = $this->AuthModel->GetProfile($id_user)->row();
    $data_gambar = './assets/upload_foto/'. $id_gambar->profile;

   if(is_readable($data_gambar)){
      $config['upload_path']          = './assets/upload_foto/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['file_name']            = $username.'-'.time();

      $this->load->library('upload', $config);

      if($this->upload->do_upload('profile')){
        // Edit gambar dan lainya, maka unlink gambar lama kecuali gambar default
        $upload_data = $this->upload->data();
        $GambarName = $upload_data['file_name'];
        $data = [
          'nama_lengkap' => $this->input->post('nama_lengkap'),
          'username' => $this->input->post('username'),
          'profile' => $GambarName
        ];
        
        // Hapus gambar lama kecuali gambar default(profile.jpeg)
        $old_gambar = $this->input->post('old_gambar');
        if($old_gambar != 'profile.jpeg'){
          unlink(FCPATH . 'assets/upload_foto/'.$old_gambar); // jika ada gambar lama, maka hapus
        }
        // update gambar di database
        $update = $this->AuthModel->UpdateGambar($id_user,$data);
        if($update){
          $this->session->set_flashdata('pesan','Data berhasil di update');
          redirect('user');
        }else{
          echo "Ada yang salah, coba lagi";
        }
      }else{
        // jika tidak upload gambar
        $data = [
          'nama_lengkap' => $this->input->post('nama_lengkap'),
          'username' => $this->input->post('username'),
        ];
        $update = $this->AuthModel->UpdateGambar($id_user,$data);
        if($update){
          $this->session->set_flashdata('pesan','Data berhasil di update');
          redirect('user');
        }else{
          echo "gagal";
        }
      }
   }else{
     echo "gagal";
   }

  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('/');
  }

  public function HapusAkun($id_user)
  {
    
    $where = [
      'id_user' => $id_user,
    ];
    /* 
    | ambil column profile di table user
    | lalu unlink
    */
    $old_gambar = $this->input->post('old_gambar');
    if($old_gambar != 'profile.jpeg'){
      unlink(FCPATH . 'assets/upload_foto/'.$old_gambar->profile); // jika ada gambar, maka hapus
    }
    $this->AuthModel->deleteAkun($where);
    redirect('user/logout');
  }

} // akhir class