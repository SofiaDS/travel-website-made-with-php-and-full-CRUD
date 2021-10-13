<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <header>
        <navbar class='nav flex1'>
            <span><a href="#"><img id="logo" src="./assets/logo/logo_small.png"></a></span>
            <span><a href="#">Home</a></span>
            <span><a href="php/travels.php">Travels</a></span>
            <span><a href="#">Contact</a></span>
            <span><a href="php/admin.php">Admin</a></span>
            <span class='toggleMenu'><i class="fas fa-bars"></i></span>
            <span id='search'><a href="#"><i class="fas fa-search"></i></a></span> 
        </navbar> 
    </header>

    <main>

        <?php
        //CONNESSIONE AL DB
        require('connection.php');

        $select = "SELECT * FROM trips";

        $query = $db->prepare($select);
        $query->execute();

        $trips = $query->fetchAll(PDO::FETCH_ASSOC);
        //trasformo il db in un array da ciclare per costruirci il layout 
        foreach($trips as $trip){
            echo
            '<div class="container">
                <div class="travelCardsFlex">
                    <img class="immagine" src="'.$trip['Immagine'].'"></img>

                    <div class="card">
                        <div class="cardTitle">
                            <div class="place">'.$trip['title'] . '</div>
                            <div class="cardPrice">'.$trip['price'] . '</div>
                        </div>
                        
                        <div class="cardDescription">' .$trip['descrizione'] . '</div>
                        <span class="bottone">Show offer</span>
                    </div>
                </div>
            </div>
             ';
        };

        ?>
    </main>

    
    <footer>
        <div class='flex'>
            <div class='logo'><span>LOGO</span></div>
            <div>
               <address>
                    <span class="social">
                        <a href='http://www.facebook.com'><i class="fab fa-facebook-f"></i></a>
                        <a href='http://www.linkedin.com'><i class="fab fa-linkedin-in"></i></a>
                        <a href='http://twitter.com'><i class="fab fa-twitter"></i></a>
                        <a href='http://www.youtube.com'><i class="fab fa-youtube"></i></a>
                    </span>
                    <div class='copyright'>&#169; 2021 Company name | All rights reserved</div>
                </address> 
            </div>
        </div>
    </footer>
</body>
</html>