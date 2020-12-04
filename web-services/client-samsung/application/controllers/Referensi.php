<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi extends CI_Controller {

  var $API = "";

  public function __construct()
  {
    parent::__construct();
    $this->API = "";
  }

  public function index()
  {
    $this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('list-referensi');
    $this->load->view('footer');
  }

  public function insert()
  {
    if ($this->input->post('submit') != null) {

  		$ref = '';

      if ($this->input->post('Ref') == 'Tipe') {
       $ref = 'tipe';
      } else if ($this->input->post('Ref') == 'Tahun') {
       $ref = 'tahun';
      }else if ($this->input->post('Ref') == 'RAM') {
       $ref = 'ram';
      }else if ($this->input->post('Ref') == 'Processor') {
       $ref = 'processor';
      }      

      $data = array(
       $ref => $this->input->post('inputRef')
      );

      $response = $this->ModelReferensi->insert($this->input->post('Ref'), $data);

      $data['pesan'] = $response->pesan;
      
      $tipe = $this->ModelReferensi->getAllTipe();
	  	$prosesor = $this->ModelReferensi->getAllProsesor();
	  	$ram = $this->ModelReferensi->getAllRam();
	  	$tahun = $this->ModelReferensi->getAllTahun();

	  	$this->session->set_userdata('tipe', $tipe);
	  	$this->session->set_userdata('prosesor', $prosesor);
	  	$this->session->set_userdata('ram', $ram);
	  	$this->session->set_userdata('tahun', $tahun);

      $this->load->view('header');
      $this->load->view('sidebar');
      $this->load->view('add-referensi', $data);
      $this->load->view('footer'); 
    }
    else
    {
      $this->load->view('header');
      $this->load->view('sidebar');
      $this->load->view('add-referensi');
      $this->load->view('footer'); 
    }
  }


}
