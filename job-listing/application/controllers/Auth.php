<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Auth extends CI_Controller
{

  function index()
  {
    if ($_POST) {
      $email = $this->input->post('Email');
      $password = $this->input->post('Password');

      if ($email == 'admin') {
        if ($password == '123') {
          $sess_admin = array(
            'isAdminLoggedIn' => TRUE
          );
          $this->session->set_userdata($sess_admin);
          redirect('admin');
        }
        else {
          $data['failed'] = 'Email atau password salah.';
          $this->load->view('login-admin', $data);
        }
      }
      else {
        $Company = $this->ModelCompany->auth($email, $password);
        if ($Company != NULL) {
          $sess_company = array(
            'isCompanyLoggedIn' => TRUE,
            'Company' => $Company
          );
          $this->session->set_userdata($sess_company);
          redirect('company');
        }
        else {
          $data['failed'] = 'Email atau password salah.';
          $this->load->view('login-admin', $data);
        }
      }
    }
    else {
      $sess = array('UserLogged_in', 'User', 'isAdminLoggedIn', 'isCompanyLoggedIn', 'Company');
  		$this->session->unset_userdata($sess);
      $this->load->view('login-admin');
    }
  }

}

 ?>
