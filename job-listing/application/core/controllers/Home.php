<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Home extends CI_Controller
{

	public function index()
	{
		$data['InfoLowongan'] = $this->ModelSupply->getAllSupply(10, 0);
		$data['LowonganByLokasi'] = $this->ModelSupply->getSupplyByLokasi();
		$data['LowonganByKategori'] = $this->ModelSupply->getSupplyByKategori();
		$data['LowonganByRank'] = $this->ModelSupply->getSupplyByRank();

		if ($this->session->has_userdata('UserLogged_in')) {
			$data['InfoUser'] = $this->session->userdata('User');
			$this->load->view('header');
			$this->load->view('index', $data);
			$this->load->view('footer');
		}
		else {
			$this->load->view('header');
			$this->load->view('index', $data);
			$this->load->view('footer');
		}
	}

	public function profile()
	{
		$this->load->view('header');
		$this->load->view('profile');
		$this->load->view('footer');
	}

	public function contact()
	{
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}

	public function signup()
	{
		if ($_POST) {
			$input = array(
				'Nama' => $this->input->post('Nama'),
				'Email' => $this->input->post('Email'),
				'Username' => $this->input->post('Username'),
				'Password' => $this->input->post('Password')
			);

			if ($this->ModelUser->add($input)) {
				$input = array(
					'Username' => $this->input->post('Username'),
					'Password' => $this->input->post('Password')
				);
				$user = $this->ModelUser->auth($input);
				$userData = array(
					'UserLogged_in' => TRUE,
					'User' => $user
				);
				$this->session->set_userdata($userData);
				redirect();
			}
			else{
				$data['error'] = 'Email atau username sudah digunakan';
				$this->load->view('signup', $data);
			}
		}
		else{
			$this->load->view('signup');
		}

	}

	public function login()
	{
		if ($_POST) {
			$input = array(
				'Username' => $this->input->post('Username'),
				'Password' => $this->input->post('Password')
			);
			$user = $this->ModelUser->auth($input);
			if ($user != NULL) {
				$userData = array(
					'UserLogged_in' => TRUE,
					'User' => $user
				);
				$this->session->set_userdata($userData);
				redirect();
			}
			else{
				$data['error'] = 'Username atau password salah';
				$this->load->view('login', $data);
			}
		}
		else{
			$sess = array('UserLogged_in', 'User', 'isAdminLoggedIn', 'isCompanyLoggedIn', 'Company');
			$this->session->unset_userdata($sess);
			$this->load->view('login');
		}
	}

	public function logout()
	{
		$sess = array('UserLogged_in', 'User', 'isAdminLoggedIn', 'isCompanyLoggedIn', 'Company');
		$this->session->unset_userdata($sess);
		redirect();
	}

	public function search()
	{
		$keyword = $this->input->get('Kategori');
		$result = $this->ModelSupply->searchSupply($keyword);
		$data['LowonganByLokasi'] = $this->ModelSupply->getSupplyByLokasi();
		$data['LowonganByKategori'] = $this->ModelSupply->getSupplyByKategori();
		$data['LowonganByRank'] = $this->ModelSupply->getSupplyByRank();
		$data['search'] = 1;

		if ($result != NULL) {
			$data['InfoLowongan'] = $result;
		}
		$this->load->view('header', $data);
		$this->load->view('index', $data);
		$this->load->view('footer');
	}

	public function apply($arg1, $arg2)
	{
		/**
		 * arg1 = ID lowongan, arg2 = ID user
		 * Do:
		 * 1. Update database : tb_lowongan
		 * 2. Email Perusahaan
		 */
		 if ($this->session->has_userdata('UserLogged_in')) {
			 $Company = $this->ModelCompany->getCompanyByIDSupply($arg2);

			 $data = array(
			 	'ID_Lowongan' => $arg1,
			 	'ID_User' => $arg2
			 );

			 if ($this->ModelCompany->applySupply($data)) {
			 	$config = Array(
			 		'protocol' => 'smtp',
			 		'smtp_host' => 'ssl://smtp.gmail.com',
			 		'smtp_port' => 465,
			 		'smtp_user' => 'sdc.bandungbarat@gmail.com', // change it to yours
			 		'smtp_pass' => 'opendoor:)', // change it to yours
			 		'mailtype' => 'html',
			 		'charset' => 'iso-8859-1',
			 		'wordwrap' => TRUE
			 	 );

			 	 $message = 'Halo, ';
			 	 $this->load->library('email', $config);
			 	 $this->email->set_newline("\r\n");
			 	 $this->email->from('sdc.bandungbarat@gmail.com'); // change it to yours
			 	 $this->email->to('iamusayyad@gmail.com');// change it to yours
			 	 $this->email->subject('Test');
			 	 $this->email->message($message);
			 	 if($this->email->send()) {
			 		 echo 'Email sent.';
			 	 }
			 	 else {
			 		 show_error($this->email->print_debugger());
			 	 }
			 	 // redirect('home');
			 }
		 }
		 else {
		 	$this->load->view('login');
		 }
	}

}
 ?>
