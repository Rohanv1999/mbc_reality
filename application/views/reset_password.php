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
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/auth.css">
	<!--Custom Style -->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/style.css">
	<!-- Favicon Link -->
	<link rel="shortcut icon" type="image/ico" href="<?=base_url();?>uploads/<?=front_common1()['main_logo1'][0]['main_logo1'];?>" />
</head>

<body>
	<input type="hidden" id="burl" name="baseUrl" value="<?=base_url();?>">
    <div class="ad-auth-wrapper">
        <div class="ad-auth-box">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<div class="error"></div>
                    <div class="ad-auth-img">
                        <img src="<?=base_url();?>assets/images/auth-img1.jpg" alt="" />
                    </div>
                </div>
				<div class="error"></div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="ad-auth-content">
                        <form class="formget" method="post" action="<?=site_url('login/getresetpassword')?>">
                            <input type="hidden" name="token" value="<?=$token;?>">
                            <a href="<?=base_url();?>" class="ad-auth-logo">
                                <img width="217" height="42" src="<?=base_url();?>uploads/<?=front_common1()['main_logo1'][0]['main_logo1'];?>" class="img-fluid" alt="">
                            </a>
                            <h2><span class="primary"><?php echo $this->lang->line('ltr_hellocm');?></span><?php echo $this->lang->line('ltr_welcomei');?></h2>
                            <p><?php echo $this->lang->line('ltr_reset_password_text');?></p>
                            <div class="ad-auth-form">
                                <div class="ad-auth-feilds mb-30">
                                    <input type="password" name="reset_password" placeholder="<?php echo $this->lang->line('ltr_enter_new_password');?>" class="ad-input" />
                                    <div class="ad-auth-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 482.8 482.8"><path d="M395.95,210.4h-7.1v-62.9c0-81.3-66.1-147.5-147.5-147.5c-81.3,0-147.5,66.1-147.5,147.5c0,7.5,6,13.5,13.5,13.5    s13.5-6,13.5-13.5c0-66.4,54-120.5,120.5-120.5c66.4,0,120.5,54,120.5,120.5v62.9h-275c-14.4,0-26.1,11.7-26.1,26.1v168.1    c0,43.1,35.1,78.2,78.2,78.2h204.9c43.1,0,78.2-35.1,78.2-78.2V236.5C422.05,222.1,410.35,210.4,395.95,210.4z M395.05,404.6    c0,28.2-22.9,51.2-51.2,51.2h-204.8c-28.2,0-51.2-22.9-51.2-51.2V237.4h307.2L395.05,404.6L395.05,404.6z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#9abeed"></path><path d="M241.45,399.1c27.9,0,50.5-22.7,50.5-50.5c0-27.9-22.7-50.5-50.5-50.5c-27.9,0-50.5,22.7-50.5,50.5    S213.55,399.1,241.45,399.1z M241.45,325c13,0,23.5,10.6,23.5,23.5s-10.5,23.6-23.5,23.6s-23.5-10.6-23.5-23.5    S228.45,325,241.45,325z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#9abeed"></path></svg>
                                    </div>
                                </div>
                                <div class="ad-auth-feilds mb-30">
                                    <input type="password" name="conform_password" placeholder="<?php echo $this->lang->line('ltr_confirm_new_password');?>" class="ad-input" />
                                    <div class="ad-auth-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 482.8 482.8"><path d="M395.95,210.4h-7.1v-62.9c0-81.3-66.1-147.5-147.5-147.5c-81.3,0-147.5,66.1-147.5,147.5c0,7.5,6,13.5,13.5,13.5    s13.5-6,13.5-13.5c0-66.4,54-120.5,120.5-120.5c66.4,0,120.5,54,120.5,120.5v62.9h-275c-14.4,0-26.1,11.7-26.1,26.1v168.1    c0,43.1,35.1,78.2,78.2,78.2h204.9c43.1,0,78.2-35.1,78.2-78.2V236.5C422.05,222.1,410.35,210.4,395.95,210.4z M395.05,404.6    c0,28.2-22.9,51.2-51.2,51.2h-204.8c-28.2,0-51.2-22.9-51.2-51.2V237.4h307.2L395.05,404.6L395.05,404.6z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#9abeed"></path><path d="M241.45,399.1c27.9,0,50.5-22.7,50.5-50.5c0-27.9-22.7-50.5-50.5-50.5c-27.9,0-50.5,22.7-50.5,50.5    S213.55,399.1,241.45,399.1z M241.45,325c13,0,23.5,10.6,23.5,23.5s-10.5,23.6-23.5,23.6s-23.5-10.6-23.5-23.5    S228.45,325,241.45,325z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#9abeed"></path></svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="ad-auth-btn">
                                <input type="submit" name="submit" class="ad-btn ad-login-member" value="<?php echo $this->lang->line('ltr_send_password');?>">
                            </div>
                            <p class="ad-register-text"><?php echo $this->lang->line('ltr_login_text');?> <a href="<?php echo base_url('login')?>"><?php echo $this->lang->line('ltr_login');?></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script src="<?=base_url();?>assets/js/jquery-3.6.1.min.js"></script>
	<script src="<?=base_url('assets/js/ajax.js')?>"></script>
</body>

</html>