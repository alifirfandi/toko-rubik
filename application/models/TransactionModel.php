<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransactionModel extends CI_Model
{
    public function readAllTransactions()
    {
        $this->db->select('transaksi.id as id_tx, transaksi.qty, transaksi.date, product.*, users.name as kasir, rubik_base.base, rubik_merk.merk,');
        $this->db->from('transaksi');
        $this->db->join('product', 'transaksi.id_product = product.id');
        $this->db->join('users', 'transaksi.cashier = users.id');
        $this->db->join('rubik_base', 'product.base = rubik_base.id');
        $this->db->join('rubik_merk', 'product.merk = rubik_merk.id');
        $this->db->order_by('transaksi.date', 'DESC');
        $data = $this->db->get();
        return $data->result_array();
    }

    public function readFiveTransactions()
    {
        $this->db->select('transaksi.*, product.name as produk,product.img as img,rubik_base.base, rubik_merk.merk, users.name as kasir');
        $this->db->from('transaksi');
        $this->db->join('product', 'transaksi.id_product = product.id');
        $this->db->join('users', 'transaksi.cashier = users.id');
        $this->db->join('rubik_base', 'product.base = rubik_base.id');
        $this->db->join('rubik_merk', 'product.merk = rubik_merk.id');
        $this->db->order_by('date', 'DESC');
        $this->db->limit(5);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function insertTransaction($raw)
    {
        $query = "INSERT INTO transaksi VALUES $raw;";
        return $this->db->query($query);
    }

    public function insertBooking($data)
    {
        return $this->db->insert('transaksi', $data);
    }

    public function rubikSold()
    {
        $this->db->select('CONCAT(product.name, " ", rubik_base.base, " ", rubik_merk.merk) as produk, SUM(transaksi.qty) as jumlah');
        $this->db->from('transaksi');
        $this->db->join('product', 'transaksi.id_product = product.id');
        $this->db->join('rubik_base', 'product.base = rubik_base.id');
        $this->db->join('rubik_merk', 'product.merk = rubik_merk.id');
        $this->db->group_by('transaksi.id_product');
        $this->db->order_by('jumlah', 'DESC');
        $this->db->limit(4);
        $data = $this->db->get();
        return $data->result_array();
    }
}
