<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {

    public function __construct()
    {   
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('Invoice_m');
        $this->load->model('Barang_m');
        $this->load->model('Konsumen_m');
    }

    public function index()
    {
        $data['invoice'] = $this->Invoice_m->get_inv();
        $data['_view'] = 'admin/invoice/index';
        $this->template->load('admin/adminTemplate','admin/invoice/index',$data);
    }

    public function add_data()
     {
          $data['konsumen'] = $this->Invoice_m->get_kons();
          $data['company'] = $this->Invoice_m->get_comp();
          $data['no_invoice'] = $this->Invoice_m->get_no_invoice();
          $this->template->load('admin/adminTemplate','admin/invoice/add_data',$data);
     }

    public function add_barang()
    {
        $data['barang']=  $this->Barang_m->get_all_barang();
        $data['detail']= $this->Invoice_m->show_detail()->result();
        // $this->template->load('admin/adminTemplate','admin/invoice/add',$data);
        if(isset($_POST['submit']))
        {
            $this->Invoice_m->save_detail();
            redirect('admin/invoice/add_barang');
        }
        else
        {
            $data['barang']=  $this->Barang_m->get_all_barang();
            $data['detail']= $this->Invoice_m->show_detail()->result();
            $this->template->load('admin/adminTemplate','admin/invoice/add_barang',$data);
        }
    }

    public function del_item()
    {
        $id_detail=  $this->uri->segment(3);
        $this->Invoice_m->del_item($id_detail);
        redirect('admin/invoice/add_barang');
    }

    public function delete($no_invoice)
    {
        $invoice = $this->Invoice_m->get_inv_id($no_invoice);

        // check if the barang exists before trying to delete it
        if(isset($invoice['no_invoice']))
        {
            $this->Invoice_m->delete_inv($no_invoice);
            redirect('admin/invoice/index');
        }
        else
            show_error('The barang you are trying to delete does not exist.');
    }

    public function done()
    {
        extract($_POST);
        $data=array(
                    'no_invoice' => $no_invoice,
                    'tanggal_invoice' => $tanggal_invoice,
                    'tanggal_tempo' => $tanggal_tempo,
                    'id_konsumen' =>$id_konsumen,
                    'id_company' =>$id_company,
                    'lokasi_kirim' =>$lokasi_kirim,
                    'dp' =>$dp,
                    'metode_bayar' =>$metode_bayar
                    );
        $this->Invoice_m->done($data);
        redirect('admin/invoice');
    }

    public function read($id_invoice) {
        //$row = $this->transaksi_model->get_by_id($id);
        $sql = "SELECT a.no_invoice, a.id_konsumen, a.tanggal_invoice, a.tanggal_tempo, 
                       b.perusahaan, b.no_telp, b.email, b.alamat, 
                       c.id_barang, c.lama_sewa, d.nama_barang, c.harga, c.jumlah, 
                       d.id_kategori, 
                       e.kategori, 
                       f.id_company, f.nama_comp, f.no_telp_comp, f.email_comp, f.alamat_comp, f.logo
                       from invoice a
                       join konsumen b on a.id_konsumen = b.id_konsumen
                       join detail_invoice c on c.id_invoice = a.id_invoice
                       join barang d on c.id_barang = d.id_barang
                       join kategori e on d.id_kategori = e.id_kategori
                       join company f on f.id_company = a.id_company where a.id_invoice = '$id_invoice'";

        $row = $this->db->query($sql)->row_array();
        if ($row) {
            $data = array(
                'no_invoice' => $row['no_invoice'],
                'tanggal_invoice' => $row['tanggal_invoice'],
                'logo' => $row['logo'],
                'nama_comp' => $row['nama_comp'],
                'alamat_comp' => $row['alamat_comp'],
                'email_comp' => $row['email_comp'],
                'no_telp_comp' => $row['no_telp_comp'],
                'perusahaan' => $row['perusahaan'],
                'alamat' => $row['alamat'],
                'email' => $row['email'],
                'no_telp' => $row['no_telp'],
                'kategori' => $row['kategori'],
                'nama_barang' => $row['nama_barang'],
                'jumlah' => $row['jumlah'],
                'harga' => $row['harga'],
                'lama_sewa' => $row['lama_sewa']
                
            );
        $data['detail_table'] = $this->Invoice_m->get_detail_table($id_invoice);
            $this->template->load('admin/adminTemplate', 'admin/invoice/detail_invoice', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/invoice'));
        }
    }
}
?>