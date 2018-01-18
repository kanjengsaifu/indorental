<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kembali extends CI_Controller {

    public function __construct()
    {   
        parent::__construct();
        $this->load->model('Detail_dn_m');
        $this->load->model('Kembali_m');
    }

    public function index()
    {
        $data['detail_dn'] = $this->Kembali_m->get_detail_dn();
        $data['_view'] = 'admin/dn/kembali/index';
        $this->template->load('admin/adminTemplate','admin/kembali/index',$data);
    }

    public function add($id_dn)
    {
        $data['dn'] = $this->Kembali_m->get_idn($id_dn);
        $id_dn = $this->uri->segment(4);
        $data['barang']= $this->Kembali_m->barang_pinjam($id_dn);
        $data['detail']= $this->Kembali_m->show_detail()->result();
        $this->template->load('admin/adminTemplate','admin/kembali/add',$data, $id_dn);
    }

    public function addto()
    {
        // $data['id_dn'] = $this->input->get($id_dn);
        $this->Kembali_m->save_detail();
        redirect('admin/kembali/add/'.$data['id_dn']);
    }

    public function del_item()
    {
        $id_detail_dn=  $this->uri->segment(4);
        $this->Detail_dn_m->del_item($id_detail_dn);
        redirect('admin/kembali/add_barang');
    }

    public function delete($no_invoice)
    {
        $invoice = $this->Detail_dn_m->get_inv_id($no_invoice);

        // check if the barang exists before trying to delete it
        if(isset($invoice['no_invoice']))
        {
            $this->Detail_dn_m->delete_inv($no_invoice);
            redirect('admin/dn/kembali/index');
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
        $this->Kembali_m->done($data);
        redirect('admin/kembali');
    }

}
?>