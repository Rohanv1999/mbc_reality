
<style>
    .logo-area {
        padding-bottom: 10px;
    }
</style>
</div>
<!--=====================================-->
<!--=   Breadcrumb     Start            =-->
<!--=====================================-->

<div class="breadcrumb-wrap breadcrumb-wrap-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Our Properties</li>
            </ol>
        </nav>
    </div>
</div>


<!--=====================================-->
<!--=   Grid     Start                  =-->
<!--=====================================-->

<section class="grid-wrap1 grid-wrap2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sidebbr">
                    <div class="list-tit">
                        <h4>Property list</h4>
                    </div>
                    <div class="mini-cart-wrap">
                        <svg width="40px" viewBox="-419.84 -419.84 1863.68 1863.68" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" transform="rotate(0)" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0">
                                <path transform="translate(-419.84, -419.84), scale(116.48)" fill="#deba6b" d="M9.166.33a2.25 2.25 0 00-2.332 0l-5.25 3.182A2.25 2.25 0 00.5 5.436v5.128a2.25 2.25 0 001.084 1.924l5.25 3.182a2.25 2.25 0 002.332 0l5.25-3.182a2.25 2.25 0 001.084-1.924V5.436a2.25 2.25 0 00-1.084-1.924L9.166.33z" strokewidth="0"></path>
                            </g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M64 192h896v76.8H64V192z m0 281.6h896v76.8H64V473.6z m0 281.6h896V832H64v-76.8z" fill="##deba6b"></path>
                            </g>
                        </svg>
                    </div>
                </div>

            </div>
          
            <div class="col-lg-12">
                <div class="row justify-content-center">
                <?php  if($properties==[]){?>
                    
                    <div class="rs_page404 h-auto">
            			<div class="container">
            				<div class="rs_page404_content">
            					<div class="larg_text d-flex justify-content-center">
            						<img width="50%" src="<?=base_url();?>assets/front_assets/images/not-found.png" class="img-fluid" alt="">
            					</div>
            					<p class="text-center"><?php echo $this->lang->line('ltr_result_not_found');?></p>
            
            				</div>
            			</div>
            			
            		</div>
                    
                <?php }else{

                foreach($properties as $properties){?>
                    <div class="col-lg-4 col-md-4">
                        <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                            <div class="item-img">
                                <a href="<?= base_url(); ?>listing/<?= $properties['id']; ?>-<?= str_replace(",", "-", $properties['url_sluge']); ?>">
                                    
                                    <img src="<?= (json_decode(loop_select('property_id', $properties['id'], 'images', 'px_property_media'), true) ? base_url() . 'uploads/' . json_decode(loop_select('property_id', $properties['id'], 'images', 'px_property_media'), true)[0] : base_url() . 'assets/front_assets2/img/blog/blog4.jpg'); ?>" alt="blog" width="510" height="340">
                                    </a>
                                <div class="rent-price">
                                <?php if($properties['sale_price']):?>
                                <div class="item-price">
                          Sale Price <?=loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies'). $properties['sale_price'];?><span></span>
                            </div>
                            <?php endif;?>
                            <?php if($properties['rent_price']):?>
                            <div class="item-price">
                            Rent Price  <?=loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies'). $properties['rent_price'];?><span><i>/</i>mo</span>
                            </div>
                            <?php endif;?>

                                    
                                </div>
                                <div class="react-icon">
                                    <ul>
                                         <?php
                                
                                if ($this->session->userdata('id')) {
                                
                                ?>
                                <li>
                                    <a href="javascript:;" class="favourate"  data-bs-toggle="tooltip" f_id="<?= $properties['id']; ?>" data-bs-placement="top" title="Favourites">
                                
                                        <i id="property_<?= $properties['id']; ?>"  class="fas fa-heart <?= isset($_SESSION['id']) ? favorite_info($properties['id'], $_SESSION['id']): '';?>"></i>
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
                            <div class="item-category10"><a href="javascript:void(0);"><?= ($properties['propty_category'])? _getWhere('px_addcategory', ['id' => $properties['propty_category']])->category: '';?></a></div>
                            <div class="item-content">
                                <div class="verified-area">
                                    <h3 class="item-title"><a href="<?= base_url(); ?>listing/<?= $properties['id']; ?>-<?= str_replace(",", "-", $properties['url_sluge']); ?>"><?= $properties['property_name'];?></a></h3>
                                </div>
                                <div class="location-area"><i class="flaticon-maps-and-flags"></i><?= _getWhere('cities', ['id' => $properties['city']])->name . ', '.  _getWhere('px_states', ['id' => $properties['states']])->name;?></div>
                            </div>
                        </div>
                    </div>

                    <?php }}?>

                </div>
            
            </div>
        </div>
    </div>
</section>
<script>
    $(function() {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [0, 200],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));
    });
</script>