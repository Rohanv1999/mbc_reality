 				<div class="ad-footer-btm">
					<p>© <?php echo $this->lang->line('ltr_all_rights_reserved');?></p>
				</div>
            </div>
        </div>
    </div>
    
    
    	<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 378.303 378.303" xml:space="preserve"><polygon points="378.303,28.285 350.018,0 189.151,160.867 28.285,0 0,28.285 160.867,189.151 0,350.018 28.285,378.302 189.151,217.436 350.018,378.302 378.303,350.018 217.436,189.151 "/></svg>
										<button type="button" class="close confirmCancel" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<h4><?php echo $this->lang->line('ltr_sure_delete_heading');?></h4>
										<p id="confirmModalMsg"><?php echo $this->lang->line('ltr_delete_conform_message');?></p>
									</div>
									
									<div class="modal-footer">
										<button type="button" id="confirmOk" class="btn btn-primary"><?php echo $this->lang->line('ltr_delete_yes_button');?></button>
										
										<button type="button" class="btn btn-secondary confirmCancel" data-dismiss="modal"><?php echo $this->lang->line('ltr_cancel');?></button>
									</div>
								</div>
							</div>
						</div>
						
						
						
	
	
    <!-- Script Start -->
	<script src="<?php echo base_url();?>assets/js/jquery-3.6.1.min.js"></script>
	<!-- drag and drop JS -->
	<script src="<?php echo base_url();?>imageuploader/src/image-uploader.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/apexchart/apexcharts.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/apexchart/control-chart-apexcharts.js"></script>
	<!-- country code for tel-->
	<script src="<?php echo base_url();?>assets/js/intlTelInput-jquery.min.js"></script>
	<!-- Ck editor -->
	<script src="<?php echo base_url();?>assets/js/ckeditor.js"></script>
	<!-- Data table js code -->
	<script src="<?=base_url();?>assets/js/datatables.min.js"></script>
	<script src="<?=base_url();?>assets/js/dataTables.responsive.min.js"></script>
	<!-- Custom Script -->
    <script src="<?=base_url();?>assets/js/custom.js?<?php echo time();?>"></script>
	<!-- custom ajax -->
	<script src="<?php echo base_url();?>assets/js/ajax.js"></script>
	
	<script>
         $('#images_box').imageUploader({
        	imagesInputName: 'images',
        	extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
        	mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
        	accept: 'image/*, video/*',
        	maxFiles: 10,
            maxSize : 1 * 1024 * 1024  
        });
          $('#video_box').imageUploader({
        	imagesInputName: 'videos',
        	extensions: ['.mp4'],
        	mimes: ['video/mp4'],
        	accept: ' video/*',
        	maxFiles: 2,
        	maxSize : 20 * 1024 * 1024  
        
        });
    </script>

</body>

</html>