<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Pinjam_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

     function simpan_barang()
    {
        $nama_barang    =  $this->input->post('nama_barang');
        $jumlah            =  $this->input->post('jumlah');
        $harga            =  $this->input->post('harga');
        $idbarang       = $this->db->get_where('barang',array('nama_barang'=>$nama_barang))->row_array();
        $data           = array('id_barang'=>$idbarang['id_barang'],
                                'jumlah'=>$jumlah,
                                'harga'=>$harga,
                                'status'=>'0');
        $this->db->insert('detail_invoice',$data);
    }

    function tampilkan_detail_transaksi()
    {
        $query  = " SELECT a.id_detail, b.nama_barang, a.harga, a.jumlah 
                    from detail_invoice as a join barang as b
                    WHERE b.id_barang=a.id_barang and a.status='0' 
                  ";
        return $this->db->query($query);
    }
    

    function get_no_invoice(){
        $q = $this->db->query("SELECT MAX(RIGHT(no_invoice,4)) AS kd_max FROM invoice WHERE DATE(tanggal_invoice)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dm').$kd;
    }

    function hapusitem($id_detail)
    {
        $this->db->where('id_detail',$id_detail);
        $this->db->delete('detail_invoice');
    }
    /*
     * Get pinjam by no_po
     */
    function get_pinjam($id_detail)
    {
        return $this->db->get_where('detail_invoice',array('id_detail'=>$id_detail))->row_array();
    }
        
    /*
     * Get all pinjam
     */
    function get_all_pinjam()
    {
        $this->db->order_by('no_po', 'desc');
        return $this->db->get('pinjam')->result_array();
    }
        
    /*
     * function to add new pinjam
     */
    function add_pinjam($params)
    {
        $this->db->insert('pinjam',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pinjam
     */
    function update_pinjam($no_po,$params)
    {
        $this->db->where('no_po',$no_po);
        return $this->db->update('pinjam',$params);
    }
    
    /*
     * function to delete pinjam
     */
    function delete_pinjam($no_po)
    {
        return $this->db->delete('pinjam',array('no_po'=>$no_po));
    }

      function selesai_belanja($data)
    {
        $this->db->insert('invoice',$data);
        $last_id=  $this->db->query("select no_invoice from invoice order by no_invoice desc")->row_array();
        $this->db->query("update detail_invoice set no_invoice='".$last_id['no_invoice']."' where status='0'");
        $this->db->query("update detail_invoice set status='1' where status='0'");
    }
}
