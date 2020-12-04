<?php
/**
 *
 */
class User extends CI_Controller
{
  function __construct() {
    parent::__construct();
  }

  public function index()
  {
  	redirect('user/list');
  }

  public function list()
  {
  	$data['isUserList'] = TRUE;
    $data['users'] = $this->M_User->getAllView();
		$data['userType'] = $this->M_User->getAllType();

    $this->load->view('v_header', $data);
    $this->load->view('v_user_list', $data);
		$this->load->view('v_footer', $data);
  }

  public function getUserType()
	{
		$data['userType'] = $this->M_User->getAllType();
		return $data;
	}

  public function verify()
  {
  	$data['isUserVerify'] = TRUE;
    $data['users'] = $this->M_User->getUnverifiedView();
		$data['userType'] = $this->M_User->getAllType();

    $this->load->view('v_header', $data);
    $this->load->view('v_user_unverified', $data);
		$this->load->view('v_footer', $data);
  }

  public function proses_verify()
  {
  	$id = $this->input->post('id');
  	$data['id_tipe_user'] = $this->input->post('tipe');

  	$this->M_User->updateData($id, $data);

  	redirect('User/verify');
  }

  public function proses_edit()
  {
  	$id = $this->input->post('id');
  	$data['id_tipe_user'] = $this->input->post('tipe');
  	$data['nip'] = $this->input->post('nip');
  	$data['username'] = $this->input->post('username');
  	$data['nama_lengkap'] = $this->input->post('nama_lengkap');
  	$data['email'] = $this->input->post('email');

  	$this->M_User->updateData($id, $data);

  	redirect('User/list');
  }

  public function proses_delete()
  {
  	$id = $this->input->post('idDelete');
  	$this->M_User->deleteData($id);

  	redirect('User/list');
  }

  public function profile()
  {
  	$data['isUserProfile'] = TRUE;

    $this->load->view('v_header', $data);
    $this->load->view('v_profile', $data);
		$this->load->view('v_footer', $data);
  }

  public function reset_password()
  {
  	$data['isResetPassword'] = TRUE;

  	if ($this->session->has_userdata('isLoggedIn')) {
  		if ($this->session->flashdata('confirm_password') == TRUE) {
  			$this->load->view('v_header', $data);
		    $this->load->view('v_reset_password', $data);
				$this->load->view('v_footer', $data);
  		}
  		else
  		{
		  	$this->load->view('v_header', $data);
		    $this->load->view('v_confirm_password', $data);
				$this->load->view('v_footer', $data);
  		}
    }

    else
    {
    	redirect('login');
    }
  }

  public function confirm_password()
  {
  	$data['isResetPassword'] = TRUE;

  	$username = $this->session->userdata('username');
		$password = $this->input->post('password');

		$record = $this->M_User->login($username, $password);

		if ($record) {
			$this->session->set_flashdata('confirm_password', TRUE);
		}
		else
		{
			$this->session->set_flashdata('confirm_password', FALSE);
		}

		redirect('user/reset_password');
  }

  public function proses_reset_password()
  {
  	$id = $this->session->userdata('id_user');
    $data['PASSWORD'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
  	
  	$this->M_User->updateData($id, $data);

		$this->session->set_flashdata('reset_password', TRUE);

  	redirect('user/profile');
  }
}
