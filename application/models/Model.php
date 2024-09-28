<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{

	public function get_total_user()
	{
		return $this->db->get('user')->num_rows();
	}
	public function get_total_kategori()
	{
		return $this->db->get('kategori')->num_rows();
	}
	public function get_total_ulasan_admin()
	{
		return $this->db->get('ulasan')->num_rows();
	}
	public function get_total_peminjaman()
	{
		return $this->db->get('peminjaman')->num_rows();
	}
	public function get_total_dipesan()
	{
		$this->db->where('status_peminjaman', 'dipesan');
		return $this->db->get('peminjaman')->num_rows();
	}
	public function get_total_dipinjam()
	{
		$this->db->where('status_peminjaman', 'dipinjam');
		return $this->db->get('peminjaman')->num_rows();
	}
	public function get_total_dikembalikan()
	{
		$this->db->where('status_peminjaman', 'dikembalikan');
		return $this->db->get('peminjaman')->num_rows();
	}
	public function get_user()
	{
		return $this->db->get('user')->result_array();
	}
	public function cek_username($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('user')->row();
	}
	public function add_user($role)
	{
		$this->db->insert('user', [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'role' => $role,
		]);
		// $this->db->insert('user', $_POST); angan di pake di user
	}
	public function update_user()
	{
		$this->db->where('user_id', $this->input->post('user_id'));
		$this->db->update('user', [
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'role' => $this->input->post('role'),
		]);
	}
	public function delete_user($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('user');
	}
	//  kategori
	public function get_kategori()
	{
		return $this->db->get('kategori')->result_array();
	}
	public function cek_kategori($kategori)
	{
		$this->db->where('kategori', $kategori);
		return $this->db->get('kategori')->row();
	}
	public function add_kategori()
	{
		$this->db->insert('kategori', [
			'kategori' => $this->input->post('kategori'),
		]);
	}
	public function update_kategori()
	{
		$this->db->where('kategori_id', $this->input->post('kategori_id'));
		$this->db->update('kategori', [
			'kategori' => $this->input->post('kategori'),
		]);
	}
	public function delete_kategori($id)
	{
		$this->db->where('kategori_id', $id);
		$this->db->delete('kategori');
	}
	// buku
	public function rating_buku($buku_id)
	{
		$this->db->select_min('rating');
		$this->db->where('buku', $buku_id);
		return $this->db->get('buku');
	}
	public function get_buku()
	{
		return $this->db->get('buku')->result_array();
	}
	public function get_total_buku()
	{
		return $this->db->get('buku')->num_rows();
	}
	public function get_buku_tersedia()
	{
		$this->db->where('stok >', 0);
		return $this->db->get('buku')->result_array();
	}
	public function get_buku_limit()
	{
		$this->db->where('stok >', 0);
		$this->db->limit(8);
		$this->db->order_by('judul', 'ACS');
		return $this->db->get('buku')->result_array();
	}
	public function get_buku_limit2()
	{
		$this->db->where('stok >', 0);
		$this->db->limit(8);
		$this->db->order_by('judul', 'RANDOM');
		return $this->db->get('buku')->result_array();
	}
	public function get_detail_buku($buku_id)
	{
		$this->db->where('buku_id', $buku_id);
		return $this->db->get('buku')->row();
	}
	public function get_judul($judul)
	{
		$this->db->where('judul', $judul);
		return $this->db->get('buku')->row();
	}
	public function get_buku_relasi($buku_id)
	{ //foreach detail
		$this->db->join('kategori', 'kategori.kategori_id=buku_relasi.kategori_id', 'left');
		$this->db->where('buku_id', $buku_id);
		return $this->db->get('buku_relasi')->result_array();
	}
	public function add_relasi($kategori_id)
	{
		foreach ($kategori_id as $k) { //array
			$data = [
				'buku_relasi_id' => $k . $this->get_judul($this->input->post('judul'))->buku_id,
				'kategori_id' => $k,
				'buku_id' => $this->get_judul($this->input->post('judul'))->buku_id,
			];
			$this->db->insert('buku_relasi', $data);
		}
	}
	public function add_buku($nama_gambar)
	{
		$this->db->insert('buku', [
			'judul' => $this->input->post('judul'),
			'penulis' => $this->input->post('penulis'),
			'penerbit' => $this->input->post('penerbit'),
			'tahun_terbit' => $this->input->post('tahun_terbit'),
			'stok' => $this->input->post('stok'),
			'stok_total' => $this->input->post('stok'),
			'sinopsis' => $this->input->post('sinopsis'),
			'cover' => $nama_gambar,
		]);
	}
	public function update_buku()
	{
		$this->db->where('buku_id', $this->input->post('buku_id'));
		$this->db->update('buku', [
			'judul' => $this->input->post('judul'),
			'penulis' => $this->input->post('penulis'),
			'penerbit' => $this->input->post('penerbit'),
			'tahun_terbit' => $this->input->post('tahun_terbit'),
			'stok' => $this->input->post('stok'),
			'sinopsis' => $this->input->post('sinopsis'),
			'cover' => $this->input->post('coverN'),
		]);
	}
	public function do_upload($cover, $nama_gambar)
	{
		// $nama_gambar = $this->input->post('coverN');
		$config['upload_path']          = 'assets/uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 3 * 1024 * 1024;
		$config['file_name']			= $nama_gambar;
		// $config['overwrite']			=true;

		$this->load->library('upload', $config);

		if (! $this->upload->do_upload($cover)) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data());
		}
	}
	public function delete_buku($buku_id)
	{
		$this->db->where('buku_id', $buku_id);
		$this->db->delete('buku');
	}
	public function delete_relasi($buku_id)
	{
		$this->db->where('buku_id', $buku_id);
		$this->db->delete('buku_relasi');
	}
	public function delete_cover($nama_gambar)
	{
		if (file_exists('assets/uploads/' . $nama_gambar)) {
			unlink('assets/uploads/' . $nama_gambar);
		}
	}

	// Koleksi
	public function get_koleksi()
	{
		$this->db->join('buku', 'buku.buku_id=koleksi.buku_id', 'left');
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->get('koleksi')->result_array();
	}
	public function add_koleksi($buku_id)
	{
		$this->db->insert('koleksi', [
			'buku_id' => $buku_id,
			'user_id' => $this->session->userdata('user_id')
		]);
	}
	public function delete_koleksi($koleksi_id)
	{
		$this->db->where('koleksi_id', $koleksi_id);
		$this->db->delete('koleksi');
	}
	public function cek_koleksi($user_id, $buku_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('buku_id', $buku_id);
		return $this->db->get('koleksi')->row();
	}
	public function get_total_koleksi($user_id)
	{
		$this->db->where('user_id', $user_id);
		return $this->db->get('koleksi')->num_rows();
	}

	// ulasan
	public function get_ulasan($buku_id)
	{
		$this->db->join('user', 'user.user_id=ulasan.user_id', 'left');
		$this->db->where('buku_id', $buku_id);
		return $this->db->get('ulasan')->result_array();
	}
	public function get_total_ulasan($buku_id)
	{
		$this->db->where('buku_id', $buku_id);
		return $this->db->get('ulasan')->num_rows();
	}
	public function add_ulasan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = [
			'buku_id' => $this->input->post('buku_id'),
			'rating' => $this->input->post('rating'),
			'ulasan' => $this->input->post('ulasan'),
			'user_id' => $this->session->userdata('user_id'),
			'tgl' => date('Y-m-d-H')
		];
		if ($data != NULL) {
			$this->db->insert('ulasan', $data);
		}
	}
	public function update_ulasan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = [
			'rating' => $this->input->post('rating'),
			'ulasan' => $this->input->post('ulasan'),
			'tgl' => date('Y-m-d-H')
		];
		$this->db->where('ulasan_id', $this->input->post('ulasan_id'));
		$this->db->where('user_id', $this->input->post('user_id'));
		$this->db->where('buku_id', $this->input->post('buku_id'));
		$this->db->update('ulasan', $data);
	}
	public function delete_ulasan($ulasan_id, $buku_id)
	{
		$this->db->where('ulasan_id', $ulasan_id);
		$this->db->where('buku_id', $buku_id);
		$this->db->delete('ulasan');
	}
	public function delete_ulasan_user($ulasan_id, $buku_id)
	{
		$this->db->where('ulasan_id', $ulasan_id);
		$this->db->where('buku_id', $buku_id);
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->delete('ulasan');
	}
	public function cek_ulasan($ulasan_id)
	{
		$this->db->where('ulasan_id', $ulasan_id);
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->get('ulasan')->row();
	}
	public function cek_ulasan_buku($buku_id)
	{
		$this->db->where('buku_id', $buku_id);
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->get('ulasan')->row();
	}

	// Laporan
	public function tanggal1()
	{
		return $this->input->post('tanggal1');
	}
	public function tanggal2()
	{
		return $this->input->post('tanggal2');
	}
	public function laporan_peminjaman()
	{
		$tanggal1 = $this->input->post('tanggal1');
		$tanggal2 = $this->input->post('tanggal2');
		$this->db->select('peminjaman.*,buku.*,peminjam.username as peminjam_username, petugas.username as petugas_username');
		$this->db->join('buku', 'buku.buku_id=peminjaman.buku_id', 'left');
		$this->db->join('user as peminjam', 'peminjam.user_id=peminjaman.peminjam_id', 'left');
		$this->db->join('user as petugas', 'petugas.user_id=peminjaman.petugas_id', 'left');
		$this->db->where('tanggal_pinjam >=', $tanggal1);
		$this->db->where('tanggal_pinjam <=', $tanggal2);
		return $this->db->get('peminjaman')->result_array();
	}

	// peminjaman petugas
	public function get_all_peminjaman()
	{
		$this->db->select('peminjaman.*,buku.*,peminjam.username as peminjam_username, petugas.username as petugas_username');
		$this->db->join('buku', 'buku.buku_id=peminjaman.buku_id', 'left');
		$this->db->join('user as peminjam', 'peminjam.user_id=peminjaman.peminjam_id', 'left');
		$this->db->join('user as petugas', 'petugas.user_id=peminjaman.petugas_id', 'left');
		return $this->db->get('peminjaman')->result_array();
	}
	public function get_peminjaman_status($status)
	{
		$this->db->select('peminjaman.*,buku.*,peminjam.username as peminjam_username, petugas.username as petugas_username');
		$this->db->join('buku', 'buku.buku_id=peminjaman.buku_id', 'left');
		$this->db->join('user as peminjam', 'peminjam.user_id=peminjaman.peminjam_id', 'left');
		$this->db->join('user as petugas', 'petugas.user_id=peminjaman.petugas_id', 'left');
		$this->db->where('status_peminjaman', $status);
		return $this->db->get('peminjaman')->result_array();
	}
	public function get_peminjaman_saya($status)
	{
		$this->db->join('buku', 'buku.buku_id=peminjaman.buku_id', 'left');
		$this->db->join('user as peminjam', 'peminjam.user_id=peminjaman.peminjam_id', 'left');
		$this->db->where('status_peminjaman', $status);
		$this->db->where('peminjam_id', $this->session->userdata('user_id'));
		return $this->db->get('peminjaman')->result_array();
	}
	public function isDipesan($buku_id)
	{
		$this->db->where('buku_id', $buku_id);
		$this->db->where('peminjam_id', $this->session->userdata('user_id'));
		$this->db->where('status_peminjaman', 'dipesan');
		return $this->db->get('peminjaman')->row();
	}
	public function isDipinjam($buku_id)
	{
		$this->db->where('buku_id', $buku_id);
		$this->db->where('peminjam_id', $this->session->userdata('user_id'));
		$this->db->where('status_peminjaman', 'dipinjam');
		return $this->db->get('peminjaman')->row();
	}
	public function isKembali($buku_id)
	{
		$this->db->where('buku_id', $buku_id);
		$this->db->where('peminjam_id', $this->session->userdata('user_id'));
		$this->db->where('status_peminjaman', 'dikembalikan');
		return $this->db->get('peminjaman')->row();
	}
	public function add_peminjaman($buku_id)
	{
		$this->db->insert('peminjaman', [
			'buku_id' => $buku_id,
			'peminjam_id' => $this->session->userdata('user_id'),
			'status_peminjaman' => 'dipesan'
		]);
	}
	public function batal($id)
	{
		$this->db->where('peminjaman_id', $id);
		$this->db->delete('peminjaman');
	}
	public function get_peminjaman_id($id)
	{
		$this->db->where('peminjaman_id', $id);
		return $this->db->get('peminjaman')->row();
	}
	public function cek_pinjam($peminjaman_id, $buku_id)
	{
		$this->db->where('buku_id', $buku_id);
		$this->db->where('peminjaman_id', $peminjaman_id);
		return $this->db->get('peminjaman')->row();
	}
	public function hitung_denda($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$pinjam = $this->get_peminjaman_id($id);
		$denda = 3000;
		$today = date('Y-m-d');
		if ($today > $pinjam->batas_pengembalian) {
			$hitung_hari = (strtotime($today) - strtotime($pinjam->batas_pengembalian)) / (60 * 60 * 24);
			
			return $denda * $hitung_hari;
		} else {
			return 0;
		}
	}
	public function update_status($id, $status)
	{
		$cek = $this->get_peminjaman_id($id);
		$denda = $this->hitung_denda($id);
		if ($status == 'dipinjam') {
			$pinjam = [
				'petugas_id' => $this->session->userdata('user_id'),
				'tanggal_pinjam' => date('Y-m-d'),
				'batas_pengembalian' => date('Ymd', strtotime('+14 days')), //titik atau koma kak
				'status_peminjaman' => 'dipinjam'
			];
			$this->db->where('peminjaman_id', $id);
			$this->db->update('peminjaman', $pinjam);
			$this->db->where('buku_id', $cek->buku_id);
			$this->db->set('stok', 'stok - 1', false); //nanti cek lagi, masih ambigu
			$this->db->update('buku');
		} elseif ($status == 'dikembalikan') {
			$kembali = [
				'petugas_id' => $this->session->userdata('user_id'),
				'tanggal_kembali' => date('Y-m-d'),
				'status_peminjaman' => 'dikembalikan',
				'denda' => $denda
			];
			$this->db->where('peminjaman_id', $id);
			$this->db->update('peminjaman', $kembali);
			$this->db->where('buku_id', $cek->buku_id);
			$this->db->set('stok', 'stok + 1', false);
			$this->db->update('buku');
		} else {
			$tolak = [
				'petugas_id' => $this->session->userdata('user_id'),
				'status_peminjaman' => 'ditolak'
			];
			$this->db->where('peminjaman_id', $id);
			$this->db->update('peminjaman', $tolak);
		}
	}
	public function rating($buku_id)
	{
		$this->db->select('round(avg(rating) , 2) as rate');
		$this->db->where('buku_id', $buku_id);
		return $this->db->get('ulasan')->row()->rate;
	}
	
	public function total_denda(){
		$this->db->select('peminjaman.denda, sum(denda) as total_denda');
		return $this->db->get('peminjaman')->row()->total_denda;
	}
	// public function total_denda_cetak(){
	// 	$tanggal1 = $this->input->post('tanggal1');
	// 	$tanggal2 = $this->input->post('tanggal2');
	// 	$this->db->select('peminjaman.denda, sum(denda) as total_denda');
	// 	$this->db->where('tanggal_pinjam >=', $tanggal1);
	// 	$this->db->where('tanggal_pinjam <=', $tanggal2);
	// 	return $this->db->get('peminjaman')->row()->total_denda;
	// }
	public function cari_buku($judul)
	{
		$this->db->select('buku.*');
		$this->db->like('buku.judul', $judul, 'both');
		return $this->db->get('buku')->result_array();
	}
	public function populer()
	{
		$this->db->select('buku.*, peminjaman.buku_id, count(peminjaman.buku_id) as populer');
		$this->db->join('buku', 'peminjaman.buku_id=buku.buku_id', 'left');
		$this->db->where('buku.stok >', 0);
		$this->db->group_by('peminjaman.buku_id');
		$this->db->order_by('populer', 'DESC');
		$this->db->limit(8);
		return $this->db->get('peminjaman')->result_array();
	}
}
