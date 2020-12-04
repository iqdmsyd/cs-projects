<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dictionary extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->input->get('submit') != null) {
			$table = $this->input->get('table');
			$data['dictionaries'] = $this->ModelDictionary->getDictionary($table);
			$data['table'] = $table;
			$this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('dictionaries', $data);
	    $this->load->view('footer');
		}
		else
		{
			$this->load->view('header');
	    $this->load->view('sidebar');
	    $this->load->view('dictionaries');
	    $this->load->view('footer');
		}
	}
}