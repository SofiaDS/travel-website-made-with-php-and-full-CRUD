<?php
require('php/connection.php');
$select = "SELECT Immagine FROM trips";

$query = $db->prepare($select);
$query->execute();

$immagini = $query->fetchAll(PDO::FETCH_ASSOC);

include_once('./php/parts/header.php');
?>
    
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

<?php
include_once('./php/parts/footer.php');
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

