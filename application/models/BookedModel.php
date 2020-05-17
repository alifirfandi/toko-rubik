<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookedModel extends CI_Model {

    public function readAllBooked($id)
    {
        $this->db->select('booked.id as id_book, booked.code, booked.deadline, product.*, rubik_base.base, rubik_merk.merk');
        $this->db->from('booked');
        $this->db->join('product', 'booked.id_product = product.id');
        $this->db->join('rubik_base', 'product.base = rubik_base.id');
        $this->db->join('rubik_merk', 'product.merk = rubik_merk.id');
        $this->db->where('booked.id_user', $id);
        $this->db->order_by('booked.deadline', 'ASC');
        return $this->db->get()->result_array();
    }

    public function createBooking($data)
    {
        return $this->db->insert('booked', $data);
    }

    public function countBooked($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->count_all_results('booked');
    }

    public function searchBooked($value)
    {
        $this->db->select('booked.id as id_book, booked.code, booked.deadline, product.*, rubik_base.base, rubik_merk.merk');
        $this->db->from('booked');
        $this->db->join('product', 'booked.id_product = product.id');
        $this->db->join('rubik_base', 'product.base = rubik_base.id');
        $this->db->join('rubik_merk', 'product.merk = rubik_merk.id');
        $this->db->where('booked.code', $value);
        $this->db->order_by('booked.deadline', 'ASC');
        return $this->db->get()->row_array();
    }

    public function deleteBooking($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('booked');
    }

}