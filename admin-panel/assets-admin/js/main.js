$(".order-bottom-details").slideUp(0);

$(document).ready(function(){

   $('.order').each(function() {
      const orderId = $(this).find('#order-id').html();
      const toggleArrow = $(this).children(".toggle-arrow");
      const bottomData = $(this).children(".order-bottom-details");
      const orderStatus = $(this).find("#order-status");
      const newStatusDropdown = $(this).find("#new-status");
      
      //handle slide toggle od order
      toggleArrow.click(function(){
         bottomData.slideToggle();
         toggleArrow.toggleClass('open');
      });

      //handle order status change
      newStatusDropdown.on("change", function() {
         const newStatus = $(this).val();
         orderStatus.html(newStatus);

         console.log('nowy status: '+newStatus+', id: '+orderId);

         $.ajax({
            url: 'http://localhost/ballin.pl/admin-panel/assets-admin/admin-functions.php',
            data: {
               order_id: orderId,
               new_status: newStatus
            },
            type: 'POST',
            success: function(result) {
               alert(result);
            }
         });
      });
   });

 });


