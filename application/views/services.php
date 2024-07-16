<!-- Container Start -->
                <div class="page-wrapper">
                    <div class="main-content">
                        <!-- Page Title Start -->
                        <div class="row">
                            <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-title-wrapper">
                                    <div class="page-title-box">
                                        <h4 class="page-title bold"><?php echo $this->lang->line('ltr_services');?></h4>
                                    </div>
                                    <div class="breadcrumb-list">
                                        <ul>
                                            <li class="breadcrumb-link">
                                                <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>
                                            </li>
                                            <li class="breadcrumb-link active"><?php echo $this->lang->line('ltr_services');?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Services data Start -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card table-card">
                                    <div class="card-header pb-0">
                                        <h4><?php echo $this->lang->line('ltr_addservice_data');?></h4>
                                        <div class="error"></div>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="chart-holder">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <form class="separate-form formget" method="POST" action="<?=base_url('admin/service-data');?>">
                                                            <input type="hidden" name="servicesid" value="<?=(isset($service_data[0]['id']) && !empty($service_data[0]['id']))?$service_data[0]['id']:'';?>">
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="heading" class="col-form-label"><?php echo $this->lang->line('ltr_service_heading');?></label>
                                                                        <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_service_heading');?>" id="heading"name="heading" value="<?=(isset($service_data[0]['heading']) && !empty($service_data[0]['heading']))?$service_data[0]['heading']:'';?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="logo" class="col-form-label"><?php echo $this->lang->line('ltr_service_logo');?></label>
																		<div class="square">
																			<img class="normal-pic image" src="<?=(isset($service_data[0]['logo']) && !empty($service_data[0]['logo']))?base_url().'uploads/'.$service_data[0]['logo']:base_url().'assets/front_assets/images/No_Image_Available.jpg';?>">
																			<input class="file-upload" id="logo" name="logo" type="file" accept="image/*"/>
																			<div class="hover-image">
																				<img src="<?=base_url();?>assets/images/fileupload.png" >
																			</div>
																		</div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="content" class="col-form-label"><?php echo $this->lang->line('ltr_service_content');?></label>
                                                                        <textarea class="form-control" placeholder="<?php echo $this->lang->line('ltr_service_content');?>" id="content"name="content" value="" rows="5"><?=(isset($service_data[0]['content']) && !empty($service_data[0]['content']))?$service_data[0]['content']:'';?></textarea>
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

                        <!-- Services data Start -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card table-card">
                                    <div class="card-header pb-0">
                                        <h4><?php echo $this->lang->line('ltr_services');?></h4>
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
                                                                    <th><?php echo $this->lang->line('ltr_service_logo');?></th>
                                                                    <th><?php echo $this->lang->line('ltr_service_heading');?></th>
                                                                    <th><?php echo $this->lang->line('ltr_status');?></th>
                                                                    <th><?php echo $this->lang->line('ltr_action');?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $i=1;
                                                            foreach($service as $listrow){
                                                            ?>
                                                                <tr>
                                                                    <td><?=$i;?></td>
                                                                    <td><img width="50" height="50" src="<?=base_url();?>uploads/<?=$listrow['logo'];?>"></td>
                                                                    <td><?=$listrow['heading'];?></td>
                                                                    <td>
																	<label class="switch">
																	<input id="service_status<?=$listrow['id'];?>" class="switch_button" rowid="<?=$listrow['id'];?>" tables="px_services" type="checkbox" <?php if(isset($listrow['status']) && $listrow['status']=="1") { echo "checked"; } ?>>
																	<span class="slider round"></span>
																	</label>
																	</td>
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
                                                                                        <a href="<?=base_url('admin/services')?>?service_id=<?=$listrow['id'];?>"><i class="far fa-edit mr-2 getid"></i><?php echo $this->lang->line('ltr_edit');?></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#model_<?=$listrow['id'];?>"><i class="far fa-trash-alt mr-2 getid"></i><?php echo $this->lang->line('ltr_delete');?></a>
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
                        <?php
                            $i=1;
                            foreach($service as $listrow){
                        ?>
						<!-- Model 3 -->
						<div class="modal fade" id="model_<?=$listrow['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 378.303 378.303" xml:space="preserve"><polygon points="378.303,28.285 350.018,0 189.151,160.867 28.285,0 0,28.285 160.867,189.151 0,350.018 28.285,378.302 189.151,217.436 350.018,378.302 378.303,350.018 217.436,189.151 "/></svg>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<h4><?php echo $this->lang->line('ltr_sure_delete_heading');?></h4>
										<p><?php echo $this->lang->line('ltr_delete_conform_message');?></p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary deletes" d_id="<?=$listrow['id'];?>" tables="px_services"><?php echo $this->lang->line('ltr_delete_yes_button');?></button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('ltr_delete_cancel_button');?></button>
									</div>
								</div>
							</div>
						</div>
						<!-- Model 3 -->
                        <?php
                            $i++;
                            }
                        ?>