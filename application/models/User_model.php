<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
public function register()
{
    $fname = (string) $this->input->post('fname');
    $mname = (string) $this->input->post('mname');
    $lname = (string) $this->input->post('lname');
    $xname = (string) $this->input->post('xname');
    $username = (string) $this->input->post('username');
    $password = (string) $this->input->post('password');
    $password = md5($password);

    $data = array(
        'fname' => $fname,
        'mname' => $mname,
        'lname' => $lname,
        'xname' => $xname,
        'username' => $username,
        'password' => $password,
        'role' => USER_ROLE_VISITOR
    );

    $response = $this->db->insert('users', $data);

    if ($response) {
        return $this->db->insert_id();
    }else {
        return FALSE;
    }
}

public function get_profile_info($id)
{
    $this->db->where('user_id', $id);
    $query = $this->db->get('users');
    $row = $query->row();

    if ($row) {
       $row->person_info = $this->get_person_info($id);
       $row->p_lang = $this->get_skill_info($id);
    }
    return $row;
}
 
public function get_person_info($id)
{
    $this->db->where('user_id', $id);
    $query = $this->db->get('person_info');
    $row = $query->row();

    if (empty($row)) {
        $row = array(
            'dob' => '',
            'pob' => '',
            'gender' => '',
            'status' => '',
            'email' => '',
            'contact' => '',
            'photo' => ''
        );
    
    }

    return (object) $row;
}

public function get_skill_info($id)
{

    $this->db->where('user_id', $id);
    $query = $this->db->get('p_langs');
    $row = $query->row();

        if (empty($row)) {
            $row = array(
                'p_langs' => '',
                'b_fmwks' => '',
                'f_fmwks' => ''
            );
        }

    return (object) $row;
}


    public function update_user_info()
    {
        $user_id = (int) $this->input->post('user_id');
        $fname = (string) $this->input->post('fname');
        $mname = (string) $this->input->post('mname');
        $lname = (string) $this->input->post('lname');
        $xname = (string) $this->input->post('xname');

        $data = array(
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'xname' => $xname,
        );

        $this->db->where('user_id', $user_id);
        $response = $this->db->update('users', $data);

        if ($response) {
            $this->update_profile_info();
            return $user_id;
        } else {
            return FALSE;
        }
    }

    public function update_profile_info()
    {
        $user_id = (int) $this->input->post('user_id');
        $dob = (string) $this->input->post('dob');
        $pob = (string) $this->input->post('pob');
        $status = (string) $this->input->post('status');
        $gender = (string) $this->input->post('gender');
        $email = (string) $this->input->post('email');
        $contact = (string) $this->input->post('contact');

        $data = array(
            'user_id' => $user_id,
            'dob' => $dob,
            'pob' => $pob,
            'status' => $status,
            'gender' => $gender,
            'email' => $email,
            'contact' => $contact,

        );

        if ($this->if_exist_person_info($user_id)) {
            $this->db->where('user_id', $user_id);
            $response = $this->db->update('person_info', $data);

            if ($response) {
                return $user_id;
            } else {
                return FALSE;
            }
        }else {
            $response = $this->db->insert('person_info', $data);

            if ($response) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        }
    }


    public function if_exist_person_info($user_id)
    {

        $this->db->where('user_id', $user_id);
        $query = $this->db->get('person_info');
        $row = $query->row();

        if ($row) {
            return TRUE;
        }

        return FALSE;
    }


    public function update_skill_info()
    {
        $user_id = (int) $this->input->post('user_id');
        $p_langs = (string) $this->input->post('p_langs');
        $b_fmwks = (string) $this->input->post('b_fmwks');
        $f_fmwks = (string) $this->input->post('f_fmwks');

        $data = array(
            'user_id' => $user_id,
            'p_langs' => $p_langs,
            'b_fmwks' => $b_fmwks,
            'f_fmwks' => $f_fmwks,

        );

        if ($this->if_exist_skill_info($user_id)) {
            $this->db->where('user_id', $user_id);
            $response = $this->db->update('p_langs', $data);

            if ($response) {
                return $user_id;
            } else {
                return FALSE;
            }
        } else {
            $response = $this->db->insert('p_langs', $data);

            if ($response) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        }
    }

    public function if_exist_skill_info($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('p_langs');
        $row = $query->row();

        if ($row) {
            return TRUE;
        }

        return FALSE;
    }


    public function update_profile_pic($file_name)
    {
        $user_id = (int) $this->input->post('user_id');

        $this->del_prev_pic($user_id);
        $data = array(
            'user_id' => $user_id,
            'photo' => $file_name
        );

        if ($this->if_exist_person_info($user_id)) {
            $this->db->where('user_id', $user_id);
            $response = $this->db->update('person_info', $data);

            if ($response) {
                return $user_id;
            } else {
                return FALSE;
            }
        } else {
            $response = $this->db->insert('person_info', $data);

            if ($response) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        }
    }


    public function del_prev_pic($user_id){
        $data = $this->get_person_info($user_id);

        if (isset($data->photo) && !empty($data->photo)) {
            $file_name = './uploads/' . $data->photo;
            if (file_exists($file_name)) {
                return unlink($file_name);
            }
        }
        return TRUE;
    }


    // ADMIN ADD USER

    public function register_user()
    {
        $fname = (string) $this->input->post('fname');
        $mname = (string) $this->input->post('mname');
        $lname = (string) $this->input->post('lname');
        $xname = (string) $this->input->post('xname');
        $username = (string) $this->input->post('username');
        $password = (string) $this->input->post('password');
        $password = md5($password);
        $role = (string) $this->input->post('role');

        $data = array(
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'xname' => $xname,
            'username' => $username,
            'password' => $password,
            'role' => $role
        );

        $response = $this->db->insert('users', $data);

        if ($response) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function get_active_users()
    {
        $this->db->where('status', 'active');

        $this->db->group_start();
            $this->db->where('role', USER_ROLE_ADMIN);
            $this->db->or_where('role', USER_ROLE_MANAGER);
        $this->db->group_end();

        $query = $this->db->get('users');
        $result = $query->result();

        return $result;
    }

    public function get_user_info($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('users');
        $row = $query->row();

        return $row;
    }


    public function update_user(){

        $user_id = (int) $this->input->post('user_id');

        $fname = (string) $this->input->post('fname');
        $mname = (string) $this->input->post('mname');
        $lname = (string) $this->input->post('lname');
        $xname = (string) $this->input->post('xname');
        $username = (string) $this->input->post('username');
        $role = (string) $this->input->post('role');

        $data = array(
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'xname' => $xname,
            'username' => $username,
            'role' => $role
        );

        $this->db->where('user_id', $user_id);
        $response = $this->db->update('users', $data);

        if ($response) {
            return $user_id;
        } else {
            return FALSE;
        }
    }

    public function get_inactive_users()
    {
        $this->db->where('status', 'inactive');

        $this->db->group_start();
        $this->db->where('role', USER_ROLE_ADMIN);
        $this->db->or_where('role', USER_ROLE_MANAGER);
        $this->db->group_end();

        $query = $this->db->get('users');
        $result = $query->result();

        return $result;
    }

    public function deactivate_user($id)
    {

        $data = array(
            'status' => 'inactive'
        );

        $this->db->where('user_id', $id);
        $response = $this->db->update('users', $data);

        if ($response) {
            return $id;
        } else {
            return FALSE;
        }
    }

    public function activate_user($id)
    {

        $data = array(
            'status' => 'active'
        );

        $this->db->where('user_id', $id);
        $response = $this->db->update('users', $data);

        if ($response) {
            return $id;
        } else {
            return FALSE;
        }
    }


    public function get_active_guests()
    {
        $this->db->where('status', 'active');
        $this->db->where('role', USER_ROLE_VISITOR);

        $query = $this->db->get('users');
        $result = $query->result();

        return $result;
    }

    public function get_inactive_guests()
    {
        $this->db->where('status', 'inactive');
        $this->db->where('role', USER_ROLE_VISITOR);

        $query = $this->db->get('users');
        $result = $query->result();

        return $result;
    }


    public function is_user_exist($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('users');
        $row = $query->row();

        // return $row;

        if ($row) {
           return TRUE;
        }
        return FALSE;
    }

    public function is_user_active($id)
    {
        $this->db->where('user_id', $id);
        $this->db->where('status', 'active');
        $query = $this->db->get('users');
        $row = $query->row();

        if ($row) {
            return TRUE;
        }
        return FALSE;
    }

}
