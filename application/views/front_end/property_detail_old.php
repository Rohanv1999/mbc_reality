<!--===Page Heading Start===-->
<style>
    .property-form.new-btn {
        padding: 44px 0;
    }
    .property-form.new-btn a {
        margin-left: 20px;
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


		<section class="page-heading">
			<h1><?php echo $this->lang->line('ltr_property_details');?></h1>
			<a href="<?=base_url();?>"><?php echo $this->lang->line('ltr_home');?></a><span>&nbsp; // <?php echo $this->lang->line('ltr_property_details');?></span>

		</section

		<!--===Page Heading End===-->

		<!--===Property Overview Start===-->
	

		<section class="property-overview">

			<div class="container">

				<div class="property-info">

					<div class="property-name">

						<h4><?=(isset($properties[0]['property_name']) && !empty($properties[0]['property_name']))?$properties[0]['property_name']:'';?></h4>

						<div class="property-location">

							<img src="<?=base_url();?>assets/front_assets/images/listing-location.png">
                             	
							<span><?=(isset($properties[0]['city']) && !empty($properties[0]['city']))?$properties[0]['city']:'';?> <?=loop_select('id',((isset($properties[0]['states']) && !empty($properties[0]['states']))?$properties[0]['states']:''),'name','px_states');?></span>

						</div>

					</div>

					<div class="overview-price">

					<?php 

					if((isset($properties[0]['sale_price']) || isset($properties[0]['rent_price'])) && ($properties[0]['sale_price']!=0 || $properties[0]['rent_price']!=0)){

					?>

						<h4><?=($properties[0]['purpose']=='1')?loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies').$properties[0]['sale_price']:loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies').$properties[0]['rent_price'].'/ <span>Monthly</span>';?></h4>

					<?php 

					}

					?>

						<?php
					

						if($this->session->userdata('id')){

						?>

						<div class="overview-favorite-btn">

							<i id="property_<?=$edit_property_id;?>" <?=favorite_info($edit_property_id,$_SESSION['id']);?> f_id="<?=$edit_property_id;?>" class="fas fa-heart favourate"></i><span>Favorite</span>

						</div>

						<?php

						}

						?>

					</div>

				</div>

				<div class="row">

					<div class="col-lg-8 col-12">

						<div class="property-gallery">

							<div class="swiper gallery-slider">

								<div class="swiper-wrapper">

								<?php

								if(isset($property_media[0]['Images']) && !empty($property_media[0]['Images']) && (is_array(json_decode($property_media[0]['Images']))?count(json_decode($property_media[0]['Images']))!=0:'')){

								    foreach(json_decode($property_media[0]['Images']) as $imgs){

								?>

							            <div class="swiper-slide"><img src="<?=base_url();?>uploads/<?=$imgs;?>" alt=""></div>

								<?php

								    }
								    
								}else{

								?>

									<div class="swiper-slide"><img src="<?=base_url();?>assets/front_assets/images/No_Image_Available.jpg" alt=""></div>

								<?php

								}

								?>

								</div>

								

							</div>

							<div class="swiper-button-prev"></div>

							<div class="swiper-button-next"></div>

							<div class="swiper gallery-thumbs">

								<div class="swiper-wrapper">

								<?php

								if(isset($property_media[0]['Images']) && !empty($property_media[0]['Images']) && (is_array(json_decode($property_media[0]['Images']))?count(json_decode($property_media[0]['Images']))!=0:'')){

									foreach(json_decode($property_media[0]['Images']) as $imgs){

								?>

										<div class="swiper-slide"><img src="<?=base_url();?>uploads/<?=$imgs;?>" alt=""></div>

								<?php

									}

								}else{

									?>

										<div class="swiper-slide"><img src="<?=base_url();?>assets/front_assets/images/No_Image_Available.jpg" alt=""></div>

								<?php

								}

								?>

								</div>

							</div>

						</div>

						<div class="overview-card">

							<div class="overview-heading">

								<h5><?php echo $this->lang->line('ltr_overview');?></h5>

							</div>

							<div class="overview-list">

								<ul class="listing-date">

									<li><?php echo $this->lang->line('ltr_listed_on');?>:</li>

								<?php

								if(isset($properties[0]['add_date']) && !empty($properties[0]['add_date'])){

								?>

									<li><?=date('F',strtotime($properties[0]['add_date']));?> <?=date('d',strtotime($properties[0]['add_date']));?>, <?=date('Y',strtotime($properties[0]['add_date']));?></li>

								<?php

								}else{
								    echo 'n/a';
								}

								?>

								</ul>

								<ul>

									<li><img src="<?=base_url();?>assets/front_assets/images/listing-amenities-bed.png"></li>

								<?php

								if(isset($properties[0]['bedrooms']) && !empty($properties[0]['bedrooms'])){

								?>

									<li><?=$properties[0]['bedrooms'];?> <?php echo $this->lang->line('ltr_bedrooms');?></li>

								<?php

								}else{
								    echo 'n/a';
								}

								?>

								</ul>

								<ul>

									<li><img src="<?=base_url();?>assets/front_assets/images/listing-amenities-bath.png"></li>

								<?php

								if(isset($properties[0]['bathrooms']) && !empty($properties[0]['bathrooms'])){

								?>

									<li><?=$properties[0]['bathrooms'];?> <?php echo $this->lang->line('ltr_bathrooms');?></li>

								<?php

								}
								else{
								    echo 'n/a';
								}

								?>

								</ul>

								<ul>

									<li><img src="<?=base_url();?>assets/front_assets/images/listing-amenities-area.png"></li>

								<?php

								if(isset($properties[0]['plot_area']) && !empty($properties[0]['plot_area'])){

								?>

									<li><?=$properties[0]['plot_area'];?> <?php echo $this->lang->line('ltr_sqft');?></li>

								<?php

								}else{ echo 'n/a';}

								?>

								</ul>

							</div>

						</div>

						<div class="overview-card">

							<div class="overview-heading">

								<h5><?php  echo $this->lang->line('ltr_description');?></h5>

							</div>

							<div class="overview-text">

								<?=((isset($properties[0]['short_description']) && !empty($properties[0]['short_description']))?base64_decode($properties[0]['short_description']):'n/a');?>
								<?=((isset($properties[0]['long_description']) && !empty($properties[0]['long_description']))?base64_decode($properties[0]['long_description']):'n/a');?>

							</div>

						</div>

						<div class="overview-card">

							<div class="overview-heading">

								<h5><?php echo $this->lang->line('ltr_address');?></h5>

							</div>

							<div class="overview-text">

								<div class="col-lg-6 col-12 p-0">
									<p><strong><?php echo $this->lang->line('ltr_address');?>:</strong><?=((isset($properties[0]['address']) && !empty($properties[0]['address']))?$properties[0]['address']:'n/a');?></p>

								</div>

								

								<div class="col-lg-6 col-12 p-0">
                     <?php  if(isset($properties[0]['city'])){ $cityInfo = _getWhere('cities', ['id' => $properties[0]['city']]);} ?>
									<p><strong><?php echo $this->lang->line('ltr_city');?>:</strong><?=((isset($properties[0]['city']) && !empty($properties[0]['city']))?$cityInfo->name:'');?></p>

								</div>

								

								<div class="col-lg-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_state');?>:</strong><?=loop_select('id',((isset($properties[0]['states']) && !empty($properties[0]['states']))?$properties[0]['states']:'n/a'),'name','px_states');?></p>

								</div>

								

								<div class="col-lg-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_zip_code');?>:</strong><?=((isset($properties[0]['zip_code']) && !empty($properties[0]['zip_code']))?$properties[0]['zip_code']:'n/a');?></p>

								</div>

								

								<div class="col-lg-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_country');?>:</strong><?=loop_select('id',((isset($properties[0]['country']) && !empty($properties[0]['country']))?$properties[0]['country']:'n/a'),'name','px_country');?></p>

								</div>

							</div>

						</div>

						<div class="overview-card">

							<div class="overview-heading">

								<h5><?php echo $this->lang->line('ltr_details');?></h5>

							</div>

							<div class="overview-text">

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_property_id');?>:</strong>rep_<?=$edit_property_id;?></p>

								</div>

								

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_price');?>:</strong><?=loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies');?><?=((isset($properties[0]['sale_price']) && !empty($properties[0]['sale_price']))?$properties[0]['sale_price']:'n/a');?></p>

								</div>

								

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_rent_price');?>:</strong><?=loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies');?><?=((isset($properties[0]['rent_price']) && !empty($properties[0]['rent_price']))?$properties[0]['rent_price']:'n/a');?>/<?php echo $this->lang->line('ltr_month');?></p>

								</div>



								<div class="col-md-4 col-sm-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_property_size');?>:</strong><?=((isset($properties[0]['plot_area']) && !empty($properties[0]['plot_area']))?$properties[0]['plot_area']:'n/a');?> <?php echo $this->lang->line('ltr_sqft');?></p>

								</div>

							

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_rooms');?>:</strong><?=((isset($properties[0]['rooms']) && !empty($properties[0]['rooms']))?$properties[0]['rooms']:'n/a');?></p>

								</div>

								

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_bedrooms');?>:</strong><?=((isset($properties[0]['bedrooms']) && !empty($properties[0]['bedrooms']))?$properties[0]['bedrooms']:'n/a');?></p>

								</div>

								

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<p><strong><?php  echo $this->lang->line('ltr_bathrooms');?>:</strong><?=((isset($properties[0]['bathrooms']) && !empty($properties[0]['bathrooms']))?$properties[0]['bathrooms']:'n/a');?></p>

								</div>

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_agent');?>:</strong><?=((isset($properties[0]['full_name']) && !empty($properties[0]['full_name']))?$properties[0]['full_name']:'n/a');?></p>

								</div>

								<!--<div class="col-md-4 col-sm-6 col-12 p-0">-->

									<!--<p title="please login/signup to see this"><strong><?php //echo $this->lang->line('ltr_agent_phone');?>:</strong><?//=(isset($_SESSION['id']) && !empty($_SESSION['id']))?((isset($properties[0]['phone']) && !empty($properties[0]['phone']))?$properties[0]['phone']:''):'XXXXXXXXXX';?></p>-->

								<!--</div>-->

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_category');?>:</strong><?=loop_select('id',((isset($properties[0]['propty_category']) && !empty($properties[0]['propty_category']))?$properties[0]['propty_category']:'n/a'),'category','px_addcategory');?></p>

								</div>

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_purpose');?>:</strong><?=loop_select('id',((isset($properties[0]['purpose']) && !empty($properties[0]['purpose']))?$properties[0]['purpose']:'n/a'),'purpose','px_addpurpose');?></p>

								</div>

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_status');?>:</strong><?=loop_select('id',((isset($properties[0]['badge']) && !empty($properties[0]['badge']))?$properties[0]['badge']:''),'badge','px_addbadge');?></p>

								</div>

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_floors');?>:</strong><?=((isset($properties[0]['floors']) && !empty($properties[0]['floors']))?$properties[0]['floors']:'n/a');?></p>

								</div>

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_neighbourhood');?>:</strong><?=loop_select('id',((isset($properties[0]['neighbourhood']) && !empty($properties[0]['neighbourhood']))?$properties[0]['neighbourhood']:'n/a'),'neighbourhood','px_addneighbourhood');?></p>

								</div>

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_owner');?>:</strong><?=loop_select('id',((isset($properties[0]['owner']) && !empty($properties[0]['owner']))?$properties[0]['owner']:'n/a'),'ownership','px_addownership');?></p>

								</div>

							</div>

						</div>

						<div class="overview-card">

							<div class="overview-heading">

								<h5><?php echo $this->lang->line('ltr_features');?></h5>

							</div>

							<div class="overview-utilities">

								<a href="javascript:void(0)"><?php echo $this->lang->line('ltr_interior_details');?></a>

							</div>

							<div class="property-amenities">

							<?php

							if(isset($amenities[0]['indoor']) && !empty($amenities[0]['indoor'])){
							    

								foreach(json_decode($amenities[0]['indoor'],true) as $amenite){

									foreach($amenite as $mark_key => $mark_value){

							?>

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<div class="amenities-info">

										<img src="<?=base_url();?>assets/front_assets/images/listing-amenities-bed.png">

										<span><?=$mark_value;?></span>

									</div>

								</div>

							<?php

									}

								}

							}

							?>
			
							<input type="hidden" name="property_id" id="property_id" value="<?=$prop_id; ?>">
                    
							</div>

							<div class="overview-utilities">

								<a href="javascript:void(0)"><?php echo $this->lang->line('ltr_outdoor_details');?></a>

							</div>

							<div class="property-amenities">

							<?php

							if(isset($amenities[0]['outdoor']) && !empty($amenities[0]['outdoor'])){

								foreach(json_decode($amenities[0]['outdoor'],true) as $amenite){

									foreach($amenite as $mark_key => $mark_value){

							?>

								<div class="col-md-4 col-sm-6 col-12 p-0">

									<div class="amenities-info">

										<img src="<?=base_url();?>assets/front_assets/images/listing-amenities-bed.png">

										<span><?=$mark_value;?></span>

									</div>

								</div>

							<?php

									}

								}

							}

							?>

							</div>

							<div class="overview-utilities">

								<a href="javascript:void(0)"><?php echo $this->lang->line('ltr_land_marks');?></a>

							</div>

							<div class="property-amenities">

							<?php

							if(isset($landmark[0]['land_marks']) && !empty($landmark[0]['land_marks'])){

								foreach(json_decode($landmark[0]['land_marks'],true) as $mark){

									foreach($mark as $mark_key => $mark_value){

							?>

									<div class="col-md-4 col-sm-6 col-12 p-0">

										<div class="amenities-info">

											<img src="<?=base_url();?>assets/front_assets/images/listing-amenities-bed.png">

											<span><?=$mark_key;?>: <?=$mark_value;?></span>

										</div>

									</div>

							<?php

									}

								}

							}

							?>

							</div>

					</div>
						<?php if(isset($properties[0]) && $properties[0]['uploaded_by'] !='user'){ ?>

						<div class="overview-card">

							<div class="overview-heading">

								<h5><?php echo $this->lang->line('ltr_company_details');?></h5>

							</div>
							<?php ?>

							<div class="overview-text">

								<div class="col-md-12 col-sm-12 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_company_name');?>:</strong><?=((isset($company[0]['company_name']) && !empty($company[0]['company_name']))?$company[0]['company_name']:'n/a');?></p>

								</div>

								

								<div class="col-md-12 col-sm-12 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_company_contact');?>:</strong><?=((isset($company[0]['company_phone']) && !empty($company[0]['company_phone']))?$company[0]['company_phone']:'n/a');?></p>

								</div>

								

								<div class="col-md-12 col-sm-12 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_website');?>:</strong><?=((isset($company[0]['website']) && !empty($company[0]['website']))?$company[0]['website']:'n/a');?></p>

								</div>



								<div class="col-md-12 col-sm-12 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_facebook');?>:</strong><?=((isset($company[0]['facebook']) && !empty($company[0]['facebook']))?$company[0]['facebook']:'n/a');?></p>

								</div>

								

								<div class="col-md-12 col-sm-12 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_twitter');?>:</strong><?=((isset($company[0]['twitter']) && !empty($company[0]['twitter']))?$company[0]['twitter']:'n/a');?></p>

								</div>

								

								<div class="col-md-12 col-sm-12 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_office_hour');?>:</strong><?=((isset($company[0]['office_hour']) && !empty($company[0]['office_hour']))?$company[0]['office_hour']:'n/a');?></p>

								</div>

								

								<div class="col-md-12 col-sm-12 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_about_company');?></strong></p>

									<p><?=((isset($company[0]['company_detail']) && !empty($company[0]['company_detail']))?base64_decode($company[0]['company_detail']):'n/a');?></p>

								</div>

							</div>

						</div>
						<?php } ?>
					

						<?php if(isset($property_media[0]['videos']) && !empty($property_media[0]['videos'])){?>

						<?php $i=1; foreach(json_decode($property_media[0]['videos']) as $vids){?>

						<div class="overview-card">

							<div class="overview-heading">

								<h5><?php echo $this->lang->line('ltr_video');?></h5>

							</div>

							<div class="property-video">

								<div class="property-video-player"></div>

								<a class="video" href="" data-toggle="modal" data-target="#property-video<?=$i;?>">

									<video width="670px" height="375px">
										<source src="<?=base_url();?>uploads/video_upload/<?=$vids;?>" type="video/mp4">
									</video>

								</a>

							</div>

						</div>

						<?php $i++; }?>

						<?php $i=1; foreach(json_decode($property_media[0]['videos']) as $vids){?>

						<!-- Modal -->

						<div class="modal fade" id="property-video<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

							<div class="modal-dialog modal-dialog-centered" role="document">

								<div class="modal-content">

									<div class="modal-header">

										<h5 class="modal-title" id="exampleModalLongTitle"><?=$properties[0]['property_name'];?></h5>

										<button type="button" class="close" data-dismiss="modal" aria-label="Close">

										<span aria-hidden="true">&times;</span>

										</button>

									</div>

									<div class="modal-body">

										<iframe width="100%" height="450" src="<?=base_url();?>uploads/video_upload/<?=$vids;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

									</div>
									
								</div>

							</div>

						</div>

						<?php $i++; }?>

						<?php }?>
						<div class="error"></div>
						<div class="overview-card">

							<div class="overview-heading">

								<h5><?php echo $this->lang->line('ltr_get_in_touch');?></h5>

							</div>

							<div class="overview-text">

								<p><?php echo $this->lang->line('ltr_fill_contact_form_call');?></p>

								<form class="contact-form formget" method="post" action="<?=base_url('add-query');?>">

									<input type="hidden" name="property" value="<?=$edit_property_id;?>">

									<input type="hidden" name="agent" value="<?=((isset($properties[0]['id']) && !empty($properties[0]['id']))?$properties[0]['id']:'');?>">

									<div class="form-group">

										<label for="username"><?php echo $this->lang->line('ltr_full_name');?></label>

										<input type="text" name="username" class="form-control" id="username" placeholder="Enter Your Full Name" autocomplete="off">

										<h6 id="usercheck"></h6>

									</div>

									

									<div class="form-group">

										<label for="email"><?php echo $this->lang->line('ltr_email');?></label>

										<input type="email" name="email" class="form-control" id="u_email" placeholder="Enter Your Email" autocomplete="off">

										<h6 id="emailcheck"></h6>

									</div>

									

									<div class="form-group">

										<label for="phone"><?php echo $this->lang->line('ltr_mobile_number');?></label>

										<input type="number" name="phone" class="form-control" id="u_phone" placeholder="Enter Your Mobile Number" autocomplete="off">

										<h6 id="phonecheck"></h6>

									</div>



									<div class="form-group">

										<label for="comment"><?php echo $this->lang->line('ltr_comment');?></label>

										<textarea class="form-control" id="u_comment" name="comment" placeholder="Type your message..." autocomplete="off"></textarea>

										<h6 id="commentcheck"></h6>

									</div>

									<input type="Submit" value="Submit" class="btn" name="submit" id="submitbtn">

								</form>

							</div>

						</div>

					</div>
 
					<div class="col-lg-4 col-12">
					
					    <?php
					   if(isset($properties[0]['uploaded_by']) && $properties[0]['uploaded_by']!= 'admin' ){
					       
					    
					    if(isset($_SESSION['user_type']) && $_SESSION['user_type'] =='admin'){  ?>
					    <?php if( $active[0]['approve'] == 0 ){ ?>
					  
						<div class="row">
                          <div class="col-lg-12 col-md-12">
                             <div class="property-form new-btn">
                                      <a href="JavaScript:void(0);" id="accept" data-id="1" class="accept">Accept <span class="fa fa-check"></span></a>
                                      <a href="JavaScript:void(0);" class="deny"data-id="2" id="reject">Reject <span class="fa fa-close"></span></a>
                            </div>
						</div>
						</div>
						<?php } } } ?>
						    
						    <div class="col-lg-12 col-md-6">
								<div class="contact-map">
									<iframe id="map" style="width: 100%; height: 500px; border: 1px solid #fff;border-radius: 1rem;margin-bottom: 30px;" src="https://maps.google.com/maps?&amp;q=<?php echo urlencode($properties[0]['gps_cords']);?>&amp;output=embed" ></iframe>
								</div>
							</div>

							<div class="col-lg-12 col-md-6">

							<div class="property-form">

								<!-- Nav tabs -->

								<ul class="nav nav-tabs" role="tablist">

									<!--<li class="nav-item">-->

									<!--	<a class="nav-link" data-toggle="tab" href="#sale"><?php echo $this->lang->line('ltr_sale');?></a>-->

									<!--</li>-->

									<!--<li class="nav-item">-->

									<!--	<a class="nav-link active" data-toggle="tab" href="#rent"><?php echo $this->lang->line('ltr_rent');?></a>-->

									<!--</li>-->

								</ul>

								<!-- Tab panes -->

								<div class="tab-content">

									<div id="" class="container tab-pane active">

										<!--<form class="filter" method="get" action="<?=base_url('result/for-sale')?>" autocomplete="off">-->

										<!--	<div class="row">-->

										<!--		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">-->

										<!--			<div class="form-group">-->

										<!--				<label><?php echo $this->lang->line('ltr_property_category');?></label>-->

										<!--				<select name="category" class="form-control" id="property-category">-->

										<!--					<option value=""><?php echo $this->lang->line('ltr_property_category');?></option>-->

														<?php

												foreach($categorys as $category){

														?>-

										<!--					<option value="<?=$category['id']?>"><?=$category['category']?></option>-->

													<?php

													}

														?>

										<!--				</select>-->

										<!--			</div>-->

										<!--		</div>-->

										<!--		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">-->

										<!--			<div class="form-group">-->

										<!--				<label for="location"><?php echo $this->lang->line('ltr_city');?></label>-->

										<!--				<input type="text" name="location" class="form-control" placeholder="Enter a city" id="location">-->

										<!--			</div>-->

										<!--		</div>-->

										<!--	</div>-->

										<!--	<div class="row">-->

										<!--		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">-->

										<!--			<div class="form-group">-->

										<!--				<label><?php echo $this->lang->line('ltr_bedrooms');?></label>-->

										<!--				<input type="number" name="bedroom" class="form-control" placeholder="No. of Bedroom" id="property-bedrooms">-->

										<!--			</div>-->

										<!--		</div>-->

										<!--		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">-->

										<!--			<div class="form-group">-->

										<!--				<label><?php echo $this->lang->line('ltr_bathrooms');?></label>-->

										<!--				<input type="number" name="bathroom" class="form-control" placeholder="No. of Bathroom" id="property-bathrooms">-->

										<!--			</div>-->

										<!--		</div>-->

										<!--	</div>-->

										<!--	<div class="row">-->

										<!--		<div class="col-lg-12 col-md-6 col-sm-6 col-12">-->

										<!--			<div class="form-group">-->

										<!--				<label for="formControlRange"><?php echo $this->lang->line('ltr_area');?> <span id="sale_area_start"></span>(<?php echo $this->lang->line('ltr_sqft');?>)<span id="sale_area_end"></span>(<?php echo $this->lang->line('ltr_sqft');?>)</label>-->

										<!--				<div class="multi-range">-->

										<!--					<input name="init_area" class="range" type="range" min="0" max="<?=max_value('plot_area','px_properties')['plot_area'];?>" value="0" id="sale_lower_area">-->

										<!--					<span class="range-color" id="range-color"></span>-->

										<!--					<input name="final_area" class="range" type="range" min="0" max="<?=max_value('plot_area','px_properties')['plot_area'];?>" value="<?=max_value('plot_area','px_properties')['plot_area'];?>" id="sale_upper_area">-->

										<!--				</div>-->

										<!--			</div>-->

										<!--		</div>-->

										<!--		<div class="col-lg-12 col-md-6 col-sm-6 col-12">-->

										<!--			<div class="form-group">-->

										<!--				<label for="formControlRange"><?php echo $this->lang->line('ltr_price');?> <?=loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies');?><span id="sale_price_start"></span> <?=loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies');?><span id="sale_price_end"></span></label>-->

										<!--				<div class="multi-range">-->

										<!--					<input name="init_price" class="range" type="range" min="0" max="<?=max_value('sale_price','px_properties')['sale_price'];?>" value="0" id="sale_lower_price">-->

										<!--					<span class="range-color" id="range-color"></span>-->

										<!--					<input name="final_price" class="range" type="range" min="0" max="<?=max_value('sale_price','px_properties')['sale_price'];?>" value="<?=max_value('sale_price','px_properties')['sale_price'];?>" id="sale_upper_price">-->

										<!--				</div>-->

										<!--			</div>-->

										<!--		</div>-->

										<!--	</div>-->

										<!--	<input type="submit" name="submit resetform" class="btn" value="Search">-->

										<!--</form>-->

									</div>

									<div id="rent" class="container tab-pane fade ">

										<form class="filter" method="get" action="<?=base_url('result/for-rent')?>" autocomplete="off">

										<div class="row">

												<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

													<div class="form-group">

														<label><?php echo $this->lang->line('ltr_property_category');?></label>

														<select name="category" class="form-control" id="property-category">

															<option value=""><?php echo $this->lang->line('ltr_property_category');?></option>

														<?php

														foreach($categorys as $category1){

														?>

															<option value="<?=$category1['id']?>"><?=$category1['category']?></option>

														<?php

														}

														?>

														</select>

													</div>

												</div>

												<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

													<div class="form-group">

														<label for="location"><?php echo $this->lang->line('ltr_city');?></label>

														<input type="text" name="location" class="form-control" placeholder="Enter a city" id="location">

													</div>

												</div>

											</div>

											<div class="row">

												<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

													<div class="form-group">

														<label><?php echo $this->lang->line('ltr_bedrooms');?></label>

														<input type="number" name="bedroom" class="form-control" placeholder="No. of Bedroom" id="property-bedrooms">

													</div>

												</div>

												<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

													<div class="form-group">

														<label><?php echo $this->lang->line('ltr_bathrooms');?></label>

														<input type="number" name="bathroom" class="form-control" placeholder="No. of Bathroom" id="property-bathrooms">

													</div>

												</div>

											</div>

											<div class="row">

												<div class="col-xl-6 col-lg-12 col-md-6 col-sm-6 col-12">

													<div class="form-group">

														<label for="formControlRange"><?php echo $this->lang->line('ltr_area');?><span id="rent_area_start"></span>(<?php echo $this->lang->line('ltr_sqft');?>)<span id="rent_area_end"></span>(<?php echo $this->lang->line('ltr_sqft');?>)</label>

														<div class="multi-range">

															<input name="init_area" class="range" type="range" min="0" max="<?=max_value('plot_area','px_properties')['plot_area'];?>" value="0" id="rent_lower_area">

															<span class="range-color" id="range-color"></span>

															<input name="final_area" class="range" type="range" min="0" max="<?=max_value('plot_area','px_properties')['plot_area'];?>" value="<?=max_value('plot_area','px_properties')['plot_area'];?>" id="rent_upper_area">

														</div>

													</div>

												</div>

												<div class="col-xl-6 col-lg-12 col-md-6 col-sm-6 col-12">

													<div class="form-group">

														<label for="formControlRange"><?php echo $this->lang->line('ltr_price');?> <?=loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies');?><span id="rent_price_start"></span> <?=loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies');?><span id="rent_price_end"></span></label>

														<div class="multi-range">

															<input name="init_price" class="range" type="range" min="0" max="<?=max_value('rent_price','px_properties')['rent_price'];?>" value="0" id="rent_lower_price">

															<span class="range-color" id="range-color"></span>

															<input name="final_price" class="range" type="range" min="0" max="<?=max_value('rent_price','px_properties')['rent_price'];?>" value="<?=max_value('rent_price','px_properties')['rent_price'];?>" id="rent_upper_price">

														</div>

													</div>

												</div>

											</div>

											<input type="submit" name="submit" class="btn resetform" value="Search">

										</form>

									</div>

								</div>

							</div>

						</div>

						<div class="col-lg-12 col-md-6">

							<div class="card agent_card mb-5">

								<img src="<?=((isset($properties[0]['profile_photo']) && !empty($properties[0]['profile_photo']))?base_url().'uploads/'.$properties[0]['profile_photo']:base_url().'assets/front_assets/images/no-ava.jpeg');?>">

								<div class="card-detail">
                                        <?php if($properties[0]['user_type'] == 'agent'){?>
									<a href="<?=base_url();?>member/<?=((isset($properties[0]['id']) && !empty($properties[0]['id']))?$properties[0]['id']:'');?>-<?=str_replace(" ","-",((isset($properties[0]['full_name']) && !empty($properties[0]['full_name']))?$properties[0]['full_name']:'n/a'));?>">
									    <?php }else {?>
									    <a href="javascript:void(0);">
									    <?php } ?>
									    <h5><?=((isset($properties[0]['full_name']) && !empty($properties[0]['full_name']))?$properties[0]['full_name']:'n/a');?><br><span><?= ($properties[0]['user_type'] == 'agent')? 'Company Agent' : 'Company User';?></span></h5></a>

								</div>
								
							

							</div>

						</div>

						<?php

						foreach($propert as $properties){

						?>

						<div class="col-lg-12 col-md-6">	

						<div class="property-card">

							<div class="property-image">

								<img src="<?=(json_decode(loop_select('property_id',$properties['id'],'images','px_property_media'),true)?base_url().'uploads/'.json_decode(loop_select('property_id',$properties['id'],'images','px_property_media'),true)[0]:base_url().'assets/front_assets/images/banner-bg.png');?>">
								<div class="property-button">
									<?php if(isset($properties['purpose']) && is_numeric($properties['purpose'])){?><span class="btn rent-btn"><?=loop_select('id',$properties['purpose'],'purpose','px_addpurpose');?></span><?php }?>
									<?php if(isset($properties['badge']) && is_numeric($properties['badge'])){?><span class="btn new-btn"><?=loop_select('id',$properties['badge'],'badge','px_addbadge');?></span><?php }?>
								</div>
								<?php if($this->session->userdata('id')){?>

								<div class="property-icon">

									<a href="javascript:void(0)"><i id="property_<?=$properties['id'];?>" <?=favorite_info($properties['id'],$_SESSION['id']);?> onclick="favourate(<?=$properties['id'];?>)" class="fas fa-heart"></i></a>

								</div>

								<?php

								}

								?>

							</div>

							<div class="property-detail">

								<div class="property-name">

									<a href="<?=base_url();?>listing/<?=$properties['id'];?>-<?=str_replace(",","-",$properties['url_sluge']);?>"><h4><?=$properties['property_name'];?></h4></a>

								</div>

								<div class="property-location">

									<img src="<?=base_url();?>assets/front_assets/images/listing-location.png">

									<span><?=$properties['city'];?> <?=loop_select('id',$properties['states'],'name','px_states');?></span>

								</div>

								<div class="property-amenities">

									<div class="amenities-info">

										<img src="<?=base_url();?>assets/front_assets/images/listing-amenities-bed.png">

										<span><?php echo $this->lang->line('ltr_bed');?> : <?=($properties['bedrooms']) ? $properties['bedrooms'] : 'n/a' ;?></span>

									</div>

									<div class="amenities-info">

										<img src="<?=base_url();?>assets/front_assets/images/listing-amenities-bath.png">

										<span><?php echo $this->lang->line('ltr_bath');?> : <?= ($properties['bathrooms']) ? $properties['bathrooms']: 'n/a' ;?></span>

									</div>

									<div class="amenities-info">

										<img src="<?=base_url();?>assets/front_assets/images/listing-amenities-area.png">

										<span><?=($properties['plot_area']) ? $properties['plot_area']: 'n/a ' ;?> <?php echo $this->lang->line('ltr_sqft');?></span>

									</div>

								</div>

								<hr>

								<div class="listing-details">

									<div class="listing-agent">

										<img src="<?=(isset($properties['profile_photo']) && !empty($properties['profile_photo']))?base_url().'uploads/'.$properties['profile_photo']:base_url().'assets/front_assets/images/no-ava.jpeg';?>" class="rounded-circle">

										<span><?=$properties['full_name'];?></span>

									</div>

									<div class="listing-post">

										<span class="title">Post :</span>

										<img src="<?=base_url();?>assets/front_assets/images/listing-calendar.png">

										<span><?=date('Y-m-d',strtotime($properties['add_date']));?></span>

									</div>

								</div>

							</div>

						</div>

						</div>

						<?php

						}

						?>

					</div>

					</div>

				</div>

			</div>

		</section>

		<!--===Property Overview End===-->

		