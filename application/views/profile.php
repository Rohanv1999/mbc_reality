   
        <!-- Container Start -->
        <div class="page-wrapper">
            <div class="main-content">
                <!-- Page Title Start -->
                <div class="row">
                    <div class="col xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-title-wrapper">
                            <div class="page-title-box">
                                <h4 class="page-title"><?php echo $this->lang->line('ltr_my_profile');?></h4>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>
                                    </li>
                                    <li class="breadcrumb-link active"><?php echo $this->lang->line('ltr_my_profile');?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Products view Start -->
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                      <div class="col-xl-4">
                        <div class="card"><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                          <div class="card-header">
                            <h4 class="card-title mb-0"><?php echo $this->lang->line('ltr_my_profile');?></h4>
							<div class="error"></div>
                            <div class="card-options"><a class="card-options-collapse" href="javascript:;" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="javascript:;" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
                          </div>
                          <div class="card-body">
                            <form>
                              <div class="profile-title">
                                <div class="media ad-profile2-img">                        
                                  <img alt="" src="<?=(isset($profile_data[0]['profile_photo']) && !empty($profile_data[0]['profile_photo']))?base_url().'uploads/'.$profile_data[0]['profile_photo']:base_url().'assets/front_assets/images/no-ava.jpeg';?>">
                                  <div class="media-body">
                                  <h5 class="mb-1"><?=$profile_data[0]['full_name'];?></h5>
                                  <p><?=$profile_data[0]['user_name'];?></p>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3">
                                <label class="form-label"><?php echo $this->lang->line('ltr_email');?></label>
                                <input type="email" id="email" class="form-control" id="email" name="email" value="<?=$profile_data[0]['email'];?>" placeholder="your-email@domain.com" data-bs-original-title="" title="" disabled>
                              </div>
                              <div class="mb-3">
                                <label class="form-label"><?php echo $this->lang->line('ltr_user_type');?></label>
                                <input type="text" id="user_type" class="form-control" id="user_type" name="user_type" value="<?=$profile_data[0]['user_type'];?>" data-bs-original-title="" title="" disabled>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="card pt-4 col-xl-8">
                        <div class="mfh-machine-profile">
                          <ul class="nav nav-tabs" id="myTab1" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab1" data-toggle="tab" href="#profile_data" role="tab" aria-controls="profile_data" aria-selected="true"><?php echo $this->lang->line('ltr_profile_data');?></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab21" data-toggle="tab" href="#change_password" role="tab" aria-controls="change_password" aria-selected="false"><?php echo $this->lang->line('ltr_change_password');?></a>
                            </li>
                          </ul>
                          <div class="tab-content ad-content2" id="myTabContent2">
                            <div class="tab-pane fade show active" id="profile_data" role="tabpanel">
                              <form class="formget" method="post" action="<?=base_url($dashboard.'/profile-update');?>">
                                <input type="hidden" name="user_id" id="user_id" value="<?=$profile_data[0]['id'];?>">
                                <div class="card-header">
                                  <h4 class="card-title mb-0"><?php echo $this->lang->line('ltr_edit_profile');?></h4>
                                  <div class="card-options"><a class="card-options-collapse" href="javascript:;" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="javascript:;" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                      <div class="mb-3">
                                        <label class="form-label"><?php echo $this->lang->line('ltr_full_name');?></label>
                                        <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_full_name');?>" name="fname" id="fname" value="<?=$profile_data[0]['full_name'];?>" data-bs-original-title="" title="">
                                      </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                      <div class="mb-3">
                                        <label class="form-label"><?php echo $this->lang->line('ltr_username');?></label>
                                        <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_username');?>" name="uname" id="uname" value="<?=$profile_data[0]['user_name'];?>" data-bs-original-title="" title="">
                                      </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                      <div class="mb-3">
                                        <input type="hidden" id="profile_phone" name="profile_phone">
                                        <label class="form-label"><?php echo $this->lang->line('ltr_phone_number');?></label>
                                        <input class="form-control WMobile_code" type="tel" name="phone" placeholder="<?php echo $this->lang->line('ltr_phone_number');?>" id="phone" value="<?=$profile_data[0]['phone'];?>" data-bs-original-title="" title=""  minlength="10" maxlength="10">
                                      </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                      <div class="mb-3">
                                        <label class="form-label"><?php echo $this->lang->line('ltr_language');?></label>
                                        <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_language');?>" name="language" id="language" value="<?=$profile_data[0]['language'];?>" data-bs-original-title="" title="">
                                      </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                      <div class="form-group">
                                        <label for="package_nm" class="col-form-label"><?php echo $this->lang->line('ltr_active_package');?></label>
                                        <input class="form-control" type="text" name="package_nm" placeholder="<?php echo $this->lang->line('ltr_active_package');?>" id="package_nm" value="<?= (isset($profile_data[0]['package_nm']) && !empty($profile_data[0]['package_nm']))?loop_select('id',$profile_data[0]['package_nm'],'packg_nm','px_packages'):'';?>"readonly>
                                      </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                      <div class="form-group">
                                        <label for="package_expiry" class="col-form-label"><?php echo $this->lang->line('ltr_package_expiry_date');?></label>
                                        <input class="form-control" type="text" name="package_expiry" placeholder="<?php echo $this->lang->line('ltr_package_expiry_date');?>" id="package_expiry" value="<?= (isset($profile_data[0]['package_expiry']) && !empty($profile_data[0]['package_expiry']))? $profile_data[0]['package_expiry']:'';?>"readonly>
                                      </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                      <div class="form-group">
                                        <label class="form-label"><?php echo $this->lang->line('ltr_facebook');?></label>
                                        <div class="input-group mb-3">
                                          <span class="input-group-text">https://</span>
                                          <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_facebook');?>" name="fb_link" id="slink" value="<?=$profile_data[0]['fb_link'];?>" data-bs-original-title="" title="">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                      <div class="form-group">
                                        <label class="form-label"><?php echo $this->lang->line('ltr_instagram');?></label>
                                        <div class="input-group mb-3">
                                          <span class="input-group-text">https://</span>
                                          <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_instagram');?>" id="insta_link" name="insta_link" value="<?= (isset($profile_data[0]['insta_link']) && !empty($profile_data[0]['insta_link']))? $profile_data[0]['insta_link']:'';?>">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label for="twitter_link" class="col-form-label"><?php echo $this->lang->line('ltr_twitter');?></label>
                                        <div class="input-group mb-3">
                                          <span class="input-group-text">https://</span>
                                          <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_twitter');?>" id="twitter_link" name="twitter_link" value="<?= (isset($profile_data[0]['twitter_link']) && !empty($profile_data[0]['twitter_link']))? $profile_data[0]['twitter_link']:'';?>">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label for="linkedin_link" class="col-form-label"><?php echo $this->lang->line('ltr_linkedin');?></label>
                                        <div class="input-group mb-3">
                                          <span class="input-group-text">https://</span>
                                          <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_linkedin');?>" id="linkedin_link" name="linkedin_link" value="<?= (isset($profile_data[0]['linkedin_link']) && !empty($profile_data[0]['linkedin_link']))? $profile_data[0]['linkedin_link']:'';?>">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                      <div class="mb-3">
                                        <label class="form-label"><?php echo $this->lang->line('ltr_address');?></label>
                                        <textarea class="form-control" name="address" id="address" rows="5" spellcheck="false" placeholder="<?php echo $this->lang->line('ltr_address');?>"><?=$profile_data[0]['address'];?></textarea>
                                      </div>
                                    </div>
                                    <div class="col-sm-4 col-md-6">
                                      <label class="form-label"><?php echo $this->lang->line('ltr_description');?></label>
                                      <textarea id="description" class="form-control" rows="5" spellcheck="false" name="description" ><?=$profile_data[0]['description'];?></textarea>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                      <div class="mb-3">
                                        <input type="hidden" id="profile_whatsup" name="profile_whatsup">
                                        <label class="form-label"><?php echo $this->lang->line('ltr_whatsup_number');?></label>
                                        <input class="form-control Mobile_code" type="tel" name="whatsup" placeholder="<?php echo $this->lang->line('ltr_whatsup_number');?>" id="whatsup" value="<?=(isset($profile_data[0]['whatsup']) && !empty($profile_data[0]['whatsup']))?$profile_data[0]['whatsup']:'';?>" data-bs-original-title="" title=""  minlength="10" maxlength="10">
                                      </div>
                                    </div>
									<div class="col-sm-6 col-md-4">
                                      <div class="form-group">
                                        <label for="skype_link" class="col-form-label"><?php echo $this->lang->line('ltr_skype_username');?></label>
                                        <input class="form-control" type="text" placeholder="<?php echo $this->lang->line('ltr_skype_username');?>" id="skype_link" name="skype_link" value="<?= (isset($profile_data[0]['skype_link']) && !empty($profile_data[0]['skype_link']))? $profile_data[0]['skype_link']:'';?>">
                                      </div>
                                    </div>
									<div class="col-sm-12 col-md-12">
                                      <div class="form-group">
                                        <div class="circle">
											<img class="profile-pic image" src="<?=(isset($profile_data[0]['profile_photo']) && !empty($profile_data[0]['profile_photo']))?base_url().'uploads/'.$profile_data[0]['profile_photo']:base_url().'assets/front_assets/images/no-ava.jpeg';?>">
											<input class="file-upload" name="profile_photo" type="file" accept="image/*"/>
											<div class="hover-circle-image">
												<img src="<?=base_url();?>assets/images/fileupload.png" >
											</div>
										</div>
									  </div>
                                    </div>
                                  </div>
                                  <input class="btn btn-primary squer-btn" type="submit" data-bs-original-title="" title="">
                                </div>
                              </form>
                            </div>
                            <div class="tab-pane fade" id="change_password" role="tabpanel">
                            <form class="formget" method="post" action="<?=base_url($dashboard.'/change-password');?>">
                                <input type="hidden" name="user_id" id="user_id" value="<?=$profile_data[0]['id'];?>">
                                <div class="card-header">
                                  <h4 class="card-title mb-0"><?php echo $this->lang->line('ltr_change_password');?></h4>
                                  <div class="error"></div>
                                  <div class="card-options"><a class="card-options-collapse" href="javascript:;" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="javascript:;" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                      <div class="mb-3">
                                        <label class="form-label"><?php echo $this->lang->line('ltr_enter_new_password');?></label>
                                        <input onkeyup="validatePassword(this, 'np_err', 'changepBtn')" class="form-control" type="text" name="new_password" id="new_password" data-bs-original-title="" title="" placeholder="New Password">
                                      <small class="np_err text-danger"></small>
                                      </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                      <div class="mb-3">
                                        <label class="form-label"><?php echo $this->lang->line('ltr_conform_new_password');?></label>
                                        <input onkeyup="matchPass(this, 'cp_err', 'changepBtn', 'new_password' )" class="form-control" type="text" name="conform_password" placeholder="Confirm Password" id="conform_password" data-bs-original-title="" title="">
                                        <small class="cp_err text-danger"></small>
                                      </div>
                                    </div>
                                  </div>
                                  <input id="changepBtn" class="btn btn-primary  squer-btn" type="submit" data-bs-original-title="" title="" value="<?php echo $this->lang->line('ltr_update_password');?>">
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


    <script>
     function validatePassword(elem, errorElem, btn = ''){
        var val = elem.value;

       var regex =  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@!%*?&])[A-Za-z\d$@!%*?&]{8,255}$/;

       if(!regex.test(val)){
            $('.' +errorElem).text('Password must contain at least 1 uppercase, 1 lowercase, 1 special, min8, max 200 letter, 1 number')
            if(btn != ''){
                $('#' +btn).attr('disabled', true)
            }
       }
       else{
        $('.' +errorElem).text('')
        if(btn != ''){
          if($('.cp_err').text() == '')
            $('#' +btn).removeAttr('disabled')
        }
       }

    }

function matchPass(elem, errorElem, btn = '', matchElem){
    if(elem.value != $('#' +matchElem).val()){
      $('.' + errorElem).text('Passwords do not match');
      if(btn != ''){
                $('#' +btn).attr('disabled', true)
            }
    }
    else{
      $('.' + errorElem).text('');
      if(btn != ''){
            $('#' +btn).removeAttr('disabled')
        }
    }
}
                </script>