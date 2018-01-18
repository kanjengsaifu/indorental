<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_m extends CI_Model {

    function get_no_invoice(){
        $q = $this->db->query("SELECT MAX(RIGHT(no_invoice,4)) AS kd_max FROM invoice WHERE DATE(tanggal_invoice)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'INV/' .$kd .date('/dmy');
    }

    function get_inv()
    {
        $this->db->select('a.id_invoice, a.no_invoice, b.perusahaan, a.tanggal_invoice, a.tanggal_tempo');
        $this->db->from('invoice a');
        $this->db->join('konsumen b', 'a.id_konsumen = b.id_konsumen');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_inv_id($id_invoice)
    {
        return $this->db->get_where('invoice',array('id_invoice'=>$id_invoice))->row_array();
    }

    function get_kons()
    {
        $this->db->select('a.id_konsumen, b.perusahaan, b.email, b.no_telp, b.alamat');
        $this->db->from('invoice a');
        $this->db->join('konsumen b','a.id_konsumen=b.id_konsumen');
       // $this->db->where('flag', $this->session->userdata('login_office'));
        $query = $this->db->get();
        return $this->db->get('konsumen')->result_array();
    }

    function get_comp()
    {
        $this->db->select('a.id_company, b.nama_comp, b.email_comp, b.no_telp_comp, b.alamat_comp');
        $this->db->from('invoice a');
        $this->db->join('company b','a.id_company=b.id_company');
       // $this->db->where('flag', $this->session->userdata('login_office'));
        $query = $this->db->get();
        return $this->db->get('company')->result_array();
    }

    function save_detail()
    {
        $nama_barang        =   $this->input->post('nama_barang');
        $jumlah             =   $this->input->post('jumlah');
        $harga              =   $this->input->post('harga');
        $lama_sewa          =   $this->input->post('lama_sewa');
        $idbarang           =   $this->db->get_where('barang',array('nama_barang'=>$nama_barang))->row_array();
        $data               =   array('id_barang'=>$idbarang['id_barang'],
                                'jumlah'=>$jumlah,
                                'lama_sewa'=>$lama_sewa,
                                'harga'=>$harga);
        $this->db->insert('detail_invoice',$data);
    }

    function show_detail()
    {
        $query  ="SELECT a.id_detail, a.jumlah, a.harga, b.nama_barang, a.lama_sewa
                FROM detail_invoice as a join barang as b
                WHERE b.id_barang=a.id_barang and a.status='0'";
        return $this->db->query($query);
    }

   function delete_inv($id_invoice)
    {
        return $this->db->delete('invoice',array('id_invoice'=>$id_invoice));
    }

     function done($data)
    {
        $this->db->insert('invoice',$data);
        $last_id = $this->db->query("select id_invoice from invoice order by id_invoice desc")->row_array();
        $this->db->query("update detail_invoice set id_invoice='".$last_id['id_invoice']."' where status='0'");
        $this->db->query("update detail_invoice set status='1' where status='0'");
    }


    function del_item($id_detail)
    {
        $this->db->where('no_invoice',$id_detail);
        $this->db->delete('detail_invoice');
    }

    function get_detail_table($id_invoice)
    {
        $this->db->select('a.no_invoice, b.id_detail, b.jumlah, b.harga, b.lama_sewa, c.id_barang, c.nama_barang, d.id_kategori, d.kategori');
        $this->db->from('invoice a');
        $this->db->join('detail_invoice b','a.id_invoice = b.id_invoice');
        $this->db->join('barang c','b.id_barang = c.id_barang');
        $this->db->join('kategori d','c.id_kategori = d.id_kategori');
        $query = $this->db->get();
        return $query->result_array();

    }

}
?>