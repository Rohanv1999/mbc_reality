<!--===Banner Section Start===-->

<div class="container-fluid p-0">

    <div class="banner-wrapper">

        <div class="row justify-content-center align-items-center">

            <div class="col-lg-12 col-12">

                <div class="banner-section text-center">

                    <div class="banner-info">

                        <h1><?= wordwrap(loop_select('section_name', 'Banner', 'main_heading', 'px_homepage'), 19, "<br>"); ?></h1>

                        <p><?= nl2br(loop_select('section_name', 'Banner', 'main_content', 'px_homepage')); ?></p>

                        <!--<a href="<?= base_url('contact-us'); ?>" class="btn"><?php echo $this->lang->line('ltr_contact_us'); ?></a>-->

                    </div>

                </div>

            </div>

            <div class="col-lg-8 col-12 ">

                <div class="banner-form">

                    <!-- Nav tabs -->

                    <ul class="nav nav-tabs" role="tablist">

                        <!--<li class="nav-item">-->

                        <!--    <a class="nav-link" data-toggle="tab" href="#sale"><?php echo $this->lang->line('ltr_sale'); ?></a>-->

                        <!--</li>-->

                        <!--<li class="nav-item">-->

                        <!--	<a class="nav-link active" data-toggle="tab" href="#rent"><?php echo $this->lang->line('ltr_rent'); ?></a>-->

                        <!--</li>-->

                    </ul>

                    <!-- Tab panes -->

                    <div class="tab-content">

                        <div id="sale" class="container tab-pane active">

                            <form class="filter" method="post" id="filterSale" action="<?= base_url('result/for-sale') ?>" autocomplete="off">


                                <div class="srchfilter">

                                    <div class="form-group propcat">

                                        <!--<label><?php echo $this->lang->line('ltr_property_category'); ?></label>-->
                          
                                        <select name="city" class="form-control" id="property-category-sale">

                                        <option value="">Select City</option>
                                            <?php
                                            foreach ($city as $category) {
                                                $cityInfo = _getWhere('cities', ['id' => $category['city']]);
                                            ?>
                                                <option value="<?= $category['city'] ?>"><?= $cityInfo->name ?? '' ?></option>

                                            <?php  }   ?>


                                        </select>

                                    </div>



                                    <div class="form-group propKey">

                                        <!--<label for="location"><?php echo $this->lang->line('ltr_city'); ?></label>-->

                                        <input type="text" name="location" placeholder="Search by locality, property type, builder or project" class="form-control" id="location-sale">
                                        <span id="result"></span>
                                    </div>

                                    <div class="form-group propbtn">
                                            <input type="submit" name="submit" id="reSalebtn" class="btn resetform " value="Search">
                                      
                                    </div>

                                </div>
                               


                              

                            </form>

                             <div class="row mt-3">
                                  <div class="col-md-12 col-md-12 d-flex flex-row col-mod">
                                      <?php $token =  "RESA" . round(microtime(true));  foreach($categorys as $cat){ ?>
                                      <a class="sbrtbsbtn" href="<?= base_url('for-sale/'.$cat['id'].'/'.$token) ?>" >
                                      <?=$cat['category']; ?> <input type="hidden" value="<?=$cat['id']; ?>" name="category"></a>
                                      <?php } ?>
                                       <a class="sbrtbsbtn" href="<?= base_url('listings'); ?>" >
                                      All </a>
                                      </div>
                                </div>

                        </div>

                        <div id="rent" class="container tab-pane fade ">

                            <form class="filter" method="post" action="<?= base_url('result/for-rent') ?>" autocomplete="off">

                                <div class="row">

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 p-2">

                                        <div class="form-group">

                                            <label><?php echo $this->lang->line('ltr_property_category'); ?></label>

                                            <select name="category" class="form-control" id="property-category-rent">

                                                <option value=""><?php echo $this->lang->line('ltr_property_category'); ?></option>

                                                <?php

                                                foreach ($categorys as $category1) {

                                                ?>

                                                    <option value="<?= $category1['id'] ?>"><?= $category1['category'] ?></option>

                                                <?php

                                                }

                                                ?>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 p-2">

                                        <div class="form-group">

                                            <label for="location"><?php echo $this->lang->line('ltr_city'); ?></label>

                                            <input type="text" name="location" class="form-control" placeholder="Enter a city" id="location-rent">

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 p-2">

                                        <div class="form-group">

                                            <label><?php echo $this->lang->line('ltr_bedrooms'); ?></label>

                                            <input type="number" name="bedroom" class="form-control" placeholder="No. of Bedroom" id="property-bedrooms-rent">

                                        </div>

                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 p-2">

                                        <div class="form-group">

                                            <label><?php echo $this->lang->line('ltr_bathrooms'); ?></label>

                                            <input type="number" name="bathroom" class="form-control" placeholder="No. of Bathroom" id="property-bathrooms-rent">

                                        </div>

                                    </div>

                                </div>


                                <input type="submit" name="submit" class="btn resetform" value="Search">

                            </form>

                        </div>



                    </div>

                </div>

            </div>

            <div class="overlay"></div>

        </div>

    </div>

</div>

<!--===Banner Section End===-->

<!--===Popular Listing Section Start===-->

<section class="listing-wrapper">

    <div class="container">

        <!-- Common Heading -->

        <div class="section-heading listing-section">

            <!--<h5><?= loop_select('section_name', 'Discover', 'section_name', 'px_homepage'); ?></h5>-->

            <span></span>

        </div>

        <!-- Common Title -->

        <div class="section-title hny-before">

            <h3><?= loop_select('section_name', 'Discover', 'main_heading', 'px_homepage'); ?></h3>

        </div>

        <!-- Common Text -->

        <div class="section-text listing-after">

            <p><?= nl2br(loop_select('section_name', 'Discover', 'main_content', 'px_homepage')); ?></p>

        </div>

        <div class="row py-4">

            <?php

            foreach ($properties as $properties) {

            ?>
            

                <div class="col-lg-4 col-md-6 col-12">
                      <a href="<?= base_url(); ?>listing/<?= $properties['id']; ?>-<?= str_replace(",", "-", $properties['url_sluge']); ?>">

                    <div class="property-card">

                        <div class="property-image">

                            <img src="<?= (json_decode(loop_select('property_id', $properties['id'], 'images', 'px_property_media'), true) ? base_url() . 'uploads/' . json_decode(loop_select('property_id', $properties['id'], 'images', 'px_property_media'), true)[0] : base_url() . 'assets/front_assets/images/banner-bg.png'); ?>">
                            <div class="property-button">
                                <?php if (isset($properties['purpose']) && is_numeric($properties['purpose'])) { ?><span class="btn rent-btn"><?= loop_select('id', $properties['purpose'], 'purpose', 'px_addpurpose'); ?></span><?php } ?>
                                <?php if (isset($properties['badge']) && is_numeric($properties['badge'])) { ?><span class="btn new-btn"><?= loop_select('id', $properties['badge'], 'badge', 'px_addbadge'); ?></span><?php } ?>
                            </div>
                            <?php

                            if ($this->session->userdata('id')) {

                            ?>

                                <div class="property-icon">

                                    <a href="javascript:void(0)" class="favourate" f_id="<?= $properties['id']; ?>"><i id="property_<?= $properties['id']; ?>" <?= favorite_info($properties['id'], $_SESSION['id']); ?> class="fas fa-heart"></i></a>

                                </div>

                            <?php

                            }

                            ?>

                        </div>

                        <div class="property-detail">

                            <!-- <div class="property-price">

									<h4><?= ($properties['purpose'] == '1') ? '$' . $properties['sale_price'] : '$' . $properties['rent_price'] . '/ <span>Monthly</span>'; ?></h4>

								</div> -->
								 <a href="<?= base_url(); ?>listing/<?= $properties['id']; ?>-<?= str_replace(",", "-", $properties['url_sluge']); ?>">

                            <div class="property-name">

                                <a href="<?= base_url(); ?>listing/<?= $properties['id']; ?>-<?= str_replace(",", "-", $properties['url_sluge']); ?>">
                                    <h4><?= $properties['property_name']; ?></h4>
                                </a>

                            </div>
                            </a>
                         <a href="<?= base_url(); ?>listing/<?= $properties['id']; ?>-<?= str_replace(",", "-", $properties['url_sluge']); ?>">

                            <div class="property-location">
                                <img src="<?= base_url(); ?>assets/front_assets/images/listing-location.png">
                                <?php  $cityInfo = _getWhere('cities', ['id' => $properties['city']]);?>
                                <span><?= $cityInfo->name; ?> <?= loop_select('id', $properties['states'], 'name', 'px_states'); ?></span>

                            </div>
                            </a>
                            
                         <a href="<?= base_url(); ?>listing/<?= $properties['id']; ?>-<?= str_replace(",", "-", $properties['url_sluge']); ?>">

                            <div class="property-amenities">

                                <div class="amenities-info">

                                    <img src="<?= base_url(); ?>assets/front_assets/images/listing-amenities-bed.png">

                                    <span><?php echo $this->lang->line('ltr_bed'); ?> : <?= ($properties['bedrooms']) ? $properties['bedrooms'] : 'n/a' ; ?></span>

                                </div>

                                <div class="amenities-info">

                                    <img src="<?= base_url(); ?>assets/front_assets/images/listing-amenities-bath.png">

                                    <span><?php echo $this->lang->line('ltr_bath'); ?> : <?= ($properties['bathrooms']) ? $properties['bathrooms'] : 'n/a' ; ?></span>

                                </div>

                                <div class="amenities-info">

                                    <img src="<?= base_url(); ?>assets/front_assets/images/listing-amenities-area.png">

                                    <span><?= ($properties['plot_area']) ? $properties['plot_area'] : 'n/a'; ?> Sqft</span>

                                </div>

                            </div>
                            </a>

                            <hr>

                            <div class="listing-details">

                                <div class="listing-agent">

                                    <img src="<?= (isset($properties['profile_photo']) && !empty($properties['profile_photo'])) ? base_url() . 'uploads/' . $properties['profile_photo'] : base_url() . 'assets/front_assets/images/no-ava.jpeg'; ?>" class="rounded-circle">

                                    <span><?= $properties['full_name']; ?></span>

                                </div>

                                <div class="listing-post">

                                    <span class="title"><?php echo $this->lang->line('ltr_post'); ?> :</span>

                                    <img src="<?= base_url(); ?>assets/front_assets/images/listing-calendar.png">

                                    <span><?= date('Y-m-d', strtotime($properties['add_date'])); ?></span>

                                </div>

                            </div>

                        </div>

                    </div>
                    </a>

                </div>

            <?php

            }

            ?>

        </div>

    </div>

    <div class="section-heading text-center pt-5">

        <a href="<?= base_url('listings') ?>" class="btn"><?php echo $this->lang->line('ltr_view_more'); ?></a>

    </div>

</section>

<!--===Popular Listing Section End===-->

<!--===Our Team Section Start===-->

<section id="team" class="team-wrapper">

    <div class="container">

        <!-- Common Heading -->

        <div class="section-heading listing-section">

            <h5><?= loop_select('section_name', 'Our Team', 'section_name', 'px_homepage'); ?></h5>

            <span></span>

        </div>

        <!-- Common Title -->

        <div class="section-title">

            <h3><?= loop_select('section_name', 'Our Team', 'main_heading', 'px_homepage'); ?></h3>

        </div>

        <!-- Common Text -->

        <div class="section-text listing-after">

            <p><?= nl2br(loop_select('section_name', 'Our Team', 'main_content', 'px_homepage')); ?></p>

        </div>

        <div class="row ">

            <div class="team-section">

                <div class="swiper teamSwiper">

                    <div class="swiper-wrapper">

                        <?php

                        foreach ($agent as $agent) {

                        ?>

                            <div class="swiper-slide">

                                <div class="card">

                                    <img src="<?= (isset($agent['profile_photo']) && !empty($agent['profile_photo'])) ? base_url() . 'uploads/' . $agent['profile_photo'] : base_url() . 'assets/front_assets/images/no-ava.jpeg'; ?>">

                                    <div class="card-detail">

                                        <a href="<?= base_url(); ?>member/<?= $agent['id']; ?>-<?= str_replace(" ", "-", $agent['full_name']); ?>">
                                            <h5><?= $agent['full_name']; ?><br><span><?php echo $this->lang->line('ltr_company_agent'); ?></span></h5>
                                        </a>

                                    </div>

                                    <div class="team-social-links">

                                        <a href="https://<?php echo $agent['fb_link']; ?>"><i class="fab fa-facebook-f"></i></a>

                                        <a href="https://<?php echo $agent['insta_link']; ?>"><i class="fab fa-instagram"></i></a>

                                        <a href="https://<?php echo $agent['twitter_link']; ?>"><i class="fab fa-twitter"></i></a>

                                        <a href="https://<?php echo $agent['linkedin_link']; ?>"><i class="fab fa-linkedin-in"></i></a>

                                    </div>

                                </div>

                            </div>

                        <?php

                        }

                        ?>

                    </div>

                </div>

                <div class="swiper-button-prev" id="team-prev"></div>

                <div class="swiper-button-next" id="team-next"></div>

            </div>

        </div>

    </div>

</section>

<!--===Our Team Section End===-->

<!--===About Section Start===-->

<section class="about-wrapper">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6 col-12 ">

                <div class="about-section">

                    <!-- Common Heading -->

                    <div class="section-heading">

                        <h5><?= loop_select('section_name', 'About Us', 'section_name', 'px_homepage'); ?></h5>

                        <span></span>

                    </div>

                    <!-- Common Title -->

                    <div class="section-title">

                        <h3><?= loop_select('section_name', 'About Us', 'main_heading', 'px_homepage'); ?></h3>

                    </div>

                    <!-- Common Text -->

                    <div class="section-text">

                        <p><?= nl2br(loop_select('section_name', 'About Us', 'main_content', 'px_homepage')); ?></p>

                    </div>

                    <!--<a href="<? //=base_url('listings/for-rent')
                                    ?>" class="btn"><?php //echo $this->lang->line('ltr_view_for_rent');
                                                                                    ?></a>-->

                </div>

            </div>

            <div class="col-lg-3 col-md-6 col-12">

                <div class="about-image-left">

                    <img src="<?= base_url() . 'uploads/' . loop_select('id', 1, 'aboutus_image', 'px_aboutus_data'); ?>">

                    <div class="about-overlay">

                        <h5><?= loop_select('id', 1, 'aboutus_heading', 'px_aboutus_data'); ?></h5>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 col-12">

                <div class="about-image-right">

                    <div class="about-right-image-one">

                        <img class="about-img-one" src="<?= base_url() . 'uploads/' . loop_select('id', 2, 'aboutus_image', 'px_aboutus_data'); ?>">

                        <div class="about-overlay">

                            <h5><?= loop_select('id', 2, 'aboutus_heading', 'px_aboutus_data'); ?></h5>

                        </div>

                    </div>

                    <div class="about-right-image-two">

                        <img class="about-img-two" src="<?= base_url() . 'uploads/' . loop_select('id', 3, 'aboutus_image', 'px_aboutus_data'); ?>">

                        <div class="about-overlay">

                            <h5><?= loop_select('id', 3, 'aboutus_heading', 'px_aboutus_data'); ?></h5>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!--===About Section End===-->

<!--===Choose Us Section Start===-->

<section class="choose-us-wrapper">

    <div class="container">

        <!-- Common Heading -->

        <div class="section-heading text-center">

            <h5><?= loop_select('section_name', 'Choose Us', 'section_name', 'px_homepage'); ?></h5>

            <span></span>

        </div>

        <!-- Common Title -->

        <div class="section-title text-center">

            <h3><?= loop_select('section_name', 'Choose Us', 'main_heading', 'px_homepage'); ?></h3>

        </div>

        <!-- Common Text -->

        <div class="section-text text-center">

            <p><?= nl2br(loop_select('section_name', 'Choose Us', 'main_content', 'px_homepage')); ?></p>

        </div>

        <div class="row py-4">

            <div class="col-lg-3 col-md-6 col-sm-6 col-size">

                <div class="choose-us-box">

                    <div class="choose-us-icon text-center">

                        <img src="<?= base_url(); ?>assets/front_assets/images/choose-icon-1.png">

                    </div>

                    <div class="choose-us-info">

                        <div class="wrapper-heading text-center">

                            <h5><?php echo $this->lang->line('ltr_choose_heading1'); ?></h5>

                        </div>

                        <div class="section-text text-center">

                            <p><?php echo $this->lang->line('ltr_choose_content1'); ?></p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-size">

                <div class="choose-us-box">

                    <div class="choose-us-icon text-center">

                        <img src="<?= base_url(); ?>assets/front_assets/images/choose-icon-2.png">

                    </div>

                    <div class="choose-us-info">

                        <div class="wrapper-heading text-center">

                            <h5><?php echo $this->lang->line('ltr_choose_heading2'); ?></h5>

                        </div>

                        <div class="section-text text-center">

                            <p><?php echo $this->lang->line('ltr_choose_content2'); ?></p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-size">

                <div class="choose-us-box">

                    <div class="choose-us-icon text-center">

                        <img src="<?= base_url(); ?>assets/front_assets/images/choose-icon-3.png">

                    </div>

                    <div class="choose-us-info">

                        <div class="wrapper-heading text-center">

                            <h5><?php echo $this->lang->line('ltr_choose_heading3'); ?></h5>

                        </div>

                        <div class="section-text text-center">

                            <p><?php echo $this->lang->line('ltr_choose_content3'); ?></p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-size">

                <div class="choose-us-box">

                    <div class="choose-us-icon text-center">

                        <img src="<?= base_url(); ?>assets/front_assets/images/choose-icon-4.png">

                    </div>

                    <div class="choose-us-info">

                        <div class="wrapper-heading text-center">

                            <h5><?php echo $this->lang->line('ltr_choose_heading4'); ?></h5>

                        </div>

                        <div class="section-text text-center">

                            <p><?php echo $this->lang->line('ltr_choose_content4'); ?></p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!--===Choose Us Section End===-->

<?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'user') { ?>

    <!--===Membership Section Start===-->

    <section id="membership" class="membership-wrapper">

        <div class="container">

            <!-- Common Heading -->

            <div class="section-heading listing-section">

                <h5><?= loop_select('section_name', 'Our Packages', 'section_name', 'px_homepage'); ?></h5>

            </div>

            <!-- Common Title -->

            <div class="section-title ">

                <h3><?= loop_select('section_name', 'Our Packages', 'main_heading', 'px_homepage'); ?></h3>

            </div>

            <!-- Common Text -->

            <div class="section-text listing-after">
                <p><?= nl2br(loop_select('section_name', 'Our Packages', 'main_content', 'px_homepage')); ?></p>
            </div>

            <div class="row py-4 pakage_container">

                <?php
                foreach ($package as $packdata) {
                ?>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">

                        <div class="row justify-content-center">

                            <div class="membership-box">

                                <div class="wrapper-heading text-center">

                                    <h4><?= $packdata['packg_nm']; ?></h4>

                                    <span><?= loop_select('id', loop_select('id', 1, 'currency', 'px_owner_company'), 'currency_symbol', 'px_currencies'); ?> <?= $packdata['packg_price']; ?></span>

                                    <div class="section-heading text-center pt-4">

                                        <?php if (isset($_SESSION['id']) && !empty($_SESSION['id']) && $_SESSION['user_type'] != 'admin') { ?>

                                            <input type="hidden" class="paypaluser_id" value="<?= (!empty($_SESSION['id'])) ? $_SESSION['id'] : ''; ?>">
                                            <input type="hidden" class="paypalpackage_id" value="<?= $packdata['id']; ?>">
                                            <input type="hidden" class="paypalpname" value="<?= $packdata['packg_nm']; ?>">
                                            <input type="hidden" class="paypalpprice" value="<?= $packdata['packg_price']; ?>">
                                            <input type="hidden" class="paypalpcurrency" value="<?= loop_select('id', loop_select('id', 2, 'currency_code', 'px_gateway'), 'currency_code', 'px_currencies'); ?>">
                                            <input type="hidden" class="defaultPcurrency" value="<?= loop_select('id', loop_select('id', 1, 'currency', 'px_owner_company'), 'currency_code', 'px_currencies'); ?>">
                                            <a href="javascript:void(0);" class="btn paypalGateway" data-toggle="modal" data-target="#payment_method_<?= $packdata['id']; ?>"><?php echo $this->lang->line('ltr_get_started'); ?></a>

                                        <?php } else if (isset($_SESSION['id']) && !empty($_SESSION['id']) && $_SESSION['user_type'] == 'admin') { ?>

                                            <a href="javascript:void(0);" class="btn"><?php echo $this->lang->line('ltr_get_started'); ?></a>

                                        <?php } else { ?>

                                            <a href="<?= base_url('login'); ?>" class="btn"><?php echo $this->lang->line('ltr_get_started'); ?></a>

                                        <?php } ?>

                                    </div>

                                </div>

                                <div class="choose-us-info">
                                    <ul class="membership-list">
                                        <h5><?php echo $this->lang->line('ltr_special_limited_offer'); ?></h5>

                                        <li><?= $packdata['packg_period']; ?> <?= $packdata['duration_unit']; ?></li>

                                        <li><?= $packdata['listing_limit']; ?> <?php echo $this->lang->line('ltr_listing'); ?></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php

                }

                ?>
            </div>
        </div>
    </section>
    <?php
    foreach ($package as $packdata) {
    ?>
        <div class="modal fade" id="payment_method_<?= $packdata['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><?php echo $this->lang->line('ltr_Select_paymentmethod'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body getway-modal">
                        <input type="hidden" id="modeluser_id" value="<?= (!empty($_SESSION['id'])) ? $_SESSION['id'] : ''; ?>">
                        <input type="hidden" class="modelpackage_id" value="<?= $packdata['id']; ?>">
                        <input type="hidden" class="modelpname" value="<?= $packdata['packg_nm']; ?>">
                        <input type="hidden" class="modelpprice" value="<?= $packdata['packg_price']; ?>">
                        <input type="hidden" class="modelpcurrency" value="<?= loop_select('id', loop_select('id', 1, 'currency_code', 'px_gateway'), 'currency_symbol', 'px_currencies'); ?>">
                        <input type="hidden" class="defaultRcurrency" value="<?= loop_select('id', loop_select('id', 1, 'currency', 'px_owner_company'), 'currency_code', 'px_currencies'); ?>">
                        <?php
                        foreach ($pay_button as $pay_buttons) {
                            if ($pay_buttons['gateway_name'] == 'Paypal') {
                        ?>
                                <div>

                                    <span class="btn">
                                        <a href="" id="paypal_payment_<?= $packdata['id']; ?>"></a>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                            <path d="M49.2 28.2h-3.4c-.2 0-.4.2-.5.4l-1.4 8.8c0 .2.1.3.3.3H46c.2 0 .3-.1.3-.3l.4-2.5c0-.2.2-.4.5-.4h1.1c2.3 0 3.6-1.1 3.9-3.3.2-.9 0-1.7-.4-2.2-.6-.5-1.5-.8-2.6-.8m.4 3.3c-.2 1.2-1.1 1.2-2 1.2H47l.4-2.3c0-.1.1-.2.3-.2h.2c.6 0 1.2 0 1.5.4.2.1.2.4.2.9" class="color139AD6 svgShape"></path>
                                            <path d="M24.7 28.2h-3.4c-.2 0-.4.2-.5.4l-1.4 8.8c0 .2.1.3.3.3h1.6c.2 0 .4-.2.5-.4l.4-2.4c0-.2.2-.4.5-.4h1.1c2.3 0 3.6-1.1 3.9-3.3.2-.9 0-1.7-.4-2.2-.6-.5-1.4-.8-2.6-.8m.4 3.3c-.2 1.2-1.1 1.2-2 1.2h-.5l.4-2.3c0-.1.1-.2.3-.2h.2c.6 0 1.2 0 1.5.4.1.1.2.4.1.9M35 31.4h-1.6c-.1 0-.3.1-.3.2l-.1.5-.1-.2c-.4-.5-1.1-.7-1.9-.7-1.8 0-3.4 1.4-3.7 3.3-.2 1 .1 1.9.6 2.5.5.6 1.2.8 2.1.8 1.5 0 2.3-.9 2.3-.9l-.1.5c0 .2.1.3.3.3H34c.2 0 .4-.2.5-.4l.9-5.6c-.1-.1-.3-.3-.4-.3m-2.3 3.2c-.2.9-.9 1.6-1.9 1.6-.5 0-.9-.2-1.1-.4-.2-.3-.3-.7-.3-1.2.1-.9.9-1.6 1.8-1.6.5 0 .8.2 1.1.4.3.3.4.8.4 1.2" class="color263B80 svgShape"></path>
                                            <path d="M59.4 31.4h-1.6c-.1 0-.3.1-.3.2l-.1.5-.1-.2c-.4-.5-1.1-.7-1.9-.7-1.8 0-3.4 1.4-3.7 3.3-.2 1 .1 1.9.6 2.5.5.6 1.2.8 2.1.8 1.5 0 2.3-.9 2.3-.9l-.1.5c0 .2.1.3.3.3h1.5c.2 0 .4-.2.5-.4l.9-5.6c-.1-.1-.2-.3-.4-.3m-2.3 3.2c-.2.9-.9 1.6-1.9 1.6-.5 0-.9-.2-1.1-.4-.2-.3-.3-.7-.3-1.2.1-.9.9-1.6 1.8-1.6.5 0 .8.2 1.1.4.4.3.5.8.4 1.2" class="color139AD6 svgShape"></path>
                                            <path d="M43.7 31.4H42c-.2 0-.3.1-.4.2L39.4 35l-1-3.2c-.1-.2-.2-.3-.5-.3h-1.6c-.2 0-.3.2-.3.4l1.8 5.3-1.7 2.4c-.1.2 0 .5.2.5h1.6c.2 0 .3-.1.4-.2l5.5-7.9c.3-.3.1-.6-.1-.6" class="color263B80 svgShape"></path>
                                            <path d="m61.3 28.5-1.4 9c0 .2.1.3.3.3h1.4c.2 0 .4-.2.5-.4l1.4-8.8c0-.2-.1-.3-.3-.3h-1.6c-.1-.1-.2 0-.3.2" class="color139AD6 svgShape"></path>
                                            <path d="M12 25.2c-.7-.8-2-1.2-3.8-1.2h-5c-.3 0-.6.3-.7.6l-2 13.1c0 .3.2.5.4.5H4l.8-4.9v.2c.1-.3.4-.6.7-.6H7c2.9 0 5.1-1.2 5.8-4.5v-.3c-.1 0-.1 0 0 0 .1-1.3-.1-2.1-.8-2.9" class="color263B80 svgShape"></path>
                                            <path d="M12.7 28.1v.3c-.7 3.4-2.9 4.5-5.8 4.5H5.4c-.3 0-.6.3-.7.6l-1 6.1c0 .2.1.4.4.4h2.6c.3 0 .6-.2.6-.5v-.1l.5-3.1v-.2c0-.3.3-.5.6-.5h.4c2.5 0 4.5-1 5-4 .2-1.2.1-2.3-.5-3-.1-.2-.3-.4-.6-.5" class="color139AD6 svgShape"></path>
                                            <path d="M12 27.8c-.1 0-.2-.1-.3-.1-.1 0-.2 0-.3-.1-.4-.1-.8-.1-1.3-.1H6.2c-.1 0-.2 0-.3.1-.2.1-.3.3-.3.5l-.8 5.2v.2c.1-.3.4-.6.7-.6H7c2.9 0 5.1-1.2 5.8-4.5 0-.1 0-.2.1-.3-.2-.1-.3-.2-.5-.2-.3-.1-.3-.1-.4-.1" class="color232C65 svgShape"></path>
                                        </svg></g></svg>
                                    </span>
                                </div>
                            <?php }
                            if ($pay_buttons['gateway_name'] == 'Razorpay') { ?>
                                <button class="btn razorpayGateway">
                                    <svg viewBox="0 0 1896 401" focusable="false" class="chakra-icon css-1xy62lf" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M122.63 105.7l-15.75 57.97 90.15-58.3-58.96 219.98 59.88.05L285.05.48"></path>
                                        <path d="M25.6 232.92L.8 325.4h122.73l50.22-188.13L25.6 232.92m426.32-81.42c-3 11.15-8.78 19.34-17.4 24.57-8.6 5.22-20.67 7.84-36.25 7.84h-49.5l17.38-64.8h49.5c15.56 0 26.25 2.6 32.05 7.9 5.8 5.3 7.2 13.4 4.22 24.6m51.25-1.4c6.3-23.4 3.7-41.4-7.82-54-11.5-12.5-31.68-18.8-60.48-18.8H324.4l-66.5 248.1h53.67l26.8-100h35.2c7.9 0 14.12 1.3 18.66 3.8 4.55 2.6 7.22 7.1 8.04 13.6l9.58 82.6h57.5l-9.32-77c-1.9-17.2-9.77-27.3-23.6-30.3 17.63-5.1 32.4-13.6 44.3-25.4a92.6 92.6 0 0 0 24.44-42.5m130.46 86.4c-4.5 16.8-11.4 29.5-20.73 38.4-9.34 8.9-20.5 13.3-33.52 13.3-13.26 0-22.25-4.3-27-13-4.76-8.7-4.92-21.3-.5-37.8 4.42-16.5 11.47-29.4 21.17-38.7 9.7-9.3 21.04-13.95 34.06-13.95 13 0 21.9 4.5 26.4 13.43 4.6 8.97 4.7 21.8.2 38.5zm23.52-87.8l-6.72 25.1c-2.9-9-8.53-16.2-16.85-21.6-8.34-5.3-18.66-8-30.97-8-15.1 0-29.6 3.9-43.5 11.7-13.9 7.8-26.1 18.8-36.5 33-10.4 14.2-18 30.3-22.9 48.4-4.8 18.2-5.8 34.1-2.9 47.9 3 13.9 9.3 24.5 19 31.9 9.8 7.5 22.3 11.2 37.6 11.2a82.4 82.4 0 0 0 35.2-7.7 82.11 82.11 0 0 0 28.4-21.2l-7 26.16h51.9L709.3 149h-52zm238.65 0H744.87l-10.55 39.4h87.82l-116.1 100.3-9.92 37h155.8l10.55-39.4h-94.1l117.88-101.8m142.4 52c-4.67 17.4-11.6 30.48-20.75 39-9.15 8.6-20.23 12.9-33.24 12.9-27.2 0-36.14-17.3-26.86-51.9 4.6-17.2 11.56-30.13 20.86-38.84 9.3-8.74 20.57-13.1 33.82-13.1 13 0 21.78 4.33 26.3 13.05 4.52 8.7 4.48 21.67-.13 38.87m30.38-80.83c-11.95-7.44-27.2-11.16-45.8-11.16-18.83 0-36.26 3.7-52.3 11.1a113.09 113.09 0 0 0-41 32.06c-11.3 13.9-19.43 30.2-24.42 48.8-4.9 18.53-5.5 34.8-1.7 48.73 3.8 13.9 11.8 24.6 23.8 32 12.1 7.46 27.5 11.17 46.4 11.17 18.6 0 35.9-3.74 51.8-11.18 15.9-7.48 29.5-18.1 40.8-32.1 11.3-13.94 19.4-30.2 24.4-48.8 5-18.6 5.6-34.84 1.8-48.8-3.8-13.9-11.7-24.6-23.6-32.05m185.1 40.8l13.3-48.1c-4.5-2.3-10.4-3.5-17.8-3.5-11.9 0-23.3 2.94-34.3 8.9-9.46 5.06-17.5 12.2-24.3 21.14l6.9-25.9-15.07.06h-37l-47.7 176.7h52.63l24.75-92.37c3.6-13.43 10.08-24 19.43-31.5 9.3-7.53 20.9-11.3 34.9-11.3 8.6 0 16.6 1.97 24.2 5.9m146.5 41.1c-4.5 16.5-11.3 29.1-20.6 37.8-9.3 8.74-20.5 13.1-33.5 13.1s-21.9-4.4-26.6-13.2c-4.8-8.85-4.9-21.6-.4-38.36 4.5-16.75 11.4-29.6 20.9-38.5 9.5-8.97 20.7-13.45 33.7-13.45 12.8 0 21.4 4.6 26 13.9 4.6 9.3 4.7 22.2.28 38.7m36.8-81.4c-9.75-7.8-22.2-11.7-37.3-11.7-13.23 0-25.84 3-37.8 9.06-11.95 6.05-21.65 14.3-29.1 24.74l.18-1.2 8.83-28.1h-51.4l-13.1 48.9-.4 1.7-54 201.44h52.7l27.2-101.4c2.7 9.02 8.2 16.1 16.6 21.22 8.4 5.1 18.77 7.63 31.1 7.63 15.3 0 29.9-3.7 43.75-11.1 13.9-7.42 25.9-18.1 36.1-31.9 10.2-13.8 17.77-29.8 22.6-47.9 4.9-18.13 5.9-34.3 3.1-48.45-2.85-14.17-9.16-25.14-18.9-32.9m174.65 80.65c-4.5 16.7-11.4 29.5-20.7 38.3-9.3 8.86-20.5 13.27-33.5 13.27-13.3 0-22.3-4.3-27-13-4.8-8.7-4.9-21.3-.5-37.8 4.4-16.5 11.42-29.4 21.12-38.7 9.7-9.3 21.05-13.94 34.07-13.94 13 0 21.8 4.5 26.4 13.4 4.6 8.93 4.63 21.76.15 38.5zm23.5-87.85l-6.73 25.1c-2.9-9.05-8.5-16.25-16.8-21.6-8.4-5.34-18.7-8-31-8-15.1 0-29.68 3.9-43.6 11.7-13.9 7.8-26.1 18.74-36.5 32.9-10.4 14.16-18 30.3-22.9 48.4-4.85 18.17-5.8 34.1-2.9 47.96 2.93 13.8 9.24 24.46 19 31.9 9.74 7.4 22.3 11.14 37.6 11.14 12.3 0 24.05-2.56 35.2-7.7a82.3 82.3 0 0 0 28.33-21.23l-7 26.18h51.9l47.38-176.7h-51.9zm269.87.06l.03-.05h-31.9c-1.02 0-1.92.05-2.85.07h-16.55l-8.5 11.8-2.1 2.8-.9 1.4-67.25 93.68-13.9-109.7h-55.08l27.9 166.7-61.6 85.3h54.9l14.9-21.13c.42-.62.8-1.14 1.3-1.8l17.4-24.7.5-.7 77.93-110.5 65.7-93 .1-.06h-.03z"></path>
                                    </svg>
                                </button>
                        <?php
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!--===MembershipSection End===-->

<?php } ?>

<!--===Our Services Section Start===-->

<section class="services-wrapper">

    <div class="container">

        <!-- Common Heading -->

        <div class="section-heading listing-section">

            <h5><?= loop_select('section_name', 'Our Services', 'section_name', 'px_homepage'); ?></h5>

            <span></span>

        </div>

        <!-- Common Title -->

        <div class="section-title">

            <h3><?= loop_select('section_name', 'Our Services', 'main_heading', 'px_homepage'); ?></h3>

        </div>

        <!-- Common Text -->

        <div class="section-text ">

            <p><?= nl2br(loop_select('section_name', 'Our Services', 'main_content', 'px_homepage')); ?></p>

        </div>
        <div class="row-mod">
            <div class="row py-4 swiper teamSwiper">
                <div class="swiper-wrapper">
                    <?php
        
                    foreach ($services as $services) {
        
                    ?>
                    <div class="swiper-slide">
                        <div class="col-12">
        
                            <div class="services-box">
        
                                <div class="services-icon">
        
                                    <img src="<?= base_url(); ?>uploads/<?= $services['logo']; ?>">
        
                                </div>
        
                                <div class="choose-us-info">
        
                                    <div class="wrapper-heading text-center">
        
                                        <h5><?= $services['heading']; ?></h5>
        
                                    </div>
        
                                    <div class="section-text text-center">
        
                                        <p><?= $services['content']; ?></p>
        
                                    </div>
        
                                </div>
        
                                <div class="service-overlay"></div>
        
                            </div>
        
                        </div>
                    </div>
                    <?php
        
                    }
        
                    ?>
                </div>
            </div>
            <div class="swiper-button-prev" id="team-prev"></div>

                <div class="swiper-button-next" id="team-next"></div>
        </div>
    </div>

</section>

<!--===Our Services Section End===-->

<!--===Testimonials Section Start===-->

<section class="testimonial-wrapper">

    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-12 ">

                <div class="testimonial-section">

                    <!-- Common Heading -->

                    <div class="section-heading">

                        <h5><?= loop_select('section_name', 'Clients Say', 'section_name', 'px_homepage'); ?></h5>

                        <span></span>

                    </div>

                    <!-- Common Title -->

                    <div class="section-title">

                        <h3><?= loop_select('section_name', 'Clients Say', 'main_heading', 'px_homepage'); ?></h3>

                    </div>

                    <!-- Common Text -->

                    <div class="section-text">

                        <p><?= loop_select('section_name', 'Clients Say', 'main_content', 'px_homepage'); ?></p>

                    </div>

                </div>

            </div>

            <div class="col-lg-8 col-12">

                <div class="testimonial-section">

                    <div class="swiper testimonialSwiper">

                        <div class="swiper-wrapper">

                            <?php

                            $i = 1;

                            foreach ($testimonial as $testimonial) {

                            ?>

                                <div class="swiper-slide">

                                    <div class="testimonial_slide">

                                        <div class="testimonial_client">

                                            <img src="<?= base_url(); ?>uploads/<?= $testimonial['client_image']; ?>" class="rounded-circle">

                                            <span><?= $testimonial['client_name']; ?></span>

                                            <p><?= $testimonial['post']; ?></p>

                                        </div>

                                        <div class="testimonial_txt">

                                            <p><?= $testimonial['testimonial']; ?></p>

                                        </div>

                                    </div>

                                </div>

                            <?php

                                $i++;
                            }

                            ?>

                        </div>

                    </div>

                    <img class="testimonial-quotes" src="<?= base_url(); ?>assets/front_assets/images/testimonial-quotes.png">

                    <div class="swiper-button-next" id="testimonial-next"></div>

                    <div class="swiper-button-prev" id="testimonial-prev"></div>

                </div>

            </div>

        </div>

    </div>

</section>

<!--===Testimonials Section End===-->

<!--===Partners Wrapper Start===-->

<section class="partners-wrapper">

    <div class="container">

        <div class="row row-mod">
                <div class="swiper partnerSwiper">

                <div class="swiper-wrapper">

                    <?php

                    $i = 1;

                    foreach ($sponsor as $partner) {

                    ?>

                        <div class="swiper-slide">

                            <img src="<?= base_url(); ?>uploads/<?= $partner['sponsor_logo']; ?>">

                        </div>

                    <?php

                        $i++;
                    }

                    ?>

                </div>

            </div>
                <div class="swiper-button-next" id="testimonial-next"></div>
                <div class="swiper-button-prev" id="testimonial-prev"></div>
        </div>

    </div>

</section>

<section>
    <?php $login_page_url = base_url('login');
if (isset($_SESSION['isMobileApp'])) {
  $login_page_url = base_url('login_mobile');
} else {
  $login_page_url = base_url('login');
}?>
    <div class="hamburger hamburger-one text-center">
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
</section>
<!--===Partners Wrapper End===-->

<div class="discover-section">

    <div class="container">

        <div class="row">

            <div class="discover-wrapper">

                <div class="col-lg-2">

                    <img src="<?= base_url() . 'assets/front_assets/images/discover-img.png'; ?>" class="img-fluid">

                </div>

                <div class="col-lg-7">

                    <div class="discover-info">

                        <span><?= loop_select('section_name', 'Explore', 'main_heading', 'px_homepage'); ?></span>

                        <p><?= loop_select('section_name', 'Explore', 'main_content', 'px_homepage'); ?></p>

                    </div>

                </div>

                <div class="col-lg-3">

                    <a href="<?= base_url('listings') ?>" class="btn"><?php echo $this->lang->line('ltr_explore_properties'); ?></a>

                </div>

            </div>

        </div>

    </div>

</div>



<script>
	$(document).ready(function(){   
       // $('#result').addClass('d-none');  
        // load_data();   
        function load_data(city, location){           
            $.ajax({
			url:"<?= base_url('Homepage/searchresult'); ?>",
			method:"POST",
            dataType:'json',
			data:{city:city, location:location},
			success:function(data)
			{                   
           // $('#result').css('display','block');    
               let html ="";
               html += "<ul id='search_id'>";
                $.each(data, function( i, item ) {                  
                    html +="<li class='abcd' value="+ item +">" + item + "</li>";           
                    $( "#result").html(html);
                    
                });
                     html += "</ul>";
                     $(document).on('click', '#search_id li', function() {
                      var value = $(this).text(); 
                      $('#location-sale').val(value);
                      $('#reSalebtn').click();
                      
         })
                    
                           
			}
			});

        }
     
     function abcabc(){
         let city = $('#property-category-sale').val();
         let location = $('#location-sale').val();
         
         if(city || location){
              $('#result').show();
         load_data(city,location);
         }else{
              $('#result').hide();
         }
         
         
     }
     
    $(document).on('change', '#property-category-sale', function(){
       // alert( $(this).val() ); 
        if($(this).val()){
             $('#result').show();
        abcabc();
        }else{
           $('#result').hide();  
        }
        
        
    });
     
     
    $(document).on('keyup', '#location-sale', function(){
        abcabc();
    });
     
     
           
    });
	</script>
	

	