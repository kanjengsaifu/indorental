<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Detail_dn extends CI_Controller {

    public function __construct()
    {   
        parent::__construct();
        $this->load->model('Detail_dn_m');
        $this->load->model('Dn_m');
    }

    public function index()
    {
        $data['detail_dn'] = $this->Detail_dn_m->get_detail_dn();
        $data['_view'] = 'admin/dn/detail/index';
        $this->template->load('admin/adminTemplate','admin/detail_dn/index',$data);
    }

    public function add_data()
     {
          $data['konsumen'] = $this->Detail_dn_m->get_kons();
          $data['dn'] = $this->Detail_dn_m->get_dn();
          $this->template->load('admin/adminTemplate','admin/detail_dn/add_data',$data);
     }

    public function add_barang()
    {
        $data['barang']=  $this->Detail_dn_m->get_all_barang();
        $data['detail']= $this->Detail_dn_m->show_detail()->result();
        // $this->template->load('admin/adminTemplate','admin/invoice/add',$data);
        if(isset($_POST['submit']))
        {
            $this->Detail_dn_m->save_detail();
            redirect('admin/detail_dn/add_barang');
        }
        else
        {
            $data['barang']=  $this->Detail_dn_m->get_all_barang();
            $data['detail']= $this->Detail_dn_m->show_detail()->result();
            $this->template->load('admin/adminTemplate','admin/detail_dn/add_barang',$data);
        }
    }

    public function del_item()
    {
        $id_barang=  $this->uri->segment(4);
        $this->Detail_dn_m->del_item($id_barang);
        redirect('admin/detail_dn/add_barang');
    }

    public function delete($no_invoice)
    {
        $invoice = $this->Detail_dn_m->get_inv_id($no_invoice);

        // check if the barang exists before trying to delete it
        if(isset($invoice['no_invoice']))
        {
            $this->Detail_dn_m->delete_inv($no_invoice);
            redirect('admin/dn/detail/index');
        }
        else
            show_error('The barang you are trying to delete does not exist.');
    }

    public function done()
    {
        extract($_POST);
        $data=array(
                    'id_dn' =>$id_dn,
                    );
        $this->Detail_dn_m->done($data);
        redirect('admin/detail_dn');
    }

    public function read($id_dn) {
        //$row = $this->transaksi_model->get_by_id($id);
        $sql = "select a.id_dn, a.no_dn, a.pengirim, a.tanggal_dn,
                b.id_detail_dn,
                c.no_invoice, c.tanggal_invoice, c.lokasi_kirim, c.dp,
                d.nama_barang, d.serial_no,
                e.perusahaan, e.email, e.alamat, e.no_telp,
                f.kategori, g.spek,
                h.nama_comp, h.no_telp_comp, h.email_comp, h.alamat_comp, h.logo
                from surat_jalan a 
                join detail_dn b on a.id_dn = b.id_dn
                join invoice c on a.id_invoice = c.id_invoice
                join barang d on b.id_barang = d.id_barang
                join konsumen e on e.id_konsumen = c.id_konsumen
                join kategori f on d.id_kategori = f.id_kategori
                join spek g on d.id_spek = g.id_spek
                join company h on c.id_company = h.id_company where a.id_dn = '$id_dn'";

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
                'serial_no' => $row['nama_barang'],
                'kategori' => $row['kategori'],
                'spek' => $row['spek']
                
            );
        $data['detail_table'] = $this->Detail_dn_m->get_detail_table($id_dn);
            $this->template->load('admin/adminTemplate', 'admin/detail_dn/detail', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/detail_dn'));
        }
    }

}
?>