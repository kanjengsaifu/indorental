<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dn_m extends CI_Model {

    function get_no_dn(){
        $q = $this->db->query("SELECT MAX(RIGHT(no_dn,4)) AS kd_max FROM surat_jalan WHERE DATE(tanggal_dn)=CURDATE()");
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
        return 'DN/' .$kd .date('/dmy');
    }

    function get_dn()
    {
        $this->db->select('a.no_dn, a.id_dn,  b.no_invoice, a.tanggal_dn, c.perusahaan');
        $this->db->from('surat_jalan a');
        $this->db->join('invoice b', 'a.id_invoice = b.id_invoice');
        $this->db->join('konsumen c', 'b.id_konsumen = c.id_konsumen');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_inv_id($no_invoice)
    {
        return $this->db->get_where('invoice',array('no_invoice'=>$no_invoice))->row_array();
    }

    function get_invoice()
    {
        $this->db->select('a.no_invoice, a.id_konsumen, b.perusahaan');
        $this->db->from('invoice a');
        $this->db->join('konsumen b','a.id_konsumen=b.id_konsumen');
       // $this->db->where('flag', $this->session->userdata('login_office'));
        $query = $this->db->get();
         return $query->result_array();
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

   function delete_inv($id_dn)
    {
        return $this->db->delete('invoice',array('no_invoice'=>$id_dn));
    }

     function done($data)
    {
        $no_dn = $this->input->post('no_dn');
        $tanggal_dn = $this->input->post('tanggal_dn');
        $pengirim = $this->input->post('pengirim');
        $no_invoice        =   $this->input->post('no_invoice');
        $idinvo           =   $this->db->get_where('invoice',array('no_invoice'=>$no_invoice))->row_array();
        $data               =   array(
                                        'id_invoice'=>$idinvo['id_invoice'],
                                        'no_dn'=>$no_dn,
                                        'tanggal_dn'=>$tanggal_dn,
                                        'pengirim'=>$pengirim
                                        );
        $this->db->insert('surat_jalan',$data);
    }


    function get_detail_table($no_invoice)
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