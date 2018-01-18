<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Spek extends CI_Controller {     
    public function __construct()     
    {         
        parent::__construct();         
        $this->load->model('spek_m','spek');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->template->load('admin/adminTemplate','admin/spek/index');
    }
 
    public function ajax_list()
    {
        $this->load->helper('url');
 
        $list = $this->spek->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $spek) {
            $no++;
            $row = array();
            $row[] = $spek->id_kategori;
            $row[] = $spek->spek;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_spek('."'".$spek->id_spek."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_spek('."'".$spek->id_spek."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->spek->count_all(),
                        "recordsFiltered" => $this->spek->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id_spek)
    {
        $data = $this->spek->get_by_id($id_spek);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
         
        $data = array(
                'spek' => $this->input->post('spek'),
            );
 
        $insert = $this->spek->save($data);
 
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'spek' => $this->input->post('spek'),
            );
 
        $this->spek->update(array('id_spek' => $this->input->post('id_spek')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id_spek)
    {
        //delete file
        $spek = $this->spek->get_by_id($id_spek);
        $this->spek->delete_by_id($id_spek);
        echo json_encode(array("status" => TRUE));
    }
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('spek') == '')
        {
            $data['inputerror'][] = 'spek';
            $data['error_string'][] = 'spek harus diisi';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}