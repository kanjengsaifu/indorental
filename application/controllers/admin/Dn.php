<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dn extends CI_Controller {

    public function __construct()
    {   
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('Dn_m');
    }

    public function index()
    {
        $data['dn'] = $this->Dn_m->get_dn();
        $data['_view'] = 'admin/dn/index';
        $this->template->load('admin/adminTemplate','admin/dn/index',$data);
    }

    public function add()
     {
        $data['invoice'] = $this->Dn_m->get_invoice();
        $data['no_dn'] = $this->Dn_m->get_no_dn();
        $this->template->load('admin/adminTemplate','admin/dn/add',$data);
     }

    public function done()
    {
        extract($_POST);
        $data=array(
                    'no_dn' => $no_dn,
                    'tanggal_dn' => $tanggal_dn,
                    'no_invoice' =>$no_invoice,
                    'pengirim' =>$pengirim
                    );
        $this->Dn_m->done($data);
        redirect('admin/dn');
    }

   public function read($id_dn) {
        //$row = $this->transaksi_model->get_by_id($id);
        $sql = "SELECT a.no_dn, a.tanggal_dn, a.pengirim,
                       b.no_invoice, b.tanggal_invoice, b.lokasi_kirim, b.dp,
                       c.perusahaan, c.alamat, c.no_telp, c.email,
                       d.id_barang, d.jumlah, d.harga, d.lama_sewa,
                       e.nama_barang,
                       f.kategori,
                       g.nama_comp, g.alamat_comp, g.email_comp, g.no_telp_comp, g.logo
                from surat_jalan a
     join invoice b on a.id_invoice = b.id_invoice
     join konsumen c on b.id_konsumen = c.id_konsumen
     join detail_invoice d on b.id_invoice = d.id_invoice
     join barang e on d.id_barang = e.id_barang
    join kategori f on e.id_kategori = f.id_kategori
    join company g on b.id_company = g.id_company where a.id_dn = '$id_dn'";

        $row = $this->db->query($sql)->row_array();
        if ($row) {
            $data = array(
                'no_dn' => $row['no_dn'],
                'tanggal_dn' => $row['tanggal_dn'],
                'pengirim' => $row['pengirim'],
                'no_invoice' => $row['no_invoice'],
                'tanggal_invoice' => $row['tanggal_invoice'],
                'logo' => $row['logo'],
                'nama_comp' => $row['nama_comp'],
                'alamat_comp' => $row['alamat_comp'],
                'email_comp' => $row['email_comp'],
                'no_telp_comp' => $row['no_telp_comp'],
                'perusahaan' => $row['perusahaan'],
                'lokasi_kirim' => $row['lokasi_kirim'],
                'dp' => $row['dp'],
                'alamat' => $row['alamat'],
                'email' => $row['email'],
                'no_telp' => $row['no_telp'],
                'kategori' => $row['kategori'],
                'nama_barang' => $row['nama_barang'],
                'jumlah' => $row['jumlah'],
                'harga' => $row['harga'],
                'lama_sewa' => $row['lama_sewa']
                
            );
        $data['detail_table'] = $this->Dn_m->get_detail_table($id_dn);
            $this->template->load('admin/adminTemplate', 'admin/dn/detail_dn', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/dn'));
        }
    }
}
?>