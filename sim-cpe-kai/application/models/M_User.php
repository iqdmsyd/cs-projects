<?php 
	class M_User extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
            $this->load->library('encryption');
		}

		function login($xusername, $xpassword)
		{
			$this->db->select('*');
			$this->db->where('username', $xusername);

			$user = $this->db->get('t_user');

			if ($user->num_rows() > 0)
			{
                $row = $user->row();

                if (password_verify($xpassword, $row->PASSWORD)) {
    				return $user;
                }

                else
                {
                    return FALSE;
                }
			}

			else
			{
				return FALSE;
			}
		}

        public function count()
        {
            return $this->db->count_all('t_user');
        }

		public function getAll()
        {
            $q = $this->db->select('*')->from('t_user')->get();
            return $q->result();
        }

        // From v_user_list
        public function getAllView()
        {
            $q = $this->db->select('*')->from('v_user_list')->where('NAMA_TIPE_USER !=', 'Unverified')->get();
            return $q->result();
        }

        public function getUnverifiedView()
        {
            $q = $this->db->select('*')->from('v_user_list')->where('NAMA_TIPE_USER', 'Unverified')->get();
            return $q->result();
        }

        public function getAllType()
        {
            $q = $this->db->select('*')->from('t_tipe_user')->get();
            return $q->result();
        }

        public function getByTipeUser($xid)
        {
            $q = $this->db->select('*')->from('t_tipe_user')->where("ID_TIPE_USER", $xid)->get();
            return $q->result();
        }

        public function getBy($xparam, $xargs)
        {
            if ($xparam == "ID_TIPE_USER" || $xparam == "NIP" || $xparam == "USERNAME" || $xparam == "NAMA_LENGKAP"  || $xparam == "EMAIL")
            {
                $q = $this->db->select('*')->from('t_user')->where($xparam, $xargs)->get();
            }
            else
            {
                $q = $this->db->select('*')->from('t_user')->like($xparam, $xargs)->get();
            }

            return $q->result();
        }

        public function insertData($data)
        {
            $this->db->insert('t_user', $data);
        }

        public function updateData($xid, $data)
        {
            $this->db->where('id_user', $xid);
            $this->db->update('t_user', $data);
        }

        public function deleteData($xid)
        {
            $this->db->where('id_user', $xid);
            $this->db->delete('t_user');
        }
	}
 ?>
