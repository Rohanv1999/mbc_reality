<style>
.hovered::before {
    color: red !important;
}
</style>

<section class="main-banner-wrap1" style='background-image: url("<?= base_url();?>assets/front_assets2/img/slider/slider4.jpg")' data-bg-image="<?= base_url();?>assets/front_assets2/img/slider/slider4.jpg">
    <span class="banner-shape1">
        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 1000 100" preserveaspectratio="none">
            <path class="banner-shpape-fill" d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,19.4,873.3,97.8,500,97z"></path>
        </svg>
    </span>
   
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="main-banner-box1">
                    <h1 class="item-title wow fadeInUp" data-wow-delay=".4s">Find the perfect place to Live
                        with your family</h1>

                    <div class="banner-search-wrap mb-3">
                        <div class="rld-main-search">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box">
                                        <form id="searchForm" action="<?= base_url('search-results');?>" method="POST">
                                            <div class="box-top">

                                                <div class="rld-single-select ml-22">
                                                    <select name="prop_category" onchange="fetchavlcity(this)" id="proCat" class="select single-select">
                                                        <?php $i = 0; foreach($categorys as $cat){?>
                                                            <option <?= ($i == 0) ? 'selected' : '' ;?> value="<?= $cat['id'];?>"><?= $cat['category'];?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                
                                                <div class="rld-single-select item">
                                                    <select name="city" class="select single-select mr-0" id="property-category-sale">
                                                        <option value="" selected disabled>Select City</option>
                                                        <?php
                                                foreach ($city as $category) {
                                                    // $cityInfo = _getWhere('cities', ['id' => $category['city']]);
                                                ?>
                                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>

                                                <?php  }   ?>
                                                    </select>
                                                </div>
                                                <div class="item rt-filter-btn">
                                                    <div class="filter-button-area">
                                                        <button class="filter-btn" type="button" id="searchBtn"  href="javascript:;"><span>Search</span><i class="fas fa-search"></i></button>
                                                        <!-- onclick="searchResults()" -->
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        
                                        <div class="explore__form-checkbox-list full-filter">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                                                    <div class="form-group bed">
                                                        <label class="item-bedrooms">Bedrooms</label>
                                                        <div class="nice-select form-control wide" tabindex="0">
                                                            <span class="current">Any</span>
                                                            <ul class="list">
                                                                <li data-value="1" class="option selected ">For
                                                                    Sale</li>
                                                                <li data-value="2" class="option">For Rent</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0 ">
                                                    <div class="form-group bath">
                                                        <label class="item-bath">Bathrooms</label>
                                                        <div class="nice-select form-control wide" tabindex="0">
                                                            <span class="current">Any</span>
                                                            <ul class="list">
                                                                <li data-value="1" class="option selected">1
                                                                </li>
                                                                <li data-value="2" class="option">2</li>
                                                                <li data-value="3" class="option">3</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 py-1 pl-0 pr-0">
                                                    <div class="form-group garage">
                                                        <label class="item-garage">Garage</label>
                                                        <div class="nice-select form-control wide" tabindex="0">
                                                            <span class="current">Any</span>
                                                            <ul class="list">
                                                                <li data-value="1" class="option selected">1
                                                                </li>
                                                                <li data-value="2" class="option">2</li>
                                                                <li data-value="3" class="option">3</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="main-search-field-2 col-12">
                                                    <div class="row">
                                                        <div class="col-md-6 pl-0">
                                                            <div class="price-range-wrapper">
                                                                <div class="range-box">
                                                                    <div class="price-label">Flat Size:</div>
                                                                    <div id="price-range-filter-3" class="price-range-filter"></div>
                                                                    <div class="price-filter-wrap d-flex align-items-center">
                                                                        <div class="price-range-select">
                                                                            <div class="price-range" id="price-range-min-3"></div>
                                                                            <div class="price-range">-</div>
                                                                            <div class="price-range" id="price-range-max-3"></div>
                                                                            <div class="price-range range-title">
                                                                                sft</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pl-0">
                                                            <div class="price-range-wrapper">
                                                                <div class="range-box">
                                                                    <div class="price-label">Distance:</div>
                                                                    <div id="price-range-filter-2" class="price-range-filter"></div>
                                                                    <div class="price-filter-wrap d-flex align-items-center">
                                                                        <div class="price-range-select">
                                                                            <div class="price-range" id="price-range-min-2"></div>
                                                                            <div class="price-range">-</div>
                                                                            <div class="price-range" id="price-range-max-2"></div>
                                                                            <div class="price-range range-title">
                                                                                km</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <h4 class="text-dark">Amenities</h4>
                                                        <ul class="no-ul-list third-row">
                                                            <li>
                                                                <input id="a-1" class="checkbox-custom" name="a-1" type="checkbox">
                                                                <label for="a-1" class="checkbox-custom-label">Air
                                                                    Condition</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-2" class="checkbox-custom" name="a-2" type="checkbox">
                                                                <label for="a-2" class="checkbox-custom-label">Bedding</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-3" class="checkbox-custom" name="a-3" type="checkbox">
                                                                <label for="a-3" class="checkbox-custom-label">Heating</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-4" class="checkbox-custom" name="a-4" type="checkbox">
                                                                <label for="a-4" class="checkbox-custom-label">Internet</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-5" class="checkbox-custom" name="a-5" type="checkbox">
                                                                <label for="a-5" class="checkbox-custom-label">Microwave</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-6" class="checkbox-custom" name="a-6" type="checkbox">
                                                                <label for="a-6" class="checkbox-custom-label">Smoking
                                                                    Allow</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-7" class="checkbox-custom" name="a-7" type="checkbox">
                                                                <label for="a-7" class="checkbox-custom-label">Terrace</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-8" class="checkbox-custom" name="a-8" type="checkbox">
                                                                <label for="a-8" class="checkbox-custom-label">Balcony</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-9" class="checkbox-custom" name="a-9" type="checkbox">
                                                                <label for="a-9" class="checkbox-custom-label">Balcony</label>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="filter-button">
                                                    <a href="javascript:;" class="filter-btn1">Apply Filter</a>
                                                    <a href="javascript:;" class="filter-btn1 reset-btn">Reset Filter<i class="fas fa-redo-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <p class="item-para wow fadeInUp" data-wow-delay=".4s">We’ve more than <span class="banner-p">54,000</span> apartments, place & plot.
                        </p> -->
                    </div>

                    <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-primary_hny  wow fadeInUp" data-wow-delay=".6s" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Calculator
                    </button> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!--=====================================-->
<!--=   Location     Start              =-->
<!--=====================================-->

<section class="location-wrap1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7">
                <div class="item-heading-left">
                    <span class="section-subtitle">Top Areas</span>
                    <h2 class="section-title">Popular areas in the world</h2>
                    <div class="bg-title-wrap" style="display: block;">
                        <span class="background-title solid">Locations</span>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-6 col-md-5">
                <div class="heading-button">
                    <a href="javascript:;" class="heading-btn item-btn-2">Explore More</a>
                </div>
            </div> -->
        </div>
        <div class="row">
            <?php  foreach ($popularAreas as $prop) : ?>
        
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="location-box3 wow zoomIn" data-wow-delay=".2s">
                            <div class="item-img">
                                <a href="javascript:;"><img src="<?= base_url();?>uploads/countries/<?=($prop['image'] != '')?$prop['image']: 'dummy_img.png'  ;?>" alt="location" width="520" height="440"></a>
                            </div>
                            <div class="item-content">
                                <div class="content-body">
                                    <div class="item-category"><?= count(_getWhere('px_properties', ['country' => $prop['id'], 'approve' => '1', 'activation' => '1'], 'yes')) ;?> properties</div>
                                    <div class="item-title">
                                        <form action="<?= base_url('country-listing');?>" method="POST">
                                    <input type="hidden" name="countryId" value="<?=$prop['id'] ;?>">
                                    
                                        <h3><a onclick="clickNext(this)" href="javascript:;"><?=$prop['name'] ;?></a><button class="d-none" type="submit"></button></h3>
                                        <script>
                                            function clickNext(elem){
                                                elem.nextElementSibling.click()
                                            }
                                        </script>
                                         </form>
                                    </div>
                                </div>
                                <div class="location-button">
                                    <form action="<?= base_url('country-listing');?>" method="POST">
                                    <input type="hidden" name="countryId" value="<?=$prop['id'] ;?>">
                                    <button type="submit" class="location-btn"><i class="fas fa-arrow-right"></i></button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach;?>
            </div>
           
    </div>
</section>


<!--=====================================-->
<!--=   Property     Start              =-->
<!--=====================================-->

<section class="property-wrap-8">
    <div class="container">
        <div class="item-heading-center">
            <span class="section-subtitle">OUR PROPERTIES</span>
            <h2 class="section-title">Our Featured Properties</h2>
            <div class="bg-title-wrap" style="display: block">
                <span class="background-title solid">Properties</span>
            </div>
        </div>
        <div class="row">
            <?php $second = 3;?>

            <?php  // echo '<pre>'; print_r($properties); 
            foreach ($properties as $prop) : ?>
                <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="property-box2 wow animated fadeInUp" data-wow-delay=".2s">
                    <div class="item-img">
                        <a href="<?= base_url(); ?>listing/<?= $prop['id']; ?>-<?= str_replace(",", "-", $prop['url_sluge']); ?>">
                        <img src="<?= (json_decode(loop_select('property_id', $prop['id'], 'images', 'px_property_media'), true) ? base_url() . 'uploads/' . json_decode(loop_select('property_id', $prop['id'], 'images', 'px_property_media'), true)[0] : base_url() . 'assets/front_assets2/img/blog/blog4.jpg'); ?>" width="510" height="340">

                        </a>
                        <?php if(isset($prop['badge']) && $prop['badge'] != ''):?>
                        <div class="item-category-box1">
                            <div class="item-category"><?= _getWhere('px_addbadge', ['id' => $prop['badge']])->badge;?></div>
                        </div>
                        <?php endif;?>
                        
                        <div class="rent-price">
                            <?php if($prop['sale_price']):?>
                            <div class="item-price">
                            <?=($properties[0]['purpose']=='1')?loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies').$properties[0]['sale_price']:loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies').$properties[0]['rent_price'].'/ <span>mo</span>';?><span></span>
                            </div>
                            <?php endif;?>
                          
                        </div>
                        <div class="react-icon">
                            <ul>
                            <?php
                                
                                if ($this->session->userdata('id')) {
                                
                                ?>
                                <li>
                                    <a href="javascript:;" class="favourate"  data-bs-toggle="tooltip" f_id="<?= $prop['id']; ?>" data-bs-placement="top" title="Favourites">
                                
                                        <i id="property_<?= $prop['id']; ?>"  class="fas fa-heart <?= isset($_SESSION['id']) ? favorite_info($prop['id'], $_SESSION['id']): '';?>"></i>
                                    </a>
                                </li>

                                <?php }?>
                                <!--<li>-->
                                <!--    <a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">-->
                                <!--        <i class="flaticon-left-and-right-arrows"></i>-->
                                <!--    </a>-->
                                <!--</li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="item-category10">
                        <a href="javascript:void(0);"><?= _getWhere('px_addcategory', ['id' => $prop['propty_category']])->category;?></a>
                    </div>
                    <div class="item-content">
                        <div class="verified-area">
                            <h3 class="item-title">
                                <a href="<?= base_url(); ?>listing/<?= $prop['id']; ?>-<?= str_replace(",", "-", $prop['url_sluge']); ?>"><?= $prop['property_name'];?></a>
                            </h3>
                        </div>
                        <div class="location-area">
                            <i class="flaticon-maps-and-flags"></i><?= _getWhere('cities', ['id' => $prop['city']])->name . ', '.  _getWhere('px_states', ['id' => $prop['states']])->name;?>
                        </div>

                    </div>
                </div>
            </div>
            <?php 
        endforeach;?>
        </div>
    </div>
</section>
<!--=====================================-->
<!--=   About     Start                 =-->
<!--=====================================-->

<section class="about-wrap1 motion-effects-wrap">
    <div class="shape-img1">
        <img src="<?= base_url();?>assets/front_assets2/img/svg/video-bg-2.svg" alt="shape" width="455" height="516">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-box1 wow fadeInLeft" data-wow-delay=".3s">
                    <div class="">
                        <div class="motion-effects1">
                            <img src="<?= base_url();?>assets/front_assets2/img/figure/shape7.png" alt="shape" width="95" height="87">
                        </div>
                        <div class="motion-effects2">
                            <img src="<?= base_url();?>assets/front_assets2/img/figure/shape8.png" alt="shape" width="90" height="46">
                        </div>
                    </div>
                    <div class="item-img">
                        <a href="javascript:;"><img src="<?= base_url();?>assets/front_assets2/img/blog/about8.jpg" alt="about" width="626" height="485"></a>
                    </div>
                    <!--<div class="play-button">-->
                    <!--    <div class="item-icon">-->
                    <!--        <a href="" class="play-btn play-btn-big">-->
                    <!--            <span class="play-icon style-2">-->
                    <!--                <i class="fas fa-play"></i>-->
                    <!--            </span>-->
                    <!--        </a>-->
                    <!--    </div>-->

                    <!--</div>-->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-box2 wow fadeInRight" data-wow-delay=".5s">
                    <div class="item-heading-left mb-bottom">
                        <span class="section-subtitle">ABOUT COMPANY</span>
                        <h2 class="section-title">Welcome To MBC Realty</h2>
                        <div class="bg-title-wrap" style="display: block;">
                            <span class="background-title solid">ABOUT</span>
                        </div>
                    </div>

                    <p class="aboy_hny">In year 2008 when the collapse of the global economy were being felt in Dubai too but that time <strong>MBCREALTY</strong> only company who strongly committed to our client with pay back money no dues towards any bank and market across the globe. <br><br> <strong>MBCREALTY</strong> group committed to our clients in worst level of financial crises when all other companies have major issue and shutting down their business.</p>

                    <div class="about-button">
                        <a href="<?= base_url('about-us'); ?>" class="item-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- package section end  -->

<section class="property-wrap-80">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7 col-sm-12">
                <div class="item-heading-left">
                    <span class="section-subtitle">Top Visa</span>
                    <h2 class="section-title">Find Your Visa</h2>
                    <div class="bg-title-wrap" style="display: block;">
                        <span class="background-title solid">Visa</span>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-6 col-md-5 col-sm-12">
                <div class="heading-button">
                    <a href="javascript:;" class="heading-btn item-btn-2">Explore More</a>
                </div>
            </div> -->
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-6">
                <div class="location-box1 wow zoomIn" data-wow-delay=".2s">
                    <div class="item-img">
                        <a href="javascript:void(0)"><img src="<?= base_url();?>assets/front_assets2/img/blog/location1.jpg" alt="location" width="510" height="660"></a>
                    </div>
                    <div class="item-content">
                        <div class="content-body">

                            <div class="item-title">
                                <h3><a href="javascript:void(0)">Transit Visa</a></h3>
                            </div>
                        </div>
                        <div class="location-button">
                            <a data-id="1" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop"  class="location-btn modalBtn"><i class="fas fa-arrow-right"></i>   </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-6">
                <div class="location-box1 wow zoomIn" data-wow-delay=".6s">
                    <div class="item-img">
                        <a href="javascript:void(0)"><img src="<?= base_url();?>assets/front_assets2/img/blog/location2.jpg" alt="location" width="510" height="660"></a>
                    </div>
                    <div class="item-content">
                        <div class="content-body">
                            <div class="item-title">
                                <h3><a href="javascript:void(0)">Visit Visa</a></h3>
                            </div>
                        </div>
                        <div class="location-button">
                            <a data-id="2" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="location-btn modalBtn"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-6">
                <div class="location-box1 wow zoomIn" data-wow-delay=".4s">
                    <div class="item-img">
                        <a  href="javascript:void(0)"><img src="<?= base_url();?>assets/front_assets2/img/blog/location3.jpg" alt="location" width="510" height="660"></a>
                    </div>
                    <div class="item-content">
                        <div class="content-body">
                            <div class="item-title">
                                <h3><a href="javascript:void(0)">Golden Visa</a></h3>
                            </div>
                        </div>
                        <div class="location-button">
                            <a data-id="3" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="location-btn modalBtn"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-6">
                <div class="location-box1 wow zoomIn" data-wow-delay=".2s">
                    <div class="item-img">
                        <a href="javascript:void(0)"><img src="<?= base_url();?>assets/front_assets2/img/blog/location4.jpg" alt="location" width="510" height="660"></a>
                    </div>
                    <div class="item-content">
                        <div class="content-body">
                            <div class="item-title">
                                <h3><a href="javascript:void(0)">EM Visa</a></h3>
                            </div>
                        </div>
                        <div class="location-button">
                            <a data-id="4" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="location-btn modalBtn"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=====================================-->
<!--=   Property     Start              =-->
<!--=====================================-->

<section class="property-wrap-6">
    <div class="container">
        <div class="item-heading-center mb-20">
            <span class="section-subtitle">Bank mortgages</span>
            <h2 class="section-title">MBC Home Loan Program</h2>
            <div class="bg-title-wrap" style="display: block;">
                <span class="background-title solid">Mortgages</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-9 mx-auto">
                <div class="property-box2 property-box5 wow animated fadeInUp" data-wow-delay=".6s">
                    <div class="item-img">
                        <a href="mortgage.php"><img src="<?= base_url();?>assets/front_assets2/img/blog/blog29.jpg" alt="blog" width="220" height="170"></a>
                        <div class="react-icon">
                            <ul>
                                <li>
                                    <a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <i class="flaticon-left-and-right-arrows"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item-content item-content-property">
                        <div class="verified-area">
                            <h3 class="item-title"><a href="mortgage.php">Home Purchase Mortgage</a></h3>
                        </div>
                        <div class="location-area"><i class="flaticon-maps-and-flags"></i>Dubai</div>
                        <div class="item-categoery5">
                            <p>This is the most common type of mortgage, designed for individuals looking to buy a residential property. </p>
                        </div>
                        <div class="blog-button">
                            <a href="mortgage.php" class="item-btn">Purchase Now<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-9 mx-auto">
                <div class="property-box2 property-box5 wow animated fadeInUp" data-wow-delay=".6s">
                    <div class="item-img">
                        <a href="mortgage.php"><img src="<?= base_url();?>assets/front_assets2/img/blog/blog30.jpg" alt="blog" width="220" height="170"></a>
                        <div class="react-icon">
                            <ul>
                                <li>
                                    <a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <i class="flaticon-left-and-right-arrows"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item-content item-content-property">
                        <div class="verified-area">
                            <h3 class="item-title"><a href="mortgage.php">Home Refinance Mortgage</a></h3>
                        </div>
                        <div class="location-area"><i class="flaticon-maps-and-flags"></i>Dubai</div>
                        <div class="item-categoery5">
                            <p>Homeowners with existing mortgages in Dubai may opt for a refinance mortgage to replace their current loan with a new one.</p>
                        </div>
                        <div class="blog-button">
                            <a href="mortgage.php" class="item-btn">Purchase Now<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-9 mx-auto">
                <div class="property-box2 property-box5 wow animated fadeInUp" data-wow-delay=".6s">
                    <div class="item-img">
                        <a href="mortgage.php"><img src="<?= base_url();?>assets/front_assets2/img/blog/blog31.jpg" alt="blog" width="220" height="170"></a>
                        <div class="react-icon">
                            <ul>
                                <li>
                                    <a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <i class="flaticon-left-and-right-arrows"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item-content item-content-property">
                        <div class="verified-area">
                            <h3 class="item-title"><a href="mortgage.php">Buy-to-Let Mortgage</a></h3>
                        </div>
                        <div class="location-area"><i class="flaticon-maps-and-flags"></i>Dubai</div>
                        <div class="item-categoery5">
                            <p>Similar to what I mentioned earlier, this type of mortgage is tailored for investors purchasing a property with the intention of renting it out.</p>
                        </div>
                        <div class="blog-button">
                            <a href="mortgage.php" class="item-btn">Purchase Now<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-9 mx-auto">
                <div class="property-box2 property-box5 wow animated fadeInUp" data-wow-delay=".6s">
                    <div class="item-img">
                        <a href="mortgage.php"><img src="<?= base_url();?>assets/front_assets2/img/blog/blog32.jpg" alt="blog" width="220" height="170"></a>
                        <div class="react-icon">
                            <ul>
                                <li>
                                    <a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <i class="flaticon-left-and-right-arrows"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item-content item-content-property">
                        <div class="verified-area">
                            <h3 class="item-title"><a href="mortgage.php">Equity Release Mortgage</a></h3>
                        </div>
                        <div class="location-area"><i class="flaticon-maps-and-flags"></i>Dubai</div>
                        <div class="item-categoery5">
                            <p>Also known as a home equity loan, this type of mortgage allows homeowners to release some of the equity in their property as cash. </p>
                        </div>
                        <div class="blog-button">
                            <a href="mortgage.php" class="item-btn">Purchase Now<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            <!-- <div class="property-button">
                <a href="mortgage.php" class="item-btn">View Mortgages</a>
            </div> -->
    </div>
</section>



<!--=====================================-->
<!--=   licence to work     Start   =-->
<!--=====================================-->
<section class="about-wrap-5 counter-appear motion-effects-wrap">
    <div class="container">
        <div class="item-element-shape">
            <ul>
                <li><img class="wow animated fadeInRight" data-wow-delay=".4s" src="<?= base_url();?>assets/front_assets2/img/figure/shape30.svg" width="312" height="295" alt="shape"></li>
                <li><img class="motion-effects12" src="<?= base_url();?>assets/front_assets2/img/figure/shape31.svg" width="155" height="92" alt="shape"></li>
                <li><img src="<?= base_url();?>assets/front_assets2/img/figure/shape32.svg" width="575" height="162" alt="shape"></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="about-box-9 wow animated fadeInLeft" data-wow-delay=".5s">
                    <div class="item-img">
                        <img src="<?= base_url();?>assets/front_assets2/img/blog/about2.png" alt="shape" width="567" height="572">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-box-10 wow animated fadeInRight" data-wow-delay=".3s">
                    <div class="item-heading-left mb-bottom">
                        <span class="section-subtitle">Licence To Work</span>
                        <h2 class="section-title">Dubai Work Visas & Permits</h2>
                        <div class="bg-title-wrap" style="display: block;">
                            <span class="background-title solid">Licence</span>
                        </div>
                        <p class="lic_work_hny">Sometimes referred to as the "City of Gold," Dubai is the largest city in the United Arab Emirates and a thriving location for business. If your company is planning to expand abroad, Dubai will be an excellent choice of location due to the growing economy and relative ease of obtaining work permits for any foreign employees who are willing to make the move. Even so, it can be helpful to have an experienced global PEO on your side to make sure the process of obtaining visas and permits is as smooth as possible.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="about-svg-shape">
                                <img src="<?= base_url();?>assets/front_assets2/img/figure/shape29.svg" alt="svg" width="30px">
                                <div class="item-content">
                                    <div class="item-content">
                                        <p> Dubai (UAE) – Employer of Record </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="about-svg-shape">
                                <img src="<?= base_url();?>assets/front_assets2/img/figure/shape29.svg" alt="svg" width="30px">
                                <div class="item-content">
                                    <p> Dubai Compensation & Benefits </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>Sometimes referred to as the "City of Gold," Dubai is the largest city in the United Arab Emirates and a thriving location for business.
                    </p>
                    <div class="banner-button about-button-2">
                        <a href="licence-work-visa.php" class="banner-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=====================================-->
<!--=   About     Start                 =-->
<!--=====================================-->

<section class="about-wrap-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="about-box5 wow fadeInUp" data-wow-delay=".2s">
                    <div class="item-heading-left mb-bottom">
                        <span class="section-subtitle">Let’s Take a Tour</span>
                        <h2 class="section-title">Consultation</h2>
                    </div>
                    <p>Over 39,000 people work for us in more than 70 countries all over the
                        This breadth of global coverage.
                    </p>
                    <div class="about-shape">
                        <div class="choose-shape1">
                            <a href="javascript:;"><img src="<?= base_url();?>assets/front_assets2/img/figure/shape7.svg" alt="shape" width="38" height="48"></a>
                        </div>
                        <div class="item-content">
                            <h3 class="item-title">Property Valuation and Appraisal</h3>
                            <p class="process_hny">Assisting buyers and sellers in the process of buying or selling properties, negotiating deals, and handling paperwork.
                            </p>
                        </div>
                    </div>
                    <div class="about-shape">
                        <div class="choose-shape1">
                            <a href="javascript:;"><img src="<?= base_url();?>assets/front_assets2/img/figure/shape8.svg" alt="shape" width="38" height="48"></a>
                        </div>
                        <div class="item-content">
                            <h3 class="item-title">Property Management Services</h3>
                            <p class="process_hny"> Managing and maintaining properties on behalf of landlords, including tenant sourcing, rent collection, and property maintenance.
                            </p>
                        </div>
                    </div>
                    <div class="about-shape">
                        <div class="choose-shape1">
                            <a href="javascript:;"><img src="<?= base_url();?>assets/front_assets2/img/figure/shape9.svg" alt="shape" width="38" height="48"></a>
                        </div>
                        <div class="item-content">
                            <h3 class="item-title">Market Research and Analysis</h3>
                            <p class="process_hny">Conducting in-depth market research and analysis to help clients make informed decisions about property investments.
                            </p>
                        </div>
                    </div>
                    <div class="banner-button about-button-2">
                        <a href="consultation-detail.php" class="banner-btn">Read More</a>
                    </div>
                </div>
            </div>
            <div class="offset-lg-1 col-lg-6">
                <div class="about-box8">
                    <div class="about-img-style-1">
                        <img src="<?= base_url();?>assets/front_assets2/img/blog/about10.jpg" alt="blog" width="364" height="577">
                        <div class="shape-img1 fa-spin">
                            <img src="<?= base_url();?>assets/front_assets2/img/figure/shape6.svg" alt="shape" width="156" height="156">
                        </div>
                    </div>
                    <div class="about-img-style-2">
                        <img src="<?= base_url();?>assets/front_assets2/img/blog/about11.jpg" alt="blog" width="344" height="391">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="about-img-style-6">
                                    <img src="<?= base_url();?>assets/front_assets2/img/blog/about12.jpg" alt="blog" width="345" height="231">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--=====================================-->
<!--=   Testimonial     Start           =-->
<!--=====================================-->

<section class="testimonial-wrap2 mt-5">
    <div class="container">

        <!-- Slides -->

        <div class="row align-items-center">
            <div class="col-lg-8 col-md-12">
                <div class="testimonial-box2 wow fadeInLeft" data-wow-delay=".3s">
                    <div class="testimonial-heading">
                        <span class="section-subtitle"><?=loop_select('section_name','Clients Say','section_name','px_homepage');?></span>
                        <h2 class="section-title"><?=loop_select('section_name','Clients Say','main_heading','px_homepage');?></h2>
                        <p class="text-light"><?=loop_select('section_name','Clients Say','main_content','px_homepage');?></p>
                        <div class="bg-title-wrap" style="display: block;">
                            <span class="background-title solid">Testimonials</span>
                        </div>
                    </div>
                    <div class="testimonial-layout2 swiper-container">
                        <div class="swiper-wrapper">
                            <?php foreach ($testimonial as $test) :?>
                            <div class="swiper-slide">
                                <div class="single-test">
                                    <div class="item-quotation">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <p >“<?=$test['testimonial'] ;?>”</p>
                                    
                                    <!-- <ul class="item-rating">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul> -->
                                    <div class="d-flex">
                                        <img style="border-radius:50%; width:50px;margin-right: 5px; height:50px;" src="<?= base_url() ;?>uploads/<?= $test['client_image'];?>" alt="">
                                       <div class="item-title">
                                           <h3 style="line-height: 28px;"><?=$test['client_name'] ;?></h3>
                                           <small class="mb-2 text-light"><?=$test['post'] ;?></small>

                                       </div>
                                    </div>


                                </div>
                            </div>
                            <?php endforeach;?>
                            <!-- <div class="swiper-slide">
                                <div class="single-test">
                                    <div class="item-quotation">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <p>“ Working with MBC Realty has been an absolute pleasure and a game-changer in my real estate journey. From the very first meeting, it was evident that MBC Realty is a team of dedicated professionals who are passionate about their clients' dreams. ”</p>
                                    <ul class="item-rating">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="item-title">
                                        <h3>Maria Zokatti </h3>
                                    </div>


                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-test">
                                    <div class="item-quotation">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <p>“ Their knowledge of the local market was impressive, and they provided valuable insights that helped me make informed decisions. Whenever I had questions or needed guidance, they were always available with a friendly and patient attitude. ”</p>
                                    <ul class="item-rating">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="item-title">
                                        <h3>Maria Zokatti </h3>
                                    </div>

                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-test">
                                    <div class="item-quotation">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <p>“ What sets MBC Realty apart is their unwavering commitment to their clients. They went above and beyond to ensure that I found not just a house but a place I could call my home. Their negotiation skills were top-notch, and they worked tirelessly to secure the best deal possible.”</p>
                                    <ul class="item-rating">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="item-title">
                                        <h3>Maria Zokatti </h3>
                                    </div>


                                </div>
                            </div> -->
                        </div>

                        <div class="swiper-button-prev testimonial-btn"></div>
                        <div class="swiper-button-next testimonial-btn"></div>
                    </div>


                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="testimonial-img-2 wow fadeInRight" data-wow-delay=".2s">
                    <img src="<?= base_url();?>assets/front_assets2/img/blog/testimonial2.jpg" alt="blog" width="690" height="730">
                </div>
            </div>

        </div>


    </div>
    <!-- Slider main container -->


</section>
<!--=====================================-->
<!--=   Blog     Start                  =-->
<!--=====================================-->

<section class="blog-wrap1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-8">
                <div class="item-heading-left">
                    <span class="section-subtitle">What’s New Trending</span>
                    <h2 class="section-title">Latest Blog & Posts</h2>
                    <div class="bg-title-wrap" style="display: block;">
                        <span class="background-title solid">Blogs</span>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-4">
                <div class="heading-button">
                    <a href="blog.php" class="heading-btn">See All Blogs</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="blog-box1 wow fadeInUp" data-wow-delay=".4s">
                    <div class="item-img">
                        <a href="blog.php"><img src="<?= base_url();?>assets/front_assets2/img/blog/blog1.jpg" alt="blog" width="520" height="350"></a>
                    </div>
                    <div class="thumbnail-date">
                        <div class="popup-date">
                            <span class="day">13</span><span class="month">Aug</span>
                        </div>
                    </div>
                    <div class="item-content">
                        <div class="entry-meta">
                            <ul>
                                <li><a href="blog.php">Apartment, Room</a></li>
                                <li><a href="blog.php">5 min</a></li>
                            </ul>
                        </div>
                        <div class="heading-title">
                            <h3><a href="blog.php">How To Do Market Research For to Sell Faster</a></h3>
                        </div>
                        <div class="blog-button">
                            <a href="blog.php" class="item-btn">Read More<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-box1 wow fadeInUp" data-wow-delay=".3s">
                    <div class="item-img">
                        <a href="blog.php"><img src="<?= base_url();?>assets/front_assets2/img/blog/blog2.jpg" alt="blog" width="520" height="350"></a>
                    </div>
                    <div class="thumbnail-date">
                        <div class="popup-date">
                            <span class="day">13</span><span class="month">Aug</span>
                        </div>
                    </div>
                    <div class="item-content">
                        <div class="entry-meta">
                            <ul>
                                <li><a href="blog.php">Building, Room</a></li>
                                <li><a href="blog.php">4 min</a></li>
                            </ul>
                        </div>
                        <div class="heading-title">
                            <h3><a href="blog.php">Develop Relationships With Human Resource</a></h3>
                        </div>
                        <div class="blog-button">
                            <a href="blog.php" class="item-btn">Read More<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-box1 wow fadeInUp" data-wow-delay=".2s">
                    <div class="item-img">
                        <a href="blog.php"><img src="<?= base_url();?>assets/front_assets2/img/blog/blog3.jpg" alt="blog" width="520" height="350"></a>
                    </div>
                    <div class="thumbnail-date">
                        <div class="popup-date">
                            <span class="day">13</span><span class="month">Aug</span>
                        </div>
                    </div>
                    <div class="item-content">
                        <div class="entry-meta">
                            <ul>
                                <li><a href="blog.php">Entertainment, Room</a></li>
                                <li><a href="blog.php">3 min</a></li>
                            </ul>
                        </div>
                        <div class="heading-title">
                            <h3><a href="blog.php">Unique Real Estate Marketing: Have A Tent Business Card</a></h3>
                        </div>
                        <div class="blog-button">
                            <a href="blog.php" class="item-btn">Read More<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
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
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img hny">
                                <a href="javascript:;"><img src="<?= base_url();?>assets/front_assets2/img/brand/align.png" alt="brand"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img hny">
                                <a href="javascript:;"><img src="<?= base_url();?>assets/front_assets2/img/brand/consta-citi.png" alt="brand"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img hny">
                                <a href="javascript:;"><img src="<?= base_url();?>assets/front_assets2/img/brand/swafe-logo.png" alt="brand"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img hny">
                                <a href="javascript:;"><img src="<?= base_url();?>assets/front_assets2/img/brand/welearn.png" alt="brand"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img hny">
                                <a href="javascript:;"><img src="<?= base_url();?>assets/front_assets2/img/brand/consta.png" alt="brand"></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================-->
<!--=   Banner     Start                =-->
<!--=====================================-->
<?php if (!isset($_SESSION['user_type'])  ||  (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'agent')) { ?>
<section class="banner-collection1 motion-effects-wrap" data-wow-delay=".2s">
    <div class="shape-img1">
        <img src="<?= base_url();?>assets/front_assets2/img/svg/video-bg-2.svg" alt="figure" height="149" width="230">
    </div>
    <div class="shape-img2">
        <img src="<?= base_url();?>assets/front_assets2/img/svg/video-bg-2.svg" alt="figure" height="149" width="230">
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-7">
                <div class="banner-box1">
                    <div class="item-img">
                        <img src="<?= base_url();?>assets/front_assets2/img/banner/banner1.png" alt="banner" height="252" width="169" class="img-bg-space">
                        <div class="motion-effects3"><img src="<?= base_url();?>assets/front_assets2/img/figure/shape3.png" alt="shape" height="113" width="113"></div>
                        <div class="motion-effects4"><img src="<?= base_url();?>assets/front_assets2/img/figure/shape4.png" alt="shape" height="157" width="154"></div>
                        <div class="motion-effects5"><img src="<?= base_url();?>assets/front_assets2/img/figure/shape5.png" alt="shape" height="91" width="102"></div>
                    </div>
                    <div class="item-content">
                        <h2 class="heading-title">Become a Real Estate Agent</h2>
                        <p>We only work with the best companies around the globe to survey</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="banner-button">
                    <a href="<?= base_url('login') ?>" class="banner-btn">Register Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php }?>

<!-- inquiry modal  -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Vissa Enquiry</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="inqForm" method="POST" action="<?= base_url('submit-query');?>">
        <input type="hidden" id="url" value="<?= base_url('submit-query');?>">
            <div class="row col-lg-12">
            <div class="mb-3 col-md-6">
                <label for="fname" class="form-label">First Name</label>
                <input name="fname" type="text" class="form-control" id="fname">
                <div id="fnameerr" class="form-text tet-danger"></div>
            </div>
            <div class="mb-3 col-md-6">
                <label for="lname" class="form-label">Last Name</label>
                <input name="lname" type="text" class="form-control" id="lname">
                <div id="lnameerr" class="form-text tet-danger"></div>
            </div>
            </div>
           
            <div class="mb-3">
                <label for="emailInp" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="emailInp">
                <div id="emailerr" class="form-text tet-danger"></div>
            </div>
            <div class="row col-lg-12">
                <div class="mb-3 col-md-6">
                    <label for="mobileInp" class="form-label">Mobile</label>
                    <input name="mobile" type="text" oninput="this.value = this.value.replace(/\D+/g, '')" class="form-control" id="mobileInp">
                    <div id="mobileerr" class="form-text tet-danger"></div>
                </div>
                <div class=" col-md-6">
                    <label for="typeSelect2" class="form-label">Visa Type</label>
                    <select name="visa_type" id="typeSelect2" class="form-select" >
                        <option data-id="1" value="Transit Visa">Transit Visa</option>
                        <option data-id="2" value="Visit Visa">Visit Visa</option>
                        <option data-id="3" value="Golden Visa">Golden Visa</option>
                        <option data-id="4" value="EM Visa">EM Visa</option>
                    </select>
                    <div id="selecterr" class="form-text tet-danger"></div>
                </div>
                
            </div>

            <div class="mb-3">
                <label for="queryInp" class="form-label">Query</label>
                <textarea name="msg"  id="queryInp"class="form-control" cols="30" rows="3"></textarea>
                <div id="msgerr" class="form-text tet-danger"></div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>
<script>
function fetchavlcity(elem){
        console.log('dfj    ')
        var catId = $('#proCat').val();
        
            $.ajax({
              type: 'POST',
              url: "<?= base_url('homePage/fetchavlblcity');?>",
              data: {cat : catId},
              success: function (data) {
                data =JSON.parse(data )
               console.log(data)
               var html = '<option value="" selected="" disabled="">Select City</option>';
               data.forEach(element => {
                html += '<option value = "'+element.id+'">'+element.name+'</option>';
               });
               console.log(html)
               $('#property-category-sale').html(html)
             
              },
        
            
            });
        }
</script>