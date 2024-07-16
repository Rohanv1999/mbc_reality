(function($) {

    "use strict";
    
    $(document).on('submit','.formget',function(e) {
        
        e.preventDefault();
        $('.propsubmit').attr('disabled', true);

    	var baseUrl = $("#burl").val();
        var formid=e.target;
        var link=formid.action;
        var sessionuser = $('#sessionuser').val();
        
        $.ajax({
            url: link,
            type: "POST",
            data:  new FormData(this),
           contentType: false,
                 cache: false,
           processData:false,
    
            //data: new FormData(formid),
    
            success: function(response){
                console.log(response);
    
                var data = JSON.parse(response);
    
                var msg = data.msg;
    
                var status = data.status;
    
                var pids = data.pids;
    
                var uids = data.uids;
    
    			var success = '<div class="notificationPopup error"><span class="noti_icon"><img class="success_img" src="'+baseUrl+'assets/images/success.png" alt=""></span><span class="noti_msg"><span class="noti_heading success">Success</span><span class="noti_pera">'+msg+'</span></span></div>';
    
                var danger = '<div class="notificationPopup error"><span class="noti_icon"><img class="error_img" src="'+baseUrl+'assets/images/opps.png" alt=""></span><span class="noti_msg"><span class="noti_heading">Error</span><span class="noti_pera">'+msg+'</span></span></div>';
    
                if(status == 1){
    
                    $('.error').html(success);
    
                    setTimeout(function() {
    
                        location.reload();
    
                    }, 3000);
    
                }else if(status == 0){
    
                    $('.error').html(danger);
    
                    setTimeout(function() {
    
                        location.reload();
    
                    }, 3000);
    
                }else if(status == 3){
    
                    $('.error').html(success);
    
                    setTimeout(function() {
    
                        $('.error').html('');
    
                    }, 3000);
    
                }else if(status == 2){
    
                    $('.error').html(danger);
    
                    setTimeout(function() {
    
                        $('.error').html('');
    
                    }, 3000);
    
                }
    
                if(status == 4){
    
                    $('.error').html(success);
    
                    setTimeout(function() {
    					
    					if(location.href==baseUrl+'admin/edit-testimonial'){
    						window.location.href=baseUrl+'admin/testimonial';
    					}else if(window.location.href==baseUrl+'admin/edit-package'){
    					    window.location.href=baseUrl+'admin/packages';
    					}else if( window.location.href=baseUrl+'register'){
                            window.location.href=baseUrl+'login'; 
                        }
                        else{
    						window.location.href = window.location.pathname;
    					}
    
                    }, 3000);
    
                }
    
                if(status == 5){
    
                    $('.error').html(danger);
    
                }
    
                if(status == 6){
    
                    for(var key in msg) {
    
                        var value = msg[key];
    
                        $('#'+key).html(value);
    
                    }
    
                }
                
                if(status == 7){
                    Swal.fire({
                      title: "You are not login?",
                      icon: "warning",
                      showCancelButton: false,
                      confirmButtonColor: "#f78720",
                      confirmButtonText: "Login first !",
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = baseUrl+'login';
                      } 
                      
                    });
    
                }
                if(status == 'admin'){
                    $('.error').html(success);
    
                    setTimeout(function() {
    
                        location.href = 'admin';
    
                    }, 3000);
    
                }else if(status == 'agent'){
    
                    $('.error').html(success);
    
                    setTimeout(function() {
    
                        location.href = 'agent';
    
                    }, 3000);
    
                }
                else if(status == 'user'){
    
                    $('.error').html(success);
                     
    
                    setTimeout(function() {
    
                        var baseUrl = $("#burl").val();

                        location.href = 'user';
    
                    }, 3000);
    
                }
    
                if(typeof pids != 'undefined' && pids != ''){
    
                    $('#basic').val(pids);
    
                    $('#com').val(pids);
    
                    $('#amin').val(pids);
    
                    $('#dist').val(pids);
    
                    $('#med').val(pids);
    
                }else{
    
                    $('#basic').val('');
    
                    $('#com').val('');
    
                    $('#amin').val('');
    
                    $('#dist').val('');
    
                    $('#med').val('');
    
                }
    
                if(typeof uids != 'undefined' && uids != ''){
    
                    $('#extra').val(uids);
    
                }else{
    
                    $('#extra').val('');
    
                }
                if(data.redirect){
                    window.location.href =  $('#burl').val() + 'admin/team';
                }
                if(data.action == 'addedprop'){
                    $('.propsubmit').removeAttr('disabled');
                }
    
            },
    
            error: function(){
    
                var danger = '<div class="alert alert-danger">ajax not work</div>';
    
                $('.error').html(danger);
    
            }
    
        });
        
    
    
    });
    
    var baseUrl = $("#burl").val();
    
    $(document).on('click','.deletes',function(id,link,table){
    
        var gets = $(this).attr('d_id');
    
        var baseUrl = $("#burl").val();
    
        var dbtable = $(this).attr('tables');
    
        $.ajax({
    
            url: baseUrl + "homepage/delete",
    
            method:"POST",
    
            data:{gets:gets,dbtable:dbtable},
    
            success: function(response){
    
                var data = JSON.parse(response);
    
                var msg = data.msg;
    
                var status = data.status;
    
                var success = '<div class="notificationPopup error"><span class="noti_icon"><img class="success_img" src="'+baseUrl+'assets/images/success.png" alt=""></span><span class="noti_msg"><span class="noti_heading success">Success</span><span class="noti_pera">'+msg+'</span></span></div>';
    
                var danger = '<div class="notificationPopup error"><span class="noti_icon"><img class="error_img" src="'+baseUrl+'assets/images/opps.png" alt=""></span><span class="noti_msg"><span class="noti_heading">Error</span><span class="noti_pera">'+msg+'</span></span></div>';
    
                if(status == 1){
    
                    $("[data-dismiss=modal]").trigger({ type: "click" });
    
                    setTimeout(function() {
    
                        location.reload();
    
                    }, 100);
    
                }else if(status == 2){
                    
                    $("[data-dismiss=modal]").trigger({ type: "click" });
    
                    $('.error').html(danger);
    
                    setTimeout(function() {
    
                        location.reload();
    
                    }, 1000);
    
                }
    
            },
    
            error: function(){
    
                var danger = '<div class="notificationPopup error"><span class="noti_icon"><img class="error_img" src="'+baseUrl+'assets/images/opps.png" alt=""></span><span class="noti_msg"><span class="noti_heading">Error</span><span class="noti_pera">'+msg+'</span></span></div>';
    
                $('.error').html(danger);
    
            }
    
        });
    
    });

    $(document).on('change','#country2',function(){
        
        var value = $(this).val();
    
        $.ajax({
    
    		type: "POST",
    
    		url: "slect_state",
    
    		data:{country_id : value},
    
    		beforeSend: function() {
    
    			// $("#states").addClass("loader");
    
    		},
    
    		success: function(response){
                var datas = JSON.parse(response);
                var gets = '';
                if(datas !=''){

                    gets += '<option value="" selected disabled >Select state</option>'; 
                    
                for(var x in datas){
                  
                    gets += '<option value="'+datas[x]['id']+'">'+datas[x]['name']+'</option>';
    
                }
                }else{
                      gets += '<option value="">This have no any states</option>'; 
                }
    
    			$("#states").html(gets);
    
    		//	$("#states").removeClass("loader");
    
    		}
    
    	});
    
    });
    
    
    
    $(document).on('change','#country',function(){
        
        var value = $(this).val();
    
        $.ajax({
    
    		type: "POST",
    
    		url: "select_state2",
    
    		data:{country_id : value},
    
    		beforeSend: function() {
    
    		//	$("#states").addClass("loader");
    
    		},
    
    		success: function(response){
                var datas = JSON.parse(response);
                var gets = '';
                if(datas !=''){

                    gets += '<option value="" selected disabled >Select state</option>'; 
                    
                for(var x in datas){
                  
                    gets += '<option value="'+datas[x]['id']+'">'+datas[x]['name']+'</option>';
    
                }
                }else{
                      gets += '<option value="">This have no any states</option>'; 
                }
    
    			$("#states").html(gets);
    
    		//	$("#states").removeClass("loader");
    
    		}
    
    	});
    
    });
    
    // State Id to find city//
           
     $(document).on('change','#states',function(){
        var value = $(this).val();
          //alert(value);
        $.ajax({
    
    		type: "POST",
    
    		url: "select_city",
    
    		data:'state_id='+value,
    
    		beforeSend: function() {
    
    			//$("#city").addClass("loader");
    
    		},
    
    		success: function(response){
                var datascity = JSON.parse(response);
                
                var gets = '';
                if(datascity !=''){
                for(var x in datascity){
                   //gets += '<option value="">Select state</option>'; 
                    gets += '<option value="'+datascity[x]['id']+'">'+datascity[x]['name']+'</option>';
    
                }
                }else{
                      gets += '<option value="">This have no any city</option>'; 
                }
    
    			$("#city").html(gets);
    
    			//$("#city").removeClass("loader");
    
    		}
    
    	});
    
    });
    
    
    
    $(document).on('change','#package_nm',function(){
        
        var value = $(this).val();

        $.ajax({
    
    		type: "POST",
    
    		url: "select_package",
    
    		data:'package_id='+value,
    
    		success: function(response){
    
                var datas = JSON.parse(response);
    
                $('#package_expiry00').val(datas);
    
    		}
    
    	});
    
    });
    
    $(document).on('click','.favourate',function(){

        var id = $(this).attr('f_id');
        var fav_id = id;
        var baseUrl = $("#burl").val();
    
        $.ajax({
    
            type: "POST",
    
            url: baseUrl + "homepage/get_favorities",
    
            data: {fav_id:fav_id},
    
            success: function(response){
    
                var data = JSON.parse(response);
    
                var status = data.status;
    
                var id = data.id;
    
                if(status == 1){
                    
                    // $('#property_'+id+'::before').css('color','red !important');
                    $('#property_'+id).addClass('hovered');
    
                }else{
    
                    // $('#property_'+id+'').css('color','');
                    $('#property_'+id).removeClass('hovered');
    
                }
    
            },
    
            error: function(){}
    
        });
       
    });
    
    $(document).on('click','#more_agent',function(){
    
        var baseUrl = $("#burl").val();
        
        var id = $(this).attr('agent_property');
        
        var page = 2;
    
        $.ajax({
    
            url : baseUrl + "homepage/loadonclick",
    
            type: "post",
    
            cache:false,
    
            data:{id:id,page:page},
    
            success:function(data){
    
                page = page + 1;
    
                if (data) {
    
                    $("#agent_property").append(data);
    
                }else{
    
                    $("#more_agent").remove();
    
                }
    
            }
    
        });
    
        page = page + 1;
    
    });
    
    $(document).on('scroll','#property_cards',function(){
    
        var baseUrl = $("#burl").val();
        
        var page = 2;
    
        $.ajax({
    
            url : baseUrl + "homepage/loadcards",
    
            type: "post",
    
            cache:false,
    
            data:{page:page},
    
            success:function(data){
    
                page = page + 1;
    
                if (data) {
    
                    $("#property_cards").append(data);
    
                }else{
    
                    $("#more_cards").remove();
    
                }
    
            }
    
        });
    
        page = page + 1;
    
    });
    
    
    
    $(document).on('change','.switch_button',function(){
    
        var baseUrl = $("#burl").val();
        
        var rowid = $(this).attr('rowid');
        var table = $(this).attr('tables');
    
        if($(this).is(":checked")){
    
            var status = 1;
    
        }else if($(this).is(":not(:checked)")){
    
            var status = 0;
    
        }
    
        $.ajax({
    
            url : baseUrl + "admin/statuschangeajax",
    
            type : "post",
    
            cache : false,
    
            data : {id:rowid,table:table,status:status},
    
            success:function(response){
    
                var data = JSON.parse(response);
    
                var msg = data.msg;
    
                var status = data.status;
    
                var pids = data.pids;
    
                var uids = data.uids;
    
    			var success = '<div class="notificationPopup error"><span class="noti_icon"><img class="success_img" src="'+baseUrl+'assets/images/success.png" alt=""></span><span class="noti_msg"><span class="noti_heading success">Success</span><span class="noti_pera">'+msg+'</span></span></div>';
    
                var danger = '<div class="notificationPopup error"><span class="noti_icon"><img class="error_img" src="'+baseUrl+'assets/images/opps.png" alt=""></span><span class="noti_msg"><span class="noti_heading">Error</span><span class="noti_pera">'+msg+'</span></span></div>';
    			
    			if(status == 3){
    
                    $('.error').html(success);
    
                    setTimeout(function() {
    
                        $('.error').html('');
    
                    }, 3000);
    
                }else if(status == 2){
    
                    $('.error').html(danger);
    
                    setTimeout(function() {
    
                        $('.error').html('');
    
                    }, 3000);
    
                }
            }
    
        });
    
    });
    
    $(document).on('click','.gateway_select',function(){
    
        if($(this).is(":checked")){
    		var this_id = $(this).attr('id');
    		var idArray = this_id.split('_');
    		var data_id = idArray[1];
            var checked = 1;
    
        }else if($(this).is(":not(:checked)")){
    		var this_id = $(this).attr('id');
    		var idArray = this_id.split('_');
    		var data_id = idArray[1];
            var checked = 0;
    
        }
    
        var baseUrl = $("#burl").val();
    
        $.ajax({
    
            url : baseUrl + "admin/select_gateway",
    
            type : "post",
    
            cache : false,
    
            data : {status:checked,id:data_id},
    
            success:function(data){
    
            }
    
        });
    
    });
    
    
    
    $(document).ready(function(){
    
    	$('#fill_admin').on('click',function(){
    
    		$('#loginemailId').val('admin@gmail.com');
    
    		$('#loginpass').val('111111');
    
    	});
    
    	$('#fill_agent').on('click',function(){
    
    		$('#loginemailId').val('agent@gmail.com');
    
    		$('#loginpass').val('123456');
    
    	});
    
    	$('#fill_user').on('click',function(){
    
    		$('#loginemailId').val('user@gmail.com');
    
    		$('#loginpass').val('123456');
    
    	});
    
    });

    $('.stripeBtn').on('click', function(){
        var base_url = $("#burl").val(); 
        var user_id = $(this).parent().find('.paypaluser_id').val();
        var package_id = $(this).parent().find('.paypalpackage_id').val();
        var amount = $(this).parent().find('.paypalpprice').val();
        var currency = $(this).parent().find('.paypalpcurrency').val();
        var defaultPcurrency = $(this).parent().find('.defaultPcurrency').val();

        $.ajax({
            url: base_url + 'buy-plan',
            method: 'POST',
            data: '',
            dataType: 'JSON',
            beforeSend: function(){
                // code here 
            },
            success: function(data) {
                var result = JSON.parse(data);
                //code here
            }
        })

    })
    
    $('.paypalGateway').on('click', function(e) {
        var base_url = $("#burl").val(); 
        var user_id = $(this).parent().find('.paypaluser_id').val();
        var package_id = $(this).parent().find('.paypalpackage_id').val();
        var amount = $(this).parent().find('.paypalpprice').val();
        var currency = $(this).parent().find('.paypalpcurrency').val();
        var defaultPcurrency = $(this).parent().find('.defaultPcurrency').val();
    	$('#paypal_payment_'+package_id).empty();
    	if(defaultPcurrency=='INR'){
        	// set endpoint and your access key
            var endpoint = 'convert';
            var api_key = '8a46e1d0a80bc8d25c0127c6';
            // define from currency, to currency, and amount
            var from = defaultPcurrency;
            var to = currency;
            var amount = amount;
            
            // execute the conversion using the "convert" endpoint:
            $.ajax({
                url: 'https://v6.exchangerate-api.com/v6/'+api_key+'/pair/'+from+'/'+to+'/'+amount,   
                dataType: 'json',
                method: 'GET',
                success: function(json) {
                    var data = json.conversion_result;
                    // access the conversion result in json.result
                    var convertAmount = parseFloat(data).toFixed(2);
                	setTimeout(function(){
                		paypal.Buttons({
                			style: {
                				shape: 'rect',
                				color: 'blue',
                				layout: 'horizontal',
                				label: 'paypal',
                				tagline: 'false'
                			},
                			createOrder: (data, actions) => {
                				return actions.order.create({
                    				purchase_units: [{
                    					amount: { 
                    					    currency_code: currency,
                    						value:convertAmount
                    					}
                    				}]
                				});
                			},                               
                			onApprove: (data, actions) => {
                				return actions.order.capture().then(function(orderData) {
                					const transaction = orderData.purchase_units[0].payments.captures[0];
                					const amount = orderData.purchase_units[0].amount.value;
                					const currency_code = orderData.purchase_units[0].amount.currency_code;
                					const transaction_id = transaction.id;
                					const status = transaction.status;
                					const payer_id = orderData.payer.payer_id;
                					const email_address = orderData.payer.email_address;
                					const payer_fname = orderData.payer.name.given_name;
                					const payer_lname = orderData.payer.name.surname;
                					const payer_name = payer_fname+' '+payer_lname;
                					$.ajax({
                						method: "POST",
                						url: base_url + 'paypal/success',
                						data:  { 
                							payer_id:payer_id,
                							user_id:user_id,
                							product_id:package_id,
                							txn_id:transaction_id,
                							payment_gross:amount,
                							currency_code:currency_code,
                							payer_name:payer_name,
                							payer_email:email_address,
                							payment_status:status,
                						}, 
                						success: function (response) {
                							var data = JSON.parse(response);
                							var msg = data.msg;
                							var status = data.status;
                							var success = '<div class="alert alert-success">'+msg+'</div>';
                							var danger = '<div class="alert alert-danger">'+msg+'</div>';                   
                							if(status == 3){
                								$('.error').html(success);
                								setTimeout(function() {
                									$('.error').html('');
                								}, 3000);
                							}else if(status == 2){
                								$('.error').html(danger);
                								setTimeout(function() {
                									$('.error').html('');
                								}, 3000);
                							}
                						}
                					});  
                				});
                			}
                		}).render('#paypal_payment_'+package_id);
                	},100)
                }
            });
    	}else{
        	setTimeout(function(){
        		paypal.Buttons({
        			style: {
        				shape: 'rect',
        				color: 'blue',
        				layout: 'horizontal',
        				label: 'paypal',
        				tagline: 'false'
        			},
        			createOrder: (data, actions) => {
        				return actions.order.create({
            				purchase_units: [{
            					amount: { 
            					    currency_code: currency,
            						value:amount
            					}
            				}]
        				});
        			},                               
        			onApprove: (data, actions) => {
        				return actions.order.capture().then(function(orderData) {
        					const transaction = orderData.purchase_units[0].payments.captures[0];
        					const amount = orderData.purchase_units[0].amount.value;
        					const currency_code = orderData.purchase_units[0].amount.currency_code;
        					const transaction_id = transaction.id;
        					const status = transaction.status;
        					const payer_id = orderData.payer.payer_id;
        					const email_address = orderData.payer.email_address;
        					const payer_fname = orderData.payer.name.given_name;
        					const payer_lname = orderData.payer.name.surname;
        					const payer_name = payer_fname+' '+payer_lname;
        					$.ajax({
        						method: "POST",
        						url: base_url + 'paypal/success',
        						data:  { 
        							payer_id:payer_id,
        							user_id:user_id,
        							product_id:package_id,
        							txn_id:transaction_id,
        							payment_gross:amount,
        							currency_code:currency_code,
        							payer_name:payer_name,
        							payer_email:email_address,
        							payment_status:status,
        						}, 
        						success: function (response) {
        							var data = JSON.parse(response);
        							var msg = data.msg;
        							var status = data.status;
        							var success = '<div class="alert alert-success">'+msg+'</div>';
        							var danger = '<div class="alert alert-danger">'+msg+'</div>';                   
        							if(status == 3){
        								$('.error').html(success);
        								setTimeout(function() {
        									$('.error').html('');
        								}, 3000);
        							}else if(status == 2){
        								$('.error').html(danger);
        								setTimeout(function() {
        									$('.error').html('');
        								}, 3000);
        							}
        						}
        					});  
        				});
        			}
        		}).render('#paypal_payment_'+package_id);
        	},100)
    	}
    });
    
    $('.razorpayGateway').on('click', function(e) {
        e.preventDefault();
        var base_url = $("#burl").val();
        var package_id = $(this).parent().find('.modelpackage_id').val();
        $.ajax({
            url: base_url + 'Razorpay/buy',
            type: 'post',
            data: {package_id:package_id},
            success: function(response){
                var res_data = JSON.parse(response);
                var options = {
                    "key": res_data.key,
                    "amount": (res_data.amount), // 2000 paise = INR 20 
                    "name": res_data.name,        
                    "description": res_data.description,
                    "image": res_data.image,
                    "prefill": {
                        "name":res_data.prefill.name,
                        "email": res_data.prefill.email,
                        "contact":res_data.prefill.contact,
                    },
                    "notes": {
                        "merchant_order_id": res_data.notes.merchant_order_id,
                    },
                    "theme": {
                        "color": res_data.theme.color,
                    },
                    "order_id": res_data.order_id,
                    "display_currency": res_data.display_currency,
                    "display_amount": res_data.display_currency,
                    "handler": function (response){
                        $.ajax({
                            url: base_url + 'Razorpay/verify',
                            type: 'post',
                            data: {
                                razorpay_order_id: response.razorpay_order_id,
                                razorpay_payment_id: response.razorpay_payment_id,
                                razorpay_signature: response.razorpay_signature,
                                merchant_order_id: res_data.notes.merchant_order_id,
                            }, 
                            success: function (response) {   
                                var data = JSON.parse(response);
                                var msg = data.msg;
                                var status = data.status;
                                var success = '<div class="alert alert-success">'+msg+'</div>';
                                var danger = '<div class="alert alert-danger">'+msg+'</div>';                   
                                if(status == 3){
                                    $('.error').html(success);
                                    setTimeout(function() {
                                        $('.error').html('');
                                    }, 3000);
                                }else if(status == 2){
                                    $('.error').html(danger);
                                    setTimeout(function() {
                                        $('.error').html('');
                                    }, 3000);
                                }
                            }
                        });
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        });
    });

  
    
    $('#accept').on('click',function(){
          var accept = $('#accept').data('id');
          var property_id = $('#property_id').val();
        
             $.ajax({
                    url : baseUrl + "admin/approveUserList",
                    type: 'post',
                    data: {
                        accept:accept,
                        property_id:property_id,
                    }, 
                    success: function (response) {   
                        var data = JSON.parse(response);
                        var msg = data.msg;
                        var status = data.status;
                        var success = '<div class="alert alert-success">'+msg+'</div>';
                        var danger = '<div class="alert alert-danger">'+msg+'</div>';                   
                        if(status == 1){
                            $('.new-btn').hide();
                            $('.error').html(success);
                            setTimeout(function() {
                                $('.error').html('');
                            }, 3000);
                        }else if(status == 2){
                             $('.new-btn').hide();
                            $('.error').html(danger);
                            setTimeout(function() {
                                $('.error').html('');
                            }, 3000);
                        }
                    }
             });
    })
    
    $('#reject').on('click',function(){
          var reject = $('#reject').data('id');
          var property_id = $('#property_id').val();
             $.ajax({
                    url : baseUrl + "admin/rejectUserList",
                    type: 'post',
                    data: {
                        reject:reject,
                        property_id:property_id,
                    }, 
                    success: function (response) {   
                        var data = JSON.parse(response);
                        var msg = data.msg;
                        var status = data.status;
                        var success = '<div class="alert alert-success">'+msg+'</div>';
                        var danger = '<div class="alert alert-danger">'+msg+'</div>';                   
                        if(status == 1){
                             $('.new-btn').hide();
                            $('.error').html(success);
                            setTimeout(function() {
                                $('.error').html('');
                            }, 3000);
                        }else if(status == 2){
                             $('.new-btn').hide();
                            $('.error').html(danger);
                            setTimeout(function() {
                                $('.error').html('');
                            }, 3000);
                        }
                    }
             });
    })
    

    $('.modalBtn').on('click', function(e){
        var type = e.target.parentElement.getAttribute('data-id');
  
        $('#typeSelect2 option[data-id="' + type + '"]').attr("selected", "selected");
    })

    
    
    
$('#categories').on('change',function(){
  var catVal =  $(this).val();
     if(catVal==8){
         $('.bathroom').hide();
         $('.bedroom').hide();
     }else{
         $('.bathroom').show();
         $('.bedroom').show(); 
         
     }
});



    $(document).on('submit', '#inqForm', function (ev) {

        ev.preventDefault();
        var frm = $('#inqForm');
        var form = $('#inqForm')[0];
        var data = new FormData(form);

        $.ajax({
            type: 'POST',
            url: $('#url').val(),
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            async: false,
            cache: false,
            data: data,
            beforeSend: function () {
                $('body').css('pointer-events', 'none');
            },
            success: function (data) {
                data = JSON.parse(data)
                console.log(data)
                if (data.status == true) {
                    var success = '<div class="alert alert-success">'+data.msg+'</div>';
                    $('.error').html(success);
                    setTimeout(function() {
                        $('.error').html('');
                    }, 3000);

                    $('.btn-close').click();
                }

                if (data.status == false) {
                    var success = '<div class="alert alert-danger">'+data.msg+'</div>';
                    $('.error').html(success);
                    setTimeout(function() {
                        $('.error').html('');
                    }, 3000);
                   
                }
                $('body').css('pointer-events', 'all');

            },

        });

    });






                      
   
    
    
})(jQuery);