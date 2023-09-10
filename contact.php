<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact | Ballin.pl</title>

   <!-- LINK CSS -->
   <link rel="stylesheet" href="assets/css/main.css">
   <link rel="stylesheet" href="assets/css/word.css">

</head>
<body>


<!------------------------>
<!------- DESKTOP -------->
<!------------------------>

<div class="desktop">

   <div class="desktop-folders">
      <div class="desktop-folder menu-folder">
         <img class="cart-desktop-folder" src="assets/img/elem-parts/menu.webp" alt="Ikonka menu">
         <span>Menu</span>
      </div>
         
      <div class="desktop-folder cart-folder" id="cart-folder">
         <img class="cart-desktop-folder" src="assets/img/elem-parts/cart-empty.webp" alt="Ikonka pustego koszyka">
         <span>Orders</span>
      </div>
   </div>

   <!-- empty cart warning -->
   <dialog id="empty-cart-modal">
      <div class="window-container-topbar">
         <div class="window-container-topbar-left">
            Warning
         </div>
         <button class="window-container-close-icon" id="close-empty-cart-modal">
            <img src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
         </button>
      </div>
      <div class="empty-cart-modal-content">
         <p>
            <img src="assets/img/icons/access-denied-icon.svg" alt="Ikonka odmowy dostępu">
            Access is denied. Your cart is empty.
         </p>
         <button class="btn-primary btn-primary-dashed" id="close-empty-cart-modal">OK</button>
      </div>
   </dialog>



   <!----------------------->
   <!------- VISION -------->
   <!----------------------->

   <div class="content-container content-container-block no-scrollbar-container">

         <div class="window-container big app-container word">
            <div class="window-container-topbar">
               <div class="window-container-topbar-left">
                  <img class="window-container-icon" src="assets/img/icons/menu icons/contact-icon.svg" alt="Ikonka produktu">
                  Contact.exe
               </div>
               <div class="window-container-icons">
                  <img class="window-container-close-icon" src="assets/img/icons/minimize.svg" alt="Ikonka zamknij">
                  <img class="window-container-close-icon" src="assets/img/icons//maximize.svg" alt="Ikonka zamknij">
                  <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
               </div>
            </div>

            <p class="app-tabs">
               <span><a href="vision.php">Vision</a></span>
               <span><a href="support.php">Support</a></span>
               <span><a href="terms.php">Terms</a></span>
               <span><a href="privacy.php">Privacy</a></span>
            </p>

            <div class="word-editor-container">
               <div class="word-editor-wrapper">
                  <div class="rubber left-rubber"><span class="white-rubber-area"></span></div>
                  <div class="word-page-container">
                     <div class="rubber top-rubber"><span class="white-rubber-area"></span></div>
                     <div class="word-page white-window-container">
                        <div class="word-page-content">

                           <img class="word-page-header" src="assets/img/graphics/contact-header.webp" alt="Nagłówek Contact">
                           
                           <h2>Nasz dział obsługi jest dostępny przez cały tydzień. Na pytania odpowiadamy szbko, więc pisz śmiało jeśli coś Cię trapi!</h2>

                           <p>Zależy nam na Twojej wygodzie, dlatego możesz skontaktować się z nami w szybki i łatwy sposób. Wybierz najbardziej dogodne dla siebie rozwiązanie.</p>

                           <ul>
                              <li>e-mail: <a href="mailto:mob@ballin.pl">mob@ballin.pl</a></li>
                              <li>Instagram Direct message: tutaj dać odnośnik do profili, ale nie w postaci linku</li>
                              <li>Facebook: tutaj dać odnośnik do profili, ale nie w postaci linku</li>
                              <li>telefon:  <a href="tel:+48888-773-756">+48 888 773 756</a> ( 9-16, poniedziałek - piątek) </li>
                           </ul>

                           <p>Na wszystkie pytania odpowiadamy przeważnie w ciągu godziny przez wszystkie dni tygodnia.</p><br>

                           <h3>Dane firmy:</h3>

                           <p>                              
                              „BALLIN MOB Marcin Barłowski”<br>
                              ul. Łukasińskiego 30A/10, 71-215 Szczecin<br>                             
                              NIP: 8522668310,<br>
                              REGON: 387533481
                           </p>
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </div>

      </div>

   </div>

   

   <!------------------------------->
   <!------- FOOTER TOOLBAR -------->
   <!------------------------------->

   <?php include 'website-parts/footer.php'; ?>

</div>


<!-- Default JS -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/main.js"></script>

<!-- Additional JS -->
<script src="assets/js/word.js"></script>

</body>
</html>