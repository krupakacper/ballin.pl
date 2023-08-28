// menu toggle
const menuStartBtn = document.querySelector('#menu-start-btn');
const menuStartSubmenu = document.querySelector('.menu-start-submenu-container');
let startOpen = false;

menuStartBtn.addEventListener('click', () => {
   if (startOpen == false) {
      menuStartSubmenu.style.display = 'flex';
      startOpen = true;
   } else {      
      menuStartSubmenu.style.display = 'none';
      startOpen = false;
   }
});

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