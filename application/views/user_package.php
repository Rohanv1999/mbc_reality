                
                <!-- Container Start -->
                <div class="page-wrapper">
                    <div class="main-content">
                        <!-- Page Title Start -->
                        <div class="row">
                            <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-title-wrapper">
                                    <div class="page-title-box">
                                        <h4 class="page-title bold">My Packages</h4>
                                    </div>
                                    <div class="breadcrumb-list">
                                        <ul>
                                            <li class="breadcrumb-link">
                                                <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>
                                            </li>
                                            <li class="breadcrumb-link active">My Packages</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="error"></div>
                        <!-- Real Estate table Start -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card table-card">
                                    <div class="card-header pb-0">
                                        <!-- <h4>My Packages</h4> -->
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="chart-holder">
                                        <?php
                                        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin'){
                                        ?>
                                            <div class="form-group">
                                                <a href="<?=base_url('admin/edit-team');?>" class="btn btn-primary squer-btn mt-2 mr-2 mb-2"><?php echo $this->lang->line('ltr_add_agent');?></a>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                            <table id="example" class="table table-striped table-bordered dt-responsive wrap data_table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
														<th><?php echo $this->lang->line('ltr_full_name');?></th>
                                                        <th><?php echo $this->lang->line('ltr_agent_email');?></th>
                                                        <th><?php echo $this->lang->line('ltr_package_name');?></th>
                                                        <th><?php echo $this->lang->line('ltr_package_expiry_date');?></th>
                                                        <th><?php echo $this->lang->line('ltr_package_period');?></th>
                                                        <th><?php echo $this->lang->line('ltr_listing_limit');?></th>
                                                        <th><?php echo $this->lang->line('ltr_current_listing');?></th>
                                                        <th><?php echo $this->lang->line('ltr_package_price');?></th>
                                                        <?php
                                                        if($_SESSION['user_type']=='admin'){
                                                        ?>
														<th><?php echo $this->lang->line('ltr_status');?></th>
                                                        <th><?php echo $this->lang->line('ltr_action');?></th>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $i=1;
                                                foreach($user_package as $listrow){
                                                ?>
                                                    <tr>
                                                        <td><?=$i;?></td>
														<td><?=$listrow['full_name'];?></td>
                                                        <td><?=$listrow['email'];?></td>
                                                        <td><?=$listrow['packg_nm'];?></td>
                                                        <td><?=$listrow['package_expiry'];?></td>
                                                        <td><?=$listrow['packg_period'];?> <?=$listrow['duration_unit'];?></td>
                                                        <td><?=$listrow['listing_limit'];?></td>
                                                        <td><?=row_count('agent',$listrow['id'],'px_properties');?></td>
														<td><?=$listrow['packg_price'];?> <?php echo $listrow['packg_price']?loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies'):'';?></td>
                                                        <?php
                                                        if($_SESSION['user_type']=='admin'){
                                                        ?>
														<td>
														<label class="switch">
                                                        <input id="agent_status<?=$listrow['id'];?>" class="switch_button" rowid="<?=$listrow['id'];?>" tables="px_userdata" type="checkbox" <?php if(isset($listrow['status']) && $listrow['status']=="1") { echo "checked"; } ?>>
                                                        <span class="slider round"></span>
														</label>
														</td>
                                                        <td class="">
                                                            <div class="relative">
                                                                <a class="action-btn " href="javascript:void(0); ">
                                                                    <svg class="default-size "  viewBox="0 0 341.333 341.333 ">
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <path d="M170.667,85.333c23.573,0,42.667-19.093,42.667-42.667C213.333,19.093,194.24,0,170.667,0S128,19.093,128,42.667 C128,66.24,147.093,85.333,170.667,85.333z "></path>
                                                                                    <path d="M170.667,128C147.093,128,128,147.093,128,170.667s19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 S194.24,128,170.667,128z "></path>
                                                                                    <path d="M170.667,256C147.093,256,128,275.093,128,298.667c0,23.573,19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 C213.333,275.093,194.24,256,170.667,256z "></path>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                </a>
                                                                <div class="action-option ">
                                                                    <ul>
                                                                        <li>
                                                                            <a href="<?=base_url('admin/edit-team')?>?uid=<?=$listrow['id'];?>"><i class="far fa-edit mr-2 getid"></i><?php echo $this->lang->line('ltr_edit');?></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php
                                                $i++;
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>