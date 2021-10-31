<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Controller
{
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('account_model');
        $is_logged_in = $this->account_model->is_logged_in();

        if ($is_logged_in) {
            if ($_SESSION['role'] != USER_ROLE_VISITOR) {
                redirect('/');
            }
        }else {
            redirect('/');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        $this->load->model('user_model');
        $id = $_SESSION['user_id'];
        $data['profile'] = $this->user_model->get_profile_info($id);

        $this->load->view('guest/header', $data);
        $this->load->view('guest/index');
        $this->load->view('guest/footer');
    }

    public function person_info()
    {
        $data['title'] = 'Personal Information';

        $this->load->model('user_model');
        $id = $_SESSION['user_id'];
        $data['profile'] = $this->user_model->get_profile_info($id);

        // var_dump($data);
        // dd($data);

        $this->load->view('guest/header', $data);
        $this->load->view('guest/person_info');
        $this->load->view('guest/footer');
    }

    public function edit_person_info()
    {
        $data['title'] = 'Edit Personal Information';

        $this->submit_person_info();
        $this->load->model('user_model');
        $id = $_SESSION['user_id'];
        $data['profile'] = $this->user_model->get_profile_info($id);

        // var_dump($data);
        // dd($data);

        $this->load->view('guest/header', $data);
        $this->load->view('guest/edit_person_info');
        $this->load->view('guest/footer');
    }

    public function submit_person_info()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                $this->load->model('user_model');
                $response = $this->user_model->update_user_info();

                if ($response) {
                    $this->session->set_flashdata('success', 'Data Updated Successfully.');
                    redirect('guest/person_info');
                } else {
                    $this->session->set_flashdata('error', 'The operation was not successful.');
                    redirect('guest/edit_person_info');
                }

                // redirect('guest/person_info');
            }
        }
    }

    public function skills()
    {
        $data['title'] = 'Programming Skills';

        $this->load->model('user_model');
        $id = $_SESSION['user_id'];
        $data['skills'] = $this->user_model->get_skill_info($id);

        $this->load->view('guest/header', $data);
        $this->load->view('guest/skills');
        $this->load->view('guest/footer');
    }


    public function edit_skill_info()
    {
        $data['title'] = 'Edit Programming Language';

        $this->submit_skill_info();
        $this->load->model('user_model');
        $id = $_SESSION['user_id'];
        $data['skills'] = $this->user_model->get_skill_info($id);

        // var_dump($data);
        // dd($data);

        $this->load->view('guest/header', $data);
        $this->load->view('guest/edit_skill_info');
        $this->load->view('guest/footer');
    }


    public function submit_skill_info()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('p_langs', 'Programming Languages', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                $this->load->model('user_model');
                $response = $this->user_model->update_skill_info();

                if ($response) {
                    $this->session->set_flashdata('success', 'Data Updated Successfully.');
                    redirect('guest/skills');
                } else {
                    $this->session->set_flashdata('error', 'The operation was not successful.');
                    redirect('guest/edit_skill_info');
                }

                // redirect('guest/person_info');
            }
        }
    }


}