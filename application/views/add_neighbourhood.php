                
                <!-- Container Start -->
                <div class="page-wrapper">
                    <div class="main-content">
                        <!-- Page Title Start -->
                        <div class="row">
                            <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-title-wrapper">
                                    <div class="page-title-box">
                                        <h4 class="page-title bold"><?php echo $this->lang->line('ltr_neighbourhood');?></h4>
                                    </div>
                                    <div class="breadcrumb-list">
                                        <ul>
                                            <li class="breadcrumb-link">
                                                <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>
                                            </li>
                                            <li class="breadcrumb-link active"><?php echo $this->lang->line('ltr_add_neighbourhood');?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Real Estate table Start -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card table-card">
                                    <div class="card-header pb-0">
                                        <h4><?php echo $this->lang->line('ltr_add_neighbourhood');?></h4>
										<div class="error"></div>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="chart-holder">
                                            <form class="separate-form formget" method="POST" action="<?=base_url('admin/addneighbourhood');?>">
                                                <input type="hidden" name="update_id" value="<?=(isset($update_neighbourhood[0]['id']) && !empty($update_neighbourhood[0]['id']))?$update_neighbourhood[0]['id']:'';?>">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="row">
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="neighbourhood" class="col-form-label"><?php echo $this->lang->line('ltr_neighbourhood_name');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_neighbourhood_name');?>" id="neighbourhood"name="neighbourhood" value="<?=(isset($update_neighbourhood[0]['neighbourhood']) && !empty($update_neighbourhood[0]['neighbourhood']))?$update_neighbourhood[0]['neighbourhood']:'';?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="btn btn-primary" type="submit" name="submit">
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="action-btns" style="display:inline; ">
                                                    <select id="bulk-stts-chnge">
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                        <option value="delete">Delete</option>
                                                    </select>
                                                    
                                                    <a href="javascript:void(0);" class="btn btn-primary squer-btn mt-2 mr-2 mb-2" id="changeStatus">Apply</a>
                                                </div>
                                            <table id="example" class="table table-striped table-bordered dt-responsive wrap data_table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>#</th>
                                                        <th><?php echo $this->lang->line('ltr_neighbourhood_name');?></th>
                                                        <th><?php echo $this->lang->line('ltr_status');?></th>
                                                        <th><?php echo $this->lang->line('ltr_action');?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $i=1;
                                                foreach($neighbourhood_table as $listrow){
                                                ?>
                                                    <tr>
                                                        <td><input type="checkbox" class="selectUser" name="nbrIds" value="<?= $listrow['id'];?>"></td>
                                                        <td><?=$i;?></td>
                                                        <td><?=$listrow['neighbourhood'];?></td>
                                                        <td>
														<label class="switch">
                                                        <input id="neighbour_status<?=$listrow['id'];?>" class="switch_button" rowid="<?=$listrow['id'];?>" tables="px_addneighbourhood" type="checkbox" <?php if(isset($listrow['status']) && $listrow['status']=="1") { echo "checked"; } ?>>
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
                                                                            <a href="<?=base_url('admin/neighbourhood')?>?nid=<?=$listrow['id'];?>"><i class="far fa-edit mr-2 getid"></i><?php echo $this->lang->line('ltr_edit');?></a>
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
                        <?php
                            $i=1;
                            foreach($neighbourhood_table as $listrow){
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
										<button type="button" class="btn btn-primary deletes" d_id="<?=$listrow['id'];?>" tables="px_addneighbourhood"><?php echo $this->lang->line('ltr_delete_yes_button');?></button>
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
                      
                           $('#changeStatus').on('click', function(){
                               
                               var nbrIds = [];
                                $('input[name="nbrIds"]:checked').each(function() {
                                  nbrIds.push($(this).val());
                                });
                                if(nbrIds.length > 0){
                                    if($('#bulk-stts-chnge').val() =='delete'){
                                      $('#confirmOk').text('Yes, delete')
                                      $('#confirmModalMsg').text('Are you sure you want to deleted selected Neighbouhoods?')
                                    }
                                    else if($('#bulk-stts-chnge').val() =='inactive'){  $('#confirmModalMsg').text('Are you sure you want to make selected Neighbouhoods Inactive ?')
                                     $('#confirmOk').text('Yes')
                                    }
                                    else{
                                        $('#confirmModalMsg').text('Are you sure you want to make selected Neighbouhoods Active ?')
                                         $('#confirmOk').text('Yes')
                                    }
                                    confirmDialog("Are You sure! You want to remove?", function (){
                                    
                                    $.ajax({
                                        url: "<?= base_url('Admin/changeNbrStatus'); ?>",
                                        type: 'POST',
                                        data:{
                                            nbrIds : nbrIds,
                                            action : $('#bulk-stts-chnge').val()
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
                                     showAlert('No Neighbourhood selected.', 'error', $('#burl').val());
                                }
                                
                           })
                        </script>