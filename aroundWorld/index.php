<?php
require('php/connection.php');
$select = "SELECT Immagine FROM trips";

$query = $db->prepare($select);
$query->execute();

$immagini = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <header>
        <navbar class='nav flex1'>
            <span><a href="#"><img id="logo" src="assets/logo/logo_small.png"></a></span>
            <span><a href="#">Home</a></span>
            <span><a href="php/travels.php">Travels</a></span>
            <span><a href="#">Contact</a></span>
            <span><a href="php/admin.php">Admin</a></span>
            <span class='toggleMenu'><i class="fas fa-bars"></i></span>
            <span id='search'><a href="#"><i class="fas fa-search"></i></a></span> 
        </navbar> 
    </header>
    
    <main>
        <div class="slideshowContainer">
            
                <?php
                foreach($immagini as $immagine){
                    echo
                    '<div class="mySlides fade">
                        <img class="immagine" style="width:100%" src="php/'.$immagine['Immagine'].'"></img>
                    </div>
                    ';
                };
                ?>
                
            
        </div>
    </main>
    <div class='border'>
        <div>
            <h2>Subscribe to our newsletter</h2>
            <h4>Be the first one to know about our new offers and promotion</h4>
        </div>
        <div class="flex">
            <form method="post" action='php/newsletter.php'>
                <div class="flexChild">
                    <div class="flex">
                        <label>Name *</label>
                        <input type='text' name='nome'>
                        <label>Surname *</label>
                        <input type='text' name='cognome'>
                    </div>
                    <div class='flexColumn'>
                        <div>
                            <label id='email'>Email *</label>
                            <input type='email' name='email'>
                        </div>
                        <div>
                            <span class='bottone' type='submit'>Subscribe</span>
                        </div>
                        <span id='terms'>By subscribing you accept our <a href="#">Terms&conditions</a> and our <a
                                href="#">Privacy policy</a>.</span>
                    </div>
                </div>
        </div>
        </form>
    </div>

    <footer>
        <div class='flex'>
            <div><span>LOGO</span></div>
            <div>
               <address>
                    <span class="social">
                        <a href='https://www.facebook.com/VisitBrasil/'><i class="fab fa-facebook-f"></i></a>
                        <a href='https://www.instagram.com/visitbrasil/'><i class="fab fa-instagram-square"></i></a>
                        <a href='https://twitter.com/visitbrasil'><i class="fab fa-twitter"></i></a>
                        <a href='https://www.youtube.com/user/visitbrasil'><i class="fab fa-youtube"></i></a>
                        <a href='https://www.flickr.com/photos/visitbrasil/albums0'><i class="fab fa-flickr"></i></a>
                        <a href='https://open.spotify.com/user/1qov39ixr9smyct2ozsdnpmc1'><i class="fab fa-spotify"></i></a>
                    </span>
                    <div class='copyright'>&#169; 2021 Company name | All rights reserved</div>
                </address> 
            </div>
        </div>
    </footer>
<?php
echo '
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1};
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 5000);
}
</script>
'    
?>

</body>

</html>
