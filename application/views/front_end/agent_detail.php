

		<!--===Page Heading Start===-->

		<section class="page-heading">

			<h1><?php echo $this->lang->line('ltr_agent_details');?></h1>

			<a href="<?=base_url();?>"><?php echo $this->lang->line('ltr_home');?></a><span>&nbsp; // <?php echo $this->lang->line('ltr_agent_details');?></span>

		</section>

		<!--===Page Heading End===-->

		<!--===Agent Overview Start===-->

		<section class="property-overview">

			<div class="container">

				<div class="row">

					<div class="col-lg-8 col-12">

						<div class="agent-gallery">

							<div class="col-lg-6 col-md-12">

								<div class="agent-card">

									<img src="<?=(isset($agent_detail[0]['profile_photo']) && !empty($agent_detail[0]['profile_photo']))?base_url().'uploads/'.$agent_detail[0]['profile_photo']:base_url().'assets/front_assets/images/no-ava.jpeg';?>">

									<div class="agent-social-links">

										<a href="<?=(isset($agent_detail[0]['fb_link']) && !empty($agent_detail[0]['fb_link']))?'https://'.$agent_detail[0]['fb_link']:'';?>"><i class="fab fa-facebook-f"></i></a>

										<a href="<?=(isset($agent_detail[0]['insta_link']) && !empty($agent_detail[0]['insta_link']))?'https://'.$agent_detail[0]['insta_link']:'';?>"><i class="fab fa-instagram"></i></a>

										<a href="<?=(isset($agent_detail[0]['twitter_link']) && !empty($agent_detail[0]['twitter_link']))?'https://'.$agent_detail[0]['twitter_link']:'';?>"><i class="fab fa-twitter"></i></a>

										<a href="<?=(isset($agent_detail[0]['linkedin_link']) && !empty($agent_detail[0]['linkedin_link']))?'https://'.$agent_detail[0]['linkedin_link']:'';?>"><i class="fab fa-linkedin-in"></i></a>

									</div>

								</div>

							</div>

							<div class="col-lg-6 col-md-12">

								<div class="card-detail">

									<h5><?=(isset($agent_detail[0]['full_name']) && !empty($agent_detail[0]['full_name']))?$agent_detail[0]['full_name']:'';?><br><span><?php echo $this->lang->line('ltr_company_agent');?></span></h5>

								</div>

								<ul class="agent-contact">

									<li><i class="fas fa-phone"></i><a href="<?//=(isset($_SESSION['id']) && !empty($_SESSION['id']))?((isset($agent_detail[0]['phone']) && !empty($agent_detail[0]['phone']))?'tel:'.$agent_detail[0]['phone']:'javascript:void(0);'):base_url().'login';?>"><?//=(isset($_SESSION['id']) && !empty($_SESSION['id']))?((isset($agent_detail[0]['phone']) && !empty($agent_detail[0]['phone']))?$agent_detail[0]['phone']:''):'XXXXXXXXXX';?></a></li>

									<li><i class="far fa-envelope"></i><a href="<?=(isset($_SESSION['id']) && !empty($_SESSION['id']))?((isset($agent_detail[0]['email']) && !empty($agent_detail[0]['email']))?'mailto:'.$agent_detail[0]['email']:'javascript:void(0);'):base_url().'login';?>"><?=(isset($_SESSION['id']) && !empty($_SESSION['id']))?((isset($agent_detail[0]['email']) && !empty($agent_detail[0]['email']))?$agent_detail[0]['email']:''):'agent@example.com';?></a></li>

									<li><i class="fab fa-skype"></i><a href="<?=(isset($_SESSION['id']) && !empty($_SESSION['id']))?((isset($agent_detail[0]['skype_link']) && !empty($agent_detail[0]['skype_link']))?'skype:'.$agent_detail[0]['skype_link'].'?chat':'javascript:void(0);'):base_url().'login';?>"><?=(isset($_SESSION['id']) && !empty($_SESSION['id']))?((isset($agent_detail[0]['skype_link']) && !empty($agent_detail[0]['skype_link']))?'Skype Account':''):'Skype Account';?></a></li>

									<li><i class="fab fa-whatsapp"></i><a href="<?=(isset($_SESSION['id']) && !empty($_SESSION['id']))?((isset($agent_detail[0]['whatsup']) && !empty($agent_detail[0]['whatsup']))?'https://wa.me/'.$agent_detail[0]['whatsup']:'javascript:void(0);'):base_url().'login';?>"><?=(isset($_SESSION['id']) && !empty($_SESSION['id']))?((isset($agent_detail[0]['whatsup']) && !empty($agent_detail[0]['whatsup']))?$agent_detail[0]['whatsup']:''):'XXXXXXXXXX';?></a></li>

								</ul>
								
								<p>To see the agent details please login/signup first.</p>

							</div>

						</div>

						<div class="overview-card">

							<div class="overview-heading">

								<h5><?php echo $this->lang->line('ltr_about_me');?></h5>

							</div>

							<div class="overview-text">

								<p><?=(isset($agent_detail[0]['description']) && !empty($agent_detail[0]['description']))?nl2br($agent_detail[0]['description']):'';?></p>

							</div>

						</div>

						<div class="overview-card">

							<div class="overview-heading">

								<h5><?php echo $this->lang->line('ltr_my_details');?></h5>

							</div>

							<div class="overview-text">

								<div class="col-lg-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_username');?>:</strong><?=(isset($agent_detail[0]['user_name']) && !empty($agent_detail[0]['user_name']))?$agent_detail[0]['user_name']:'';?></p>

								</div>



								<div class="col-lg-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_language');?>:</strong><?=(isset($agent_detail[0]['language']) && !empty($agent_detail[0]['language']))?$agent_detail[0]['language']:'';?></p>

								</div>

								

								<!--<div class="col-lg-6 col-12 p-0">-->

								<!--	<p><strong><?php //echo $this->lang->line('ltr_phone');?>:</strong><?//=(isset($_SESSION['id']) && !empty($_SESSION['id']))?((isset($agent_detail[0]['phone']) && !empty($agent_detail[0]['phone']))?$agent_detail[0]['phone']:''):'XXXXXXXXXX';?></p>-->

								<!--</div>-->

								

								<div class="col-lg-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_address');?>:</strong><?=(isset($agent_detail[0]['address']) && !empty($agent_detail[0]['address']))?$agent_detail[0]['address']:'';?></p>

								</div>

								

								<div class="col-lg-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_package_name');?>:</strong><?=(isset($agent_detail[0]['package_nm']) && !empty($agent_detail[0]['package_nm']))?loop_select('id',$agent_detail[0]['package_nm'],'packg_nm','px_packages'):'';?></p>

								</div>



								<div class="col-lg-6 col-12 p-0">

									<p><strong><?php echo $this->lang->line('ltr_package_expiry_date');?>:</strong><?=(isset($agent_detail[0]['package_expiry']) && !empty($agent_detail[0]['package_expiry']))?$agent_detail[0]['package_expiry']:'';?></p>

								</div>

							</div>

						</div>

						<div class="overview-card">

							<div class="overview-heading">

								<h5><?php echo $this->lang->line('ltr_my_listings');?></h5>

							</div>

							<div id="agent_property" class="row">

							<?php

							foreach($properties as $property){

							?>

								<div class="col-lg-6 col-md-6 col-12">

									<div class="property-card">

										<div class="property-image">

											<img src="<?=(json_decode(loop_select('property_id',$property['id'],'images','px_property_media'),true)?base_url().'uploads/'.json_decode(loop_select('property_id',$property['id'],'images','px_property_media'),true)[0]:base_url().'assets/front_assets/images/banner-bg.png');?>">
											<div class="property-button">
												<?php if(isset($property['purpose']) && is_numeric($property['purpose'])){?><span class="btn rent-btn"><?=loop_select('id',$property['purpose'],'purpose','px_addpurpose');?></span><?php }?>
												<?php if(isset($property['badge']) && is_numeric($property['badge'])){?><span class="btn new-btn"><?=loop_select('id',$property['badge'],'badge','px_addbadge');?></span><?php }?>
											</div>
											<?php

											if($this->session->userdata('id')){

											?>

											<div class="property-icon">

												<a href="javascript:void(0)" class="favourate" f_id="<?=$property['id'];?>"><i id="property_<?=$property['id'];?>" <?=favorite_info($property['id'],$_SESSION['id']);?> class="fas fa-heart"></i></a>

											</div>

											<?php

											}

											?>

										</div>

										<div class="property-detail">

											<div class="property-name">

											<a href="<?=base_url();?>listing/<?=$property['id'];?>-<?=str_replace(",","-",$property['url_sluge']);?>"><h4><?=$property['property_name'];?></h4></a>

											</div>

											<div class="property-location">

												<img src="<?=base_url();?>assets/front_assets/images/listing-location.png">

												<span><?=$property['city'];?> <?=loop_select('id',$property['states'],'name','px_states');?></span>

											</div>

											<div class="property-amenities">

												<div class="amenities-info">

													<img src="<?=base_url();?>assets/front_assets/images/listing-amenities-bed.png">

													<span><?php echo $this->lang->line('ltr_bed');?> : <?=$property['bedrooms'];?></span>

												</div>

												<div class="amenities-info">

													<img src="<?=base_url();?>assets/front_assets/images/listing-amenities-bath.png">

													<span><?php echo $this->lang->line('ltr_bath');?> : <?=$property['bathrooms'];?></span>

												</div>

												<div class="amenities-info">

													<img src="<?=base_url();?>assets/front_assets/images/listing-amenities-area.png">

													<span><?=$property['plot_area'];?> <?php echo $this->lang->line('ltr_sqft');?></span>

												</div>

											</div>

											<hr>

											<div class="listing-details">

												<div class="listing-agent">

													<img src="<?=(isset($agent_detail[0]['profile_photo']) && !empty($agent_detail[0]['profile_photo']))?base_url().'uploads/'.$agent_detail[0]['profile_photo']:base_url().'assets/front_assets/images/no-ava.jpeg';?>" class="rounded-circle">

													<span><?=(isset($agent_detail[0]['full_name']) && !empty($agent_detail[0]['full_name']))?$agent_detail[0]['full_name']:'';?></span>

												</div>

												<div class="listing-post">

													<span class="title"><?php echo $this->lang->line('ltr_post');?> :</span>

													<img src="<?=base_url();?>assets/front_assets/images/listing-calendar.png">

													<span><?=date('Y-m-d',strtotime($property['add_date']));?></span>

												</div>

											</div>

										</div>

									</div>

								</div>

							<?php

							}

							?>

							</div>

							<div class="section-heading text-center">

							<?php if(isset($properties) && !empty($properties) && count($properties)>3){ ?>
								<a id="more_agent" agent_property="<?=(isset($agent_detail[0]['id']) && !empty($agent_detail[0]['id']))?$agent_detail[0]['id']:'';?>" href="javascript:void(0);" class="btn"><?php echo $this->lang->line('ltr_view_more');?></a>
							<?php } ?>

							</div>

						</div>						

					</div>

					<div class="col-lg-4 col-12">

						<div class="row">

							<div class="col-lg-12 col-md-6">

							<div class="property-form">

								<!-- Nav tabs -->

								<ul class="nav nav-tabs" role="tablist">

									<li class="nav-item">

										<a class="nav-link" data-toggle="tab" href="#sale"><?php echo $this->lang->line('ltr_sale');?></a>

									</li>

									<!--<li class="nav-item">-->

									<!--	<a class="nav-link active" data-toggle="tab" href="#rent"><?php echo $this->lang->line('ltr_rent');?></a>-->

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
													foreach ($city as $city) {
														$cityInfo = _getWhere('cities', ['id' => $city['city']]);
													?>
														<option value="<?= $city['city'] ?>"><?= $cityInfo->name ?? '' ?></option>

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

									</div>

									<!--<div id="rent" class="container tab-pane fade active">-->

									<!--	<form class="filter" method="get" action="<?=base_url('result/for-rent')?>" autocomplete="off">-->

									<!--	<div class="row">-->

									<!--			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">-->

									<!--				<div class="form-group">-->

									<!--					<label><?php echo $this->lang->line('ltr_property_category');?></label>-->

									<!--					<select name="category" class="form-control" id="property-category">-->

									<!--						<option value=""><?php echo $this->lang->line('ltr_property_category');?></option>-->

													<?php

													//foreach($categorys as $category1){

												?>

									<!--						<option value="<?=$category1['id']?>"><?=$category1['category']?></option>-->

													<?php

													//}

													?>

									<!--					</select>-->

									<!--				</div>-->

									<!--			</div>-->

									<!--			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">-->

									<!--				<div class="form-group">-->

									<!--					<label for="location">City</label>-->

									<!--					<input type="text" name="location" class="form-control" placeholder="Enter a city" id="location">-->

									<!--				</div>-->

									<!--			</div>-->

									<!--		</div>-->

									<!--		<div class="row">-->

									<!--			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">-->

									<!--				<div class="form-group">-->

									<!--					<label><?php echo $this->lang->line('ltr_bedrooms');?></label>-->

									<!--					<input type="number" name="bedroom" class="form-control" placeholder="No. of Bedroom" id="property-bedrooms">-->

									<!--				</div>-->

									<!--			</div>-->

									<!--			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">-->

									<!--				<div class="form-group">-->

									<!--					<label><?php echo $this->lang->line('ltr_bathrooms');?></label>-->

									<!--					<input type="number" name="bathroom" class="form-control" placeholder="No. of Bathroom" id="property-bathrooms">-->

									<!--				</div>-->

									<!--			</div>-->

									<!--		</div>-->

									<!--		<div class="row">-->

									<!--			<div class="col-xl-6 col-lg-12 col-md-6 col-sm-6 col-12">-->

									<!--				<div class="form-group">-->

									<!--					<label for="formControlRange"><?php echo $this->lang->line('ltr_area');?><span id="rent_area_start"></span>(<?php echo $this->lang->line('ltr_sqft');?>)<span id="rent_area_end"></span>(<?php echo $this->lang->line('ltr_sqft');?>)</label>-->

									<!--					<div class="multi-range">-->

									<!--						<input name="init_area" class="range" type="range" min="0" max="<?=max_value('plot_area','px_properties')['plot_area'];?>" value="0" id="rent_lower_area">-->

									<!--						<span class="range-color" id="range-color"></span>-->

									<!--						<input name="final_area" class="range" type="range" min="0" max="<?=max_value('plot_area','px_properties')['plot_area'];?>" value="<?=max_value('plot_area','px_properties')['plot_area'];?>" id="rent_upper_area">-->

									<!--					</div>-->

									<!--				</div>-->

									<!--			</div>-->

									<!--			<div class="col-xl-6 col-lg-12 col-md-6 col-sm-6 col-12">-->

									<!--				<div class="form-group">-->

									<!--					<label for="formControlRange"><?php echo $this->lang->line('ltr_price');?> <?=loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies');?><span id="rent_price_start"></span> <?=loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies');?><span id="rent_price_end"></span></label>-->

									<!--					<div class="multi-range">-->

									<!--						<input name="init_price" class="range" type="range" min="0" max="<?=max_value('rent_price','px_properties')['rent_price'];?>" value="0" id="rent_lower_price">-->

									<!--						<span class="range-color" id="range-color"></span>-->

									<!--						<input name="final_price" class="range" type="range" min="0" max="<?=max_value('rent_price','px_properties')['rent_price'];?>" value="<?=max_value('rent_price','px_properties')['rent_price'];?>" id="rent_upper_price">-->

									<!--					</div>-->

									<!--				</div>-->

									<!--			</div>-->

									<!--		</div>-->

									<!--		<input type="submit" name="submit" class="btn resetform" value="Search">-->

									<!--	</form>-->

									<!--</div>-->

								</div>

							</div>

							</div>

							<?php

							foreach($agents as $agents){

							?>

							<div class="col-lg-12 col-md-6">

								<!--<div class="card agent_card mb-5">-->

								<!--	<img src="<?=(isset($agents['profile_photo']) && !empty($agents['profile_photo']))?base_url().'uploads/'.$agents['profile_photo']:base_url().'assets/front_assets/images/no-ava.jpeg';?>">-->

								<!--	<div class="card-detail">-->

								<!--	<a href="<?=base_url();?>member/<?=$agents['id'];?>-<?=str_replace(" ","-",$agents['full_name']);?>"><h5><?=$agents['full_name'];?><br><span><?php echo $this->lang->line('ltr_company_agent');?></span></h5></a>-->

								<!--	</div>-->
									
								<!--	<div class="team-social-links">-->

								<!--	<a href="https://<?php echo $agents['fb_link'];?>"><i class="fab fa-facebook-f"></i></a>-->

								<!--	<a href="https://<?php echo $agents['insta_link'];?>"><i class="fab fa-instagram"></i></a>-->

								<!--	<a href="https://<?php echo $agents['twitter_link'];?>"><i class="fab fa-twitter"></i></a>-->

								<!--	<a href="https://<?php echo $agents['linkedin_link'];?>"><i class="fab fa-linkedin-in"></i></a>-->

								<!--	</div>-->

								<!--</div>-->

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
		
		<script>
	$(document).ready(f$(document).ready(function(){   
        
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
	

				