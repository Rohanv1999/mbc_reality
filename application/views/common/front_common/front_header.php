<?php 
$login_page_url = base_url('login');
if (isset($_SESSION['isMobileApp'])) {
  $login_page_url = base_url('login_mobile');
} else {
  $login_page_url = base_url('login');
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>MBC | Realty </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon Start Here -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>assets/front_assets2/img/favicon.png">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets2/css/jquery-ui.css">
    <!-- Bootstrap Css Start Here -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets2/css/bootstrap.min.css">
    <!-- Animate Css Start Here -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets2/css/animate.min.css">
    <!-- Owl Carousel Start Here -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets2/vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets2/vendor/owlcarousel/owl.theme.default.min.css">
    <!-- Swiper Css Start Here -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets2/css/swiper-bundle.min.css">
    <!-- Flaticon Css Start Here -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets2/css/flaticon/font/flaticon.css">
    <!-- Select Css Start Here -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets2/css/nice-select.css">
    <!-- Animate Css Start Here -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets2/css/animate.min.css">
    <!-- Pop Up Css Start Here -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets2/css/magnific-popup.css">
    <!-- All min Css Start Here -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets2/css/all.min.css">
    <!-- Pannellum -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets2/css/pannellum.css">
    <!-- noUIrangle slider -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets2/vendor/noUiSlider/nouislider.min.css">
    <!-- Style Css Start Here -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets2/css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/auth.css">

    <!-- sweetalert -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Payment Gateway -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <!-- Payment Gateway -->
    <script
        src="https://www.paypal.com/sdk/js?client-id=<?= loop_select('id', 2, 'key_id', 'px_gateway'); ?>&components=buttons&currency=<?= loop_select('id', loop_select('id', 2, 'currency_code', 'px_gateway'), 'currency_code', 'px_currencies'); ?>"></script>
</head>

<body class="sticky-header">
    <div class="error"></div>
    <input type="hidden" value="<?= base_url(); ?>" id="burl">
    <div id="preloader"></div>
    <!--=====================================-->
    <!--=   Preloader     End               =-->
    <!--=====================================-->
    <div class="wrapper" id="wrapper">
        <!--=====================================-->
        <!--=   Header     Start             =-->
        <!--=====================================-->

        <header class="header">
            <div id="rt-sticky-placeholder"></div>
            <div id="header-menu" class="header-menu menu-layout1">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-area">
                                <a href="<?= base_url(); ?>" class="temp-logo">
                                    <img src="<?= base_url(); ?>uploads/<?= front_common1()['main_logo1'][0]['main_logo1']; ?>"
                                        width="157" height="40" alt="logo" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 d-flex justify-content-end position-static">
                            <nav class="template-main-menu">
                                <ul>
                                    <li><a href="<?= base_url(); ?>" <?= (isset($page_slug) && $page_slug == 'index') ? 'class="active"' : ''; ?>>Home</a></li>
                                    <li><a <?= (isset($page_slug) && $page_slug == 'about_us') ? 'class="active"' : ''; ?>
                                            href="<?= base_url('about-us'); ?>"><?php echo $this->lang->line('ltr_about_us'); ?></a></li>
                                    <li><a href="<?= base_url('listings'); ?>" <?= (isset($page_slug) && $page_slug == 'total_listing') ? 'class="active"' : ''; ?>>Properties</a></li>
                                    <!-- <li><a href="javascript:;" <?= (isset($page_slug) && $page_slug == 'group_comp') ? 'class="active"' : ''; ?>>Group Companies</a></li> -->
                                    <li><a href="<?= base_url('plans'); ?>" <?= (isset($page_slug) && $page_slug == 'plans') ? 'class="active"' : ''; ?>>Plans</a></li>
                                    <li><a <?= (isset($page_slug) && $page_slug == 'contact_us') ? 'class="active"' : ''; ?> href="<?= base_url('contact-us'); ?>">Contact</a></li>
                                    <?php if (isset($_SESSION['user_type'])) { ?>
                                        <li><a <?= (isset($page_slug) && $page_slug == 'shortlisted_listings') ? 'class="active"' : ''; ?>
                                                href="<?= base_url('shortlisted-listings'); ?>">Shortlisted Listings</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-flex justify-content-end">
                            <div class="header-action-layout1">
                                <ul class="action-list">





                                    <nav id="dropdown" class="template-main-menu template-main-menu-2">
                                        <ul>
                                            <li class="action-item-style my-account">
                                                <a href="javascript:void(0);">
                                                    <i class="flaticon-user-1 icon-round"></i>
                                                </a>
                                                <ul class="dropdown-menu-col-1">
                                                <li>
                                                        <?php if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'agent')) { ?>
                                                            <a href="<?= $login_page_url ?>"><svg version="1.2"
                                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 14"
                                                                    width="15" height="14">
                                                                    
                                                                    <path class="a"
                                                                        d="m9.9 7.5h-9.4c-0.3 0-0.5-0.2-0.5-0.5 0-0.3 0.2-0.5 0.5-0.5h9.4c0.3 0 0.5 0.2 0.5 0.5 0 0.3-0.2 0.5-0.5 0.5zm-2.6 2.5q-0.2 0-0.3-0.1c-0.2-0.2-0.2-0.5 0-0.7l2.3-2.2-2.3-2.2c-0.2-0.2-0.2-0.5 0-0.7 0.2-0.2 0.5-0.2 0.7 0l2.6 2.6c0.2 0.1 0.2 0.4 0 0.6l-2.6 2.6q-0.2 0.1-0.4 0.1zm0.5 4c-2.9 0-5.6-1.7-6.7-4.4-0.1-0.3 0.1-0.6 0.3-0.7 0.3-0.1 0.6 0.1 0.7 0.3 0.9 2.3 3.2 3.8 5.7 3.8 3.4 0 6.2-2.7 6.2-6 0-3.3-2.8-6-6.2-6-2.5 0-4.8 1.5-5.7 3.8-0.1 0.2-0.4 0.4-0.7 0.3-0.2-0.1-0.4-0.4-0.3-0.7 1.1-2.7 3.8-4.4 6.7-4.4 4 0 7.2 3.1 7.2 7 0 3.9-3.2 7-7.2 7z" />
                                                                </svg>
                                                                <?= (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'agent')) ? $this->lang->line('ltr_dashboard') : $this->lang->line('ltr_login_register'); ?>
                                                            </a>
                                                        <?php } else if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'user') {
                                                            ?> <a href="javascript:void(0);">
                                                                <?= loop_select('id', $_SESSION['id'], 'full_name', 'px_userdata'); ?>
                                                                </a>
                                                            <?php
                                                        } ?>
                                                    </li>

                                                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'user') { ?>
                                                       
                                                        <li><a href="<?= base_url('shortlisted-listings'); ?>"><?php echo $this->lang->line('ltr_shortlisted_listings'); ?></a></li>
                                                     
                                                    <?php }?>
                                                    <li>
                                                        <?php if (isset($_SESSION['user_type'])) { ?>
                                                            <a href="<?= base_url('login/logout'); ?>"><?php echo $this->lang->line('ltr_logout'); ?></a>
                                                        <?php } ?>
                                                    </li>
                                                    
                                                  <?php   if(!isset($_SESSION['user_type'])){?>
                                                    <li>
                                                        <a href="<?= $login_page_url ?>"><?= $this->lang->line('ltr_login_register');?></a>
                                                    </li>
                                                        
                                                        <?php }; 
                                                     ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>

                                    <?php if (!isset($_SESSION['user_type'])) {
                                        $href = $login_page_url;
                                    }
                                    if (isset($_SESSION['user_type']) && !empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
                                        $href = base_url('admin/submit-listing');
                                    } elseif (isset($_SESSION['user_type']) && !empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'agent') {
                                        $href = base_url('agent/submit-listing');
                                    } else {
                                        if (isset($_SESSION['user_type']) && !empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'user') {
                                            $href = base_url('user/submit-listing');
                                        }
                                    } ?>
                                    <li class="listing-button">
                                        <a href="<?= (isset($href)) ? $href : 'javascript:void(0);'; ?>"
                                            class="listing-btn">
                                            <span>
                                                <i class="fas fa-plus-circle"></i>
                                            </span>
                                            <span class="item-text">Add Property</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="rt-header-menu mean-container position-relative" id="meanmenu">
            <div class="mean-bar">
                <a href="<?= base_url(); ?>">
                    <img src='<?= base_url(); ?>assets/front_assets2/img/logo.png' alt='logo' class='img-fluid'>
                </a>
                <div class="mean-bar--right">
                    <!-- <div class="actions search">
                        <a href="#template-search" class="item-icon" title="Search">
                            <i class="fas fa-search"></i>
                        </a>
                    </div> -->
                    <div class="actions user invisible">
                        <a href="javascript:void(0);"><i class="flaticon-user"></i></a>
                    </div>
                    <span class="sidebarBtn">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </span>
                </div>
            </div>
            <div class="rt-slide-nav">
                <div class="offscreen-navigation">
                    <nav class="menu-main-primary-container">
                        <ul>
                        <?php 
                    if (isset($_SESSION['user_type'])){?>
                    <a href="javascript:void(0);"><img width="28" height="28" src="<?= base_url(); ?>uploads/default_avatar.png" class="img-fluid img-mod" alt="" /></a>
                    <?php }else{?>
                    <a href="<?= base_url(); ?>"><img width="28" height="28" src="<?= base_url(); ?>uploads/<?= front_common1()['main_logo1'][0]['main_logo1']; ?>" class="img-fluid img-mod" alt="" /></a>
                    <?php } ?>
                    <div class="d-flex flex-column">
                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') { ?>
                      <a href="href=<?= $login_page_url ?>" class="p-mod m-0"><?= loop_select('id', $_SESSION['id'], 'full_name', 'px_userdata'); ?></a>
                       <a class="link-mod d-flex flex-row align-items-center" href="<?= base_url() ?>admin/profile">Edit Profile<i class="far fa-edit mr-2 getid"></i></a>
                    <?php } else if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin'){ ?>
               <p class="p-mod m-0"> Admin</p>
                <a class="link-mod d-flex flex-row align-items-center" href="<?= base_url() ?>admin/profile">Edit Profile<i class="far fa-edit mr-2 getid"></i></a>
                <?php  }
                    ?>
                            <li><a href="<?= base_url(); ?>" <?= (isset($page_slug) && $page_slug == 'index') ? 'class="active"' : ''; ?>>Home</a></li>
                            <li><a <?= (isset($page_slug) && $page_slug == 'about_us') ? 'class="active"' : ''; ?>
                                    href="<?= base_url('about-us'); ?>"><?php echo $this->lang->line('ltr_about_us'); ?></a></li>
                            <li><a href="<?= base_url('listings'); ?>" <?= (isset($page_slug) && $page_slug == 'total_listing') ? 'class="active"' : ''; ?>>Property</a></li>
                            <li><a href="javascript:;" <?= (isset($page_slug) && $page_slug == 'group_comp') ? 'class="active"' : ''; ?>>Group Companies</a></li>
                            <li><a href="<?= base_url('plans'); ?>" <?= (isset($page_slug) && $page_slug == 'plans') ? 'class="active"' : ''; ?>>Plans</a></li>
                            <li><a <?= (isset($page_slug) && $page_slug == 'contact_us') ? 'class="active"' : ''; ?>
                                    href="<?= base_url('contact-us'); ?>">Contact</a></li>
                                    <?php if (isset($_SESSION['user_type'])){?>
                                        <li>
                           <a href="<?= base_url('shortlisted-listings'); ?>"><?php echo $this->lang->line('ltr_shortlisted_listings'); ?></a>
                  </li>
                  <li>
                       <a href="<?= base_url('login/logout'); ?>"><?php echo $this->lang->line('ltr_logout'); ?></a>
                  </li>
                  <?php }?>
                      
                                </ul>
                    </nav>
                </div>
            </div>
        </div>