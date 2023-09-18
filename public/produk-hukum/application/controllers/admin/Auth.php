<?php 

	class Auth extends CI_Controller{
		public function __construct(){
		 	parent::__construct();
         	$this->load->model('AuthModel', 'authm');
         	date_default_timezone_set('Asia/Jakarta');
         	
		}

		public function index(){
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');

			$this->form_validation->set_message('valid_email', 'Email Tidak Sesuai Format!');
			$this->form_validation->set_message('required', 'Tidak Boleh Kosong!');

			if($this->form_validation->run() == false){
				$this->load->view('admin/login');
			}else{
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$akun = $this->authm->get_login($email, $password);

				if($akun){					
					$data = array(
						'user_id' => $akun->id_users,
						'email' => $akun->email,
						'firstname' => $akun->firstname,
						'lastname' => $akun->lastname,
						'status' => $akun->status,
						'is_login' => TRUE
						);

						$this->session->set_userdata($data);

						redirect(base_url('administrator'));

						// if($akun->akses == 1 || $akun->akses == 2){
							
						// }else{
						// 	redirect(base_url());
						// }		
				}else{
					$this->session->set_flashdata('unregistered', 'User login salah atau akun tidak terdaftar!');
					redirect(base_url('administrator/login'));
					// print_r('test');die();
				}

			}
		}

		public function logout(){
			$data = array('user_id','email','firstname', 'lastname', 'is_login');
			// hapus session
			$this->session->unset_userdata($data);
			$this->session->sess_destroy();
			redirect(base_url('administrator/login'));
		}

		
	}

 ?>