$(".order-bottom-details").slideUp(0);

$(document).ready(function(){

   // Order functions:
   $('.order').each(function() {
      const orderId = $(this).find('#order-id').html();

      const toggleArrow = $(this).children(".toggle-arrow");
      const bottomData = $(this).children(".order-bottom-details");
      
      //handle slide toggle od order
      toggleArrow.click(function(){
         bottomData.slideToggle();
         toggleArrow.toggleClass('open');
      });


      //handle order status change
      const orderStatus = $(this).find("#order-status");
      const newStatusDropdown = $(this).find("#new-status");

      newStatusDropdown.on("change", function() {
         const newStatus = $(this).val();
         orderStatus.html(newStatus);

         console.log('nowy status: '+newStatus+', id: '+orderId);

         $.ajax({
            url: 'http://localhost/ballin.pl/admin-panel/assets-admin/php/set-new-status.php',
            data: {
               order_id: orderId,
               new_status: newStatus
            },
            type: 'POST',
            success: function(result) {
               console.log(result);
            }
         });
      });

   });


   // Products functions
   $(".new-product-form").slideUp(0);
   $('#new-product-btn').click(function(){
      $(".new-product-form").slideToggle();
      $('#new-product-btn').toggleClass('open');
   });


 });