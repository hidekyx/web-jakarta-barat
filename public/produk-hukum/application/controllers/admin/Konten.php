<?php 
	
	class Konten extends MY_Controller{
		public function __construct(){
		 	parent::__construct();
		 	if(!$this->session->userdata('is_login')) redirect(base_url('administrator/login'));
         	$this->load->model('KontenModel', 'kontenm');
         	date_default_timezone_set('Asia/Jakarta');
         	
		}

		public function index(){
			$meta_title = 'Dashboard - Jakarta Barat Produk Hukum';
			
			$data['total_kat'] = $this->db->get('kategori')->num_rows();
			$data['total_prod'] = $this->db->get('produk_hukum')->num_rows();
			$this->render_admin('admin/dashboard', $data, $meta_title);
		}

		public function kategori(){
			$meta_title = 'Kategori - Jakarta Barat Produk Hukum';
			$data['kategori'] = $this->db->get('kategori')->result();
			$this->render_admin('admin/kategori', $data, $meta_title);
		}

		public function tambah_cat(){
			$meta_title = 'Kategori - Jakarta Barat Produk Hukum';
			$data = '';
			if($_POST){
				$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('nama_kat'))));
				$input = array(
	            	'nama_kat' => $this->input->post('nama_kat'),
	            	'slug_cat' => $slug
	            );

	           $this->kontenm->add_data('kategori', $input);
	           $this->session->set_flashdata('tambah', 'Kategori');
	           redirect('administrator/kategori');
			}
			$this->render_admin('admin/tambah-kat', $data, $meta_title);
		}

		public function ubah_cat($id){
			$meta_title = 'Kategori Berita - Pemkot Jakarta Pusat';

			$data['details'] = $this->db->get_where('kategori', ['id_kategori' => $id])->row();

			if($_POST){
				$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('nama_kat'))));
				$input = array(
	            	'nama_kat' => $this->input->post('nama_kat'),
	            	'slug_cat' => $slug
	            );
				$this->kontenm->update_cat($input, array('id_kategori' => $id));
				$this->session->set_flashdata('ubah', 'Kategori');
		        redirect('administrator/kategori');	
			}
		
			$this->render_admin('admin/detail_cat', $data, $meta_title);
		}

		public function produk(){
			$meta_title = 'Produk Hukum - Jakarta Barat Produk Hukum';
			$data['produk'] = $this->kontenm->get_produk();
			$this->render_admin('admin/produk', $data, $meta_title);
		}

		public function produk_tambah(){
			$meta_title = 'Tambah Produk Hukum - Jakarta Barat Produk Hukum';
			$data['kategori'] = $this->db->get('kategori')->result();			
			if($_POST){
				$format = explode("-", $this->input->post('tanggal'));
       			$waktu_fix = $format[2] . "-" . $format[1] . "-" . $format[0];
				$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('title'))));

				if(!file_exists('uploads/doc/')){
				mkdir('uploads/doc/', 0777, true);
				}

				$config['upload_path'] = 'uploads/doc/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|doc|pdf|xlsx';
				$config['max_size']  = 20000;
				$config['file_name'] = $slug;

				$this->upload->initialize($config);
				
				if($this->upload->do_upload('path_file')){
		            $data = $this->upload->data();
		            
		            //Compress Image
		            $config['image_library']= 'gd2';
		            $config['source_image']= 'uploads/doc/'.$data['file_name'];

		            $this->load->library('image_lib', $config);
		           $input = [
		            	'title' => $this->input->post('title'),
		            	'cat_id' => $this->input->post('kategori'),
		            	'detail' => $this->input->post('desc'),
		            	'tahun' => $this->input->post('tahun'),
		            	'no_produk' => $this->input->post('nomor'),
		            	'tanggal' => $waktu_fix,
		            	'path' => $config['source_image'],
		            	'views' => 0
		            ];

		           $this->kontenm->add_data('produk_hukum', $input);
		           $this->session->set_flashdata('tambah', 'Produk Hukum');
		           redirect('administrator/produk-hukum');
		        }else{
		        	// print('hehe');die();
		        	$this->session->set_flashdata('gagal', 'Data Kosong atau Ukuran File Melebihi 3 MB');
		        	redirect('administrator/produk-hukum');
		        }
		        
			}
			$this->render_admin('admin/produk-tambah', $data, $meta_title);
		}

		public function produk_ubah($id){
			$meta_title = 'Ubah Produk Hukum - Jakarta Barat Produk Hukum';
			$data['produk'] = $this->db->get_where('produk_hukum', ['id_produk' => $id])->row();
			$data['kategori'] = $this->db->get('kategori')->result();			
			if($_POST){
				$format = explode("-", $this->input->post('tanggal'));
       			$waktu_fix = $format[2] . "-" . $format[1] . "-" . $format[0];
				$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('title'))));

				if(!file_exists('uploads/doc/')){
				mkdir('uploads/doc/', 0777, true);
				}

				$config['upload_path'] = 'uploads/doc/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|pdf';
				$config['max_size']  = 20000;
				$config['file_name'] = $slug;

				$this->upload->initialize($config);
				
				if($this->upload->do_upload('path_file')){
		            $data = $this->upload->data();
		            
		            //Compress Image
		            $config['image_library']= 'gd2';
		            $config['source_image']= 'uploads/doc/'.$data['file_name'];

		            $this->load->library('image_lib', $config);

		            // Tidak berfungsi pada centos 8
		            // $this->image_lib->resize();

					$this->kontenm->update_produk(array(
		            	'title' => $this->input->post('title'),
		            	'cat_id' => $this->input->post('kategori'),
		            	'detail' => $this->input->post('desc'),
		            	'tahun' => $this->input->post('tahun'),
		            	'no_produk' => $this->input->post('nomor'),
		            	'tanggal' => $waktu_fix,
		            	'path' => $config['source_image'],
		            ), array('id_produk' => $id));

		        }else{
		        	$this->kontenm->update_produk(array(
		            	'title' => $this->input->post('title'),
		            	'cat_id' => $this->input->post('kategori'),
		            	'detail' => $this->input->post('desc'),
		            	'tahun' => $this->input->post('tahun'),
		            	'no_produk' => $this->input->post('nomor'),
		            	'tanggal' => $waktu_fix
		            ), array('id_produk' => $id));
		        }

		        $this->session->set_flashdata('ubah', 'Produk Hukum');
		        redirect('administrator/produk-hukum');
		        
			}
			$this->render_admin('admin/produk-edit', $data, $meta_title);
		}

		public function delete_kategori($id){
			$this->db->delete('kategori', ['id_kategori' => $id]);
			$this->db->delete('produk_hukum', ['cat_id' => $id]);
			$this->session->set_flashdata('hapus', 'Kategori');
			redirect('administrator/kategori');
		}

		public function delete_produk($id){
			$this->db->delete('produk_hukum', ['id_produk' => $id]);
			$this->session->set_flashdata('hapus', 'Produk Hukum');
			redirect('administrator/produk-hukum');
		}

	}

 ?>