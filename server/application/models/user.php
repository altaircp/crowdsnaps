<?php
class User extends CI_Model {

    var $fbid = '';
    var $email = '';
    var $firstname = '';
    var $lastname = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('users', 10);
        return $query->result();
    }

    function insert_entry()
    {
        $this->fbid = $_GET['fbid'];
        $this->email = $_GET['email'];
        $this->firstname = $_GET['firstname'];
        $this->lastname = $_GET['lastname'];
        $this->db->insert('users', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];    
        $this->db->update('users', $this, array('id' => $_POST['id']));
    }

}
