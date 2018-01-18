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
        $data['_view'] = 'gudang/dn/detail/index';
        $this->template->load('gudang/adminTemplate','gudang/detail_dn/index',$data);
    }

    public function add_data()
     {
          $data['konsumen'] = $this->Detail_dn_m->get_kons();
          $data['dn'] = $this->Detail_dn_m->get_dn();
          $this->template->load('gudang/adminTemplate','gudang/detail_dn/add_data',$data);
     }

    public function add_barang()
    {
        $data['barang']=  $this->Detail_dn_m->get_all_barang();
        $data['detail']= $this->Detail_dn_m->show_detail()->result();
        // $this->template->load('gudang/adminTemplate','gudang/invoice/add',$data);
        if(isset($_POST['submit']))
        {
            $this->Detail_dn_m->save_detail();
            redirect('gudang/detail_dn/add_barang');
        }
        else
        {
            $data['barang']=  $this->Detail_dn_m->get_all_barang();
            $data['detail']= $this->Detail_dn_m->show_detail()->result();
            $this->template->load('gudang/adminTemplate','gudang/detail_dn/add_barang',$data);
        }
    }

    public function del_item()
    {
        $id_detail_dn=  $this->uri->segment(4);
        $this->Detail_dn_m->del_item($id_detail_dn);
        redirect('gudang/detail_dn/add_barang');
    }

    public function delete($no_invoice)
    {
        $invoice = $this->Detail_dn_m->get_inv_id($no_invoice);

        // check if the barang exists before trying to delete it
        if(isset($invoice['no_invoice']))
        {
            $this->Detail_dn_m->delete_inv($no_invoice);
            redirect('gudang/dn/detail/index');
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
        redirect('gudang/detail_dn');
    }

    public function read($id_detail_dn) {
        //$row = $this->transaksi_model->get_by_id($id);
        $sql = "SELECT b.no_dn, b.tanggal_dn, c.no_invoice, b.pengirim, c.tanggal_invoice, c.lokasi_kirim, c.dp,
                d.id_barang, e.nama_barang, e.serial_no,
                f.perusahaan, f.email, f.alamat, f.no_telp,
                g.kategori, h.spek,
                i.nama_comp, i.no_telp_comp, i.alamat_comp, i.email_comp, i.logo
                from detail_dn a 
                join surat_jalan b on a.id_dn = b.id_dn
                join invoice c on b.id_invoice = c.id_invoice
                join detail_invoice d on c.id_invoice = d.id_invoice
                join barang e on d.id_barang = e.id_barang
                join konsumen f on c.id_konsumen = f.id_konsumen
                join kategori g on e.id_kategori = g.id_kategori
                join spek h on e.id_spek = h.id_spek
                join company i on c.id_company = i.id_company where a.id_detail_dn = '$id_detail_dn'";

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
        $data['detail_table'] = $this->Detail_dn_m->get_detail_table($id_detail_dn);
            $this->template->load('gudang/adminTemplate', 'gudang/detail_dn/detail', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gudang/detail_dn'));
        }
    }

}
?>