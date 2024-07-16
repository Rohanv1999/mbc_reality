                <style>
                    .col-mod label {
                        font-size: 12px;
                    }
                    .input-mod {
                        position: relative;
                    }
                    .input-mod > .btn {
                        position: absolute;
                        right: 0;
                        top:0;
                        height: fit-content;
                        border-radius: 4px;
                    }
                    .col-modify {
                        margin-bottom: 20px;
                    }
                    </style>
                <!-- Container Start -->
                <div class="page-wrapper">
                    <div class="main-content">
                        <!-- Page Title Start -->
                        <div class="row">
                            <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-title-wrapper">
                                    <div class="page-title-box">
                                        <h4 class="page-title bold"><?php echo $this->lang->line('ltr_amenities');?></h4>
                                    </div>
                                    <div class="breadcrumb-list">
                                        <ul>
                                            <li class="breadcrumb-link">
                                                <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>
                                            </li>
                                            <li class="breadcrumb-link active"><?php echo $this->lang->line('ltr_add_amenities');?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="error"></div>
                        
                        <!-- Real Estate table Start -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card table-card">
                                    <div class="card-header pb-0">
                                        <h4><?php echo $this->lang->line('ltr_add_amenities');?></h4>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="chart-holder">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                        <form class="separate-form formget" method="POST" action="<?=base_url('admin/indoor_amenities');?>">
                                                            <input type="hidden" name="update_id" value="<?=(isset($update_indoor_amenities[0]['id']) && !empty($update_indoor_amenities[0]['id']))?$update_indoor_amenities[0]['id']:'';?>">
                                                            <div class="row">
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-modify">
                                                                    <div class="form-group">
                                                                        <label for="indoor" class="col-form-label"><?php echo $this->lang->line('ltr_indoor_amenities_name');?></label>
                                                                        <div class="input-mod"><input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_indoor_amenities_name');?>" id="indoor"name="indoor" value="<?=(isset($update_indoor_amenities[0]['indoor']) && !empty($update_indoor_amenities[0]['indoor']))?$update_indoor_amenities[0]['indoor']:'';?>"><input class="btn btn-primary" type="submit" name="submit"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                         <div class="action-btns" style="display:inline;">
                                                            <select name="change-idAmnity-stts" id="bulk-stts-ida">
                                                                <option value="active">Active</option>
                                                                <option value="inactive">Inactive</option>
                                                                <option value="delete">Delete</option>
                                                            </select>
                                                            
                                                            <a href="javascript:void(0);" class="btn btn-primary squer-btn mt-2 mr-2 mb-2" id="changeStatusIA">Apply</a>
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                        <form class="separate-form formget" method="POST" action="<?=base_url('admin/outdoor_amenities');?>">
                                                            <input type="hidden" name="update_id" value="<?=(isset($update_outdoor_amenities[0]['id']) && !empty($update_outdoor_amenities[0]['id']))?$update_outdoor_amenities[0]['id']:'';?>">
                                                            <div class="row">
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-modify">
                                                                    <div class="form-group">
                                                                        <label for="outdoor" class="col-form-label"><?php echo $this->lang->line('ltr_outdoor_amenities_name');?></label>
                                                                        <div class="input-mod"><input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_outdoor_amenities_name');?>" id="outdoor"name="outdoor" value="<?=(isset($update_outdoor_amenities[0]['outdoor']) && !empty($update_outdoor_amenities[0]['outdoor']))?$update_outdoor_amenities[0]['outdoor']:'';?>"><input class="btn btn-primary" type="submit" name="submit"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                         <div class="action-btns" style="display:inline;">
                                                            <select name="change-odAmnity-stts" id="bulk-stts-oda">
                                                                <option value="active">Active</option>
                                                                <option value="inactive">Inactive</option>
                                                                <option value="delete">Delete</option>
                                                            </select>
                                                            
                                                            <a href="javascript:void(0);" class="btn btn-primary squer-btn mt-2 mr-2 mb-2" id="changeStatusOA">Apply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-mod">
                                                        <table id="example" class="table table-striped table-bordered dt-responsive wrap data_table table-mod" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>#</th>
                                                                    <th><?php echo $this->lang->line('ltr_indoor_amenities_name');?></th>
                                                                    <th><?php echo $this->lang->line('ltr_status');?></th>
                                                                    <th><?php echo $this->lang->line('ltr_action');?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $i=1;
                                                            foreach($indoor_amenities_table as $listrow){
                                                            ?>
                                                                <tr>
                                                                     <td><input type="checkbox" name="idaIds" value="<?= $listrow['id'];?>"></td>
                                                                    <td><?=$i;?></td>
                                                                    <td><?=$listrow['indoor'];?></td>
                                                                    <td>
                                                                    <label class="switch">
                                                                    <input id="indoor_status<?=$listrow['id'];?>" class="switch_button" rowid="<?=$listrow['id'];?>" tables="px_addindooramenities" type="checkbox" <?php if(isset($listrow['status']) && $listrow['status']=="1") { echo "checked"; } ?>>
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
                                                                                        <a href="<?=base_url('admin/amenities')?>?iaid=<?=$listrow['id'];?>"><i class="far fa-edit mr-2 getid"></i><?php echo $this->lang->line('ltr_edit');?></a>
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
                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-mod">
                                                        <table id="example" class="table table-striped table-bordered dt-responsive wrap data_table" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>#</th>
                                                                    <th><?php echo $this->lang->line('ltr_outdoor_amenities_name');?></th>
                                                                    <th><?php echo $this->lang->line('ltr_status');?></th>
                                                                    <th><?php echo $this->lang->line('ltr_action');?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $i=1;
                                                            foreach($outdoor_amenities_table as $listrow){
                                                            ?>
                                                                <tr>
                                                                     <td><input type="checkbox" name="odaIds" value="<?= $listrow['id'];?>"></td>
                                                                    <td><?=$i;?></td>
                                                                    <td><?=$listrow['outdoor'];?></td>
                                                                    <td>
																	<label class="switch">
                                                                    <input id="outdoor_status<?=$listrow['id'];?>" class="switch_button" rowid="<?=$listrow['id'];?>" tables="px_addoutdooramenities" type="checkbox" <?php if(isset($listrow['status']) && $listrow['status']=="1") { echo "checked"; } ?>>
                                                                    <span class="slider round"></span>
                                                                    </label></td>
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
                                                                                        <a href="<?=base_url('admin/amenities')?>?oaid=<?=$listrow['id'];?>"><i class="far fa-edit mr-2 getid"></i><?php echo $this->lang->line('ltr_edit');?></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#model_<?=$listrow['id'];?>" ><i class="far fa-trash-alt mr-2 getid"></i><?php echo $this->lang->line('ltr_delete');?></a>
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
                            foreach($outdoor_amenities_table as $listrow){
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
										<button type="button" class="btn btn-primary deletes" d_id="<?=$listrow['id'];?>" tables="px_addoutdooramenities"><?php echo $this->lang->line('ltr_delete_yes_button');?></button>
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
						<?php
                            $i=1;
                            foreach($indoor_amenities_table as $listrow){
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
										<button type="button" class="btn btn-primary deletes" d_id="<?=$listrow['id'];?>" tables="px_addindooramenities"><?php echo $this->lang->line('ltr_delete_yes_button');?></button>
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
                        
                              <script>
                      
                           $('#changeStatusIA').on('click', function(){
                               
                               var idaIds = [];
                                $('input[name="idaIds"]:checked').each(function() {
                                  idaIds.push($(this).val());
                                });
                                if(idaIds.length > 0){
                                    if($('#bulk-stts-ida').val() =='delete'){
                                      $('#confirmOk').text('Yes, delete')
                                      $('#confirmModalMsg').text('Are you sure you want to deleted selected Indoor Amenities?')
                                    }
                                    else if($('#bulk-stts-ida').val() =='inactive'){  $('#confirmModalMsg').text('Are you sure you want to make selected Indoor Amenities Inactive ?')
                                     $('#confirmOk').text('Yes')
                                    }
                                    else{
                                        $('#confirmModalMsg').text('Are you sure you want to make selected Indoor Amenities Active ?')
                                         $('#confirmOk').text('Yes')
                                    }
                                    confirmDialog("Are You sure! You want to remove?", function (){
                                    
                                    $.ajax({
                                        url: "<?= base_url('Admin/changeIAStatus'); ?>",
                                        type: 'POST',
                                        data:{
                                            idaIds : idaIds,
                                            action : $('#bulk-stts-ida').val()
                                        },
                                        // dataType: 'JSON',
                                        success: function(data) {
                                            var data = JSON.parse(data)
                                            console.log(data.msg)
                                            
                                            
                                            if(data.status){
                                              showAlert(data.msg, 'success', $('#burl').val());
                                              
                                              setTimeout(() => {
                                                window.location.reload();
                                                }, 800);
                                            }
                                            else{
                                                 showAlert(data.msg, 'error', $('#burl').val());
                                            }
                                        }
                                    })
                                    
                                    })

                                }
                                else{
                                     showAlert('No Indoor Amenity selected.', 'error', $('#burl').val());
                                }
                                
                           })
                           
                             $('#changeStatusOA').on('click', function(){
                               
                               var odaIds = [];
                                $('input[name="odaIds"]:checked').each(function() {
                                  odaIds.push($(this).val());
                                });
                                if(odaIds.length > 0){
                                    if($('#bulk-stts-oda').val() =='delete'){
                                      $('#confirmOk').text('Yes, delete')
                                      $('#confirmModalMsg').text('Are you sure you want to deleted selected Outdoor Amenities?')
                                    }
                                    else if($('#bulk-stts-oda').val() =='inactive'){  $('#confirmModalMsg').text('Are you sure you want to make selected Outdoor Amenities Inactive ?')
                                     $('#confirmOk').text('Yes')
                                    }
                                    else{
                                        $('#confirmModalMsg').text('Are you sure you want to make selected Outdoor Amenities Active ?')
                                         $('#confirmOk').text('Yes')
                                    }
                                    confirmDialog("Are You sure! You want to remove?", function (){
                                    
                                    $.ajax({
                                        url: "<?= base_url('Admin/changeOAStatus'); ?>",
                                        type: 'POST',
                                        data:{
                                            odaIds : odaIds,
                                            action : $('#bulk-stts-oda').val()
                                        },
                                        // dataType: 'JSON',
                                        success: function(data) {
                                            var data = JSON.parse(data)
                                            console.log(data.msg)
                                            
                                            
                                            if(data.status){
                                              showAlert(data.msg, 'success', $('#burl').val());
                                              
                                              setTimeout(() => {
                                                window.location.reload();
                                                }, 800);
                                            }
                                            else{
                                                 showAlert(data.msg, 'error', $('#burl').val());
                                            }
                                        }
                                    })
                                    
                                    })

                                }
                                else{
                                     showAlert('No Outdoor Amenity selected.', 'error', $('#burl').val());
                                }
                                
                           })
                        </script>