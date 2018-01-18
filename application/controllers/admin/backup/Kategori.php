<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Kategori extends CI_Controller {     
    public function __construct()     
    {         
        parent::__construct();         
        $this->load->model('kategori_m','kategori');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->template->load('admin/adminTemplate','admin/kategori/index');
    }
 
    public function ajax_list()
    {
        $this->load->helper('url');
 
        $list = $this->kategori->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $kategori) {
            $no++;
            $row = array();
            $row[] = $kategori->kategori;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kategori('."'".$kategori->id_kategori."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kategori('."'".$kategori->id_kategori."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->kategori->count_all(),
                        "recordsFiltered" => $this->kategori->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id_kategori)
    {
        $data = $this->kategori->get_by_id($id_kategori);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
         
        $data = array(
                'kategori' => $this->input->post('kategori'),
            );
 
        $insert = $this->kategori->save($data);
 
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'kategori' => $this->input->post('kategori'),
            );
 
        $this->kategori->update(array('id_kategori' => $this->input->post('id_kategori')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id_kategori)
    {
        //delete file
        $kategori = $this->kategori->get_by_id($id_kategori);
        $this->kategori->delete_by_id($id_kategori);
        echo json_encode(array("status" => TRUE));
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
            $data['error_string'][] = 'Kategori harus diisi';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}