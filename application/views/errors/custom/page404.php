<!DOCTYPE html>
<html lang="en">
	<!-- Begin Head -->
	<head>
		<!--=== Required meta tags ===-->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--=== custom css ===-->
		<link rel="shortcut icon" type="image/ico" href="<?=base_url();?>uploads/<?=front_common1()['main_logo1'][0]['main_logo1'];?>" />
		<link rel="stylesheet" href="<?=base_url();?>assets/front_assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url();?>assets/front_assets/css/swiper-bundle.min.css">
		<link rel="stylesheet" href="<?=base_url();?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url();?>assets/front_assets/css/style.css">
		<link rel="stylesheet" href="<?=base_url();?>assets/front_assets/css/responsive.css">
		<!-- country code for tel css-->
		<link rel="stylesheet" href="<?=base_url();?>assets/css/intlTelInput.css" />
		<!--=== custom css ===-->
		<title><?=front_common1()['company_data'][0]['website_title'];?></title>
	</head>
	<body>
		<div class="rs_page404">
			<div class="container">
				<div class="rs_page404_content">
					<div class="larg_text">
						<img width="50%" src="<?=base_url();?>assets/front_assets/images/404.png" class="img-fluid" alt="">
					</div>
					<p><?php echo $this->lang->line('ltr_404text1');?><br><?php echo $this->lang->line('ltr_404text2');?></p>

					<a href="<?=base_url();?>" class="btn"><?php echo $this->lang->line('ltr_back_to_home');?></a>
				</div>
			</div>
			
		</div>
	</body>
</html>