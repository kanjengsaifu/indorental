<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Barang extends CI_Controller {     
    public function __construct()     
    {         
        parent::__construct();         
        $this->load->model('barang_m','barang');
        $this->load->model('spek_m','spek');
        $this->load->model('kategori_m','kategori');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->template->load('admin/adminTemplate','admin/barang/index');
    }
 
    public function ajax_list()
    {
        $this->load->helper('url');
 
        $list = $this->barang->get_datatables();
        $data = array();
       
        $no = $_POST['start'];
        foreach ($list as $barang) {
            $no++;
            $row = array();
            $row[] = $barang->kategori;
            $row[] = $barang->serial_no;
            $row[] = $barang->nama_barang;
            $row[] = $barang->spek;
            $row[] = $barang->kondisi;
            $row[] = $barang->status;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_barang('."'".$barang->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_barang('."'".$barang->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->barang->count_all(),
                        "recordsFiltered" => $this->barang->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->barang->get_by_id($id);

        echo json_encode($data);
    }
    
    public function ajax_chain()
    {
        $data['listkategori'] = $this->barang->get_all_kategori();
        $data['listspek'] = $this->barang->get_spek();
    }

    public function ajax_add()
    {
        $this->_validate();
        
        $data = array(
                'kategori' => $this->input->post('kategori'),
                'serial_no' => $this->input->post('serial_no'),
                'nama_barang' => $this->input->post('nama_barang'),
                'spek' => $this->input->post('spek'),
                'kondisi' => $this->input->post('kondisi'),
                'status' => $this->input->post('status'),
            );
 
        $insert = $this->barang->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'kategori' => $this->input->post('kategori'),
                'serial_no' => $this->input->post('serial_no'),
                'nama_barang' => $this->input->post('nama_barang'),
                'spek' => $this->input->post('spek'),
                'kondisi' => $this->input->post('kondisi'),
                'status' => $this->input->post('status'),
            );
 
        $this->kategori->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        //delete file
        $barang = $this->barang->get_by_id($id);
        $this->barang->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function get_all_kategori()
    {
        $data['kategori'] = $this->kategori->get_all_kategori();
    }
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('kategori') == '')
        {
            $data['inputerror'][] = 'kategori';
            $data['error_string'][] = 'Field harus diisi';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}