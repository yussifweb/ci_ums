<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('account_model');
        $is_logged_in = $this->account_model->is_logged_in();

        if ($is_logged_in) {
            if ($_SESSION['role'] != USER_ROLE_ADMIN && $_SESSION['role'] != USER_ROLE_MANAGER) {
                redirect('/');
            }
        } else {
            redirect('/');
        }

        $this->load->model('user_model');
        $id = $_SESSION['user_id'];
        $data['profile'] = $this->user_model->get_profile_info($id);
    }

    public function index(){

        $data['title'] = 'Dashboard';

        $this->load->model('user_model');
        $id = $_SESSION['user_id'];
        $data['profile'] = $this->user_model->get_profile_info($id);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
    }

    public function users_list(){
        $data['title'] = 'All Users';

        $this->load->model('user_model');
        $data['users'] = $this->user_model->get_active_users();

        // var_dump($data);
        // dd($data);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/users');
        $this->load->view('admin/footer');
    }

    public function users_list_deactivated(){
        $data['title'] = 'All Inactive Users';

        $this->load->model('user_model');
        $data['users'] = $this->user_model->get_inactive_users();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/users_deactivated');
        $this->load->view('admin/footer');
    }

    public function guests_list(){
        $data['title'] = 'All Guests';

        $this->load->model('user_model');
        $data['users'] = $this->user_model->get_active_guests();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/guests');
        $this->load->view('admin/footer');
    }


    public function guests_list_deactivated(){
        $data['title'] = 'All Inactive Guests';

        $this->load->model('user_model');
        $data['users'] = $this->user_model->get_inactive_guests();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/guests_deactivated');
        $this->load->view('admin/footer');
    }

    public function add_user(){
        $data['title'] = 'Add New User';

        $this->submit_user();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/add_user');
        $this->load->view('admin/footer');
    }

    public function submit_user()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('role', 'Role', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]');

            if ($this->form_validation->run() != FALSE) {
                $this->load->model('user_model');
                $response = $this->user_model->register_user();

                if ($response) {
                    $this->session->set_flashdata('success', 'Account info submission successful.');
                } else {
                    $this->session->set_flashdata('error', 'The operation was not successful.');
                }

                redirect('admin/add_user');
            }
        }
    }


    public function edit_user($id = ''){

        $this->load->model('user_model');
        if (!$this->user_model->is_user_exist($id)) {
            redirect('admin/users_list');
        }

        $this->update_user_info();
        
        $data['title'] = 'Edit User Information';

       
        $data['user'] = $this->user_model->get_user_info($id);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/edit_user');
        $this->load->view('admin/footer');
    }

    public function update_user_info(){
        if ($this->input->post('update')) {
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('role', 'Role', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                $this->load->model('user_model');
                $response = $this->user_model->update_user();

                if ($response) {
                    $this->session->set_flashdata('success', 'User info update successful.');
                } else {
                    $this->session->set_flashdata('error', 'The update was not successful.');
                }

                redirect('admin/users_list');
            }
        }
    }

    public function deactivate_user($id){

        $this->load->model('user_model');
        if (!$this->user_model->is_user_exist($id)) {
            redirect('admin/users_list');
        }

        if ($id != $_SESSION['user_id']) {
            redirect('admin/users_list');
        }

        $response = $this->user_model->deactivate_user($id);

        if ($response) {
            $this->session->set_flashdata('success', 'User deactivation successful.');
        } else {
            $this->session->set_flashdata('error', 'The deactivation was not successful.');
        }

        redirect('admin/users_list');
    }

    public function activate_user($id){

        $this->load->model('user_model');
        if (!$this->user_model->is_user_exist($id)) {
            redirect('admin/users_list_deactivated');
        }

        $response = $this->user_model->activate_user($id);

        if ($response) {
            $this->session->set_flashdata('success', 'User activation successful.');
        } else {
            $this->session->set_flashdata('error', 'The activation was not successful.');
        }

        redirect('admin/users_list_deactivated');
    }


    public function deactivate_guest($id){

        $this->load->model('user_model');

        if (!$this->user_model->is_user_exist($id)) {
            redirect('admin/guests_list');
        }

        // if ($id != $_SESSION['user_id']) {
        //     redirect('admin/guests_list');
        // }

        $response = $this->user_model->deactivate_user($id);

        if ($response) {
            $this->session->set_flashdata('success', 'Guest deactivation successful.');
        } else {
            $this->session->set_flashdata('error', 'The deactivation was not successful.');
        }

        redirect('admin/guests_list');
    }


    public function activate_guest($id){

        $this->load->model('user_model');
        if (!$this->user_model->is_user_exist($id)) {
            redirect('admin/guests_list_deactivated');
        }

        $response = $this->user_model->activate_user($id);

        if ($response) {
            $this->session->set_flashdata('success', 'Guest activation successful.');
        } else {
            $this->session->set_flashdata('error', 'The activation was not successful.');
        }

        redirect('admin/guests_list_deactivated');
    }



    
}
