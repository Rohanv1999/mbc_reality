                



                <!-- Container Start -->



        <div class="page-wrapper">



            <div class="main-content">



                <!-- Page Title Start -->



                <div class="row">



                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">



                        <div class="page-title-wrapper">



                            <div class="page-title-box">



                                <h4 class="page-title bold"><?php echo $this->lang->line('ltr_listing');?></h4>



                            </div>



                            <div class="breadcrumb-list">



                                <ul>



                                    <li class="breadcrumb-link">



                                        <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>



                                    </li>



                                    <li class="breadcrumb-link"><?php echo $this->lang->line('ltr_listing');?></li>



                                    <li class="breadcrumb-link active"><?php echo $this->lang->line('ltr_manage');?></li>



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
                                <!-- <h4><?php echo $this->lang->line('ltr_listing');?></h4> -->
                                <div class="error"></div>
                            </div>



                            <div class="card-body pb-4">
                                <div class="chart-holder">
                                <?php

                                if((!isset($list_remain) || $list_remain >0) && (!isset($days_remain) || $days_remain>0)){
                                
                                    if($_SESSION['user_type'] =='admin'){
                                ?>
                                <div class="form-group">
                                    <a href="<?=base_url('admin/add-property');?>" class="btn btn-primary squer-btn mt-2 mr-2 mb-2"><?php echo $this->lang->line('ltr_add_listings');?></a>
                                     <div class="action-btns" style="display:inline; ">
                                        <select name="change-user-stts" id="bulk-stts-chnge">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                             <option value="approve">Approve</option> 
                                             <option value="reject">Reject</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                        
                                        <a href="javascript:void(0);" class="btn btn-primary squer-btn mt-2 mr-2 mb-2" id="changeStatus">Apply</a>
                                    </div>
                                </div>

                                <?php }elseif($_SESSION['user_type']=='agent'){ ?>

                                <div class="form-group">

                                    <a href="<?=base_url('agent/add-property');?>" class="btn btn-primary squer-btn mt-2 mr-2 mb-2"><?php echo $this->lang->line('ltr_add_listings');?></a>
                                    
                                     <div class="action-btns" style="display:inline; ">
                                        <select name="change-user-stts" id="bulk-stts-chnge">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                        
                                        <a href="javascript:void(0);" class="btn btn-primary squer-btn mt-2 mr-2 mb-2" id="changeStatus">Apply</a>
                                    </div>




                                </div>



                                <?php
                                    }

                                }else{



                                ?>



                                    <a href="<?=base_url('/plans');?>" class="btn btn-danger mb-4"><?php echo $this->lang->line('ltr_package_error_text');?></a>



                                <?php



                                }



                                ?>
                                
                               <?php if($_SESSION['user_type'] =='user'){
                                if((isset($list_remain) && $list_remain == 0) || (isset($days_remain) && $days_remain == 0)){
                                ?>
                               
                                
                                <?php }
                                else{  ?>
 <div class="form-group">
                                    <a href="<?=base_url('user/add-property');?>" class="btn btn-primary squer-btn mt-2 mr-2 mb-2"><?php echo $this->lang->line('ltr_add_listings');?></a>  
<!--                                     
                                     <div class="action-btns" style="display:inline; ">
                                        <select name="change-user-stts" id="bulk-stts-chnge">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                        
                                        <a href="javascript:void(0);" class="btn btn-primary squer-btn mt-2 mr-2 mb-2" id="changeStatus">Apply</a>
                                    </div> -->
                                    
                                </div>

                               <?php  }
                                }?>



                                    <table id="example" class="table table-striped table-bordered dt-responsive wrap data_table" style="width:100%">



                                        <thead>



                                            <tr>

                                                <th></th>
                                                <th></th>
                                                <th>#</th>


                                                <th><?php echo $this->lang->line('ltr_property_name');?></th>
                                                
                                                <th><?php echo $this->lang->line('ltr_address');?></th>

                                                <th><?php echo $this->lang->line('ltr_agent');?>/User</th>


                                                <th><?php echo $this->lang->line('ltr_categories');?></th>



                                                <th>Approval</th>



                                                <?php if($_SESSION['user_type']=='admin'){?>



                                                <th><?php echo $this->lang->line('ltr_status');?></th>

                                                <?php }else{?>
                                                
                                                <th><?php echo $this->lang->line('ltr_status');?></th>

                                                <?php }?>

                                                <th><?php echo $this->lang->line('ltr_preview');?></th>



                                                <th><?php echo $this->lang->line('ltr_action');?></th>



                                            </tr>



                                        </thead>
                                               



                                        <tbody>



                                        <?php



                                        $i=1;
                                    

                                        foreach($property as $listrow){



                                        ?>



                                            <tr>
                                                <td></td>
                                                 <td><input type="checkbox" name="propIds" value="<?= $listrow['id'];?>"></td>

                                                <td><?=$i; ?></td>

                                                <td><?=$listrow['property_name'];?></td>

                                                <td><?=$listrow['address'];?></td>


                                                
                                                <td><?=  $listrow['uploaded_by']; ?></td>



                                                



                                                <td>



                                                    <span class="img-thumb">



                                                        <span class="ml-2"><?=loop_select('id',$listrow['propty_category'],'category','px_addcategory');?></span>



                                                    </span>



                                                </td>



                                                <td>
                                                <?php if($listrow['approve'] == 2){ $approval = 'Rejected';
                                                    $color ='danger';
                                                }
                                                else if($listrow['approve'] == 1){$approval = 'Approved';
                                                 $color ='success';}
                                                else{$approval = 'Pending';
                                                 $color ='secondary';}?>
                                                    <label class="mb-0 badge badge-<?= $color;?>" title="" data-original-title="Purpose"><?= $approval;?></label>

                                                </td>



                                                <?php if($_SESSION['user_type']=='admin'){  ?>

                                               

                                                <td>
                                            <?php    ?>
                                                    <label class="switch">

                                                   
                                                
                                                <?php if($listrow['approve']==2){ ?>
                                               <span class="text-danger">Reject</span>
                                                    <?php }else if($listrow['approve']==0){ ?>
                                                     <p class="text-danger">Pending</span>
                                                    
                                                    <?php }else{ ?>
                                                     <input id="properties_status<?=$listrow['id'];?>" class="switch_button" rowid="<?=$listrow['id'];?>" tables="px_properties" type="checkbox" <?php if(isset($listrow['activation']) && $listrow['activation']=="1") { echo "checked"; } ?>>
                                                    <span class="slider round"></span>
                                                    <?php } ?>

                                                    </label>

                                                </td>



                                                <?php }else{ ?>
                                                
                                                <td>

                                                    <?php if(isset($listrow['activation']) && $listrow['activation']=="1") { echo '<label class="mb-0 badge badge-info">Active</label>'; }else{ echo '<label class="mb-0 badge badge-danger"> Inactive</label>'; } ?>

                                                </td>

                                                <?php } ?>

                                                <td>



                                                    <a href="<?=base_url();?>listing/<?=$listrow['id'];?>-<?=str_replace(",","-",$listrow['url_sluge']);?>"><label class="mb-0 badge badge-success" title="" data-original-title=""><?php echo $this->lang->line('ltr_view_details');?></label></a>



                                                </td>



                                                <td class="">

                                                <?php if(($listrow['uploaded_by']=='admin' && $_SESSION['user_type']=='admin') || ($listrow['uploaded_by']=='agent') || ($listrow['uploaded_by']=='user')){ ?>

                                                    <div class="relative">



                                                        <a class="action-btn" href="javascript:void(0); ">



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

                            <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] =='admin' ){ ?>

                                                                <li>


                                                      
                                                                    <a href="<?=base_url($dashboard.'/add-property')?>?pid=<?=$listrow['id'];?>"><i class="far fa-edit mr-2 getid"></i><?php echo $this->lang->line('ltr_edit');?></a>
                                                                </li>
                                                                  <?php }else if($_SESSION['user_type'] =='user'){    ?>
                                                                  
                                                                <li>
                                                                    <a href="<?=base_url('user/add-property')?>?pid=<?=$listrow['id'];?>"><i class="far fa-edit mr-2 getid"></i><?php echo $this->lang->line('ltr_edit');?></a>
                                                                </li>
                                                <?php } ?>




                                                                <li>



                                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#model_<?=$listrow['id'];?>"><i class="far fa-trash-alt mr-2 getid"></i><?php echo $this->lang->line('ltr_delete');?></a>



                                                                </li>



                                                            </ul>



                                                        </div>



                                                    </div>

                                                <?php }else{ ?>
                                                
                                                    <p><?php echo $this->lang->line('ltr_admin_upload');?></p>
                                                
                                                <?php } ?>

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
                    foreach($property as $listrow){
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
                                <button type="button" class="btn btn-primary deletes" d_id="<?=$listrow['id'];?>" tables="px_properties"><?php echo $this->lang->line('ltr_delete_yes_button');?></button>
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
                               
                               var propIds = [];
                                $('input[name="propIds"]:checked').each(function() {
                                  propIds.push($(this).val());
                                });
                                if(propIds.length > 0){
                                    if($('#bulk-stts-chnge').val() =='delete'){
                                      $('#confirmOk').text('Yes, delete')
                                      $('#confirmModalMsg').text('Are you sure you want to deleted selected Properties?')
                                    }
                                    else if($('#bulk-stts-chnge').val() =='inactive'){  $('#confirmModalMsg').text('Are you sure you want to make selected Properties Inactive ?')
                                     $('#confirmOk').text('Yes')
                                    }
                                    else{
                                        $('#confirmModalMsg').text('Are you sure you want to make selected Properties Active ?')
                                         $('#confirmOk').text('Yes')
                                    }
                                    confirmDialog("Are You sure! You want to remove?", function (){
                                    
                                    $.ajax({
                                        url: "<?= ($_SESSION['user_type']=='admin')? base_url('Admin/changePropertyStatus'):base_url('Agent/changePropertyStatus') ; ?>",
                                        type: 'POST',
                                        data:{
                                            propIds : propIds,
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
                                     showAlert('No Property selected.', 'error', $('#burl').val());
                                }
                                
                                
                           })
                        </script>