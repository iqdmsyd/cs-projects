<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
    }

	function index()
	{
        $this->load->view('login');
  }

  function login()
  {
        if ($this->input->post('submit') != null) {
            $username = $this->input->post('username');         
            $password = $this->input->post('password');

            $this->db->where('Username', $username);
            $this->db->where('Password', $password);
            $result = $this->db->get('user')->row();

            if ($result != null) {
                $dataSession = array(
                    'username' => $username,
                    'isLogin' => TRUE
                );

                if($dataSession['username'] == 'Admin'){
                    redirect(base_url("Admin"));
                }else{
                    $this->session->set_userdata($dataSession);
                    redirect(base_url("Part"));
                }
            }
            else
            {
                $meta['pesan'] = "Username atau password salah.";
                $this->load->view('login', $meta);
            }
        }
        else
        {
            $this->load->view('login');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("Login"));
    }
}
