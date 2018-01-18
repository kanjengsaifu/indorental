<?php
class Users_m extends CI_Model{


    function authlog($username,$password)
    {
        $query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }

    function get_user($id)
    {
        return $this->db->get_where('user',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all user
     */
    function get_all_user()
    {
        $this->db->select('a.nama_lengkap, a.id, a.username, b.nama_level');
        $this->db->from('user a');
        $this->db->join('level_user b','a.id_level_user = b.id_level_user');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_level()
    {
        $query = $this->db->get('level_user')->result_array();
        return $query;
    }
        
    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('user',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user
     */
    function update_user($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('user',$params);
    }
    
    /*
     * function to delete user
     */
    function delete_user($id)
    {
        return $this->db->delete('user',array('id'=>$id));
    }
}