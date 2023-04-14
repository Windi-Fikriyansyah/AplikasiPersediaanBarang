<?php
class Barangkeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Bahan_model','Kategori_model','Satuan_model', 'Barangkeluar_model', 'Distributor_model']);
    }

    public function index()
    {
        $data['judul'] = "Barang Keluar";
        $data['kategori'] = $this->Kategori_model->tampil_data();
        $data['satuan'] = $this->Satuan_model->tampil_data();
        $data['barangkeluar'] = $this->Barangkeluar_model->tampil_data();

        $this->load->view('template/header', $data);
        $this->load->view('barangkeluar/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Barang Keluar";
        $data['barang'] = $this->Bahan_model->tampil_data();

        $tampil = $this->Barangkeluar_model->no_otomatis();
        if (empty($tampil[0]['kd_brg_keluar'])) {
            $no = date('Ymd') . "00001";
        } else {
            $a = date('Ymd');
            $urut = $tampil[0]['kd_brg_keluar'];
            $no_1 = substr($urut, 8, 5);
            $hasil = ((int)$no_1) + 1;
            $hasil_2 = sprintf('%05s', $hasil);
            $no = $a . $hasil_2;
        }
        $no_otomatis = $no;

        $this->form_validation->set_rules('bahan', 'Nama Bahan', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('barangkeluar/tambah');
            $this->load->view('template/footer');
        } else {
            $upload_foto = $_FILES['foto']['name'];
            if ($upload_foto != null) {
                $config['upload_path'] = './assets/dist/foto/'; //tempat simpan file foto
                $config['allowed_types'] = 'jpg|png|jpeg'; //mengatur type file
                $config['max_size'] = '5000'; //besar kecil ukuran file (5mb)
                $config['remove_space'] = TRUE;
                $config['overwrite'] = TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $data_image = $this->upload->data('file_name');
                    $file = $data_image;
                    $this->Barangkeluar_model->simpan($no_otomatis,$file);
                    $url = base_url('barangkeluar');
                    echo "<script>
                    alert('Data Berhasil di Simpan');
                    location='$url';
                    </script>";
                } else {
                    $pesan = "Gagal simpan. File yang anda upload salah!!";
                    $url = base_url('barangkeluar/tambah');
                    echo "<script>
                        alert('$pesan');
                        location='$url';
                    </script>";
                }
            } else {
                $file = 'default.jpg';
                $this->Barangkeluar_model->simpan($no_otomatis,$file);
                $url = base_url('barangkeluar');
                echo "<script>
                alert('Data Berhasil di Simpan');
                location='$url';
                </script>";
            }
            
        }
    }

    public function hapus($id)
    {
        $this->_deletefile($id);
        $this->Barangkeluar_model->hapus($id);
        $url = base_url('barangkeluar');
        echo "<script>
            alert('Data Berhasil di Hapus');
            location='$url';
        </script>";
    }

    public function _deletefile($id)
	{
		$bkt = $this->Barangkeluar_model->get_id($id);
		if ($bkt['bukti'] != "default.jpg") {
			$filename = explode(".", $bkt['bukti'])[0];
			return array_map('unlink', glob(FCPATH."assets/dist/foto/$filename.*")); 
            
		}
	}

    public function ubah($id)
    {
        $barang_keluar = $this->Barangkeluar_model->get_id($id);
        $data['judul'] = "Barang Keluar";
        $data['barang'] = $this->Bahan_model->tampil_data();

        $this->form_validation->set_rules('bahan', 'Nama Bahan', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            if ($barang_keluar > 0) {
                $data['ubah_barang_keluar'] = $barang_keluar;
                $this->load->view('template/header', $data);
                $this->load->view('barangkeluar/ubah', $data);
                $this->load->view('template/footer');
            } else {
                $url = base_url('barangkeluar');
                echo "<script>
                    alert('Data Tidak Ditemukan');
                    location='$url';
                </script>";
            }
        } else {
            $this->Barangkeluar_model->update($id);
            $url = base_url('barangkeluar');
            echo "<script>
                    alert('Data Berhasil Diupdate');
                    location='$url';
                </script>";
        }
    }

    public function simpan_bahan(){
        $result = $this->Bahan_model->no_otomatis();
        if (empty($result[0]['id_bahan'])) {
            $no = "BG" . "0001"; //SPL0001
        } else {
            $ket = "BG";
            $cek = $result[0]['id_bahan'];
            $urut = substr($cek, 2, 4);
            $jmlh = ((int)$urut) + 1;
            $hasil = sprintf('%04s', $jmlh);
            $no = $ket . $hasil;
        }
        $no_otomatis = $no;

        $this->Bahan_model->simpan($no_otomatis);
        redirect('barangmasuk');
    }
}
