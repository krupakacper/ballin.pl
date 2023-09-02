// landing page toggle
const landingBtn = document.querySelector('.landing-btn');
const landingBtnToggle = document.querySelector('.landing-btn-toggle');
const landingImg = document.querySelector('.landing-page-img');
let isActive = false;

landingBtn.addEventListener('click', () => {
   if(isActive == false) {
      landingBtnToggle.classList.add('active');
      landingImg.src = '/assets/img/landing-page/coffin-2.jpg';
      isActive = true;
   } else {
      landingBtnToggle.classList.remove('active');
      landingImg.src = '/assets/img/landing-page/coffin-1.jpg';
      isActive = false;
   }
});