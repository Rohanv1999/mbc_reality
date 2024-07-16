				<!-- Container Start -->
                <div class="page-wrapper">
                    <div class="main-content">
                        <!-- Page Title Start -->
                        <div class="row">
                            <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-title-wrapper">
                                    <div class="page-title-box">
                                        <h4 class="page-title bold"><?php echo $this->lang->line('ltr_mail_credential');?></h4>
                                    </div>
                                    <div class="breadcrumb-list">
                                        <ul>
                                            <li class="breadcrumb-link">
                                                <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>
                                            </li>
                                            <li class="breadcrumb-link active"><?php echo $this->lang->line('ltr_mail_credential');?></li>
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
                                        <h4><?php echo $this->lang->line('ltr_mail_credential');?></h4>
										<div class="error"></div>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="card-content">
                                            <form class="separate-form formget" method="POST" action="<?=base_url('admin/add-mailcredential');?>">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="mail_user" class="col-form-label"><?php echo $this->lang->line('ltr_email');?></label>
                                                                <input class="form-control" type="email" placeholder="<?php echo $this->lang->line('ltr_email');?>" id="mail_user" name="mail_user" value="<?=(isset($update_credential[0]['mail_user']) && !empty($update_credential[0]['mail_user']))?$update_credential[0]['mail_user']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="mail_password" class="col-form-label"><?php echo $this->lang->line('ltr_password');?></label>
                                                                <input class="form-control" type="password" placeholder="<?php echo $this->lang->line('ltr_password');?>" id="mail_password" name="mail_password" value="<?=(isset($update_credential[0]['mail_password']) && !empty($update_credential[0]['mail_password']))?$update_credential[0]['mail_password']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="server_type" class="col-form-label"><?php echo $this->lang->line('ltr_driver');?></label>
																<input class="form-control" type="text" placeholder="Mail driver" id="server_type" name="server_type" value="<?=(isset($update_credential[0]['server_type']) && !empty($update_credential[0]['server_type']))?$update_credential[0]['server_type']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="server_host" class="col-form-label"><?php echo $this->lang->line('ltr_host');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_host');?>" id="server_host" name="server_host" value="<?=(isset($update_credential[0]['server_host']) && !empty($update_credential[0]['server_host']))?$update_credential[0]['server_host']:'';?>">
                                                            </div>
                                                        </div>
														<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="server_port" class="col-form-label"><?php echo $this->lang->line('ltr_port');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_port');?>" id="server_port" name="server_port" value="<?=(isset($update_credential[0]['server_port']) && !empty($update_credential[0]['server_port']))?$update_credential[0]['server_port']:'';?>">
                                                            </div>
                                                        </div>
														<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="mail_encryption" class="col-form-label"><?php echo $this->lang->line('ltr_mailencrypt');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_mailencrypt');?>" id="mail_encryption" name="mail_encryption" value="<?=(isset($update_credential[0]['mail_encryption']) && !empty($update_credential[0]['mail_encryption']))?$update_credential[0]['mail_encryption']:'';?>">
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