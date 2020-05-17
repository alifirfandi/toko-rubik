<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductModel extends CI_Model
{

    public function readAllProducts()
    {
        $this->db->select('product.*, rubik_base.base, rubik_merk.merk');
        $this->db->from('product');
        $this->db->join('rubik_base', 'product.base = rubik_base.id');
        $this->db->join('rubik_merk', 'product.merk = rubik_merk.id');
        $this->db->where('product.stok != 0');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function readOneProduct($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('product')->row_array();
    }

    public function readLastProduct()
    {
        $this->db->select('product.*, rubik_base.base, rubik_merk.merk');
        $this->db->from('product');
        $this->db->join('rubik_base', 'product.base = rubik_base.id');
        $this->db->join('rubik_merk', 'product.merk = rubik_merk.id');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row_array();
    }

    public function createProduct($data)
    {
        return $this->db->insert('product', $data);
    }

    public function updateProduct($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('product', $data);
        return $this->db->affected_rows();
    }

    public function liveSearch($value)
    {
        $this->db->select('product.*, rubik_base.base, rubik_merk.merk');
        $this->db->from('product');
        $this->db->join('rubik_base', 'product.base = rubik_base.id');
        $this->db->join('rubik_merk', 'product.merk = rubik_merk.id');
        $this->db->like('product.name', $value, 'both');
        $this->db->or_like('rubik_base.base', $value, 'both');
        $this->db->or_like('rubik_merk.merk', $value, 'both');
        return $this->db->get()->result_array();
    }

    public function liveSelectOne($select)
    {
        $this->db->select('product.*, rubik_base.base, rubik_merk.merk');
        $this->db->from('product');
        $this->db->join('rubik_base', 'product.base = rubik_base.id');
        $this->db->join('rubik_merk', 'product.merk = rubik_merk.id');
        $this->db->where('product.stok != 0');
        $this->db->where($select);
        return $this->db->get()->result_array();
    }

    public function liveSelectTwo($base, $merk)
    {
        $this->db->select('product.*, rubik_base.base, rubik_merk.merk');
        $this->db->from('product');
        $this->db->join('rubik_base', 'product.base = rubik_base.id');
        $this->db->join('rubik_merk', 'product.merk = rubik_merk.id');
        $this->db->where('product.stok != 0');
        $this->db->where("product.base = $base AND product.merk = $merk");
        return $this->db->get()->result_array();
    }

    public function readAllBases()
    {
        $data = $this->db->get('rubik_base');
        return $data->result_array();
    }

    public function readAllMerks()
    {
        $data = $this->db->get('rubik_merk');
        return $data->result_array();
    }

    public function createReference($key, $data)
    {
        if ($key == 'rubik_base') {
            return $this->db->insert('rubik_base', $data);
        } else
            return $this->db->insert('rubik_merk', $data);
    }

    public function updateReference($id, $key, $data)
    {
        if ($key == 'rubik_base') {
            $this->db->where('id', $id);
            $this->db->update('rubik_base', $data);
        } else {
            $this->db->where('id', $id);
            $this->db->update('rubik_merk', $data);
        }
    }
}
