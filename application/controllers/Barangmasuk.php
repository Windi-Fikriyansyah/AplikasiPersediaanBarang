<?php
class Barangmasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Bahan_model','Kategori_model','Satuan_model', 'Barangmasuk_model', 'Distributor_model']);
    }

    public function index()
    {
        $data['judul'] = "Barang Masuk";
        $data['kategori'] = $this->Kategori_model->tampil_data();
        $data['satuan'] = $this->Satuan_model->tampil_data();
        $data['barang'] = $this->Bahan_model->tampil_data();
        $data['cart']   = $this->cart->contents();
        $data['supplier'] = $this->Distributor_model->tampil_data();

        $tampil = $this->Barangmasuk_model->no_otomatis();
        if (empty($tampil[0]['invoice_masuk'])) {
            $no = date('Ymd') . "00001";
        } else {
            $a = date('Ymd');
            $urut = $tampil[0]['invoice_masuk'];
            $no_1 = substr($urut, 8, 5);
            $hasil = ((int)$no_1) + 1;
            $hasil_2 = sprintf('%05s', $hasil);
            $no = $a . $hasil_2;
        }
        $data['no_otomatis'] = $no;

        $this->load->view('template/header', $data);
        $this->load->view('barangmasuk/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah_keranjang()
    {
        $id = $this->input->post('id_brg');
        $jumlah = $this->input->post('jumlah');

        if ($jumlah >= 1) {
            $barang   = $this->Bahan_model->get_id($id);
            //cek apakah stok tersedia
            $stok  = $barang['stok'];
            if ($stok >= $jumlah) {
                $data = array(
                    'id'     => $barang['id_bahan'],
                    'qty'   => $jumlah,
                    'price' => $barang['harga'],
                    'name'  => $barang['nama_bahan'],
                );

                $this->cart->insert($data);
                redirect('barangmasuk');
            } else {
                $pesan = "Maaf jumlah stok kurang dari $jumlah";
                $url = base_url('barangmasuk');
                echo "<script>
                alert('$pesan');
                location='$url';
                </script>";
            }
        } else {
            $pesan = "Maaf jumlah pembelian minimal 1 buah";
            $url = base_url('barangmasuk');
            echo "<script>
                alert('$pesan');
                location='$url';
                </script>";
        }
    }

    public function hapus_data($rowid)
    {
        $this->cart->remove($rowid);
        redirect('barangmasuk');
    }

    public function delete()
    {
        $this->cart->destroy();
        redirect('barangmasuk');
    }

    public function simpan()
    {
        if ($this->input->post('distributor') == "") {
            $pesan = "Maaf..!! Data tidak boleh kosong";
            $url = base_url('barangmasuk');
            echo "<script>
                alert('$pesan');
                location='$url';
                </script>";
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
                    $this->Barangmasuk_model->simpan($_POST,$file);
                    $this->cart->destroy();
                    $pesan = "Data Berhasil Simpan.";
                    $url = base_url('barangmasuk');
                    echo "<script>
                    alert('$pesan');
                    location='$url';
                    </script>";
                } else {
                    $pesan = "Gagal simpan. File yang anda upload salah!!";
                    $url = base_url('barangmasuk');
                    echo "<script>
                        alert('$pesan');
                        location='$url';
                    </script>";
                }
            } else {
                $file = 'default.jpg';
                $this->Barangmasuk_model->simpan($_POST,$file);
                $this->cart->destroy();
                $pesan = "Data Berhasil Simpan.";
                $url = base_url('barangmasuk');
                echo "<script>
                alert('$pesan');
                location='$url';
                </script>";
            }
        }
    }

    public function cetak_struk()
    {
        $tampil = $this->Barangmasuk_model->no_otomatis();
        $id = $tampil[0]['invoice_masuk'];
        $data['barangmasuk'] = $this->Barangmasuk_model->get_barangmasuk($id);
        $data['detail_brgmasuk'] = $this->Barangmasuk_model->get_detail_brgmasuk($id);
        $this->load->view('barangmasuk/cetak', $data);
    }

    public function data_barangmasuk()
    {
        $data['judul'] = "Barang Masuk";
        $data['tampil_barangmasuk'] = $this->Barangmasuk_model->tampil_data();
        $this->load->view('template/header', $data);
        $this->load->view('barangmasuk/data_barangmasuk', $data);
        $this->load->view('template/footer');
    }

    public function cetak($id)
    {
        $data['barangmasuk'] = $this->Barangmasuk_model->get_barangmasuk($id);
        $data['detail_brgmasuk'] = $this->Barangmasuk_model->get_detail_brgmasuk($id);
        $this->load->view('barangmasuk/cetak', $data);
    }

    public function hapus($id)
    {
        $this->_deletefile($id);
        $this->Barangmasuk_model->hapus_barangmasuk($id);
        $this->Barangmasuk_model->hapus_detail_brgmasuk($id);
        $url = base_url('barangmasuk/data_barangmasuk');
        echo "<script>
                alert('Data Berhasil di Hapus');
                location='$url';
            </script>";
    }

    public function _deletefile($id)
	{
		$bkt = $this->Barangmasuk_model->get_barangmasuk($id);
		if ($bkt['bukti'] != "default.jpg") {
			$filename = explode(".", $bkt['bukti'])[0];
			return array_map('unlink', glob(FCPATH."assets/dist/foto/$filename.*")); 
            
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
