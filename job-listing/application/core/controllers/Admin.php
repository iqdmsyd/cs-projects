<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Admin extends CI_Controller
{

  // Demand functions
  public function index()
  {
    if ($this->session->has_userdata('isAdminLoggedIn')) {
      if ($_POST) {
        $data['kecamatan'] = $this->input->post('kecamatan');
        $this->session->set_userdata('sess_kec', $data['kecamatan']);
      }
      else {
          $data['kecamatan'] = $this->session->userdata('sess_kec');
      }

      $this->db->where('Kecamatan', $data['kecamatan']);
      $this->db->from('tb_demand');

      // pagination limit
      $config['base_url'] = base_url("admin/");
      $config['total_rows'] = $this->db->count_all_results();
      $config['per_page'] = 15;
      $config['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:3px;'>";
      $config['full_tag_close'] = "</div></p>";
      $config['cur_tag_open'] = "<span class=\"current\">";
      $config['cur_tag_close'] = "</span>";
      $config['num_tag_open'] = "<span class=\"disabled\">";
      $config['num_tag_close'] = "</span>";
      $config['num_links'] = 2;
      $from = $this->uri->segment(2);

      $data['DataDemand'] = $this->ModelDemand->getAll($config['per_page'], $from, $data['kecamatan']);

      $this->pagination->initialize($config);

      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar', $data);
      $this->load->view('admin/demand-list', $data);
      $this->load->view('admin/footer');
    }
    else{
      $sess = array('UserLogged_in', 'User', 'isAdminLoggedIn', 'isCompanyLoggedIn', 'Company');
      $this->session->unset_userdata($sess);
      $this->load->view('login-admin');
    }
  }

  public function insert()
  {
    if ($this->session->has_userdata('isAdminLoggedIn')) {
      $data = NULL;
      if ($_POST) {
        $input = array(
          'NIK' => $this->input->post('NIK'),
          'Nama' => $this->input->post('Nama'),
          'TempatLahir' => $this->input->post('TempatLahir'),
          'TanggalLahir' => $this->input->post('TanggalLahir'),
          'JenisKelamin' => $this->input->post('JenisKelamin'),
          'Alamat' => $this->input->post('Alamat'),
          'RT' => $this->input->post('RT'),
          'RW' => $this->input->post('RW'),
          'Desa' => $this->input->post('Desa'),
          'Kecamatan' => $this->input->post('Kecamatan'),
          'Telepon' => $this->input->post('Telepon'),
          'Email' => $this->input->post('Email'),
          'Status' => $this->input->post('Status'),
          'Pendidikan' => $this->input->post('Pendidikan'),
          'Jurusan' => $this->input->post('Jurusan'),
          'NEMIPK' => $this->input->post('NEM/IPK'),
          'Tahun' => $this->input->post('Tahun'),
          'Keterampilan' => $this->input->post('Keterampilan'),
          'KemampuanBahasa' => $this->input->post('KemampuanBahasa'),
          'Jabatan' => $this->input->post('Jabatan'),
          'UraianTugas' => $this->input->post('UraianTugas'),
          'LamaKerja' => $this->input->post('LamaKerja'),
          'JabatanDiinginkan' => $this->input->post('JabatanDiinginkan'),
          'TempatKerja' => $this->input->post('TempatKerja'),
          'LokasiKerja' => $this->input->post('LokasiKerja'),
          'BesaranUpah' => $this->input->post('BesaranUpah'),
          'Usia' => $this->input->post('Usia')
        );
        if ($this->ModelDemand->insertDemand($input)) {
          $data['success'] = 'Data demand baru berhasil dibuat.';
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/demand-insert', $data);
          $this->load->view('admin/footer');
        }
      }
      else {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/demand-insert', $data);
        $this->load->view('admin/footer');
      }
    }
    else {
      $this->load->view('login-admin');
    }
  }

  public function update()
  {
    if ($this->session->has_userdata('isAdminLoggedIn')) {
      $data = NULL;
      if ($_POST) {
        $ID = $this->input->post('ID');
        echo $ID;
        $input = array(
          'NIK' => $this->input->post('NIK'),
          'Nama' => $this->input->post('Nama'),
          'TempatLahir' => $this->input->post('TempatLahir'),
          'TanggalLahir' => $this->input->post('TanggalLahir'),
          'JenisKelamin' => $this->input->post('JenisKelamin'),
          'Alamat' => $this->input->post('Alamat'),
          'RT' => $this->input->post('RT'),
          'RW' => $this->input->post('RW'),
          'Desa' => $this->input->post('Desa'),
          'Kecamatan' => $this->input->post('Kecamatan'),
          'Telepon' => $this->input->post('Telepon'),
          'Email' => $this->input->post('Email'),
          'Status' => $this->input->post('Status'),
          'Pendidikan' => $this->input->post('Pendidikan'),
          'Jurusan' => $this->input->post('Jurusan'),
          'NEMIPK' => $this->input->post('NEM/IPK'),
          'Tahun' => $this->input->post('Tahun'),
          'Keterampilan' => $this->input->post('Keterampilan'),
          'KemampuanBahasa' => $this->input->post('KemampuanBahasa'),
          'Jabatan' => $this->input->post('Jabatan'),
          'UraianTugas' => $this->input->post('UraianTugas'),
          'LamaKerja' => $this->input->post('LamaKerja'),
          'JabatanDiinginkan' => $this->input->post('JabatanDiinginkan'),
          'TempatKerja' => $this->input->post('TempatKerja'),
          'LokasiKerja' => $this->input->post('LokasiKerja'),
          'BesaranUpah' => $this->input->post('BesaranUpah'),
          'Usia' => $this->input->post('Usia')
        );

        if ($this->ModelDemand->updateDemand($ID, $input)) {
          $data['success'] = 'Data demand berhasil diupdate.';
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/demand-update', $data);
          $this->load->view('admin/footer');
        }
      }
      elseif ($_GET) {
        $q = $this->input->get('q');
        $data['Demand'] = $this->ModelDemand->getDemandByNIK($q);

        if ($data['Demand'] == NULL) {
          $data['failed'] = 'Data tidak ditemukan.';
        }

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/demand-update', $data);
        $this->load->view('admin/footer');
      }
      else {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/demand-update', $data);
        $this->load->view('admin/footer');
      }
    }
    else{
      $this->load->view('login-admin');
    }
  }

  public function delete()
  {
    if ($this->session->has_userdata('isAdminLoggedIn')) {
      $data = NULL;
      if ($_POST) {
        $ID = $this->input->post('ID');
        if ($this->ModelDemand->deleteDemand($ID)) {
          $data['success'] = 'Data demand berhasil dihapus.';
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/demand-delete', $data);
          $this->load->view('admin/footer');
        }
      }
      elseif ($_GET) {

        $q = $this->input->get('q');
        $data['Demand'] = $this->ModelDemand->getDemandByNIK($q);

        if ($data['Demand'] == NULL) {
          $data['failed'] = 'Data tidak ditemukan.';
        }

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/demand-delete', $data);
        $this->load->view('admin/footer');
      }
      else {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/demand-delete', $data);
        $this->load->view('admin/footer');
      }
    }
    else{
      $this->load->view('login-admin');
    }
  }
  // End of Demand functions


  // Company functions
  public function company()
  {
    if ($this->session->has_userdata('isAdminLoggedIn')) {
      $this->db->from('tb_perusahaan');
      $config['base_url'] = base_url("admin/company/");
      $config['total_rows'] = $this->db->count_all_results();
      $config['per_page'] = 15;
      $config['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:3px;'>";
      $config['full_tag_close'] = "</div></p>";
      $config['cur_tag_open'] = "<span class=\"current\">";
      $config['cur_tag_close'] = "</span>";
      $config['num_tag_open'] = "<span class=\"disabled\">";
      $config['num_tag_close'] = "</span>";
      $config['num_links'] = 2;
      $from = $this->uri->segment(3);

      $data['DataCompany'] = $this->ModelCompany->getAllCompany($config['per_page'], $from);

      $this->pagination->initialize($config);
      $this->load->view('admin/header');
      $this->load->view('admin/sidebar');
      $this->load->view('admin/company-list', $data);
      $this->load->view('admin/footer');
    }
    else{
      $this->load->view('login-admin');
    }
  }

  public function newcompany()
  {
    if ($this->session->has_userdata('isAdminLoggedIn')) {
      $data = NULL;
      if ($_POST) {
        $input = array(
          'NamaPerusahaan' => $this->input->post('NamaPerusahaan'),
          'Email' => $this->input->post('Email'),
          'Password' => $this->input->post('Password')
        );
        if ($this->ModelCompany->insertCompany($input)) {
          $data['success'] = 'Admin perusahaan baru berhasil dibuat.';
          $this->load->view('admin/header');
          $this->load->view('admin/sidebar');
          $this->load->view('admin/company-new', $data);
          $this->load->view('admin/footer');
        }
      }
      else {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/company-new', $data);
        $this->load->view('admin/footer');
      }
    }
    else{
      $this->load->view('login-admin');
    }
  }
  // End of company functions


  // Supply functions
  public function supply()
  {
    if ($this->session->has_userdata('isAdminLoggedIn')) {
      $this->db->from('tb_lowongan_kerja');
      $config['base_url'] = base_url("admin/company/");
      $config['total_rows'] = $this->db->count_all_results();
      $config['per_page'] = 15;
      $config['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:3px;'>";
      $config['full_tag_close'] = "</div></p>";
      $config['cur_tag_open'] = "<span class=\"current\">";
      $config['cur_tag_close'] = "</span>";
      $config['num_tag_open'] = "<span class=\"disabled\">";
      $config['num_tag_close'] = "</span>";
      $config['num_links'] = 2;
      $from = $this->uri->segment(3);

      $data['DataSupply'] = $this->ModelSupply->getAllSupply($config['per_page'], $from);

      $this->pagination->initialize($config);
      $this->load->view('admin/header');
      $this->load->view('admin/sidebar');
      $this->load->view('admin/supply-list', $data);
      $this->load->view('admin/footer');
    }
    else{
      $this->load->view('login-admin');
    }
  }
  // End of supply functions


  // Authentications
  public function logout()
  {
    $sess = array('UserLogged_in', 'User', 'isAdminLoggedIn', 'isCompanyLoggedIn', 'Company');
		$this->session->unset_userdata($sess);
    redirect('admin');
  }

}


?>
