<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="theme-color" content="#563d7c">

    <title>Profile Management System</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/cover.css'); ?>" rel="stylesheet">
</head>

<body>

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto shadows">
            <div class="inner">
                <h3 class="masthead-brand">Profile Management System</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link" href="<?php echo site_url('/'); ?>">Home</a>
                    <a class="nav-link" href="<?php echo site_url(); ?>account/registration">Registration</a>
                    <a class="nav-link" href="<?php echo site_url(); ?>account/login">Login</a>
                </nav>
            </div>
        </header>

        <!-- FLASHDATA -->
        <?php
        if ($this->session->flashdata('success')) {
        ?>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
        <?php
        } elseif ($this->session->flashdata('error')) {
        ?>
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
        <?php
        }
        ?>