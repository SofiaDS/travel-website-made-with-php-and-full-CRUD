<?php
require('connection.php');
$id = intval($_POST['id']);
$select = "SELECT * from trips WHERE id=$id";
$query = $db->prepare($select);
$query->execute();
$trip = $query->fetchAll(PDO::FETCH_ASSOC);
?>
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
        <navbar class="nav flex">
            <span>LOGO</span>
            <span><a href="../index.php">Home</a></span>
            <span><a href="travels.php">Travels</a></span>
            <span><a href="#">Contact</a></span>
            <span><a href="admin.php">Admin</a></span>
            <span class='toggleMenu'><i class="fas fa-bars"></i></span>
            <span id='search'><a href="#"><i class="fas fa-search"></i></a></span>
        </navbar>
    </header>

    <main>
        <?php
            foreach($trip as $detail){
                echo '
                <div class="container">
                    <div class="travelCardsFlex">
                        <img class="immagine" src="'.$detail['Immagine'].'"></img>

                        <div class="card">
                            <div class="cardTitle">
                                <div class="place">'.$detail['title'] . '</div>
                                <div class="cardPrice">'.$detail['price'] . '</div>
                            </div>
                            
                            <div class="cardDescription">' .$detail['descrizione'] . '</div>
                        </div>
                    </div>
                </div>
                ';
            };
        ?>

        <div class='container'>
            <form method='post' action="saveUpdate.php" enctype="multipart/form-data">
                <div>
                    <label>Title</label>
                    <input type='text' name='title'> 
                </div>
                <div>
                    <label>Description</label>
                    <textarea name='descrizione'rows="4" cols="21">
                    </textarea>
                </div>
                <div>
                    <label>Price</label>
                    <input type='text' name='price'>
                </div>
                <div>
                    <input type="file" name="file" value =""/>
                    <input type="hidden" name="id" value="<?=$detail['id']?>">
                </div>
                <div>
                    <button type='submit'class='bottone'>Save Changes</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <div class='flex'>
            <div><span>LOGO</span></div>
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