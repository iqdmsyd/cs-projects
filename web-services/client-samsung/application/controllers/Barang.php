<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
  	if ($this->session->userdata('isLogin')==TRUE) {
	  	$data['listbarang'] = $this->ModelBarang->getAll();

	    $this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('list-barang', $data);
	    $this->load->view('footer');
  	}
  	else
  	{
  		redirect(base_url("Login"));
  	}
  }

  public function insert()
  {
  	if ($this->input->post('submit') != null) {
  		$data = array(
  			'namaBarang' => $this->input->post('nama'),
  			'tipe' => $this->input->post('tipe'),
  			'prosesor' => $this->input->post('prosesor'),
  			'ram' => $this->input->post('ram'),
  			'tahun' => $this->input->post('tahun'),
  			'stok' => 0,
  			'deskripsi' => $this->input->post('deskripsi'),
  			'imgUrl' => $this->input->post('gambar'),
  			'hargaJual' => $this->input->post('harga'),
  		);

  		$response = $this->ModelBarang->insert($data);
  		$data['response'] = $response->pesan;
  		$this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('add-barang', $data);
	    $this->load->view('footer'); 
  	}
  	else
  	{
	    $this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('add-barang');
	    $this->load->view('footer'); 
  	}
  }

  public function update($id)
  {
  	if ($this->input->post('submit') != null) {
  		$data = array(
  			'namaBarang' => $this->input->post('nama'),
  			'tipe' => $this->input->post('tipe'),
  			'prosesor' => $this->input->post('prosesor'),
  			'ram' => $this->input->post('ram'),
  			'tahun' => $this->input->post('tahun'),
  			'deskripsi' => $this->input->post('deskripsi'),
  			'imgUrl' => $this->input->post('gambar'),
  			'hargaJual' => $this->input->post('harga'),
  		);

  		$response = $this->ModelBarang->update($id, $data);
  		$data['response'] = $response->pesan;
  		$data['barang'] = $this->ModelBarang->getByID($id);

  		$this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('update-barang', $data);
	    $this->load->view('footer');
  	}
  	else
  	{
	  	$data['barang'] = $this->ModelBarang->getByID($id);
	    $this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('update-barang', $data);
	    $this->load->view('footer');
  	}
  }

  public function delete($id)
  {
  	$response = $this->ModelBarang->delete($id);
  	$data['listbarang'] = $this->ModelBarang->getAll();
  	$data['response'] = $response->pesan;

    $this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('list-barang', $data);
    $this->load->view('footer');
  }

  public function filter()
  {
  	if ($this->input->get('submit') != null) {
	  	if ($this->input->get('id') == null) {
	  		$id = 0;
	  	}else{
	  		$id = $this->input->get('id');
	  		$data['id'] = $id;
	  	}
	  	if ($this->input->get('stok-min') == null) {
	  		$stokmin = 0;
	  	}else{
	  		$stokmin = $this->input->get('stok-min');
	  		$data['stokmin'] = $stokmin;
	  	}
	  	if ($this->input->get('stok-max') == null) {
	  		$stokmax = 0;
	  	}else{
	  		$stokmax = $this->input->get('stok-max');
	  		$data['stokmax'] = $stokmax;
	  	}
	  	if ($this->input->get('harga-min') == null) {
	  		$hargamin = 0;
	  	}else{
	  		$hargamin = $this->input->get('harga-min');
	  		$data['hargamin'] = $hargamin;
	  	}
	  	if ($this->input->get('harga-max') == null) {
	  		$hargamax = 0;
	  	}else{
	  		$hargamax = $this->input->get('harga-max');
	  		$data['hargamax'] = $hargamax;
	  	}if ($this->input->get('nama') == null) {
	  		$nama = 'None';
	  	}else{
	  		$nama = $this->input->get('nama');
	  		$data['nama'] = $nama;
	  	}

	  	if ($this->input->get('tipe') != "None") {
	  		$data['tipe'] = $this->input->get('tipe');
	  	}
	  	if ($this->input->get('ram') != "None") {
	  		$data['ram'] = $this->input->get('ram');
	  	}
	  	if ($this->input->get('tahun') != "None") {
	  		$data['tahun'] = $this->input->get('tahun');
	  	}
	  	if ($this->input->get('prosesor') != "None") {
	  		$data['prosesor'] = $this->input->get('prosesor');
	  	}
	  	if ($this->input->get('order') != "None") {
	  		$data['order'] = $this->input->get('order');
	  	}

	  	$request = array(
	  		'id' => $id,
	  		'tipe' => $this->input->get('tipe'),
	  		'ram' => rawurlencode($this->input->get('ram')),
	  		'tahun' => $this->input->get('tahun'),
	  		'prosesor' => rawurlencode($this->input->get('prosesor')),
	  		'stok-min' => $stokmin,
	  		'stok-max' => $stokmax,
	  		'harga-min' => $hargamin,
	  		'harga-max' => $hargamax,
	  		'order' => $this->input->get('order'),
	  		'nama' => rawurlencode($nama)
	  	);

	  	// print_r($request);
	  	$data['listbarang'] = $this->ModelBarang->filter($request);
	  	if ($data['listbarang'] == null) {
	  		$data['pesan'] = "Maaf, item yang Anda cari tidak ada.";
	  	}
	  	$this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('list-barang', $data);
	    $this->load->view('footer');
  	}
  	else
  	{
  		$data['listbarang'] = $this->ModelBarang->getAll();

	    $this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('list-barang', $data);
	    $this->load->view('footer');
  	}
  }

  public function stok()
  {
  	
  	$data['listbarang'] = $this->ModelBarang->getAll();

  	if ($this->input->get('submit') != null) {
  		$id = $this->input->get('id');
  		$data['liststok'] = $this->ModelBarang->getStokByID($id);	
  		$data['barang'] = $this->ModelBarang->getByID($id);
  	}
  	else{
  		$data['liststok'] = $this->ModelBarang->getAllStok();
  	}

  	if ($data['liststok'] == null) {
  		$data['pesan'] = "Item belum memiliki stok, silahkan tambah stok baru.";
  		$data['total'] = 0;
  	}
  	else
  	{
			$data['total'] = count($data['liststok']);
  	}

    $this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('list-stok', $data);
    $this->load->view('footer');
  }

  public function addStok()
  {

  	if ($this->input->post('submit') != null) {
  		$data = array(
  			'iD_Barang' => $this->input->post('id'),
  			'noSeri' => $this->input->post('no-seri')
  		);

  		$response = $this->ModelBarang->addStok($data);
	  	$data['listbarang'] = $this->ModelBarang->getAll();
  		$data['response'] = $response->pesan;

  		$this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('add-stok', $data);
	    $this->load->view('footer');
  		
  	}
  	else
  	{
  		$data['listbarang'] = $this->ModelBarang->getAll();
	    $this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('add-stok', $data);
	    $this->load->view('footer');
  	}
  }

  public function detail($id)
  {
  	$data['barang'] = $this->ModelBarang->getByID($id);
  	$this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('detail-barang', $data);
    $this->load->view('footer');
  }


}
