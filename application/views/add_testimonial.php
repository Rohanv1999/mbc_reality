                
                <!-- Container Start -->
                <div class="page-wrapper">
                    <div class="main-content">
                        <!-- Page Title Start -->
                        <div class="row">
                            <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-title-wrapper">
                                    <div class="page-title-box">
                                        <h4 class="page-title bold"><?php echo $this->lang->line('ltr_testimonials');?></h4>
                                    </div>
                                    <div class="breadcrumb-list">
                                        <ul>
                                            <li class="breadcrumb-link">
                                                <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>
                                            </li>
                                            <li class="breadcrumb-link active"><?php echo $this->lang->line('ltr_testimonials');?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Real Estate table Start -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card chart-card">
                                    <div class="card-header">
                                        <h4><?php echo $this->lang->line('ltr_testimonials');?></h4>
										<div class="error"></div>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="card-content">
                                            <form class="separate-form formget" method="POST" action="<?=base_url('admin/add-testimonial');?>">
                                                <input type="hidden" name="update_id" value="<?=(isset($testimonial[0]['id']) && !empty($testimonial[0]['id']))?$testimonial[0]['id']:'';?>">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="client_name" class="col-form-label"><?php echo $this->lang->line('ltr_client_name');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_client_name');?>" id="client_name"name="client_name" value="<?=(isset($testimonial[0]['client_name']) && !empty($testimonial[0]['client_name']))?$testimonial[0]['client_name']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="post" class="col-form-label"><?php echo $this->lang->line('ltr_client_designation');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_client_designation');?>" id="post" name="post" value="<?=(isset($testimonial[0]['post']) && !empty($testimonial[0]['post']))?$testimonial[0]['post']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="client_image" class="col-form-label"><?php echo $this->lang->line('ltr_client_image');?></label>
																<div class="square">
																	<img class="normal-pic image" src="<?=(isset($testimonial[0]['client_image']) && !empty($testimonial[0]['client_image']))?base_url().'uploads/'.$testimonial[0]['client_image']:base_url().'assets/front_assets/images/No_Image_Available.jpg';?>">
																	<input class="file-upload" id="client_image" name="client_image" type="file" accept="image/*"/>
																	<div class="hover-image">
																		<img src="<?=base_url();?>assets/images/fileupload.png" >
																	</div>
																</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="testimonial" class="col-form-label"><?php echo $this->lang->line('ltr_client_say');?></label>
                                                                <textarea class="form-control" rows="5" placeholder="<?php echo $this->lang->line('ltr_client_say');?>" id="testimonial" name="testimonial"><?=(isset($testimonial[0]['testimonial']) && !empty($testimonial[0]['testimonial']))?$testimonial[0]['testimonial']:'';?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <input class="btn btn-primary" type="submit" name="submit">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>