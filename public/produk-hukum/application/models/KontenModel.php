<?php 

	class KontenModel extends CI_Model{
		public function add_data($table, $data){
			$this->db->insert($table, $data);
		}

		public function update_cat($data, $id){
			$this->db->update('kategori', $data, $id);
		}

		public function get_produk(){
			$this->db->select('produk_hukum.*, kategori.slug_cat, kategori.nama_kat');
			$this->db->from('produk_hukum');
			$this->db->join('kategori', 'produk_hukum.cat_id = kategori.id_kategori');
			$this->db->order_by('produk_hukum.tanggal', 'desc');
			return $this->db->get()->result();
		}

		public function update_produk($data, $id){
			$this->db->update('produk_hukum', $data, $id);
		}
	}

 ?>