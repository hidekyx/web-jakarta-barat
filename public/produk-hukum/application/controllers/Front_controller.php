<?php 
	
	class Front_controller extends MY_Controller{
		public function __construct(){
		 	parent::__construct();
         	$this->load->model('FrontModel', 'frontm');
         	date_default_timezone_set('Asia/Jakarta');
         	
		}

		public function index(){
			$meta_title = 'Beranda - Produk Hukum Jakarta Barat';
			$data = '';
			$this->render_front('front/beranda', $data, $meta_title);
		}

		public function semua(){
			$meta_title = 'Produk Hukum';

			$totalData = $this->frontm->get_produk_terbaru();
			
			$config['base_url'] = site_url('semua');
			$config['total_rows'] = $totalData;
			$config['use_page_numbers'] = TRUE;
			$config['per_page'] = 6;
			$config['num_links'] = 3;

			$config['full_tag_open'] = '<nav class="nav-paginate"><ul class="pagination justify-content-center">';
			$config['full_tag_close'] = '</ul></nav>';

			$config['first_link'] = 'First'; 
			$config['first_tag_open'] = '<li class="page-item" style="color: #7f8489!important;">'; 
			$config['first_tag_close'] = '</li>';

			$config['last_link'] = 'Last'; 
			$config['last_tag_open'] = '<li class="page-item" style="color: #7f8489!important;">'; 
			$config['last_tag_close'] = '</li>';

			$config['next_link'] = '&raquo'; 
			$config['next_tag_open'] = '<li class="page-item" style="color: #7f8489!important;">'; 
			$config['next_tag_close'] = '</li>';

			$config['prev_link'] = '&laquo'; 
			$config['prev_tag_open'] = '<li class="page-item" style="color: #7f8489!important;">'; 
			$config['prev_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="page-item active">
					      <a class="page-link" href="#" style="background-color: #323268;
  border-color: #323268;color: #ffff!important;">';
			$config['cur_tag_close'] = '<span class="sr-only"></span></a>
					    </li>';

			$config['num_tag_open'] = '<li class="page-item" style="color: #7f8489!important;">';
			$config['num_tag_close'] = '</li>';

			$config['attributes'] = array('class' => 'page-link');

			
			$this->pagination->initialize($config);

			// $data['start'] = $this->uri->segment(4);

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

			$offset = $page==0? 0: ($page-1)*$config["per_page"];

			$data['produk'] = $this->frontm->get_produk_terbaru_paginate($config['per_page'], $offset)->result();

			$data['pagination'] = $this->pagination->create_links();
			
			$this->render_front2('front/semua', $data, $meta_title);
		}

		public function kategori($slug){
			$data['kategori'] = $this->frontm->get_kategori_detail($slug);
			$meta_title = 'Kategori - '.$data['kategori']->nama_kat;

			$totalData = $this->frontm->get_produk_cat($data['kategori']->id_kategori);
			
			$config['base_url'] = site_url('kategori/'.$slug);
			$config['total_rows'] = $totalData;
			$config['use_page_numbers'] = TRUE;
			$config['per_page'] = 5;
			$config['num_links'] = 3;

			$config['full_tag_open'] = '<nav class="nav-paginate"><ul class="pagination justify-content-center">';
			$config['full_tag_close'] = '</ul></nav>';

			$config['first_link'] = 'First'; 
			$config['first_tag_open'] = '<li class="page-item" style="color: #7f8489!important;">'; 
			$config['first_tag_close'] = '</li>';

			$config['last_link'] = 'Last'; 
			$config['last_tag_open'] = '<li class="page-item" style="color: #7f8489!important;">'; 
			$config['last_tag_close'] = '</li>';

			$config['next_link'] = '&raquo'; 
			$config['next_tag_open'] = '<li class="page-item" style="color: #7f8489!important;">'; 
			$config['next_tag_close'] = '</li>';

			$config['prev_link'] = '&laquo'; 
			$config['prev_tag_open'] = '<li class="page-item" style="color: #7f8489!important;">'; 
			$config['prev_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="page-item active">
					      <a class="page-link" href="#" style="background-color: #323268;
  border-color: #323268;color: #ffff!important;">';
			$config['cur_tag_close'] = '<span class="sr-only"></span></a>
					    </li>';

			$config['num_tag_open'] = '<li class="page-item" style="color: #7f8489!important;">';
			$config['num_tag_close'] = '</li>';

			$config['attributes'] = array('class' => 'page-link');

			
			$this->pagination->initialize($config);

			// $data['start'] = $this->uri->segment(4);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$offset = $page==0? 0: ($page-1)*$config["per_page"];

			$data['produk'] = $this->frontm->get_produk_cat_paginate($config['per_page'], $offset, $data['kategori']->id_kategori)->result();

			$data['pagination'] = $this->pagination->create_links();
			
			$this->render_front2('front/kategori', $data, $meta_title);
		}

		public function pencarian(){
			$meta_title = 'Pencarian - Produk Hukum';
			$nomor = $this->input->post('nomor');
			$tahun = $this->input->post('tahun');
			$tentang = $this->input->post('tentang');
			$categori = $this->input->post('categori');
			$data['produk'] = $this->frontm->get_pencarian($nomor, $tahun, $tentang, $categori)->result();
			$this->render_front2('front/pencarian', $data, $meta_title);
		}

		public function detail($slug_cat, $id){
			$data['produk'] = $this->frontm->get_produk_detail($id);
			$meta_title = $data['produk']->title;
			$this->render_front2('front/detail', $data, $meta_title);
		}

		public function download($id){
			$data = $this->frontm->get_produk_detail($id);
			$update = array(
		        'views' => $data->views + 1
			);

			$this->db->where('id_produk', $id);
			$this->db->update('produk_hukum', $update);
			redirect(base_url($data->path));
		}
		
	}

 ?>