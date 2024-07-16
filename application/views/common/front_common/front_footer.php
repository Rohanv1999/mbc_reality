<footer class="footer-area">
    <div class="footer-top footer-top-style">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-logo-area footer-logo-area-2">
                        <div class="item-logo">
                            <img src="<?= base_url(); ?>uploads/<?= front_common2()['main_logo2'][0]['main_logo2']; ?>"
                                width="157" height="40" alt="logo" class="img-fluid">
                        </div>
                        <p>
                            <?= front_common2()['company_data'][0]['about_company']; ?>
                        </p>
                        <div class="item-social">
                            <ul>

                                <?php $fb = front_common2()['company_data'][0]['facebook']; 
                                $insta = front_common2()['company_data'][0]['instagram'];
                                $twitter = front_common2()['company_data'][0]['twitter'];
                                $linkedIn = front_common2()['company_data'][0]['linkedin']; 

                                ?>
                                <?php if($fb!= ''){?>
                                    <li><a href="<?=$fb  ?>" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a></li>

                                <?php } ?>
                                <?php if($insta!= ''){?>
                                    <li><a href="<?= $insta ?>" target="_blank"><i
                                        class="fab fa-instagram"></i></a></li>

                                <?php } ?>
                                <?php if($twitter!= ''){?>
                                    <li><a href="<?= $twitter ?>" target="_blank"><i
                                        class="fab fa-twitter"></i></a></li>

                                <?php } ?>
                                <?php if($linkedIn!= ''){?>
                                    <li><a href="<?=$linkedIn ?>" target="_blank"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                           
                                <?php } ?>
                               
                              
                              
                             
                                    </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-link footer-link-style-2">
                        <div class="footer-title footer-title-style2">
                            <h3>Quick Links</h3>
                        </div>
                        <div class="item-link">
                            <ul>
                                <li><a href="<?=base_url('about-us')?>">About Us </a></li>
                                <li><a href="<?=base_url('listings/for-sale')?>"><?php echo $this->lang->line('ltr_for_sale');?></a></li>
                                <li><a href="<?=base_url('listings/for-rent')?>"><?php echo $this->lang->line('ltr_rentals');?></a></li>
                                <!-- <li><a href="<?=base_url('team')?>"><?php echo $this->lang->line('ltr_agents');?></a></li> -->
                                <li><a href="<?=base_url('contact-us')?>">Contact Us </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-insta">
                        <div class="footer-title footer-title-style2">
                            <h3>Instagram</h3>
                        </div>
                        <div class="insta-link">
                            <ul>
                                <li>
                                    <div class="item-img">
                                        <a href="javascript:;" class="insta-pic">
                                            <img src="<?= base_url(); ?>assets/front_assets2/img/instagram/insta1.jpg"
                                                width="86" height="73" alt="instagram">
                                        </a>
                                        <div class="item-overlay">
                                            <a href="javascript:;">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-img">
                                        <a href="javascript:;" class="insta-pic">
                                            <img src="<?= base_url(); ?>assets/front_assets2/img/instagram/insta2.jpg"
                                                width="86" height="73" alt="instagram">
                                        </a>
                                        <div class="item-overlay">
                                            <a href="javascript:;">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-img">
                                        <a href="javascript:;" class="insta-pic">
                                            <img src="<?= base_url(); ?>assets/front_assets2/img/instagram/insta3.jpg"
                                                width="86" height="73" alt="instagram">
                                        </a>
                                        <div class="item-overlay">
                                            <a href="javascript:;">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-img">
                                        <a href="javascript:;" class="insta-pic">
                                            <img src="<?= base_url(); ?>assets/front_assets2/img/instagram/insta4.jpg"
                                                width="86" height="73" alt="instagram">
                                        </a>
                                        <div class="item-overlay">
                                            <a href="javascript:;">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-img">
                                        <a href="javascript:;" class="insta-pic">
                                            <img src="<?= base_url(); ?>assets/front_assets2/img/instagram/insta5.jpg"
                                                width="86" height="73" alt="instagram">
                                        </a>
                                        <div class="item-overlay">
                                            <a href="javascript:;">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-img">
                                        <a href="javascript:;" class="insta-pic">
                                            <img src="<?= base_url(); ?>assets/front_assets2/img/instagram/insta6.jpg"
                                                width="86" height="73" alt="instagram">
                                        </a>
                                        <div class="item-overlay">
                                            <a href="javascript:;">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-contact footer-contact-style-2">
                        <div class="footer-title footer-title-style2">
                            <h3>Contact</h3>
                        </div>
                        <div class="footer-location">
                            <ul>
                                <li class="item-map"><i class="fas fa-map-marker-alt"></i><?=front_common2()['company_data'][0]['company_address'];?></li>
                                <li><a href="mailto:<?=front_common2()['company_data'][0]['contact_email'];?>"><i
                                            class="fas fa-envelope"></i><?=front_common2()['company_data'][0]['contact_email'];?></a></li>
                                <li><a href="tel:<?=front_common2()['company_data'][0]['company_phone'];?>"><i class="fas fa-phone-alt"></i><?=front_common2()['company_data'][0]['company_phone'];?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom footer-bottom-style-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright-area1">
                        <ul>
                            <li><a href="<?= base_url();?>terms-and-conditions">Terms of Use</a></li>
                            <li><a href="<?= base_url();?>prvacy-policy">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="copyright-area2">
                        <p><?= date('Y');?> © All rights reserved by MBC Realty</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- start back to top -->
<a href="javascript:void(0)" id="back-to-top">
    <i class="fas fa-angle-double-up"></i>
</a>
<!-- End back to top -->

</div>
<div id="template-search" class="template-search">
    <button type="button" class="close">×</button>
    <form class="search-form">
        <input type="search" value="" placeholder="Search">
        <button type="submit" class="search-btn btn-ghost style-1">
            <i class="flaticon-search"></i>
        </button>
    </form>
</div>
<!-- Calculator Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profitability Calculator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form-field-price" class="field-label">
                                    The cost of the object </label>
                                <input type="text" class="form-control hny_call" value="200 000">
                                <span class="calcu_ic">$</span>
                            </div>
                            <div class="form-froup mb-3">
                                <input type="range" value="40" min="0" max="100" step="1" class="progress">
                            </div>
                            <div class="form-group mb-3">
                                <label for="form-field-price" class="field-label">
                                    Initial payment* </label>
                                <input type="text" class="form-control hny_call_2" value="37 000">
                                <span class="calcu_ic newss">$</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="form-field-price" class="field-label">
                                    Investment before one year </label>
                                <input type="text" class="form-control hny_call_2" value="104 000">
                                <span class="calcu_ic newss">$</span>
                            </div>
                            <p class="trmcons">* Minimum down payment including DLD
                                ** Calculation is based on average market conditions and a period of up to 12 months</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="cal_prob">
                                <div class="top_rob">
                                    <p>Profitability** $</p>
                                    <h3>$ 32 674</h3>
                                </div>
                                <div class="bott_rob">
                                    <p>Profitability % on invested funds</p>
                                    <h3>31.0 %</h3>
                                </div>
                            </div>
                            <div class="call_ths">
                                <a href="javascript:;">Calculate</a>
                                <p>For Specific Project</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Jquery Start Here -->
<script src="<?= base_url(); ?>assets/front_assets2/js/jquery-3.6.0.min.js"></script>
<!-- Popper Js Start Here -->
<script src="<?= base_url(); ?>assets/front_assets2/js/popper.min.js"></script>
<!-- Bootstrap Js Start Here -->
<script src="<?= base_url(); ?>assets/front_assets2/js/bootstrap.min.js"></script>



<!-- Wow Js Start Here -->
<script src="<?= base_url(); ?>assets/front_assets2/js/wow.min.js"></script>
<!-- Owl Carousel Js Start Here -->
<script src="<?= base_url(); ?>assets/front_assets2/vendor/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>assets/front_assets2/js/swiper-bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/front_assets2/js/jquery.appear.min.js"></script>
<!-- Pop up Js Start Here -->
<script src="<?= base_url(); ?>assets/front_assets2/js/jquery.magnific-popup.min.js"></script>
<!-- Nice Select Js Start Here -->
<!-- <script src="<?= base_url(); ?>assets/front_assets2/js/jquery.nice-select.min.js"></script> -->
<!-- Parallaxie Js Start Here -->
<script src="<?= base_url(); ?>assets/front_assets2/js/parallaxie.js"></script>
<!-- Tween Js Start Here -->
<script src="<?= base_url(); ?>assets/front_assets2/js/tween-max.js"></script>
<!-- Appear Js Start Here -->
<script src="<?= base_url(); ?>assets/front_assets2/js/appear.min.js"></script>
<!-- Isotope Js Start Here -->
<script src="<?= base_url(); ?>assets/front_assets2/js/isotope.pkgd.min.js"></script>
<!-- Imagesloaded Js Start Here -->
<script src="<?= base_url(); ?>assets/front_assets2/js/imagesloaded.pkgd.min.js"></script>
<!-- noUiRangeSlider -->
<script src="<?= base_url(); ?>assets/front_assets2/vendor/noUiSlider/nouislider.min.js"></script>
<script src="<?= base_url(); ?>assets/front_assets2/vendor/noUiSlider/wNumb.js"></script>
<!-- Validator Slider -->
<script src="<?= base_url(); ?>assets/front_assets2/js/validator.min.js"></script>
<!-- Pannellum  -->
<script src="<?= base_url(); ?>assets/front_assets2/js/pannellum.js"></script>
<!-- Zoom Image  -->
<script src="<?= base_url(); ?>assets/front_assets2/js/jquery.zoom.min.js"></script>
<script src="<?= base_url(); ?>assets/front_assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ajax.js"></script>

<!-- sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

<!-- Main Js Start Here -->
<script src="<?= base_url(); ?>assets/front_assets2/js/main.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
    const progress = document.querySelector('.progress');

    progress.addEventListener('input', function () {
        const value = this.value;
        this.style.background = `linear-gradient(to right, #bb9f5e 0%, #e1d0ac ${value}%, #fff ${value}%, white 100%)`
    })
</script>
<script>
    var element = document.getElementsByClassName("template-main-menu")[0];
    element.addEventListener("click", myFunction);

    function myFunction(e) {
        var elems = document.querySelector(".active");
        if (elems != null) {
            elems.classList.remove("active");
        }
        e.target.className = "active";
    }
</script>
<script>
    $('.mini-cart-wrap').click(function () {
        $('.sidebar-widget').animate({
            left: "0%"
        }, 200);
        $('body').addClass('hddd');
    });
    $('.wi_close_btn').click(function () {
        $('.sidebar-widget').animate({
            left: "-100%"
        }, 200);
        $('body').removeClass('hddd');

    });
</script>

<script>
$('#searchBtn').on('click', function(){
    if($('#proCat').val() == null && $('#property-category-sale').val() == null){

        $('.error').html('<div class="alert alert-danger">Please select city and type or one of them.</div>');
        setTimeout(() => {
            $('.error').html('');
        }, 1000);
    }
    else{
        $('#searchForm').submit();
    }
})
</script>

</body>

</html>