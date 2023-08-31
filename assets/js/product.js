// Set height of product info container
const info = document.querySelector('.product-info');
const infoContainer = document.querySelector('.product-info-container .white-window-container');

let containerHeight = infoContainer.clientHeight;
let infoHeight = containerHeight - 10;

info.style.height = infoHeight + 'px';

// Product info tabs switch
$('.character-info-tabs-buttons button').click(function(event) {
   index = $(this).index();

   // change clicked button
   $('.character-info-tabs-buttons button').removeClass('btn-primary-clicked');
   $(this).addClass('btn-primary-clicked');

   // change displayed tab
   $('.product-info-content').hide();
   $('.product-info-content').eq(index).show();
   $('.product-info-content').eq(index).css('display', 'flex');
   

   // save info which tab was open last
   localStorage.setItem("LastProductInfoTab", index)
});
getLastProductInfoTab = localStorage.getItem("LastProductInfoTab");
$('.character-info-tabs-buttons button').eq(getLastProductInfoTab).addClass('btn-primary-clicked');
$('.product-info-content').eq(getLastProductInfoTab).show();
$('.product-info-content').eq(getLastProductInfoTab).css('display', 'flex');