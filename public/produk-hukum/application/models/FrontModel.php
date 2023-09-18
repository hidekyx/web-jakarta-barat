<?php 

	class FrontModel extends CI_Model{
		public function get_kategori(){
			return $this->db->get('kategori')->result();
		}

		public function get_kategori_detail($slug){
			return $this->db->get_where('kategori', ['slug_cat' => $slug])->row();
		}

		public function get_produk_cat($id){
			$this->db->select('produk_hukum.*, kategori.slug_cat, kategori.nama_kat');
			$this->db->from('produk_hukum');
			$this->db->join('kategori', 'produk_hukum.cat_id = kategori.id_kategori');
			$this->db->where('cat_id', $id);
			$this->db->order_by('tanggal', 'desc');
			return $this->db->get()->num_rows();
		}

		public function get_produk_cat_paginate($limit, $start, $id){
			$this->db->select('produk_hukum.*, kategori.slug_cat, kategori.nama_kat');
			$this->db->from('produk_hukum');
			$this->db->join('kategori', 'produk_hukum.cat_id = kategori.id_kategori');
			$this->db->where('produk_hukum.cat_id', $id);
			$this->db->order_by('produk_hukum.tanggal', 'desc');
			$this->db->limit($limit, $start);
			return $this->db->get();
		}

		public function get_produk_terbaru(){
			$this->db->select('produk_hukum.*, kategori.slug_cat, kategori.nama_kat');
			$this->db->from('produk_hukum');
			$this->db->join('kategori', 'produk_hukum.cat_id = kategori.id_kategori');
			$this->db->order_by('produk_hukum.tanggal', 'desc');
			return $this->db->get()->num_rows();
		}

		public function get_produk_terbaru_paginate($limit, $start){
			$this->db->select('produk_hukum.*, kategori.slug_cat, kategori.nama_kat');
			$this->db->from('produk_hukum');
			$this->db->join('kategori', 'produk_hukum.cat_id = kategori.id_kategori');
			$this->db->order_by('produk_hukum.tanggal', 'desc');
			$this->db->limit($limit, $start);
			return $this->db->get();
		}

		public function get_pencarian($nomor, $tahun, $title, $cat){
			$this->db->select('produk_hukum.*, kategori.slug_cat, kategori.nama_kat');
			$this->db->from('produk_hukum');
			$this->db->join('kategori', 'produk_hukum.cat_id = kategori.id_kategori');
			$this->db->like('produk_hukum.no_produk', $nomor);
			$this->db->like('produk_hukum.tahun', $tahun);
			$this->db->like('produk_hukum.title', $title);
			$this->db->like('produk_hukum.cat_id', $cat);
			$this->db->order_by('produk_hukum.tanggal', 'desc');
			return $this->db->get();
		}

		public function get_produk_detail($id){
			$this->db->select('produk_hukum.*, kategori.slug_cat, kategori.nama_kat');
			$this->db->from('produk_hukum');
			$this->db->join('kategori', 'produk_hukum.cat_id = kategori.id_kategori');
			$this->db->where('id_produk', $id);
			return $this->db->get()->row();
		}
	}

 ?>