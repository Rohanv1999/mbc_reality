                
                <!-- Container Start -->
                <div class="page-wrapper">
                    <div class="main-content">
                        <!-- Page Title Start -->
                        <div class="row">
                            <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-title-wrapper">
                                    <div class="page-title-box">
                                        <h4 class="page-title bold"><?php echo $this->lang->line('ltr_inquiries');?></h4>
                                    </div>
                                     
                                    <div class="breadcrumb-list">
                                        <ul>
                                            <li class="breadcrumb-link">
                                                <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>
                                            </li>
                                            <li class="breadcrumb-link active"><?php echo $this->lang->line('ltr_inquiries');?></li>
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
                                        <h4><?php echo $this->lang->line('ltr_inquiries');?></h4>
                                    </div>
                                    <div class="card-body pb-4">
                                       <div class="action-btns" style="display:inline; ">
                                                <select name="change-landmark-stts" id="bulk-stts-chnge">
                                                    <option value="0" disabled>Select</option>
                                                  
                                                    <option value="delete">Delete</option>
                                                </select>
                                                
                                                <a href="javascript:void(0);" class="btn btn-primary squer-btn mt-2 mr-2 mb-2" id="changeStatus">Apply</a>
                                            </div>
                                        <div class="chart-holder">
                                            <table id="example" class="table table-striped table-bordered dt-responsive wrap data_table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>#</th>
                                                        <th><?php echo $this->lang->line('ltr_date');?></th>
                                                        <th><?php echo $this->lang->line('ltr_email');?></th>
                                                        <th><?php echo $this->lang->line('ltr_message');?></th>
                                                        <th><?php echo $this->lang->line('ltr_phone_number');?></th>
                                                        <?php if(!isset($type) || $type != 'messages'):?>
                                                            <th><?php echo $this->lang->line('ltr_listing');?></th>
                                                        <?php endif;?>
                                                        <th><?php echo $this->lang->line('ltr_action');?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $i=1;
                                                foreach($inquiry as $listrow){
                                                ?>
                                                    <tr>
                                                        <td><input type="checkbox"  name="inqIds" value="<?= $listrow['id'];?>"></td>
                                                        <td><?=$i;?></td>
                                                        <td><?=$listrow['add_date'];?></td>
                                                        <td><?=$listrow['uemail'];?></td>
                                                        <td><?=$listrow['message'];?></td>
                                                        <td><?=$listrow['uphone'];?></td>
                                                        
                                                        <?php if(!isset($type) || $type != 'messages'):?>
                                                        
                                                        <td> <a href="<?= base_url(); ?>listing/<?= $listrow['property_id']; ?>-<?= str_replace(",", "-", $listrow['url_sluge']); ?>">
                                                            <?=loop_select('id',$listrow['property_id'],'property_name','px_properties');?></td>
                                                            <?php endif;?>
                                                        
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
                                                                     <?php
                                                                        if(isset($_SESSION['ismobile'])){?>
                                                                        <li>
                                                                            <a href="<?= base_url('admin/getUrl/'.$listrow['uemail']) ?>"><i class="far fa-edit mr-2"></i><?php echo $this->lang->line('ltr_reply');?></a>
                                                                        </li>
                                                                        <?php }else{ ?>
                                                                         <li>
                                                                            <a href="mailto:<?=$listrow['uemail'];?>"><i class="far fa-edit mr-2"></i><?php echo $this->lang->line('ltr_reply');?></a>
                                                                        </li>
                                                                        <?php } ?>
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
                            foreach($inquiry as $listrow){
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
										<button type="button" class="btn btn-primary deletes" d_id="<?=$listrow['id'];?>" tables="px_inquires"><?php echo $this->lang->line('ltr_delete_yes_button');?></button>
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
                               
                               var inqIds = [];
                                $('input[name="inqIds"]:checked').each(function() {
                                  inqIds.push($(this).val());
                                });
                                if(inqIds.length > 0){
                                    if($('#bulk-stts-chnge').val() =='delete'){
                                      $('#confirmOk').text('Yes, delete')
                                      $('#confirmModalMsg').text('Are you sure you want to deleted Landmarks?')
                                    }
                                   
                                    confirmDialog("Are You sure! You want to remove?", function (){
                                    
                                    $.ajax({
                                        url: "<?= base_url('Admin/deleteInquiry'); ?>",
                                        type: 'POST',
                                        data:{
                                            inqIds : inqIds,
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
                                     showAlert('No Inquirey selected.', 'error', $('#burl').val());
                                }
                            
                           })
                        </script>