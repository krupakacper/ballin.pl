// menu toggle
const menuStartBtn = document.querySelector('#menu-start-btn');
const menuStartSubmenu = document.querySelector('.menu-start-submenu-container');

menuStartBtn.onclick = function() {
   menuStartSubmenu.classList.toggle('start-menu-show');
}

// desktop menu toggle
const desktopMenu = document.getElementById('desktop-menu');
const menuFolder = document.getElementById('menu-folder');

// menus disappear when clicked wherever
document.onclick = function(e) {
   if(!menuFolder.contains(e.target)) {
      desktopMenu.classList.remove('dekstop-menu-show');
   }
   if(!menuStartBtn.contains(e.target)) {
      menuStartSubmenu.classList.remove('start-menu-show');
   }
}

menuFolder.onclick = function() {
   desktopMenu.classList.toggle('dekstop-menu-show');
}




// add button background after click
const primaryBtns = document.querySelectorAll('.btn-primary-click-bg');

primaryBtns.forEach((btn) => {
   let btnPrimaryClicked = false;
   btn.addEventListener('click', () => {
      if (btnPrimaryClicked == false) {
         btn.classList.add('btn-primary-clicked');
         btnPrimaryClicked = true;
      } else {
         btn.classList.remove('btn-primary-clicked');
         btnPrimaryClicked = false;
      }
   });
});



// empty cart warning modal on/off
const cartFolder = document.querySelector('#cart-folder');
const emptyCartModal = document.querySelector('#empty-cart-modal');
const emptyCartModalCloseBtn = document.querySelectorAll('#close-empty-cart-modal');

cartFolder.addEventListener('click', () => {
   emptyCartModal.showModal();
});

emptyCartModalCloseBtn.forEach( (btn) => {
   btn.addEventListener('click', () => {
      emptyCartModal.close();
   });
});











// // Explorer products slider
// const arrowLeft = document.querySelector('.arrow-left img');
// const arrowRight = document.querySelector('.arrow-right');
// const currentImage = document.querySelector('.product-current-image');
// const productImages = <?php echo json_encode($product_images_array) ?>;

// let imgCount = 0;

// arrowLeft.addEventListener('click', function() {
//    if(imgCount == 0) {
//       imgCount = productImages.length - 1;
//       console.log(imgCount);
//    }
//    else imgCount--;
//    currentImage.src = productImages[imgCount];
// });

// arrowRight.addEventListener('click', function() {
//    if(imgCount == (productImages.length - 1)) {
//       imgCount = 0;
//       console.log(imgCount);
//    }
//    else imgCount++;
//    currentImage.src = productImages[imgCount];
// });












console.log('Hejunia');

// Explorer product change
$('.explorer-white').each(function() {
   
   thisExplorer = $(this);

   let currentProduct = 0;
   let numOfProducts = $(this).find('a').length;

   console.log($(".hejka"));
   console.log($("#next-btn"));

   //add back button function
   $("#back-btn").click(function() {
      console.log('click next back');
      
      if(currentProduct == 0) {
         currentProduct = numOfProducts - 1;
      } else {
         currentProduct--;
      }   
      
      //change displayed product
      thisExplorer.children('a').hide();
      thisExplorer.children('a').eq(currentProduct).show();
   });

   //add next button function
   $("#next-btn").click(function(){
      console.log('click next');
      
      if(currentProduct == numOfProducts - 1) {
         currentProduct = 0;
      } else {
         currentProduct++;
      }   
      
      //change displayed product
      thisExplorer.children('a').hide();
      thisExplorer.children('a').eq(currentProduct).show();
   });

});