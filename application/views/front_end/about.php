
<!--=====================================-->
<!--=   Breadcrumb     Start            =-->
<!--=====================================-->
<div class="breadcrumb-wrap breadcrumb-wrap-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</div>
<!--=====================================-->
<!--=   About     Start                 =-->
<!--=====================================-->
<section class="about-wrap2 pb-0">
    <div class="container">
        <div class="row flex-row-reverse flex-lg-row">
            <div class="col-xl-6 col-lg-6">
                <div class="about-img">
                    <img src="<?= base_url();?>assets/front_assets/img/blog/about8.jpg" alt="about" width="746" height="587">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="about-box3 wow fadeInUp" data-wow-delay=".2s">
                    <span class="item-subtitle"><?=loop_select('section_name','About Us','section_name','px_homepage');?></span>
                    <h2 class="item-title"><?=loop_select('section_name','About Us','main_heading','px_homepage');?></h2>
             

                        <p><?=nl2br(loop_select('section_name','About Us','main_content','px_homepage'));?></p>
                </div>
            </div>
        </div>
        <div class="row flex-row flex-lg-row-reverse mt-4">
            <div class="col-xl-6 col-lg-6">
                <div class="about-layout3">
                    <div class="item-img">
                        <img src="<?= base_url();?>assets/front_assets/img/blog/about9.jpg" alt="about" width="809" height="587">
                        <div class="play-button">
                            <div class="item-icon">
                                <img src="<?= base_url();?>assets/front_assets/img/blog/about9.jpg" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="about-layout2">
                    <span class="item-subtitle"><?=loop_select('section_name','Our Services','section_name','px_homepage');?></span>
                    <h2 class="item-title"><?=loop_select('section_name','Our Services','main_heading','px_homepage');?></h2>
                    <p><?=nl2br(loop_select('section_name','Our Services','main_content','px_homepage'));?></p>
                    <p class="fw-bold">Join us on this exciting journey of innovation, excellence, and growth as we redefine the real estate landscape in Dubai."</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================-->
<!--=   Brand     Start                 =-->
<!--=====================================-->
<section class="brand-wrap1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="brand-box1 wow fadeInUp" data-wow-delay=".2s">
                    <span class="section-subtitle">Our Clients</span>
                    <h2 class="section-title">We're going to became partners for the long run</h2>
                    <p>Ghen an unknown printer took a galley of type andscr
                        ambledit to make a type specimen book has survived
                        not only five centuries but also.</p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                <?php

$i = 1;

foreach ($sponsor as $partner) {

?>

                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img hny">
                                <a href="javascript:;"><img src="<?= base_url(); ?>uploads/<?= $partner['sponsor_logo']; ?>" alt="brand"></a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img hny">
                                <a href="javascript:;"><img src="img/brand/consta-citi.png" alt="brand"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img hny">
                                <a href="javascript:;"><img src="img/brand/swafe-logo.png" alt="brand"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img hny">
                                <a href="javascript:;"><img src="img/brand/welearn.png" alt="brand"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img hny">
                                <a href="javascript:;"><img src="img/brand/consta.png" alt="brand"></a>
                            </div>
                        </div>
                    </div> -->
                    <?php

$i++;
}

?>
                </div>
            </div>
        </div>
    </div>
</section>