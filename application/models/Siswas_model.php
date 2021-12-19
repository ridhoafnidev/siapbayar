<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswas_model extends CI_Model
{

    public function getAllSiswa()
    {
        $query = "SELECT *
                    FROM `kelas` JOIN `data_siswa`
                      ON `kelas`.`id` = `data_siswa`.`kelas_id`
        ";

        return $this->db->query($query)->result_array();
    }

    public function getAllWalikelas()
    {
        return $this->db->get('walikelas')->result_array();
    }

    public function getAllKelas()
    {
        return $this->db->get('kelas')->result_array();
    }


    public function getAllTransaksi()
    {
        $query = "SELECT *
                    FROM `data_siswa` JOIN `transaksi`
                      ON `data_siswa`.`id`= `transaksi`.`id_siswa` 
        ";

		return $this->db->query($query)->result_array();
    }

    public function getAllTransaksiInYearsPersen()
    {
		$currentYears = date('Y');
        $queryTransaksi = "SELECT *
                    FROM `data_siswa` JOIN `transaksi`
                      ON `data_siswa`.`id`= `transaksi`.`id_siswa` 
					WHERE `transaksi`.`tahun_bayar` = '$currentYears'
        ";

		$querySiswa = "SELECT *
                    FROM `kelas` JOIN `data_siswa`
                      ON `kelas`.`id` = `data_siswa`.`kelas_id`
        ";

		$dataTransaksi = count($this->db->query($queryTransaksi)->result_array());
		$dataSiswa = count($this->db->query($querySiswa)->result_array());

		return $dataTransaksi / $dataSiswa * 100;

    }

	public function getAllCountTransaksi() {
		$query = "SELECT id_siswa, SUM(jmlh_bayar) AS total 
		FROM transaksi 
		GROUP BY id_siswa";

		return $this->db->query($query)->result_array();
	}

	public function getTransaksiStatusLunas(){
		$currentYears = date('Y');
		$query = "SELECT *
                    FROM `data_siswa` JOIN `transaksi`
                      ON `data_siswa`.`id`= `transaksi`.`id_siswa` 
					WHERE `transaksi`.`status` = 'Lunas'
					AND `transaksi`.`tahun_bayar` = '$currentYears'
        ";

		return count($this->db->query($query)->result_array());
	}

	public function getTransaksiStatusBelumLunas(){
		$currentYears = date('Y');
		$query = "SELECT *
                    FROM `data_siswa` JOIN `transaksi`
                      ON `data_siswa`.`id`= `transaksi`.`id_siswa` 
					WHERE `transaksi`.`status` = 'Belum Lunas'
					AND `transaksi`.`tahun_bayar` = '$currentYears'
        ";

		return count($this->db->query($query)->result_array());
	}

	public function getTransaksiStatusBayarSetengah(){
		$currentYears = date('Y');
		$query = "SELECT *
                    FROM `data_siswa` JOIN `transaksi`
                      ON `data_siswa`.`id`= `transaksi`.`id_siswa` 
					WHERE `transaksi`.`status` = 'Bayar Setengah'
					AND `transaksi`.`tahun_bayar` = '$currentYears'
        ";

		return count($this->db->query($query)->result_array());
	}

	public function getAllTransaksiInYears(){
		$currentMounth = date('Y');
		$queryJanuari = "SELECT SUM(jmlh_bayar) as total
			FROM transaksi 
			WHERE bulan_bayar = 'Januari'
			AND tahun_bayar = '$currentMounth'
		";
		$sumJanuari = $this->db->query($queryJanuari)->result_array();

		$queryFebruari = "SELECT SUM(jmlh_bayar) as total
			FROM transaksi 
			WHERE bulan_bayar = 'Februari'
			AND tahun_bayar = '$currentMounth'
		";
		$sumFebruari = $this->db->query($queryFebruari)->result_array();

		$queryMaret = "SELECT SUM(jmlh_bayar) as total
			FROM transaksi 
			WHERE bulan_bayar = 'Maret'
			AND tahun_bayar = '$currentMounth'
		";
		$sumMaret = $this->db->query($queryMaret)->result_array();

		$queryApril = "SELECT SUM(jmlh_bayar) as total
			FROM transaksi 
			WHERE bulan_bayar = 'April'
			AND tahun_bayar = '$currentMounth'
		";
		$sumApril = $this->db->query($queryApril)->result_array();

		$queryMei = "SELECT SUM(jmlh_bayar) as total
			FROM transaksi 
			WHERE bulan_bayar = 'Mei'
			AND tahun_bayar = '$currentMounth'
		";
		$sumMei = $this->db->query($queryMei)->result_array();

		$queryJuni = "SELECT SUM(jmlh_bayar) as total
			FROM transaksi 
			WHERE bulan_bayar = 'Juni'
			AND tahun_bayar = '$currentMounth'
		";
		$sumJuni = $this->db->query($queryJuni)->result_array();

		$queryJuli = "SELECT SUM(jmlh_bayar) as total
			FROM transaksi 
			WHERE bulan_bayar = 'Juli'
			AND tahun_bayar = '$currentMounth'
		";
		$sumJuli = $this->db->query($queryJuli)->result_array();

		$queryAgustus = "SELECT SUM(jmlh_bayar) as total
			FROM transaksi 
			WHERE bulan_bayar = 'Agustus'
			AND tahun_bayar = '$currentMounth'
		";
		$sumAgustus = $this->db->query($queryAgustus)->result_array();

		$querySeptember = "SELECT SUM(jmlh_bayar) as total
			FROM transaksi 
			WHERE bulan_bayar = 'September'
			AND tahun_bayar = '$currentMounth'
		";
		$sumSeptember = $this->db->query($querySeptember)->result_array();

		$queryOktober = "SELECT SUM(jmlh_bayar) as total
			FROM transaksi 
			WHERE bulan_bayar = 'Oktober'
			AND tahun_bayar = '$currentMounth'
		";
		$sumOktober = $this->db->query($queryOktober)->result_array();

		$queryNovember = "SELECT SUM(jmlh_bayar) as total
			FROM transaksi 
			WHERE bulan_bayar = 'November'
			AND tahun_bayar = '$currentMounth'
		";
		$sumNovember = $this->db->query($queryNovember)->result_array();

		$queryDesember = "SELECT SUM(jmlh_bayar) as total
			FROM transaksi 
			WHERE bulan_bayar = 'Desember'
			AND tahun_bayar = '$currentMounth'
		";
		$sumDesember = $this->db->query($queryDesember)->result_array();

		return array($sumJanuari[0]['total'], $sumFebruari[0]['total'], $sumMaret[0]['total'], $sumApril[0]['total'], $sumMei[0]['total'], $sumJuni[0]['total'], $sumJuli[0]['total'], $sumAgustus[0]['total'], $sumSeptember[0]['total'], $sumOktober[0]['total'], $sumNovember[0]['total'], $sumDesember[0]['total']);
	}

	public function getMounthCountTransaksi() {
		$mounthNow = $this->converMounthIndo(date('m'));
		$query = "SELECT SUM(jmlh_bayar) as total
		FROM transaksi
		WHERE bulan_bayar = '$mounthNow'";

		return $this->db->query($query)->result_array();
	}

	public function getYearsCountTransaksi(){
		$currentYears = date('Y');

		$query = "SELECT SUM(jmlh_bayar) as total
		FROM transaksi 
		WHERE tahun_bayar = $currentYears";

		return$this->db->query($query)->result_array();
	}

    public function getTransaksi()
    {
        return $this->db->get('transaksi')->result_array();
    }

    public function getAllIuran()
    {
        return $this->db->get('iuran')->result_array();
    }

    public function getSiswaByNik($nik)
    {
        return $this->db->get_where('data_siswa', ['nik' => $nik])->row_array();
    }

    public function getSiswaById($id)
    {
        return $this->db->get_where('data_siswa', ['id' => $id])->row_array();
    }

    public function tambahSiswa()
    {
        $data = [
            'nik'              => $this->input->post('nik', true),
            'nok'              => $this->input->post('nok', true),
            'nama_siswa'       => $this->input->post('nama_siswa', true),
            'jenis_kelamin'    => $this->input->post('jenis_kelamin', true),
            'kelas_id'         => $this->input->post('kelas_id', true),
            'nama_ayah'        => $this->input->post('nama_ayah', true),
            'nama_ibu'         => $this->input->post('nama_ibu', true),
            'alamat_ortu'      => $this->input->post('alamat_ortu', true)
        ];

        $this->db->insert('data_siswa', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! data siswa berhasil di tambah</div>
            ');
        redirect('siswa');
    }


    public function tambahTransaksi()
    {
        $jumlahBayar    = $this->input->post('jmlh_bayar');
        $bulanBayar     = $this->input->post('bulan_bayar');
        $tahunBayar     = $this->input->post('tahun_bayar');
        $cek            = $this->db->get_where('iuran', ['bulan_bayar' => $bulanBayar, 'tahun' => $tahunBayar])->row_array();

            if (!$cek) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                data iuran untuk bulan <strong>' . $bulanBayar . '</strong> tahun <strong>' . $tahunBayar . '</strong> belum di tambah, silahkan lakukan tambah data di master</div>');
                redirect('siswa');

            } else {
                
                $sisa   = $cek['jmlh_bayar_lunas'] - $jumlahBayar;
                    
                    if($sisa <= 0){
                        $status = 'Lunas';

                    }else {
                        $status = 'Belum Lunas';
                    }
                }


        $data = [
            'id_siswa'          => $this->input->post('id', true),
            'bulan_bayar'       => $this->input->post('bulan_bayar', true),
            'tahun_bayar'       => $this->input->post('tahun_bayar', true),
            'jmlh_bayar'        => $this->input->post('jmlh_bayar', true),
            'status'            => $status,
            'sisa'              => $sisa,
            'tgl_bayar'         => time(),
            'nama_petugas'      => $this->input->post('nama_petugas', true)
        ];

        $this->db->insert('transaksi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! data transaksi siswa berhasil di tambah</div>
            ');
        redirect('siswa');
    }

    public function editSiswa($nik)
    {
        $data = [
            'nik'           => $this->input->post('nik', true),
            'nok'           => $this->input->post('nok', true),
            'nama_siswa'    => $this->input->post('nama_siswa', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'kelas_id'      => $this->input->post('kelas_id', true),
            'nama_ayah'     => $this->input->post('nama_ayah', true),
            'nama_ibu'      => $this->input->post('nama_ibu', true),
            'alamat_ortu'   => $this->input->post('alamat_ortu', true)
        ];

        $this->db->set($data);
        $this->db->where('nik', $nik);
        $this->db->update('data_siswa', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            data siswa berhasil di ubah</div>
            ');
        redirect('siswa');
    }

    public function hapusSiswa($nik)
    {
        $result = $this->db->get_where('data_siswa', ['nik' => $nik])->row_array();

        if (!$result) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Data siswa gagal dihapus! data tidak ditemukan</div>
                ');
            redirect('siswa');
        } else {
            $this->db->where('nik', $nik);
            $this->db->delete('data_siswa');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Siswa Berhasil dihapus!</div>
                ');
            redirect('siswa');
        }
    }

	public function getCurrentMounth(){
		return $this->converMounthIndo(date('m'));
	}

	public function converMounthIndo($mounth){
		switch ($mounth){
			case 1 :
				return "Januari";
			case 2 :
				return "Februari";
			case 3 :
				return "Maret";
			case 4 :
				return "April";
			case 5 :
				return "Mei";
			case 6 :
				return "Juni";
			case 7 :
				return "Juli";
			case 8 :
				return "Agustus";
			case 9 :
				return "September";
			case 10 :
				return "Oktober";
			case 11 :
				return "November";
			case 12 :
				return "Desember";
		}
	}
}
