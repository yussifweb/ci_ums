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
        $id = $_SESSION['user_id'];
        $data['profile'] = $this->user_model->get_profile_info($id);

        // var_dump($data);
        // dd($data);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/users');
        $this->load->view('admin/footer');
    }

    public function users_list_deactivated(){
        $data['title'] = 'All Inactive Users';

        $this->load->model('user_model');
        $id = $_SESSION['user_id'];
        $data['profile'] = $this->user_model->get_profile_info($id);

        // var_dump($data);
        // dd($data);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/users_deactivated');
        $this->load->view('admin/footer');
    }

    public function guests_list(){
        $data['title'] = 'All Guests';

        $this->load->model('user_model');
        $id = $_SESSION['user_id'];
        $data['profile'] = $this->user_model->get_profile_info($id);

        // var_dump($data);
        // dd($data);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/guests');
        $this->load->view('admin/footer');
    }


    public function guests_list_deactivated(){
        $data['title'] = 'All Inactive Guests';

        $this->load->model('user_model');
        $id = $_SESSION['user_id'];
        $data['profile'] = $this->user_model->get_profile_info($id);

        // var_dump($data);
        // dd($data);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/guests_deactivated');
        $this->load->view('admin/footer');
    }

    public function add_user(){
        $data['title'] = 'Add New User';

        $this->load->model('user_model');
        $id = $_SESSION['user_id'];
        $data['profile'] = $this->user_model->get_profile_info($id);

        // var_dump($data);
        // dd($data);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/add_user');
        $this->load->view('admin/footer');
    }

    
}
