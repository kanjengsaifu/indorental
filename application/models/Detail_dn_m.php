<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Detail_dn_m extends CI_Model {

    function get_detail_dn()
    {
        $this->db->select('a.no_dn, a.id_dn,b.no_invoice, c.perusahaan, a.tanggal_dn, b.tanggal_invoice, d.id_detail_dn');
        $this->db->from('surat_jalan a ');
        $this->db->join('detail_dn d','a.id_dn = d.id_dn');
        $this->db->join('invoice b','a.id_invoice = b.id_invoice');
        $this->db->join('konsumen c ',' b.id_konsumen = c.id_konsumen');
        $this->db->group_by('a.no_dn');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_inv_id($no_invoice)
    {
        return $this->db->get_where('invoice',array('no_invoice'=>$no_invoice))->row_array();
    }

    function get_all_barang()
    {
        $this->db->select('a.nama_barang, a.serial_no, a.status, b.kategori, c.spek');
        $this->db->from('barang a');
        $this->db->join('kategori b', 'a.id_kategori = b.id_kategori');
        $this->db->join('spek c' , 'a.id_spek = c.id_spek');
        $this->db->where('a.status',('Tersedia'));
        $query = $this->db->get();
        return $query->result_array();
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

    function get_dn()
    {
        $this->db->select('a.no_dn, a.tanggal_dn, b.no_invoice, b.tanggal_invoice');
        $this->db->from('surat_jalan a');
        $this->db->join('invoice b','a.id_invoice=b.id_invoice');
       // $this->db->where('flag', $this->session->userdata('login_office'));
        $query = $this->db->get();
        return $query->result_array();
    }

    function save_detail()
    {
        $nama_barang        =   $this->input->post('nama_barang');
        $idbarang           =   $this->db->get_where('barang',array('nama_barang'=>$nama_barang))->row_array();
        $data               =   array('id_barang'=>$idbarang['id_barang']);
        $this->db->insert('detail_dn',$data);
        $this->db->query("update barang set status='Keluar' where nama_barang='$nama_barang'");
    }

    function show_detail()
    {
        $query  ="SELECT a.id_detail_dn, b.nama_barang, b.serial_no, c.kategori, d.spek, b.id_barang
                FROM detail_dn a 
                join barang b on b.id_barang=a.id_barang
                join kategori c on b.id_kategori = c.id_kategori
                join spek d on b.id_spek = d.id_spek where a.status_pinjam='0'";
        return $this->db->query($query);
    }

    function done($data)
    {
        $no_dn          =   $this->input->post('no_dn');
        $idn            =   $this->db->get_where('surat_jalan',array('no_dn'=>$no_dn))->row_array();
        $data           =   array('id_dn'=>$idn['id_dn']);
        // $last_id        = $this->db->query("SELECT id_dn from surat_jalan order by id_dn desc")->row_array();
        $this->db->query("UPDATE detail_dn set id_dn='".$data['id_dn']."' where status_pinjam='0'");
        $this->db->query("UPDATE detail_dn set status_pinjam='1' where status_pinjam='0'");
    }

    function del_item($id_barang)
    {
        $this->db->where('id_barang',$id_barang);
        $this->db->delete('detail_dn');
        $this->db->query("UPDATE barang set status='Tersedia' where id_barang='$id_barang'");
    }

    function get_detail_table($id_dn)
    {
        $this->db->select('a.id_dn, b.id_detail_dn, c.nama_barang, c.serial_no, d.kategori, e.spek');
        $this->db->from('surat_jalan a ');
        $this->db->join('detail_dn b ',' a.id_dn = b.id_dn');
        $this->db->join('barang c ',' b.id_barang = c.id_barang');
        $this->db->join('kategori d','c.id_kategori = d.id_kategori');
        $this->db->join('spek e','c.id_spek = e.id_spek');
        $this->db->where('a.id_dn', $id_dn);
        $query = $this->db->get();
        return $query->result_array();

    }

}
?>