<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Company extends CI_Controller
{

  // CRUD supply functions
  public function index()
  {
    if ($this->session->has_userdata('isCompanyLoggedIn')) {
      if (isset($_POST['search'])) {
        $data['kategori'] = $this->input->post('kategori');
        $this->session->set_userdata('sess_kat', $data['kategori']);
      }
      else {
          $data['kategori'] = $this->session->userdata('sess_kat');
      }

      $this->db->where('Kategori', $data['kategori']);
      $this->db->where('ID_Perusahaan', 1);
      $this->db->from('tb_lowongan_kerja');

      // pagination limit
      $config['base_url'] = base_url("Company/");
      $config['total_rows'] = $this->db->count_all_results();
      $config['per_page'] = 3;
      $config['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:3px;'>";
      $config['full_tag_close'] = "</div></p>";
      $config['cur_tag_open'] = "<span class=\"current\">";
      $config['cur_tag_close'] = "</span>";
      $config['num_tag_open'] = "<span class=\"disabled\">";
      $config['num_tag_close'] = "</span>";
      $config['num_links'] = 2;
      $from = $this->uri->segment(2);

      $ID = $this->session->userdata('Company')->ID;
      $data['DataLowongan'] = $this->ModelSupply->getAllSupplyByKategori($ID, $config['per_page'], $from, $data['kategori']);

      $this->pagination->initialize($config);
      $this->load->view('company/header');
      $this->load->view('company/sidebar');
      $this->load->view('company/supply-list', $data);
      $this->load->view('company/footer');
    }
    else {
      $sess = array('UserLogged_in', 'User', 'isAdminLoggedIn', 'isCompanyLoggedIn', 'Company');
  		$this->session->unset_userdata($sess);
      $this->load->view('login-admin');
    }
  }

  public function newsupply()
  {
    if ($this->session->has_userdata('isCompanyLoggedIn')) {
      $ID = $this->session->userdata('Company')->ID;
      if ($_POST) {
        $input = array(
          'ID_Perusahaan' => $ID,
          'Judul' => $this->input->post('Judul'),
          'Deskripsi' => $this->input->post('Deskripsi'),
          'Kecamatan' => $this->input->post('Kecamatan'),
          'Kategori' => $this->input->post('Kategori'),
          'Gaji' => $this->input->post('Gaji'),
          'Deskripsi' => $this->input->post('Deskripsi'),
          'Kuota' => $this->input->post('Kuota'),
          'Pendaftar' => 0
        );

        if ($this->ModelSupply->addSupply($input)) {
          $data['success'] = 'Lowongan kerja baru berhasil dibuat.';
          $this->load->view('company/header');
          $this->load->view('company/sidebar');
          $this->load->view('company/supply-new', $data);
          $this->load->view('company/footer');
        }
      }
      else{
        $this->load->view('company/header');
        $this->load->view('company/sidebar');
        $this->load->view('company/supply-new');
        $this->load->view('company/footer');
      }
    }
    else {
        redirect('auth');
    }
  }

  public function manage($ID)
  {
    if ($this->session->has_userdata('isCompanyLoggedIn')) {
      if ($_POST) {
        $input = array(
          'Judul' => $this->input->post('Judul'),
          'Deskripsi' => $this->input->post('Deskripsi'),
          'Kecamatan' => $this->input->post('Kecamatan'),
          'Kategori' => $this->input->post('Kategori'),
          'Gaji' => $this->input->post('Gaji'),
          'Deskripsi' => $this->input->post('Deskripsi'),
          'Kuota' => $this->input->post('Kuota')
        );

        if ($this->ModelSupply->updateSupply($ID, $input)) {
          $data['success'] = 'Lowongan kerja berhasil dirubah.';
        }
      }

    	$data['Lowongan'] = $this->ModelSupply->getSupplyByID($ID);
      $this->load->view('company/header');
      $this->load->view('company/sidebar');
      $this->load->view('company/supply-manage', $data);
      $this->load->view('company/footer');
    }
    else {
        $this->load->view('login-admin');
    }
  }

  public function delete($ID)
  {
    if ($this->session->has_userdata('isCompanyLoggedIn')) {
      if ($this->ModelSupply->deleteSupply($ID)) {
        $data['success'] = 'Lowongan kerja berhasil dihapus.';
        $this->load->view('company/header');
        $this->load->view('company/sidebar');
        $this->load->view('company/supply-delete', $data);
        $this->load->view('company/footer');
      }
    }
    else {
        $this->load->view('login-admin');
    }
  }
  // End of supply fucntions

  public function profile()
  {
    if ($this->session->has_userdata('isCompanyLoggedIn')) {
      $ID = $this->session->userdata('Company')->ID;
      $data['CompanyInfo'] = $this->ModelCompany->getCompanyByID($ID);

      if ($_POST) {
        $input = array(
          'NamaPerusahaan' => $this->input->post('NamaPerusahaan'),
          'Email' => $this->input->post('Email'),
          'Alamat' => $this->input->post('Alamat'),
          'Telepon' => $this->input->post('Telepon'),
          'Password' => $this->input->post('Password')
        );

        if ($this->ModelCompany->editCompany($ID, $input)) {
          $data['success'] = 'Informasi perusahaan berhasil diubah.';
          $this->session->set_userdata('Company', $this->ModelCompany->getCompanyByID($ID));
        }
      }

      $this->load->view('company/header');
      $this->load->view('company/sidebar');
      $this->load->view('company/company-profile', $data);
      $this->load->view('company/footer');
    }
    else {
      redirect('auth');
    }
  }

  // Authentications
  public function logout()
  {
    $sess = array('UserLogged_in', 'User', 'isAdminLoggedIn', 'isCompanyLoggedIn', 'Company');
		$this->session->unset_userdata($sess);
		redirect('company');
  }

}

 ?>
