<!-- Sidebar Start -->
        <?php // echo $_SESSION['user_type']; die;?>

        <aside class="sidebar-wrapper">
			<div class="logo-wrapper">
				<a href="<?=base_url();?>" class="admin-logo">
					<img src="<?=base_url();?>uploads/<?=front_common2()['main_logo2'][0]['main_logo2'];?>" alt="" class="sp_logo"><span></span>
				</a>
			</div>
            <div class="side-menu-wrap">
                <ul class="main-menu">
                    <li>
                            <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'user'){ ?>
                        <!-- <a href="<?php echo base_url('user'); ?>" class="active">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            </span>
                                                        <span class="menu-text">
                               Home                            </span>
                                                    </a> -->
                            <?php }else{ ?>
                             <a href="<?php echo base_url('admin'); ?>" class="active">
                            <span class="menu-text">
                                <?php echo $this->lang->line('ltr_dashboard');?>
                            </span>
                            </a>
                            <?php } ?>
                        
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="icon-menu feather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                            </span>
                            <span class="menu-text">
                                <?php echo $this->lang->line('ltr_listing');?>
                            </span>
                        </a>
                        <ul class="sub-menu">
                            <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'user'){ ?>
                            <li>
                                <a href="<?=base_url('user/properties');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_manage');?>
                                    </span>
                                </a>
                            </li>
                            <?php }else{ ?>
                            <li>
                                <a href="<?=base_url('admin/properties');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_manage');?>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/categories');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_categories');?>
                                    </span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="<?=base_url('admin/purpose');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_purpose');?>
                                    </span>
                                </a>
                            </li> -->
                            <li>
                                <a href="<?=base_url('admin/badges');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_badge');?>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/ownership');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_ownership');?>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/amenities');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_amenities');?>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/landmark');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_land_marks');?>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/neighbourhood');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_neighbourhood');?>
                                    </span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                     <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin'){ ?>
                    <li>
                        <a href="<?=base_url('admin/team');?>">
                            <span class="icon-menu feather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </span>
                            <span class="menu-text">
                                <?php echo $this->lang->line('ltr_users');?>
                            </span>
                        </a>
                    </li>
                    <li>
                    <a href="javascript:void(0);">
                    <span class="icon-menu feather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            </span>
                            <span class="menu-text">
                                Inquiries
                            </span>
                        </a>
                        <ul class="sub-menu">
                    <li>
                        <a href="<?=base_url('admin/visa-inquiries');?>">
                            <span class="icon-menu feather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            </span>
                            <span class="menu-text">
                                Visa Inquiries
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('admin/inquiries');?>">
                            <span class="icon-menu feather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            </span>
                            <span class="menu-text">
                                Property Inquiries
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('admin/contacts');?>">
                            <span class="icon-menu feather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            </span>
                            <span class="menu-text">
                                Inquiries
                            </span>
                        </a>
                    </li>
                        </ul>
                        </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="icon-menu feather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
									  <path d="M18.777,12.289 L17.557,12.493 C17.439,12.854 17.287,13.220 17.105,13.585 L17.825,14.599 C18.236,15.178 18.170,15.964 17.668,16.467 L16.454,17.683 C15.960,18.177 15.139,18.238 14.588,17.838 L13.583,17.119 C13.234,17.294 12.869,17.446 12.491,17.571 L12.284,18.795 C12.167,19.497 11.566,20.006 10.855,20.006 L9.137,20.006 C8.426,20.006 7.825,19.497 7.708,18.794 L7.504,17.571 C7.138,17.450 6.786,17.305 6.455,17.139 L5.431,17.869 C4.875,18.268 4.060,18.202 3.570,17.712 L2.356,16.496 C1.853,15.995 1.787,15.209 2.200,14.627 L2.915,13.630 C2.735,13.279 2.581,12.913 2.456,12.540 L1.218,12.329 C0.518,12.212 0.009,11.609 0.009,10.898 L0.009,9.180 C0.009,8.468 0.518,7.865 1.219,7.748 L2.422,7.545 C2.545,7.164 2.694,6.797 2.867,6.447 L2.139,5.421 C1.727,4.842 1.793,4.057 2.295,3.553 L3.513,2.337 C3.991,1.846 4.818,1.777 5.380,2.181 L6.376,2.901 C6.725,2.721 7.091,2.566 7.464,2.441 L7.675,1.200 C7.793,0.498 8.394,-0.011 9.104,-0.011 L10.818,-0.011 C11.528,-0.011 12.130,0.498 12.247,1.201 L12.451,2.407 C12.833,2.530 13.214,2.687 13.591,2.877 L14.602,2.155 C15.157,1.757 15.973,1.822 16.463,2.313 L17.676,3.528 C18.180,4.028 18.246,4.814 17.833,5.396 L17.112,6.405 C17.288,6.754 17.440,7.121 17.564,7.500 L18.786,7.707 C19.492,7.825 19.997,8.429 19.986,9.143 L19.986,10.856 C19.986,11.569 19.478,12.172 18.777,12.289 ZM16.815,8.984 C16.507,8.935 16.256,8.705 16.180,8.397 C16.030,7.816 15.800,7.262 15.498,6.755 C15.339,6.480 15.353,6.140 15.536,5.887 L16.472,4.568 L15.421,3.514 L14.111,4.458 C13.855,4.640 13.515,4.654 13.248,4.495 C12.722,4.184 12.157,3.952 11.566,3.803 C11.261,3.727 11.030,3.475 10.977,3.162 L10.711,1.574 L9.227,1.574 L8.953,3.187 C8.902,3.490 8.675,3.739 8.375,3.822 C7.801,3.971 7.251,4.203 6.735,4.513 C6.463,4.675 6.124,4.660 5.866,4.481 L4.555,3.543 L3.503,4.595 L4.451,5.930 C4.632,6.183 4.648,6.521 4.491,6.790 C4.193,7.297 3.967,7.852 3.819,8.439 C3.744,8.743 3.494,8.975 3.181,9.028 L1.596,9.295 L1.596,10.782 L3.205,11.057 C3.508,11.108 3.758,11.336 3.839,11.636 C3.987,12.210 4.219,12.762 4.530,13.280 C4.690,13.552 4.676,13.893 4.496,14.150 L3.561,15.465 L4.612,16.518 L5.943,15.569 C6.170,15.399 6.533,15.375 6.799,15.528 C7.309,15.822 7.851,16.044 8.408,16.189 C8.708,16.265 8.937,16.514 8.990,16.825 L9.257,18.425 L10.740,18.425 L11.010,16.825 C11.057,16.516 11.287,16.265 11.594,16.189 C12.176,16.037 12.729,15.807 13.234,15.505 C13.509,15.344 13.850,15.360 14.101,15.542 L15.418,16.482 L16.469,15.428 L15.530,14.102 C15.348,13.843 15.334,13.512 15.494,13.239 C15.797,12.728 16.027,12.174 16.176,11.591 C16.253,11.289 16.503,11.060 16.811,11.007 L18.408,10.740 L18.413,9.255 L16.815,8.984 ZM10.000,14.453 C7.547,14.453 5.550,12.454 5.550,9.996 C5.550,7.537 7.547,5.537 10.000,5.537 C12.454,5.537 14.449,7.537 14.449,9.996 C14.449,12.454 12.454,14.453 10.000,14.453 ZM10.000,7.127 C8.422,7.127 7.137,8.413 7.137,9.996 C7.137,11.577 8.422,12.864 10.000,12.864 C11.579,12.864 12.863,11.577 12.863,9.996 C12.863,8.413 11.579,7.127 10.000,7.127 Z" class="cls-1"></path>
									</svg>
                            </span>
                            <span class="menu-text">
                                <?php echo $this->lang->line('ltr_settings');?>
                            </span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?=base_url('admin/company-detail');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_company_details');?>
                                    </span>
                                </a>
                            </li>
							<li>
                                <a href="<?=base_url('admin/design');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_design_templates');?>
                                    </span>
                                </a>
                            </li>
							<li>
                                <a href="<?=base_url('admin/mail-credential');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_mail_credential');?>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="icon-menu feather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                            </span>
                            <span class="menu-text">
                                <?php echo $this->lang->line('ltr_packages');?>
                            </span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?=base_url('admin/packages');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_manage');?>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/agent-packages');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_agents');?>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/user-packages');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        Users
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/agent-package-payments');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_payments');?>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/payment-method');?>">
                                    <span class="icon-dash">
                                    </span>
                                    <span class="menu-text">
                                        <?php echo $this->lang->line('ltr_payment_methods');?>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?=base_url('admin/favorites');?>">
                            <span class="icon-menu feather-icon">
                            <svg width="28px" height="28px" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M8.85714 2C10.2878 2 11.6162 2.44463 12.7154 3.20515C13.1897 3.53331 13.6213 3.92028 14 4.35573C14.3787 3.92028 14.8103 3.53331 15.2846 3.20515C16.3838 2.44463 17.7122 2 19.1429 2C22.93 2 26 5.11539 26 8.95841C26 13.6204 23.2697 18.1581 14.6855 25.7523C14.2987 26.0945 13.7153 26.0802 13.3435 25.7212C5.57029 18.2161 2 14.4596 2 8.95841C2 5.11539 5.07005 2 8.85714 2ZM12.5005 5.69874L13.2455 6.55523C13.6441 7.01354 14.3559 7.01354 14.7545 6.55523L15.4995 5.69874C16.3924 4.67212 17.6924 4.02954 19.1429 4.02954C21.8254 4.02954 24 6.23627 24 8.95841C24 12.4335 22.1642 16.1947 14.7507 22.9817C14.3631 23.3366 13.7656 23.3258 13.389 22.9593C10.1819 19.8384 7.90173 17.4961 6.36637 15.3837C4.6874 13.0736 4 11.1716 4 8.95841C4 6.23627 6.17462 4.02954 8.85714 4.02954C10.3076 4.02954 11.6076 4.67212 12.5005 5.69874Z" fill-rule="evenodd"/></svg>                            
                            </span>
                            <span class="menu-text">
                                <?php echo $this->lang->line('ltr_favorites');?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('admin/countries');?>">
                        <span class="icon-menu feather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                            </span>
                            <span class="menu-text">
                                Countries
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('admin/services');?>">
                            <span class="icon-menu feather-icon">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 340.279 340.279" style="enable-background:new 0 0 340.279 340.279;" xml:space="preserve"><g>
		                    <path d="M329.922,196.825l-19.937-11.511c0.538-4.986,0.821-10.048,0.821-15.175s-0.283-10.189-0.821-15.175l19.937-11.511 c4.261-2.46,7.308-6.433,8.582-11.187c1.272-4.754,0.618-9.719-1.842-13.979l-38.354-66.436c-3.283-5.685-9.402-9.216-15.974-9.216 c-3.216,0-6.393,0.855-9.192,2.472l-19.994,11.543c-8.126-5.959-16.912-11.068-26.227-15.195V18.423 C226.92,8.265,218.653,0,208.497,0h-76.715c-10.158,0-18.422,8.265-18.422,18.423v23.033c-9.316,4.127-18.102,9.235-26.229,15.196 L67.137,45.108c-2.799-1.616-5.977-2.471-9.191-2.471c-6.572,0-12.691,3.53-15.975,9.215L3.618,118.288 c-2.461,4.26-3.115,9.226-1.842,13.979c1.274,4.754,4.321,8.727,8.582,11.187l19.937,11.511 c-0.538,4.986-0.821,10.048-0.821,15.175s0.283,10.188,0.821,15.175l-19.937,11.511c-4.261,2.46-7.308,6.433-8.582,11.187 c-1.273,4.754-0.619,9.72,1.842,13.979l38.353,66.436c3.283,5.685,9.402,9.215,15.975,9.215c3.215,0,6.393-0.854,9.191-2.471 l19.994-11.543c8.127,5.96,16.913,11.069,26.229,15.196v23.034c0,4.92,1.916,9.546,5.396,13.025 c3.481,3.479,8.106,5.396,13.025,5.396h76.715c10.156,0,18.423-8.265,18.423-18.422v-23.035 c9.315-4.126,18.102-9.235,26.227-15.195l19.994,11.543c2.799,1.617,5.977,2.471,9.192,2.471c6.571,0,12.69-3.53,15.974-9.215 l38.354-66.436c2.46-4.26,3.114-9.226,1.842-13.979C337.229,203.258,334.182,199.285,329.922,196.825z M170.139,270.14 c-55.229,0-100-44.773-100-100s44.771-100,100-100c55.23,0,100,44.773,100,100S225.37,270.14,170.139,270.14z"/>
			                <path d="M239.083,117.796c-0.591-0.15-1.218,0.022-1.649,0.454l-18.058,18.114c-1.083-0.44-3.814-1.939-8.868-6.976 c-5.053-5.037-6.56-7.763-7.003-8.845l18.056-18.113c0.431-0.432,0.602-1.06,0.45-1.65c-0.152-0.591-0.605-1.058-1.191-1.228 c-2.604-0.756-5.302-1.139-8.02-1.139c-7.674,0-14.885,2.993-20.302,8.427c-5.408,5.425-8.38,12.63-8.37,20.289 c0.006,3.947,0.81,7.768,2.324,11.288l-21.887,21.888l-22.416-22.416c-0.02-0.038-0.034-0.079-0.056-0.117l-10.251-17.567 c-0.177-0.303-0.417-0.563-0.706-0.764l-17.285-11.994c-0.955-0.663-2.249-0.546-3.07,0.275l-7.703,7.702 c-0.822,0.822-0.938,2.115-0.275,3.071l11.993,17.285c0.2,0.288,0.461,0.529,0.764,0.706l17.571,10.248 c0.034,0.02,0.071,0.026,0.105,0.044l22.428,22.427l-16.868,16.868c-3.532-1.518-7.367-2.322-11.325-2.322 c-7.676,0-14.887,2.993-20.305,8.428c-7.398,7.418-10.158,18.279-7.202,28.343c0.172,0.585,0.64,1.037,1.232,1.187 c0.591,0.151,1.218-0.021,1.649-0.455l18.056-18.112c1.083,0.439,3.814,1.939,8.868,6.975c5.053,5.038,6.559,7.763,7,8.845 l-18.056,18.114c-0.431,0.432-0.602,1.06-0.449,1.65c0.152,0.591,0.605,1.058,1.191,1.228c2.603,0.755,5.301,1.138,8.018,1.138 c7.675,0,14.886-2.993,20.305-8.428c5.408-5.424,8.379-12.629,8.368-20.288c-0.006-3.947-0.81-7.769-2.324-11.288l16.863-16.863 l7.146,7.145l-4.872,4.872c-1.062,1.06-1.647,2.468-1.647,3.966c-0.001,1.499,0.584,2.908,1.645,3.967l34.413,34.412 c1.057,1.06,2.464,1.643,3.963,1.643c1.498,0,2.909-0.583,3.97-1.643l18.641-18.645c1.06-1.059,1.644-2.468,1.645-3.967 c0-1.499-0.584-2.907-1.644-3.966L199.535,177.6c-1.059-1.059-2.467-1.643-3.966-1.643c-1.499,0-2.908,0.584-3.967,1.645 l-4.869,4.869l-7.146-7.145l21.891-21.892c3.532,1.519,7.366,2.322,11.325,2.323c0.001,0,0.001,0,0.002,0 c7.674,0,14.885-2.994,20.302-8.43c7.397-7.415,10.158-18.275,7.206-28.342C240.143,118.398,239.675,117.946,239.083,117.796z M195.188,189.842c1.226-1.228,3.215-1.228,4.443,0l22.074,22.076c1.228,1.226,1.228,3.214,0,4.441 c-1.228,1.225-3.213,1.225-4.439,0l-22.078-22.076C193.967,193.055,193.967,191.067,195.188,189.842z M185.195,199.829 c1.23-1.224,3.221-1.224,4.448,0.002l22.075,22.077c1.225,1.225,1.226,3.214,0,4.439c-1.23,1.227-3.219,1.227-4.442,0 l-22.081-22.077C183.972,203.046,183.972,201.058,185.195,199.829z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                            </span>
                            <span class="menu-text">
                                <?php echo $this->lang->line('ltr_services');?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('admin/testimonial');?>">
                            <span class="icon-menu feather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(1,0,0,1,0,5.000000000000028)"><g xmlns="http://www.w3.org/2000/svg"><g><path d="M123.856,71.638H105.66c2.737-20.263,13.941-21.281,19.097-21.75c5.151-0.469,9.094-4.787,9.094-9.959V10.004    c0-2.749-1.132-5.378-3.13-7.267s-4.688-2.868-7.431-2.717C91.68,1.798,54,17.758,54,83.696v52.04    c0,8.687,7.067,15.754,15.754,15.754h54.103c8.687,0,15.754-7.068,15.753-15.755V87.392    C139.61,78.705,132.543,71.638,123.856,71.638z M119.611,131.489H74V83.696c0-46.01,20.461-58.86,39.851-62.487v10.514    c-13.391,4.076-28.803,16.114-28.803,49.915c0,5.523,4.477,10,10,10h24.563V131.489z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M226.091,71.638h-18.197c2.737-20.263,13.941-21.281,19.097-21.75c5.151-0.469,9.094-4.787,9.094-9.959V10.004    c0-2.749-1.132-5.378-3.13-7.267s-4.69-2.868-7.431-2.717c-31.61,1.778-69.29,17.738-69.29,83.676v52.04    c0,8.687,7.067,15.754,15.754,15.754h54.103c8.687,0,15.755-7.068,15.754-15.756V87.392    C241.845,78.705,234.778,71.638,226.091,71.638z M221.845,131.49h-45.611V83.696c0-46.01,20.461-58.86,39.851-62.487v10.514    c-13.391,4.076-28.803,16.114-28.803,49.915c0,5.523,4.477,10,10,10h24.563V131.49z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M285.07,80.795c-1.86-1.86-4.44-2.93-7.07-2.93s-5.21,1.07-7.07,2.93s-2.93,4.44-2.93,7.07s1.07,5.21,2.93,7.07    c1.86,1.86,4.44,2.93,7.07,2.93s5.21-1.07,7.07-2.93s2.93-4.44,2.93-7.07S286.93,82.655,285.07,80.795z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M334.267,77.864h-12.601c-5.523,0-10,4.477-10,10s4.477,10,10,10h12.601C421.241,97.864,492,168.623,492,255.597    c0,74.232-52.648,139.152-125.187,154.365c-4.631,0.972-7.947,5.056-7.947,9.787v58.104l-61.594-61.594    c-1.875-1.875-4.419-2.929-7.071-2.929H177.733C90.759,413.33,20,342.571,20,255.597c0-26.805,6.843-53.274,19.79-76.548    c2.686-4.826,0.949-10.915-3.877-13.6c-4.827-2.686-10.916-0.949-13.6,3.877C7.715,195.565,0,225.397,0,255.597    C0,353.6,79.73,433.33,177.733,433.33h108.326l75.736,75.736c1.913,1.913,4.47,2.929,7.073,2.929c1.288,0,2.588-0.249,3.825-0.762    c3.736-1.547,6.173-5.193,6.173-9.238v-74.321c36.183-9.376,68.9-30.239,92.807-59.343C497.678,336.674,512,296.638,512,255.597    C512,157.595,432.27,77.865,334.267,77.864z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M379.064,177.492H132.937c-5.523,0-10,4.477-10,10s4.477,10,10,10h246.126c5.523,0,10.001-4.477,10.001-10    S384.587,177.492,379.064,177.492z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M379.064,230.825H132.937c-5.523,0-10,4.477-10,10c0,5.523,4.477,10,10,10h246.126c5.523,0,10.001-4.477,10.001-10    C389.064,235.302,384.587,230.825,379.064,230.825z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M379.064,284.158H132.937c-5.523,0-10,4.478-10,10c0,5.522,4.477,10,10,10h246.126c5.523,0,10.001-4.478,10.001-10    C389.064,288.636,384.587,284.158,379.064,284.158z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M379.063,337.492H247.871c-5.523,0-10,4.478-10,10c0,5.522,4.477,10,10,10h131.192c5.523,0,10-4.478,10-10    C389.063,341.97,384.586,337.492,379.063,337.492z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M191.607,337.491h-0.161c-5.523,0-10,4.478-10,10c0,5.522,4.477,10,10,10h0.161c5.523,0,10-4.478,10-10    C201.607,341.969,197.13,337.491,191.607,337.491z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g></g></svg>
                            </span>
                            <span class="menu-text">
                                <?php echo $this->lang->line('ltr_testimonials');?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('admin/sponsors');?>">
                            <span class="icon-menu feather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(1.01,0,0,1.01,-2.559999847411831,-2.5599925231931593)"><g xmlns="http://www.w3.org/2000/svg"><g><path d="M404.267,315.41c-10.048-20.949-45.995-50.027-80.725-78.123c-19.371-15.659-37.675-30.464-49.344-42.133    c-2.923-2.944-7.296-3.883-11.157-2.496c-7.189,2.603-11.627,4.608-15.125,6.165c-5.333,2.389-7.125,3.2-14.315,3.925    c-3.179,0.32-6.037,2.027-7.808,4.672c-15.083,22.549-30.699,20.629-41.131,17.131c-3.328-1.109-3.925-2.539-4.245-3.904    c-2.24-9.365,9.003-31.168,23.573-45.739c34.667-34.688,52.544-43.371,90.304-26.496c42.837,19.157,85.76,34.155,86.187,34.304    c5.611,1.941,11.648-1.003,13.589-6.571c1.92-5.568-1.003-11.648-6.571-13.589c-0.427-0.149-42.496-14.848-84.48-33.643    c-48.917-21.867-75.755-7.467-114.091,30.891c-14.592,14.592-34.411,44.117-29.291,65.771c2.197,9.216,8.683,16.043,18.325,19.221    c24.171,7.979,46.229,0.341,62.656-21.461c6.784-1.045,10.475-2.581,16.021-5.077c2.005-0.896,4.352-1.941,7.467-3.2    c12.203,11.456,28.672,24.789,46.016,38.805c31.36,25.365,66.923,54.123,74.923,70.763c3.947,8.213-0.299,13.568-3.179,16.021    c-4.224,3.627-10.005,4.779-13.141,2.581c-3.456-2.368-7.957-2.517-11.52-0.384c-3.584,2.133-5.589,6.165-5.141,10.304    c0.725,6.784-5.483,10.667-8.171,12.011c-6.827,3.456-13.952,2.859-16.619,0.384c-2.987-2.773-7.275-3.584-11.072-2.176    c-3.797,1.429-6.443,4.928-6.827,8.981c-0.64,6.997-5.824,13.717-12.587,16.341c-3.264,1.237-8,1.984-12.245-1.899    c-2.645-2.389-6.315-3.307-9.749-2.475c-3.477,0.853-6.272,3.371-7.488,6.72c-0.405,1.067-1.323,3.627-11.307,3.627    c-7.104,0-19.883-4.8-26.133-8.939c-7.488-4.928-54.443-39.957-94.997-73.92c-5.696-4.8-15.552-15.083-24.256-24.171    c-7.723-8.064-14.784-15.381-18.411-18.453c-4.544-3.84-11.264-3.264-15.04,1.259c-3.797,4.501-3.243,11.243,1.259,15.04    c3.307,2.795,9.707,9.557,16.768,16.917c9.515,9.941,19.349,20.224,25.963,25.771c39.723,33.259,87.467,69.163,96.981,75.413    c7.851,5.163,24.768,12.416,37.867,12.416c10.517,0,18.603-2.411,24.213-7.125c7.509,2.923,16.043,2.944,24.256-0.256    c9.707-3.755,17.685-11.328,22.208-20.501c8.405,1.792,18.027,0.533,26.773-3.861c8.555-4.309,14.741-10.901,17.813-18.603    c8.491,0.448,17.237-2.56,24.469-8.768C407.979,346.407,411.349,330.109,404.267,315.41z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M213.333,138.663h-96c-5.888,0-10.667,4.779-10.667,10.667s4.779,10.667,10.667,10.667h96    c5.888,0,10.667-4.779,10.667-10.667S219.221,138.663,213.333,138.663z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M435.52,292.711c-3.307-4.885-9.92-6.229-14.805-2.901l-31.189,20.949c-4.885,3.285-6.187,9.92-2.901,14.805    c2.069,3.051,5.44,4.715,8.875,4.715c2.027,0,4.096-0.576,5.931-1.813l31.189-20.949    C437.504,304.231,438.805,297.597,435.52,292.711z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M369.301,343.613c-7.637-6.016-41.792-40.981-62.912-62.997c-4.075-4.267-10.837-4.416-15.083-0.32    c-4.267,4.075-4.395,10.837-0.32,15.083c5.483,5.717,53.845,56.128,65.088,65.003c1.941,1.536,4.288,2.283,6.592,2.283    c3.136,0,6.272-1.408,8.405-4.075C374.72,353.981,373.931,347.261,369.301,343.613z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M326.677,365.01c-12.779-10.219-44.885-44.331-52.139-52.224c-4.011-4.352-10.731-4.608-15.083-0.64    c-4.331,3.989-4.629,10.752-0.64,15.083c0.384,0.405,38.699,41.771,54.528,54.443c1.963,1.557,4.331,2.325,6.656,2.325    c3.115,0,6.229-1.387,8.341-3.989C332.011,375.399,331.264,368.679,326.677,365.01z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M284.224,386.493c-15.211-12.821-46.336-45.952-52.416-52.459c-4.032-4.309-10.795-4.544-15.083-0.512    c-4.309,4.032-4.523,10.773-0.512,15.083c8.747,9.365,38.528,40.939,54.251,54.208c2.005,1.685,4.437,2.517,6.869,2.517    c3.029,0,6.059-1.301,8.171-3.797C289.301,397.01,288.725,390.29,284.224,386.493z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M124.672,120.253C106.389,102.93,33.28,97.319,11.307,96.018c-3.029-0.149-5.824,0.853-7.957,2.88    C1.216,100.903,0,103.719,0,106.663v192c0,5.888,4.779,10.667,10.667,10.667h64c4.608,0,8.704-2.965,10.133-7.36    c1.557-4.779,38.315-117.589,43.157-173.056C128.235,125.671,127.04,122.471,124.672,120.253z M66.88,287.997H21.333V118.098    c34.283,2.709,71.275,8.597,84.715,15.125C100.395,179.943,74.816,262.951,66.88,287.997z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M501.333,117.33c-83.755,0-130.219,21.44-132.16,22.336c-2.773,1.301-4.843,3.712-5.696,6.635s-0.427,6.059,1.173,8.661    c13.184,21.227,54.464,139.115,62.4,167.872c1.28,4.629,5.483,7.829,10.283,7.829h64c5.888,0,10.667-4.779,10.667-10.667v-192    C512,122.087,507.221,117.33,501.333,117.33z M490.667,309.33h-45.355c-10.112-32.939-39.979-118.827-56.64-154.325    c16.277-5.525,51.243-15.019,101.995-16.213V309.33z" data-original="#000000" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g></g></svg>
                            </span>
                            <span class="menu-text">
                                <?php echo $this->lang->line('ltr_sponsors');?>
                            </span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </aside>