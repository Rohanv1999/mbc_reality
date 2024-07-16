                
                <!-- Container Start -->
                <div class="page-wrapper">
                    <div class="main-content">
                        <!-- Page Title Start -->
                        <div class="row">
                            <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-title-wrapper">
                                    <div class="page-title-box">
                                        <h4 class="page-title bold"><?php echo $this->lang->line('ltr_company_details');?></h4>
                                    </div>
                                    <div class="breadcrumb-list">
                                        <ul>
                                            <li class="breadcrumb-link">
                                                <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>
                                            </li>
                                            <li class="breadcrumb-link"><?php echo $this->lang->line('ltr_settings');?></li>
                                            <li class="breadcrumb-link active"><?php echo $this->lang->line('ltr_company_details');?></li>
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
                                        <h4><?php echo $this->lang->line('ltr_company_details');?></h4>
										<div class="error"></div>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="card-content">
                                            <form class="separate-form formget" method="POST" action="<?=base_url('admin/owner-company-update');?>">
                                                <input type="hidden" name="update_id" value="<?=(isset($owner_company[0]['id']) && !empty($owner_company[0]['id']))?$owner_company[0]['id']:'';?>">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="website_title" class="col-form-label"><?php echo $this->lang->line('ltr_website_title');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_website_title');?>" id="website_title"name="website_title" value="<?=(isset($owner_company[0]['website_title']) && !empty($owner_company[0]['website_title']))?$owner_company[0]['website_title']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="company_address" class="col-form-label"><?php echo $this->lang->line('ltr_address');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_address');?>" id="company_address" name="company_address" value="<?=(isset($owner_company[0]['company_address']) && !empty($owner_company[0]['company_address']))?$owner_company[0]['company_address']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="company_coord" class="col-form-label"><?php echo $this->lang->line('ltr_gps_coordinates');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_gps_coordinates');?>" id="company_coord" name="company_coord" value="<?=(isset($owner_company[0]['company_coord']) && !empty($owner_company[0]['company_coord']))?$owner_company[0]['company_coord']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="contact_email" class="col-form-label"><?php echo $this->lang->line('ltr_contact_email');?></label>
                                                                <input class="form-control" type="text" placeholder="info@mail.com" id="contact_email" name="contact_email" value="<?=(isset($owner_company[0]['contact_email']) && !empty($owner_company[0]['contact_email']))?$owner_company[0]['contact_email']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <input type="hidden" id="c_phone" name="c_phone">
                                                                <label for="company_phone" class="col-form-label"><?php echo $this->lang->line('ltr_phone_number');?></label>
                                                                <input class="form-control Mobile_code" type="text" oninput="this.value = this.value.replace(/\D+/g, '')" id="company_phone" name="company_phone" value="<?=(isset($owner_company[0]['company_phone']) && !empty($owner_company[0]['company_phone']))?$owner_company[0]['company_phone']:'';?>" maxlength="10">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="paypal_email" class="col-form-label"><?php echo $this->lang->line('ltr_paypal_bemail');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_paypal_bemail');?>" id="paypal_email" name="paypal_email" value="<?=(isset($owner_company[0]['paypal_email']) && !empty($owner_company[0]['paypal_email']))?$owner_company[0]['paypal_email']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="currency" class="col-form-label"><?php echo $this->lang->line('ltr_default_currency');?></label>
                                                                <select class="form-control" id="currency" name="currency">
                                                                    <option value=""><?php echo $this->lang->line('ltr_default_currency');?></option>
                                                                <?php
                                                                foreach($currencies as $selectcurrency){
                                                                ?>
                                                                    <option value="<?=$selectcurrency['id'];?>" <?php if(isset($owner_company[0]['currency']) && !empty($owner_company[0]['currency']) && $owner_company[0]['currency']==$selectcurrency['id']) echo 'selected="selected"'; ?>><?=$selectcurrency['currency_name'];?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="facebook" class="col-form-label"><?php echo $this->lang->line('ltr_facebooklink');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_facebooklink');?>" id="facebook" name="facebook" value="<?=(isset($owner_company[0]['facebook']) && !empty($owner_company[0]['facebook']))?$owner_company[0]['facebook']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="twitter" class="col-form-label"><?php echo $this->lang->line('ltr_twitterlink');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_twitterlink');?>" id="twitter" name="twitter" value="<?=(isset($owner_company[0]['twitter']) && !empty($owner_company[0]['twitter']))?$owner_company[0]['twitter']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="instagram" class="col-form-label"><?php echo $this->lang->line('ltr_instagramlink');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_instagramlink');?>" id="instagram" name="instagram" value="<?=(isset($owner_company[0]['instagram']) && !empty($owner_company[0]['instagram']))?$owner_company[0]['instagram']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="linkedin" class="col-form-label"><?php echo $this->lang->line('ltr_linkedinlink');?></label>
                                                                <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_linkedinlink');?>" id="linkedin" name="linkedin" value="<?=(isset($owner_company[0]['linkedin']) && !empty($owner_company[0]['linkedin']))?$owner_company[0]['linkedin']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="about_company" class="col-form-label"><?php echo $this->lang->line('ltr_short_aboutcompany');?></label>
                                                                <textarea class="form-control" rows="5" placeholder="About company" id="about_company" name="about_company"><?=(isset($owner_company[0]['about_company']) && !empty($owner_company[0]['about_company']))?$owner_company[0]['about_company']:'';?></textarea>
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