<!-- Sidebar Start -->
        <aside class="sidebar-wrapper">
			<div class="logo-wrapper">
				<a href="<?=base_url();?>" class="admin-logo">
                <img src="<?=base_url();?>uploads/<?=front_common2()['main_logo2'][0]['main_logo2'];?>" alt="" class="sp_logo"><span></span>
				</a>
			</div>
            <div class="side-menu-wrap">
                <ul class="main-menu">
                    <li>
                        <?php $url = base_url('agent'); ?>
                        <a href="<?php echo base_url('agent'); ?>" class="active">
                            <span class="icon-menu feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            </span>
                            <span class="menu-text">
                                <?php echo $this->lang->line('ltr_dashboard');?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('agent/real-estate');?>">
                            <span class="icon-menu feather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                            </span>
                            <span class="menu-text">
                                <?php echo $this->lang->line('ltr_listing');?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('agent/inquiries');?>">
                            <span class="icon-menu feather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            </span>
                            <span class="menu-text">
                                <?php echo $this->lang->line('ltr_inquiries');?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('agent/agent-package');?>">
                            <span class="icon-menu feather-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                            </span>
                            <span class="menu-text">
                                <?php echo $this->lang->line('ltr_my_packages');?>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>