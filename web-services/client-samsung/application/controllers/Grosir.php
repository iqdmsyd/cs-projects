<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grosir extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
  	if ($this->session->userdata('isLogin')==TRUE) {
	  	$data['listgrosir'] = $this->ModelGrosir->getAll();

	    $this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('list-grosir', $data);
	    $this->load->view('footer');
  	}
  	else
  	{
  		redirect(base_url("Login"));
  	}
  }

  public function detilByID($id)
  {
  	$data['listdetil'] = $this->ModelGrosir->getDetilByID($id);
  	$data['grosir'] = $this->ModelGrosir->getByID($id);
  	// if ($data['listde']) {
  	// 	# code...
  	// }

  	$this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('list-transaksidetil', $data);
    $this->load->view('footer');
  }
}
