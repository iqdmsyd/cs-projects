<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_User');
	    $this->load->library('encryption');
	}

	public function index()
	{
		if ($this->session->userdata('isLoggedIn'))
		{
			// ADMIN
			if ($this->session->userdata('id_tipe_user') == 1)
			{
				// redirect('Admin');
				redirect('import');
			}
			// MANAGER
			elseif($this->session->userdata('id_tipe_user') == 2)
			{
				// redirect('Manager');
				redirect('import');
			}
			// Junior MANAGER
			elseif($this->session->userdata('id_tipe_user') == 3)
			{
				// redirect('Manager');
				redirect('import');
			}

			// UNVERIFIED
			elseif($this->session->userdata('id_tipe_user') == 99)
			{
				$this->load->view('v_unverified');
			}

			// print_r($this->session->userdata);
		}

		else
		{
			$this->load->view('v_login');
		}
	}

	public function proses_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$record = $this->M_User->login($username, $password);

		if ($record)
		{
			$row = $record->row();
			$tipe = $this->M_User->getByTipeUser($row->ID_TIPE_USER);

			$arSession = [
				'isLoggedIn' => TRUE,
				'id_user' => $row->ID_USER,
				'nip' => $row->NIP,
				'username' => $row->USERNAME,
				'nama_lengkap' => $row->NAMA_LENGKAP,
				'email' => $row->EMAIL,
				'id_tipe_user' => $row->ID_TIPE_USER,
				'nama_tipe_user' => $tipe[0]->NAMA_TIPE_USER,
				'isWrong' => 0
			];

			$this->session->set_userdata($arSession);

			/*print_r($record);
			print_r($this->session->userdata);*/

			redirect('Login');
		}
		else
		{
			$arSession = [
				// untuk mengisi field username kembali sesuai yang sudah diisi sebelumnya
				'username' => $this->input->post('username'),
				// status login gagal (untuk flash message bahwa username / password salah)
				'isWrong' => 1
			];
			$this->session->set_userdata($arSession);
			redirect('Login');
		}
	}

	public function register()
	{
		// Jika user masuk dari fungsi redirect gagal login (isValid = FALSE (0)), maka data session tidak didestroy, karena data yang sudah diinputkan akan dimasukkan kembali ke field form
		if ($this->session->userdata('isValid') == 0) {
			$this->load->view('v_register');
		}

		// Jika user masuk dari link baru, memastikan isi data session kosong dengan men-destroy data session
		else
		{
			$this->session->sess_destroy();
			$this->load->view('v_register');
		}
	}

	public function proses_register()
	{
		$data['ID_USER'] = null;
		$data['ID_TIPE_USER'] = 99;
        $data['NIP'] = $this->input->post('nip');
        $data['USERNAME'] = $this->input->post('username');
        $data['PASSWORD'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $data['NAMA_LENGKAP'] = $this->input->post('nama_lengkap');
        $data['EMAIL'] = $this->input->post('email');

        // Pengecekan data
        $nip_check = $this->M_User->getBy("NIP", $this->input->post('nip'));
        // Jika NIP sudah ada, status nipExist diubah manjadi 1 (True)
        if ($nip_check) {
        	$arSession = [
				'nipExist' => 1
			];
			$this->session->set_userdata($arSession);
        }
        // Jika NIP belum ada, status nipExist diubah manjadi 0 (False)
        else {
        	$arSession = [
				'nipExist' => 0
			];
			$this->session->set_userdata($arSession);
        }

        $username_check = $this->M_User->getBy("USERNAME", $this->input->post('username'));
      	// Jika username sudah ada, status usernameExist diubah manjadi 1 (True)
        if ($username_check) {
        	$arSession = [
				'usernameExist' => 1
			];
			$this->session->set_userdata($arSession);
        }
        // Jika username belum ada, status usernameExist diubah manjadi 0 (False)
        else{
        	$arSession = [
				'usernameExist' => 0
			];
			$this->session->set_userdata($arSession);
        }

        $email_check = $this->M_User->getBy("EMAIL", $this->input->post('email'));
        // Jika email sudah ada, status emailExist diubah manjadi 1 (True)
        if ($email_check) {
        	$arSession = [
				'emailExist' => 1
			];
			$this->session->set_userdata($arSession);
        }
        // Jika email belum ada, status emailExist diubah manjadi 0 (False)
        else{
        	$arSession = [
				'emailExist' => 0
			];
			$this->session->set_userdata($arSession);
        }

        // Jika NIP, username, dan email belum terdaftar di database
        if (empty($nip_check) && empty($username_check) && empty($email_check)){
        	// Maka masukkan data ke database
        	$this->M_User->insertData($data);

        	/* Memasukkan kembali data username ke session, untuk mempermudah user di halaman login tanpa harus mengetikkan username kembali
        	serta memasukkan parameter isValid sebagai status
        	*/
        	$arSession = [
				'username' => $this->input->post('username'),
				'isValid' => 1
			];
			$this->session->set_userdata($arSession);

			/*echo "valid_status: ".$valid_status;
        	print_r($this->session->userdata());*/
			redirect('Login');
        }

        // Jika terdapat data (NIP, username, email) yang sudah terdaftar
        else
        {
        	/* Memasukkan data registrasi ke session, untuk mempermudah user di halaman register tanpa harus mengetikkan datanya kembali
        	serta memasukkan parameter isValid sebagai status
        	*/
        	$arSession = [
				'nip' => $this->input->post('nip'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'isValid' => 0
			];
			$this->session->set_userdata($arSession);
			/*echo "valid_status: ".$valid_status;
        	print_r($this->session->userdata());*/
        	redirect('register');
        }

        // redirect('login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		// print_r($this->session->userdata);
		redirect('login');
	}
}
