window.onload = (event) => {

  if ($(window).width() > 950) {
    // Set height of left rubber same as word document
    const rubber = document.querySelector('.left-rubber');
    const wordPage = document.querySelector('.word-page');

    let wordPageHeight = wordPage.scrollHeight + 25;        //get the container height

    rubber.style.height = wordPageHeight + 'px';      //set new rubber height
  } else if (($(window).width() <= 950) && ($(window).width() > 550)) {    
    
      // Set height of left rubber same as word document
      const rubber = document.querySelector('.left-rubber');
      const wordPage = document.querySelector('.word-page');

      let wordPageHeight = wordPage.scrollHeight + 20;        //get the container height

      rubber.style.height = wordPageHeight + 'px';      //set new rubber height
    
  }

  

};