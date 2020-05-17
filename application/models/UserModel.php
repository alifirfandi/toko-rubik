<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function readAllUsers()
    {
        $this->db->select('users.*, roles.role');
        $this->db->from('users');
        $this->db->join('roles', 'users.role = roles.id');
        return $this->db->get() -> result_array();
    }

    public function readAllForCashier()
    {
        $this->db->select('users.*, roles.role');
        $this->db->from('users');
        $this->db->join('roles', 'users.role = roles.id');
        $this->db->where('users.role != 1 AND users.role != 2');
        return $this->db->get() -> result_array();
    }

    public function readOneUser($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('users') -> row_array();
    }

    public function login($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('users') -> row_array();
    }

    public function updateUser($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }

    public function createUser($data)
    {
        return $this->db->insert('users', $data);
    }

    public function setActive($id)
	{
		$data = [
            'is_active' => '1',
        ];
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function setInactive($id)
	{
		$data = [
            'is_active' => '0',
        ];
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function readAllRoles()
    {
        $data = $this->db->get('roles');
        return $data->result_array();
    }
}