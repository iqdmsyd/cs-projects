<?php 

class ModelTransaksi extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
    $this->API = $this->session->userdata('API')."Transaksi/";
    $this->load->library('curl');
		$this->options = array(
			CURLOPT_RETURNTRANSFER => true,   // return web page
			CURLOPT_HEADER         => false,  // don't return headers
			CURLOPT_FOLLOWLOCATION => true,   // follow redirects
			CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
			CURLOPT_ENCODING       => "",     // handle compressed
			CURLOPT_USERAGENT      => "test", // name of client
			CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
			CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
			CURLOPT_TIMEOUT        => 120,    // time-out on response
		);
	}

	function getAll()
	{
		$curl = curl_init($this->API."GetAll");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->options);
		return json_decode(curl_exec($curl));
	}

	function getByID($id)
	{
		$curl = curl_init($this->API."GetByID/".$id);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->options);
		return json_decode(curl_exec($curl));
	}

	function getByIDGrosir($id)
	{
		$curl = curl_init($this->API."GetByIDGrosir/".$id);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->options);
		return json_decode(curl_exec($curl));
	}

	function getDetilByID($id)
	{
		$curl = curl_init($this->API."DetilByIDTransaksi/".$id);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->options);
		return json_decode(curl_exec($curl));
	}

	function filter($data)
	{
		$curl = curl_init(
			$this->API."GetBy/"
			.$data['id']."/"
			.$data['order']
		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->options);
		return json_decode(curl_exec($curl));
	}
	
}
?>
