<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walikelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Walikelas_model');
		$this->load->model('Siswas_model');
    }

    public function index()
    {

        $data['title'] = 'Wali Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['walikelas'] = $this->Walikelas_model->getWaliKelas();
		$data['kelas'] = $this->Siswas_model->getAllKelas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('walikelas/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function hapuswalikelas()
    {
        $email = $this->input->post('email');
        $result = $this->db->get_where('walikelas', ['email' => $email])->row_array();
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($result) {
            // jika user ada, maka hapus data walikelas
            $this->Walikelas_model->hapusWalikelas($email, $user, $result);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Walikelas berhasil dihapus!</div>
            ');
            redirect('walikelas');
        } else {
            // jika user tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Walikelas tidak ditemukan!</div>
            ');
            redirect('walikelas');
        }
    }

    public function tambahWalikelas()
    {
		$data['kelas'] = $this->Siswas_model->getAllKelas();

		$this->form_validation->set_rules('name', 'Nama', 'trim|required', [
            'required' => 'nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', [
            'required' => 'email tidak boleh kosong',
            'is_unique' => 'email ini sudah digunakan user lain',
            'valid_email' => 'email tidak valid'
        ]);
        $this->form_validation->set_rules('kelas_id', 'Kelas', 'trim|required|is_unique[walikelas.kelas_id]', [
            'required' => 'kelas binaan tidak boleh kosong',
            'is_unique' => 'kelas binaan ini sudah ada walikelasnya!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Wali Kelas';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('walikelas/tambahwalikelas', $data);
            $this->load->view('templates/footer');
        } else {
            // jika validasi lolos
            $this->Walikelas_model->tambahWalikelas();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! data walikelas berhasil ditambahkan...</div>
            ');
            redirect('walikelas');
        }
    }

    public function editWalikelas()
    {
        $email = $this->input->post('email');
        $result = $this->Walikelas_model->getAllWalikelas();

        if ($result) {
            // jika data ada

            $data['title'] = 'Edit Data Wali Kelas';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['walikelas'] = $result;
            $data['kelas'] = $this->Walikelas_model->getAllKelas();

            $this->form_validation->set_rules('name', 'Nama', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('kelas_id', 'Kelas', 'trim|required');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('walikelas/editwalikelas', $data);
                $this->load->view('templates/footer', $data);
            }
			else {
                // Edit Data Siswa
                $this->Walikelas_model->editWalikelas();
            }
        } else {
            // jika data tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Wali Kelas gagal diupdate!, data wali kelas tidak ditemukan</div>
            ');
            redirect('walikelas');
        }
    }
}
