<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walikelas_model extends CI_Model
{
    public function getAllWalikelas()
    {
        return $this->db->get('walikelas')->result_array();
    }

    public function getAllKelas()
    {
        return $this->db->get('kelas')->result_array();
    }

	public function getWaliKelas(){
		$query = "SELECT *
                    FROM `walikelas` JOIN `kelas`
                      ON `walikelas`.`kelas_id` = `kelas`.`id`
        ";
		return $this->db->query($query)->result_array();
	}

    public function hapusWalikelas($email, $user, $result)
    {
        $this->db->set($email);
        $this->db->where($result);
        $this->db->delete('walikelas');

        $this->db->where($user);
        $this->db->delete('user');
    }

    public function tambahWalikelas()
    {
        $name = $this->input->post('name', true);
        $email = $this->input->post('email', true);

        $data1 = [
            'name' => $name,
            'email' => $email,
            'kelas_id' => $this->input->post('kelas_id'),
            'date_created' => time()
        ];

        $data2 = [
            'name' => $name,
            'email' => $email,
            'image' => 'default.jpg',
            'password' => $email,
            'role_id' => 3,
            'is_active' => 1,
            'date_created' => time()
        ];

        $this->db->insert('walikelas', $data1);
        $this->db->insert('user', $data2);
    }

    public function editWalikelas()
    {
        $name = $this->input->post('name', true);
        $email = $this->input->post('email', true);

        $data1 = [
            'name' => $name,
            'email' => $email,
            'kelas_id' => $this->input->post('kelas_id'),
            'date_created' => time()
        ];

        $data2 = [
            'name' => $name,
            'email' => $email,
            'date_created' => time()
        ];

        $this->db->set($data1);
        $this->db->set($data2);
        $this->db->where('email', $email);
        $this->db->update('walikelas', $data1);
		$this->db->where('email', $email);
        $this->db->update('user', $data2);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            data wali kelas berhasil di ubah</div>
            ');
        redirect('walikelas');
    }
}
