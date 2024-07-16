<!--=====================================-->
<!--=   Breadcrumb     Start            =-->
<!--=====================================-->
<div class="breadcrumb-wrap breadcrumb-wrap-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </nav>
    </div>
</div>
<!--=====================================-->
<!--=   contact    Start                =-->
<!--=====================================-->
<section class="contact-wrap pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-box1">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="contact-content">
                                <h3 class="contact-title">Office Information</h3>
                                <div class="contact-list">
                                    <div class="card shadow-sm p-4">
                                        <div class="phone-box">
                                            <div class="item-lebel">Address :</div>
                                            <div class="address"><?=front_common1()['company_data'][0]['company_address'];?></div>
                                            <div class="item-icon"><i class="fas fa-map-marker-alt"></i></div>
                                        </div>
                                        <div class="phone-box">
                                            <div class="item-lebel">Email :</div>
                                            <div class="email-as"><a href="mailto:info@mbcrealty.com" class="text-muted"><?=front_common1()['company_data'][0]['contact_email'];?></a></div>
                                            <div class="item-icon"><i class="fas fa-envelope"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow-sm p-4">
                                    <div class="phone-box">
                                        <div class="item-lebel">Contact Number :</div>
                                        <div class="phone-number"><a href="tel:1234567980" class="text-muted"><?=front_common1()['company_data'][0]['company_phone'];?></a></div>
                                        <div class="item-icon"><i class="fas fa-phone-alt"></i></div>
                                    </div>
                                    <?php 
                                            $fb = front_common1()['company_data'][0]['facebook'];
                                            $insta = front_common1()['company_data'][0]['instagram'];
                                            $twitter = front_common1()['company_data'][0]['twitter'];
                                            $linkedIn = front_common1()['company_data'][0]['linkedin'];?>
                                    <?php if($fb!= '' || $insta!= '' || $twitter!= '' || $linkedIn != ''):?>
                                    <div class="social-box">
                                        <div class="item-lebel">Social Share :</div>
                                        <ul class="item-social">
                                
                                            <?php if($fb != ''):?>
                                                <li><a target="_blank" href="<?=$fb;?>"><i class="fab fa-facebook-f"></i></a></li>
                                            <?php endif;?>
                                            <?php if($insta != ''):?>
                                                <li><a target="_blank" href="<?=$insta;?>"><i class="fab fa-instagram"></i></a></li>
                                            <?php endif;?>
                                            <?php if($twitter != ''):?>
                                                <li><a target="_blank" href="<?=$twitter;?>"><i class="fab fa-twitter"></i></a></li>
                                            <?php endif;?>
                                            <?php if($linkedIn != ''):?>
                                                <li><a target="_blank" href="<?=$linkedIn;?>"><i class="fab fa-linkedin-in"></i></a></li>
                                            <?php endif;?>
										
                                        </ul>
                                        <div class="item-icon"><a href="javascript:void(0)"><i class="fas fa-share-alt"></i></a></div>
                                    </div>

                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-box2">
                                <div class="contact-content">
                                    <h3 class="contact-title">Quick Contact</h3>
                                    <p>Borem ipsum dolor sit amet conse ctetur adipisicing elit sed do eiusmod
                                        Eorem ipsum dolor sit amet conse ctetur.
                                    </p>
                                    <form method="post" action="<?=base_url('add-query');?>" class="contact-box formget rt-contact-form2">
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label>Name *</label>
                                                <input type="text" class="form-control" name="username" placeholder="First Name*" data-error="First Name is required" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Phone *</label>
                                                <input type="text" class="form-control" maxlength="15" oninput="this.value = this.value.replace(/[^+\d]+/g, '')" name="phone" placeholder="Phone*" data-error="Phone is required" required>
                                                <div class="help-block with-errors"></div>
                                            </div> 
                                             <div class="form-group col-lg-12">
                                                <label>Email *</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email*" data-error="Phone is required" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label>Message *</label>
                                                <textarea name="comment" id="message" class="form-text" placeholder="Message" cols="30" rows="5" data-error="Message Name is required" required></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <button type="submit" class="item-btn">Send message</button>
                                            </div>
                                        </div>
                                        <div class="form-response"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<iframe id="map" style="width: 100%; height: 500px;" src="https://maps.google.com/maps?&amp;q=<?php echo urlencode($ccords[0]['company_coord']);?>&amp;output=embed" ></iframe>
</iframe>
