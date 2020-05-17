<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContactModel extends CI_Model
{
    public function readAllMessage()
    {
        return $this->db->get('contact')->result_array();
    }

    public function sendMessage($data)
    {
        $this->db->insert('contact', $data);
        return $this->db->insert_id();
    }

    public function deleteMessage($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('contact');
    }

    public function deleteAllMessage()
    {
        return $this->db->truncate('contact');
    }
}