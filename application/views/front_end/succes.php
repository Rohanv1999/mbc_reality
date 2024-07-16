<section class="main-banner-wrap1" style='background-image: url("<?= base_url();?>assets/front_assets2/img/slider/slider4.jpg")' data-bg-image="<?= base_url();?>assets/front_assets2/img/slider/slider4.jpg">
    <div class="container successCont">
        <div class="cont">
            <img width="100px;" src="<?= base_url();?>assets/images/YbIni.png" alt="">
            <h3>Transaction Successfull</h3>
        </div>
    </div>
</section>


<style>
    .cont{
        background-color: #ffffff96;
        width: 75%;
        height: 241px;
        width: 75%;
        flex-direction: column;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .successCont {
        min-height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<script>
    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id']) && $_SESSION['user_type'] == 'agent') { ?>
        setTimeout(() => {
            window.location.href = '<?= base_url('agent');?>';
        }, 1000);
    <?php  }else if(isset($_SESSION['id']) && !empty($_SESSION['id']) && $_SESSION['user_type'] == 'user'){ ?>
       setTimeout(() => {
           window.location.href = '<?= base_url('user/submit-listing');?>'
       }, 1000);
    <?php }?>
</script> 