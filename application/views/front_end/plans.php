<style>
    .logo-area {
        padding-bottom: 10px;
    }

    header.header {
        border-bottom: 1px solid #8c8c8c;
    }
</style>
<!--=====================================-->
<!--=   Breadcrumb     Start            =-->
<!--=====================================-->

<div class="breadcrumb-wrap breadcrumb-wrap-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Pricing </li>
            </ol>
        </nav>
    </div>
</div>
<!--=====================================-->
<!--=   Pricing     Start               =-->
<!--=====================================-->

<section class="pricing-wrap1">
    <div class="container">
        <div class="item-heading-center mb-20">
            <span class="section-subtitle">Price Table</span>
            <h2 class="section-title">Affortable Pricing Plan</h2>
            <div class="bg-title-wrap" style="display: block;">
                <span class="background-title solid">Pricing</span>
            </div>
        </div>
        <div class="row justify-content-center">

            <?php
            foreach ($package as $packdata):
                ?>

                <div class="col-xl-4 col-lg-6 col-md-6" style="margin-top: 15px;">
                    <div class="pricing-box1 wow zoomIn" data-wow-delay=".3s">
                        <div class="heading-title">
                            <h3 class="item-title">
                                <?= $packdata['packg_nm']; ?>
                            </h3>
                            <div class="item-price">
                                <?= currency() . number_format($packdata['packg_price']); ?>
                            </div>
                            <!-- <p>Shen an unknown printer took a galley of type and scrambled</p> -->
                        </div>
                        <div class="shape-img1">
                            <img src="<?= base_url(); ?>assets/front_assets/img/figure/shape16.svg" alt="shape" width="56"
                                height="64">
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li class="available"><i class="fas fa-check-circle"></i>
                                    <?= $packdata['packg_period']; ?>
                                    <?= $packdata['duration_unit']; ?>
                                </li>
                                <li class="available"><i class="fas fa-check-circle"></i>
                                    <?= $packdata['listing_limit']; ?>
                                    <?php echo $this->lang->line('ltr_listing'); ?>
                                </li>
                                <!-- <li class="available"><i class="fas fa-check-circle"></i>Free / Pro Ads</li>
                            <li><i class="fas fa-check-circle"></i>Custom Map Setup</li>
                            <li><i class="fas fa-check-circle"></i>Apps Integrated</li>
                            <li><i class="fas fa-check-circle"></i>Advanced Custom Field</li>
                            <li><i class="fas fa-check-circle"></i>Pro Features</li>
                        </ul> -->
                        
                        </div>
                        <div class="pricing-button">
                            <?php if (isset($_SESSION['id']) && !empty($_SESSION['id']) && $_SESSION['user_type'] != 'admin') { ?>
                                <form method="POST" action="<?= base_url('StripePayment/create');?>" >
                                    <input type="hidden"  class="paypaluser_id"
                                        value="<?= (!empty($_SESSION['id'])) ? $_SESSION['id'] : ''; ?>">
                                    <input type="hidden" name="planId" class="paypalpackage_id" value="<?= $packdata['id']; ?>">
                                    <input type="hidden" name="productName" class="paypalpname" value="<?= $packdata['packg_nm']; ?>">
                                    <input type="hidden" class="paypalpprice" name="amount" value="<?= $packdata['packg_price']; ?>">
                                    <input type="hidden" class="paypalpcurrency"
                                        value="<?= loop_select('id', loop_select('id', 2, 'currency_code', 'px_gateway'), 'currency_code', 'px_currencies'); ?>">
                                    <input type="hidden" class="defaultPcurrency"
                                        value="<?= loop_select('id', loop_select('id', 1, 'currency', 'px_owner_company'), 'currency_code', 'px_currencies'); ?>">
                                    <button type="submit"  class="item-btn stripeBtn"><?php echo $this->lang->line('ltr_get_started'); ?></button>
                                </form>

                            <?php } else if (isset($_SESSION['id']) && !empty($_SESSION['id']) && $_SESSION['user_type'] == 'admin') { ?>

                                    <!-- <a href="javascript:void(0);" class="item-btn">
                                    <?php echo $this->lang->line('ltr_get_started'); ?>
                                    </a> -->

                            <?php } else { ?>

                                    <a href="<?= base_url('login'); ?>" class="item-btn"><?php echo $this->lang->line('ltr_get_started'); ?></a>

                            <?php } ?>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>