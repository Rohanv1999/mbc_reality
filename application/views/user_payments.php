                
                <!-- Container Start -->
                <div class="page-wrapper">
                    <div class="main-content">
                        <!-- Page Title Start -->
                        <div class="row">
                            <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-title-wrapper">
                                    <div class="page-title-box">
                                        <h4 class="page-title bold"><?php echo $this->lang->line('ltr_payments');?></h4>
                                    </div>
                                    <div class="breadcrumb-list">
                                        <ul>
                                            <li class="breadcrumb-link">
                                                <a href="<?=(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')?base_url('admin'):((isset($_SESSION['user_type']) && $_SESSION['user_type']=='agent')?base_url('agent'):'');?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard');?></a>
                                            </li>
                                            <li class="breadcrumb-link active"><?php echo $this->lang->line('ltr_payments');?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Real Estate table Start -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card table-card">
                                    <div class="card-header pb-0">
                                        <h4><?php echo $this->lang->line('ltr_payments');?></h4>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="chart-holder">
                                            <div class="error"></div>
                                            <table id="example" class="table table-striped table-bordered dt-responsive wrap data_table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th><?php echo $this->lang->line('ltr_payer_email');?></th>
                                                        <th><?php echo $this->lang->line('ltr_date');?></th>
                                                        <th><?php echo $this->lang->line('ltr_price');?></th>
                                                        <th><?php echo $this->lang->line('ltr_package_id');?></th>
                                                        <th><?php echo $this->lang->line('ltr_userid');?></th>
                                                        <th><?php echo $this->lang->line('ltr_transaction_id');?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $i=1;
                                                foreach($paymentData as $listrow){
                                                ?>
                                                    <tr>
                                                        <td><?=$i;?></td>
                                                        <td><?=$listrow['payer_email'];?></td>
                                                        <td><?=$listrow['add_date'];?></td>
                                                        <td><?=loop_select('id',loop_select('id',1,'currency','px_owner_company'),'currency_symbol','px_currencies');?> <?=$listrow['payment_gross'];?></td>
                                                        <td><?=loop_select('id',$listrow['product_id'],'packg_nm','px_packages');?></td>
                                                        <td><?=loop_select('id',$listrow['user_id'],'full_name','px_userdata');?></td>
                                                        <td><?=$listrow['txn_id'];?></td>
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