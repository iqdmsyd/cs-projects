<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
  	if ($this->session->userdata('isLogin')==TRUE) {
	  	$data['listtransaksi'] = $this->ModelTransaksi->getAll();

	    $this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('list-transaksi', $data);
	    $this->load->view('footer');
  	}
  	else
  	{
  		redirect(base_url("Login"));
  	}
  }

  public function detilByID($id)
  {
  	$data['listdetil'] = $this->ModelTransaksi->getDetilByID($id);
  	$data['transaksi'] = $this->ModelTransaksi->getByID($id);
  	$this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('list-transaksidetil', $data);
    $this->load->view('footer');
  }

  public function getByIDGrosir($id)
  {
  	$data['listtransaksi'] = $this->ModelTransaksi->getByIDGrosir($id);
  	$data['grosir'] = $this->ModelGrosir->getByID($id);
  	if ($data['listtransaksi'] == null) {
  		$data['pesan'] = "Grosir dengan ID ".$id." belum pernah melakukan transaksi.";
  	}

  	$this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('list-transaksi', $data);
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
  		if ($this->input->get('order') != "None") {
	  		$data['order'] = $this->input->get('order');
	  	}

	  	$request = array(
	  		'id' => $id,
	  		'order' => $this->input->get('order')
	  	);

	  	$data['listtransaksi'] = $this->ModelTransaksi->filter($request);
	  	if ($data['listtransaksi'] == null) {
	  		$data['pesan'] = "Maaf, item yang Anda cari tidak ada.";
	  	}
	  	$this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('list-transaksi', $data);
	    $this->load->view('footer');
  	}
  	else
  	{
			$data['listtransaksi'] = $this->ModelTransaksi->getAll();
	    $this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('list-transaksi', $data);
	    $this->load->view('footer');
  	}
  }

}
