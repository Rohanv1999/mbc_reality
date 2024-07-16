                
                <!-- Container Start -->
                <div class="page-wrapper">
                    <div class="main-content">
                        <!-- Page Title Start -->
                        <div class="row">
                            <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-title-wrapper">
                                    <div class="page-title-box">
                                        <h4 class="page-title bold"><?php echo $this->lang->line('ltr_pay_methods');?></h4>
                                    </div>
                                    <div class="breadcrumb-list">
                                        <ul>
                                            <li class="breadcrumb-link">
                                                <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>
                                            </li>
                                            <li class="breadcrumb-link active"><?php echo $this->lang->line('ltr_pay_methods');?></li>
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
                                        <h4><?php echo $this->lang->line('ltr_paymethod_data');?></h4>
                                    </div>
									<div class="error"></div>
                                    <div class="card-body pb-4">
                                        <div class="chart-holder">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row">


                                                <?php
                                                foreach($paymethod_table as $listrow){
                                                ?>
													<div class="col-xl-3 col-lg-4 col-md-6">
                                                        <!-- Start Card-->
                                                        <div class="card ad-info-card">
                                                            <div class="card-body dd-flex align-items-center">
                                                                <div class="ad-checkbox pay-checkbox">
                                                                    <label>
                                                                        <input type="checkbox" id="gateway_<?=$listrow['id'];?>" name="gateway" class="gateway_select" value="<?=$listrow['gateway_name'];?>" <?php if(isset($listrow['status']) && $listrow['status']==1){ echo "checked";}?>>
                                                                        <span></span>
                                                                    </label>
                                                                </div>
                                                                <div class="icon-info" data-toggle="modal" data-target="#model_payment_<?=$listrow['id'];?>">
																	<?php if($listrow['gateway_name']=='Paypal'){?>
                                                                    <img src="<?=base_url();?>assets/images/paypal.png">
																	<?php }else if($listrow['gateway_name']=='Razorpay'){?>
																	<img src="<?=base_url();?>assets/images/razorpay.png">
																	<?php }?>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?> 
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

						<?php
                            $i=1;
                            foreach($paymethod_table as $listrow){
                        ?>
                        <div class="modal fade" id="model_payment_<?=$listrow['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5><?php echo $this->lang->line('ltr_paymethod_data');?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
									<form class="separate-form formget" method="POST" action="<?=base_url('admin/add-payment-method');?>">
                                         <input type="hidden" name="update_id" value="<?=(isset($listrow['id']) && !empty($listrow['id']))?$listrow['id']:'';?>">
                                    <div class="modal-body text-left">
                                       
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            
                                                <div class="form-group">
                                                    <label for="key_id" class="col-form-label"><?php echo $this->lang->line('ltr_paymethod_keyid');?></label>
                                                    <input class="form-control" type="text" placeholder="Key ID" id="key_id"name="key_id" value="<?=(isset($listrow['key_id']) && !empty($listrow['key_id']))?$listrow['key_id']:'';?>">
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                    <label for="secret_key" class="col-form-label"><?php echo $this->lang->line('ltr_paymethod_secretkey');?></label>
                                                    <input class="form-control" type="text" placeholder="Secret key" id="secret_key"name="secret_key" value="<?=(isset($listrow['secret_key']) && !empty($listrow['secret_key']))?$listrow['secret_key']:'';?>">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="currency_code" class="col-form-label"><?php echo $this->lang->line('ltr_paymethod_currency');?></label>
                                                    <select class="form-control" id="currency_code" name="currency_code">
                                                        <option value="0"><?php echo $this->lang->line('ltr_paymethod_currency');?></option>
                                                <?php
                                                if($listrow['id']==2){
                                                    foreach($pcurrencies as $selectcurrency){
                                                ?>
                                                        <option value="<?=$selectcurrency['id'];?>" <?php if(isset($listrow['currency_code']) && !empty($listrow['currency_code']) && $listrow['currency_code']==$selectcurrency['id']) echo 'selected="selected"'; ?>><?=$selectcurrency['currency_name'];?></option>
                                                <?php
                                                    }
                                                }else{
                                                    foreach($currencies as $selectcurrency){
                                                ?>
                                                        <option value="<?=$selectcurrency['id'];?>" <?php if(isset($listrow['currency_code']) && !empty($listrow['currency_code']) && $listrow['currency_code']==$selectcurrency['id']) echo 'selected="selected"'; ?>><?=$selectcurrency['currency_name'];?></option>
                                                <?php
                                                    }
                                                } 
                                                ?>
                                                    </select>
                                                </div>
                                            
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" name="submit">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('ltr_cancel');?></button>
                                    </div>
									</form>
                                </div>
                            </div>
                        </div>
						<?php
                            $i++;
                            }
                        ?>