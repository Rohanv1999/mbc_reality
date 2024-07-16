		<!--===Page Heading Start===-->

		<section class="page-heading">
			<h1><?php echo $this->lang->line('ltr_contact_us');?></h1>
			<a href="<?=base_url();?>"><?php echo $this->lang->line('ltr_home');?></a><span>&nbsp; // <?php echo $this->lang->line('ltr_contact_us');?></span>
		</section>
		<div class="error"></div>

		<!--===Page Heading End===-->

		<!--===Property Overview Start===-->

		<section class="property-overview">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="overview-card">
							<div class="row">
							<div class="col-lg-4 col-12">
								<div class="overview-contact-card">
									<div class="overview-heading">
										<h5><?php echo $this->lang->line('ltr_get_in_touch');?></h5>
									</div>
									<div class="overview-text">
										<p><?php echo $this->lang->line('ltr_fill_contact_form_call');?></p>
									</div>
									<div class="footer-contact">
										<ul>
											<li><div>
												<img src="<?=base_url();?>assets/front_assets/images/footer-icon-1.png"></div>
												<a href="#"></a><?=front_common1()['company_data'][0]['company_address'];?>
											</li>

											<li><div>
												<img src="<?=base_url();?>assets/front_assets/images/footer-icon-2.png"></div>
												<a href="#"></a><?=front_common1()['company_data'][0]['company_phone'];?>
											</li>
											<li><div>
												<img src="<?=base_url();?>assets/front_assets/images/footer-icon-3.png"></div>
												<a href="#"></a><?=front_common1()['company_data'][0]['contact_email'];?>
											</li>
										</ul>
									</div>
									<div class="footer-social-icon">
										<a href="<?=front_common1()['company_data'][0]['facebook'];?>"><i class="fab fa-facebook-f"></i></a>
										<a href="<?=front_common1()['company_data'][0]['instagram'];?>"><i class="fab fa-instagram"></i></a>
										<a href="<?=front_common1()['company_data'][0]['twitter'];?>"><i class="fab fa-twitter"></i></a>
										<a href="<?=front_common1()['company_data'][0]['linkedin'];?>"><i class="fab fa-linkedin-in"></i></a>
									</div>
								</div>
							</div>

							<div class="col-lg-8 col-12">
							<div class="overview-text">
								<form class="contact-form formget" method="post" action="<?=base_url('add-query');?>">

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
                                            <input type="hidden" value="<?php if(isset($_SESSION['user_type'])) echo $_SESSION['user_type'];?>" id="sessionuser">
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
						</div>
						<div class="error"></div>
					</div>
				</div>
			</div>

			<div class="contact-map">
				<iframe id="map" style="width: 100%; height: 500px;" src="https://maps.google.com/maps?&amp;q=<?php echo urlencode($ccords[0]['company_coord']);?>&amp;output=embed" ></iframe>
			</div>

		</section>

		<!--===Property Overview End===-->

				