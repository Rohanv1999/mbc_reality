<?php
if (isset($_GET['type']) && $_GET['type'] == 'mobileapp') {
  $_SESSION['isMobileApp'] = 'isMobileApp';
}

$login_page_url = base_url('login');
if (isset($_SESSION['isMobileApp'])) {
  $login_page_url = base_url('login_mobile');
} else {
  $login_page_url = base_url('login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--=== Required meta tags ===-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--=== custom css ===-->
  <link rel="shortcut icon" type="image/ico" href="<?= base_url(); ?>uploads/<?= front_common1()['main_logo1'][0]['main_logo1']; ?>" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets/css/style.css?v1.1">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets/css/responsive.css?v1.3">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

  <!--=== custom css ===-->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets/leaflet/leaflet.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets/leaflet-markercluster/dist/MarkerCluster.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets/leaflet-markercluster/dist/MarkerCluster.Default.css" />

  <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets/css/select2.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/front_assets/css/select2.min.css" />
  <script src="<?= base_url(); ?>assets/front_assets/leaflet/leaflet.js"></script>
  <script src="<?= base_url(); ?>assets/front_assets/leaflet-markercluster/dist/leaflet.markercluster.js"></script>
  <!-- Payment Gateway -->
  <script src="https://www.paypal.com/sdk/js?client-id=<?= loop_select('id', 2, 'key_id', 'px_gateway'); ?>&components=buttons&currency=<?= loop_select('id', loop_select('id', 2, 'currency_code', 'px_gateway'), 'currency_code', 'px_currencies'); ?>"></script>
  <title><?= front_common1()['company_data'][0]['website_title']; ?></title>
  <style>
      @media (max-width: 991px) {
        .desk_dropdown{
            display: none !important;
        }
        .img-mod {
          border-radius: 15px;
        }
    
        .p-mod,
        .link-mod {
          color: white !important;
        }
        .link-mod {
            font-size: 15px !important;
            color: #f4871f !important;
            gap: 10px;
        }
    }
  </style>
</head>

<body>
  <div class="body-overlay-1"></div>
  <input type="hidden" id="burl" name="baseUrl" value="<?= base_url(); ?>">
  <!--===Pre-header Start===-->

  <div class="preheader-wrapper">
    <div class="container-fluid">
      <div class="perheader-section">
        <div class="preheader-announcement">
          <span><i class="fas fa-bullhorn"></i><?php echo $this->lang->line('ltr_announcement'); ?></span>
        </div>

        <div class="d-flex wrap">
          <div class="pre-language">
            <li>
              <div id="google_translate_element"></div>
            </li>
          </div>
          <div class="hamburger">
            <?php if (!isset($_SESSION['user_type'])) { ?>
              <a href="<?= $login_page_url; ?>" class="btn srbpostprop">Post Property +</a>
            <?php } ?>

            <?php
            if (isset($_SESSION['user_type']) && !empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
            ?>
              <a href="<?= base_url('admin/submit-listing') ?>" class="btn srbpostprop">Post Property +</a>
            <?php
            } elseif (isset($_SESSION['user_type']) && !empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'agent') {
            ?>
              <a href="<?= base_url('agent/submit-listing') ?>" class="btn srbpostprop">Post Property +</a>
              <?php
            } else {
              if (isset($_SESSION['user_type']) && !empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'user') {
              ?>
                <a href="<?= base_url('user/submit-listing') ?>" class="btn newbnt srbpostprop">Post Property +</a>
            <?php }
            } ?>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!--===Pre-header End===-->
  <!--===Header Section Start===-->
  <div class="header-section">
    <div class="container-fluid">
      <div class="header_wrapper">
        <div class="row align-items-center">
          <div class="col-xl-3 col-lg-2">
            <div class="logo">
              <a href="<?= base_url(); ?>"><img width="217" height="42" src="<?= base_url(); ?>uploads/<?= front_common1()['main_logo1'][0]['main_logo1']; ?>" class="img-fluid" alt="" /></a>
            </div>
          </div>
          <div class="col-xl-9 col-lg-8">
            <div class="main_menu">
              <div class="menus">
                <div class="nav-logo">
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
                   
                    </div>
                </div>
                <ul>
                  <li>

                    <a <?= (isset($page_slug) && $page_slug == 'index') ? 'class="active"' : ''; ?> href="<?= base_url(); ?>"><?php echo $this->lang->line('ltr_home'); ?></a>
                  </li>
                  <li><a <?= (isset($page_slug) && $page_slug == 'agents') ? 'class="active"' : ''; ?> href="<?= base_url('team'); ?>"><?php echo $this->lang->line('ltr_agents'); ?></a></li>
                  <li><a <?= (isset($page_slug) && $page_slug == 'total_listing') ? 'class="active"' : ''; ?> href="<?= base_url('listings'); ?>"><?php echo $this->lang->line('ltr_listing'); ?></a></li>
                  <li><a <?= (isset($page_slug) && $page_slug == 'about_us') ? 'class="active"' : ''; ?> href="<?= base_url('about-us'); ?>"><?php echo $this->lang->line('ltr_about_us'); ?></a></li>
                  <li><a <?= (isset($page_slug) && $page_slug == 'contact_us') ? 'class="active"' : ''; ?> href="<?= base_url('contact-us'); ?>"><?php echo $this->lang->line('ltr_contact'); ?></a></li>
                  <?php if (isset($_SESSION['user_type'])){?>
                  <li>
                           <a href="<?= base_url('shortlisted-listings'); ?>"><?php echo $this->lang->line('ltr_shortlisted_listings'); ?></a>
                  </li>
                  <li>
                       <a href="<?= base_url('login/logout'); ?>"><?php echo $this->lang->line('ltr_logout'); ?></a>
                  </li>
                  <?php }?>
                  <?php if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'agent')) { ?>
                    <li>
                      <a href="<?= $login_page_url ?>"><svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 14" width="15" height="14">
                          <style>
                            .a {
                              fill: #797979
                            }
                          </style>
                          <path class="a" d="m9.9 7.5h-9.4c-0.3 0-0.5-0.2-0.5-0.5 0-0.3 0.2-0.5 0.5-0.5h9.4c0.3 0 0.5 0.2 0.5 0.5 0 0.3-0.2 0.5-0.5 0.5zm-2.6 2.5q-0.2 0-0.3-0.1c-0.2-0.2-0.2-0.5 0-0.7l2.3-2.2-2.3-2.2c-0.2-0.2-0.2-0.5 0-0.7 0.2-0.2 0.5-0.2 0.7 0l2.6 2.6c0.2 0.1 0.2 0.4 0 0.6l-2.6 2.6q-0.2 0.1-0.4 0.1zm0.5 4c-2.9 0-5.6-1.7-6.7-4.4-0.1-0.3 0.1-0.6 0.3-0.7 0.3-0.1 0.6 0.1 0.7 0.3 0.9 2.3 3.2 3.8 5.7 3.8 3.4 0 6.2-2.7 6.2-6 0-3.3-2.8-6-6.2-6-2.5 0-4.8 1.5-5.7 3.8-0.1 0.2-0.4 0.4-0.7 0.3-0.2-0.1-0.4-0.4-0.3-0.7 1.1-2.7 3.8-4.4 6.7-4.4 4 0 7.2 3.1 7.2 7 0 3.9-3.2 7-7.2 7z" />
                        </svg> <?= (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'agent')) ? $this->lang->line('ltr_dashboard') : $this->lang->line('ltr_login_register'); ?></a>
                    </li>
                  <?php } else if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'user') { ?>
                    <li class="dropdown desk_dropdown">
                      <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="14" x="0" y="0" viewBox="0 0 480 480" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                          <g>
                            <g xmlns="http://www.w3.org/2000/svg">
                              <g>
                                <path d="M240,0C107.664,0,0,107.664,0,240c0,57.96,20.656,111.184,54.992,152.704c0.088,0.12,0.096,0.272,0.192,0.384    c24.792,29.896,55.928,52.816,90.624,67.624c0.4,0.168,0.792,0.352,1.192,0.52c2.808,1.184,5.648,2.28,8.496,3.352    c1.12,0.424,2.24,0.856,3.376,1.264c2.456,0.88,4.928,1.712,7.416,2.512c1.592,0.512,3.184,1.016,4.792,1.496    c2.2,0.656,4.408,1.288,6.632,1.888c1.952,0.528,3.92,1.016,5.888,1.488c1.992,0.48,3.992,0.96,6,1.384    c2.24,0.48,4.504,0.904,6.776,1.32c1.824,0.336,3.64,0.688,5.48,0.984c2.52,0.408,5.056,0.728,7.6,1.056    c1.64,0.208,3.272,0.448,4.92,0.624c2.88,0.304,5.784,0.52,8.696,0.72c1.352,0.096,2.696,0.24,4.056,0.312    c4.248,0.24,8.544,0.368,12.872,0.368s8.624-0.128,12.888-0.352c1.36-0.072,2.704-0.216,4.056-0.312    c2.912-0.208,5.816-0.416,8.696-0.72c1.648-0.176,3.28-0.416,4.92-0.624c2.544-0.328,5.08-0.648,7.6-1.056    c1.832-0.296,3.656-0.648,5.48-0.984c2.264-0.416,4.528-0.84,6.776-1.32c2.008-0.432,4-0.904,6-1.384    c1.968-0.48,3.936-0.968,5.888-1.488c2.224-0.592,4.432-1.232,6.632-1.888c1.608-0.48,3.2-0.984,4.792-1.496    c2.488-0.8,4.96-1.632,7.416-2.512c1.128-0.408,2.248-0.84,3.376-1.264c2.856-1.072,5.688-2.176,8.496-3.352    c0.4-0.168,0.792-0.352,1.192-0.52c34.688-14.808,65.832-37.728,90.624-67.624c0.096-0.112,0.104-0.272,0.192-0.384    C459.344,351.184,480,297.96,480,240C480,107.664,372.336,0,240,0z M337.256,441.76c-0.12,0.056-0.232,0.12-0.352,0.176    c-2.856,1.376-5.76,2.672-8.688,3.936c-0.664,0.28-1.32,0.568-1.984,0.848c-2.56,1.072-5.152,2.088-7.76,3.064    c-1.088,0.408-2.176,0.808-3.272,1.192c-2.312,0.824-4.632,1.616-6.976,2.368c-1.456,0.464-2.92,0.904-4.384,1.336    c-2.08,0.624-4.168,1.224-6.28,1.784c-1.776,0.472-3.568,0.904-5.36,1.328c-1.88,0.448-3.752,0.904-5.648,1.304    c-2.072,0.44-4.16,0.816-6.24,1.192c-1.688,0.312-3.368,0.64-5.072,0.912c-2.344,0.368-4.712,0.664-7.072,0.96    c-1.496,0.192-2.984,0.416-4.496,0.576c-2.696,0.288-5.416,0.472-8.128,0.664c-1.208,0.08-2.408,0.216-3.632,0.28    c-3.96,0.208-7.928,0.32-11.912,0.32s-7.952-0.112-11.904-0.32c-1.216-0.064-2.416-0.192-3.632-0.28    c-2.72-0.184-5.432-0.376-8.128-0.664c-1.512-0.16-3-0.384-4.496-0.576c-2.36-0.296-4.728-0.592-7.072-0.96    c-1.704-0.272-3.384-0.6-5.072-0.912c-2.088-0.376-4.176-0.76-6.24-1.192c-1.896-0.4-3.776-0.856-5.648-1.304    c-1.792-0.432-3.584-0.856-5.36-1.328c-2.104-0.56-4.2-1.168-6.28-1.784c-1.464-0.432-2.928-0.872-4.384-1.336    c-2.344-0.752-4.672-1.544-6.976-2.368c-1.096-0.392-2.184-0.792-3.272-1.192c-2.608-0.976-5.2-1.992-7.76-3.064    c-0.664-0.272-1.312-0.56-1.976-0.84c-2.928-1.256-5.832-2.56-8.696-3.936c-0.12-0.056-0.232-0.112-0.352-0.176    c-27.912-13.504-52.568-32.672-72.576-55.952c15.464-56.944,59.24-102.848,115.56-121.112c1.112,0.68,2.272,1.288,3.416,1.928    c0.672,0.376,1.336,0.776,2.016,1.136c2.384,1.264,4.8,2.448,7.272,3.512c1.896,0.832,3.856,1.536,5.808,2.256    c0.384,0.136,0.768,0.288,1.152,0.424c10.848,3.84,22.456,6.04,34.6,6.04s23.752-2.2,34.592-6.04    c0.384-0.136,0.768-0.288,1.152-0.424c1.952-0.72,3.912-1.424,5.808-2.256c2.472-1.064,4.888-2.248,7.272-3.512    c0.68-0.368,1.344-0.76,2.016-1.136c1.144-0.64,2.312-1.248,3.432-1.936c56.32,18.272,100.088,64.176,115.56,121.112    C389.824,409.08,365.168,428.248,337.256,441.76z M152,176c0-48.52,39.48-88,88-88s88,39.48,88,88    c0,30.864-16.008,58.024-40.128,73.736c-3.152,2.048-6.432,3.88-9.8,5.48c-0.4,0.192-0.792,0.392-1.192,0.576    c-23.168,10.536-50.592,10.536-73.76,0c-0.4-0.184-0.8-0.384-1.192-0.576c-3.376-1.6-6.648-3.432-9.8-5.48    C168.008,234.024,152,206.864,152,176z M421.832,370.584c-18.136-53.552-59.512-96.832-112.376-117.392    C330.6,234.144,344,206.64,344,176c0-57.344-46.656-104-104-104s-104,46.656-104,104c0,30.64,13.4,58.144,34.552,77.192    c-52.864,20.568-94.24,63.84-112.376,117.392C31.672,333.792,16,288.704,16,240C16,116.488,116.488,16,240,16s224,100.488,224,224    C464,288.704,448.328,333.792,421.832,370.584z" fill="#797979" data-original="#000000" class=""></path>
                              </g>
                            </g>
                            <g xmlns="http://www.w3.org/2000/svg"></g>
                            <g xmlns="http://www.w3.org/2000/svg"></g>
                            <g xmlns="http://www.w3.org/2000/svg"></g>
                            <g xmlns="http://www.w3.org/2000/svg"></g>
                            <g xmlns="http://www.w3.org/2000/svg"></g>
                            <g xmlns="http://www.w3.org/2000/svg"></g>
                            <g xmlns="http://www.w3.org/2000/svg"></g>
                            <g xmlns="http://www.w3.org/2000/svg"></g>
                            <g xmlns="http://www.w3.org/2000/svg"></g>
                            <g xmlns="http://www.w3.org/2000/svg"></g>
                            <g xmlns="http://www.w3.org/2000/svg"></g>
                            <g xmlns="http://www.w3.org/2000/svg"></g>
                            <g xmlns="http://www.w3.org/2000/svg"></g>
                            <g xmlns="http:/www.w3.org/2000/svg"></g>
                            <g xmlns="http://www.w3.org/2000/svg"></g>
                          </g>
                        </svg> <?= loop_select('id', $_SESSION['id'], 'full_name', 'px_userdata'); ?></a>

                      <div class="dropdown-content">
                        <a href="<?= base_url('shortlisted-listings'); ?>"><?php echo $this->lang->line('ltr_shortlisted_listings'); ?></a>
                        <!--<a href="<? //=base_url();
                                      ?>" data-toggle="modal" data-target="#user_change_<? //=(isset($_SESSION['id']) && !empty($_SESSION['id']))?$_SESSION['id']:0;
                                                                                                        ?>"><? //php echo $this->lang->line('ltr_my_profile');
                                                                                                                                                                                      ?></a>-->
                        <!--<a href="<? //=base_url();
                                      ?>" data-toggle="modal" data-target="#user_pass_change_<? //=(isset($_SESSION['id']) && !empty($_SESSION['id']))?$_SESSION['id']:0;
                                                                                                            ?>"><? //php echo $this->lang->line('ltr_change_password');
                                                                                                                                                                                            ?></a>-->
                        <a href="<?= base_url('login/logout'); ?>"><?php echo $this->lang->line('ltr_logout'); ?></a>
                      </div>
                    </li>
                  <?php } else { ?>
                    <li>







                      <a href="<?= $login_page_url ?>"><svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 14" width="15" height="14">
                          <style>
                            .a {
                              fill: #797979
                            }
                          </style>
                          <path class="a" d="m9.9 7.5h-9.4c-0.3 0-0.5-0.2-0.5-0.5 0-0.3 0.2-0.5 0.5-0.5h9.4c0.3 0 0.5 0.2 0.5 0.5 0 0.3-0.2 0.5-0.5 0.5zm-2.6 2.5q-0.2 0-0.3-0.1c-0.2-0.2-0.2-0.5 0-0.7l2.3-2.2-2.3-2.2c-0.2-0.2-0.2-0.5 0-0.7 0.2-0.2 0.5-0.2 0.7 0l2.6 2.6c0.2 0.1 0.2 0.4 0 0.6l-2.6 2.6q-0.2 0.1-0.4 0.1zm0.5 4c-2.9 0-5.6-1.7-6.7-4.4-0.1-0.3 0.1-0.6 0.3-0.7 0.3-0.1 0.6 0.1 0.7 0.3 0.9 2.3 3.2 3.8 5.7 3.8 3.4 0 6.2-2.7 6.2-6 0-3.3-2.8-6-6.2-6-2.5 0-4.8 1.5-5.7 3.8-0.1 0.2-0.4 0.4-0.7 0.3-0.2-0.1-0.4-0.4-0.3-0.7 1.1-2.7 3.8-4.4 6.7-4.4 4 0 7.2 3.1 7.2 7 0 3.9-3.2 7-7.2 7z" />
                        </svg><?php echo $this->lang->line('ltr_login_register'); ?></a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <div class="menus_btn">
              <div class="hamburger">
                <?php
                // if (isset($_SESSION['user_type']) && !empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
                ?>
                <!--<a href="<?= base_url('admin/submit-listing') ?>" class="btn"><?php echo $this->lang->line('ltr_submit_listing+'); ?></a>-->
                <?php
                // } elseif (isset($_SESSION['user_type']) && !empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'agent') {
                //
                ?>
                <!--  <a href="<? //= base_url('agent/submit-listing')
                                ?>" class="btn"><?php echo $this->lang->line('ltr_submit_listing+'); ?></a>-->
                <?php
                // }
                ?>
                <div class="hamburger-menu">
                  <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>


  <div class="error"></div>
  <!--User Profile Update Popup-->
  <div class="modal fade" id="user_change_<?= (isset($_SESSION['id']) && !empty($_SESSION['id'])) ? $_SESSION['id'] : 0; ?>" tabindex="-1" aria-labelledby="change_profile" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="change_profile">Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="profile_update_modal formget" method="POST" action="<?= base_url('homepage/user_profile') ?>">
            <input type="hidden" name="user_id" value="<?= (isset($_SESSION['id']) && !empty($_SESSION['id'])) ? $_SESSION['id'] : ''; ?>">
            <div class="form-group">
              <input type="text" name="full_name" class="form-control" placeholder="Name" value="<?= (isset($_SESSION['id']) && !empty($_SESSION['id'])) ? loop_select('id', $_SESSION['id'], 'full_name', 'px_userdata') : ''; ?>">
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Email" value="<?= (isset($_SESSION['id']) && !empty($_SESSION['id'])) ? loop_select('id', $_SESSION['id'], 'email', 'px_userdata') : ''; ?>">
            </div>
            <div class="form-group">
              <input type="hidden" id="up_phone" name="up_phone">
              <input type="tel" name="phone" class="form-control Mobile_code" placeholder="Phone Number" value="<?= (isset($_SESSION['id']) && !empty($_SESSION['id'])) ? loop_select('id', $_SESSION['id'], 'phone', 'px_userdata') : ''; ?>" minlength="10" maxlength="10">
            </div>
            <div class="form-group">
              <input type="text" name="user_name" class="form-control" placeholder="User Name" value="<?= (isset($_SESSION['id']) && !empty($_SESSION['id'])) ? loop_select('id', $_SESSION['id'], 'user_name', 'px_userdata') : ''; ?>">
            </div>
            <div class="form-group">
              <input type="text" name="address" class="form-control" placeholder="Address" value="<?= (isset($_SESSION['id']) && !empty($_SESSION['id'])) ? loop_select('id', $_SESSION['id'], 'address', 'px_userdata') : ''; ?>">
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--User Password Update Popup-->
  <div class="modal fade" id="user_pass_change_<?= (isset($_SESSION['id']) && !empty($_SESSION['id'])) ? $_SESSION['id'] : 0; ?>" tabindex="-1" aria-labelledby="change_pass" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="change_pass">Change Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="profile_update_modal formget" method="POST" action="<?= base_url('homepage/change_password') ?>">
            <div class="form-group">
              <input type="password" class="form-control" placeholder="New Password" name="new_password">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Confirm Password" name="conform_password">
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--User Upload Property Popup-->
  <div class="modal fade" id="user_property_upload" tabindex="-1" aria-labelledby="change_pass" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="change_pass">Upload Property</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="profile_update_modal formget" method="POST" action="<?= base_url('homepage/change_password') ?>">
            <div class="form-group">
              <input type="password" class="form-control" placeholder="New Password" name="new_password">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Confirm Password" name="conform_password">
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--===Header Section End===-->