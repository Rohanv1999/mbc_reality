                
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
										<div class="error"></div>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="chart-holder">
                                            <form class="separate-form formget" method="POST" action="<?=base_url('admin/add-payment-method');?>">
                                                <input type="hidden" name="update_id" value="<?=(isset($update_method[0]['id']) && !empty($update_method[0]['id']))?$update_method[0]['id']:'';?>">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="row">
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="gateway_name" class="col-form-label"><?php echo $this->lang->line('ltr_paymethod_name');?></label>
                                                                <input class="form-control" type="text" placeholder="Payment method name" id="gateway_name"name="gateway_name" value="<?=(isset($update_method[0]['gateway_name']) && !empty($update_method[0]['gateway_name']))?$update_method[0]['gateway_name']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="key_id" class="col-form-label"><?php echo $this->lang->line('ltr_paymethod_keyid');?></label>
                                                                <input class="form-control" type="text" placeholder="Payment method key id" id="key_id"name="key_id" value="<?=(isset($update_method[0]['key_id']) && !empty($update_method[0]['key_id']))?$update_method[0]['key_id']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="secret_key" class="col-form-label"><?php echo $this->lang->line('ltr_paymethod_secretkey');?></label>
                                                                <input class="form-control" type="text" placeholder="Payment method secret key" id="secret_key"name="secret_key" value="<?=(isset($update_method[0]['secret_key']) && !empty($update_method[0]['secret_key']))?$update_method[0]['secret_key']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="currency_code" class="col-form-label"><?php echo $this->lang->line('ltr_paymethod_currency');?></label>
                                                                <input class="form-control" type="text" placeholder="Payment method currency code" id="currency_code"name="currency_code" value="<?=(isset($update_method[0]['currency_code']) && !empty($update_method[0]['currency_code']))?$update_method[0]['currency_code']:'';?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="btn btn-primary" type="submit" name="submit">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>