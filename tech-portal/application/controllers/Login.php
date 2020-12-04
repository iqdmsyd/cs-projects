<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
  	$this->load->view('login/index'); 
  }

  public function register()
  {
    $this->load->view('login/register'); 
  }

  public function forgot()
  {
    $this->load->view('login/forgot'); 
  }

  public function loginProses()
  {
  	$email = $this->input->post('email');
  	$password = $this->input->post('password');
  	$where = array(
  		'email' => $email,
  		'password' => $password
  	);

  	$user = $this->UserModel->login($where);
  	if ($user != null) {
  		$data_session = array(
  			'nama' => $user->username,
  			'img' => $user->img,
  			'status' => 'login'
  		);

  		$this->session->set_userdata($data_session);

  		redirect("Berita/home");
  	}else{
  		$data['error'] = 'Email atau password salah!';
  		$this->load->view('login/index', $data); 
  	}
  }

  public function registerProses()
  {
  	$gender = $this->input->post('gender');
  	if ($gender == 'male') {
  		$img = base_url("img/male-user.png");
  	}else{
  		$img = base_url("img/female-user.png");
  	}

  	$userdata = array(
  		'username' => $this->input->post('name'),
  		'img' => $img,
  		'email' => $this->input->post('email'),
  		'password' => $this->input->post('password')
  	);

  	$insert = $this->UserModel->insert($userdata);
  	if ($insert > 0) {
  		$data_session = array(
  			'nama' => $userdata['username'],
  			'img' => $img,
  			'status' => 'login'
  		);

  		$this->session->set_userdata($data_session);

  		redirect("Berita/home");
  	}else{
  		$data['error'] = 'Email sudah terdaftar';
  		$this->load->view('login/register', $data); 
  	}
  }

  public function forgotProses()
  {
  	$data['success'] = 'Password sudah bisa direset melalui email, silakan cek email Anda.';
  	$this->load->view('login/index', $data);
  }

  public function logout()
  {
		$this->session->sess_destroy();
		redirect(base_url('Berita/home'));
  }

}