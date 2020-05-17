<?php
$ci = get_instance();
$ci->load->database();

$ci->db->select('booked.id as id_book, booked.code, booked.deadline, product.*, rubik_base.base, rubik_merk.merk');
$ci->db->from('booked');
$ci->db->join('product', 'booked.id_product = product.id');
$ci->db->join('rubik_base', 'product.base = rubik_base.id');
$ci->db->join('rubik_merk', 'product.merk = rubik_merk.id');
$ci->db->order_by('booked.deadline', 'ASC');
$data = $ci->db->get()->result_array();

foreach ($data as $deadline) {
    if (intval($deadline['deadline']) < time()) {
        $ci->db->where('id', $deadline['id_book']);
        $ci->db->delete('booked');
    }
}

function sync($id)
{
    $ci = get_instance();
    $ci->load->database();

    $ci->db->where('id_user', $id);
    return $ci->db->count_all_results('booked');
}

function is_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('id')) {
        redirect('login');
    }
}

function is_admin()
{
    $ci = get_instance();
    if ($ci->session->userdata('role') == 3) {
        redirect('member');
    }
}
