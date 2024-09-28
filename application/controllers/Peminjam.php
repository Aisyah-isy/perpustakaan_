<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjam extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model');
		if($this->session->userdata('role') != 'peminjam'){
			redirect('auth');
		}
	}
	public function index()
	{
		$this->load->view('peminjam/dashboard',[
			'title' => 'Pengguna | Home',
			'populer' => $this->Model->populer(),
			'buku_limit2' => $this->Model->get_buku_limit2(),
		]);
	}
	public function buku()
	{
		$this->load->view('peminjam/buku', [
			'title' => 'Pengguna | Buku',
			'buku' => $this->Model->get_buku_tersedia(),
			'buku_limit' => $this->Model->get_buku_limit(),
			'buku_limit2' => $this->Model->get_buku_limit2(),
		]);
	}
	public function cari_buku(){
		$judul = $this->input->post('judul');
		$this->load->view('peminjam/cari_buku',[
			'title' => 'Pengguna | Hasil Pencarian',
			'cari' => $this->Model->cari_buku($judul),
			'buku_limit2' => $this->Model->get_buku_limit2(),
		]);
		if($this->Model->cari_buku($judul) == NULL){
			$this->session->set_flashdata(
				'alert',
				'<div class="alert alert-warning alert-dismissible" role="alert">
					Tidak ada buku yang ditemukan!
					
				</div>'
			);
			redirect($this->input->server('HTTP_REFERER'));
		}
	}
	public function detail_buku($buku_id){
		$this->load->view('peminjam/detail_buku',[
			'title' => 'Pengguna | Detail Buku |',
			'detail' => $this->Model->get_detail_buku($buku_id),
			'relasi' =>$this->Model->get_buku_relasi($buku_id),
			'ulasan' => $this->Model->get_ulasan($buku_id),
		]);
	}
	public function koleksi(){
		$this->load->view('peminjam/koleksi',[
			'title' => 'Pengguna | Favorite ku',
			'koleksi' =>$this->Model->get_koleksi(),
			'buku_limit2' => $this->Model->get_buku_limit2()
		]);
	}
	public function add_koleksi($id){
		$this->Model->add_koleksi($id);
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Berhasil Menambah buku ke Favorite!
				
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}
	public function delete_koleksi($koleksi_id){
		$this->Model->delete_koleksi($koleksi_id);
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Berhasil menghapus buku dari Favorite!
				
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}
	public function peminjaman(){
		$this->load->view('peminjam/peminjaman',[
			'title' => 'Pengguna | Peminjaman-ku',
			'dipesan' => $this->Model->get_peminjaman_saya('dipesan'),
			'dipinjam' => $this->Model->get_peminjaman_saya('dipinjam'),
			'dikembalikan' => $this->Model->get_peminjaman_saya('dikembalikan'),
			'buku_limit2' => $this->Model->get_buku_limit2(),
		]);
	}
	public function pinjam($buku_id){
		$this->Model->add_peminjaman($buku_id);
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Berhasil mengajukan peminjaman buku!
				
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}
	public function batal($peminjaman_id){
		$this->Model->batal($peminjaman_id);
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Pengajuan peminjaman buku dibatalkan!
				
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}
	public function add_ulasan(){
		if($this->input->post('rating') == NULL){
			$this->session->set_flashdata(
				'alert',
				'<div class="alert alert-warning alert-dismissible" role="alert">
					Lengkapi form komentar!
					
				</div>'
			);
			redirect($this->input->server('HTTP_REFERER'));
		}
		$this->Model->add_ulasan();
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Berhasil menambah komentar!
				
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}
	public function update_ulasan(){
		$this->Model->update_ulasan();
		var_dump($this->Model->update_ulasan());die;
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Berhasil merumah komentar!
				
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}
	public function delete_ulasan($ulasan_id,$buku_id){
		$this->Model->delete_ulasan_user($ulasan_id,$buku_id);
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success alert-dismissible" role="alert">
				Berhasil menghapus komentar!
				
			</div>'
		);
		redirect($this->input->server('HTTP_REFERER'));
	}
}
