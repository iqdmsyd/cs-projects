<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct($foo = null)
  {
    parent::__construct();
		$this->API = "http://7efe9f2c.ngrok.io/api/";
		$this->session->set_userdata('API', $this->API);
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

  public function index()
  {
  	$this->load->view('login');
  }

  public function prosesLogin()
  {
  	$username = $this->input->post('username');
  	$password = $this->input->post('password');

  	$data['username'] = $username;
		$data['password'] = $password;

		$request = json_encode($data);

		$curl = curl_init($this->API."Token/Admin");
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($request)
			)
		);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $request);

		$response = json_decode(curl_exec($curl), TRUE);
		curl_close($curl);

		$this->session->set_userdata('token', $response['token']);

		$tipe = $this->ModelReferensi->getAllTipe();
  	$prosesor = $this->ModelReferensi->getAllProsesor();
  	$ram = $this->ModelReferensi->getAllRam();
  	$tahun = $this->ModelReferensi->getAllTahun();

  	$this->session->set_userdata('tipe', $tipe);
  	$this->session->set_userdata('prosesor', $prosesor);
  	$this->session->set_userdata('ram', $ram);
  	$this->session->set_userdata('tahun', $tahun);
  	$this->session->set_userdata('isLogin', TRUE);

		if ($response != null) {
			redirect(base_url("Barang"));
		}
		else{
			$data['error'] = "Username atau password salah!";
			$this->load->view('login', $data);
		}
  }

  public function logout()
  {
		$this->session->sess_destroy();
		redirect(base_url("Login"));
  }

}