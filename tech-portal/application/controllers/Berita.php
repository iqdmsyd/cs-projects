<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
  	if ($this->input->get('id')!=null) {
	  	$id = $this->input->get('id');
	  	$data['berita'] = $this->BeritaModel->getByID($id);
	  	$data['list'] = $this->BeritaModel->getLimit();
	  	$data['populer'] = $this->BeritaModel->getTerpopuler();
	  	$data['terbaru'] = $this->BeritaModel->getTerbaru();
	  	$data['komentar'] = $this->KomentarModel->getByID($id);
	    $this->load->view('header');
	    $this->load->view('news', $data);
	    $this->load->view('footer');
  	}
  	else
  	{
  		redirect(base_url("Berita/home"));
  	}
  }

  public function home()
  {
		$data['berita'] = $this->BeritaModel->getAll();
  	$data['populer'] = $this->BeritaModel->getTerpopuler();
  	$data['terbaru'] = $this->BeritaModel->getTerbaru();
    $this->load->view('header');
    $this->load->view('home', $data);
    $this->load->view('footer');
  }

  public function berita($id)
  {
  	$data['berita'] = $this->BeritaModel->getByID($id);
  	$data['list'] = $this->BeritaModel->getLimit();
  	$data['populer'] = $this->BeritaModel->getTerpopuler();
	  $data['terbaru'] = $this->BeritaModel->getTerbaru();
  	$data['komentar'] = $this->KomentarModel->getByID($id);
    $this->load->view('header');
    $this->load->view('news', $data);
    $this->load->view('footer');
  }

  public function about()
  {
  	$data['about'] = "yes";
  	$this->load->view('header', $data);
    $this->load->view('about');
    $this->load->view('footer');
  }

  public function smartphone()
  {
  	$kategori = "smartphone";
  	$data['berita'] = $this->BeritaModel->getByKategori($kategori);
  	 $data['list'] = $this->BeritaModel->getLimit();
  	$data['populer'] = $this->BeritaModel->getTerpopuler();
  	$data['terbaru'] = $this->BeritaModel->getTerbaru();
  	$this->load->view('header');
    $this->load->view('home', $data);
    $this->load->view('footer');
  }

  public function computer()
  {
  	$kategori = "computer";
  	$data['berita'] = $this->BeritaModel->getByKategori($kategori);
  	$data['list'] = $this->BeritaModel->getLimit();
  	$data['populer'] = $this->BeritaModel->getTerpopuler();
  	$data['terbaru'] = $this->BeritaModel->getTerbaru();
  	$this->load->view('header');
    $this->load->view('home', $data);
    $this->load->view('footer');
  }

  public function camera()
  {
  	$kategori = "camera";
  	$data['berita'] = $this->BeritaModel->getByKategori($kategori);
  	$data['list'] = $this->BeritaModel->getLimit();
  	$data['populer'] = $this->BeritaModel->getTerpopuler();
  	$data['terbaru'] = $this->BeritaModel->getTerbaru();  	
  	$this->load->view('header');
    $this->load->view('home', $data);
    $this->load->view('footer');
  }

  public function programming()
  {
  	$kategori = "programming";
  	$data['berita'] = $this->BeritaModel->getByKategori($kategori);
  	$data['list'] = $this->BeritaModel->getLimit();
  	$data['populer'] = $this->BeritaModel->getTerpopuler();
  	$data['terbaru'] = $this->BeritaModel->getTerbaru();  	
  	$this->load->view('header');
    $this->load->view('home', $data);
    $this->load->view('footer');
  }

  public function search()
  {
  	$judul = $this->input->get('judul');
  	$data['berita'] = $this->BeritaModel->getSearch($judul);
  	$data['list'] = $this->BeritaModel->getLimit();
  	$data['populer'] = $this->BeritaModel->getTerpopuler();
  	$data['terbaru'] = $this->BeritaModel->getTerbaru();
  	$row = count($data['berita']);

  	if ($row < 1) {
  		$data['error'] = "Maaf, berita yang Anda cari tidak ada.";
  	}
  	$this->load->view('header');
    $this->load->view('home', $data);
    $this->load->view('footer');
  }

  public function addKomentar()
  {
  	$komentar = array(
  		'id_berita' => $this->input->post('id_berita'),
  		'username' => $this->input->post('username'),
  		'komentar' => $this->input->post('komentar'),
  		'waktu' => $this->input->post('waktu')
  	);

  	$insert = $this->KomentarModel->addKomentar($komentar);

  	redirect(base_url("Berita/berita/".$komentar['id_berita']));
  }
  
}