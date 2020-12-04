<?php 

class ModelBarang extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
    $this->API = $this->session->userdata('API')."Barang/";
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
		$curl = curl_init($this->API."GetbyID/".$id);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->options);
		return json_decode(curl_exec($curl));
	}

	function insert($data)
	{
		$request = json_encode($data);

		$curl = curl_init($this->API);
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

	function update($id, $data)
	{
		$request = json_encode($data);

		$curl = curl_init($this->API.$id);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");

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

	function delete($id)
	{

		$curl = curl_init($this->API.$id);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");

		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '. $this->session->userdata("token")
			)
		);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($curl, CURLOPT_POSTFIELDS, $request);

		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}


	function addStok($data)
	{
		$request = json_encode($data);

		$curl = curl_init($this->API."addStok");
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

	function getAllStok()
	{
		$curl = curl_init($this->API."GetAllDetil");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->options);
		return json_decode(curl_exec($curl));
	}

	function getStokByID($id)
	{
		$curl = curl_init($this->API."GetDetilByID/".$id);
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
			$this->API."GetSearch/"
			.$data['id']."/"
			.$data['tipe']."/"
			.$data['ram']."/"
			.$data['tahun']."/"
			.$data['prosesor']."/"
			.$data['stok-min']."/"
			.$data['stok-max']."/"
			.$data['harga-min']."/"
			.$data['harga-max']."/"
			.$data['order']."/"
			.$data['nama']
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
