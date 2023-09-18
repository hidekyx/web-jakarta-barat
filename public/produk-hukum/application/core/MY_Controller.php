<?php 

	class MY_Controller extends CI_Controller{

		public function __construct(){
			parent::__construct();
         	$this->load->model('ParentModel', 'parentm');
         	date_default_timezone_set('Asia/Jakarta');
		}

		public function render_front($view, $data, $meta_title){
			$meta['meta_title'] = $meta_title;
			$meta['kategori'] = $this->db->get('kategori')->result();
			$meta['produk'] = $this->parentm->get_produk_terbaru();
			// $meta['kecamatan'] = $this->db->get_where('kecamatan', ['kecamatan_uid' => $this->session->userdata('id_kecamatan')])->row();
			$this->load->view('front/header', $meta);
			$this->load->view($view, $data);
			$this->load->view('front/footer', $meta);
		}

		public function render_front2($view, $data, $meta_title){
			$meta['meta_title'] = $meta_title;
			$meta['kategori'] = $this->db->get('kategori')->result();
			$meta['produk'] = $this->parentm->get_produk_terbaru();
			// $meta['kecamatan'] = $this->db->get_where('kecamatan', ['kecamatan_uid' => $this->session->userdata('id_kecamatan')])->row();
			$this->load->view('front/header', $meta);
			$this->load->view($view, $data);
			$this->load->view('front/side', $meta);
			$this->load->view('front/footer');
		}

		public function render_admin($view, $data, $meta_title){
			$meta['meta_title'] = $meta_title;
	
			$this->load->view('admin/header', $meta);
			$this->load->view($view, $data);
			$this->load->view('admin/footer');
		}



	}


 ?>