<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
  }
  
	public function index()
	{
		if ($this->session->has_userdata('role')) {
			$data['listberita'] = $this->BeritaModel->getAll();
  		$this->load->view('admin/header');
  		$this->load->view('admin/berita', $data);
  		$this->load->view('admin/footer');
  	}
  	else{
			$this->load->view('admin/login'); 
  	}
	}

	public function komentar()
  {
  	$data['listkomentar'] = $this->KomentarModel->getAll();
  	$this->load->view('admin/header');
		$this->load->view('admin/komentar', $data);
		$this->load->view('admin/footer');
  }

  public function user()
  {
  	$data['listuser'] = $this->UserModel->getAll();
  	$this->load->view('admin/header');
		$this->load->view('admin/user', $data);
		$this->load->view('admin/footer');
  }

  public function login()
  {
  	$username = $this->input->post('username');
  	$password = $this->input->post('password');
  	$where = array(
  		'username' => $username,
  		'password' => $password
  	);

  	$user = $this->UserModel->loginAdmin($where);
  	if ($user != null) {
  		$data_session = array(
  			'nama' => $user->username,
  			'role' => 'admin',
  			'status' => 'login'
  		);

  		$this->session->set_userdata($data_session);

  		redirect("Admin");
  	}else{
  		$data['error'] = 'Email atau password salah!';
  		$this->load->view('admin/login', $data); 
  	}
  }

  public function logout()
  {
		$this->session->sess_destroy();
		redirect(base_url('Berita/home'));
  }

  public function filter()
  {
  	$filter = $this->input->get('filter');
  	$value = $this->input->get('value');
  	$sort = $this->input->get('sort');

  	$data['listberita'] = $this->BeritaModel->filterBy($filter, $value, $sort);
  	$this->load->view('admin/header');
		$this->load->view('admin/berita', $data);
		$this->load->view('admin/footer');
  }

  public function filterKomentar()
  {
  	$id = $this->input->get('id');
  	$sort = $this->input->get('sort');

  	$data['listkomentar'] = $this->KomentarModel->filterBy($id, $sort);
  	$this->load->view('admin/header');
		$this->load->view('admin/komentar', $data);
		$this->load->view('admin/footer');
  }

  public function add()
  {
  	if ($this->input->post('submit') != null) {

  		$config['upload_path'] 		= './upload/';
			$config['allowed_types']	= 'jpg|png';
			$config['max_size'] 		= 1024;
			$config['max_width'] 		= 2048;
			$config['max_height'] 		= 2048;

			$this->load->library('upload', $config);
			$this->upload->do_upload('img');

  		$data = array(
  			'judul' => $this->input->post('judul'),
  			'author' => $this->input->post('author'),
  			'tanggal' => $this->input->post('tanggal'),
  			'img' => base_url("upload/".$this->upload->data('file_name')),
  			'teks' => $this->input->post('teks'),
  			'komentar' => 0,
  			'kategori' => $this->input->post('kategori'),
  			'tags' => $this->input->post('tags')
  		);

  		$insert = $this->BeritaModel->add($data);
  		if ($insert > 0) {
  			$data['success'] = "Data berhasil dimasukkan.";
  			$this->load->view('admin/header');
				$this->load->view('admin/add-berita', $data);
				$this->load->view('admin/footer');
  		}
  		else
  		{
  			$data['failed'] = "Data gagal dimasukkan.";
  			$this->load->view('admin/header');
				$this->load->view('admin/add-berita', $data);
				$this->load->view('admin/footer');
  		}
  	}
  	else
  	{
  		$this->load->view('admin/header');
  		$this->load->view('admin/add-berita');
  		$this->load->view('admin/footer');
  	}
  }

  public function update($id)
  {
  	if ($this->input->post('submit') != null) {

  		$config['upload_path'] 		= './upload/';
			$config['allowed_types']	= 'jpg|png';
			$config['max_size'] 		= 1024;
			$config['max_width'] 		= 2048;
			$config['max_height'] 		= 2048;

			$this->load->library('upload', $config);
			$this->upload->do_upload('img');

  		$data = array(
  			'judul' => $this->input->post('judul'),
  			'author' => $this->input->post('author'),
  			'tanggal' => $this->input->post('tanggal'),
  			'img' => base_url("upload/".$this->upload->data('file_name')),
  			'teks' => $this->input->post('teks'),
  			'komentar' => 0,
  			'kategori' => $this->input->post('kategori'),
  			'tags' => $this->input->post('tags')
  		);

  		$update = $this->BeritaModel->update($id, $data);
  		$data['listberita'] = $this->BeritaModel->getAll();

  		if ($update > 0) {
  			$data['success'] = "Data berhasil diupdate.";
  			$this->load->view('admin/header');
				$this->load->view('admin/berita', $data);
				$this->load->view('admin/footer');
  		}
  		else
  		{
  			$data['failed'] = "Data gagal diupdate.";
  			$this->load->view('admin/header');
				$this->load->view('admin/berita', $data);
				$this->load->view('admin/footer');
  		}
  	}
  	else
  	{
  		$data['berita'] = $this->BeritaModel->getByID($id);
  		$this->load->view('admin/header');
  		$this->load->view('admin/edit-berita', $data);
  		$this->load->view('admin/footer');
  	}
  }

  public function delete($id)
  {
  	$delete = $this->BeritaModel->delete($id);
  	$data['listberita'] = $this->BeritaModel->getAll();

  	if ($delete > 0)
  	{
			$data['success'] = "Data berhasil dihapus.";
			$this->load->view('admin/header');
			$this->load->view('admin/berita', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			$data['failed'] = "Data gagal dihapus.";
			$this->load->view('admin/header');
			$this->load->view('admin/berita', $data);
			$this->load->view('admin/footer');
		}
  }

  public function deleteKomentar($id, $id_berita)
  {
  	$delete = $this->KomentarModel->delete($id, $id_berita);
  	$data['listkomentar'] = $this->KomentarModel->getAll();

  	if ($delete > 0)
  	{
			$data['success'] = "Data berhasil dihapus.";
			$this->load->view('admin/header');
			$this->load->view('admin/komentar', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			$data['failed'] = "Data gagal dihapus.";
			$this->load->view('admin/header');
			$this->load->view('admin/komentar', $data);
			$this->load->view('admin/footer');
		}
  }

  public function deleteUser($id)
  {
  	$delete = $this->UserModel->delete($id);
  	$data['listuser'] = $this->UserModel->getAll();

  	if ($delete > 0)
  	{
			$data['success'] = "Data berhasil dihapus.";
			$this->load->view('admin/header');
			$this->load->view('admin/user', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			$data['failed'] = "Data gagal dihapus.";
			$this->load->view('admin/header');
			$this->load->view('admin/user', $data);
			$this->load->view('admin/footer');
		}
  }

 }

?>