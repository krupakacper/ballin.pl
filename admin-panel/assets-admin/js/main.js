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


   //Product row icons hover effect
   $('.product-delete-btn').hover(function(){
      $(this).children('img').attr("src", "assets-admin/img/icons/delete-icon-hov.svg");
   }, function(){
      $(this).children('img').attr("src", "assets-admin/img/icons/delete-icon.svg");
   });
   $('.product-edit-btn').hover(function(){
      $(this).children('img').attr("src", "assets-admin/img/icons/edit-icon-hov.png");
   }, function(){
      $(this).children('img').attr("src", "assets-admin/img/icons/edit-icon.svg");
   });


   // Editing product
   $('.product').each(function() {
      const productId = $(this).find('.product-id').html();

      const editBtn = $(this).find(".product-edit-btn");
      const editSaveBtn = $(this).find(".product-edit-save");

      //static data
      const staticName = $(this).find(".name-static");
      const staticPrice = $(this).find(".price-static");
      const staticSizes = $(this).find(".sizes-static");
      //edit data
      const editName = $(this).find(".name-edit");
      const editPrice = $(this).find(".price-edit");
      const editSizes = $(this).find(".sizes-edit");      

      let isEdited = false;
      
      //handle slide toggle od order
      editBtn.click(function(){
         if(isEdited == false) {
            //hide static data
            staticName.hide();
            staticPrice.hide();
            staticSizes.hide();

            //show edit data
            editName.show();
            editPrice.show();
            editSizes.show();

            editSaveBtn.show();

            isEdited = true;
         } else {
            //hide static data
            staticName.show();
            staticPrice.show();
            staticSizes.show();

            //show edit data
            editName.hide();
            editPrice.hide();
            editSizes.hide();

            editSaveBtn.hide();

            isEdited = false;
         }       
      });


      //handle update product
      const saveBtn = $(this).find(".product-edit-save");

      const productName = $(this).find(".product-name");
      const productPrice = $(this).find(".product-price");
      const sizeXS = $(this).find(".product-size-xs");
      const sizeS = $(this).find(".product-size-s");
      const sizeM = $(this).find(".product-size-m");
      const sizeL = $(this).find(".product-size-l");
      const sizeXL = $(this).find(".product-size-xl");
      
      saveBtn.click(function(e) {
         e.preventDefault();

         let updateProductData = {
            id: productId,
            name: productName.val(),
            price: productPrice.val(),
            sizes: {
               xs: sizeXS.val(),
               s: sizeS.val(),
               m: sizeM.val(),
               l: sizeL.val(),
               xl: sizeXL.val()
            }
         }

         $.ajax({
            url: 'http://localhost/ballin.pl/admin-panel/assets-admin/php/update-product.php',
            data: {
               product_data: updateProductData
            },
            type: 'POST',
            success: function(result) {
               location.reload()
            }
         });
      });

      // newStatusDropdown.on("change", function() {
      //    const newStatus = $(this).val();
      //    orderStatus.html(newStatus);

      //    console.log('nowy status: '+newStatus+', id: '+orderId);

      //    $.ajax({
      //       url: 'http://localhost/ballin.pl/admin-panel/assets-admin/php/update-product.php',
      //       data: {
      //          order_id: orderId,
      //          new_status: newStatus
      //       },
      //       type: 'POST',
      //       success: function(result) {
      //          console.log(result);
      //       }
      //    });
      // });

   });


 });