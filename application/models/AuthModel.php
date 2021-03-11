<?php
  
defined('BASEPATH') or exit('No direct script access allowed');
class AuthModel extends CI_Model{

  public function InsertUser($data)
  {
    $this->db->insert('user',$data);
  }
  
  public function login($email)
  {
    return $this->db->get_where('user', ['email' => $email])->row_array();
  }

  public function level()
  {
    return $this->session->userdata('level');
  }

  public function InsertPosting($data)
  {
    $this->db->insert('posting',$data,);
  }

  public function deletePosting($table,$where)
  {
    $this->db->delete($table,$where);
    return $this->db->affected_rows();
  }

  public function AllPosting()
  {
    // $this->db->select('*');
    $this->db->join('user', 'user.id_user = posting.id_user');
    $this->db->order_by('id_posting', 'DESC');
    return $this->db->get('posting');
  }

  /* 
  | Menampilkan profile user sesuai id
  */
  public function GetProfile($id_user)
  {
    return $this->db->get_where('user', array('id_user' => $id_user));
  }
  /* 
  | Menampilkan User berdasrkan levelnya 
  */
  public function ProfileUser($table)
  {
    return $this->db->get_where($table,array('level' => 2));
  }

 


  /* 
  | update gambar dan data
  */
  public function UpdateGambar($id_user,$data)
  {
    $this->db->where('id_user',$id_user);
    return $this->db->update('user',$data);
  }

  /* 
  | Hapus Akun dan postingan
  */

  public function deleteAkun($where)
  {
    $this->db->delete('user',$where);
    return $this->db->affected_rows();
  }

}//akhir class