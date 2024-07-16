<style>
    .logo-area {
        padding-bottom: 10px;
    }


    textarea#message {
        width: 100%;
        color: #0e2e50;
        border-color: #cacaca;
        border-radius: 5px;
        padding-left: 10px;
        font-size: 16px;
    }

    button.item-btn.hny {
        color: #ffffff;
        font-size: 17px;
        font-weight: 400;
        font-family: "Ubuntu", sans-serif;
        padding: 8px 20px;
        display: inline-block;
        background: linear-gradient(90deg, #bb9f5e 0, #e1d0ac 100.04%);
        border: none;
        border-radius: 2px;
    }

    .accept {
        color: #FFF;
        background: #44CC44;
        padding: 15px 20px;
        box-shadow: 0 4px 0 0 #2EA62E;
    }

    .accept:hover {
        background: #6FE76F;
        box-shadow: 0 4px 0 0 #7ED37E;
    }

    .deny {
        color: #FFF;
        background: tomato;
        padding: 15px 20px;
        box-shadow: 0 4px 0 0 #CB4949;
    }

    .deny:hover {
        background: rgb(255, 147, 128);
        box-shadow: 0 4px 0 0 #EF8282;
    }
</style>
<!--=====================================-->
<!--=   Breadcrumb     Start            =-->
<!--=====================================-->

<div class="breadcrumb-wrap breadcrumb-wrap-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Property</li>
            </ol>
        </nav>
    </div>
</div>

<!--=====================================-->
<!--=   Single Listing     Start        =-->
<!--=====================================-->

<section class="single-listing-wrap1">
    <div class="container">
        <div class="single-property">
            <div class="content-wrapper">
                <div class="property-heading">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="single-list-cate">
                                <div class="item-categoery">
                                    <?php if ($properties[0]['badge']) { ?>
                                        <?= _getWhere('px_addbadge', ['id' => $properties[0]['badge']])->badge; ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <?php if ((isset($properties[0]['sale_price']) || isset($properties[0]['rent_price'])) && ($properties[0]['sale_price'] != 0 || $properties[0]['rent_price'] != 0)) { ?>

                                <div class="single-list-price">
                                    <?= ($properties[0]['purpose'] == '1') ? loop_select('id', loop_select('id', 1, 'currency', 'px_owner_company'), 'currency_symbol', 'px_currencies') . $properties[0]['sale_price'] : loop_select('id', loop_select('id', 1, 'currency', 'px_owner_company'), 'currency_symbol', 'px_currencies') . $properties[0]['rent_price'] . '/ <span>Monthly</span>'; ?>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-12">
                            <div class="single-verified-area">
                                <div class="item-title">
                                    <h3>
                                        <a href="javascript:;">
                                            <?= (isset($properties[0]['property_name']) && !empty($properties[0]['property_name'])) ? $properties[0]['property_name'] : ''; ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="single-item-address">
                                <ul>
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <?= ((isset($properties[0]['address']) && !empty($properties[0]['address'])) ? $properties[0]['address'] : ''); ?>,

                                        <?= (isset($properties[0]['city']) && !empty($properties[0]['city'])) ? ', ' . _getWhere('cities', ['id' => $properties[0]['city']])->name : ''; ?>


                                        <?= loop_select('id', ((isset($properties[0]['states']) && !empty($properties[0]['states'])) ? $properties[0]['states'] : ''), 'name', 'px_states'); ?>

                                    </li>
                                    <li><i class="fas fa-clock"></i>
                                        <?= formatDate2($properties[0]['add_date']); ?>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">

                            <?php
                            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') { ?>
                                <?php if ($active[0]['approve'] == 0) { ?>

                                    <div class="row">
                                        <div class="property-form new-btn">
                                            <input type="hidden" id="property_id" value="<?= $properties[0]['id']; ?>">
                                            <a href="JavaScript:void(0);" id="accept" data-id="1" class="accept">Accept <span
                                                    class="fa fa-check"></span></a>
                                            <a href="JavaScript:void(0);" class="deny" data-id="2" id="reject">Reject <span
                                                    class="fa fa-close"></span></a>
                                        </div>
                                    </div>
                                <?php }
                            } ?>


                            <?php


                            if ($this->session->userdata('id')) {

                                ?>
                                <div class="side-button">
                                    <ul>
                                        <!-- <li>
                                        <a href="javascript:;" class="side-btn"><i class="flaticon-share"></i></a>
                                    </li> -->
                                        <li>
                                            <a href="javascript:;" class="side-btn"><i class="fa fa-heart favourate"
                                                    id="property_<?= $edit_property_id; ?>"
                                                    <?= favorite_info($edit_property_id, $_SESSION['id']); ?>
                                                    f_id="<?= $edit_property_id; ?>"></i></a>
                                        </li>
                                        <!-- <li>
                                        <a href="javascript:;" class="side-btn"><i
                                                class="flaticon-left-and-right-arrows"></i></a>
                                    </li> -->

                                    </ul>
                                </div>

                                <?php

                            }

                            ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="featured-thumb-slider-area wow fadeInUp" data-wow-delay=".4s">
                            <div class="feature-box3 swiper-container">
                                <div class="swiper-wrapper">
                                    <?php
                                    if (isset($property_media[0]['Images']) && !empty($property_media[0]['Images']) && (is_array(json_decode($property_media[0]['Images'])) ? count(json_decode($property_media[0]['Images'])) != 0 : '')) {

                                        foreach (json_decode($property_media[0]['Images']) as $imgs) {

                                            ?>

                                            <div class="swiper-slide">
                                                <div class="feature-img1 zoom-image-hover">
                                                    <img src="<?= base_url(); ?>uploads/<?= $imgs; ?>" alt="feature" width="798"
                                                        height="420" />
                                                </div>
                                            </div>
                                            <?php

                                        }

                                    } else {

                                        ?>

                                        <div class="swiper-slide">
                                            <div class="feature-img1 zoom-image-hover">
                                                <img src="<?= base_url(); ?>assets/front_assets/images/No_Image_Available.jpg"
                                                    alt="feature" width="798" height="420" />
                                            </div>
                                        </div>

                                    <?php } ?>

                                </div>
                            </div>
                            <div class="featured-thum-slider2 swiper-container">
                                <div class="swiper-wrapper">

                                    <?php

                                    if (isset($property_media[0]['Images']) && !empty($property_media[0]['Images']) && (is_array(json_decode($property_media[0]['Images'])) ? count(json_decode($property_media[0]['Images'])) != 0 : '')) {

                                        foreach (json_decode($property_media[0]['Images']) as $imgs) {

                                            ?>
                                            <div class="swiper-slide">
                                                <div class="item-img">
                                                    <img src="<?= base_url(); ?>uploads/<?= $imgs; ?>" alt="feature" width="154"
                                                        height="100" />
                                                </div>
                                            </div>

                                            <?php

                                        }

                                    } else {

                                        ?>
                                        <div class="swiper-slide">
                                            <div class="item-img">
                                                <img src="<?= base_url(); ?>assets/front_assets/images/No_Image_Available.jpg"
                                                    alt="feature" width="154" height="100" />
                                            </div>
                                        </div>

                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <div class="single-listing-box1">
                            <div class="overview-area">
                                <h3 class="item-title">Overview</h3>
                                <div class="gallery-icon-box">
                                    <div class="item-icon-box">
                                        <div class="item-icon">
                                            <i class="flaticon-comment"></i>
                                        </div>
                                        <ul class="item-number">
                                            <li>ID No :</li>
                                            <li class="deep-clr">rep_
                                                <?= $edit_property_id; ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="item-icon-box">
                                        <div class="item-icon">
                                            <i class="flaticon-home"></i>
                                        </div>
                                        <ul class="item-number">
                                            <li>Type :</li>
                                            <li class="deep-clr">
                                                <?= loop_select('id', ((isset($properties[0]['propty_category']) && !empty($properties[0]['propty_category'])) ? $properties[0]['propty_category'] : 'n/a'), 'category', 'px_addcategory'); ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="item-icon-box">
                                        <div class="item-icon">
                                            <i class="flaticon-bed"></i>
                                        </div>
                                        <ul class="item-number">
                                            <li>Rooms :</li>
                                            <li class="deep-clr">
                                                <?= ((isset($properties[0]['rooms']) && !empty($properties[0]['rooms'])) ? $properties[0]['rooms'] : 'n/a'); ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="item-icon-box">
                                        <div class="item-icon">
                                            <i class="flaticon-shower"></i>
                                        </div>
                                        <ul class="item-number">
                                            <li>Listed On :</li>
                                            <li class="deep-clr">
                                                <?= (isset($properties[0]['add_date']) && !empty($properties[0]['add_date'])) ? date('F d, Y', strtotime($properties[0]['add_date'])) : 'n/a'; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="gallery-icon-box">
                                    <div class="item-icon-box">
                                        <div class="item-icon">
                                            <i class="flaticon-home"></i>
                                        </div>
                                        <ul class="item-number">
                                            <li>Floors :</li>
                                            <li class="deep-clr">
                                                <?= (isset($properties[0]['floors']) && !empty($properties[0]['floors'])) ? $properties[0]['floors'] : 'n/a'; ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="item-icon-box">
                                        <div class="item-icon">
                                            <i class="flaticon-home"></i>
                                        </div>
                                        <ul class="item-number">
                                            <li>Area :</li>
                                            <li class="deep-clr">
                                                <?= ((isset($properties[0]['plot_area']) && !empty($properties[0]['plot_area'])) ? $properties[0]['plot_area'] : 'n/a'); ?>
                                                sqft
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="item-icon-box">
                                        <div class="item-icon">
                                            <i class="flaticon-pencil"></i>
                                        </div>
                                        <ul class="item-number">
                                            <li>Sale Price :</li>
                                            <li class="deep-clr">
                                                <?= loop_select('id', loop_select('id', 1, 'currency', 'px_owner_company'), 'currency_symbol', 'px_currencies'); ?>
                                                <?= (isset($properties[0]['sale_price']) && !empty($properties[0]['sale_price'])) ? number_format($properties[0]['sale_price']) : 'n/a'; ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="item-icon-box">
                                        <div class="item-icon">
                                            <i class="flaticon-two-overlapping-square"></i>
                                        </div>
                                        <ul class="item-number">
                                            <li>Rent Price :</li>
                                            <li class="deep-clr">
                                                <?= loop_select('id', loop_select('id', 1, 'currency', 'px_owner_company'), 'currency_symbol', 'px_currencies'); ?>
                                                <?= (isset($properties[0]['rent_price']) && !empty($properties[0]['rent_price'])) ? number_format($properties[0]['rent_price']) : 'n/a'; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="overview-area listing-area">
                                <h3 class="item-title">About This Listing</h3>
                                <?= ((isset($properties[0]['short_description']) && !empty($properties[0]['short_description'])) ? base64_decode($properties[0]['short_description']) : 'n/a'); ?>

                                <br>
                                <?= ((isset($properties[0]['long_description']) && !empty($properties[0]['long_description'])) ? base64_decode($properties[0]['long_description']) : 'n/a'); ?>

                            </div>
                            <div class="overview-area single-details-box table-responsive mt-2">
                                <h3 class="item-title">Details</h3>
                                <table class="table-box1">
                                    <tr>
                                        <td class="item-bold">Id No</td>
                                        <td>rep_
                                            <?= $edit_property_id; ?>
                                        </td>
                                        <td class="item-bold">Sale Price</td>
                                        <td>
                                            <?= loop_select('id', loop_select('id', 1, 'currency', 'px_owner_company'), 'currency_symbol', 'px_currencies'); ?>
                                            <?= (isset($properties[0]['sale_price']) && !empty($properties[0]['sale_price'])) ? number_format($properties[0]['sale_price']) : 'n/a'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="item-bold">Property Type</td>
                                        <td>
                                            <?= loop_select('id', ((isset($properties[0]['propty_category']) && !empty($properties[0]['propty_category'])) ? $properties[0]['propty_category'] : 'n/a'), 'category', 'px_addcategory'); ?>
                                        </td>
                                        <td class="item-bold">Rent Price</td>
                                        <td>
                                            <?= loop_select('id', loop_select('id', 1, 'currency', 'px_owner_company'), 'currency_symbol', 'px_currencies'); ?>
                                            <?= (isset($properties[0]['rent_price']) && !empty($properties[0]['rent_price'])) ? number_format($properties[0]['rent_price']) . '/mo' : 'n/a'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="item-bold">Rooms</td>
                                        <td>
                                            <?= ((isset($properties[0]['rooms']) && !empty($properties[0]['rooms'])) ? $properties[0]['rooms'] : 'n/a'); ?>
                                        </td>
                                        <td class="item-bold">Property Status</td>
                                        <td>
                                            <?= loop_select('id', ((isset($properties[0]['badge']) && !empty($properties[0]['badge'])) ? $properties[0]['badge'] : ''), 'badge', 'px_addbadge'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="item-bold">Floors</td>
                                        <td>
                                            <?= ((isset($properties[0]['floors']) && !empty($properties[0]['floors'])) ? $properties[0]['floors'] : 'n/a'); ?>
                                        </td>
                                        <td class="item-bold">Purpose</td>
                                        <td>
                                            <?= ($properties[0]['purpose'] == '1')? 'Sale' : 'Rent' ; ?>
                                        </td>
                                       
                                    </tr>
                                    <tr>
                                        <td class="item-bold">Build Area</td>
                                        <td>
                                            <?= ((isset($properties[0]['build_area']) && !empty($properties[0]['build_area'])) ? $properties[0]['build_area'] : 'n/a'); ?>
                                        </td>
                                        <td class="item-bold">Plot Area</td>
                                        <td>
                                            <?= ((isset($properties[0]['plot_area']) && !empty($properties[0]['plot_area'])) ? $properties[0]['plot_area'] : 'n/a'); ?>
                                            sqft
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="item-bold">Address</td>
                                        <td>
                                            <?= ((isset($properties[0]['address']) && !empty($properties[0]['address'])) ? $properties[0]['address'] : 'n/a'); ?>
                                        </td>
                                        <td class="item-bold">City</td>
                                        <td>
                                            <?= loop_select('id', ((isset($properties[0]['city']) && !empty($properties[0]['city'])) ? $properties[0]['city'] : ''), 'name', 'cities'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="item-bold">State</td>
                                        <td>
                                            <?= loop_select('id', ((isset($properties[0]['states']) && !empty($properties[0]['states'])) ? $properties[0]['states'] : ''), 'name', 'px_states'); ?>
                                        </td>
                                        <td class="item-bold">Country</td>
                                        <td>
                                            <?= loop_select('id', ((isset($properties[0]['country']) && !empty($properties[0]['country'])) ? $properties[0]['country'] : 'n/a'), 'name', 'px_country'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="item-bold">Zipcode</td>
                                        <td>
                                            <?= ((isset($properties[0]['zip_code']) && !empty($properties[0]['zip_code'])) ? $properties[0]['zip_code'] : 'n/a'); ?>
                                        </td>
                                        <td class="item-bold">Agent</td>
                                        <td>
                                            <?= ((isset($properties[0]['full_name']) && !empty($properties[0]['full_name'])) ? $properties[0]['full_name'] : 'n/a'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="item-bold">Neighborhood</td>
                                        <td>
                                        <?= loop_select('id', ((isset($properties[0]['neighbourhood']) && !empty($properties[0]['neighbourhood'])) ? $properties[0]['neighbourhood'] : ''), 'neighbourhood', 'px_addneighbourhood'); ?>
                                       </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="overview-area single-details-box table-responsive mt-2">
                                <h3 class="item-title">Features</h3>

                                <?php
                                if (isset($amenities[0]['indoor']) && !empty($amenities[0]['indoor'])) { ?>
                                <div class="my-2">
                                        <h4 style="font-size: 1.2rem; font-weight: 500;">Interior Details</h4>
                                    <div class="row flex-wrap mt-1 mx-2">
                                        <?php
                                        foreach (json_decode($amenities[0]['indoor'], true) as $amenite) {
                                            foreach ($amenite as $mark_key => $mark_value) {
                                                ?>
                                                <div class="col-md-4 col-sm-6 col-12 p-0">
                                                    <div class="amenities-info m-1">
                                                        <i class="fa fa-solid fa-check" style="color: green;"></i>
                                                        <span>
                                                            <?= $mark_value; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            <?php }
                                        } ?>
                                    </div>
                                    </div>
                                <?php }?>
                                <?php
                                if (isset($landmark[0]['land_marks']) && !empty($landmark[0]['land_marks'])) { ?>
                                <div class="my-2">
                                    <h4 style="font-size: 1.2rem; font-weight: 500;">Landmarks</h4>
                                    <div class="row flex-wrap mt-1 mx-2">
                                        <?php
                                        foreach (json_decode($landmark[0]['land_marks'], true) as $amenite) {
                                            foreach ($amenite as $mark_key => $mark_value) {
                                                ?>
                                                <div class="col-md-4 col-sm-6 col-12 p-0">
                                                    <div class="amenities-info m-1">
                                                    <i class="fa fa-solid fa-landmark"></i>                                                            <?= $mark_value; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            <?php }
                                        } ?>
                                    </div>
                                    </div>
                                <?php }?>
                                
                            </div>

                            <div class="overview-area single-details-box table-responsive mt-2">
                                <h3 class="item-title">Company Details</h3>
                                <table class="table-box1">
                                    <tr>
                                        <td class="item-bold">Company Name</td>
                                        <td>
                                        <?=((isset($company[0]['company_name']) && !empty($company[0]['company_name']))?$company[0]['company_name']:'n/a');?>
                                        </td>
                                        <td class="item-bold">Company Contact</td>
                                        <td>
                                        <?=((isset($company[0]['company_phone']) && !empty($company[0]['company_phone']))?$company[0]['company_phone']:'n/a');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="item-bold">Website</td>
                                        <td>
                                        <?=((isset($company[0]['website']) && !empty($company[0]['website']))?$company[0]['website']:'n/a');?>
                                        </td>
                                        <td class="item-bold">Facebook</td>
                                        <td>
                                        <?=((isset($company[0]['facebook']) && !empty($company[0]['facebook']))?$company[0]['facebook']:'n/a');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="item-bold">Twitter</td>
                                        <td>
                                        <?=((isset($company[0]['twitter']) && !empty($company[0]['twitter']))?$company[0]['twitter']:'n/a');?>
                                        </td>
                                        <td class="item-bold">Office Hours</td>
                                        <td>
                                        <?=((isset($company[0]['office_hour']) && !empty($company[0]['office_hour']))?$company[0]['office_hour']:'n/a');?>
                                        </td>
                                    </tr>
                                  
                                </table>
                                <div style="background-color: #eaf7f4;padding: 10px;margin-top: 5px;">
                                    <h6>About Company</h6>
                                    <?=((isset($company[0]['company_detail']) && !empty($company[0]['company_detail']))?base64_decode($company[0]['company_detail']):'n/a');?>
                                </div>
                            </div>



                            <div class="overview-area ameniting-box mt-3">
                                <h3 class="item-title mb-0">Get in touch</h3>
                                <p>Fill out this form and we will be in touch with you soon.</p>
                                <form class="contact-box formget" method="post" action="<?= base_url('add-query'); ?>">
                                    <div class="row">
                                        <input type="hidden" name="property" value="<?= $edit_property_id; ?>">

                                        <input type="hidden" name="agent"
                                            value="<?= ((isset($properties[0]['agent']) && !empty($properties[0]['agent'])) ? $properties[0]['agent'] : ''); ?>">

                                        <div class="form-group col-lg-6">
                                            <label class="item-loan">Full Name*</label>
                                            <input type="text" class="form-control" id="username" autocomplete="off"
                                                name="username" placeholder="Enter Your Full Name"
                                                data-error="First Name is required" required />
                                            <h6 style="font-size: 12px;" id="usercheck"></h6>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="item-loan">Email*</label>
                                            <input type="Email" id="u_email" class="form-control" autocomplete="off"
                                                name="email" placeholder="Enter Your Email"
                                                data-error="Email is required" required />
                                            <h6 style="font-size: 12px;" id="emailcheck"></h6>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="item-loan">Mobile Number*</label>
                                            <input type="text" class="form-control" id="u_phone" autocomplete="off"
                                                name="phone" placeholder="Enter Your Mobile Number"
                                                data-error="Phone is required" required />
                                            <h6 style="font-size: 12px;" id="phonecheck"></h6>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Message *</label>
                                            <textarea name="comment" id="message" class="form-text"
                                                placeholder="Type Your Message.." cols="30" rows="5"
                                                data-error="Message Name is required" required></textarea>
                                            <div style="font-size: 12px;" class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <button type="submit" class="item-btn hny">Send message</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 widget-break-lg sidebar-widget">

                        <div class="contact-map">

                            <?php echo $properties[0]['gps_cords']; ?>
                            <iframe id="map"
                                style="width: 100%; height: 500px; border: 1px solid #fff;border-radius: 1rem;margin-bottom: 30px;"
                                src="https://maps.google.com/maps?&amp;q=<?php echo urlencode($properties[0]['gps_cords']); ?>&amp;output=embed"></iframe>
                        </div>


                        <div class="widget widget-contact-box">
                            <!-- <h3 class="widget-subtitle">Contact Agent</h3> -->
                            <div class="media d-flex">
                                <div class="flex-shrink-0">
                                    <div class="item-logo">
                                        <img
                                            src="<?= ((isset($properties[0]['profile_photo']) && !empty($properties[0]['profile_photo'])) ? base_url() . 'uploads/' . $properties[0]['profile_photo'] : base_url() . 'assets/front_assets/images/no-ava.jpeg'); ?>">
                                    </div>
                                </div>
                                <div class="media-body flex-grow-1 ms-3">
                                    <?php if ($properties[0]['uploaded_by'] != 'admin') { ?>
                                        <a
                                            href="<?= base_url(); ?>member/<?= ((isset($properties[0]['id']) && !empty($properties[0]['id'])) ? $properties[0]['id'] : ''); ?>-<?= str_replace(" ", "-", ((isset($properties[0]['full_name']) && !empty($properties[0]['full_name'])) ? $properties[0]['full_name'] : 'n/a')); ?>">
                                            <h4 class="item-title">
                                                <?= (isset($properties[0]['full_name']) && !empty($properties[0]['full_name'])) ? $properties[0]['full_name'] : 'n/a'; ?>
                                            </h4>
                                        </a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0);">
                                            <h4 class="item-title">
                                                MBC Reality
                                            </h4>
                                        </a>
                                    <?php } ?>
                                    <!-- <div class="item-phn">
                                        +12 12345-67890</a>
                                    </div>
                                    <div class="item-mail">agent@mbcrealty.com</div>
                                    <div class="item-rating">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li class="rating-count">(Reviews 15)</li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="widget widget-listing-box1">
                            <h3 class="widget-subtitle">Latest Listing</h3>
                            <!-- <div class="item-img">
                                <a href="javascript:;"><img src="img/blog/widget1.jpg" alt="widget" width="540"
                                        height="360" /></a>
                                <div class="item-category-box1">
                                    <div class="item-category">For Rent</div>
                                </div>
                            </div> -->
                            <!-- <div class="widget-content">
                                <div class="item-category10">
                                    <a href="javascript:;">Villa</a>
                                </div>
                                <h4 class="item-title">
                                    <a href="javascript:;">Modern Villa for House Highland Ave Los Angeles</a>
                                </h4>
                                <div class="location-area">
                                    <i class="flaticon-maps-and-flags"></i>2150 S Jones
                                    Blvd, USA
                                </div>
                                <div class="item-price">$11,000<span>/mo</span></div>
                            </div> -->

                            <?php
                            foreach ($propert as $properties) { ?>
                                <div class="widget-listing">
                                    <div class="item-img">
                                        <a href="javascript:;"><img
                                                src="<?= (json_decode(loop_select('property_id', $properties['id'], 'images', 'px_property_media'), true) ? base_url() . 'uploads/' . json_decode(loop_select('property_id', $properties['id'], 'images', 'px_property_media'), true)[0] : base_url() . 'assets/front_assets/images/banner-bg.png'); ?>"
                                                alt="widget" width="120" height="102" /></a>
                                    </div>
                                    <div class="item-content">
                                        <h5 class="item-title">
                                            <a
                                                href="<?= base_url(); ?>listing/<?= $properties['id']; ?>-<?= str_replace(",", "-", $properties['url_sluge']); ?>"><?= $properties['property_name']; ?></a>
                                        </h5>

                                        <div class="location-area">
                                            <i class="flaticon-maps-and-flags"></i>
                                            <?= _getWhere('cities', ['id' => $properties['city']])->name; ?>,
                                            <?= loop_select('id', $properties['states'], 'name', 'px_states'); ?>
                                        </div>
                                        <div class="item-price">
                                            <?= ($properties['purpose'] == '1') ? loop_select('id', loop_select('id', 1, 'currency', 'px_owner_company'), 'currency_symbol', 'px_currencies') . $properties['sale_price'] : loop_select('id', loop_select('id', 1, 'currency', 'px_owner_company'), 'currency_symbol', 'px_currencies') . $properties['rent_price'] . '/ <span>mo</span>'; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- <div class="widget-listing">
                                <div class="item-img">
                                    <a href="javascript:;"><img src="img/blog/widget3.jpg" alt="widget" width="120"
                                            height="102" /></a>
                                </div>
                                <div class="item-content">
                                    <h5 class="item-title">
                                        <a href="javascript:;">House Highland Ave Los Angeles</a>
                                    </h5>
                                    <div class="location-area">
                                        <i class="flaticon-maps-and-flags"></i>California
                                    </div>
                                    <div class="item-price">$1,200<span>/mo</span></div>
                                </div>
                            </div>
                            <div class="widget-listing no-brd">
                                <div class="item-img">
                                    <a href="javascript:;"><img src="img/blog/widget4.jpg" alt="widget" width="120"
                                            height="102" /></a>
                                </div>
                                <div class="item-content">
                                    <h5 class="item-title">
                                        <a href="javascript:;">House Highland Ave Los Angeles</a>
                                    </h5>
                                    <div class="location-area">
                                        <i class="flaticon-maps-and-flags"></i>California
                                    </div>
                                    <div class="item-price">$1,900<span>/mo</span></div>
                                </div>
                            </div> -->
                        </div>
                        <!-- <div class="widget widget-contact-box widget-price-range">
                            <h3 class="widget-subtitle">Mortgage Calculator</h3>

                            <form class="contact-box">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label class="item-loan">Loan Amount :</label>
                                        <input type="text" class="form-control" name="fname" placeholder="$00.00"
                                            data-error="First Name is required" required />
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label class="item-loan">Down Payment :</label>
                                        <input type="text" class="form-control" name="phone" placeholder="$00.00"
                                            data-error="Phone is required" required />
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label class="item-loan">Years :</label>
                                        <input type="text" class="form-control" name="phone" placeholder="12 Years"
                                            data-error="Phone is required" required />
                                    </div>
                                </div>
                            </form>
                            <ul class="wid-contact-button mt-3">
                                <li><a href="javascript:;">Calculate</a></li>
                                <li>
                                    <a href="javascript:;"><i class="fas fa-sync-alt"></i>Reset Form</a>
                                </li>
                            </ul>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================-->
<!--=   Property     Start              =-->
<!--=====================================-->

<!-- <section class="property-wrap1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7 col-sm-7">
                <div class="item-heading-left">
                    <span class="section-subtitle">Our PROPERTIES</span>
                    <h2 class="section-title">Latest Properties</h2>
                    <div class="bg-title-wrap" style="display: block">
                        <span class="background-title solid">Properties</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-5">
                <div class="heading-button">
                    <a href="javascript:;" class="heading-btn item-btn2">All Properties</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                    <div class="item-img">
                        <a href="javascript:;"><img src="img/blog/blog4.jpg" alt="blog" width="510" height="340"></a>
                        <div class="item-category-box1">
                            <div class="item-category">For Sell</div>
                        </div>
                        <div class="rent-price">
                            <div class="item-price">$15,000<span><i>/</i>mo</span></div>
                        </div>
                        <div class="react-icon">
                            <ul>
                                <li>
                                    <a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Favourites">
                                        <i class="flaticon-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Compare">
                                        <i class="flaticon-left-and-right-arrows"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item-category10"><a href="javascript:;">Appartment</a></div>
                    <div class="item-content">
                        <div class="verified-area">
                            <h3 class="item-title"><a href="javascript:;">Family House For Sell</a></h3>
                        </div>
                        <div class="location-area"><i class="flaticon-maps-and-flags"></i>Downey, California</div>
                        <div class="item-categoery3">
                            <ul>
                                <li><i class="flaticon-bed"></i>Beds: 03</li>
                                <li><i class="flaticon-shower"></i>Baths: 02</li>
                                <li><i class="flaticon-two-overlapping-square"></i>931 Sqft</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="property-box2 wow animated fadeInUp" data-wow-delay=".2s">
                    <div class="item-img">
                        <a href="javascript:;"><img src="img/blog/blog5.jpg" alt="blog" width="510" height="340"></a>
                        <div class="item-category-box1">
                            <div class="item-category">For Rent</div>
                        </div>
                        <div class="rent-price">
                            <div class="item-price">$12,000<span><i>/</i>mo</span></div>
                        </div>
                        <div class="react-icon">
                            <ul>
                                <li>
                                    <a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Favourites">
                                        <i class="flaticon-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Compare">
                                        <i class="flaticon-left-and-right-arrows"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item-category10"><a href="javascript:;">Villa</a></div>
                    <div class="item-content">
                        <div class="verified-area">
                            <h3 class="item-title"><a href="javascript:;">Countryside Modern Lake View</a></h3>
                        </div>
                        <div class="location-area"><i class="flaticon-maps-and-flags"></i>Downey, California</div>
                        <div class="item-categoery3">
                            <ul>
                                <li><i class="flaticon-bed"></i>Beds: 03</li>
                                <li><i class="flaticon-shower"></i>Baths: 02</li>
                                <li><i class="flaticon-two-overlapping-square"></i>931 Sqft</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="property-box2 wow animated fadeInUp" data-wow-delay=".1s">
                    <div class="item-img">
                        <a href="javascript:;"><img src="img/blog/blog6.jpg" alt="blog" width="510" height="340"></a>
                        <div class="item-category-box1">
                            <div class="item-category">For Sell</div>
                        </div>
                        <div class="rent-price">
                            <div class="item-price">$18,000<span><i>/</i>mo</span></div>
                        </div>
                        <div class="react-icon">
                            <ul>
                                <li>
                                    <a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Favourites">
                                        <i class="flaticon-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Compare">
                                        <i class="flaticon-left-and-right-arrows"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item-category10"><a href="javascript:;">Office</a></div>
                    <div class="item-content">
                        <div class="verified-area">
                            <h3 class="item-title"><a href="javascript:;">Gorgeous Apartment Building </a></h3>
                        </div>
                        <div class="location-area"><i class="flaticon-maps-and-flags"></i>Downey, California</div>
                        <div class="item-categoery3">
                            <ul>
                                <li><i class="flaticon-bed"></i>Beds: 03</li>
                                <li><i class="flaticon-shower"></i>Baths: 02</li>
                                <li><i class="flaticon-two-overlapping-square"></i>931 Sqft</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--=====================================-->
<!--=   Newsletter     Start            =-->
<!--=====================================-->

<!-- <section class="newsletter-wrap1">
    <div class="shape-img1">
        <img src="img/figure/shape13.png" alt="figure" width="356" height="130" />
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="newsletter-layout1">
                    <div class="item-heading">
                        <h2 class="item-title">Sign up for newsletter</h2>
                        <h3 class="item-subtitle">Get latest news and update</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="newsletter-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter e-mail addess" />
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->