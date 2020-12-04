<?php 

class ModelReferensi extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
    $this->API = $this->session->userdata('API')."Referensi/";
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

	function getAllTipe()
	{
		$curl = curl_init($this->API."Tipe");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->options);
		return json_decode(curl_exec($curl), TRUE);
	}

	function getAllProsesor()
	{
		$curl = curl_init($this->API."Prosesor");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->options);
		return json_decode(curl_exec($curl), TRUE);
	}

	function getAllRam()
	{
		$curl = curl_init($this->API."Ram");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->options);
		return json_decode(curl_exec($curl), TRUE);
	}

	function getAllTahun()
	{
		$curl = curl_init($this->API."Tahun");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->options);
		return json_decode(curl_exec($curl), TRUE);
	}

	function insert($ref, $data)
	{
		$request = json_encode($data);

		$curl = curl_init($this->API.$ref);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($request),
				'Authorization: Bearer '. $this->session->userdata("token")
			)
		);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $request);

		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}
}
?>
