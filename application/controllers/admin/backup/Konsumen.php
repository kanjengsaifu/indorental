<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Konsumen extends CI_Controller {     
    public function __construct()     
    {         
        parent::__construct();         
        $this->load->model('konsumen_m','konsumen');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->template->load('admin/adminTemplate','admin/konsumen/index');
    }
 
    public function ajax_list()
    {
        $this->load->helper('url');
 
        $list = $this->konsumen->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $konsumen) {
            $no++;
            $row = array();
            $row[] = $konsumen->konsumen;
            $row[] = $konsumen->perusahaan;
            $row[] = $konsumen->no_telp;
            $row[] = $konsumen->email;
            $row[] = $konsumen->alamat;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_konsumen('."'".$konsumen->id_konsumen."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_konsumen('."'".$konsumen->id_konsumen."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->konsumen->count_all(),
                        "recordsFiltered" => $this->konsumen->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id_konsumen)
    {
        $data = $this->konsumen->get_by_id($id_konsumen);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
         
        $data = array(
                'konsumen' => $this->input->post('konsumen'),
                'perusahaan' => $this->input->post('perusahaan'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
            );
 
        $insert = $this->konsumen->save($data);
 
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                 'konsumen' => $this->input->post('konsumen'),
                'perusahaan' => $this->input->post('perusahaan'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
            );
 
        $this->konsumen->update(array('id_konsumen' => $this->input->post('id_konsumen')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id_konsumen)
    {
        //delete file
        $konsumen = $this->konsumen->get_by_id($id_konsumen);
        $this->konsumen->delete_by_id($id_konsumen);
        echo json_encode(array("status" => TRUE));
    }
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('konsumen') == '')
        {
            $data['inputerror'][] = 'konsumen';
            $data['error_string'][] = 'konsumen harus diisi';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}