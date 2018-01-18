<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kembali_m extends CI_Model {

    function get_detail_dn()
    {
        $this->db->select('a.no_dn, a.id_dn,b.no_invoice, c.perusahaan, a.tanggal_dn, b.tanggal_invoice, d.id_detail_dn, d.status_kembali');
        $this->db->from('surat_jalan a ');
        $this->db->join('invoice b','a.id_invoice = b.id_invoice');
        $this->db->join('detail_dn d','a.id_dn = d.id_dn');
        $this->db->join('konsumen c ',' b.id_konsumen = c.id_konsumen');
        $this->db->where('d.status_kembali','0');
        $this->db->group_by('a.no_dn');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_idn($id_dn)
    {
        return $this->db->get_where('detail_dn',array('id_dn'=>$id_dn))->row_array();
    }

    function barang_pinjam($id_dn)
    {
        $this->db->select('a.id_dn, b.id_detail_dn, b.id_dn, c.nama_barang, c.serial_no, d.kategori, e.spek');
        $this->db->from('surat_jalan a');
        $this->db->join('detail_dn b ',' a.id_dn = b.id_dn');
        $this->db->join('barang c ',' b.id_barang = c.id_barang');
        $this->db->join('kategori d ',' c.id_kategori = d.id_kategori');
        $this->db->join('spek e ',' c.id_spek = e.id_spek');
        $this->db->where('a.id_dn' , $id_dn);
        $this->db->last_query();
        $query = $this->db->get();
        return $query->result_array();  
    }

    function save_detail()
    {
        $nama_barang        =   $this->input->post('nama_barang');
        $keterangan         =   $this->input->post('keterangan');
        $idbarang           =   $this->db->get_where('barang',array('nama_barang'=>$nama_barang))->row_array();
        $data               =   array('id_barang'=>$idbarang['id_barang'],
                                       'keterangan' =>$keterangan);
        $this->db->insert('detail_kembali',$data);
        // $this->db->query("update barang set status='Tersedia' where nama_barang='$nama_barang'");
        // $this->db->query("update detail_dn set status_kembali= '1' where id_barang='$id_barang'");
    }

    function show_detail()
    {
        $query  ="SELECT a.id_kembali, c.id_barang, c.nama_barang, c.serial_no, d.kategori, e.spek, a.keterangan, a.status 
                from detail_kembali a 
                join barang c on a.id_barang = c.id_barang 
                join kategori d on c.id_kategori = d.id_kategori 
                join spek e on c.id_spek = e.id_spek 
                where a.status = '0'";
        return $this->db->query($query);
    }

    function done($data)
    {
        $id_dn          =   $this->input->post('id_dn');
        $idn            =   $this->db->get_where('surat_jalan',array('id_dn'=>$id_dn))->row_array();
        $data           =   array('id_dn'=>$idn['id_dn']);
        // $last_id        =   $this->db->query("SELECT id_dn from surat_jalan order by id_dn desc")->row_array();
        $this->db->query("UPDATE detail_kembali set id_dn='".$data['id_dn']."' where status='0'");
        $this->db->query("UPDATE detail_dn set status_kembali='1' where status_kembali='0'");
    }

    function del_item($id_detail_dn)
    {
        $this->db->where('id_detail_dn',$id_detail_dn);
        $this->db->delete('detail_dn');
        $this->db->query("UPDATE barang set status='Tersedia' where id_barang='$id_barang'");
    }

}
?>