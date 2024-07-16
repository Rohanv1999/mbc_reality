 
  function showAlert(msg, status,baseUrl){
                        if(status == 'success'){
                            var alert = '<div class="notificationPopup error"><span class="noti_icon"><img class="success_img" src="'+baseUrl+'assets/images/success.png" alt=""></span><span class="noti_msg"><span class="noti_heading success">Success</span><span class="noti_pera">'+msg+'</span></span></div>';
                        }
                        else{
                             var alert = '<div class="notificationPopup error"><span class="noti_icon"><img class="error_img" src="'+baseUrl+'assets/images/opps.png" alt=""></span><span class="noti_msg"><span class="noti_heading">Error</span><span class="noti_pera">'+msg+'</span></span></div>';
                        }
                          $('.error').html(alert);
                        
    setTimeout(() => {
         $('.error').html('');
    }, 1000);
                    }
                    
                    
//  confirm dialogue
function confirmDialog(message, onConfirm) {
  var fClose = function () {
    $("#confirmModal").hide();
  };
  
  $("#confirmMessage").empty().append(message);
  $("#confirmModal").show();
  $('#confirmModal').addClass('show');

  $("#confirmOk").unbind().one("click", onConfirm).one("click", fClose);
  $(".confirmCancel").unbind().one("click", fClose);
}
