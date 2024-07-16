                
                <!-- Container Start -->
                <div class="page-wrapper">
                    <div class="main-content">
                        <!-- Page Title Start -->
                        <div class="row">
                            <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-title-wrapper">
                                    <div class="page-title-box">
                                        <h4 class="page-title bold"><?php echo $this->lang->line('ltr_package_data');?></h4>
                                    </div>
                                    <div class="breadcrumb-list">
                                        <ul>
                                            <li class="breadcrumb-link">
                                                <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>
                                            </li>
                                            <li class="breadcrumb-link active"><?php echo $this->lang->line('ltr_package_data');?></li>
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
                                        <h4><?php echo $this->lang->line('ltr_package_data');?></h4>
										<div class="error"></div>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="card-content">
                                            <form class="separate-form formget" method="POST" action="<?=base_url('admin/add-package');?>">
                                                <input type="hidden" name="update_id" value="<?=(isset($package[0]['id']) && !empty($package[0]['id']))?$package[0]['id']:'';?>">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="packg_nm" class="col-form-label"><?php echo $this->lang->line('ltr_package_name');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_package_name');?>" id="packg_nm"name="packg_nm" value="<?=(isset($package[0]['packg_nm']) && !empty($package[0]['packg_nm']))?$package[0]['packg_nm']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="packg_price" class="col-form-label"><?php echo $this->lang->line('ltr_package_price');?></label>
                                                                <input class="form-control" type="number" placeholder="<?php echo $this->lang->line('ltr_package_price');?>" id="packg_price" name="packg_price" value="<?=(isset($package[0]['packg_price']) && !empty($package[0]['packg_price']))?$package[0]['packg_price']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="listing_limit" class="col-form-label"><?php echo $this->lang->line('ltr_listing_limit');?></label>
                                                                <input class="form-control" type="number" placeholder="<?php echo $this->lang->line('ltr_listing_limit');?>" id="listing_limit" name="listing_limit" value="<?=(isset($package[0]['listing_limit']) && !empty($package[0]['listing_limit']))?$package[0]['listing_limit']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="packg_period" class="col-form-label"><?php echo $this->lang->line('ltr_package_duration');?></label>
                                                                <select class="form-control" id="packg_period" name="packg_period">
                                                                    <option value=""><?php echo $this->lang->line('ltr_package_duration');?></option>
                                                                    <?php for($i=1;$i<=30;$i++){?>
                                                                    <option value="<?=$i;?>" <?=(isset($package[0]['packg_period']) && !empty($package[0]['packg_period']) && $package[0]['packg_period']==$i)?"selected=selected":'';?>><?=$i;?></option>
                                                                    <?php }?>
                                                                    <option value="unlimited"><?php echo $this->lang->line('ltr_unlimited');?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="duration_unit" class="col-form-label"><?php echo $this->lang->line('ltr_duration_unit');?></label>
                                                                <select class="form-control" id="duration_unit" name="duration_unit">
                                                                    <option value=""><?php echo $this->lang->line('ltr_duration_unit');?></option>
                                                                    <option value="days" <?=(isset($package[0]['duration_unit']) && !empty($package[0]['duration_unit']) && $package[0]['duration_unit']=='days')?"selected=selected":'';?>><?php echo $this->lang->line('ltr_days');?></option>
                                                                    <option value="month" <?=(isset($package[0]['duration_unit']) && !empty($package[0]['duration_unit']) && $package[0]['duration_unit']=='month')?"selected=selected":'';?>><?php echo $this->lang->line('ltr_month');?></option>
                                                                    <option value="year" <?=(isset($package[0]['duration_unit']) && !empty($package[0]['duration_unit']) && $package[0]['duration_unit']=='year')?"selected=selected":'';?>><?php echo $this->lang->line('ltr_year');?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="user_type" class="col-form-label"><?php echo $this->lang->line('ltr_user_type');?></label>
                                                                <select class="select2 form-control" id="user_type" name="user_type">
                                                                    <option><?php echo $this->lang->line('ltr_user_type');?></option>
                                                                    <option value="Agent" <?php if(isset($package[0]['user_type']) && !empty($package[0]['user_type']) && $package[0]['user_type']=="Agent") echo 'selected="selected"'; ?>><?php echo $this->lang->line('ltr_agent');?></option>
                                                                    
                                                                    <option value="Agent" <?php if(isset($package[0]['user_type']) && !empty($package[0]['user_type']) && $package[0]['user_type']=="user") echo 'selected="selected"'; ?>>User</option>
                                                                </select>
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