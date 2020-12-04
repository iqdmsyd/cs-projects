<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','html'));
		$this->load->model('GrafikModel');
	}

	function index(){
		$data=array();
		$nama = array();
		foreach($this->GrafikModel->get_data_stok() as $row){
			$data[] = (int) $row['Mekanik'];
			$nama[] = $row['Nama'];	
		}
		$this->load->view('laporan/header-grafik');
		$this->load->view('laporan/grafik',array('data'=>$data, 'nama'=>$nama));
	}
}