<?php 

	class ParentModel extends CI_Model{
		public function get_produk_terbaru(){
			$this->db->select('produk_hukum.*, kategori.slug_cat, kategori.nama_kat');
			$this->db->from('produk_hukum');
			$this->db->join('kategori', 'produk_hukum.cat_id = kategori.id_kategori');
			$this->db->order_by('produk_hukum.tanggal', 'desc');
			$this->db->limit(4);
			return $this->db->get()->result();
		}
	}

 ?>