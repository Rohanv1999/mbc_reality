        <!--===Footer Wrapper Start===-->

		<section class="footer-wrapper" id="footer-margin">

			<div class="container">

                <div class="footer-section">

					<div class="row">

						<div class="col-xl-4 col-md-6 col-12">

							<div class="footer-logo">

								<a href="<?=base_url();?>">

									<img width="217" height="42" src="<?=base_url();?>uploads/<?=front_common2()['main_logo2'][0]['main_logo2'];?>" class="img-fluid" alt="" />

								</a>

								<p><?=front_common2()['company_data'][0]['about_company'];?></p>

								<div class="footer-social-icon">

									<a href="<?=front_common2()['company_data'][0]['facebook'];?>"><i class="fab fa-facebook-f"></i></a>

									<a href="<?=front_common2()['company_data'][0]['instagram'];?>"><i class="fab fa-instagram"></i></a>

									<a href="<?=front_common2()['company_data'][0]['twitter'];?>"><i class="fab fa-twitter"></i></a>

									<a href="<?=front_common2()['company_data'][0]['linkedin'];?>"><i class="fab fa-linkedin-in"></i></a>

								</div>

							</div>

						</div>

						<div class="col-xl-4 col-md-6 col-12">

							<span><?php echo $this->lang->line('ltr_quick_links');?></span>

							<div class="footer-links">

								<ul>

									<li><a href="<?=base_url('about-us')?>"><?php echo $this->lang->line('ltr_about_us');?></a></li>

									<li><a href="<?=base_url('listings/for-sale')?>"><?php echo $this->lang->line('ltr_for_sale');?></a></li>

									<li><a href="<?=base_url('contact-us')?>"><?php echo $this->lang->line('ltr_contact');?></a></li>

								</ul>

								<ul>

									<li><a href="<?=base_url('contact-us')?>"><?php echo $this->lang->line('ltr_ask_us');?></a></li>

									<li><a href="<?=base_url('team')?>"><?php echo $this->lang->line('ltr_agents');?></a></li>

									<li><a href="<?=base_url('listings/for-rent')?>"><?php echo $this->lang->line('ltr_rentals');?></a></li>

								</ul>

							</div>

						</div>

						<div class="col-xl-4 col-md-6 col-12">

							<span class="footer_con_head"><?php echo $this->lang->line('ltr_contact_us');?></span>

							<div class="footer-contact">

								<ul>

									<li><div><img src="<?=base_url();?>assets/front_assets/images/footer-icon-1.png"></div><a href="#"></a><?=front_common2()['company_data'][0]['company_address'];?></li>

									<li><div><img src="<?=base_url();?>assets/front_assets/images/footer-icon-2.png"></div><a href="#"></a><?=front_common2()['company_data'][0]['company_phone'];?></li>

									<li><div><img src="<?=base_url();?>assets/front_assets/images/footer-icon-3.png"></div><a href="#"></a><?=front_common2()['company_data'][0]['contact_email'];?></li>

								</ul>

							</div>

						</div>

					</div>

				</div>

			</div>

		</section>

            
            <?php
                if(!isset($_SESSION['isMobileApp'])){
                    ?>
                     <div class="whatsapp" title="Start Chat In Whatsapp "><a href="https://api.whatsapp.com/send?phone=9109130808" target="_blank"><i class="fab fa-whatsapp"></i></a></div>
                    <?php
                }
            ?>
		   
	
		
		<!--===Footer Wrapper End===-->
		<!--===Copy Right Wrapper Start===-->
		<div class="copyright-wrapper">
			<p>© <?php echo $this->lang->line('ltr_all_rights_reserved');?></p>
		</div>
		<!--===Copy Right Wrapper End===-->
		<!-- Payment Gateway -->
		<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
		<!--=== Optional JavaScript ===-->
		<script src="<?=base_url();?>assets/front_assets/js/jquery-3.6.1.min.js"></script>
		<script src="<?=base_url();?>assets/front_assets/js/bootstrap.min.js"></script>
		<script src="<?=base_url();?>assets/front_assets/js/fontawesome.js"></script>
		<script src="<?=base_url();?>assets/front_assets/js/swiper-bundle.min.js"></script>
		<!-- custom js file -->
		<script src="<?=base_url();?>assets/front_assets/js/custom.js?<?php echo time();?>"></script>
		<!--=== Optional JavaScript ===-->
		<!--=== Google translator JavaScript ===-->
		<script type="text/javascript" src="<?=base_url();?>assets/front_assets/js/googleTranslate.js"></script>
		
		<!--=== Google translator JavaScript ===-->
		<!--select2-->
			<script type="text/javascript" src="<?=base_url();?>assets/front_assets/js/select2.full.js"></script>
			<script type="text/javascript" src="<?=base_url();?>assets/front_assets/js/select2.full.min.js"></script>
			<script type="text/javascript" src="<?=base_url();?>assets/front_assets/js/select2.js"></script>
			<script type="text/javascript" src="<?=base_url();?>assets/front_assets/js/select2.min.js"></script>
		<!-- custom ajax -->
		<script src="<?php echo base_url();?>assets/js/ajax.js"></script>

<!-- Include the SweetAlert JS file -->
		<script>
		    $(window).scroll(function(){
            var sticky = $('.header-section'),
            scroll = $(window).scrollTop();
          if (scroll >= 100) sticky.addClass('fixed');
          else sticky.removeClass('fixed');
        });
		</script>
		
		<script>
		    
        function notLoginAlert(){
            Swal.fire({
              title: "You are not login!",
              //text: "You are not login!",
              icon: "warning",
              showCancelButton: false,
              confirmButtonColor: "#f78720",
              confirmButtonText: "Login, first!",
              //cancelButtonText: "Cancel"
            }).then((result) => {
              if (result.isConfirmed) {
                // User confirmed action, do something here
                window.location.href = "<?=base_url();?>login";
              }
            //   else {
            //     window.location.href = "<?=base_url();?>login";
            //   }
            });
        }
        


		</script>
		
	</body>

</html>