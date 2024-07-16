
		<!--===Page Heading Start===-->

		<section class="page-heading">

			<h1><?php echo $this->lang->line('ltr_our_listing');?></h1>

			<a href="<?=base_url();?>"><?php echo $this->lang->line('ltr_home');?></a><span>&nbsp; // <?php echo $this->lang->line('ltr_our_listing');?></span>

		</section>

		<!--===Page Heading End===-->

		<!--===Popular Listing Section Start===-->

		<section class="listing-wrapper">

			<div class="container">
			  
			    
			    <input id="property_data" type="hidden" value='<?=base64_encode(json_encode($properties));?>'>
				<!--<div id="maps" style="height: 500px;border: 1px solid #fff;border-radius: 1rem; margin-bottom: 30px;z-index:1"></div>-->
			    
			    <div id="property_cards" class="row">
			    <?php
			        if($properties==[]){
			    ?>
			        <div class="rs_page404 h-auto">
            			<div class="container">
            				<div class="rs_page404_content">
            					<div class="larg_text">
            						<img width="50%" src="<?=base_url();?>assets/front_assets/images/not-found.png" class="img-fluid" alt="">
            					</div>
            					<p><?php echo $this->lang->line('ltr_result_not_found');?></p>
            
            					<a href="<?=base_url();?>" class="btn"><?php echo $this->lang->line('ltr_search_again');?></a>
            				</div>
            			</div>
            			
            		</div>
                <?php
			        }else{
				    foreach($properties as $properties){
                
				?>

					<div class="col-lg-4 col-md-6 col-12">
					    

						<div class="property-card mb-5">

							<div class="property-image">
								<a href="<?=base_url();?>listing/<?=$properties['id'];?>-<?=str_replace(",","-",$properties['url_sluge']);?>">

								<img src="<?=(json_decode(loop_select('property_id',$properties['id'],'images','px_property_media'),true)?base_url().'uploads/'.json_decode(loop_select('property_id',$properties['id'],'images','px_property_media'),true)[0]:base_url().'assets/front_assets/images/banner-bg.png');?>">
								</a>
								<div class="property-button">
									<?php if(isset($properties['purpose']) && is_numeric($properties['purpose'])){?><span class="btn rent-btn"><?=loop_select('id',$properties['purpose'],'purpose','px_addpurpose');?></span><?php }?>
									<?php if(isset($properties['badge']) && is_numeric($properties['badge'])){?><span class="btn new-btn"><?=loop_select('id',$properties['badge'],'badge','px_addbadge');?></span><?php }?>
								</div>
								<?php
								if((isset($_SESSION['id']) && !empty($_SESSION['id'])) && substr($_SERVER['PATH'],1)!='shortlisted-listings'){

								?>

								<div class="property-icon">

									<a href="javascript:void(0)" class="favourate" f_id="<?=$properties['id'];?>"><i id="property_<?=$properties['id'];?>" <?=favorite_info($properties['id'],$_SESSION['id']);?> class="fas fa-heart"></i></a>

								</div>

								<?php

								}

								?>

							</div>
						

							<div class="property-detail">

								<div class="property-name">

								<a href="<?=base_url();?>listing/<?=$properties['id'];?>-<?=str_replace(",","-",$properties['url_sluge']);?>"><h4><?=$properties['property_name'];?></h4></a>

								</div>
                            	<a href="<?=base_url();?>listing/<?=$properties['id'];?>-<?=str_replace(",","-",$properties['url_sluge']);?>">
								<div class="property-location">

									<img src="<?=base_url();?>assets/front_assets/images/listing-location.png">
									<?php  $cityInfo = _getWhere('cities', ['id' => $properties['city']]);?>

									<span><?=$cityInfo->name;?> <?=loop_select('id',$properties['states'],'name','px_states');?></span>

								</div>
								</a>
	                  <a href="<?=base_url();?>listing/<?=$properties['id'];?>-<?=str_replace(",","-",$properties['url_sluge']);?>">
								<div class="property-amenities">

									<div class="amenities-info">

										<img src="<?=base_url();?>assets/front_assets/images/listing-amenities-bed.png">

										<span><?php echo $this->lang->line('ltr_bed');?> : <?= ($properties['bedrooms']) ? $properties['bedrooms'] : 'n/a' ;?></span>

									</div>

									<div class="amenities-info">

										<img src="<?=base_url();?>assets/front_assets/images/listing-amenities-bath.png">

										<span><?php echo $this->lang->line('ltr_bath');?> : <?= ($properties['bathrooms']) ? $properties['bathrooms'] : 'n/a';?></span>

									</div>

									<div class="amenities-info">

										<img src="<?=base_url();?>assets/front_assets/images/listing-amenities-area.png">

										<span><?=$properties['plot_area'];?> <?php echo $this->lang->line('ltr_sqft');?></span>

									</div>

								</div>
								</a>

								<hr>
								<div class="listing-details">

									<div class="listing-agent">

										<img src="<?=(isset($properties['profile_photo']) && !empty($properties['profile_photo']))?base_url().'uploads/'.$properties['profile_photo']:base_url().'assets/front_assets/images/no-ava.jpeg';?>" class="rounded-circle">

										<span><?=$properties['full_name'];?></span>

									</div>

									<div class="listing-post">

										<span class="title"><?php echo $this->lang->line('ltr_post');?> :</span>

										<img src="<?=base_url();?>assets/front_assets/images/listing-calendar.png">

										<span><?=date('Y-m-d',strtotime($properties['add_date']));?></span>

									</div>

								</div>
								

							</div>

						</div>

					</div>

				<?php
				    }
				}
                
				?>

				</div>

			</div>

		</section>

		<!--===Popular Listing Section End===-->