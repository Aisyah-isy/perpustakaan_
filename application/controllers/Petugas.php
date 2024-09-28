<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model');
		if ($this->session->userdata('role') != 'petugas') {
			redirect('auth');
		}
	}
	public function index()
	{
		$this->load->view('petugas/dashboard', [
			'title' => 'Petugas | Home',
		]);
	}
	public function kategori()
	{
		$this->load->view('petugas/kategori', [
			'title' => 'Petugas | Kategori',
			'kategori' => $this->Model->get_kategori(),
		]);
	}
	public function add_kategori()
	{
		$kategori = $this->input->post('kategori');
		$cek = $this->Model->cek_kategori($kategori);
		if ($cek > 0) {
			$this->session->set_flashdata(
				'alert',
				'<div class="alert alert-warning alert-dismissible" role="alert">
					Gunakan kategori lain!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>'
			);
			redirect($this->input->server('HTTP_REFERER'));
		} else {
			$this->Model->add_kategori($this->input->post('role'));
			$this->session->set_flashdata(
				'alert',
				'<div class="alert alert-success alert-dismissible" role="alert">
					Berhasil Menambah kategori!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>'
			);
			redirect($this->input->server('HTTP_REFERER'));
		}
	}
	public function delete_kategori($id){
		$this->Model->delete_kategori($id);
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Berhasil menghapus data kategori!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}
	public function update_kategori(){
		$this->Model->update_kategori();
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Berhasil mengupdate data kategori!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}
	public function buku()
	{
		$this->load->view('petugas/buku', [
			'title' => 'Petugas | Buku',
			'buku' => $this->Model->get_buku(),
		]);
	}
	public function add_bukuC()
	{
		$this->load->view('petugas/add_buku', [
			'title' => 'Petugas | Add Buku',
		]);
	}
	public function add_buku()
	{
		date_default_timezone_set('Asia/Jakarta');
		$nama_gambar = date('YmdHis') . '.jpg';
		$judul = $this->input->post('judul');
		$cek = $this->Model->get_judul($judul);
		$kategori_id = $this->input->post('kategori_id');
		if ($cek != NULL) {
			$this->session->set_flashdata(
				'alert',
				'<div class="alert alert-warning alert-dismissible" role="alert">
					Buku sudah ada!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>'
			);
			redirect($this->input->server('HTTP_REFERER'));
		}
		$this->Model->add_buku($nama_gambar);
		$this->Model->do_upload('cover', $nama_gambar);
		$this->Model->add_relasi($kategori_id);
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Berhasil Menambah buku!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}
	public function delete_buku($id,$nama_gambar){
		$this->Model->delete_buku($id);
		$this->Model->delete_relasi($id);
		$this->Model->delete_cover($nama_gambar);
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Berhasil menghapus buku!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}
	public function update_buku(){
		$nama_gambar = $this->input->post('coverN');
		$config['upload_path']          = 'assets/uploads/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 3* 1024 * 1024;
		$config['file_name']			= $nama_gambar;
		$config['overwrite']			= true;

		$this->load->library('upload', $config);

		if (! $this->upload->do_upload('cover')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data());
		}

		$kategori_id = $this->input->post('kategori_id');
		if($kategori_id){
			$this->Model->delete_relasi($this->input->post('buku_id'));
			$this->Model->add_relasi($kategori_id);
		}
		$this->Model->update_buku();
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Berhasil mengupdate buku!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}
	public function ulasan()
	{
		$this->load->view('petugas/ulasan', [
			'title' => 'Petugas | Ulasan',
			'buku' => $this->Model->get_buku(),
		]);
	}
	public function detail_ulasanC($buku_id){
		$this->load->view('petugas/detail_ulasan', [
			'title' => 'Petugas | Detail Ulasan',
			'ulasan' => $this->Model->get_ulasan($buku_id),
			'detail' => $this->Model->get_detail_buku($buku_id),
		]);
	}
	public function delete_ulasan($ulasan_id,$buku_id){
		$this->Model->delete_ulasan($ulasan_id,$buku_id);
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Berhasil menghapus komentar!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}

	// MILIK Petugas
	public function peminjaman()
	{
		$this->load->view('petugas/peminjaman', [
			'title' => 'Petugas | Peminjaman',
			'dikembalikan' => $this->Model->get_peminjaman_status('dikembalikan'),
			'dipesan' => $this->Model->get_peminjaman_status('dipesan'),
			'dipinjam' => $this->Model->get_peminjaman_status('dipinjam'),
		]);
	}
	public function aprove($id){
		$this->Model->update_status($id,'dipinjam');
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Berhasil Menyetujui pengajuan peminjaman buku!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}
	public function tolak($id){
		$this->Model->update_status($id,'ditolak');
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-warning alert-dismissible" role="alert">
				Pengajuan peminjaman buku ditolak!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}
	public function kembali($id){
		$this->Model->update_status($id,'dikembalikan');
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Berhasil Menyetujui pengajuan peminjaman buku!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}

	// LAPORAN
	public function laporan(){
		$this->load->view('petugas/laporan', [
			'title' => 'Petugas | Laporan Buku',
			'peminjaman' => $this->Model->get_all_peminjaman()
		]);
	}
	public function cetak(){
		$this->load->view('petugas/cetak', [
			'title' => 'petugas | Cetak Laporan Buku',
			'tanggal1' => $this->Model->tanggal1(),
			'tanggal2' => $this->Model->tanggal2(),
			'laporan' => $this->Model->laporan_peminjaman()
		]);
	}
}
