

		<!--===Page Heading Start===-->

		<section class="page-heading">

			<h1><?php echo $this->lang->line('ltr_about_us');?></h1>

			<a href="<?=base_url();?>"><?php echo $this->lang->line('ltr_home');?></a><span>&nbsp; // <?php echo $this->lang->line('ltr_about_us');?></span>

		</section>

		<!--===Page Heading End===-->

		<!--===About Section start===-->

		<section class="about-wrapper">

			<div class="container">

				<div class="row align-items-center">

					<div class="col-lg-6 col-12 ">

						<div class="about-section">

							<!-- Common Heading -->

							<div class="section-heading">

								<h5><?=loop_select('section_name','About Us','section_name','px_homepage');?></h5>

								<span></span>

							</div>

							<!-- Common Title -->

							<div class="section-title">

								<h3><?=loop_select('section_name','About Us','main_heading','px_homepage');?></h3>

							</div>

							<!-- Common Text -->

							<div class="section-text">

								<p><?=nl2br(loop_select('section_name','About Us','main_content','px_homepage'));?></p>

							</div>

						</div>

					</div>

					<div class="col-lg-3 col-md-6 col-12">

						<div class="about-image-left">
						    
						    <img src="<?=base_url().'uploads/'.loop_select('id',1,'aboutus_image','px_aboutus_data');?>">

							<div class="about-overlay">

								<h5><?=loop_select('id',1,'aboutus_heading','px_aboutus_data');?></h5>

							</div>

						</div>

					</div>

					<div class="col-lg-3 col-md-6 col-12">

						<div class="about-image-right">

							<div class="about-right-image-one">

								<img class="about-img-one" src="<?=base_url().'uploads/'.loop_select('id',2,'aboutus_image','px_aboutus_data');?>">

								<div class="about-overlay">

									<h5><?=loop_select('id',2,'aboutus_heading','px_aboutus_data');?></h5>

								</div>

							</div>

							<div class="about-right-image-two">

								<img class="about-img-two" src="<?=base_url().'uploads/'.loop_select('id',3,'aboutus_image','px_aboutus_data');?>">

								<div class="about-overlay">

									<h5><?=loop_select('id',3,'aboutus_heading','px_aboutus_data');?></h5>

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

					<h5><?=loop_select('section_name','Choose Us','section_name','px_homepage');?></h5>
					

					<span></span>

				</div>

				<!-- Common Title -->

				<div class="section-title text-center">

					<h3><?=loop_select('section_name','Choose Us','main_heading','px_homepage');?></h3>

				</div>

				<!-- Common Text -->

				<div class="section-text text-center">

					<p><?=nl2br(loop_select('section_name','Choose Us','main_content','px_homepage'));?></p>

				</div>

				<div class="row py-4">

					<div class="col-lg-3 col-md-6 col-12 ">

						<div class="choose-us-box">

							<div class="choose-us-icon text-center">

								<img src="<?=base_url();?>assets/front_assets/images/choose-icon-1.png">

							</div>

							<div class="choose-us-info">

								<div class="wrapper-heading text-center">

									<h5><?php echo $this->lang->line('ltr_choose_heading1');?></h5>

								</div>

								<div class="section-text text-center">

									<p><?php echo $this->lang->line('ltr_choose_content1');?></p>

								</div>

							</div>

						</div>

					</div>
					
					<div class="col-lg-3 col-md-6 col-12 ">

						<div class="choose-us-box">

							<div class="choose-us-icon text-center">

								<img src="<?=base_url();?>assets/front_assets/images/choose-icon-2.png">

							</div>

							<div class="choose-us-info">

								<div class="wrapper-heading text-center">

									<h5><?php echo $this->lang->line('ltr_choose_heading2');?></h5>

								</div>

								<div class="section-text text-center">

									<p><?php echo $this->lang->line('ltr_choose_content2');?></p>

								</div>

							</div>

						</div>

					</div>
					
					<div class="col-lg-3 col-md-6 col-12 ">

						<div class="choose-us-box">

							<div class="choose-us-icon text-center">

								<img src="<?=base_url();?>assets/front_assets/images/choose-icon-3.png">

							</div>

							<div class="choose-us-info">

								<div class="wrapper-heading text-center">

									<h5><?php echo $this->lang->line('ltr_choose_heading3');?></h5>

								</div>

								<div class="section-text text-center">

									<p><?php echo $this->lang->line('ltr_choose_content3');?></p>

								</div>

							</div>

						</div>

					</div>
					
					<div class="col-lg-3 col-md-6 col-12 ">

						<div class="choose-us-box">

							<div class="choose-us-icon text-center">

								<img src="<?=base_url();?>assets/front_assets/images/choose-icon-4.png">

							</div>

							<div class="choose-us-info">

								<div class="wrapper-heading text-center">

									<h5><?php echo $this->lang->line('ltr_choose_heading4');?></h5>

								</div>

								<div class="section-text text-center">

									<p><?php echo $this->lang->line('ltr_choose_content4');?></p>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</section>

		<!--===Choose Us Section End===-->
		
				<!--===Testimonials Section Start===-->

		<section class="testimonial-wrapper">

			<div class="container">

				<div class="row">

					<div class="col-lg-4 col-12 ">

						<div class="testimonial-section">

							<!-- Common Heading -->

							<div class="section-heading">

								<h5><?=loop_select('section_name','Clients Say','section_name','px_homepage');?></h5>

								<span></span>

							</div>

							<!-- Common Title -->

							<div class="section-title">

								<h3><?=loop_select('section_name','Clients Say','main_heading','px_homepage');?></h3>

							</div>

							<!-- Common Text -->

							<div class="section-text">

								<p><?=loop_select('section_name','Clients Say','main_content','px_homepage');?></p>

							</div>

						</div>

					</div>

					<div class="col-lg-8 col-12">

						<div class="testimonial-section">

							<div class="swiper testimonialSwiper">

								<div class="swiper-wrapper">

								<?php

								$i = 1;

								foreach($testimonial as $testimonial){

								?>

									<div class="swiper-slide">

										<div class="testimonial_slide">

											<div class="testimonial_client">

												<img src="<?=base_url();?>uploads/<?=$testimonial['client_image'];?>" class="rounded-circle">

												<span><?=$testimonial['client_name'];?></span>

												<p><?=$testimonial['post'];?></p>

											</div>

											<div class="testimonial_txt">

												<p><?=$testimonial['testimonial'];?></p>

											</div>

										</div>

									</div>

									<?php

									$i++;

									}

									?>

								</div>

							</div>

							<img class="testimonial-quotes" src="<?=base_url();?>assets/front_assets/images/testimonial-quotes.png">

							<div class="swiper-button-next" id="testimonial-next"></div>

							<div class="swiper-button-prev" id="testimonial-prev"></div>

						</div>

					</div>

				</div>

			</div>

		</section>

		<!--===Testimonials Section End===-->