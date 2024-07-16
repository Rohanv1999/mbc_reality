<!DOCTYPE html>
<html lang="zxx">

<head>
    <title><?=front_common1()['company_data'][0]['website_title'];?></title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="MobileOptimized" content="320">
    <!--Start Style -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/icofont.min.css">
    <!-- country code for tel css-->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/intlTelInput.css" />
    <!--Custom Style -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/auth.css">
	<!-- drag and drop CSS -->
	<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/material-icons.css">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>imageuploader/src/image-uploader.css">
	<link rel="stylesheet" id="theme-change" type="text/css" href="#">

    <!-- Favicon Link -->
    <link rel="shortcut icon" type="image/ico" href="<?=base_url();?>uploads/<?=front_common1()['main_logo1'][0]['main_logo1'];?>" />
    	<!--jquery -->
	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
	<script src="<?=base_url();?>assets/js/alert.js"></script>
 

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</head>

<body>
    <input type="hidden" id="burl" name="baseUrl" value="<?=base_url();?>">
	<div class="loader">
	  <div class="spinner">
		<img src="<?=base_url();?>assets/images/loader.gif" alt=""/>
	  </div> 
	</div>
    <!-- Main Body -->
    <div class="page-wrapper">
        <!-- Header Start -->
        <header class="header-wrapper main-header">
            <div class="header-inner-wrapper">
                <div class="header-right">
                    <div class="header-left">
                        <div class="header-links">
                            <a href="javascript:void(0);" class="toggle-btn">
                                <span></span>
                            </a>
                        </div>
                    </div>
                    <div class="header-controls">
                    <a href="<?=base_url();?>" target="_blank">Home</a>
                        <div class="user-info-wrapper header-links">
                            <a href="javascript:void(0);" class="user-info">
                                <img src="<?=(isset($_SESSION['profile_photo']) && !empty($_SESSION['profile_photo']))?base_url().'uploads/'.$this->session->userdata('profile_photo'):base_url().'assets/front_assets/images/no-ava.jpeg';?>" alt="" class="user-img">
                                <div class="blink-animation">
                                    <span class="blink-circle"></span>
                                    <span class="main-circle"></span>
                                </div>
                            </a>
                            <div class="user-info-box">
                                <div class="drop-down-header">
                                    <h4><?= ucfirst(loop_select('id',$_SESSION['id'],'user_type','px_userdata'));?></h4>
                                    <p><?= ucfirst(loop_select('id',$_SESSION['id'],'full_name','px_userdata'));?></p>
                                </div>
                                <ul>
                                    <li>
                                        <a href="<?=base_url('admin/profile');?>">
                                            <i class="far fa-edit"></i><?php echo $this->lang->line('ltr_edit_profile');?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url('admin/logout');?>">
                                            <i class="fas fa-sign-out-alt"></i> <?php echo $this->lang->line('ltr_logout');?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        