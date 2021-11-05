<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
    public function index()
    {
        $this->load->view('account/header');
        $this->load->view('account/index');
        $this->load->view('account/footer');
    }

    public function registration()
    {
        $this->register();
        $this->load->view('account/header');
        $this->load->view('account/registration');
        $this->load->view('account/footer');
    }

    public function register()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password','Password', 'trim|required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]');
            
            if ($this->form_validation->run() != FALSE) {
                $this->load->model('user_model');
                $response = $this->user_model->register();

                if ($response) {
                    $this->session->set_flashdata('success', 'Account info submission successful.');
                } else {
                    $this->session->set_flashdata('error', 'The operation was not successful.');
                }

                redirect('account/login');
            } 
        }        
    }

    public function login()
    {
        $this->login_process();
        $this->load->view('account/header');
        $this->load->view('account/login');
        $this->load->view('account/footer');
    }

    public function login_process()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() != FALSE) {
                $this->load->model('account_model');
                $response = $this->account_model->login();

                if ($response) {
                    if ($_SESSION['status'] == 'inactive') {
                        $this->session->set_flashdata('error', 'Sorry, Your account is deactivated.');
                        redirect('/');
                    }elseif (isset($_SESSION['role']) && ($_SESSION['role'] == USER_ROLE_ADMIN || $_SESSION['role'] == USER_ROLE_MANAGER)) {
                        $this->session->set_flashdata('success', 'Login successful.');
                        redirect('admin');
                    } else {
                        $this->session->set_flashdata('success', 'Login successful.');
                        redirect('guest');
                    }

                    // if (isset($_SESSION['role']) && ($_SESSION['role'] == USER_ROLE_ADMIN || $_SESSION['role'] == USER_ROLE_MANAGER)) {
                    //     $this->session->set_flashdata('success', 'Login successful.');
                    //     redirect('admin');
                    // } else {
                    //     $this->session->set_flashdata('success', 'Login successful.');
                    //     redirect('guest');
                    // }
                    
                } else {
                    $this->session->set_flashdata('error', 'Sorry, Unknown Account');
                    redirect('account/login');
                }
            }
        }
    }


    public function logout()
    {
        $this->load->model('account_model');
        $this->account_model->logout();

        redirect('/');
    }

}
