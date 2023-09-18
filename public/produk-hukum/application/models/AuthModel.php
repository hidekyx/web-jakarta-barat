<?php 
	
	class AuthModel extends CI_Model{

		public function get_user(){
			return $this->db->get('account')->result();
		}

		public function get_login($email = '', $password =''){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('email', $email);
			$this->db->where('password', sha1($password));
			return $this->db->get()->row();
		}
	}

 ?>