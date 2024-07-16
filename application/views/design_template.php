                
                <!-- Container Start -->
                <div class="page-wrapper">
                    <div class="main-content">
                        <!-- Page Title Start -->
                        <div class="row">
                            <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-title-wrapper">
                                    <div class="page-title-box">
                                        <h4 class="page-title bold"><?php echo $this->lang->line('ltr_design');?></h4>
                                    </div>
                                    <div class="breadcrumb-list">
                                        <ul>
                                            <li class="breadcrumb-link">
                                                <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>
                                            </li>
                                            <li class="breadcrumb-link active"><?php echo $this->lang->line('ltr_design');?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Main logo Start -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card table-card">
                                    <div class="card-header pb-0">
                                        <div class="error"></div>
                                        <h4><?php echo $this->lang->line('ltr_add_main_logos');?></h4>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="chart-holder">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">   
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <form class="separate-form formget" method="POST" action="<?=base_url('admin/add_main_logo');?>">
                                                            <div class="row align-items-center">
                                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="main_logo1" class="col-form-label"><?php echo $this->lang->line('ltr_light_bg_logo');?></label>
																		<div class="square logo-upload">
																			<img class="normal-pic image1" src="<?=base_url().'assets/front_assets/images/No_Image_Available.jpg';?>">
																			<input class="file-upload1" id="main_logo1" name="main_logo1" type="file" accept="image/*"/>
																			<div id="hover1" class="hover-image">
																				<img src="<?=base_url();?>assets/images/fileupload.png" >
																			</div>
																		</div>
																	</div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="main_logo2" class="col-form-label"><?php echo $this->lang->line('ltr_dark_bg_logo');?></label>
																		<div class="square logo-upload">
																			<img class="normal-pic image2" src="<?=base_url().'assets/front_assets/images/No_Image_Available.jpg';?>">
																			<input class="file-upload1" id="main_logo2" name="main_logo2" type="file" accept="image/*"/>
																			<div id="hover2" class="hover-image">
																				<img src="<?=base_url();?>assets/images/fileupload.png" >
																			</div>
																		</div>
																	</div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-0 mt-3">
                                                                <input class="btn btn-primary" type="submit" name="submit">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section data Start -->
                        <?php
                        if(isset($_GET['section_id'])){
                        ?>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card table-card">
                                    <div class="card-header pb-0">
                                        <h4><?php echo $this->lang->line('ltr_edit_section_data');?></h4>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="chart-holder">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <form class="separate-form formget" method="POST" action="<?=base_url('admin/section_data');?>">
                                                            <input type="hidden" name="sectionid" value="<?=(isset($edit_data[0]['id']) && !empty($edit_data[0]['id']))?$edit_data[0]['id']:'';?>">
                                                            <div class="row">
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="main_heading" class="col-form-label"><?php echo $this->lang->line('ltr_section_heading');?></label>
                                                                        <input class="form-control" type="text" placeholder="Section heading" id="main_heading"name="main_heading" value="<?=(isset($edit_data[0]['main_heading']) && !empty($edit_data[0]['main_heading']))?$edit_data[0]['main_heading']:'';?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="main_content" class="col-form-label"><?php echo $this->lang->line('ltr_section_content');?></label>
                                                                        <textarea class="ckeditor ck-editor__editable reset form-control" placeholder="Section content" id="main_content" name="main_content" value="" rows="5"><?=(isset($edit_data[0]['main_content']) && !empty($edit_data[0]['main_content']))?$edit_data[0]['main_content']:'';?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <input class="btn btn-primary" type="submit" name="submit">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }else if(isset($_GET['aboutus_id'])){
                        ?>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card table-card">
                                    <div class="card-header pb-0">
                                        <h4><?php echo $this->lang->line('ltr_edit_aboutus_images');?></h4>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="chart-holder">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <form class="separate-form formget" method="POST" action="<?=base_url('admin/aboutus_data');?>">
                                                            <input type="hidden" name="aboutusid" value="<?=(isset($edit_data[0]['id']) && !empty($edit_data[0]['id']))?$edit_data[0]['id']:'';?>">
                                                            <div class="row">
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="aboutus_heading" class="col-form-label"><?php echo $this->lang->line('ltr_image_heading');?></label>
                                                                        <input class="form-control" type="text" placeholder="About us heading" id="aboutus_heading"name="aboutus_heading" value="<?=(isset($edit_data[0]['aboutus_heading']) && !empty($edit_data[0]['aboutus_heading']))?$edit_data[0]['aboutus_heading']:'';?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="images" class="col-form-label"><?php echo $this->lang->line('ltr_image');?></label>
																		<div class="square">
																			<img class="normal-pic image" src="<?=(isset($edit_data[0]['aboutus_image']) && !empty($edit_data[0]['aboutus_image']))?base_url().'uploads/'.$edit_data[0]['aboutus_image']:base_url().'assets/front_assets/images/No_Image_Available.jpg';?>">
																			<input class="file-upload" id="aboutus_image" name="aboutus_image" type="file" accept="image/*"/>
																			<div class="hover-image">
																				<img src="<?=base_url();?>assets/images/fileupload.png" >
																			</div>
																		</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <input class="btn btn-primary" type="submit" name="submit">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>

                        <!-- Section data Start -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card table-card">
                                    <div class="card-header pb-0">
                                        <h4><?php echo $this->lang->line('ltr_section_data');?></h4>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="chart-holder">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <table id="example" class="table table-striped table-bordered dt-responsive wrap data_table" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th><?php echo $this->lang->line('ltr_section_name');?></th>
                                                                    <th><?php echo $this->lang->line('ltr_section_heading');?></th>
                                                                    <th><?php echo $this->lang->line('ltr_section_content');?></th>
                                                                    <th><?php echo $this->lang->line('ltr_action');?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $i=1;
                                                            foreach($section as $listrow){
                                                            ?>
                                                                <tr>
                                                                    <td><?=$i;?></td>
                                                                    <td><?=$listrow['section_name'];?></td>
                                                                    <td><?=$listrow['main_heading'];?></td>
                                                                    <td><?=$listrow['main_content'];?></td>
                                                                    <td class="">
                                                                        <div class="relative">
                                                                            <a class="action-btn " href="javascript:void(0); ">
                                                                                <svg class="default-size "  viewBox="0 0 341.333 341.333 ">
                                                                                    <g>
                                                                                        <g>
                                                                                            <g>
                                                                                                <path d="M170.667,85.333c23.573,0,42.667-19.093,42.667-42.667C213.333,19.093,194.24,0,170.667,0S128,19.093,128,42.667 C128,66.24,147.093,85.333,170.667,85.333z "></path>
                                                                                                <path d="M170.667,128C147.093,128,128,147.093,128,170.667s19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 S194.24,128,170.667,128z "></path>
                                                                                                <path d="M170.667,256C147.093,256,128,275.093,128,298.667c0,23.573,19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 C213.333,275.093,194.24,256,170.667,256z "></path>
                                                                                            </g>
                                                                                        </g>
                                                                                    </g>
                                                                                </svg>
                                                                            </a>
                                                                            <div class="action-option ">
                                                                                <ul>
                                                                                    <li>
                                                                                        <a href="<?=base_url('admin/design')?>?section_id=<?=$listrow['id'];?>"><i class="far fa-edit mr-2 getid"></i><?php echo $this->lang->line('ltr_edit');?></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            $i++;
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<!-- Section data Start -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card table-card">
                                    <div class="card-header pb-0">
                                        <h4><?php echo $this->lang->line('ltr_aboutus_images');?></h4>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="chart-holder">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <table id="example" class="table table-striped table-bordered dt-responsive wrap data_table" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th><?php echo $this->lang->line('ltr_image');?></th>
                                                                    <th><?php echo $this->lang->line('ltr_image_heading');?></th>
                                                                    <th><?php echo $this->lang->line('ltr_action');?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $i=1;
                                                            foreach($aboutus as $listrow){
                                                            ?>
                                                                <tr>
                                                                    <td><?=$i;?></td>
                                                                    <td><span class="img-thumb "><img width="93" height="93" src="<?=base_url().'uploads/'.$listrow['aboutus_image'];?>" alt=" "></span></td>
                                                                    <td><?=$listrow['aboutus_heading'];?></td>
                                                                    <td class="">
                                                                        <div class="relative">
                                                                            <a class="action-btn " href="javascript:void(0); ">
                                                                                <svg class="default-size "  viewBox="0 0 341.333 341.333 ">
                                                                                    <g>
                                                                                        <g>
                                                                                            <g>
                                                                                                <path d="M170.667,85.333c23.573,0,42.667-19.093,42.667-42.667C213.333,19.093,194.24,0,170.667,0S128,19.093,128,42.667 C128,66.24,147.093,85.333,170.667,85.333z "></path>
                                                                                                <path d="M170.667,128C147.093,128,128,147.093,128,170.667s19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 S194.24,128,170.667,128z "></path>
                                                                                                <path d="M170.667,256C147.093,256,128,275.093,128,298.667c0,23.573,19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 C213.333,275.093,194.24,256,170.667,256z "></path>
                                                                                            </g>
                                                                                        </g>
                                                                                    </g>
                                                                                </svg>
                                                                            </a>
                                                                            <div class="action-option ">
                                                                                <ul>
                                                                                    <li>
                                                                                        <a href="<?=base_url('admin/design')?>?aboutus_id=<?=$listrow['id'];?>"><i class="far fa-edit mr-2 getid"></i><?php echo $this->lang->line('ltr_edit');?></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            $i++;
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>