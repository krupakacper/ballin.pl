// Set height of left rubber same as word document
window.onload = (event) => {
   const rubber = document.querySelector('.left-rubber');
   const wordPage = document.querySelector('.word-page');

   let wordPageHeight = wordPage.scrollHeight + 25;        //get the container height

   rubber.style.height = wordPageHeight + 'px';      //set new rubber height height
 };
