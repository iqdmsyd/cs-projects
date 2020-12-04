<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Home extends CI_Controller
{
    function index()
    {
        if (!$this->session->has_userdata('isLoggedIn')) {
            redirect('Login');
        }

        $metadata['action'] = base_url('import/tryimport');
        $metadata['isImport'] = TRUE;

        $this->load->view('v_header', $metadata);
        $this->load->view('v_import', $metadata);
        $this->load->view('v_footer', $metadata);
    }

    function import()
    {
        if($this->session->userdata('import_success_msg')){
            $metadata['import_success_msg'] = $this->session->userdata('import_success_msg');
            $this->session->unset_userdata('import_success_msg');
        }

        $metadata['isImport'] = TRUE;

        $this->load->view('v_header', $metadata);
        $this->load->view('v_import', $metadata);
        $this->load->view('v_footer', $metadata);
    }

    function transaction()
    {
        $metadata['isTransaction'] = TRUE;
        $metadata['manifest'] = $this->M_Manifest->getAll();
        $metadata['allfields'] = $this->db->list_fields('t_manifest');
        $metadata['fields'] = $this->db->list_fields('t_manifest');

        $this->session->set_userdata('manifest', $metadata['manifest']);

        $this->load->view('v_header', $metadata);
        $this->load->view('v_transaction', $metadata);
        $this->load->view('v_footer', $metadata);
    }

    function analytics()
    {
        $metadata['isAnalytics'] = TRUE;
        $metadata['SalesByMitra'] = $this->M_Manifest->getSalesByMitra();
        $metadata['SalesByRute'] = $this->M_Manifest->getSalesByRute();

        $this->load->view('v_header', $metadata);
        $this->load->view('v_analytics', $metadata);
        $this->load->view('v_footer', $metadata);
    }
}
