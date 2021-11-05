<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account_model extends CI_Model
{
    public function login()
    {
        $username = (string) $this->input->post('username');
        $password = (string) $this->input->post('password');
        $password = md5($password);

        $data = array(
            'username' => $username,
            'password' => $password,
        );


        $this->db->where('username', $username);
        $this->db->where('password', $password);
        // $this->db->where('status', 'active');
        $query = $this->db->get('users');
        $row = $query->row();

        if ($row) {
            $this->user_session($row);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function user_session($row)
    {
        $data = array(
            'user_id' => $row->user_id,
            'fname' => $row->fname,
            'mname' => $row->mname,
            'lname' => $row->lname,
            'xname' => $row->xname,
            'username' => $row->username,
            'role' => $row->role,
            'status' => $row->status,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($data);
    }

    public function is_logged_in()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {
            return TRUE;
        }
        return FALSE;
    }

    public function logout()
    {
       session_destroy();
    }
}

