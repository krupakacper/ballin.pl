// Cart validation
const payment = document.querySelector('.payment-form');
const submitBtn = document.querySelector('.submit-btn');

// All inputs
const firstName = document.querySelector('#name');
const lastName = document.querySelector('#last-name');
const street = document.querySelector('#street');
const postalCode = document.querySelector('#postal-code');
const city = document.querySelector('#city');
const phone = document.querySelector('#phone');
const email = document.querySelector('#email');
const shippingMethod = $('#shipping-method input:radio').val();
const orderNotes = document.querySelector('#order-notes');
const paymentMethod = $('#payment-method input:radio').val();
const terms = document.querySelector('#terms_n_condition');
const total = document.querySelector('#total');


// Check if cart forms are valid
payment.addEventListener('submit', (event) => {
   event.preventDefault();
   if(
      (firstName.value === '' || firstName.value === 'null') ||
      (lastName.value === '' || lastName.value === 'null') ||
      (street.value === '' || street.value === 'null') ||
      (postalCode.value === '' || postalCode.value === 'null') ||
      (city.value === '' || city.value === 'null') ||
      (phone.value === '' || phone.value === 'null') ||
      (email.value === '' || email.value === 'null') ||
      (shippingMethod.value === '' || shippingMethod.value === 'null') ||
      (paymentMethod.value === '' || paymentMethod.value === 'null') ||
      (terms.checked === false)
   ) {      
      alert('No chyba o czymś zapomniałeś..');
   } 
   else {

      //get products from local storage
      products = JSON.parse(sessionStorage.getItem('order_products'));

      //get order date
      var today = new Date();
      var month = (today.getMonth()+1);
      if(month<10)month='0'+month;
      var day = today.getDate();
      if(day<10)day='0'+day;
      var date = day + '.' + month + '.' + today.getFullYear() + ' ' + today.getHours() + ":" + today.getMinutes();
      
      let order = {
         'client_data': {
            'name': firstName.value,
            'last_name': lastName.value,
            'address': {
               'street': street.value,
               'postal_code': postalCode.value,
               'city': city.value
            },
            'contact_details': {
               'phone': phone.value,
               'email': email.value
            }            
         },
         'shipping_method': shippingMethod,
         'order_notes': orderNotes.value,
         'payment_method': paymentMethod,
         'order_status': 'nieopłacone',
         'order_value': total.value,
         'products': products
      }

      

      $.ajax({
         url: 'http://localhost/ballin.pl/php-guts/send-order.php',
         data: {order:order},
         type: 'POST',
         success: function(result) {
            console.log(result);
         }
      })

      window.location = 'thank-you.php';

   }
});