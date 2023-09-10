// landing page toggle
const landingBtn = document.querySelector('.landing-btn');
const landingBtnToggle = document.querySelector('.landing-btn-toggle');
const landingImg = document.querySelector('.landing-page-img');
let isActive = false;

landingBtn.addEventListener('click', () => {
   if(isActive == false) {
      landingBtnToggle.classList.add('active');
      landingImg.src = 'assets/img/graphics/coffin-2.webp';
      isActive = true;
   } else {
      landingBtnToggle.classList.remove('active');
      landingImg.src = 'assets/img/graphics/coffin-1.webp';
      isActive = false;
   }
});