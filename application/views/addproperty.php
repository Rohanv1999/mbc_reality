                 <style>
                     #overlay {
                         position: absolute;
                         top: 0;
                         right: 0;
                         height: 100%;
                         width: 100%;
                         background-color: #e0f1ffa3;
                         z-index: 11;
                         border: 1px solid #b3b3b3;
                         border-radius: 13px;
                         display: flex;
                         /*align-items: center;*/
                         padding: 10px;
                         justify-content: center;
                     }

                     .quote-imgs-thumbs {
                         border: 1px solid #ddd;
                         border-radius: 0.25rem;
                         margin: 1.5rem 0;
                         padding: 0.75rem;
                     }

                     .quote-imgs-thumbs--hidden {
                         display: none;
                     }

                     .img-preview-thumb {
                         background: #fff;
                         border-radius: 0.25rem;
                         box-shadow: 0.125rem 0.125rem 0.0625rem rgba(0, 0, 0, 0.12);
                         max-width: 79px;
                         margin: 6px;
                     }

                     .hollow {
                         border: 1px solid #f6881f;
                         padding: 5px;
                         border-radius: 5px;
                     }
                 </style>

                 <!-- Container Start -->

                 <div class="page-wrapper">

                     <div class="main-content">

                         <!-- Page Title Start -->

                         <div class="row">

                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                 <div class="page-title-wrapper">

                                     <div class="page-title-box">

                                         <?php

                                         if ((isset($list_remain) && $list_remain == 0) || (isset($days_remain) && $days_remain == 0)) { ?>
                                                 <!--// for user -->
                                                 <a href="<?= base_url('/plans'); ?>" class="btn btn-danger mb-4"><?php echo $this->lang->line('ltr_package_error_text'); ?></a>
                                             <?php
                                         } ?>


                                         <h4 class="page-title bold"><?php echo $this->lang->line('ltr_add_listings'); ?></h4>

                                     </div>

                                     <div class="breadcrumb-list">

                                         <ul>

                                             <li class="breadcrumb-link">

                                                 <a href="<?= (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') ? base_url('admin') : ((isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'agent') ? base_url('agent') : ''); ?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard'); ?></a>

                                             </li>

                                             <li class="breadcrumb-link"><?php echo $this->lang->line('ltr_listing'); ?></li>

                                             <li class="breadcrumb-link active"><?php echo $this->lang->line('ltr_add_listings'); ?></li>

                                         </ul>

                                     </div>

                                 </div>

                             </div>

                         </div>



                         <!-- Real Estate table Start -->

                         <?php

                         $indoor = $outdoor = '';

                         if (isset($amenities) && !empty($amenities)) {

                             $indoor = json_decode($amenities[0]['indoor'], true);

                             $outdoor = json_decode($amenities[0]['outdoor'], true);
                         }

                         ?>

                         <div class="row">


                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 position-relative">

                                 <?php

                                 if ((isset($list_remain) && $list_remain == 0) || (isset($days_remain) && $days_remain == 0)) { ?>
                                         <div id="overlay">Please subscribe to add properties.</div>
                                 <?php } ?>

                                 <div class="card">

                                     <div class="card-header pb-0">


                                         <div class="error"></div>

                                     </div>

                                     <div class="card-content">

                                         <div class="card-body">

                                             <div class="mfh-machine-profile">

                                                 <ul class="nav nav-tabs" id="myTab1" role="tablist">

                                                     <li class="nav-item">

                                                         <a class="nav-link active" id="home-tab1" data-toggle="tab" href="#basic_details" role="tab" aria-controls="basic_details" aria-selected="true"><?php echo $this->lang->line('ltr_basic_details'); ?></a>

                                                     </li>
                                                     <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'user') { ?>

                                                             <li class="nav-item">

                                                                 <a class="nav-link" id="profile-tab21" data-toggle="tab" href="#company" role="tab" aria-controls="company" aria-selected="false"><?php echo $this->lang->line('ltr_company'); ?></a>

                                                             </li>
                                                     <?php } ?>

                                                     <li class="nav-item">

                                                         <a class="nav-link" id="profile-tab22" data-toggle="tab" href="#amenities" role="tab" aria-controls="amenities" aria-selected="false"><?php echo $this->lang->line('ltr_amenities'); ?></a>

                                                     </li>

                                                     <li class="nav-item">

                                                         <a class="nav-link" id="profile-tab23" data-toggle="tab" href="#distances" role="tab" aria-controls="distances" aria-selected="false"><?php echo $this->lang->line('ltr_land_marks'); ?></a>

                                                     </li>

                                                     <li class="nav-item">

                                                         <a class="nav-link" id="profile-tab24" data-toggle="tab" href="#multimedia" role="tab" aria-controls="multimedia" aria-selected="false"><?php echo $this->lang->line('ltr_multimedia'); ?></a>

                                                     </li>

                                                 </ul>

                                                 <div class="tab-content ad-content2" id="myTabContent2">

                                                     <div class="tab-pane fade show active" id="basic_details" role="tabpanel">

                                                         <form class="separate-form formget" method="POST" action="<?= base_url($dashboard . '/add-property-detail'); ?>">

                                                             <input type="hidden" id="basic" name="getid" value="<?= (isset($propertys[0]['id']) && !empty($propertys[0]['id'])) ? $propertys[0]['id'] : ''; ?>">

                                                             <input type="hidden" name="pid" value="<?= (isset($pid) && !empty($pid)) ? $pid : ''; ?>">

                                                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                                                 <div class="row">

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="property_name" class="col-form-label"><?php echo $this->lang->line('ltr_property_name'); ?></label><span style="color:red;">*</span>

                                                                             <input class="form-control reset" required type="text" name="property_name" placeholder="<?php echo $this->lang->line('ltr_property_name'); ?>" id="property_name" value="<?= (isset($propertys[0]['property_name']) && !empty($propertys[0]['property_name'])) ? $propertys[0]['property_name'] : ''; ?>">


                                                                             <input type="hidden" name="agentId" id="agentId" value="<?= (isset($propertys[0]['agent']) && !empty($propertys[0]['agent'])) ? $propertys[0]['agent'] : ''; ?>">

                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="categories" class="col-form-label"><?php echo $this->lang->line('ltr_categories'); ?><span style="color:red;">*</span></label>

                                                                             <select class="select2 form-control reset" id="categories" name="categories" required>

                                                                                 <option value=""><?php echo $this->lang->line('ltr_categories'); ?></option>

                                                                                 <?php

                                                                                 foreach ($category as $select) {

                                                                                     ?>

                                                                                         <option value="<?= $select['id']; ?>" <?php if (isset($propertys[0]['propty_category']) && !empty($propertys[0]['propty_category']) && $propertys[0]['propty_category'] == $select['id'])
                                                                                               echo 'selected="selected"'; ?>><?= $select['category']; ?></option>

                                                                                     <?php

                                                                                 }

                                                                                 ?>

                                                                             </select>

                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="neighbourhood" class="col-form-label"><?php echo $this->lang->line('ltr_neighbourhood'); ?></label>

                                                                             <select class="select2 form-control reset" id="neighbourhood" name="neighbourhood">

                                                                                 <option value=""><?php echo $this->lang->line('ltr_neighbourhood'); ?></option>

                                                                                 <?php

                                                                                 foreach ($neighbourhood as $select) {

                                                                                     ?>

                                                                                         <option value="<?= $select['id']; ?>" <?php if (isset($propertys[0]['neighbourhood']) && !empty($propertys[0]['neighbourhood']) && $propertys[0]['neighbourhood'] == $select['id'])
                                                                                               echo 'selected="selected"'; ?>><?= $select['neighbourhood']; ?></option>

                                                                                     <?php

                                                                                 }

                                                                                 ?>

                                                                             </select>

                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="keywords" class="col-form-label"><?php echo $this->lang->line('ltr_keywords'); ?></label>

                                                                             <input class="form-control reset" type="text" name="keywords" placeholder="<?php echo $this->lang->line('ltr_keywords'); ?>" id="keywords" value="<?= (isset($propertys[0]['keywords']) && !empty($propertys[0]['keywords'])) ? $propertys[0]['keywords'] : ''; ?>">


                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="badge" class="col-form-label"><?php echo $this->lang->line('ltr_badge'); ?></label>

                                                                             <select class="select2 form-control reset" id="badge" name="badge">

                                                                                 <option value="" selected="selected"><?php echo $this->lang->line('ltr_badge'); ?></option>

                                                                                 <?php

                                                                                 foreach ($badge as $select) {

                                                                                     ?>

                                                                                         <option value="<?= $select['id']; ?>" <?php if (isset($propertys[0]['badge']) && !empty($propertys[0]['badge']) && $propertys[0]['badge'] == $select['id'])
                                                                                               echo 'selected="selected"'; ?>><?= $select['badge']; ?></option>

                                                                                     <?php

                                                                                 }

                                                                                 ?>

                                                                             </select>

                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="url_slug" class="col-form-label"><?php echo $this->lang->line('ltr_url_slug'); ?></label>

                                                                             <input class="form-control reset" type="text" name="url_slug" placeholder="<?php echo $this->lang->line('ltr_url_slug'); ?>" id="url_slug" value="<?= (isset($propertys[0]['url_sluge']) && !empty($propertys[0]['url_sluge'])) ? $propertys[0]['url_sluge'] : ''; ?>">

                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="description_short" class="col-form-label"><?php echo $this->lang->line('ltr_description_short'); ?></label>

                                                                             <textarea class="ckeditor ck-editor__editable reset form-control" cols="50" id="description_short" name="description_short" rows="80"><?= (isset($propertys[0]['short_description']) && !empty($propertys[0]['short_description'])) ? base64_decode($propertys[0]['short_description']) : ''; ?></textarea>

                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="description_long" class="col-form-label"><?php echo $this->lang->line('ltr_description_long'); ?></label>

                                                                             <textarea class="ckeditor ck-editor__editable reset form-control" cols="50" id="description_long" name="description_long" rows="80"><?= (isset($propertys[0]['long_description']) && !empty($propertys[0]['long_description'])) ? base64_decode($propertys[0]['long_description']) : ''; ?></textarea>

                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="address" class="col-form-label"><?php echo $this->lang->line('ltr_address'); ?><span style="color:red;">*</span></label>

                                                                             <input class="form-control reset" type="text" name="address" required placeholder="Enter Property's Address" id="address" value="<?= (isset($propertys[0]['address']) && !empty($propertys[0]['address'])) ? $propertys[0]['address'] : ''; ?>">

                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="gps" class="col-form-label"><?php echo $this->lang->line('ltr_gps_coordinates'); ?><span style="color:red;">*</span></label>
                                                                             
                                                                             <input class="form-control reset" required type="text" name="gps" placeholder="Enter lat,long" id="gps" value="<?= (isset($propertys[0]['gps_cords']) && !empty($propertys[0]['gps_cords'])) ? $propertys[0]['gps_cords'] : ''; ?>">
                                                                             <small>e.g. 25° 16' 37.1532'' N, 55° 17' 46.4964'' E</small>

                                                                         </div>

                                                                     </div>

                                                                     <?php

                                                                     if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'agent') {

                                                                         ?>
                                                                             <input type="hidden" name="agent" value="<?= (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'agent') ? $_SESSION['id'] : ''; ?>">

                                                                         <?php

                                                                     }

                                                                     if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'user') { ?>
                                                                             <input type="hidden" name="user" value="<?= (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'user') ? $_SESSION['id'] : ''; ?>">
                                                                     <?php }

                                                                     if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'user') {

                                                                         ?>
                                                                             <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                                 <div class="form-group">

                                                                                     <label for="agent" class="col-form-label"><?php echo $this->lang->line('ltr_agents'); ?></label>

                                                                                     <select class="select2 form-control reset" id="agent" name="agent">
                                                                                         <option value="">select</option>
                                                                                         <!-- <option value="" <?php if (isset($propertys[0]['uploaded_by']) && $propertys[0]['uploaded_by'] == 'agent') {
                                                                                             echo "selected";
                                                                                         } ?>><?php echo $this->lang->line('ltr_agents'); ?></option>
                                                                              <option value="" <?php if (isset($propertys[0]['uploaded_by']) && $propertys[0]['uploaded_by'] == 'user') {
                                                                                  echo "selected";
                                                                              } ?>>Users</option> -->

                                                                                         <?php
                                                                                         foreach ($agent as $select) {
                                                                                             ?>
                                                                                                 <option value="<?= $select['id']; ?>" <?php if (isset($propertys[0]['agent']) && !empty($propertys[0]['agent']) && $propertys[0]['agent'] == $select['id']) {
                                                                                                       echo 'selected="selected"';
                                                                                                   } else if (isset($_SESSION['id']) && !isset($propertys[0]['agent']) && empty($propertys[0]['agent']) && !empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'agent' && $_SESSION['id'] == $select['id']) {
                                                                                                       echo 'selected="selected"';
                                                                                                   } ?>><?= $select['full_name']; ?></option>

                                                                                             <?php

                                                                                         }

                                                                                         ?>

                                                                                     </select>

                                                                                 </div>

                                                                             </div>

                                                                         <?php

                                                                     }

                                                                     ?>



                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="purpose" class="col-form-label"><?php echo $this->lang->line('ltr_purpose'); ?></label>

                                                                             <select class="select2 form-control reset" id="purpose" name="purpose">

                                                                                 <option value="">-- select purpose ---</option>

                                                                                 <?php

                                                                                 foreach ($purpose as $select) {

                                                                                     ?>

                                                                                         <option value="<?= $select['id']; ?>" <?php if (isset($propertys[0]['purpose']) && !empty($propertys[0]['purpose']) && $propertys[0]['purpose'] == $select['id'])
                                                                                               echo 'selected="selected"'; ?>><?= $select['purpose']; ?></option>

                                                                                     <?php

                                                                                 }

                                                                                 ?>

                                                                             </select>

                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="country" class="col-form-label"><?php echo $this->lang->line('ltr_country'); ?><span style="color:red;">*</span></label>

                                                                             <select class="select2 form-control reset" id="country2" name="country" required>

                                                                                 <option value="" selected="selected" disabled><?php echo $this->lang->line('ltr_country'); ?></option>

                                                                                 <?php

                                                                                 foreach ($country as $select) {

                                                                                     ?>
                                                                                         <option value="<?= $select['id']; ?>" <?= ((isset($propertys[0]['country']) && $propertys[0]['country'] == $select['id'])) ? "selected" : ""; ?>><?= $select['name']; ?></option>


                                                                                     <?php

                                                                                 }

                                                                                 ?>

                                                                             </select>

                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="states" class="col-form-label reset"><?php echo $this->lang->line('ltr_states'); ?><span style="color:red;">*</span></label>

                                                                             <select class="select2 form-control reset newstate" id="states" name="states" required>

                                                                                 <option value="" selected="selected">Select <?php echo $this->lang->line('ltr_states'); ?></option>

                                                                                 <?php

                                                                                 if (isset($propertys[0]['states']) && !empty($propertys[0]['states'])) {

                                                                                     $states = $this->Db_model->select_data('*', 'px_states', array('country_id' => $propertys[0]['country']));

                                                                                     foreach ($states as $select) {

                                                                                         ?>

                                                                                                 <option value="<?= $select['id']; ?>" <?php if (isset($propertys[0]['states']) && !empty($propertys[0]['states']) && $propertys[0]['states'] == $select['id'])
                                                                                                       echo 'selected="selected"'; ?>><?= $select['name']; ?></option>

                                                                                         <?php

                                                                                     }
                                                                                 }

                                                                                 ?>

                                                                             </select>

                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="city" class="col-form-label"><?php echo $this->lang->line('ltr_city'); ?><span style="color:red;">*</span></label>


                                                                             <select class="select2 form-control reset " id="city" name="city" required>
                                                                                 <option value="" selected="selected">Select City</option>

                                                                                 <?php


                                                                                 if (isset($propertys[0]['city']) && !empty($propertys[0]['city'])) {
                                                                                     $cities = $this->Db_model->select_data('*', 'cities', array('id' => $propertys[0]['city']));
                                                                                     foreach ($cities as $city) {



                                                                                         ?>
                                                                                                 <?php ?>

                                                                                                 <option value="<?= $city['id']; ?>" <?php if (isset($propertys[0]['city']) && !empty($propertys[0]['city']) && $propertys[0]['city'] == $city['id'])
                                                                                                       echo 'selected="selected"'; ?>><?= $city['name']; ?></option>

                                                                                         <?php
                                                                                     }
                                                                                 }

                                                                                 ?>

                                                                             </select>
                                                                         </div>
                                                                     </div>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group"> <label for="zip_code" class="col-form-label"><?php echo $this->lang->line('ltr_zip_code'); ?><span style="color:red;">*</span></label>

                                                                             <input class="form-control reset" type="text" name="zip_code" placeholder="<?php echo $this->lang->line('ltr_zip_code'); ?>" id="zip_code" value="<?= (isset($propertys[0]['zip_code']) && !empty($propertys[0]['zip_code'])) ? $propertys[0]['zip_code'] : ''; ?>" required>

                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="plot_area" class="col-form-label"><?php echo $this->lang->line('ltr_plot_area'); ?></label>

                                                                             <input class="form-control reset" type="number" name="plot_area" placeholder="<?php echo $this->lang->line('ltr_plot_area'); ?>" id="plot_area" value="<?= (isset($propertys[0]['plot_area']) && !empty($propertys[0]['plot_area'])) ? $propertys[0]['plot_area'] : ''; ?>">

                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="build_size" class="col-form-label"><?php echo $this->lang->line('ltr_build_area'); ?></label>

                                                                             <input class="form-control reset" type="text" placeholder="<?php echo $this->lang->line('ltr_build_area'); ?>" id="build_size" name="build_size" value="<?= (isset($propertys[0]['build_size']) && !empty($propertys[0]['build_size'])) ? $propertys[0]['build_size'] : ''; ?>">

                                                                         </div>

                                                                     </div>
                                                                     <?php if (isset($propertys[0]['propty_category']) && $propertys[0]['propty_category'] != '8') { ?>
                                                                             <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 bathroom">

                                                                                 <div class="form-group">

                                                                                     <label for="bathrooms" class="col-form-label"><?php echo $this->lang->line('ltr_bathrooms'); ?></label>

                                                                                     <input class="form-control reset" type="number" placeholder="<?php echo $this->lang->line('ltr_bathrooms'); ?>" id="bathrooms" name="bathrooms" value="<?= (isset($propertys[0]['bathrooms']) && !empty($propertys[0]['bathrooms'])) ? $propertys[0]['bathrooms'] : ''; ?>">

                                                                                 </div>

                                                                             </div>

                                                                             <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 bedroom">

                                                                                 <div class="form-group">

                                                                                     <label for="bedrooms" class="col-form-label"><?php echo $this->lang->line('ltr_bedrooms'); ?></label>

                                                                                     <input class="form-control reset" type="number" placeholder="<?php echo $this->lang->line('ltr_bedrooms'); ?>" id="bedrooms" name="bedrooms" value="<?= (isset($propertys[0]['bedrooms']) && !empty($propertys[0]['bedrooms'])) ? $propertys[0]['bedrooms'] : ''; ?>">

                                                                                 </div>

                                                                             </div>
                                                                     <?php } ?>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="rooms" class="col-form-label"><?php echo $this->lang->line('ltr_rooms'); ?></label>

                                                                             <input class="form-control reset" type="number" placeholder="<?php echo $this->lang->line('ltr_rooms'); ?>" id="rooms" name="rooms" value="<?= (isset($propertys[0]['rooms']) && !empty($propertys[0]['rooms'])) ? $propertys[0]['rooms'] : ''; ?>">

                                                                         </div>

                                                                     </div>

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 sale_inp_grp" <?= (isset($propertys[0]['sale_price']) && !empty($propertys[0]['sale_price'])) ? '': 'style="display:none;"'; ?> >

                                                                         <div class="form-group">

                                                                             <label for="sale_price" class="col-form-label"><?php echo $this->lang->line('ltr_sale_price'); ?><span style="color:red;">*</span></label>

                                                                             <input class="form-control reset" type="number" placeholder="<?php echo $this->lang->line('ltr_sale_price'); ?>" id="sale_price" name="sale_price" value="<?= (isset($propertys[0]['sale_price']) && !empty($propertys[0]['sale_price'])) ? $propertys[0]['sale_price'] : ''; ?>" <?= (isset($propertys[0]['sale_price']) && !empty($propertys[0]['sale_price'])) ? 'required': ''; ?>>

                                                                         </div>

                                                                     </div>

                                                                     <div class="rent_inp_grp col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12" <?= (isset($propertys[0]['rent_price']) && !empty($propertys[0]['rent_price'])) ? '': 'style="display:none;"'; ?>>

                                                                         <div class="form-group">

                                                                             <label for="rent_price" class="col-form-label"><?php echo $this->lang->line('ltr_rent_price'); ?><span style="color:red;">*</span></label>

                                                                             <input class="form-control reset" type="number" placeholder="<?php echo $this->lang->line('ltr_rent_price'); ?>" id="rent_price" name="rent_price" value="<?= (isset($propertys[0]['rent_price']) && !empty($propertys[0]['rent_price'])) ? $propertys[0]['rent_price'] : ''; ?>" <?= (isset($propertys[0]['rent_price']) && !empty($propertys[0]['rent_price'])) ? 'required' : ''; ?>>

                                                                         </div>

                                                                     </div>
                                                                     <!-- <?php
                                                                     if (isset($_SESSION['user_type'])) {
                                                                         if ($_SESSION['user_type'] == 'agent' || $_SESSION['user_type'] == 'admin') { ?>


                                                                             <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                                 <div class="form-group">

                                                                                     <label for="ownership" class="col-form-label"><?php echo $this->lang->line('ltr_ownership'); ?></label>

                                                                                     <select class="select2 form-control reset" id="ownership" name="ownership">

                                                                                         <option value=""><?php echo $this->lang->line('ltr_ownership'); ?></option>

                                                                                         <?php

                                                                                         foreach ($ownership as $select) {

                                                                                             ?>

                                                                                             <option value="<?= $select['id']; ?>" <?php if (isset($propertys[0]['owner']) && !empty($propertys[0]['owner']) && $propertys[0]['owner'] == $select['id'])
                                                                                                   echo 'selected="selected"'; ?>><?= $select['ownership']; ?></option>

                                                                                         <?php

                                                                                         }

                                                                                         ?>

                                                                                     </select>

                                                                                 </div>

                                                                             </div>
                                                                         <?php } else { ?>

                                                                             <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                                 <div class="form-group">

                                                                                     <label for="ownership" class="col-form-label"><?php echo $this->lang->line('ltr_ownership'); ?></label>

                                                                                     <select class="select2 form-control reset" id="ownership" name="ownership">

                                                                                         <option value="2">Owner</option>



                                                                                     </select>

                                                                                 </div>

                                                                             </div>
                                                                     <?php }
                                                                     } ?> -->

                                                                     <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                         <div class="form-group">

                                                                             <label for="floor" class="col-form-label"><?php echo $this->lang->line('ltr_floors'); ?></label>

                                                                             <input class="form-control" type="number" placeholder="<?php echo $this->lang->line('ltr_floors'); ?>" id="floor" name="floor" value="<?= (isset($propertys[0]['floors']) && !empty($propertys[0]['floors'])) ? $propertys[0]['floors'] : ''; ?>">

                                                                         </div>

                                                                     </div>

                                                                 </div>
                                                                 <?php if (isset($_SESSION['user_type'])) { ?>
                                                                         <input type="hidden" name="uploaded_by" value="<?= $_SESSION['user_type']; ?>">
                                                                 <?php } ?>
                                                                 <div class="form-group">

                                                                     <input class="btn btn-primary propsubmit" type="submit" name="submit1" value="Save">

                                                                 </div>

                                                             </div>

                                                         </form>

                                                     </div>
                                                     <?php if (isset($_SESSION['user_type'])) { ?>
                                                             <?php if ($_SESSION['user_type'] != 'user') { ?>

                                                                     <div class="tab-pane fade" id="company" role="tabpanel">

                                                                         <form class="separate-form formget" method="POST" action="<?= base_url($dashboard . '/add-property-company'); ?>">

                                                                             <input type="hidden" name="getid" value="<?= (isset($companys[0]['property_id']) && !empty($propertys[0]['id'])) ? $propertys[0]['id'] : ''; ?>">

                                                                             <input type="hidden" name="pids" id="com">

                                                                             <input type="hidden" name="pid" value="<?= (isset($pid) && !empty($pid)) ? $pid : ''; ?>">

                                                                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                                                                 <div class="row">

                                                                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                                                                                         <div class="form-group">

                                                                                             <label for="company_name" class="col-form-label"><?php echo $this->lang->line('ltr_company_name'); ?></label><span style="color:red;">*</span>

                                                                                             <input class="form-control reset" type="text" placeholder="<?php echo $this->lang->line('ltr_company_name'); ?>" id="company_name" name="company_name" value="<?= (isset($companys[0]['company_name']) && !empty($companys[0]['company_name'])) ? $companys[0]['company_name'] : ''; ?>" required>

                                                                                         </div>

                                                                                     </div>

                                                                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                                                                                         <div class="form-group">

                                                                                             <label for="company_phone" class="col-form-label"><?php echo $this->lang->line('ltr_phone_number'); ?><span style="color:red;">*</span></label>

                                                                                             <input class="form-control reset" type="number" placeholder="<?php echo $this->lang->line('ltr_phone_number'); ?>" id="company_phone" name="company_phone" value="<?= (isset($companys[0]['company_phone']) && !empty($companys[0]['company_phone'])) ? $companys[0]['company_phone'] : ''; ?>" required>

                                                                                         </div>

                                                                                     </div>

                                                                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                                                                                         <div class="form-group">

                                                                                             <label for="website" class="col-form-label"><?php echo $this->lang->line('ltr_website'); ?></label>

                                                                                             <input class="form-control reset" type="text" placeholder="<?php echo $this->lang->line('ltr_website'); ?>" id="website" name="website" value="<?= (isset($companys[0]['website']) && !empty($companys[0]['website'])) ? $companys[0]['website'] : ''; ?>">

                                                                                         </div>

                                                                                     </div>

                                                                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                                                                                         <div class="form-group">

                                                                                             <label for="facebook" class="col-form-label"><?php echo $this->lang->line('ltr_facebook'); ?></label>

                                                                                             <div class="input-group mb-3">

                                                                                                 <span class="input-group-text">https://</span>

                                                                                                 <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_facebook'); ?>" id="facebook" name="facebook" value="<?= (isset($companys[0]['facebook']) && !empty($companys[0]['facebook'])) ? $companys[0]['facebook'] : ''; ?>">

                                                                                             </div>

                                                                                         </div>

                                                                                     </div>

                                                                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                                                                                         <div class="form-group">

                                                                                             <label for="twitter" class="col-form-label"><?php echo $this->lang->line('ltr_twitter'); ?></label>

                                                                                             <div class="input-group mb-3">

                                                                                                 <span class="input-group-text">https://</span>

                                                                                                 <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_twitter'); ?>" id="twitter" name="twitter" value="<?= (isset($companys[0]['twitter']) && !empty($companys[0]['twitter'])) ? $companys[0]['twitter'] : ''; ?>">

                                                                                             </div>

                                                                                         </div>

                                                                                     </div>

                                                                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                                                                                         <div class="form-group">

                                                                                             <label for="office_hours" class="col-form-label"><?php echo $this->lang->line('ltr_office_hour'); ?></label>

                                                                                             <input class="form-control reset" type="text" placeholder="<?php echo $this->lang->line('ltr_office_hours'); ?>" id="office_hours" name="office_hours" value="<?= (isset($companys[0]['office_hour']) && !empty($companys[0]['office_hour'])) ? $companys[0]['office_hour'] : ''; ?>">

                                                                                         </div>

                                                                                     </div>

                                                                                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                                                                         <div class="form-group">

                                                                                             <label for="company_detail" class="col-form-label"><?php echo $this->lang->line('ltr_company_description'); ?></label>

                                                                                             <textarea class="ckeditor ck-editor__editable reset form-control" cols="50" id="company_detail" name="company_detail" rows="50"><?= (isset($companys[0]['company_detail']) && !empty($companys[0]['company_detail'])) ? base64_decode($companys[0]['company_detail']) : ''; ?></textarea>

                                                                                         </div>

                                                                                     </div>

                                                                                 </div>

                                                                                 <div class="form-group mb-0">

                                                                                     <input class="btn btn-primary propsubmit" type="submit" value="Save">

                                                                                 </div>

                                                                             </div>

                                                                         </form>

                                                                     </div>

                                                         <?php }
                                                     } ?>

                                                     <div class="tab-pane fade" id="amenities" role="tabpanel">

                                                         <form class="separate-form formget" method="POST" action="<?= base_url($dashboard . '/add-property-amenities'); ?>">

                                                             <input type="hidden" name="getid" value="<?= (isset($amenities[0]['property_id']) && !empty($propertys[0]['id'])) ? $propertys[0]['id'] : ''; ?>">

                                                             <input type="hidden" name="pids" id="amin">

                                                             <input type="hidden" name="pid" value="<?= (isset($pid) && !empty($pid)) ? $pid : ''; ?>">

                                                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                                                 <div class="row">

                                                                     <?php

                                                                     if ($indoor) {

                                                                         $i = 1;

                                                                         foreach ($indoor as $klm => $vlm) {

                                                                             $value[$i] = $vlm;

                                                                             $i++;
                                                                         }
                                                                     }

                                                                     ?>

                                                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                                                                         <h5 class="mb-2"><?php echo $this->lang->line('ltr_indoor_amenities'); ?></h5>

                                                                         <?php

                                                                         $i = 1;

                                                                         foreach ($indoors as $amenities) {

                                                                             ?>

                                                                                 <div class="form-group">

                                                                                     <div class="checkbox">

                                                                                         <input class="reset" id="<?= 'indoor' . $amenities['id']; ?>" type="checkbox" name="<?= 'indoor' . $amenities['id']; ?>" value="<?= $amenities['indoor']; ?>" <?php if (isset($value[$i][$amenities['indoor']]) && !empty($value[$i][$amenities['indoor']]) && $value[$i][$amenities['indoor']] == $value[$i][$amenities['indoor']]) {
                                                                                                       echo "checked";
                                                                                                   } ?>>

                                                                                         <label for="<?= 'indoor' . $amenities['id']; ?>"><?= $amenities['indoor']; ?></label>

                                                                                     </div>

                                                                                 </div>

                                                                             <?php

                                                                             $i++;
                                                                         }

                                                                         ?>

                                                                     </div>

                                                                     <?php

                                                                     if ($outdoor) {

                                                                         $i = 1;

                                                                         foreach ($outdoor as $klm => $vlm) {

                                                                             $value[$i] = $vlm;

                                                                             $i++;
                                                                         }
                                                                     }

                                                                     ?>

                                                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                                                                         <h5 class="mb-2"><?php echo $this->lang->line('ltr_outdoor_amenities'); ?></h5>

                                                                         <?php

                                                                         $i = 1;

                                                                         foreach ($outdoors as $amenities) {

                                                                             ?>

                                                                                 <div class="form-group">

                                                                                     <div class="checkbox">

                                                                                         <input class="reset" id="<?= 'outdoor' . $amenities['id']; ?>" type="checkbox" name="<?= 'outdoor' . $amenities['id']; ?>" value="<?= $amenities['outdoor']; ?>" <?php if (isset($value[$i][$amenities['outdoor']]) && !empty($value[$i][$amenities['outdoor']]) && $value[$i][$amenities['outdoor']] == $value[$i][$amenities['outdoor']]) {
                                                                                                       echo "checked";
                                                                                                   } ?>>

                                                                                         <label for="<?= 'outdoor' . $amenities['id']; ?>"><?= $amenities['outdoor']; ?></label>

                                                                                     </div>

                                                                                 </div>

                                                                             <?php

                                                                             $i++;
                                                                         }

                                                                         ?>

                                                                     </div>

                                                                 </div>

                                                                 <div class="form-group mb-0">

                                                                     <input class="btn btn-primary propsubmit" type="submit" value="Save">

                                                                 </div>

                                                             </div>

                                                         </form>

                                                     </div>

                                                     <div class="tab-pane fade" id="distances" role="tabpanel">

                                                         <form class="separate-form formget" method="POST" action="<?= base_url($dashboard . '/add-property-landmarks'); ?>">

                                                             <input type="hidden" name="getid" value="<?= (isset($propertys[0]['id']) && !empty($propertys[0]['id'])) ? $propertys[0]['id'] : ''; ?>">

                                                             <input type="hidden" name="pids" id="dist">

                                                             <input type="hidden" name="pid" value="<?= (isset($pid) && !empty($pid)) ? $pid : ''; ?>">

                                                             <?php

                                                             if (isset($distent) && !empty($distent)) {

                                                                 $marks = json_decode($distent[0]['land_marks'], true);

                                                                 $i = 1;

                                                                 foreach ($marks as $klm => $vlm) {

                                                                     $value[$i] = $vlm;

                                                                     $i++;
                                                                 }
                                                             }

                                                             ?>

                                                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                                                 <div class="row">

                                                                     <?php

                                                                     $i = 1;

                                                                     foreach ($landmark as $distance) {

                                                                         ?>

                                                                             <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                                                                                 <div class="form-group">

                                                                                     <label for="<?= str_replace(" ", "_", $distance['land_mark']); ?>" class="col-form-label"><?= ucfirst($distance['land_mark']); ?></label>

                                                                                     <input class="form-control reset" type="text" placeholder="<?= ucfirst($distance['land_mark']); ?>" id="<?= str_replace(" ", "_", $distance['land_mark']); ?>" name="<?= str_replace(" ", "_", $distance['land_mark']); ?>" value="<?= (isset($value[$i][str_replace(" ", "_", $distance['land_mark'])]) && !empty($value[$i][str_replace(" ", "_", $distance['land_mark'])])) ? $value[$i][str_replace(" ", "_", $distance['land_mark'])] : ''; ?>">

                                                                                 </div>

                                                                             </div>

                                                                         <?php

                                                                         $i++;
                                                                     }

                                                                     ?>

                                                                 </div>

                                                                 <div class="form-group mb-0">

                                                                     <input class="btn btn-primary propsubmit" type="submit" value="Save">

                                                                 </div>

                                                             </div>

                                                         </form>

                                                     </div>

                                                     <div class="tab-pane fade" id="multimedia" role="tabpanel">

                                                         <form class="separate-form formget" id="upload_form" method="POST" action="<?= base_url($dashboard . '/add-property-media'); ?>" enctype="multipart/form-data">

                                                             <input type="hidden" name="getid" value="<?= (isset($propertys[0]['id']) && !empty($propertys[0]['id'])) ? $propertys[0]['id'] : ''; ?>">

                                                             <input type="hidden" name="pids" id="med">

                                                             <input type="hidden" name="pid" value="<?= (isset($pid) && !empty($pid)) ? $pid : ''; ?>">

                                                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                 <?php
                                                                 if (isset($pid) && !empty($pid)) {
                                                                     $a = loop_select('property_id', $pid, 'images', 'px_property_media');
                                                                     $vid = loop_select('property_id', $pid, 'videos', 'px_property_media');
                                                                     $images_array = json_decode($a);
                                                                     $video_array = json_decode($vid);
                                                                     // print_r($video_array);
                                                                     // echo 'pid is ' ; 
                                                                     // print_r($pid);
                                                                     ?>
                                                                         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 videos_elem">

                                                                             <div class="form-group div">

                                                                                 <label for="videos" class="col-form-label"><?php echo $this->lang->line('ltr_upload_videos'); ?></label> <span style="font-size: 12px;">(Max. limit 2 and Max. size 40MB, 20MB each)</span>


                                                                                 <div id="video_box"></div>

                                                                                 <!--<label for="videos" class="col-form-label"><?php echo $this->lang->line('ltr_upload_images'); ?></label>-->



                                                                                 <div class="d-flex flex-row align-items-center">

                                                                                     <?php if (!empty($video_array)) {
                                                                                         echo '<input type="hidden" id = "videos_count" value="' . count($video_array) . '" >';
                                                                                         echo '<label for="videos" class="col-form-label">Uploaded Videos : </label>';
                                                                                         foreach ($video_array as $video) {

                                                                                             echo ' <video class="mx-2" src="' . base_url() . 'uploads/video_upload/' . $video . ' " type="video/mp4" height="70" width="70"></video>';
                                                                                         }
                                                                                     } ?>
                                                                                 </div>

                                                                             </div>

                                                                         </div>

                                                                           <!-- images elem   -->
                                                                           <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                             <div class="form-group">
                                                                                 <label for="images" class="col-form-label"><?php echo $this->lang->line('ltr_upload_images'); ?></label> <span style="font-size: 12px;">(Max. limit 10 and size: 900 * 500)</span>

                                                                                 <div class="grid-x grid-padding-x">
                                                                                     <div class="small-10 small-offset-1 medium-8 medium-offset-2 cell">

                                                                                         <form action="javascript:void(0)" id="img-upload-form" method="post" enctype="multipart/form-data">
                                                                                             <p>
                                                                                                 <label for="upload_imgs" class="button hollow">Select Your Images +</label>
                                                                                                 <input class="show-for-sr" type="file" style="display:none;"  id="upload_imgs" name="images[]" multiple />
                                                                                             </p>
                                                                                             <div class="quote-imgs-thumbs quote-imgs-thumbs--hidden" id="img_preview" aria-live="polite"></div>
                                                                                             <div>
                                                                                             <?php
                                                                                             if ($images_array != NULL) {
                                                                                                 echo '<label for="images" class="col-form-label">Uploaded Images : </label>';
                                                                                                 foreach ($images_array as $image) {
                                                                                                     echo '<div class="imgpre"><img class="mx-2" src="' . base_url() . 'uploads/' . $image . '"  alt="Image" height="40" width="50"></div>' . "\n";
                                                                                                 }
                                                                                             }
                                                                                             ?>
                                                                                             </div>
                                                                                         </form>
                                                                                     </div>
                                                                                 </div>

                                                                             </div>
                                                                         </div>
    <!-- 
                                                                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                         <div class="form-group">
                                                                             <label for="images" class="col-form-label"><?php echo $this->lang->line('ltr_upload_images'); ?></label> <span style="font-size: 12px;">(Max. limit 10 and Max. size 10MB, 1MB each)</span>
                                                                          
                                                                             <div id="images_box"></div>

                                                                         </div>
                                                                         <div class="d-flex flex-row align-items-center">
                                                                             <?php
                                                                             if ($images_array != NULL) {
                                                                                 echo '<label for="images" class="col-form-label">Uploaded Images : </label>';
                                                                                 foreach ($images_array as $image) {
                                                                                     echo '<div class="imgpre"><img class="mx-2" src="' . base_url() . 'uploads/' . $image . '"  alt="Image" height="40" width="50"></div>' . "\n";
                                                                                 }
                                                                             }
                                                                             ?>
                                                                         </div>
                                                                     </div> -->
                                                                 <?php } else { ?>

                                                                         <!-- video elem  -->
                                                                         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 videos_elem">

                                                                             <div class="form-group div">

                                                                                 <label for="videos" class="col-form-label"><?php echo $this->lang->line('ltr_upload_videos'); ?></label> <span style="font-size: 12px;">(Max. limit 2 and Max. size 40MB, 20MB each)</span>

                                                                                 <div id="video_box"></div>

                                                                             </div>

                                                                         </div>



                                                                         <!-- images elem   -->
                                                                         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                             <div class="form-group">
                                                                                 <label for="images" class="col-form-label"><?php echo $this->lang->line('ltr_upload_images'); ?></label> <span style="font-size: 12px;">(Max. limit 10 and size: 900 * 500)</span>

                                                                                 <div class="grid-x grid-padding-x">
                                                                                     <div class="small-10 small-offset-1 medium-8 medium-offset-2 cell">

                                                                                         <form action="javascript:void(0)" id="img-upload-form" method="post" enctype="multipart/form-data">
                                                                                             <p>
                                                                                                 <label for="upload_imgs" class="button hollow">Select Your Images +</label>
                                                                                                 <input class="show-for-sr" type="file" style="display:none;"  id="upload_imgs" name="images[]" multiple />
                                                                                             </p>
                                                                                             <div class="quote-imgs-thumbs quote-imgs-thumbs--hidden" id="img_preview" aria-live="polite"></div>
                                                                                         </form>
                                                                                     </div>
                                                                                 </div>

                                                                             </div>
                                                                         </div>

                                                                 <?php } ?>

                                                                 <div class="form-group mb-0">

                                                                     <input class="btn btn-primary propsubmit" type="submit" id="submitImage" value="Save">

                                                                 </div>

                                                             </div>

                                                         </form>

                                                     </div>

                                                 </div>

                                             </div>

                                         </div>

                                     </div>

                                 </div>

                             </div>
                             <!--end here -->


                         </div>
                    <script>
                        $('#purpose').on('change', function (){
                            if($('#purpose').val() == '1'){
                                $('#rent_price').removeAttr('required')
                                $('#sale_price').attr('required', true)
                                $('.sale_inp_grp').show();
                                $('.rent_inp_grp').hide()
                            }else{
                                $('#rent_price').attr('required', true)
                                $('#sale_price').removeAttr('required')
                                $('.sale_inp_grp').hide();
                                $('.rent_inp_grp').show()
                            }
                        })
                    </script>

                         <!-- image upload js  -->

                         <script>
                             var imgUpload = document.getElementById('upload_imgs'),
                                 imgPreview = document.getElementById('img_preview'),
                                 imgUploadForm = document.getElementById('img-upload-form'),
                                 totalFiles, previewTitle, previewTitleText, img;

                             imgUpload.addEventListener('change', previewImgs, false);
                             imgUploadForm.addEventListener('submit', function(e) {
                                 e.preventDefault();
                                 alert('Images Uploaded! (not really, but it would if this was on your website)');
                             }, false);

                             function previewImgs(event) {
                                 totalFiles = imgUpload.files.length;
                                 var regex = new RegExp("([a-zA-Z0-9\\s_\\.-:\\\\()])+(.jpg|.png|.gif)$");
                                 var invalid = 0;

                                 if (totalFiles > 10) {
                                     showAlert("Can't upload more than 10 images.", 'error', $('#burl').val());
                                     $('#img_preview').hide();
                                     $('#upload_imgs').val("");

                                 } else {
                                     for (var i = 0; i < totalFiles; i++) {
                                         if (regex.test(imgUpload.value.toLowerCase())) {
                                             if (typeof imgUpload.files != "undefined") {
                                                 var reader = new FileReader();
                                                 reader.readAsDataURL(imgUpload.files[0]);
                                                 reader.onload = function(e) {
                                                     var image = new Image();
                                                     image.src = e.target.result;
                                                     image.onload = function() {
                                                         var height = this.height;
                                                         var width = this.width;

                                                         if (height != 500 || width != 900) {
                                                             swicon = "warning";
                                                             msg =
                                                                 "Please upload  " +
                                                                 900 +
                                                                 "*" +
                                                                 500 +
                                                                 " photo size.";
                                                             showAlert(msg, 'error', $('#burl').val());

                                                             $('#img_preview').hide();
                                                             $('#upload_imgs').val("");
                                                             invalid++;

                                                         }

                                                     };
                                                 };
                                             } else {
                                                 swicon = "warning";
                                                 msg = "This browser does not support HTML5.";
                                                 showAlert(msg, 'error', $('#burl').val());
                                                 $('#img_preview').hide();
                                                 $('#upload_imgs').val("");
                                                 invalid++;

                                             }
                                         } else {
                                             swicon = "warning";
                                             msg = "Please select a valid Image file.";
                                             showAlert(msg, 'error', $('#burl').val());
                                             $('#img_preview').hide();
                                             $('#upload_imgs').val("");
                                             invalid++;

                                         }
                                     }
                                 }

                                 if (invalid == 0) {
                                    $(imgPreview).html('')
                                    
                                     for (var i = 0; i < totalFiles; i++) {
                                         img = document.createElement('img');
                                         img.src = URL.createObjectURL(event.target.files[i]);
                                         img.classList.add('img-preview-thumb');
                                        
                                         imgPreview.appendChild(img);
                                     }
                                     $('#img_preview').show();
                                     imgPreview.classList.remove('quote-imgs-thumbs--hidden');
                                     previewTitle = document.createElement('p');
                                     previewTitleText = document.createTextNode(totalFiles + ' Images Selected');
                                     previewTitle.appendChild(previewTitleText);
                                     imgPreview.appendChild(previewTitle);
                                 }
                             }
                         </script>