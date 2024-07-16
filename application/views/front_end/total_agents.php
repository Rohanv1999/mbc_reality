
        <!--===Page Heading Start===-->

        <section class="page-heading">

            <h1><?php echo $this->lang->line('ltr_our_agents');?></h1>

            <a href="<?=base_url();?>"><?php echo $this->lang->line('ltr_home');?></a><span>&nbsp; // <?php echo $this->lang->line('ltr_our_agents');?></span>

        </section>

        <!--===Page Heading End===-->

<!--===Popular Listing Section Start===-->

<section class="listing-wrapper">

    <div class="container">

        <div id="property_cards" class="row">

        <?php

        foreach($agents as $agents){

        ?>

        <div class="col-lg-4 col-md-6 col-12">

            <div class="card agent_card mb-5">

                <img height="348" src="<?=(isset($agents['profile_photo']) && !empty($agents['profile_photo']))?base_url().'uploads/'.$agents['profile_photo']:base_url().'assets/front_assets/images/no-ava.jpeg';?>">

                

                <div class="card-detail">

                <a href="<?=base_url();?>member/<?=$agents['id'];?>-<?=str_replace(" ","-",$agents['full_name']);?>"><h5><?=$agents['full_name'];?><br><span><?php echo $this->lang->line('ltr_company_agent');?></span></h5></a>

                </div>
                
                <div class="team-social-links">

                <a href="https://<?php echo $agents['fb_link'];?>"><i class="fab fa-facebook-f"></i></a>

                <a href="https://<?php echo $agents['insta_link'];?>"><i class="fab fa-instagram"></i></a>

                <a href="https://<?php echo $agents['twitter_link'];?>"><i class="fab fa-twitter"></i></a>

                <a href="https://<?php echo $agents['linkedin_link'];?>"><i class="fab fa-linkedin-in"></i></a>

                </div>

            </div>

        </div>

        <?php

        }

        ?>

            

        </div>

    </div>

</section>

<!--===Popular Listing Section End===-->