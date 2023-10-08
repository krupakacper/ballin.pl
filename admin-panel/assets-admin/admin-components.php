<?php

function order_component($order_id = '', $order_value = 0, $order_date = '', $order_status = '', $client_name = '', $last_name = '', $street = '', $postal_code = '', $city = '', $phone = '', $email = '', $products, $shipping_method = '', $payment_method = '', $order_notes = '') {
      
   $product_names = array_column($products, 'name');
   $product_sizes = array_column($products, 'size');
   $product_prices = array_column($products, 'price');
   
   $products_count = count($products);

   $products_html = '';

   for($i = 0; $i < $products_count; $i++) {
      $products_html = $products_html.'
         <div class="data-row product-row">
            <span>'.$product_names[$i].' '.$product_sizes[$i].'</span><span>'.$product_prices[$i].' zł</span>
         </div> 
      ';
   }

   //Element code
   $element = '
      <div class="order element">
         <div class="toggle-arrow">
            <img src="assets-admin/img/icons/element-arrow.svg" alt="Strzałka rozwijania">
         </div>
         <div class="order-top-details">
            <div class="order-top-left">

               <div class="data-row">
                  <strong>Numer zamówienia: </strong><span id="order-id">'.$order_id.'</span>
               </div>
               <div class="data-row">
                  <strong>Kwota: </strong><span>'.$order_value.' zł</span>
               </div>

            </div>
            <div class="order-top-right">

               <div class="data-row">
                  <strong>Data: </strong><span>'.$order_date.'</span>
               </div>
               <div class="data-row">
                  <strong>Status: </strong><span id="order-status">'.$order_status.'</span>
               </div>

            </div>
         </div>
         <div class="order-bottom-details">                  
            <div class="order-bottom-left">

               <div class="client-data-wrapper">
                  <strong class="order-header">Dane kupującego:</strong>
                  <div class="client-data">
                     <div class="client-data-left">

                        <div class="data-row">
                           <strong>Imię i Nazwisko: </strong><span>'.$client_name.' '.$last_name.'</span>
                        </div>
                        <div class="data-row">
                           <strong>Adres: </strong><span>'.$street.',  '.$postal_code.' '.$city.'</span>
                        </div>
                        

                     </div>
                     <div class="client-data-right">

                        <div class="data-row">
                           <strong>Telefon: </strong><span>'.$phone.'</span>
                        </div>
                        <div class="data-row">
                           <strong>E-mail: </strong><span>'.$email.'</span>
                        </div>

                     </div>
                  </div>
               </div>
               <div class="products-wrapper">
                  <strong class="order-header">Produkty:</strong>

                  '.$products_html.'     

               </div>

            </div>
            <div class="order-bottom-right">

               <div class="status-change-wrapper">
                  <strong class="order-header">Zmiana statusu:</strong>

                  <form class="data-row status-change-row">
                     <select name="new_status" id="new-status">
                        <option value="" hidden>Wybierz status</option>
                        <option value="nieopłacone">nieopłacone</option>
                        <option value="opłacone">opłacone</option>
                        <option value="wysłane">wysłane</option>
                        <option value="dostarczone">dostarczone</option>
                     </select>
                  </form>     

               </div>

               <div class="data-row">
                  <strong>Metoda dostawy: </strong><span>'.$shipping_method.'</span>
               </div>

               <div class="data-row">
                  <strong>Metoda płatności: </strong><span>'.$payment_method.'</span>
               </div>

               <div class="data-row notes-row">
                  <strong>Uwagi: </strong>
                  '.$order_notes.'
               </div>

            </div>
         </div>
      </div>
   ';

   echo $element;

}


function product_component($product_img = '', $product_name = '', $id = '', $product_price = '', $product_type = '', $product_sizes = '' ) {

   //Element code
   $element = '
      <div class="product element">

         <div class="product-img">
            <img src="../'.$product_img.'" alt="Zdjęcie produktu">
         </div>

         <div class="product-data-col1">
            <div class="data-row">
               <strong>Nazwa produktu: </strong><span>'.$product_name.'</span>
            </div>
            <div class="data-row">
               <strong>Kod produktu: </strong><span>'.$id.'</span>
            </div>
            <div class="data-row">
               <strong>Cena: </strong><span>'.$product_price.' zł</span>
            </div>
         </div>

         <div class="product-data-col2">
            <div class="data-row type-row">
               <strong>Typ: </strong><span><i>'.$product_type.'</i></span>
            </div>
            <div class="sizes-wrapper">
               <strong class="order-header">Rozmiary:</strong>
               <div class="sizes-table">
                  <div class="sizes-row sizes-row-top">
                     <div class="size-cell">XS</div>
                     <div class="size-cell">S</div>
                     <div class="size-cell">M</div>
                     <div class="size-cell">L</div>
                     <div class="size-cell last-cell">XL</div>
                  </div>
                  <div class="sizes-row sizes-row-bottom">
                     <div class="size-cell">20</div>
                     <div class="size-cell">15</div>
                     <div class="size-cell">56</div>
                     <div class="size-cell">130</div>
                     <div class="size-cell last-cell">43</div>
                  </div>
               </div>
               
            </div>
         </div>

         <div class="product-action-btns">
            <button class="action-btn product-delete-btn">
               <img src="assets-admin/img/icons/delete-icon.svg" alt="Przycisk usuń">
            </button>
            <button class="action-btn product-edit-btn">
               <img src="assets-admin/img/icons/edit-icon.svg" alt="Przycisk edytuj">
            </button>
         </div>

      </div>
   ';

   echo $element;

}

?>