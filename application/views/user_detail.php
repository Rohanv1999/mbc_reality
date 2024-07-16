                <!-- Container Start -->
                <div class="page-wrapper">
                    <div class="main-content">
                        <!-- Page Title Start -->
                        <div class="row">
                            <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-title-wrapper">
                                    <div class="page-title-box">
                                        <h4 class="page-title bold"><?php echo $this->lang->line('ltr_team');?></h4>
                                    </div>
                                    <div class="breadcrumb-list">
                                        <ul>
                                            <li class="breadcrumb-link">
                                                <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>
                                            </li>
                                            <li class="breadcrumb-link"><?php echo $this->lang->line('ltr_team');?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Real Estate table Start -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <h4 class="card-title"><?php echo $this->lang->line('ltr_team');?></h4>
										<div class="error"></div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="mfh-machine-profile">
                                                <ul class="nav nav-tabs" id="myTab1" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab1" data-toggle="tab" href="#user_details" role="tab" aria-controls="user_details" aria-selected="true"><?php echo $this->lang->line('ltr_basic_details');?></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab21" data-toggle="tab" href="#extra_info" role="tab" aria-controls="extra_info" aria-selected="false"><?php echo $this->lang->line('ltr_extra_information');?></a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content ad-content2" id="myTabContent2">
                                                    <div class="tab-pane fade show active" id="user_details" role="tabpanel">
                                                        <form class="separate-form formget" method="POST" action="<?=base_url('admin/add-team');?>">
                                                            <input type="hidden" name="getid" value="<?= (isset($users[0]['id']) && !empty($users[0]['id']))? $users[0]['id']:'';?>">
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="full_name" class="col-form-label"><?php echo $this->lang->line('ltr_full_name');?></label>
                                                                            <input class="form-control" type="text" name="full_name" placeholder="<?php echo $this->lang->line('ltr_full_name');?>" id="full_name" value="<?= (isset($users[0]['full_name']) && !empty($users[0]['full_name']))? $users[0]['full_name']:'';?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="user_name" class="col-form-label"><?php echo $this->lang->line('ltr_username');?></label>
                                                                            <input class="form-control" type="text" name="user_name" placeholder="<?php echo $this->lang->line('ltr_username');?>" id="user_name" value="<?= (isset($users[0]['user_name']) && !empty($users[0]['user_name']))? $users[0]['user_name']:'';?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="email" class="col-form-label"><?php echo $this->lang->line('ltr_email');?></label>
                                                                            <input class="form-control" type="text" name="email" placeholder="<?php echo $this->lang->line('ltr_email');?>" id="email" value="<?= (isset($users[0]['email']) && !empty($users[0]['email']))? $users[0]['email']:'';?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="password" class="col-form-label"><?php echo $this->lang->line('ltr_password');?><span style="color:red;">*</span></label>
                                                                            <input class="form-control" type="password" name="password" placeholder="<?php echo $this->lang->line('ltr_password');?>" id="password" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="user_type" class="col-form-label"><?php echo $this->lang->line('ltr_user_type');?></label>
                                                                            <select class="form-control" name="user_type" id="user_type">
                                                                                <option value="" <?php if(isset($users[0]['user_type']) && !empty($users[0]['user_type']) && $users[0]['user_type']==''){echo 'selected="selected"';}?>><?php echo $this->lang->line('ltr_user_type');?></option>
                                                                                <option value="agent" <?php if(isset($users[0]['user_type']) && !empty($users[0]['user_type']) && $users[0]['user_type']=='agent'){echo 'selected="selected"';}?>><?php echo $this->lang->line('ltr_agent');?></option>
                                                                                <option value="user" <?php if(isset($users[0]['user_type']) && !empty($users[0]['user_type']) && $users[0]['user_type']=='user'){echo 'selected="selected"';}?>><?php echo $this->lang->line('ltr_user');?></option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="package_nm" class="col-form-label"><?php echo $this->lang->line('ltr_active_package');?></label>
                                                                            <select class="form-control" name="package_nm" id="package_nm">
                                                                                <option value=""><?php echo $this->lang->line('ltr_active_package');?></option>
                                                                            <?php foreach($packages as $options){?>
                                                                                <option value="<?=$options['id'];?>" <?php if(isset($users[0]['package_nm']) && !empty($users[0]['package_nm']) && $users[0]['package_nm']==$options['id']){echo 'selected="selected"';}?>><?=$options['packg_nm'];?></option>
                                                                            <?php }?>
                                                                            </select>
                                                                        </div>
                                                                    </div> -->
                                                                    <!-- <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="package_expiry" class="col-form-label"><?php echo $this->lang->line('ltr_package_expiry_date');?></label>
                                                                            <input class="form-control" type="text" name="package_expiry" placeholder="<?php echo $this->lang->line('ltr_package_expiry_date');?>" id="package_expiry00" value="<?= (isset($users[0]['package_expiry']) && $users[0]['package_expiry']!='0000-00-00 00:00:00')? $users[0]['package_expiry']:'';?>" readonly>
                                                                        </div>
                                                                    </div> -->
                                                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" id="UC_code" name="UC_code">
                                                                            <label for="phone" class="col-form-label"><?php echo $this->lang->line('ltr_phone_number');?></label>
                                                                             
                                                                           <input class="form-control " type="text" oninput="this.value = this.value.replace(/[^+\d]+/g, '')" placeholder="<?php echo $this->lang->line('ltr_phone_number');?>" name="phone" id="phone" value="<?= (isset($users[0]['phone']) && !empty($users[0]['phone']))? $users[0]['phone']:'';?>"  maxlength="15">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="language" class="col-form-label"><?php echo $this->lang->line('ltr_language');?></label>
                                                                            <input class="form-control" type="text" name="language" placeholder="<?php echo $this->lang->line('ltr_language');?>" id="language" value="<?= (isset($users[0]['language']) && !empty($users[0]['language']))? $users[0]['language']:'';?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="address" class="col-form-label"><?php echo $this->lang->line('ltr_address');?></label>
                                                                            <textarea class="form-control" id="address" name="address" placeholder="<?php echo $this->lang->line('ltr_address');?>" rows="5"><?= (isset($users[0]['address']) && !empty($users[0]['address']))? $users[0]['address']:'';?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="description" class="col-form-label"><?php echo $this->lang->line('ltr_description');?></label>
                                                                            <textarea class="form-control" cols="50" id="description" name="description" rows="5" placeholder="<?php echo $this->lang->line('ltr_description');?>"><?= (isset($users[0]['description']) && !empty($users[0]['description']))? $users[0]['description']:'';?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <div class="checkbox">
                                                                                <input id="status" type="checkbox" name="status" value="1" <?php if(isset($users[0]['status']) && !empty($users[0]['status']) && $users[0]['status']=='1') { echo "checked"; }else{ echo "checked"; } ?>>
                                                                                <label for="status"><?php echo $this->lang->line('ltr_activated');?></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-0">
                                                                    <input class="btn btn-primary" type="submit" name="submit1">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="extra_info" role="tabpanel">
                                                        <form class="separate-form formget" method="POST" action="<?=base_url('admin/extra_info');?>">
                                                            <div class="error"></div>
                                                            <input type="hidden" name="getid" value="<?= (isset($users[0]['id']) && !empty($users[0]['id']))? $users[0]['id']:'';?>">
                                                            <input type="hidden" name="uids" id="extra">
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="fb_link" class="col-form-label"><?php echo $this->lang->line('ltr_facebook');?></label>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text">https://</span>
                                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_facebook');?>" id="fb_link" name="fb_link" value="<?= (isset($users[0]['fb_link']) && !empty($users[0]['fb_link']))? $users[0]['fb_link']:'';?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="twitter_link" class="col-form-label"><?php echo $this->lang->line('ltr_twitter');?></label>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text">https://</span>
                                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_twitter');?>" id="twitter_link" name="twitter_link" value="<?= (isset($users[0]['twitter_link']) && !empty($users[0]['twitter_link']))? $users[0]['twitter_link']:'';?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="insta_link" class="col-form-label"><?php echo $this->lang->line('ltr_instagram');?></label>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text">https://</span>
                                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_instagram');?>" id="insta_link" name="insta_link" value="<?= (isset($users[0]['insta_link']) && !empty($users[0]['insta_link']))? $users[0]['insta_link']:'';?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="linkedin_link" class="col-form-label"><?php echo $this->lang->line('ltr_linkedin');?></label>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text">https://</span>
                                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_linkedin');?>" id="linkedin_link" name="linkedin_link" value="<?= (isset($users[0]['linkedin_link']) && !empty($users[0]['linkedin_link']))? $users[0]['linkedin_link']:'';?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-0">
                                                                    <input class="btn btn-primary" type="submit">
                                                                </div>
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