<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encrypt extends CI_Controller {

	public function index()
	{
        $this->load->library('encryption');
        $this->load->model('M_User');
		$username = "resky";
		$password = "resky124";
		
		$record = $this->M_User->login($username, $password);

		if ($record)
		{
			$row = $record->row();
			$tipe;

			if ($row->ID_TIPE_USER == 1) 
			{
				$tipe = "Admin";
			}
			else
			{
				$tipe = "Manager";
			}

			$arSession = [
				'isLoggedIn' => TRUE,
				'id' => $row->ID_USER,
				'nip' => $row->NIP,
				'username' => $row->USERNAME,
				'nama' => $row->NAMA_LENGKAP,
				'email' => $row->EMAIL,
				'tipe' => $tipe,
				'isWrong' => 0
			];

			$this->session->set_userdata($arSession);
			// print_r($record);
			// print_r($arSession);
			// redirect('Login');
		}
		else
		{
			$arSession = [
				// status login gagal (untuk flash message bahwa username / password salah)
				'isWrong' => 1
			];
			$this->session->set_userdata($arSession);
			// print_r($arSession);
			// redirect('Login');
		}
	}
}
